@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')

    <section class="nicdark_section">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <h1 class="subtitle greydark">&#34;<?php echo strtoupper(strtolower($group->name));?>&#34;</h1>
                <div class="nicdark_space20"></div>
                {{--<h3 class="subtitle black">YOU HAVE TO SET A START DATE FOR THE QUIZ</h3>--}}

                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_green nicdark_radius"></span></div>
                <div class="nicdark_space10"></div>
            </div>

            @if(session('flash_message'))

            <div class="grid grid_12">
                @if( session('flash_type') == 'success')
                <div class="nicdark_alerts nicdark_bg_green nicdark_radius nicdark_shadow">
                    <p class="white nicdark_size_medium"><i class="icon-cancel-circled-outline iconclose"></i>&nbsp;&nbsp;&nbsp;{{ session('flash_message') }}</p>
                    <i class="icon-ok-outline nicdark_iconbg right medium green"></i>
                </div>
                @else
                <div class="nicdark_alerts nicdark_bg_red nicdark_radius nicdark_shadow">
                    <p class="white nicdark_size_medium"><i class="icon-cancel-circled-outline iconclose"></i>&nbsp;&nbsp;&nbsp;<strong>ERROR:</strong>&nbsp;&nbsp;&nbsp;{{ session('flash_message') }}.</p>
                    <i class="icon-cancel-outline nicdark_iconbg right medium red"></i>
                </div>
                @endif
            </div>
            @endif



            <div class="grid grid_12 nicdark_bg_grey nicdark_shadow nicdark_radius ">

                {!! Form::open( array('action' => ['QuizController@updateGroup', 'id'=>$group->token], 'id'=>'update-form' ) ) !!}
                <div class="nicdark_textevidence">
                    <div class="nicdark_margin1820 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr" style="width:calc(100% - 40px);">

                        <div class="nicdark_focus nicdark_width_percentage50">
                            <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                <div class="bng_label">
                                    <label for="start_date" class="bng_label_inline">FROM : </label>
                                </div>
                                <div class="bng_input">
                                    <input id="start_date" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle nicdark_calendar mobile-bottom-input" placeholder="START DATE" type="text" value="<?php echo ($group->start_date == null) ? '' : $group->start_date ;?>"  name="start_date" <?php echo ($group->email_sent == 0) ? '' : 'disabled' ?> >
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
                {!! Form::close() !!}
            </div>

            <div class="grid grid_12 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">
                <h5 class="black group-description"> <?php echo strtoupper(strtolower($group->description));?> </h5>
            </div>

            <div class="grid grid_2  nicdark_shadow nicdark_radius nicdark_relative">
                    <h4 class="subtitle greydark black">MAIL:</h4>
                    <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius"></span></div>
            </div>
            <div class="grid grid_10  nicdark_shadow nicdark_radius nicdark_relative" style="word-break: break-all;">
                    <h4><?php echo strtoupper(strtolower($group->email));?></h4>
            </div>

            <div class="grid grid_12">
                <div class="nicdark_space20"></div>
                <div class="nicdark_space20"></div>
            </div>


            <div id="box-added-members">
                <form action=""></form>
                <?php $i = 1; ?>
                <?php foreach($members as $member):?>
                <div class="grid grid_6" data-ref="<?php echo $i;?>">
                    <div class="nicdark_archive1 nicdark_bg_orange nicdark_radius nicdark_shadow">

                        <div class="container_profile_img nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">
                            <img alt="" class="profile_image nicdark_radius_left nicdark_opacity bng_view_image" id="bng_img_<?php echo $i; ?>" src="<?php echo $member->getPhoto();?>" >
                            <form action="<?php echo action('QuizController@updateProfilePhoto', ['id'=>$member->token]);?>" id="<?php echo $member->token; ?>" method="post" enctype="multipart/form-data">
                                <input type="file" hidden="true" id="bng_input_<?php echo $i; ?>" name="member_profile_image" bng-attr="<?php echo $member->token; ?>">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" bng-attr="<?php echo $member->token; ?>">
                            </form>
                        </div>

                        <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive container_change_btn">
                            <div class="nicdark_margin20">
                                <h4 class="white"><a class="white" href="#!"><?php echo strtoupper(strtolower($member->name));?></a></h4>
                                <div class="nicdark_space20"></div>
                                <div class="nicdark_divider left small"><span class="nicdark_bg_white nicdark_radius"></span></div>
                                <div class="nicdark_space20"></div>
                                <p class="white" style="word-break: break-all;"><?php echo strtoupper(strtolower($member->email));?></p>
                                <div class="nicdark_space20"></div>
                                <a href="#" class="btn_change_image nicdark_btn nicdark_bg_violet medium nicdark_shadow nicdark_radius white " style="font-size:15px;">
                                    <i class="icon-upload "></i>&nbsp;ADD/CHANGE PHOTO
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <?php $i++; ?>
                <?php endforeach;?>


            </div>


            <input type="hidden" name="added_members" id="added_members">
            <div style="clear:both !important;"></div>

            <div class="nicdark_space30"></div>

            <div class="grid grid_3"></div>
            <div class="grid grid_6">
                <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                    <button id="submit_total_form" class="nicdark_btn fullwidth green-button nicdark_shadow white" style="" type="submit">SAVE CHANGES</button>
                </div>
            </div>
            <div class="grid grid_3"></div>



            <div class="nicdark_space20">
                 <!-- Alert 6 Loadin -->
                <div id="alert_6" class="zoom-anim-dialog mfp-hide modal-define2">
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                        <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                            <center><h4 class="white nicdark_margin20">Loading...</h4></center>
                        </div>
                        <div class="nicdark_margin20">
                            <img src="{!!URL::to('root/img/load.gif')!!}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="nicdark_space20">
                <div id="alert_info" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                        <div class="nicdark_textevidence nicdark_bg_blue nicdark_radius_top">
                            <center><h4 class="white nicdark_margin20">Note:</h4></center>
                        </div>
                        <div class="nicdark_margin20">
                            <p class="success-p">An email will be sent to each group's member.</p>
                        </div>
                    </div>
                </div>
                <div id="alert_error" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                        <div class="nicdark_textevidence nicdark_bg_red nicdark_radius_top">
                            <center><h4 class="white nicdark_margin20">Oopss!</h4></center>
                        </div>
                        <div class="nicdark_margin20">
                            <p class="success-p">Please Review the form data</p>
                        </div>
                    </div>
                </div>

                <div id="alert_image_type" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                        <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                            <center><h4 class="white nicdark_margin20">Hey!</h4></center>
                        </div>
                        <div class="nicdark_margin20">
                            <p id="warning_message">Only Images as png, jpg, jpeg, gif, bmp</p>
                        </div>
                    </div>
                </div>

                <div id="alert_image_size" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                        <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                            <center><h4 class="white nicdark_margin20">Hey!</h4></center>
                        </div>
                        <div class="nicdark_margin20">
                            <p id="warning_message">Only Images less than 2MB</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>  <!-- e section -->

        <!--end nicdark_container-->

    </section>

@endsection

@section('javascript')
<script >
function convert_date(date){
    var my_date = date.split('-');
    return my_date[1]+'/'+my_date[2]+'/'+my_date[0];
}

function fire_popup(src){
    $.magnificPopup.open({
        items :{
            src : src,
        },
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        closeOnBgClick : false,
        preloader: false,

                midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
}

jQuery(document).ready(function($){
    $( '.nicdark_calendar' ).datepicker('destroy');

    <?php if( $group->start_date == null ) : ?>
    $( "#start_date" ).datepicker({
        minDate: "+0d",
        onSelect: function (date) {
            var date2 = $('#start_date').datepicker('getDate');
            date2.setDate(date2.getDate() + 1);
            $('#end_date').datepicker('setDate', date2);
            //sets minDate to dt1 date + 1
            $('#end_date').datepicker('option', 'minDate', date2);
            }
    });


    <?php else : ?>

    var tmp_start_date = convert_date('<?php echo $group->start_date;?>');
    console.log(tmp_start_date);

    var compare_start = new Date(tmp_start_date).getTime();
    var compare_today = new Date().getTime();
    var today = new Date();

    var minDate = (compare_start > compare_today) ? convert_date(today.toISOString().substring(0, 10)) : tmp_start_date;

    console.log(minDate);


    $( "#start_date" ).datepicker({

        defaultDate: tmp_start_date,
        minDate : minDate,
        gotoCurrent: true,
        onSelect: function (date) {

            var date2 = $('#start_date').datepicker('getDate');
            date2.setDate(date2.getDate() + 1);
            $('#end_date').datepicker('setDate', date2);
            //sets minDate to dt1 date + 1
            $('#end_date').datepicker('option', 'minDate', date2);

        }
    });

    /*
    var tmp_end_date = convert_date('<?php echo $group->end_date;?>');
    var compare_end = new Date(tmp_end_date).getTime();
    minDate = (compare_end > compare_today) ? convert_date(today.toISOString().substring(0, 10)) : tmp_end_date;

    console.log(tmp_end_date);

    $( "#end_date" ).datepicker({
        defaultDate: tmp_end_date,
        minDate : minDate,
        gotoCurrent: true
    });
    */

    <?php endif; ?>

    // Validate Form
    $("#update-form").validate({
            //onsubmit : false,
            //onfocusout: function(element) { $(element).valid(); },
            //onfocusin: function(element) { $(element).valid(); },
            rules: {
                start_date: {
                    required: true,
                    date: true
                },/*
                end_date: {
                    required: true,
                    date: true
                }*/

            },
            messages: {

                start_date: {
                    required: "Please enter a start date",
                    date: "Invalid Date",
                },/*
                end_date: {
                    required: "Please enter a end date",
                    date: "Invalid Date",
                }*/

            }
        });

});

jQuery(document).ready(function($){
    $(".profile_image").click(function () {
        $(this).parent().find('input[type="file"]').trigger('click');
    });


    $("input[id^=bng_input_]").change(function () {

        var input = $(this);
        var fileName = input.val();

        var image_size = $(this)[0].files[0].size;

        var ext = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();

        var valid_exts = ['jpg', 'jpeg', 'gif', 'bmp', 'png'];

        var max_file_size = 2*1048576;

        var form = $("#" + $(this).attr("bng-attr"));

        (function() {

            $(form).ajaxForm({
                beforeSend: function() {
                     $.magnificPopup.open({
                        items :{ src : '#alert_6', },
                        type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                        closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 0, mainClass: 'my-mfp-zoom-in'
                    });

                },
                uploadProgress: function(event, position, total, percentComplete) {

                },
                success: function() {

                },
                complete: function(xhr) {
                    $.magnificPopup.close();
                    var response = JSON.parse(xhr.responseText);
                    if(response.success){
                        input.parents('.container_profile_img').find('.profile_image').attr('src', response.message);
                    }else{
                        console.log(response.message);
                    }

                }
            });
        })();

        if( valid_exts.indexOf(ext) == -1)
            fire_popup('#alert_image_type');
        else if( image_size > max_file_size)
            fire_popup('#alert_image_size');
        else
            form.submit();


    });

    $(document).on('click', '.btn_change_image', function(e){
       e.preventDefault();
       $(this).parents('.container_change_btn').prev().find("input[type='file']").trigger('click');
    });

    $(document).on('click', '#submit_total_form', function(e){
        e.preventDefault();
        if($("#update-form").valid()){
            fire_popup('#alert_info');
            $('#update-form').submit();

        }else{
            fire_popup('#alert_error');
        }
    });

});
</script>
@endsection
