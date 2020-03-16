@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')

<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

		<div class="nicdark_container bng-description-title">
	        <h2 class="color_404547">
	            <strong>"{{$group->name}}"</strong>
	        </h2>
	        <div class="nicdark_space10"></div>
	        <h3><?php echo strtoupper(strtolower($group->zip));?></h3>
	        <div class="nicdark_space20"></div>
	        <div class="bng-subtitle-content color_404547">
	            <h5 class="black group-description"> <?php echo strtoupper(strtolower($group->description));?> </h5>
	        </div>
	        <div class="nicdark_space20"></div>
	        <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius" style="width: 25%"></span></div>
	    </div>
	    <div class="nicdark_space50"></div>

        <div class="nicdark_textevidence nicdark_bg_grey nicdark_shadow nicdark_radius left overflow_scroll">
			<table id="quiz-container" class="nicdark_table extrabig nicdark_bg_blue nicdark_radius ">
				@include('quiz._question', ['question'=>$question])
			</table>
			<div class="nicdark_space20"></div>

      <!--
			<div class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow">
                <h5 id="progress" class="nicdark_progressbar_title nicdark_bg_yellow nicdark_bg_yellowdark_hover nicdark_radius nicdark_shadow fade-left animate1 animated fadeInLeft" style="width:<?php echo (round(1/$total*100, 2));?>%">
                    <span class="white nicdark_size_big">
                    	<span id="number_question">1</span> of <?php echo $total;?>
                    </span>
                </h5>
      </div>
      <div class="nicdark_space20"></div>
    -->

		</div>
		<div class="nicdark_space50"></div>
		<div class="grid grid_5 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
		</div>
		<div class="grid grid_7 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
            <a class="next nicdark_btn nicdark_bg_green medium nicdark_shadow nicdark_radius white nicdark_press">NEXT&nbsp;&nbsp;&nbsp;<i class="icon-right-open-outline"></i></a>
        </div>
        <div class="nicdark_space50">
        	<div id="nicdark_window" class="zoom-anim-dialog mfp-hide popup-fixed-width">
				<div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
        			<div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
        				<h4 class="white text-center" style="margin: 20px; padding: 0px;">Answer the question!</h4>
	        		</div>
	        		<div class="nicdark_margin20">
				        <p class="warning-p">Please answer the question before going to the next one</p>
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
        </div>
    </div>
    <!--end nicdark_container-->

</section>
@endsection

@section('javascript')
<script type="text/javascript">
	var current_member = '';
	var user = "<?php echo $user->token;?>";
	var group = "<?php echo $group->token;?>";
	var total_questions = '<?php echo $total;?>';
	total_questions = parseInt(total_questions);

	var taken_questions = [];
	var current_question = "";
	var answers = [];
	var current_answer = '';
	var number_question = 1;

	function check_button()
	{
		if(number_question == total_questions){
			button = $('.next');
			button.removeClass('next');
			button.addClass('submit');
			button.html('FINISH&nbsp;&nbsp;&nbsp;<i class="icon-right-open-outline"></i>');
		}
	}

	function fire_popup(src)
	{
		$.magnificPopup.open({
            items :{
                src : src,
            },
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
	}

	jQuery(document).ready(function($){
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


		});

		$(document).on('click', '.next', function(e){
			e.preventDefault();

			if(current_answer != ''){
				current_question = $('#question').val();
				taken_questions.push(current_question);
				answers.push({answer: current_answer, question: current_question});

				takens = taken_questions.join(',');

				$.ajax({
					url : '<?php echo action("QuizController@nextQuestion", ["quiz"=>$question->type]); ?>',
					type : 'post',
					data : {group:group, user:user, taken_questions:takens},
				}).done(function(response){
					$('#quiz-container').html(response);
					current_question = '';
					current_answer = '';
					number_question = taken_questions.length + 1;
					$('#number_question').text(number_question.toString());
					progress = Math.round(number_question/total_questions*10000)/100;

					$('#progress').css('width', progress.toString()+'%');
					check_button();
				}).fail(function(err){
					console.log(err);
					answers.splice((answers.length-1), 1);
					taken_questions.splice((taken_questions.length-1), 1);
				});

			}else{
				fire_popup('#nicdark_window');
			}

		});

		$(document).on('click', '.submit', function(e){
			if(current_answer != ''){
				current_question = $('#question').val();
				taken_questions.push(current_question);
				answers.push({answer: current_answer, question: current_question});

				$.ajax({
					url : '<?php echo action("QuizController@storeAnswers", ["quiz"=>$question->type]); ?>',
					data : {group:group, user:user, answers:JSON.stringify(answers)},
					type : 'post',
					dataType : 'json'
				}).done(function(response){
					if(response.success){
						//window.location.href = '<?php echo action("QuizController@completeQuiz", ["id"=>$group->token, "member_id"=>$user->token]);?>';
						window.location.href = '<?php echo url("/")."/thanks/".$group->token."/".$user->token;?>';
					}else{
						console.log(response.msg);
						fire_popup('#error_window');
					}
				}).fail(function(err){
					console.log(err);
					fire_popup('#error_window');
				});

			}else{
				fire_popup('#nicdark_window');
			}
		})
	});
</script>
@endsection
