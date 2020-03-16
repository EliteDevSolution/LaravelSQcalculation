<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class User extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public static $states = ['not sent', 'inscription', 'take', 'checked'];

    public static $genders = ['male', 'female'];

    public static $taken_quizes = ['no taken', 'taken first', 'taken second'];

    public static $report_types = ['Report', 'Claim', 'Suggestions'];

    public static $scores = [
        0,
        90,
        100,
        110,
        120,
        130
    ];

    public static $text_scores = [
        'Below average',
        'Slightly below average',
        'Slightly above average',
        'Very good',
        'Excellent',
        'Absolutely superb'
    ];


    public static function generate_token($groupId, $email)
    {
    	return md5(uniqid().md5($groupId.$email.$groupId));
    }


    public static function multiple_insert($users, $group)
    {
        $members_to_save = array();
        foreach ($users as $member) {
            $members_to_save[] = array(
                'name'=>$member['name'],
                'email'=>$member['email'],
                'group_id'=>$group->id,
                'photo'=>$member['url_photo'],
                'token'=>Self::generate_token($group->id, $member['email'].rand()),
                'state_email'=>Self::$states[0],
                'created_at'=>$group->created_at,
                'updated_at'=>$group->updated_at
            );
        }

        return DB::table('users')->insert($members_to_save);
    }


   	public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }


    public static function getNewUsersByGroup($groupId)
    {
    	$newUsers = User::with('group')->where('group_id', $groupId)->where('state_email', User::$states[0])->get();

    	return $newUsers;
    }

    public function getAge()
    {
        if($this->birthdate == null)
            return -1;

        $datetime1 = new \DateTime($this->birthdate);
        $datetime2 = new \DateTime(date('Y-m-d'));
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%y');

    }

    public function getPhoto()
    {
    	if($this->photo == null)
    		$photo = asset('assets/img/quotient/avatar_placeholder.png');
    	else{
    		if(strrpos($this->photo, 'http') === false)
    			$photo = asset($this->photo);
    		else
    			$photo = $this->photo;
    	}

    	return $photo;
    }

    public function isQuizTaken($quiz = 'first')
    {
        $state = ( $quiz == 'first' ) ? Self::$taken_quizes[1] : Self::$taken_quizes[2];

        return ($state == $this->take_quiz) ? true : false;

    }

    public function getMyScore($quiz = 'first')
    {
        if($quiz == 'first'){
            return unserialize($this->scoreA);
        }else{
            return $this->scoreB;
        }

    }

    public function getMyFirstReportScore()
    {
        if($this->report_score){
            return unserialize($this->report_score);
        }else{
            return array('male'=>0, 'female'=>0, 'total'=>0);
        }
    }


    public function getScore($quiz = 'first')
    {
        $my_score = $this->getMyScore($quiz);

        if($quiz == 'first'){
            $scores = Self::$scores;
            $my_score = $this->getMyFirstReportScore();
            $my_score = $my_score['total'];

            if( $scores[0] <= $my_score && $my_score < $scores[1] ){
                // < 90
                $score_text = Self::$text_scores[0];
            }elseif( $scores[1] <= $my_score && $my_score < $scores[2] ){
                // < 100
                $score_text = Self::$text_scores[1];
            }elseif( $scores[2] <= $my_score && $my_score < $scores[3] ){
                // < 110
                $score_text = Self::$text_scores[2];
            }elseif( $scores[3] <= $my_score && $my_score < $scores[4] ){
                // < 120
                $score_text = Self::$text_scores[3];
            }elseif( $scores[4] <= $my_score && $my_score < $scores[5] ){
                // < 130
                $score_text = Self::$text_scores[4];
            }else{
                // >= 130
                $score_text = Self::$text_scores[5];
            }


        }else{
            $scores = Self::$scores;

            if( $scores[0] <= $my_score && $my_score < $scores[1] ){
                // < 90
                $score_text = Self::$text_scores[0];
            }elseif( $scores[1] <= $my_score && $my_score < $scores[2] ){
                // < 100
                $score_text = Self::$text_scores[1];
            }elseif( $scores[2] <= $my_score && $my_score < $scores[3] ){
                // < 110
                $score_text = Self::$text_scores[2];
            }elseif( $scores[3] <= $my_score && $my_score < $scores[4] ){
                // < 120
                $score_text = Self::$text_scores[3];
            }elseif( $scores[4] <= $my_score && $my_score < $scores[5] ){
                // < 130
                $score_text = Self::$text_scores[4];
            }else{
                // >= 130
                $score_text = Self::$text_scores[5];
            }
        }

        return $score_text;
    }



    public function letTakeQuiz($quiz)
    {
    	$return = false;

    	switch ($this->take_quiz) {
    		case User::$taken_quizes[0] :

    			if($quiz == Question::$types[0])
    				$return = true;
    			else
    				$return = false;

    			break;

    		case User::$taken_quizes[1] :

    			if($quiz == Question::$types[0])
    				$return = false;
    			else
    				$return = true;

    			break;

    		case User::$taken_quizes[2] :

    			if($quiz == Question::$types[0])
    				$return = false;
    			elseif($quiz == Question::$types[1])
    				$return = false;
    			else
    				$return = true;

    			break;

    		default:
    			# code...
    			break;
    	}

    	return $return;
    }

    public static function updateStates($groupIds, $from_state, $to_state, $not_sent = array())
    {
    	if($not_sent == array()){
			// sent all
			$response = User::whereIn('group_id', $groupIds)
				->where('state_email', $from_state)
				->update(['state_email'=> $to_state]);
		}else{
			// some not sent
			$response = User::whereIn('group_id', $groupIds)
				->where('state_email', $from_state)
				->whereNotIn('email', $not_sent)
				->update(['state_email'=> $to_state]);
		}

		return $response;
    }


    // Return false if is not valid image, else return extension
    public static function validateProfileImage($url)
    {
        $image_info = @getimagesize($url);
        if($image_info === false)
            return false;
        if(!$image_info[0] || $image_info[0] == null)
            return false;

        $ext = substr($image_info['mime'], strrpos($image_info['mime'], '/')+1);
        return $ext;
    }


    public static function getScoreAFromGroup($group_id)
    {
        #"SELECT user.id, user.scoreA FROM users as user WHERE user.group_id = 1";
        return User::select('id', 'scoreA')->where('group_id', $group_id)->get();
    }


    public static function updateFirstQuizScore($scores)
    {
        $return = true;
        foreach ($scores as $user_id => $scoreA) {
            $user = User::findOrFail($user_id);
            $user->scoreA = serialize($scoreA);
            $return = $return && $user->save();
        }

        return $return;
    }

}
