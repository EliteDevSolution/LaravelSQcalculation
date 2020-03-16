@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')
<section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img-teachers-1">

    <div class="nicdark_filter greydark">

        <!--start nicdark_container-->
        <div class="nicdark_clearfix">

          <div class="nicdark_container">
            <div class="grid grid_12">

                <div class="nicdark_space50"></div>
                <h1 class="white subtitle">THANKS FOR TAKING THE QUIZ</h1>
                <div class="nicdark_space10"></div>
                <h3 class="subtitle white">PLEASE, READY THE FOLLOWING PAGE</h3>
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_white nicdark_radius"></span></div>
                <div class="nicdark_space50"></div>
            </div>

          </div>
        </div>
        <!--end nicdark_container-->

    </div>

</section>
<!--end section-->

<div class="nicdark_space50"></div>
<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div class="nicdark_space10"></div>

        <div class="grid grid_4">

            <div class="nicdark_archive1 nicdark_bg_blue nicdark_bg_bluedark_hover nicdark_transition nicdark_radius nicdark_shadow">
                <div class="nicdark_margin20 nicdark_relative">
                    <a href="#" class="nicdark_displaynone_ipadpotr nicdark_btn_icon nicdark_bg_bluedark medium nicdark_radius_circle white nicdark_absolute nicdark_shadow"><i>1</i></a>

                    <div class="nicdark_activity nicdark_marginleft70 nicdark_disable_marginleft_ipadpotr">
                        <h4 class="white">WAIT UNTIL...</h4>
                        <div class="nicdark_space20"></div>
                        <p class="white">You will have to wait until the Quiz period ends in order to see your results.</p>
                    </div>
                </div>
            </div>

        </div>


        <div class="grid grid_4">
            <div class="nicdark_archive1 nicdark_bg_green nicdark_bg_greendark_hover nicdark_transition nicdark_radius nicdark_shadow">
                <div class="nicdark_margin20 nicdark_relative">
                    <a href="#" class="nicdark_displaynone_ipadpotr nicdark_btn_icon nicdark_bg_greendark medium nicdark_radius_circle white nicdark_absolute nicdark_shadow"><i>2</i></a>

                    <div class="nicdark_activity nicdark_marginleft70 nicdark_disable_marginleft_ipadpotr">
                        <h4 class="white">Automatic Emails</h4>
                        <div class="nicdark_space20"></div>
                        <p class="white">You will get an automatic email as soon as your results are computed.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid grid_4">
            <div class="nicdark_archive1 nicdark_bg_yellow nicdark_bg_yellowdark_hover nicdark_transition nicdark_radius nicdark_shadow">
                <div class="nicdark_margin20 nicdark_relative">
                    <a href="#" class="nicdark_displaynone_ipadpotr nicdark_btn_icon nicdark_bg_yellowdark medium nicdark_radius_circle white nicdark_absolute nicdark_shadow"><i>3</i></a>

                    <div class="nicdark_activity nicdark_marginleft70 nicdark_disable_marginleft_ipadpotr">
                        <h4 class="white">Certificates</h4>
                        <div class="nicdark_space20"></div>
                        <p class="white">You will be able to request a certificate by email if you are instested in showing it to colleges, universities and so on.</p>
                    </div>
                </div>
            </div>
        </div>
		<div class="nicdark_space20"></div>

		<div class="text-center grid grid_12 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
			<a href="<?php echo action('QuizController@requiz', ['id'=>$group->token, 'member_id'=>$user->token]); ?>" class=" nicdark_btn nicdark_bg_green medium nicdark_shadow nicdark_radius white nicdark_press">NEXT QUIZ&nbsp;&nbsp;&nbsp;<i class="icon-right-open-outline"></i></a>
		</div>

		<div class="nicdark_space50"></div>
    </div>
    <!--end nicdark_container-->

</section>

@endsection

@section('javascript')
@endsection
