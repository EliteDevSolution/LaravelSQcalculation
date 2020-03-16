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
            	<span style="color: #ffffff; float: left; font-size: 35px; line-height: 20px; padding: 15px; margin-right: 5px; background-color: #74cee4;">Y</span>
            	our score in the quiz is ready!!! <br>
                Please for review your report of first quiz follow the link <a href="<?php echo config('app.url').'/results/first/'.$user->token; ?>" target="_blank">My First Quiz's Report</a> <br>
                <!--
                Please for review your report of second quiz follow the link <a href="<?php echo config('app.url').'/results/second/'.$user->token; ?>" target="_blank">My Second Quiz's Report</a>
                -->
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
                            <td><p><?php echo $group->start_date; ?> to <?php echo $group->close_date; ?></p></td>
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
                <div class="nicdark_space50"></div>

            </div>
            <!--end table-->
        </div>

    </div>
    <!--end nicdark_container-->

</section>
<!--end section-->
@endsection
