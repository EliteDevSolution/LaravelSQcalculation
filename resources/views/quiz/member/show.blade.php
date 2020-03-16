@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')

<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container bng-description-title">
        <h2 class="color_404547">
            <strong>&#34;<?php echo strtoupper(strtolower($group->name))?>&#34; - GROUP LIST</strong>
        </h2>
        <div class="nicdark_space20"></div>
        <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius" style="width: 25%"></span></div>
        <div class="nicdark_space20"></div>
        <div class="bng-subtitle-content color_404547">
            <h5 class="black group-description"><?php echo strtoupper(strtolower($group->description));?></h5>
        </div>
    </div>
    <div class="nicdark_container nicdark_clearfix">

        <div class="nicdark_space50"></div>

        <div class="grid grid_4">
            <img alt="" class="nicdark_radius nicdark_opacity" style="float:left;width:100%;" src="<?php echo $member->getPhoto();?>">

            <div class="nicdark_space10"></div>


        </div>

        <div class="grid grid_4">
            <h3 class="subtitle greydark"><?php echo strtoupper(strtolower($member->name));?></h3>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left small"><span class="nicdark_bg_blue nicdark_radius"></span></div>
            <div class="nicdark_space20"></div>
            <p><?php echo strtoupper(strtolower($member->description));?></p>
        </div>


        <div class="grid grid_4">
            <h3 class="subtitle greydark">ADDITIONAL INFORMATION</h3>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left small"><span class="nicdark_bg_yellow nicdark_radius"></span></div>
            <div class="nicdark_space20"></div>

            <div class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow whitout_bg">
                <h5 class="nicdark_progressbar_title nicdark_bg_yellow nicdark_bg_yellowdark_hover nicdark_radius nicdark_shadow fade-left animate1 animated fadeInLeft" style="width:95%">
                    <span class="white nicdark_size_big"><i class="icon-brush"></i>&nbsp;&nbsp;&nbsp;EMAIL · <span class="field_value"><?php echo $member->email;?></span></span>
                </h5>
            </div>

            <div class="nicdark_space20"></div>

            <div class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow whitout_bg">
                <h5 class="nicdark_progressbar_title nicdark_bg_blue nicdark_bg_bluedark_hover nicdark_radius nicdark_shadow fade-left animate2 animated fadeInLeft" style="width:85%">
                    <span class="white nicdark_size_big"><i class="icon-pencil-1"></i>&nbsp;&nbsp;&nbsp;AGE · <span class="field_value"><?php $age = $member->getAge(); echo ($age == -1) ? 'EDIT' : $age; ?></span></span>
                </h5>
            </div>

            <div class="nicdark_space20"></div>

            <div class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow whitout_bg">
                <h5 class="nicdark_progressbar_title nicdark_bg_green nicdark_bg_greendark_hover nicdark_radius nicdark_shadow fade-left animate3 animated fadeInLeft" style="width:75%">
                    <span class="white nicdark_size_big"><i class="icon-puzzle"></i>&nbsp;&nbsp;&nbsp;SEX · <span class="field_value"><?php echo strtoupper($member->gender);?></span></span>
                </h5>
            </div>

            <div class="nicdark_space20"></div>
        </div>

        <div class="grid grid_2"></div>
        <div class="grid grid_12">
            <div class="grid grid_2"></div>
            <div class="grid grid_8">

                    <h3 class="color_404547">
                        <strong>QUIZ</strong>
                    </h3>
                    <div class="nicdark_space20"></div>
                    <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius" style="width: 25%"></span></div>
                    <div class="nicdark_space20"></div>
                    <div class="color_404547">
                        <h4>
                            <?php echo strtoupper(strtolower($group->description));?>
                        </h4>
                    </div>
                </div>
        </div>
        <div class="grid grid_12">
            <div class="grid grid_2"></div>
            <div class="grid grid_8">
                <div class="grid grid_3 bng-edit-date">
                    <span>FROM:</span><span class="bng-date">START DATE</span>
                </div>
                <div class="grid grid_1"></div>
                <div class="grid grid_3 bng-edit-date">
                    <span>TO:</span><span class="bng-date">END DATE</span>
                </div>
            </div>
        </div>

        <div class="nicdark_textevidence center" style="text-align: center;">
            <a class="nicdark_zoom nicdark_btn nicdark_bg_red_btn medium nicdark_shadow nicdark_radius white nicdark_margin10" href="{{ URL::action( 'QuizController@take', ['id'=>$group->token, 'member_id'=>$member->token] ) }}">TAKE ME TO THE TEST!!</a>

        </div>

        <div class="nicdark_space50"></div>

    </div>
    <!--end nicdark_container-->

</section>
@endsection

@section('javascript')
@endsection
