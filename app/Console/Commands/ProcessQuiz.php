<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use DB;
use Queue;
use Mail;
use App\Group;
use App\Answer;
use App\User;
use App\Question;
use App\Alternative;


/**
 * Review that end_date of groups is expired and close them
 * run everyday at 00 am
 * test with artisan closequiz
 */

class ProcessQuiz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'processquiz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rate to the members of the group; if group is not closed then close it';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = 'Something was wrong';
        
        $this->comment('Start Operations');
        
        DB::transaction(function() use (&$response){
           
           $return = Group::closeGroups(); // close groups in date
           $return = true;
           
           $groups = Group::getGroupsToProcess(); // get closed groups and not processed
           
           $not_sent = []; // user's id with email not sent
           $groupIds = [];  // groups ids
           
            $factors = Alternative::get_weight_alternatives_quiz_one();
            
            
            foreach ($groups as &$group) {
                $groupIds[] = $group->id;
                $members = $group->users;
                $alternatives = array();
                
                foreach ($factors as $alt => $factor) {
                    $alternatives[$alt] = array('total'=>0, 'male'=>0, 'female'=>0);
                }
                foreach ($members as $member) {
                    $scoreA = unserialize($member->scoreA);
                    foreach ($alternatives as $key => &$data) {
                        $data['total'] = $data['total'] + $scoreA['total'][$key];
                        $data['male'] = $data['male'] + $scoreA['male'][$key];
                        $data['female'] = $data['female'] + $scoreA['female'][$key];
                    }
                }

                $tmp_factors = array();
                $sum_total = 0;
                $sum_male = 0;
                $sum_female = 0;
                
                foreach ($alternatives as $key => &$data) {
                    $sum_total = $sum_total + $data['total'];
                    $sum_male = $sum_male + $data['male'];
                    $sum_female = $sum_female + $data['female'];
                }

                foreach ($factors as $alt => $factor) {
                    $tmp_factors['total'][$alt] = (5*$alternatives[$alt]['total'] != 0) ?  round(($sum_total*$factor)/(5*$alternatives[$alt]['total']),0) : 0;
                    $tmp_factors['male'][$alt] = (5*$alternatives[$alt]['male']) ? round(($sum_male*$factor)/(5*$alternatives[$alt]['male']),0) : 0;
                    $tmp_factors['female'][$alt] = (5*$alternatives[$alt]['female']) ? round(($sum_female*$factor)/(5*$alternatives[$alt]['female']),0) : 0;
                }


                foreach ($members as &$member) {
                    
                    $score_A = unserialize($member->scoreA);
                    $score_global = array();
                    foreach ($score_A as $layer => $alt_arr) {
                        ${'point_'.$layer} = 0;
                        $sum_qty = 0;
                        foreach ($alt_arr as $alt => $qty) {
                            ${'point_'.$layer} = ${'point_'.$layer} + ($qty*$tmp_factors[$layer][$alt]);
                            $sum_qty = $sum_qty + $qty; 
                        }
                        $score_global[$layer] = ($sum_qty != 0) ? round(${'point_'.$layer}/$sum_qty,0) : 0;
                    }

                    $member->report_score = serialize($score_global);
                    $member->save();
                    $aaa[] = $member->report_score;

                }
                var_dump($aaa);exit; 

                /*
                $questions = Answer::getGlobalScore(); // Global Score of question (male / female)
                $questions_group = Answer::getGlobalScoreGroup($group->id); // Group Score for question (male / female)

                foreach ($questions_group['males'] as $idquiz => $data) {
                    $questions[$idquiz]['males']['total'] = $questions[$idquiz]['males']['total'] + $data['total'];
                    $questions[$idquiz]['males']['qty'] = $questions[$idquiz]['males']['qty'] + $data['qty'];
                }

                foreach ($questions_group['females'] as $idquiz => $data) {
                    $questions[$idquiz]['females']['total'] = $questions[$idquiz]['females']['total'] + $data['total'];
                    $questions[$idquiz]['females']['qty'] = $questions[$idquiz]['females']['qty'] + $data['qty'];
                }

                foreach ($questions as $idquiz => $data) {
                    $quiz = Question::findorFail($idquiz);
                    $quiz->global_score = serialize($data);
                    $return = $return && $quiz->save();
                    unset($quiz);
                }

                */

               // Sent Emails
               foreach ($members as $user) {
                    if($user->email == null || $user->email == '-')
                        continue;
                   
                   Mail::queue('quiz.email.scorequiz', ['user'=>$user, 'group'=>$group], function($m) use ($user, $group){
                        $m->from("info@social-quotient.info", "Social Quotient"); //$group->email, $group->name
                        $m->to($user->email, $user->name)->subject('Your Score in the Quiz!');
                    });

                    if(Mail::failures()){
                        $not_sent[] = $user->email;
                    }
               }

               
               /*
               unset($members); unset($questions); unset($questions_group);
                */
            unset($members);
            $group->is_processed = 1;
            $return = $return && $group->save();
           }

            $return = $return && User::updateStates($groupIds, User::$states[2], User::$states[3], $not_sent); //update user's state
        
            if($return)
                $response = 'All updates was successfull, emails sent too';
            
        });

        $this->comment('Operations done! '. $response);
    }
}


//http://social-quotient.info/results/first/cb114f535cba3036ed06500ff533bb2c