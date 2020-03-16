<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use App\User;
use App\Question;

//Functions we have below are calls for calculations later on. Scroll until ending comment to see how they are used.
class Answer extends Model
{
    use SoftDeletes;
    protected $table = 'answers';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function alternative()
    {
        return $this->belongsTo('App\Alternative');
    }


    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public static function getMyAnswersOfSecondQuiz($user)
    {
    	$answers = Answer::join('questions', 'answers.question_id', '=', 'questions.id')->select('answers.*')
    		->where('answers.user_id', $user)->where('questions.type','second')->get();
    	return $answers;
    }

 
    public static function getMyScoreFromGroup($user, $group)
    {
    	$sql = "SELECT ROUND(SUM(al.weight)/ope1.total, 2) as myscore 
		FROM answers AS rpta 
		INNER JOIN alternatives AS al ON (al.id = alternative_id) 
		INNER JOIN (
		    SELECT ope.ogroup, COUNT(ope.usid) AS total
		    FROM (
		    SELECT us.group_id as ogroup, us.id AS usid
		    FROM users AS us
		    INNER JOIN answers AS rpta1 ON (us.id = rpta1.user_id)
		    INNER JOIN questions AS quiz ON (rpta1.question_id = quiz.id)
		    WHERE us.group_id = :band AND rpta1.state <> 0 AND quiz.type = :type
		    GROUP BY us.id
		        ) AS ope

		    ) AS ope1 ON (ope1.ogroup = :band1 )
		WHERE rpta.target_id = :user AND rpta.state <> 0";

		return DB::select($sql, ['band'=>$group, 'type'=>'first', 'band1'=>$group, 'user'=>$user]);
    }


    public static function getMyScoreFromGroupGender($user, $group, $gender)
    {
    	$sql = "SELECT ROUND(SUM(al.weight)/ope1.total, 2) as myscore 
		FROM answers AS rpta 
		INNER JOIN alternatives AS al ON (al.id = alternative_id) 
		INNER JOIN ( 
			SELECT ope.ogroup, COUNT(ope.usid) AS total 
			FROM ( 
				SELECT us.group_id as ogroup, us.id AS usid 
				FROM users AS us 
				INNER JOIN answers AS rpta1 ON (us.id = rpta1.user_id) 
				INNER JOIN questions AS quiz ON (rpta1.question_id = quiz.id) 
				WHERE us.group_id = :band AND us.gender = :gender AND rpta1.state <> 0 AND quiz.type = :type 
				GROUP BY us.id 
			) AS ope 
		) AS ope1 ON (ope1.ogroup = :band1) 
		INNER JOIN users as member ON (rpta.user_id = member.id) 
		WHERE rpta.target_id = :user AND rpta.state <> 0 AND member.gender = :gender1";

		return DB::select($sql, ['band'=>$group, 'gender'=>$gender, 'type'=>'first', 'band1'=>$group, 'user'=>$user, 'gender1'=>$gender]);
    }

//Finished first round of base functions. The one below are using the ones above to calculate numbers we need for quiz:
//Lets calculate scores for first quiz:
    public static function getMyScoreFirstQuiz($user, $group)
    {
    	$total = Self::getMyScoreFromGroup($user, $group);
    	$total = isset($total[0]) ? ($total[0]->myscore == null ? 0 : $total[0]->myscore) : 0;
    	$males = Self::getMyScoreFromGroupGender($user, $group, 'male');
    	$males = isset($males[0]) ? ($males[0]->myscore == null ? 0 : $males[0]->myscore) : 0;
    	$females = Self::getMyScoreFromGroupGender($user, $group, 'female');
    	$females = isset($females[0]) ? ($females[0]->myscore == null ? 0 : $females[0]->myscore) : 0;
    	
    	return serialize(array('total'=>$total, 'males'=>$males, 'females'=>$females));
    }

//Second round of base functions:
    public static function getMyScoreSecondQuiz($user)
    {
    	
    	$sql = "SELECT ROUND(SUM(alt.weight)/ope.quantity,2) AS myscore
		FROM answers AS ans 
		INNER JOIN alternatives AS alt ON (alt.id = ans.alternative_id)
		INNER JOIN questions AS quiz ON (quiz.id = ans.question_id)
		INNER JOIN (
			SELECT COUNT(quiz1.id) as quantity
		    FROM questions AS quiz1
			WHERE quiz1.type = :type
			
		) AS ope ON (TRUE)
		WHERE ans.user_id = :user AND quiz.type = :type1 AND ans.state <> 0";

		$score = DB::select($sql, ['type'=>'second', 'user'=>$user, 'type1'=>'second']);

		return isset($score[0]) ? ($score[0]->myscore == null ? 0 : $score[0]->myscore) : 0;
		
    }


    public static function getQuantityPress($user)
    {
    	$sql = "SELECT alt1.text , IFNULL(ans1.quantity, 0) as qty
			FROM alternatives as alt1
			INNER JOIN questions AS quiz1 ON (quiz1.id = alt1.question_id)
			LEFT JOIN (
			    SELECT alt.id , COUNT(ans.id) as quantity
			    FROM alternatives as alt
			    INNER JOIN questions AS quiz ON (quiz.id = alt.question_id)
			    LEFT JOIN answers AS ans ON (alt.id = ans.alternative_id)
			    WHERE ans.user_id = :user AND ans.state <> 0 AND quiz.type = :type
			    GROUP BY ans.alternative_id
			    ) AS ans1 ON (alt1.id = ans1.id)
			WHERE quiz1.type = :type1";

		return DB::select($sql, ['user'=>$user, 'type'=>'first', 'type1'=>'first']);
    }

    public static function getScoresOfGroup($group)
    {
    	$sql = "SELECT us1.id, us1.report_score
			FROM users AS us1
			WHERE us1.id IN (
				SELECT us.id AS usid 
				FROM users AS us 
				INNER JOIN answers AS rpta1 ON (us.id = rpta1.user_id) 
				INNER JOIN questions AS quiz ON (rpta1.question_id = quiz.id) 
				WHERE us.group_id = :group AND rpta1.state <> 0 AND quiz.type = :type
				GROUP BY us.id
		    )";
		
		$members = DB::select($sql, ['group'=>$group, 'type'=>'first']);
		return $members;
    }

    public static function getSecondScoresOfGroup($group)
    {
    	$sql = "SELECT us1.id, us1.scoreB
			FROM users AS us1
			WHERE us1.id IN (
				SELECT us.id AS usid 
				FROM users AS us 
				INNER JOIN answers AS rpta1 ON (us.id = rpta1.user_id) 
				INNER JOIN questions AS quiz ON (rpta1.question_id = quiz.id) 
				WHERE us.group_id = :group AND rpta1.state <> 0 AND quiz.type = :type
				GROUP BY us.id
		    )";
		
		$members = DB::select($sql, ['group'=>$group, 'type'=>'second']);
		return $members;
    }
//End of second round of base functions.
//The one below is used to calculate scores for groups:

    public static function getDistributedScoreOfGroup($group)
    {
    	$members = Self::getScoresOfGroup($group);

    	$total = count($members);
    	$scores = User::$scores;
    	$text_scores = User::$text_scores;

    	foreach ($text_scores as $text) {
    		$grouped[$text] = 0;
    	}
    	

    	foreach ($members as $member) {
    		$my_score = unserialize($member->report_score);
    		$my_score = $my_score['total'];

    		if( $scores[0] <= $my_score && $my_score < $scores[1] ){
                // < 90
                $grouped[ $text_scores[0] ] = $grouped[ $text_scores[0] ] + 1;

            }elseif( $scores[1] <= $my_score && $my_score < $scores[2] ){
                // < 100
                $grouped[ $text_scores[1] ] = $grouped[ $text_scores[1] ] + 1;

            }elseif( $scores[2] <= $my_score && $my_score < $scores[3] ){
                // < 110
                $grouped[ $text_scores[2] ] = $grouped[ $text_scores[2] ] + 1;

            }elseif( $scores[3] <= $my_score && $my_score < $scores[4] ){
                // < 120
                $grouped[ $text_scores[3] ] = $grouped[ $text_scores[3] ] + 1;

            }elseif( $scores[4] <= $my_score && $my_score < $scores[5] ){
                // < 130
                $grouped[ $text_scores[4] ] = $grouped[ $text_scores[4] ] + 1;

            }else{
                // >= 130
                $grouped[$text_scores[5]] = $grouped[ $text_scores[5] ] + 1;
            }
    	}

    	foreach ($grouped as &$qty) {
    		$qty = ($total == 0) ? 0 : (round($qty/$total*100, 2)); 
    	}

    	return $grouped;
    }

//Calculate percentages of users that failed:
    public static function getPercentLosers($user, $group)
    {
    	
    	$members = Self::getScoresOfGroup($group);

		foreach ($members as $member) {
			if( $member->id == $user ){
				$score = unserialize($member->report_score);
				break;
			}
		}

        //var_dump($score);exit;

		$i = 0;
		foreach ($members as $member) {
			if( $member->id == $user )
				continue;
			
			$other_score = unserialize($member->report_score);

			if($other_score['total'] < $score['total'])
				$i++;

		}

		$div = count($members)-1;

		return $div == 0 ? 100 : round( $i/$div*100, 2 );

    }

//Calculate percentages of users that failed second time:
    public static function getPercentSecondLosers($user, $group)
    {
    	
    	$members = Self::getSecondScoresOfGroup($group);


		foreach ($members as $member) {
			if( $member->id == $user ){
				$score = $member->scoreB;
				break;
			}
		}

		$i = 0;
		foreach ($members as $member) {
			if( $member->id == $user )
				continue;
			
			$other_score = $member->scoreB;

			if($other_score < $score)
				$i++;

		}

		$div = count($members)-1;

		return $div == 0 ? 100 : round( $i/$div*100, 2 );

    }

//Get score of whole gender in a group:
    public static function getGlobalScoreGenderGroup($group, $gender)
    {
    	$sql = "SELECT quiz.id AS idquiz, SUM(alt.weight) AS total, COUNT(us.id) AS qty
		FROM answers AS ans
		INNER JOIN alternatives AS alt ON (alt.id = ans.alternative_id)
		INNER JOIN questions AS quiz ON (quiz.id = ans.question_id)
		INNER JOIN users AS us ON (us.id = ans.user_id)
		WHERE us.group_id = :group AND quiz.type= :type AND alt.is_taken <> 0 AND us.gender = :gender
		GROUP BY quiz.id";

		$data = DB::select($sql, ['group'=>$group, 'type'=>'second', 'gender'=>$gender]);

		return $data;
    }

//Get score of all users in a group:
    public static function getGlobalScoreGroup($group)
    {
    	$males = Self::getGlobalScoreGenderGroup($group, 'male');
    	$females = Self::getGlobalScoreGenderGroup($group, 'female');

    	$data_males = array();
    	$data_females = array();

    	$questions = Question::all_questions();
    	foreach ($questions as $question) {
    		$data_males[$question->id] = array('total'=>0, 'qty'=>0);
    		$data_females[$question->id] = array('total'=>0, 'qty'=>0);
    	}

    	foreach ($males as $male) {
    		$data_males[$male->idquiz] = array('total'=>$male->total, 'qty'=>$male->qty);
    	}

    	foreach ($females as $female) {
    		$data_females[$female->idquiz] = array('total'=>$female->total, 'qty'=>$female->qty);
    	}

    	return array('males'=>$data_males, 'females'=>$data_females);
    }

//Get all scores no matter groups/gender:
    public static function getGlobalScore()
    {
    	$data = array();
    	$empty_data = array(
    		'males'=>array(
    			'total'=>0,
    			'qty'=>0
    			),
    		'females'=>array(
    			'total'=>0,
    			'qty'=>0
    			)
    		);
    	$questions = Question::all_questions();
    	
    	foreach ($questions as $question) {
    		$data[$question->id] = ($question->global_score == null) ? $empty_data : unserialize($question->global_score);
    	}

    	return $data;
    }


}
