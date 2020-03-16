<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $table = 'bands';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function generate_token($name, $start_date)
    {
    	return md5(uniqid().md5($name.strtotime($start_date)));
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public static function getGroupsToStart()
    {
    	$groups = Group::with(['users'=>function($query){ $query->where('state_email', User::$states[1]); }])
    		->where('start_date', date('Y-m-d'))
    		->get();
    	return $groups;

    }

    public static function getGroupsToClose()
    {
        $groups = Group::with(['users'=>function($query){ $query->where('state_email', User::$states[1]); }])
            ->where('res_date', date('Y-m-d'))
            ->get();
        return $groups;

    }    

    public static function getCounselor()
    {
        $groups = Group::where( 'start_date', date('Y-m-d'))->get();
        return $groups;
    }

    public static function getGroupsToScore()
    {
        //date('Y-m-d', strtotime('-1d', strtotime(date('Y-m-d'))))
        $groups = Group::with(['users'=>function($query){ $query->where('state_email', User::$states[2])->whereNotNull('scoreA'); }])
            ->where('end_date', date('Y-m-d'))
            ->get();
        return $groups;
    }

    public function format_date($attribute = 'start_date')
    {
        $date = date( "jS F Y", strtotime($this->$attribute));

        return $date;
    }

    public function isAvailable()
    {
    	$return = true;

    	$today = strtotime(date('Y-m-d'));
    	
    	$ref_start = strtotime($this->start_date);
    	$ref_end = strtotime($this->end_date);

    	$return = $return && ( ($today < $ref_start) ? false : true );

    	$return = $return && ( ($today > $ref_end) ? false : true );

        $return = $return && ( ($this->state == 0) ? false : true);
    	
    	return $return;
    }

    public function isClose()
    {
        return $this->state == 0 ? true : false;
    }


    public static function setUnvailable($groupIds)
    {
        $response = Group::whereIn('group_id', $groupIds)->update([ 'state'=> 0, 'close_date'=>date('Y-m-d') ]);

        return $response;
    }

    public static function getGroupsToCloseOld()
    {
        //strtotime('-1d', strtotime(date('Y-m-d'))))
        $groups = Group::where( 'end_date', date('Y-m-d'))->get();

        return $groups;
    }

    public static function closeGroups()
    {
        $response = Group::where('end_date', date('Y-m-d'))->update(['state'=>0]);
        return $response;
    }

    public static function getGroupsToProcess()
    {
        $groups = Group::where('is_processed', 0 )->where('state', 0)->get();
        return $groups;
    }
}
