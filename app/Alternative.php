<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use App\User;
use App\Question;

class Alternative extends Model
{
    use SoftDeletes;
    protected $table = 'alternatives';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

     public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public static function getScoreFromAlternatives($alternativesIds)
    {
    	$alternatives = Alternative::whereIn('id', $alternativesIds)->get();
    	$total = 0;
    	foreach ($alternatives as $alternative) {
    		$total = $total + $alternative->weight;
    	}

    	return $total;
    }

    public static function all_alternatives(){
        $alt = Alternative::where('question_id', '!=' , 1)->orderBy('id')->get();
        return $alt;
    }

    public static function get_alternatives_quiz_one(){
        $alt = Alternative::where('question_id', '=' , 1)->where('is_active','=' ,1)->orderBy('id')->get();
        return $alt;   
    }

    public static function get_weight_alternatives_quiz_one(){
        $alternatives = Alternative::where('question_id', '=' , 1)->where('is_active','=' ,1)->orderBy('id')->get();
        
        $return = array();
        
        foreach ($alternatives as $alt) {
            $return[$alt->text] = $alt->weight;
        }
        
        return $return;      
    }

    public static function setScoreToGroupFromUser($user, $answers)
    {
        $members = User::getScoreAFromGroup($user->group_id);
        $members_scores = array();
        $alternatives_db = Self::get_alternatives_quiz_one();

        $alternatives = array();
        $tmp_scores = array();
        foreach ($alternatives_db as $alt) {
            
            $alternatives[$alt->id] = $alt->text;
            $tmp_scores[$alt->text] = 0;
        }
        
        unset($alternatives_db);

        foreach ($members as $member) {
            $members_scores[$member->id] = ($member->scoreA) ? unserialize($member->scoreA) : array('total'=>$tmp_scores, 'male'=>$tmp_scores, 'female'=>$tmp_scores);
        }

        $final_scores = array();

        
        foreach ($answers as $answer) {
            $new_score = array(
                'total' => $tmp_scores,
                'male' => $tmp_scores,
                'female' => $tmp_scores,
            );


            if(array_key_exists($answer['target_id'], $members_scores)){
                $new_score = $members_scores[$answer['target_id']];
            }

            $alternative = $alternatives[$answer['alternative_id']];

            $new_score['total'][$alternative] += 1;
            if($user->gender == User::$genders[0]){
                // male
                $new_score['male'][$alternative] += 1;
            }else{
                // female
                $new_score['female'][$alternative] += 1;
            }

            $final_scores[$answer['target_id']] = $new_score;
        }

        return User::updateFirstQuizScore($final_scores);

    }


}
