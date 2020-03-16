@extends('layouts.master_email')

@section('content')
<section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img5">

    <div class="nicdark_filter greydark">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <div class="nicdark_space100"></div>
                <div class="nicdark_space100"></div>
                <h1 class="white subtitle"><?php echo strtoupper(strtolower($group->name));?></h1>
                <div class="nicdark_space10"></div>
                <h3 class="subtitle white"><?php echo $group->description;?></h3>
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_white nicdark_radius"></span></div>
                <div class="nicdark_space40"></div>
                <div class="nicdark_space50"></div>
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

		<div class="grid grid_12">
            <h4>Hi!</h4>
            <p>
            	<span style="color: #ffffff; float: left; font-size: 35px; line-height: 20px; padding: 15px; margin-right: 5px; background-color: #74cee4;">I</span>
            	'm  <?php echo $user->name;?>. I want to share my results about SQ from SocialQuotient test. <br>
                To view my results please follow the link. <strong><a href="<?php echo action('QuizController@viewResults', ['member_id' => $user->token]); ?>"><?php echo $user->name;?>'s results</a></strong>.
           	</p>
        </div>

    </div>
    <!--end nicdark_container-->

</section>
<!--end section-->
@endsection
