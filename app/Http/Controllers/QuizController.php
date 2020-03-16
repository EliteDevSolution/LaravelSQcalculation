<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;

use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Auth;
use Response;
use Route;
use Mail;
use Input;
use Queue;
use App\User;
use App\Group;
use App\Alternative;
use App\Question;
use App\Answer;
use PDF;
use App\Jobs\InscriptionQuiz;
use Validator;

@session_start();

class QuizController extends Controller
{

	public function index()
	{
		return view("quiz.index");
	}


	public function email(){
		//$user = User::findOrFail($id);
		$user['email'] = 'ssj.simpron@gmail.com';
		$user['name'] = 'Jay-r';
        Mail::send('test.email', ['user' => $user], function ($m) use ($user) {
            $m->from('ssj.simpron@gmail.com', 'Your Application');

            $m->to($user['email'], $user['name'])->subject('Your Reminder!');
        });

        dump(Mail::failures());
	}

	public function samples()
	{
		$user_id = 3265;
		$user = User::findOrFail($user_id);
        $return = true;
         $group = $user->group;
		$members = array();
        $groups = array($user->group);

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
		                    /*
		                    echo $member->name;
		                    echo '<pre>';
		                    print_r($scoreA);
		                    echo'</pre><br>';
                   */
                    foreach ($alternatives as $key => &$data) {
                        //if($key == "Dont Know" && $scoreA['total'][$key] != 0){
	                        $data['total'] += $scoreA['total'][$key];
	                        $data['male'] += $scoreA['male'][$key];
	                        $data['female'] += $scoreA['female'][$key];
                        //}
                    }


                }

                echo '<hr>';
                echo '<pre>';
                print_r($alternatives);
                echo '</pre>';

                $tmp_factors = array();
                $sum_total = 0;
                $sum_male = 0;
                $sum_female = 0;

                foreach ($alternatives as $key => &$data) {
                    $sum_total = $sum_total + $data['total'];
                    $sum_male = $sum_male + $data['male'];
                    $sum_female = $sum_female + $data['female'];
                }
                echo '<hr>';
                echo '<pre>';
                print_r($alternatives);
                echo '</pre>';
                echo '<br>Total General:<pre>';
                print_r($sum_total);
                echo '</pre>';
                echo '<br>Total Male:<pre>';
                print_r($sum_male);
                echo '</pre>';
                echo '<br>Total Female: <pre>';
                print_r($sum_female);
                echo '</pre>';


                foreach ($factors as $alt => $factor) {
                    $tmp_factors['total'][$alt] = (5*$alternatives[$alt]['total'] != 0) ?  round(($sum_total*$factor)/(5*$alternatives[$alt]['total']),0) : 0;
                    $tmp_factors['male'][$alt] = (5*$alternatives[$alt]['male']) ? round(($sum_male*$factor)/(5*$alternatives[$alt]['male']),0) : 0;
                    $tmp_factors['female'][$alt] = (5*$alternatives[$alt]['female']) ? round(($sum_female*$factor)/(5*$alternatives[$alt]['female']),0) : 0;
                }
                echo '<br>Factors: <pre>';
                print_r($tmp_factors);
                echo '</pre>';
                $puntaje = array();
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
                        /*
                        echo $member->name.': <br>';
                        echo ${'point_'.$layer}.' / '.$sum_qty;
                        echo '<br>';
                        */
                        $score_global[$layer] = ($sum_qty != 0) ? round(${'point_'.$layer}/$sum_qty,0) : 0;
                    }

                    $member->report_score = serialize($score_global);
                    $puntaje[] = array('name'=>$member->name, 'score'=>$score_global);
                    //$member->save();

                }
                echo '<br>Puntaje: <pre>';
                print_r($puntaje);
                echo '</pre>';
            }
	}

	public function create(Request $request)
	{
		$group = new Group;
		$recently_val = $group->orderBy('id', 'desc')->offset(0)->limit(1)->get();
		$request['recent_val'] = $recently_val[0];
		return view("quiz.create", $request);
	}


	public function store(Request $request)
	{

		$validator = Validator::make($request->all(), [
            'group_name' => 'unique:bands,name'
        ]);

		if ($validator->fails()) {
            return Response::json(['success'=>false, 'message'=>'Group name already exists.'], 403);
        }

		DB::transaction(function() use ($request, &$group) {
			//create group
			$group = new Group;
			$group->name = $request->group_name;
			$group->email = $request->email_owner;
			$group->teacher_name = $request->name_owner;
			$group->email_counselor = $request->email_counselor; /// SuperItSolution New added 10/17/2019 
			$group->zip = $request->zipcode;
			$group->description = $request->group_description;
			$group->token = $group->generate_token($group->name, uniqid());
			$group->state = 1;
			$group->is_processed = 0;
			$group->start_date = date("Y-m-d", strtotime($request->quizdate)); ////SuperItSolution New added 10/12/2019  //10/16/2019 m/d/y to y-m-d
			$group->email_sent = 0;
			$group->res_date = date("Y-m-d", strtotime($request->resdate)); //SuperItSolution New added 10/12/2019 
			$group->end_date = date("Y-m-d", strtotime($request->resdate)); //SuperItSolution New added 10/15/2019 
			$group->close_date = date("Y-m-d", strtotime($request->resdate)); //SuperItSolution New added 10/15/2019 
			 if(!$group->save())
			 	throw new Exception("Can't create your group");

			$members = json_decode($request->added_members, true);

			if( !is_array($members) || count($members) < 1 )
				throw new Exception("Can't read members list");

			if( !User::multiple_insert($members, $group) ) // add members to group
				throw new Exception("Can't insert members to group");


			//  Send Email To Owner
			Mail::send('quiz.email.success_group',
				['group'=>$group,
				'startDate' => date('F j, Y') ],
				function($msj) use ($group){
				//$msj->subject('Group created successfully');
				$msj->subject('Your class list approval for Social Quotient');
				//$msj->from("info@social-quotient.info", "Social Quotient"); //$group->email, $group->name
				$msj->from("vansloan@hotmail.com", "Social Quotient");
				$msj->to($group->email);
			});
		});

		// Send Email To Members
		$this->dispatch(new InscriptionQuiz('quiz.email.inscription', $group->users, 'I created a test for you!', User::$states[0], User::$states[1],
			$request->quizdate));
		//$this->sendQueueEmail('quiz.email.inscription', $group->users, 'I created a test for you!', User::$states[0], User::$states[1]);

		return Response::json(['success'=>true, 'message'=>'All complete']);
	}

	public function view($id)
	{
		$group = $this->loadGroup($id);
		$members = $group->users;

		return view("quiz.view",['group'=>$group,'members'=>$members]);
	}


	public function updateGroup(Request $request, $id)
	{

		$group = $this->loadGroup($id);

		if($group->email_sent == 0){
			$group->start_date = date('Y-m-d' ,strtotime($request->start_date));
		}

		$group->end_date = date('Y-m-d' ,strtotime('+3 days', strtotime($group->start_date)));


		if ( $group->save() ){

			return redirect("/view/{$group->token}")->with("flash_message", "Save correctly!")->with('flash_type','success');
		}
		else
			return redirect("/view/{$group->token}")->with("flash_message", "Oops! Something was wrong")->with('flash_type','error');
	}


	public function edit()
	{
		$que = Question::all_questions();
		$alt = Alternative::all_alternatives();
		return view("quiz.edit_quiz", compact('que','alt'));
	}

	public function update(Request $request)
	{
		$num_q = 14;
		$num_a = 44;

    //questions
		for($i=2; $i<=$num_q; $i++){
			//question text
			$input_name = "q".$i;
			$text = $request->$input_name;
            //question select
			$select_trait = "t".$i;
			$text2 = $request->$select_trait;

			$quest = Question::find($i);
			$quest->text = $text;
			$quest->trait = $text2;
			$quest->save();
		}
		//alternatives
		for($j=6; $j<=$num_a; $j++){
			$input_name = "a".$j;
			$text = $request->$input_name;

			$alt = Alternative::find($j);
			$alt->text = $text;
			$alt->save();
		}

		return Redirect::to('quiz/edit')->with("flash_message", "Edited quiz correctly");
	}

	public function reemail($id)
	{
		$member = $this->loadUser($id);
		$group = $member->group;

		Mail::send('quiz.email.reemail', ['member' => $member], function ($m) use ($member,$group) {
			$m->from("info@social-quotient.info", "Social Quotient"); //$group->email, $group->name
            $m->to($member->email, $member->name)->subject('Results of Quiz');
        });

        if(Mail::failures()){
			echo json_encode(array('sent'=>false , 'message'=>'Correo NO Enviado'));
		}

		echo json_encode(array('sent'=>true , 'message'=>'Correo Enviado'));
		exit;

	}


	public function take($id, $member_id)
	{
		$group = $this->loadGroup($id);
		$user = $this->loadUser($member_id);

		return $this->checkPermsToQuiz($user, $group, 'take');
	}

	public function quiz($id, $member_id)
	{
		$group = $this->loadGroup($id);
		$user = $this->loadUser($member_id);

		$member = User::where('group_id', $group->id)->first();

		$question = Question::loadFisrtQuiz(Question::$types[0]);

		return $this->checkPermsToQuiz($user, $group, 'quiz', ['member'=>$member, 'question'=>$question]);

	}

	public function nextQuestion(Request $request, $quiz)
	{
		$group = $this->loadGroup($request->group);
		$user =  $this->loadUser($request->user);

		if($quiz == Question::$types[0]){
			$taken_members = explode(',', $request->taken_members);
			$member = User::where('group_id', $group->id)->whereNotIn('token', $taken_members)->first();

			$question = Question::loadFisrtQuiz($quiz);
			$data = ['alternatives'=>$question->alternatives, 'member'=>$member, 'question'=>$question];
			$view = 'quiz._firstquestion';
		}else{
			$taken_questions = explode(',', $request->taken_questions);
			$question = Question::getNextQuestion(Question::$types[1], $taken_questions);
			$data = ['question'=>$question];
			$view = 'quiz._question';
		}

		return view($view, $data);
	}


	public function storeAnswers(Request $request, $quiz)
	{
		$group = $this->loadGroup($request->group);
		$user = $this->loadUser($request->user);

		$add_answers = array();
		$alternativesIds = array();
		$success = false;
		$message = 'Something was wrong';
		$now = date('Y-m-d H:i:s');
		if($quiz == Question::$types[0]){
			$question = Question::findorFail($request->question);
			$answers = json_decode($request->answers, true);
			foreach ($answers as $answer) {
				$add_answers[] = array(
					'user_id'=> $user->id,
					'question_id'=> $question->id,
					'alternative_id'=>$answer['answer'],
					'target_id'=>$this->loadUser($answer['target'])->id,
					'state'=> 1, //($request->repeat_band == 0) ? 1 : 0,
					'created_at'=>$now,
					'updated_at'=>$now,
				);

				$alternativesIds[] = $answer['answer'];

			}
			if($add_answers != array()){

				DB::transaction(function() use ($add_answers, &$success, &$message, $user, $alternativesIds) {
					$success = DB::table('answers')->insert($add_answers);

					$success = $success && Alternative::setScoreToGroupFromUser($user, $add_answers);
					$user->take_quiz = User::$taken_quizes[2];
					$user->save();
					$message = 'All complete';
				});


			}


		}else{
			$answers = json_decode($request->answers, true);
			foreach ($answers as $answer) {
				$add_answers[] = array(
					'user_id'=> $user->id,
					'question_id'=> $answer['question'],
					'alternative_id'=>$answer['answer'],
					'target_id'=>null,
					'created_at'=>$now,
					'updated_at'=>$now,
				);

				$alternativesIds[] = $answer['answer'];
			}

			if($add_answers != array()){
				DB::transaction(function() use ($add_answers, &$success, &$message, $user, $alternativesIds) {
					$success = DB::table('answers')->insert($add_answers);
					$user->scoreB = Alternative::getScoreFromAlternatives($alternativesIds);
					$user->take_quiz = User::$taken_quizes[2];
					$success = $success && $user->save();
					$message = 'All complete';
				});
			}
		}

		return Response::json(['success'=>$success, 'message'=>$message]);
	}

	public function finishQuiz($id, $member_id)
	{
		$group = $this->loadGroup($id);
		$user = $this->loadUser($member_id);

		#return $this->checkPermsToQuiz($user, $group, 'finish');
		return $this->checkPermsToQuiz($user, $group, 'thanks');
	}

	public function requiz($id, $member_id)
	{
		$group = $this->loadGroup($id);
		$user = $this->loadUser($member_id);
		$question = Question::loadFisrtQuiz(Question::$types[1]);
		$total = Question::getTotal(Question::$types[1]);

		#return $this->checkPermsToQuiz($user, $group, Question::$types[1], ['question'=>$question, 'total'=>$total]);
		return $this->checkPermsToQuiz($user, $group, 'requiz', ['question'=>$question, 'total'=>$total]);

	}


	public function completeQuiz($id, $member_id)
	{
		$group = $this->loadGroup($id);
		$user = $this->loadUser($member_id);

		return $this->checkPermsToQuiz($user, $group, 'thanks');
	}


	public function deniedQuiz()
	{
		//$user = Session::pull('app_user');
		//$group = Session::pull('app_group');
		if(!isset($_SESSION['app_group'], $_SESSION['app_user']))
			abort(401, 'Dont show');
		$user = $_SESSION['app_user'];
		$group = $_SESSION['app_group'];

		unset($_SESSION['app_user']); unset($_SESSION['app_group']);
		return view('quiz.denied', ['user'=>$user, 'group'=>$group]);
	}


	public function unavailableQuiz()
	{
		//$user = Session::get('app_user');
		//$group = Session::get('app_group');
		if(!isset($_SESSION['app_group'], $_SESSION['app_user']))
			abort(401, 'Dont show');
		$user = $_SESSION['app_user'];
		$group = $_SESSION['app_group'];
		unset($_SESSION['app_user']); unset($_SESSION['app_group']);
		return view('quiz.unavailable', ['user'=>$user, 'group'=>$group]);
	}



	public function editMember(Request $request, $id)
	{
		$member = $this->loadUser($id);
		$group = $member->group;
		$types = User::$report_types;
		return view("quiz.member.edit", ['member'=>$member, 'types'=>$types, 'group'=>$group]);
	}

	public function updateMember(Request $request, $id)
	{
		$member = $this->loadUser($id);

		$member->email = $request->email;
		$member->photo = $request->photo;
		$member->gender = ($request->gender == '') ? NULL : $request->gender;
		$member->birthdate = ($request->birthdate == '') ? NULL : date('Y-m-d', strtotime($request->birthdate));
		$member->description = ($request->description == '') ? NULL : $request->description;

		if($member->save())
			$response = ['success'=>true, 'message'=>'Save successfully'];
		else
			$response = ['success'=>false, 'message'=>'Something was wrong'];

		return Response::json($response);
	}

	public function uploadMemberPhoto($id)
	{

		$member = $this->loadUser($id);

		$input = Input::all();

		$destinationPath = 'uploads'.DIRECTORY_SEPARATOR.$member->token; // upload path
		if(!is_dir($destinationPath)){
			@mkdir($destinationPath, 0777);
		}

        $extension = Input::file('profile_photo')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = Input::file('profile_photo')->move($destinationPath, $fileName); // uploading file to given path
        $nameFileServer = '/uploads/'.$member->token.'/'.$fileName;
        if ($upload_success) {
        	$check_valid = User::validateProfileImage( asset($nameFileServer) );
        	if($check_valid === false){
        		@unlink($destinationPath.DIRECTORY_SEPARATOR.$fileName);
        		return Response::json(['success'=>false, 'nameFileServer'=>'Invalid Image!']);
        	}

            return Response::json(['success'=>true, 'nameFileServer'=>$nameFileServer]);
            //return Response::json('success', 200);
        } else {
            return Response::json(['success'=>false, 'nameFileServer'=>'Upload Failed!']);
            //return Response::json('error', 400);
        }
	}

	public function uploadTempPhoto( Request $request )
	{
		$input = Input::all();

		$destinationPath = 'uploads'.DIRECTORY_SEPARATOR.'temps'; // upload path
		if(!is_dir($destinationPath)){
			@mkdir($destinationPath, 0777);
		}
		$extension = Input::file('url_photo')->getClientOriginalExtension();
		$fileName = rand(11111, 99999) . strtotime('now') . '.' . $extension;
		$upload_success = Input::file('url_photo')->move($destinationPath, $fileName);
		$nameFileServer = '/uploads/temps/'.$fileName;

		if ($upload_success) {
        	$check_valid = User::validateProfileImage( asset($nameFileServer) );
        	if($check_valid === false){
        		@unlink($destinationPath.DIRECTORY_SEPARATOR.$fileName);
        		return Response::json(array('success'=>false, 'nameFileServer'=>'Invalid Image!'));
        	}
            return Response::json(array('success'=>true, 'nameFileServer'=>asset($nameFileServer)));
        } else {
            return Response::json(array('success'=>false, 'nameFileServer'=>'Upload Failed!'));
        }

	}


	public function updateProfilePhoto($id)
	{
		$member = $this->loadUser($id);

		$input = Input::all();

		$destinationPath = 'uploads'.DIRECTORY_SEPARATOR.$member->token; // upload path
		if(!is_dir($destinationPath)){
			@mkdir($destinationPath, 0777);
		}

        $extension = Input::file('member_profile_image')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = Input::file('member_profile_image')->move($destinationPath, $fileName); // uploading file to given path

        if ($upload_success) {
        	$server_url = asset('/uploads/'.$member->token.'/'.$fileName);
        	$check_valid = User::validateProfileImage($server_url);
        	if($check_valid === false){
        		@unlink($destinationPath.DIRECTORY_SEPARATOR.$fileName);
        		return Response::json(['success'=>false, 'message'=>'Invalid Image!']);
        	}

        	$member->photo = $server_url;
        	$member->save();
            return Response::json([ 'success'=>true, 'message'=>$server_url ]);
            //return Response::json('success', 200);
        } else {
            return Response::json(['success'=>false, 'message'=>'Upload Failed!']);
            //return Response::json('error', 400);
        }
	}

	public function showMember($id)
	{
		$member = $this->loadUser($id);
		$group = $member->group;
		$types = User::$report_types;
		return view("quiz.member.show",['member'=>$member, 'types'=>$types, 'group'=>$group]);
	}

	public function batchMembers()
	{
		ini_set('max_execution_time', 600);
		$members = array();
		$input = Input::all();
		$return = true;
		$message = '';

		$destinationPath = 'uploads'.DIRECTORY_SEPARATOR.'batchs'; // upload path
		if(!is_dir($destinationPath)){
			@mkdir($destinationPath, 0777);
		}

        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) .strtotime('now') .'.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

        if ($upload_success) {

        	$fp = fopen('uploads/batchs/'.$fileName, "r");
        	$i = 1;
        	$emails_arr = array();
        	while(!feof($fp)) {
				$linea = fgets($fp);
				$fields = explode(',', $linea);

				if(count($fields) != 3){
					//
					$return = false;
					$message = 'Incomplete fields in line '.$i;
					break;
				}

				if(trim($fields[0]) == ''){
					$return = false;
					$message = 'Name is required in line '.$i;
					break;
				}

				$photo = @getimagesize(trim($fields[2]));

				$profile_photo = ($photo) ? trim($fields[2]) : null;

				if(trim($fields[1]) != ''){
					if(in_array(trim($fields[1]), $emails_arr))
						continue;

					$emails_arr[] = trim($fields[1]);
				}


				$members[] = array('name'=>trim($fields[0]), 'email'=>trim($fields[1]), 'url_photo'=>$profile_photo);
				$i++;
			}

			fclose($fp);
			$message = ($message == '') ? json_encode($members) : $message;

        } else {
            $return = false;
            $message = 'File did not upload';

        }

        return Response::json(['success'=>$return, 'members'=>$message]);

	}

	public function sendReport(Request $request, $id)
	{
		$member = $this->loadUser($id);
		$group = $member->group;
		$receptor = ['email'=>$group->email, 'name'=>$group->name];

		Mail::send('quiz.email.report', ['report' => $request], function ($m) use ($request, $receptor) {
            $m->from("info@social-quotient.info", "Social Quotient"); //$request->email, $request->name

            $m->to($receptor['email'], $receptor['name'])->subject('A new '.$request->type);
        });

		return Response::json(['success'=>true]);
	}


	private function loadGroup($tokenGroup)
	{
		$group = Group::where('token', $tokenGroup)->firstOrFail();
		return $group;
	}

	private function loadUser($tokenUser)
	{
		$user = User::where('token', $tokenUser)->firstOrFail();
		return $user;
	}


	private function checkPermsToQuiz($user, $group, /*$quiz**/ $request, $otherData = array())
	{
		if($user->group_id  != $group->id){
			//Session::put('app_user', $user);
			//Session::put('app_group', $group);
			$_SESSION['app_user'] = $user;
			$_SESSION['app_group'] = $group;
			return redirect('/denied');
		}

		//dd($group);

		/*if(!$group->isAvailable()){
			//Session::put('app_user', $user);
			//Session::put('app_group', $group);
			$_SESSION['app_user'] = $user;
			$_SESSION['app_group'] = $group;
			return redirect('/unavailable');
		}*/

		if($user->gender == null || $user->birthdate == null){
		  return redirect("/member/$user->token/edit")->with("flash_message", "XX")->with('flash_type','ERROR');
		}
    //else{
      //return redirect("/member/$user->token");
    //}

		$otherData['group'] = $group;
		$otherData['user'] = $user;

		if($request == 'thanks'){
			$ok = $this->checkPercentUserQuiz($group);
		}

		//$pages = $this->getViewsAndRedirects($user->take_quiz, $quiz);
		$pages = $this->getViewsAndRedirects($user->take_quiz, $request);


		//if($user->letTakeQuiz($quiz)){
		if($pages['action'] == 'render'){
			return view($pages['target'], $otherData);
		}
		else{
			return redirect('/'.$pages['target'].'/'.$group->token.'/'.$user->token);
		}
	}

	private function getViewsAndRedirects($take_quiz, /*$quiz*/ $request)
	{
		$indexs = User::$taken_quizes;

		$return = array(
			$indexs[0] => array(
				'take'=>array('action'=>'render', 'target'=>'quiz.take'),
				'quiz'=>array('action'=>'render', 'target'=>'quiz.quiz'),
				'finish'=>array('action'=>'redirect', 'target'=>'take'),
				'requiz'=>array('action'=>'redirect', 'target'=>'take'),
				'thanks'=>array('action'=>'redirect', 'target'=>'take'),
			),
			$indexs[1] => array(
				'take'=>array('action'=>'redirect', 'target'=>'finish'),
				'quiz'=>array('action'=>'redirect', 'target'=>'finish'),
				'finish'=>array('action'=>'render', 'target'=>'quiz.finish'),
				'requiz'=>array('action'=>'render', 'target'=>'quiz.requiz'),
				'thanks'=>array('action'=>'redirect', 'target'=>'finish'),
			),
			$indexs[2] => array(
				'take'=>array('action'=>'redirect', 'target'=>'thanks'),
				'quiz'=>array('action'=>'redirect', 'target'=>'thanks'),
				'finish'=>array('action'=>'redirect', 'target'=>'thanks'),
				'requiz'=>array('action'=>'redirect', 'target'=>'thanks'),
				'thanks'=>array('action'=>'render', 'target'=>'quiz.thanks'),
			),
		);

		return $return[$take_quiz][$request];
	}


	private function sendQueueEmail($view, $users, $subject, $from_state, $to_state)
	{
		$this->dispatch(new InscriptionQuiz($view, $users, $subject, $from_state, $to_state));
	}


	private function checkPercentUserQuiz($group)
	{
		//if completed user 90% update group
		$users = User::where('group_id', '=' , $group->id)->orderBy('id')->get();
		$c_tot =  count($users);

		$users_com = User::where('group_id', '=', $group->id)->where('take_quiz', '=', 'taken second')->get();
		$c_com =  count($users_com);

		$porc = ($c_com/$c_tot) * 100;

		if($porc >= 90 && $c_com > 13){
			$group = Group::find($group->id);
			$group->state = 0;
			$group->close_date = date('Y-m-d');
			return $group->save();
		}else{
			return false;
		}
		//endif
	}


	public function reportOne($member_id)
	{
		$user = $this->loadUser($member_id);
		$group = $user->group;


		/*if( !$group->isClose() ){
			abort(400, 'the group must be closed to see your results');
		}*/

		// if( !$user->isQuizTaken('second') ){
		// 	abort(400, 'You must complete all Quizes');
		// }

		$questions = Question::getQuestions('first');

		if( count($questions) < 1 ){
			abort(400, 'This Quiz don\'t have questions');
		}

		$score = $user->getMyScore('first');
        $score_report = unserialize($user->report_score);

		$total_members = count(Answer::getScoresOfGroup($group->id));

		$percent = Answer::getPercentLosers($user->id, $group->id);
		$presses = array();
		$tmp_score['A'] = $score['total']['A'];
		$tmp_score['B'] = $score['total']['B'];
		$tmp_score['B1'] = $score['total']['Dont Know'];
		$tmp_score['C'] = $score['total']['C'];
		$tmp_score['D'] = $score['total']['D'];

		$presses = array();
		foreach ($tmp_score as $key => $value) {
			$press = new \StdClass;
			$press->text = $key == 'B1' ? "average or Don't Know" : $key;
			$press->qty = $value;
			$presses[] = $press;
		}

		$grouped = Answer::getDistributedScoreOfGroup($group->id);


		$pie_data = array();
		$colors = ["#f45b5b", "#8085e9", "#8d4654", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
      "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"];
      	$i = 0;
		foreach ($grouped as $text => $qty) {
			$pie_data[] = array(
				'name'=>$text,
				'y'=>$qty,
				'color'=>$colors[$i]
				);
			$i++;
		}

		return view("quiz.reports.report-one", [
			'user'=>$user,
			'group'=>$group,
			'questions'=>$questions,
			'percent'=>$percent,
			'presses'=>$presses,
			//'score'=>$score,
			'score_report'=>$score_report,
			'total_members'=>$total_members,
			'grouped'=>$grouped,
			'pie_data'=>$pie_data,
			'let_share'=>true,
			]
		);
	}


	public function reportTwo($member_id)
	{
		$user = $this->loadUser($member_id);
		$group = $user->group;

		/*if( !$group->isClose() ){
			abort(400, 'the group must be closed to see your results');
		}*/

		if( !$user->isQuizTaken('second') ){
			abort(400, 'You must complete all Quizes');
		}

		$total_members = count(Answer::getSecondScoresOfGroup($group->id));
		$percent = Answer::getPercentSecondLosers($user->id, $group->id);
		$score_global_questions = Answer::getGlobalScore();
		$score_group_questions = Answer::getGlobalScoreGroup($group->id);

		foreach ($score_group_questions['males'] as $quiz => $data) {
			$format_score_group_questions[$quiz]['males'] = $data;
		}
		foreach ($score_group_questions['females'] as $quiz => $data) {
			$format_score_group_questions[$quiz]['females'] = $data;
		}

		$my_answers = Answer::getMyAnswersOfSecondQuiz($user->id);
		$first_trait = array();
		$second_trait = array();

		foreach ($my_answers as &$answer) {
			$answer->global_score = $score_global_questions[$answer->question_id];
			$answer->group_score = (array_key_exists($answer->question_id, $format_score_group_questions)) ? $format_score_group_questions[$answer->question_id] : array('males'=>array('total'=>0, 'qty'=>0), 'females'=>array('total'=>0, 'qty'=>0));
			if($answer->question->trait == 0)
				$first_trait[] = $answer;
			else
				$second_trait[] = $answer;
		}

		return view("quiz.reports.report-two", [
			'user'=>$user,
			'group'=>$group,
			'total_members'=>$total_members,
			'percent'=>$percent,
			'first_trait'=>$first_trait,
			'second_trait'=>$second_trait
			]
			);
	}


	public function shareReport(Request $request, $member_id)
	{
		$user = $this->loadUser($member_id);
		$email = $request->email;
		$response = array('success'=>true, 'message'=>'Email sent!');

		Mail::send('quiz.email.share', ['user' => $user, 'group'=>$user->group], function ($m) use ($user, $email) {
            $m->from("info@social-quotient.info", "Social Quotient"); //$user->email, $user->name

            $m->to($email)->subject('Look my results in SocialQuotient');
        });


        if(Mail::failures()){
            $response = array('success'=>false, 'message'=>"Email didn't sent!");
        }else{

	        $user->is_download = 1;
	        $user->save();
        }

        echo json_encode($response); exit;
	}

	public function viewResults($member_id)
	{
		$user = $this->loadUser($member_id);
		$group = $user->group;


		if( !$group->isClose() ){
			//abort(400, 'the group must be closed to see your results');
			//Suprimed for tests, Herlbeng, 20-05-2018
		}

		if( !$user->isQuizTaken('second') ){
			abort(400, 'You must complete all Quizes');
		}

		$questions = Question::getQuestions('first');

		if( count($questions) < 1 ){
			abort(400, 'This Quiz don\'t have questions');
		}

		$score = $user->getMyScore('first');
        $score_report = unserialize($user->report_score);

		$total_members = count(Answer::getScoresOfGroup($group->id));

		$percent = Answer::getPercentLosers($user->id, $group->id);
		$presses = array();
		$tmp_score['A'] = $score['total']['A'];
		$tmp_score['B'] = $score['total']['B'];
		$tmp_score['B1'] = $score['total']['Dont Know'];
		$tmp_score['C'] = $score['total']['C'];
		$tmp_score['D'] = $score['total']['D'];

		$presses = array();
		foreach ($tmp_score as $key => $value) {
			$press = new \StdClass;
			$press->text = $key == 'B1' ? "average or Don't Know" : $key;
			$press->qty = $value;
			$presses[] = $press;
		}

		$grouped = Answer::getDistributedScoreOfGroup($group->id);


		$pie_data = array();
		$colors = ["#f45b5b", "#8085e9", "#8d4654", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
      "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"];
      	$i = 0;
		foreach ($grouped as $text => $qty) {
			$pie_data[] = array(
				'name'=>$text,
				'y'=>$qty,
				'color'=>$colors[$i]
				);
			$i++;
		}

		return view("quiz.reports.report-one", [
			'user'=>$user,
			'group'=>$group,
			'questions'=>$questions,
			'percent'=>$percent,
			'presses'=>$presses,
			'score_report'=>$score_report,
			'total_members'=>$total_members,
			'grouped'=>$grouped,
			'pie_data'=>$pie_data,
			'let_share'=>false,
			]
		);
	}

	public function setSessionImage(Request $request, $member_id)
	{
		$user = $this->loadUser($member_id);

		$image = $request->image;
		$_SESSION['report_chart'] = base64_decode($image);

		echo action("QuizController@downloadPdf", ["member_id"=>$member_id]);
	}

	public function downloadPdf($member_id)
	{
		//require 'vendor/autoload.php';
		$user = $this->loadUser($member_id);
		$group = $user->group;

		/*
		$user->is_download = 1;
		$user->save();
		*/

		if( !$group->isClose() ){
			abort(400, 'the group must be closed to see your results');
		}

		if( !$user->isQuizTaken('second') ){
			abort(400, 'You must complete all Quizes');
		}

		$questions = Question::getQuestions('first');

		if( count($questions) < 1 ){
			abort(400, 'This Quiz don\'t have questions');
		}

		if(! isset($_SESSION['report_chart']) ){
			//abort(400, 'Cannot render Image for Report');
			$my_chart = '';
		}else{
			$my_chart = $_SESSION['report_chart'];
			unset($_SESSION['report_chart']);
		}

		$score = $user->getMyScore('first');
        $score_report = unserialize($user->report_score);

		$total_members = count(Answer::getScoresOfGroup($group->id));

		$percent = Answer::getPercentLosers($user->id, $group->id);
		$presses = array();
		$tmp_score['A'] = $score['total']['A'];
		$tmp_score['B'] = $score['total']['B'];
		$tmp_score['B1'] = $score['total']['Dont Know'];
		$tmp_score['C'] = $score['total']['C'];
		$tmp_score['D'] = $score['total']['D'];

		$presses = array();
		foreach ($tmp_score as $key => $value) {
			$press = new \StdClass;
			$press->text = $key == 'B1' ? "average or Don't Know" : $key;
			$press->qty = $value;
			$presses[] = $press;
		}

		$grouped = Answer::getDistributedScoreOfGroup($group->id);



		$view =  \View::make('quiz.reports.report-one-pdf', [
			'user'=>$user,
			'group'=>$group,
			'questions'=>$questions,
			'percent'=>$percent,
			'presses'=>$presses,
			'score_report'=>$score_report,
			'total_members'=>$total_members,
			])->render();



        //echo($my_chart);
        //PDF::ImageSVG('@'.$my_chart, $x=15, $y=200, $w='180', $h='', $link='http://www.tcpdf.org', $align='', $palign='', $border=1, $fitonpage=false);
        $series = User::$text_scores;
        foreach ($series as $serie) {
        	$my_chart = str_replace('<title>'.$serie.'</title>', '', $my_chart);
        }

        //$my_chart = str_replace('dx="0"', 'x="8" dy="15"', $my_chart);

		PDF::AddPage();
		PDF::writeHTML($view);
		PDF::AddPage();
		PDF::ImageSVG('@'.$my_chart, $x='', $y='', $w='200', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
		PDF::Output('report-one.pdf', 'D');


//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($view);
//        return $pdf->stream('report-one');

	}

	public function quizdate(){
		return view("quiz.quizdate");
	}


}
