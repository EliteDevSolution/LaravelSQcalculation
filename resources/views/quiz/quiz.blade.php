@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
@endsection

@section('content')


<style type="text/css">
	.question-field, .question-field p{
		color: #000000;
	}
	.question-field, .answer-field{
		height: 95px;
	}
</style>
<section class="nicdark_section" id="bng_wrapper_quiz">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">


        <div class="grid grid_12">
            <h1 class="subtitle greydark"><?php echo strtoupper(strtolower($group->name));?></h1>
            <div class="nicdark_space20"></div>
            <h3 class="subtitle greydark"><?php echo strtoupper(strtolower($group->zip));?></h3>
            <div class="nicdark_space20"></div>
            <h5 class="black group-description"><?php echo strtoupper(strtolower($group->description));?> </h5>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left big"><span class="nicdark_bg_yellow nicdark_radius"></span></div>
            <div class="nicdark_space10 hidden-xs"></div>
        </div>


    <div class="quiz-container nicdark_textevidence nicdark_bg_grey nicdark_shadow nicdark_radius left nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
			<div class="row bng_margin_0">
				<div id="answers-container">

				@include('quiz._firstquestion', ['alternatives'=>$question->alternatives, 'member'=>$member, 'question'=>$question])
				</div>
			</div>
			<div class="nicdark_space10"></div>
			<div style="display:none;" class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow">
          <h5 id="progress" class="nicdark_progressbar_title nicdark_bg_yellow nicdark_bg_yellowdark_hover nicdark_radius nicdark_shadow fade-left animate1 animated fadeInLeft" style="width:<?php echo (round(1/count($group->users)*100, 2));?>%">
              <span class="white nicdark_size_big">
              	<span class="number_question">1</span> of <?php echo count($group->users);?>
              </span>
          </h5>
      </div>
			<div class="nicdark_space10 hidden-xs"></div>

		</div>

		<div class="nicdark_space10"></div>

		  <div style="margin: 0;" class="grid grid_3 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr"></div>

        <div class="text-center grid grid_12 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
            <a class="quiz-button next nicdark_btn nicdark_bg_green medium nicdark_shadow nicdark_radius white ">
            	NEXT QUESTION&nbsp;&nbsp;&nbsp;<i class="icon-right-open-outline"></i>
            </a>
            <a class="btn-change-answers nicdark_btn nicdark_bg_violet medium nicdark_shadow nicdark_radius white" style="display: none; margin-top:20px">
            	CHANGE MY ANSWERS&nbsp;<i class="icon-sliders"></i>
            </a>
        </div>

        <div class="quiz-button grid grid_3 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">

        </div>

        <div class="grid grid_3 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr"></div>

      <div class="nicdark_space50">

      <div id="nicdark_window" class="zoom-anim-dialog mfp-hide popup-fixed-width">
        		<div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
        			<div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
        				<h4 class="white text-center" style="margin: 20px; padding: 0px;">Answer the question!</h4>
	        		</div>
	        		<div class="nicdark_margin20">
				        <p class="danger warning-p">Please answer the question before going to the next one</p>
				    </div>
        		</div>

			</div>

			<div id="error_window" class="zoom-anim-dialog mfp-hide popup-fixed-width">
				<div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow" >
        			<div class="nicdark_textevidence nicdark_bg_red nicdark_radius_top">
        				<h4 class="white nicdark_margin20">Opss!</h4>
	        		</div>
	        		<div class="nicdark_margin20">
				        <p>I'm sorry! something was wrong</p>
				    </div>
        		</div>
			</div>

			<div id="check_answer_window" class="zoom-anim-dialog mfp-hide popup-unfixed-width">
			    <div class="nicdark_archive1 nicdark_bg_white nicdark_radius nicdark_shadow" style="text-align:center;">
			        <div class="nicdark_textevidence nicdark_bg_green nicdark_radius_top">
			            <h4 class="white nicdark_margin20">Review your answers</h4>
			        </div>
			        <div class="nicdark_margin20" id="container-check-answers" ></div>
			    </div>

			</div>

			<div id="error_window" class="zoom-anim-dialog mfp-hide popup-fixed-width">
				<div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow" >
        			<div class="nicdark_textevidence nicdark_bg_red nicdark_radius_top">
        				<h4 class="white nicdark_margin20">Opss!</h4>
	        		</div>
	        		<div class="nicdark_margin20">
				        <p>I'm sorry! something was wrong</p>
				    </div>
        		</div>
			</div>

			<div id="change_answer_window" class="zoom-anim-dialog mfp-hide popup-unfixed-width">
			    <div class="nicdark_archive1 nicdark_bg_white nicdark_radius nicdark_shadow" style="text-align:center;">
			        <div class="nicdark_textevidence nicdark_bg_green nicdark_radius_top">
			            <h4 class="white nicdark_margin20">Change your answers</h4>
			        </div>
			        <div class="nicdark_margin20" id="container-change-answers" >

			        </div>
			    </div>
			</div>

			<div id="window_much_repeat" class="zoom-anim-dialog mfp-hide popup-fixed-width">
			    <div class="nicdark_archive1 nicdark_bg_white nicdark_radius nicdark_shadow" style="text-align:center;">
			        <div class="nicdark_textevidence nicdark_bg_violet nicdark_radius_top">
			            <h4 class="white nicdark_margin20">Hey You!!</h4>
			        </div>
			        <div class="nicdark_margin20" id="container-change-answers" >
			            <h4>You have more than 10 questions with the same answer. This quiz will not be rated!! </h4>
			        </div>
			    </div>
			</div>


        </div>
    </div>
    <!--end nicdark_container-->

</section>
@endsection

@section('javascript')
<script type="text/javascript">

	var current_member = '';
	var user = '';
	var taken_members = '';
	var question = '';
	var group = '';
	var answers = '';
	var current_answer = '';
	var total_questions = '';
	var alert_message = '';
	var backup_questions = '';

	var step = '';

	var milestones = '';

	var number_question = '';

	var max_num_repeat = '';


</script>

<script type="text/javascript">
$(document).on('click', '.without-href', function(e){
	e.preventDefault();
	return false;
});
</script>


<script type="text/javascript">
$(document).ready(function(){
	// Initialize values
	user = "<?php echo $user->token;?>";
	taken_members = new Array();
	question = "<?php echo $question->id;?>";
	group = "<?php echo $group->token;?>";
	answers = new Array();
	total_questions = '<?php echo count($group->users);?>';
	alert_message = 'You can change yours answers';
	backup_questions = {
		question_text : "<?php echo $question->text;?>",
		question_id	  : "<?php echo $question->id;?>",
		alternatives  : <?php echo json_encode($question->alternatives);?>,
		question_body : new Array()
	};

	total_questions = parseInt(total_questions);
	step = Math.floor(total_questions / 3);
	milestones = (total_questions % 3 == 0) ? [step, step*2, step*3] : [step, step*2, step*3, total_questions-1];

	number_question = 1;
	max_num_repeat = 3;

	// functions
	function check_button(){
		if(number_question == total_questions){
			var button = jQuery('.next');
			button.removeClass('next');
			button.addClass('submit');
			button.html('FINISH&nbsp;&nbsp;&nbsp;<i class="icon-right-open-outline"></i>');
		}
	};

	function check_anwsered_questions (src){
		console.log(src);
		var milestone = milestones.indexOf(number_question-1);

		if(src == '#change_answer_window'){
			tope = 	number_question-1;
			fire_review_answers(tope, src);

		}else{

			if( milestone == -1 )
				return false;

			if (typeof(src)==='undefined') src = '#check_answer_window';

			// Open Modal
			fire_review_answers(milestones[milestone], src);
		}


	};

	function fire_popup(src, opt){
		if (typeof(opt)==='undefined') opt = true;

		if(opt == true){
			$.magnificPopup.open({
	            items :{
	                src : src,
	            },
	            type: 'inline',

	            fixedContentPos: false,
	            fixedBgPos: true,

	            overflowY: 'auto',

	            closeBtnInside: true,
	            closeOnBgClick : false,
	            preloader: false,

	            midClick: true,
	            removalDelay: 300,
	            mainClass: 'my-mfp-zoom-in'
	        });
		}else{
			$.magnificPopup.open({
	            items :{
	                src : src,
	            },
	            type: 'inline',

	            fixedContentPos: true,
	            fixedBgPos: true,

	            overflowY: 'auto',

	            showCloseBtn : false,
	            preloader: false,

	            midClick: true,
	            removalDelay: 300,
	            mainClass: 'my-mfp-zoom-in'
	        });
		}
	};


	function fire_review_answers(tope, src_container){

		if (typeof(src_container)==='undefined') src_container = '#check_answer_window';

		// Put content
		var repeat = 1;
		for (var y = 0; y < backup_questions.question_body.length; y++) {
			if( backup_questions.question_body[0].selected_alternative == backup_questions.question_body[y].selected_alternative && y != 0)
				repeat = repeat + 1;
		}

		if( src_container == '#check_answer_window' ){
			if(repeat == backup_questions.question_body.length && repeat != 1)
				alert_message = 'All your answers are the same... Are you sure?';
			else
				alert_message = 'Review your answers. Every letter should have almost the same number of persons';

			var content_changes = ''+
				'<div class="row bng_without_lateral_margin">'+
				 '<div class="col-xs-12 col-md-12"><h6 class="alert alert-warning">'+alert_message+'</h6></div>'+
				 '<div class="col-xs-12 col-md-12"><h5><strong>'+backup_questions.question_text+'</strong></h5></div>'+
				'</div>';
		}else{
			var content_changes = ''+
				'<div class="row bng_without_lateral_margin">'+
				 '<div class="col-xs-12 col-md-12"><h5><strong>'+backup_questions.question_text+'</strong></h5></div>'+
				'</div>';
		}

		content_changes = content_changes + '<div class="row hidden-xs hidden-sm bng_without_lateral_margin">';
		content_changes = content_changes + '<div class="col-md-6 nicdark_bg_blue nicdark_radius bng_height_76"></div>';
		for (var k = 0; k < backup_questions.alternatives.length; k++) {

      if(backup_questions.alternatives[k].id == 5) {
        content_changes = content_changes +
  			'<div class="col-md-2 text-center nicdark_bg_blue nicdark_radius border-left-dashed bng_height_76">'+
  				'<p class="white bng_padding_20"><strong class="alternative-text text-center">'+ "Don't Know" +'</strong></p>'+
  			'</div>';
      } else {
        content_changes = content_changes +
  			'<div class="col-md-1 text-center nicdark_bg_blue nicdark_radius border-left-dashed bng_height_76">'+
  				'<p class="white bng_padding_20"><strong class="alternative-text text-center">'+backup_questions.alternatives[k].text+'</strong></p>'+
  			'</div>';
      }
		}

		/*content_changes = content_changes +
			'<div class="col-md-2 text-center nicdark_bg_blue nicdark_radius bng_height_76 border-left-dashed">'+
				'<p class="white bng_padding_20"><strong class="alternative-text text-center">'+backup_questions.alternatives[k].text+'</strong></p>'+
			'</div>';*/

		content_changes = content_changes + '</div>' ;
		for (var i = 0 ; i < backup_questions.question_body.length; i++) {
			content_changes = content_changes +
			'<div class="row hidden-xs hidden-sm bng_without_lateral_margin">' +
				'<div class="col-md-1" style="padding:10px 0;">'+
					'<img src="'+backup_questions.question_body[i].target_image+'" style="width:36px; height:36px;"/>'+
				'</div>'+
				'<div class="col-md-5" style="padding:10px 0;">'+
					'<h5 class="text-left">'+backup_questions.question_body[i].target_text+'</h5>'+
				'</div>';

				for (var j = 0; j < backup_questions.alternatives.length - 1; j++) {


					if( backup_questions.alternatives[j].id == backup_questions.question_body[i].selected_alternative){
						icon = '<i class="icon-ok-outline"></i>';
						cssclass = 'nicdark_bg_green';
					}else{
						icon = '<i class="icon-cancel-outline"></i>';
						cssclass = 'nicdark_bg_red';
					}

          if(backup_questions.alternatives[j].id == 5) {
            content_changes = content_changes +
  					'<div class="col-md-2 text-center" style="padding:10px 0;">'+
  						'<a data-id="'+backup_questions.alternatives[j].id+'" data-target="'+backup_questions.question_body[i].number+'" href="#" class="select-change-answer nicdark_btn_icon '+cssclass+' small nicdark_radius_circle white">'+
  							icon+
  						'</a>'+
  					'</div>';
          } else {
            content_changes = content_changes +
  					'<div class="col-md-1 text-center" style="padding:10px 0;">'+
  						'<a data-id="'+backup_questions.alternatives[j].id+'" data-target="'+backup_questions.question_body[i].number+'" href="#" class="select-change-answer nicdark_btn_icon '+cssclass+' small nicdark_radius_circle white">'+
  							icon+
  						'</a>'+
  					'</div>';
          }

				}

				if( backup_questions.alternatives[j].id == backup_questions.question_body[i].selected_alternative){
						icon = '<i class="icon-ok-outline"></i>';
						cssclass = 'nicdark_bg_green';
					}else{
						icon = '<i class="icon-cancel-outline"></i>';
						cssclass = 'nicdark_bg_red';
					}

				content_changes = content_changes +
				'<div class="col-md-1 text-center" style="padding:10px 0;">'+
					'<a data-id="'+backup_questions.alternatives[j].id+'" data-target="'+backup_questions.question_body[i].number+'" href="#" class="select-change-answer nicdark_btn_icon '+cssclass+' small nicdark_radius_circle white">'+
						icon+
					'</a>'+
				'</div>';

			content_changes = content_changes + '</div>';
		}

		for (var i = 0 ; i < backup_questions.question_body.length; i++) {
			content_changes = content_changes +
			'<div class="row well hidden-md hidden-lg bng_without_lateral_margin">' +
			'<div class="col-xs-3 text-center" style="height:40px;">'+
				'<img src="'+backup_questions.question_body[i].target_image+'" style="width:36px; height:36px;"/>'+
			'</div>'+
			'<div class="col-xs-9" style="height:40px;">'+
				'<h5 class="text-left">'+backup_questions.question_body[i].target_text+'</h5>'+
			'</div>';

			for (var k = 0; k < backup_questions.alternatives.length; k++) {


          if(backup_questions.alternatives[k].id == 5) {
              content_changes = content_changes + '<div class="col-xs-4 text-center" style="padding: 10px 0">'+
      					'<p class="gray"><strong class="alternative-text text-center">'+"Don't Know"+'</strong></p>'+
      				'</div>';
          } else {
            content_changes = content_changes +
    				'<div class="col-xs-2 text-center" style="padding: 10px 0;">'+
    					'<p class="gray"><strong class="alternative-text text-center">'+backup_questions.alternatives[k].text+'</strong></p>'+
    				'</div>';
          }


			}

			content_changes = content_changes + '<div class="clearfix"></div>';

			for (var j = 0; j < backup_questions.alternatives.length - 1; j++) {


				if( backup_questions.alternatives[j].id == backup_questions.question_body[i].selected_alternative) {
					icon = '<i class="icon-ok-outline"></i>';
					cssclass = 'nicdark_bg_green';
				} else {
					icon = '<i class="icon-cancel-outline"></i>';
					cssclass = 'nicdark_bg_red';
				}

        if(backup_questions.alternatives[j].id == 5) {
          content_changes = content_changes +
  				'<div class="col-xs-4 text-center">'+
  					'<a data-id="'+backup_questions.alternatives[j].id+'" data-target="'+backup_questions.question_body[i].number+'" href="#" class="select-change-answer nicdark_btn_icon '+cssclass+' small nicdark_radius_circle white">'+
  						icon+
  					'</a>'+
  				'</div>';
        } else {
          content_changes = content_changes +
  				'<div class="col-xs-2 text-center" style="padding:0 5px">'+
  					'<a data-id="'+backup_questions.alternatives[j].id+'" data-target="'+backup_questions.question_body[i].number+'" href="#" class="select-change-answer nicdark_btn_icon '+cssclass+' small nicdark_radius_circle white">'+
  						icon+
  					'</a>'+
  				'</div>';
        }

			}

			if( backup_questions.alternatives[j].id == backup_questions.question_body[i].selected_alternative){
				icon = '<i class="icon-ok-outline"></i>';
				cssclass = 'nicdark_bg_green';
			}else{
				icon = '<i class="icon-cancel-outline"></i>';
				cssclass = 'nicdark_bg_red';
			}

			content_changes = content_changes +
			'<div class="col-xs-2 text-center" style="padding:0 5px">'+
				'<a data-id="'+backup_questions.alternatives[j].id+'" data-target="'+backup_questions.question_body[i].number+'" href="#" class="select-change-answer nicdark_btn_icon '+cssclass+' small nicdark_radius_circle white">'+
					icon+
				'</a>'+
			'</div><div class="clearfix"><hr></div>'+
			'</div>';


		}

		if( src_container == '#check_answer_window' ){
			$('#container-check-answers').html(content_changes + '<a href="#" id="bnt_close_popup" class="nicdark_btn nicdark_bg_green medium nicdark_shadow nicdark_radius white nicdark_margin10">ACCEPT</a>');
			fire_popup(src_container, false);
		}else{

			$('#container-change-answers').html(content_changes+'<a href="#" id="bnt_close_popup" class="nicdark_btn nicdark_bg_green medium nicdark_shadow nicdark_radius white nicdark_margin10">ACCEPT</a>');
			fire_popup(src_container);
		}

	};



	$('#principal-menu').css('display', 'none');
	$('#principal-menu').prev().css('display', 'none');
	check_button();

	$(document).on('click', '.answer', function(e){

		e.preventDefault();
		links = $('.answer');
		$.each(links, function(i, link){
			$(link).addClass('nicdark_bg_red');
			$(link).find('i').addClass('icon-cancel-outline');
		});
		$(this).removeClass('nicdark_bg_red');
		$(this).find('i').removeClass('icon-cancel-outline');

		$(this).addClass('nicdark_bg_green');
		$(this).find('i').addClass('icon-ok-outline');
		current_answer = $(this).attr('data-id');

		return false;

	});


	$(document).on('click', '.next', function(e){
		e.preventDefault();
		$('.btn-change-answers ').css('display', 'inline-block');
		if(current_answer != ''){

			current_member = $('#taken_member').val();
			var target_image = $('#target-image').attr('src');
			var target_text = $('#target-text').text();



			taken_members.push(current_member);

			answers.push({answer: current_answer, target: current_member});

			backup_questions.question_body.push({
				number : number_question,
				target_id : current_member,
				target_text: target_text,
				target_image : target_image,
				selected_alternative : current_answer
			});

			console.log(answers);
			takens = taken_members.join(',');
			$.ajax({
				url : '<?php echo action("QuizController@nextQuestion", ["quiz"=>$question->type]); ?>',
				type : 'post',
				data : {group:group, user:user, question:question, taken_members:takens},
			}).done(function(response){
				$('#answers-container').html(response);
				current_member = '';
				current_answer = '';
				number_question = taken_members.length + 1;
				$.each($('.number_question'), function(i, q){
					$(q).text(number_question.toString());
				});

				progress = Math.round(number_question/total_questions*10000)/100;
				$('#progress').css('width', progress.toString()+'%');
				check_anwsered_questions();
				check_button();

			}).fail(function(err){
				console.log(err);
				answers.splice((answers.length-1), 1);
				taken_members.splice((taken_members.length-1), 1);
				backup_questions.question_body.splice((backup_questions.question_body.length-1), 1);
			});

		}else{
			fire_popup('#nicdark_window');
		}

	});



	$(document).on('click', '#bnt_close_popup', function(e){
		e.preventDefault();
		$.magnificPopup.close();
	});


	$(document).on('click', '.check_answer', function(e){
		e.preventDefault();
		new_answer = $(this).attr('data-id');

		index_answer = $(this).attr('data-target');
		links = $('.check_answer[data-target="'+index_answer+'"]');
		$.each(links, function(i, link){
			$(link).addClass('nicdark_bg_red');
			$(link).find('i').addClass('icon-cancel-outline');
		});
		$(this).removeClass('nicdark_bg_red');
		$(this).find('i').removeClass('icon-cancel-outline');

		$(this).addClass('nicdark_bg_green');
		$(this).find('i').addClass('icon-ok-outline');

		answers[index_answer-1].answer = new_answer;
		backup_questions.question_body[index_answer-1].selected_alternative = new_answer;
	});



	$(document).on('click', '.submit', function(e){
		var repeat_band = 0;

		if(current_answer != ''){
			current_member = $('#taken_member').val();
			taken_members.push(current_member);
			answers.push({answer: current_answer, target: current_member});

			// Review 10
			var rev_tope = answers.length - max_num_repeat;


			for (var i = 0; i <= rev_tope; i++) {
				var repeat_counter = 0;
				for (var j = 0; j < max_num_repeat; j++) {
					if(answers[i].answer == answers[j].answer){
						repeat_counter++;
					}
				}

				if(repeat_counter >= max_num_repeat){
					// you have repeated answers
					repeat_band = 1;
					break;
				}
			}

			if(repeat_band == 1){
				// fire popup
				fire_popup('#window_much_repeat');

				setTimeout(function(){
					$.magnificPopup.close();
					$.ajax({
						url : '<?php echo action("QuizController@storeAnswers", ["quiz"=>$question->type]); ?>',
						data : {group:group, user:user, question:question, answers:JSON.stringify(answers), repeat_band:repeat_band},
						type : 'post',
						dataType : 'json'
					}).done(function(response){
						if(response.success){
							window.location.href = '<?php echo action("QuizController@finishQuiz", ["id"=>$group->token, "member_id"=>$user->token]);?>';
						}else{
							console.log(response.msg);
							fire_popup('#error_window');
						}
					}).fail(function(err){
						console.log(err);
						fire_popup('#error_window');
					});

				}, 5550);
			}else{

				$.ajax({
					url : '<?php echo action("QuizController@storeAnswers", ["quiz"=>$question->type]); ?>',
					data : {group:group, user:user, question:question, answers:JSON.stringify(answers), repeat_band:repeat_band},
					type : 'post',
					dataType : 'json'
				}).done(function(response){
					if(response.success){
						window.location.href = '<?php echo action("QuizController@finishQuiz", ["id"=>$group->token, "member_id"=>$user->token]);?>';
					}else{
						console.log(response.msg);
						fire_popup('#error_window');
					}
				}).fail(function(err){
					console.log(err);
					fire_popup('#error_window');
				});
			}


		}else{
			fire_popup('#nicdark_window');
		}
	});


	$(document).on('click', '.btn-change-answers', function(e){
		e.preventDefault();

		check_anwsered_questions('#change_answer_window');

	});

	$(document).on('click', '.select-change-answer', function(e){
		e.preventDefault();
		reanswer = $(this).attr('data-id');
		retarget = $(this).attr('data-target');

		links = $('.select-change-answer[data-target="'+retarget+'"]');
		$.each(links, function(i, link){
			$(link).addClass('nicdark_bg_red');
			$(link).find('i').addClass('icon-cancel-outline');
		});

		$(this).removeClass('nicdark_bg_red');
		$(this).find('i').removeClass('icon-cancel-outline');

		$(this).addClass('nicdark_bg_green');
		$(this).find('i').addClass('icon-ok-outline');

		answers[retarget - 1].answer = reanswer;
		backup_questions.question_body[retarget - 1].selected_alternative = reanswer;
		//console.log(backup_questions);
	});

});

</script>
@endsection
