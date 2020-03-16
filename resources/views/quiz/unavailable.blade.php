@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')
<section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img-teachers-1">

    <div class="nicdark_filter greydark">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">

              <div class="nicdark_space50"></div>
              <h1 class="white subtitle">Not Available!</h1>
              <div class="nicdark_space10"></div>
              <h3 class="subtitle white">Quiz is closed</h3>
              <div class="nicdark_space20"></div>
              <div class="nicdark_divider left big"><span class="nicdark_bg_white nicdark_radius"></span></div>
              <div class="nicdark_space50"></div>

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

        <div class="grid grid_12">

            <div class="nicdark_archive1 nicdark_bg_blue nicdark_bg_bluedark_hover nicdark_transition nicdark_radius nicdark_shadow">
                <div class="nicdark_margin20 nicdark_relative">
                    <a href="#" class="nicdark_displaynone_ipadpotr nicdark_btn_icon nicdark_bg_bluedark medium nicdark_radius_circle white nicdark_absolute nicdark_shadow"><i>1</i></a>

                    <div class="nicdark_activity nicdark_marginleft70 nicdark_disable_marginleft_ipadpotr">
                        <h4 class="white"><?php echo $user->name;?></h4>
                        <div class="nicdark_space20"></div>
                        <?php if( $group->start_date != null && $group->end_date != null ) :?>
                        <p class="white">The Quiz is available between <?php echo date('m/d/Y', strtotime($group->start_date))?> and <?php echo date('m/d/Y', strtotime($group->end_date))?></p>
                        <?php else :?>
                        <p class="white">The Quiz is unavailable. Please contact with the Group's List administrator so he can set the start and end dates</p>
                        <?php endif;?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end nicdark_container-->

</section>

@endsection

@section('javascript')
@endsection
