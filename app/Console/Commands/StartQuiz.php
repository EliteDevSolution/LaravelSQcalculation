<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use DB;
use Queue;
use Mail;
use App\User;
use App\Group;

/**
 * Send emails to members of groups for notice the quiz start
 * run everyday at 00 am
 */

class StartQuiz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'startquiz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to each group member for start quiz';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->comment('Start Operations');
        
        $groups = Group::getGroupsToStart();

        DB::transaction(function() use (&$groups) {
            $not_sent = [];
            $groupIds = [];
            foreach ($groups as &$group) {
                $groupIds[] = $group->id;
                foreach ($group->users as $user) {
                    if($user->email == '-' || $user->email == null )
                        continue;

                    Mail::queue('quiz.email.startquiz', ['user'=>$user, 'group'=>$group], function($m) use ($user, $group){
                        $m->from("info@social-quotient.info", "Social Quotient"); //::, $group->name
                        $m->to($user->email, $user->name)->subject('The Quiz starts today!');

                    });

                    if(Mail::failures()){
                        $not_sent[] = $user->email;
                    }
                }

                $group->email_sent = 1;
                $group->save();
            }

            $response = User::updateStates($groupIds, User::$states[1], User::$states[2], $not_sent);
        });
        
        $this->comment('Emails Sent!');
    }
}
