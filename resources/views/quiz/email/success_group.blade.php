@extends('layouts.master_email')
@section('content')
<section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img5" style="background:white">

    <div class="nicdark_filter greydark">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <div class="nicdark_space40"></div>
                <h1 class="subtitle" style="color:black"><?php echo strtoupper(strtolower($group->name));?></h1>
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

<!-- herlbeng, 31-05-2018, new mail text -->

        <hr>
        CONFIDENTIAL<br />
        Please do NOT share this email information with students or the media.<br /><br />

        Dear Teacher <?php echo $group->teacher_name;?>,<br /><br />

        This email accompanies a set of Social Quotient reports for a classroom/group of students at <?php echo $group->name;?> school in zip code <?php echo $group->zip;?>. These reports are based on a smartphone survey by classmates on <?php echo $group->name;?>, supervised by you. The head counselor at your school is also getting this same set of SQ reports. Individual SQ reports are being sent to each student involved.<br /><br />

        As described in my web page http://vansloan.wixsite.com/social-quotient/impress-top-colleges many of these individual SQ reports can be helpful in college admissions. When one of your students asks you to write a recommendation for college, you are encouraged to attach a copy of that student's SQ report (if favorable) as backup documentation. A favorable report is one with a SQ score of 90 or above. Over 2500 students, mostly in California, have received SQ reports.<br /><br />

        The reason for the confidentiality of this email is to maintain the integrity of the Social Quotient process. There have been a few cases where a student has gotten from a classmate a SQ report with a high score, then changed the name on it to his. That is why we do not recommend that students send their SQ report directly to colleges.<br /><br />

        Another possible problem Is student bullying to request high SQ marks for certain individuals or low marks to less popular students. There is a part of the SQ system where a student can email a note to his teacher describing a problem. If, after investigation, you feel action is needed, you can have an inaccurate SQ report deleted – and/or have it tagged in the Counseling office.<br /><br />

        Some students who are applying for local jobs have used their SQ reports to show employers that they have useful social skills. Local hiring managers are enthusiastic about getting such information, as seen by their comments on SQ at http://www.social-quotient.info/sq.4mg.com/k_employers.htm . We recommend that employers check with school counseling offices to verify the accuracy of the SQ scores that students show on their smartphones. Employers also like that SQ research shows that there is almost no racial bias in SQ scores - see http://www.social-quotient.info/sq.4mg.com/traits_2437.htm .<br /><br />

        Please feel free to send your comments on the SQ process to me at vansloan@yahoo.com. We aim to make the system smooth and useful to all who are involved.<br /><br />

        Cordially,<br />
        <b>Van Sloan, developer of the Social Quotient system<br />
        Princeton BSE and Stanford MBA<b><br />

        <hr>

        </div>

        <div class="grid grid_6">
            <!--start table-->
            <!--
            <div class="nicdark_textevidence nicdark_bg_grey nicdark_shadow nicdark_radius left overflow_scroll">

                <div class="nicdark_space50"></div>
				<div class="nicdark_focus center">
		            <div class="nicdark_margin10">

                  <a href="<?php echo action('QuizController@view', ['id' => $group->token]); ?>" class="mail-link nicdark_margin10" title="View Group">
                      <i class="icon-user-1" style="padding-right: 10px;"></i>
                      <span style="text-transform: capitalize;
                    	font-family: 'Raleway', sans-serif;">View my Group</span>
                  </a>

		            </div>
		        </div>
            </div>-->
            <!--end table-->
        </div>

    </div>
    <!--end nicdark_container-->

</section>
<!--end section-->
@endsection
