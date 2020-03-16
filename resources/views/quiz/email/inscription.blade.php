@extends('layouts.master_email')
@section('content')
<section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img5">

    <div class="nicdark_filter greydark">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <div class="nicdark_space40"></div>
                <h1 class="subtitle" style="color:black"><?php echo strtoupper(strtolower($user->group->name));?></h1>
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_white nicdark_radius"></span></div>
                <div class="nicdark_space40"></div>
                
            </div>
        </div>
        <!--end nicdark_container-->
    </div>
</section>
<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div class="nicdark_space50"></div>

		<div class="grid grid_6 black">
                
                <!-- Herlbeng, 28-05-2018 -->

                IMPORTANT: Click on Go to My Profile to verify its accuracy and to add a few more items - SAVE this email until your class quiz activity is completed.<br /><br />

            Hello <?php echo $user->name;?>,<br /><br />

            Your teacher at <?php echo (isset($user->group->name)) ? $user->group->name : "";?> High School  has likely told you to expect this email.   He/ She is planning for your class to do an exercise as described in the newspaper article below. 2500 high school students, mainly in the San Francisco Bay Area, have done a similar quiz exercise.<br /><br />

            The teacher has planned 30 minute Social Quotient class exercise next week on <strong><?php echo $quizdate; ?></strong> Many students have gotten a direct benefit from this Social Quotient quiz. They have used their resulting SQ report when applying for jobs and in college admissions. You can read comments from employers and colleges on the first page of http://vansloan.wix.com/social-quotient.<br /><br />

            Your teacher has entered your name and email address to start the Social Quotient system for your class. Please click on <a class="red" href="<?php echo url('/member/'.$user->token.'/edit'); ?>">Go To My Profile</a> to verify its accuracy and to add a few more items. One helpful item is a face photo of yourself, usually dragged from your computer to the photo spot on the clicked site. That photo will help your classmates identify you as they assign a mark to each student.<br /><br />


            Students with a valid email address will be sent the results of their Social Quotient quiz - example shown at <a class="red" href="http://vansloan.wixsite.com/social-quotient/sq-report">http://vansloan.wixsite.com/social-quotient/sq-report</a>. Except for your teacher and counseling office, your SQ report is private. It will not be available to anyone else unless you choose that. For example, you could show your SQ score on your smart phone in a job interview.
            <br /><br />

            To keep the SQ process fair for everyone, don't allow anyone to influence your vote. Do tell your teacher if a classmate pressures you; the SQ report for that person might be deleted as invalid.<br /><br />

            Good luck in your class SQ exercise.<br /><br />

            Van Sloan <br/>
            Inventor and Trademark holder of "Social Quotient"

            <hr>

            Check out the newspaper article on another high school class that took the SQ quiz. It is read by most survey takers prior to their class meeting on Social Quotient.<br />

            <br />It's web address is: <a class="red" href="http://www.social-quotient.info/sq.4mg.com/ru_social.htm">http://www.social-quotient.info/sq.4mg.com/ru_social.htm</a><br />

        </div>

        <div class="grid grid_6">
            <!--start table-->
            <div class="nicdark_textevidence nicdark_bg_grey nicdark_shadow nicdark_radius left overflow_scroll">
                <!--
                <table class="nicdark_table extrabig nicdark_bg_blue nicdark_radius ">
                    <thead class="nicdark_border_blue">
                        <tr>
                            <td colspan="2"><h4 class="white">ABOUT QUIZ</h4></td>
                        </tr>
                    </thead>
                    <tbody class="nicdark_bg_grey nicdark_border_grey">
                        
                        <tr>
                            <td>
                            	<a href="#" class="nicdark_btn_icon nicdark_bg_green small nicdark_radius_circle white">
                            		<i class="icon-calendar-1"></i>
                            	</a>
                            </td>
                            <td><p>Here start_date to end_date</p></td>
                        </tr>
                        <tr>
                            <td>
                            	<a href="#" class="nicdark_btn_icon nicdark_bg_red small nicdark_radius_circle white">
                            		<i class="icon-users-1"></i>
                            	</a>
                            </td>
                            <td><p>created by <a mailto="<?php echo $user->group->email;?>"><?php echo $user->group->email;?></a></p></td>
                        </tr>
                        <tr>
                            <td>
                            	<a href="#" class="nicdark_btn_icon nicdark_bg_green small nicdark_radius_circle white">
                            		<i class="icon-location-outline"></i>
                            	</a>
                            </td>
                            <td><p><?php echo $user->group->zip; ?></p></td>
                        </tr>
                    </tbody>
                </table>
                -->

                <!--
                <div class="nicdark_space50"></div>
				<div class="nicdark_focus center">
		            <div class="nicdark_margin10">
		                <a href="<?php echo action('QuizController@editMember', ['id' => $user->token]); ?>" class="mail-link nicdark_margin10"  title="Go to My Profile">
		                	<i class="icon-user-1" style="padding-right: 10px;"></i>
                      <span style="text-transform: capitalize;
                    	color: #74cee4;
                    	font-family: 'Raleway', sans-serif;">Go to My Profile</span>
		                </a>
		            </div>
		        </div>
            </div>
            -->
            <!--end table-->
        </div>

    </div>
    <!--end nicdark_container-->

</section>
<!--end section-->
@endsection
