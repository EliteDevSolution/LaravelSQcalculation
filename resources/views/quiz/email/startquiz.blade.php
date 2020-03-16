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

		<div class="grid grid_6">
            <h4>Dear <?php echo $user->name;?>, </h4>
            <p>
            	<span style="color: #ffffff; float: left; font-size: 35px; line-height: 20px; padding: 15px; margin-right: 5px; background-color: #74cee4;">T</span>
            	he quiz starts today!!! 
           	</p>
        </div>

        <div class="grid grid_6">
            <!--start table-->
            <div class="nicdark_textevidence nicdark_bg_grey nicdark_shadow nicdark_radius left overflow_scroll">
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
                            <td><p><?php echo $user->group->start_date; ?> to <?php echo $user->group->end_date; ?></p></td>
                        </tr>
                        <tr>
                            <td>
                            	<a href="#" class="nicdark_btn_icon nicdark_bg_red small nicdark_radius_circle white">
                            		<i class="icon-users-1"></i>
                            	</a>
                            </td>
                            <td><p>created by <a href="<?php echo $user->group->email;?>"><?php echo $user->group->email;?></a></p></td>
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
                <div class="nicdark_space10"></div>
				<div class="nicdark_focus center">
		            <div class="nicdark_margin10">
		                <a href="<?php echo config('app.url').'take/'.$group->token.'/'.$user->token; ?>" class="mail-link nicdark_margin10" title="Go to My Profile">
		                	<i class="icon-user-1" style="padding-right: 10px;"></i>
                      <span style="text-transform: capitalize;
                    	color: #74cee4;
                    	font-family: 'Raleway', sans-serif;">Start Quiz</span>
		                </a>
		            </div>
		        </div>
            </div>
            <!--end table-->
        </div>

    </div>
    <!--end nicdark_container-->

</section>
<!--end section-->
@endsection
