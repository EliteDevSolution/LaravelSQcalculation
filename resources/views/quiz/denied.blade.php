@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')
<section id="nicdark_parallax_title" class="nicdark_section nicdark_imgparallax nicdark_parallaxx_img-teachers-1">

    <div class="nicdark_filter greydark">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <h1 class="white subtitle">Denied!</h1>
                <div class="nicdark_space10"></div>
                <h3 class="subtitle white">You don't have permissions</h3>
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_white nicdark_radius"></span></div>
                <div class="nicdark_space40"></div>
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
                        <p class="white">Your group is not <?php echo $group->name;?></p>
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