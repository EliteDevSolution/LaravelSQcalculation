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

class StartCounselor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'startcounselor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Email to the Head Counselor's office";

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->comment('Start Operations');
        
        $groups = Group::getCounselor();

        DB::transaction(function() use (&$groups) {
            $not_sent = [];
            $groupIds = [];
            foreach ($groups as &$group) {
                $groupIds[] = $group->id;
                    if($group->email_counselor == '' || $group->email_counselor == null )
                        continue;
                    Mail::queue('quiz.email.tocounselor', ['group'=>$group], function($m) use ($group){
                        $m->from("info@social-quotient.info", "Social Quotient"); //::, $group->name
                        $m->to($group->email_counselor, $group->name)->subject("Email to the Head Counselor's office");

                    });

                    if(Mail::failures()){
                        $not_sent[] = $group->email_counselor;
                    }
                $group->email_sent = 1;
                $group->save();
            }
            $response = User::updateStates($groupIds, User::$states[1], User::$states[2], $not_sent);
        });
        
        $this->comment('Emails Sent!');
    }
}
