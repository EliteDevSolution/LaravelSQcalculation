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

<!-- herlbeng, 31-05-2018, new mail text -->

        <hr>
        CONFIDENTIAL<br />
        Good Morning teacher <?=$group->name?> ,<br /><br />
        Today is the day you marked for your class to do the Social Quotient quiz.   They will be joining over 2500 other students around the USA who have experienced and liked this experience.  A majority will find that the SQ reports they will get on  <?=$group->res_date?>  can help them get into the colleges and jobs they seek.   Your school's head counselor will get a full class set of SQ reports and is encouraged to attach average or above SQ score reports to college recommendations. <br /><br />

        Each of your class's students were sent an email explaining the SQ process.  It also asked them to click to their Go to my Profile page to complete a few items like male/ female.  If some have not yet done so, give them a minute to do that.  Then tell everyone to click on the black and white photo on their Go to my Profile page;  it will take each to the SQ quiz.<br /><br />
        
        For the 20 minute SQ quiz experience, we suggest that you appoint one or two students to speak each name on your class list.   That person should stand and say a few words, while classmates mark them A to D on the question:   Who would you most or least want to help you complete a big store purchase ?   The person standing will not mark him/ herself.  The rest of the students should refrain from making any comments.  
        Students may also mark a "Don't know very well" category.  <br /><br />

        That can be particularly useful in marking a new or absent student who did not add a face photo as suggested on his/her Profile page.   That page also has a section where the student can send you a note on a SQ problem like being pressured or bullied to give a classmate a particular A - D mark.  Based on the note, the teacher may delete the SQ report for a bad actor or delete all the marks he gave to others.<br /><br />

        I would welcome any comments you have on how the SQ process went for your class.Thank you for participating.<br /><br />

        <b>Albert "Van" Sloan, inventor and trademark holder of Social Quotient</b><br />
        <b>vansloan@yahoo.com</b>

        <hr>
        </div>

    </div>
    <!--end nicdark_container-->

</section>
<!--end section-->
@endsection
