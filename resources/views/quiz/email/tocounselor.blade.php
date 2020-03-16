@extends('layouts.master_email')
@section('content')
<section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img5" style="background:white">

    <div class="nicdark_filter greydark">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <div class="nicdark_space40"></div>
                <h1 class="white subtitle"><?php echo strtoupper(strtolower($group->name));?></h1>
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

        <hr>
        Email to the Head Counselor's office <br /><br />
        This email explains the set of Social Quotient reports that you are getting online.
        They were generated from data recently provided by a class of teacher  <?=strtoupper(strtolower($group->teacher_name))?>  at your school.  
        The SQ report scores reflect the interpersonal skills of an individual, as rated by 25 or more classmates. <br /><br />

        The primary value of these SQ reports is to college admissions offices.  See the comments of officials at Harvard, Penn, Princeton, and  UC San Diego on their potential use of these SQ reports.  Their comments are at  https://vansloan.wixsite.com/social-quotient/impress-top-colleges and its next page: https://vansloan.wixsite.com/social-quotient/college-apply <br /><br />
        
        For students getting average or above SQ scores (from the marks of their classmates), it is recommended that counseling offices include their SQ reports with other data like grade transcripts you send to colleges where your students are applying.  It could only help your students.  College admissions officers particularly like that, for the first time, they can see numerical ratings on an applicant's likability, as they now get with academic SAT or ACT scores.  Personal information from recommendation letters is not very comparable - or reliable.  <br /><br />

        In the 2500+ SQ reports generated to date, high school male SQ scores average 96, while female SQ scores average 103.  On self-rated personal characteristics that students formerly provided, a correlation with their SQ scores showed that skin color was NOT related to SQ scores for either male or female students.   A computer generated chart showing those correlations is at:  <a href="http://www.social-quotient.info/sq.4mg.com/traits_2437.htm">http://www.social-quotient.info/sq.4mg.com/traits_2437.htm</a> <br /><br />

        You are encouraged to include this email with Social Quotient reports you send to a college.   Students get a similar SQ report, but are told it is a somewhat different format (to discourage doctoring  of  one's SQ report).  Some show their SQ scores in job interviews.   A teacher in the rough Bedford-Stuyvesant area of New York City wrote me:<label style="color:rgb(212,68,68);">  "I must tell you that several students used the SQ when they went for job interviews & it made a great impression (in a few cases, it may have been the deciding factor in getting the job)."
        </label><br /><br />

        Sincerely,<br /><br />

        <b>Albert "Van" Sloan, developer and US trademark holder of the Social Quotient term </b><br />
        <b>Princeton  BSE,  Stanford MBA</b><br />

        <hr>
        </div>

    </div>
    <!--end nicdark_container-->

</section>
<!--end section-->
@endsection
