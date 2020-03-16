<?php

namespace App\Jobs;

use Mail;
use DB;
use App\User;
use App\Group;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class InscriptionQuiz extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $view, $users, $subject, $from_state, $to_state, $quizdate;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($view, $users, $subject, $from_state, $to_state,$quizdate)
    {

        $this->view = $view;
        $this->users = $users;
        $this->subject = $subject;
        $this->from_state = $from_state;
        $this->to_state = $to_state;
        $this->quizdate = $quizdate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        
        $subject = $this->subject;
        $users = $this->users;
        $not_sent = [];
        $groupIds = [];
        $new_photo = '';
        DB::transaction(function() use ($users, $mailer, $subject, &$not_sent, &$groupIds, &$new_photo) {

            foreach($users as &$user){
                if( $user->email == null || $user->email == '-' )
                    continue;

                    $groupIds[0] = $user->group_id;

                    $mailer->send($this->view, ['user'=>$user,'quizdate'=>$this->quizdate], function($m) use (&$user, $subject, &$new_photo){
                        $m->from("info@social-quotient.info", "Social Quotient"); //$user->group->email, $user->group->name
                        $m->to($user->email, $user->name)->subject($subject);
                        
                        if($user->photo != NULL && $user->photo != asset("assets/img/quotient/avatar_placeholder.png") ){
                            
                            $ext = User::validateProfileImage($user->photo);
                            
                            if($ext !== false){
                                $file = file_get_contents($user->photo);
                                
                                $destinationPath = 'uploads'.DIRECTORY_SEPARATOR.$user->token; // upload path
                                if(!is_dir($destinationPath)){
                                    @mkdir($destinationPath, 0777);
                                }

                                $fileName = rand(11111, 99999).'.'.$ext;
                                $path = $destinationPath.DIRECTORY_SEPARATOR.$fileName;
                                $photo = file_put_contents($path, $file);
                                if($photo){
                                    $new_photo = 'uploads/'.$user->token.'/'.$fileName;
                                    $m->attach($path);
                                }
                            }
                        }
                        
                        $user->photo = ($new_photo != '') ? $new_photo : $user->photo;
                        $user->save();
                        $new_photo = '';
                    });


                    if($mailer->failures()){
                        $not_sent[] = $user->email;
                    }
            }

            $response = User::updateStates($groupIds, $this->from_state, $this->to_state, $not_sent);

            if($not_sent != array()){
                // Send Email to Owner's Group
                $group = Group::find($groupIds[0]);

                $mailer->send('quiz.email.status', ['group'=>$group, 'emails'=>$not_sent], function($m) use ($group){
                    $m->from("info@social-quotient.info", "Social Quotient"); //$group->email, $group->name
                    $m->to($group->email, $group->name)->subject('Your Group Status');
                });
            }

        });
    }
}
