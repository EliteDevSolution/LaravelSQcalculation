@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')

<section class="nicdark_section">
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

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div class="nicdark_space20"></div>
<div class="nicdark_textevidence center" style="text-align: center;">
            <a id="take_quiz_btn" href="{{ URL::action( 'QuizController@take', ['id'=>$group->token, 'member_id'=>$member->token] ) }}"><img src="<?php echo url('assets/img/200531408-001_1000.jpg.cf.jpg'); ?>" /></a>

        </div>
        <div class="grid grid_2"></div>
        <div class="grid grid_4">

            <div id="img_profile_photo" class="image-member" style="background-image: url(<?php echo $member->getPhoto();?>)"></div>
            <!--<img alt="" id="img_profile_photo" class="nicdark_radius nicdark_opacity bng_fix_size_380" style="float:left;width:100%;" src="<?php echo $member->getPhoto();?>">-->

            <div class="nicdark_space10"></div>

            <div class="nicdark_focus center">
                <div class="center">
                        <a title="UPLOAD PHOTO" id="edit_photo" href="#nicdark_window" class="nicdark_mpopup_window   nicdark_btn_icon nicdark_bg_red nicdark_shadow small nicdark_radius white bng_fullwidth" style="padding:10px 0px; margin-bottom:10px;">
                            <i class="icon-upload-outline"></i> UPLOAD/CHANGE PHOTO
                        </a>
                </div>
                <div class="center">
                        <a title="Report" id="report" href="#report_form_container" class="nicdark_mpopup_window   nicdark_btn_icon nicdark_bg_blue nicdark_shadow small nicdark_radius white bng_fullwidth" style="padding:10px 0px; margin-bottom:10px;">
                           <i class="icon-attention-1"></i> REPORT PROBLEM
                        </a>
                </div>
                <div class="center">
                        <a title="SAVE CHANGES" id="submit_changes" href="#" class="  nicdark_btn_icon nicdark_bg_violet nicdark_shadow small nicdark_radius white bng_fullwidth" style="padding:10px 0px; margin-bottom:10px;" >
                            <i class="icon-check-outline"></i> SAVE CHANGES
                        </a>
                </div>
            </div>
        </div>

        <div class="grid grid_4">
            <h3 class="member-name"><?php echo strtoupper(strtolower($member->name));?></h3>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left small"><span class="nicdark_bg_yellow nicdark_radius"></span></div>
            <div class="nicdark_space20"></div>

            <!-- init -->
            <form id="form-act">

                <div class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow whitout_bg">
                    <h5 class="member-details editable-zone nicdark_progressbar_title nicdark_bg_yellow nicdark_bg_yellowdark_hover nicdark_radius nicdark_shadow fade-left animate1 animated fadeInLeft" style="width:100%">
                        <div class="white nicdark_size_big" style="margin: 15px 5px; padding: 10px 0;">
                            <i class="icon-brush"></i>&nbsp;EMAIL&nbsp;&nbsp;
                                <div style="margin-bottom:1px;"></div>
                                <div class="field_value" style="margin-left: 25px; word-break: break-all;"><?php echo $member->email;?></div>
                        </div>
                    </h5>
                    <div style="display:none;" class="container_field nicdark_archive1 nicdark_yellow nicdark_radius nicdark_shadow">
                        <input type="text" name="field_email" id="field_email" placeholder="YOUR EMAIL" value="<?php echo $member->email; ?>" class="input-member-details editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow yellow subtitle" style="height: 62px; width: 89%;" />
                        <a title="CLOSE" href="#!" class="close_field nicdark_btn_icon small nicdark_yellowdark nicdark_radius_circle">
                            <i class="icon-cancel"></i>
                        </a>
                    </div>

                </div>

                <div class="nicdark_space20"></div>

                <div class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow whitout_bg">

                      <h5 class="member-details editable-zone nicdark_progressbar_title nicdark_bg_blue nicdark_bg_bluedark_hover nicdark_radius nicdark_shadow fade-left animate2 animated fadeInLeft" style="width:85%">
                          <div class="container">

<!-- Herlbeng, 28-05-2018 -->
<?php $age = $member->getAge(); 
if($age == -1) $age ='EDIT'; ?> 

                            <i class="icon-pencil-1"></i>&nbsp;AGE&nbsp;&nbsp;
<!--      Herlbeng,28-05-2018    <span class="field_value"><?php $age = $member->getAge(); echo ($age == -1) ? 'EDIT' : $age; ?></span> -->

                            <span class="field_value"><?php echo $age; ?></span>


                          </div>
                      </h5>
                      <div style="display:none;" class="container_field nicdark_archive1 nicdark_blue nicdark_radius nicdark_shadow">
                            <div class="grid nomargin grid_3 percentage">
                                <select name="birth_month" id="birth_month" class="input-member-details editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow green small subtitle">
                                    <option value="">MONTH</option>
                                <?php for($m=1; $m<=12; ++$m){
                                    $month_selected = '';
                                    if($m==date('m',strtotime($member->birthdate)) && $member->birthdate!=null){
                                        $month_selected = 'selected';
                                    }
                                    echo '<option value="'.$m.'" '.$month_selected.'>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>';
                                } ?>
                                </select>
                            </div>


                            <div class="grid nomargin grid_6 percentage">
<input type="text" class="input-member-details editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow green small subtitle" name="" id="" style="padding: 0 20px;" value="Complete the year: " />
                            </div>

                            <div class="grid nomargin grid_3 percentage">


                                <input type="text" class="input-member-details editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow green small subtitle" name="birth_year" id="birth_year" style="padding: 0 20px;" value="<?php echo date('Y',strtotime($member->birthdate)); ?>" />


                                <!-- <select name="birth_year" id="birth_year" class="input-member-details editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow green small subtitle">
                                    <option value="">YEAR</option>
                                <?php for($i = date('Y'); $i >= date('Y',strtotime(date('Y-m-d -70 years'))); $i-- ){
                                    $year_selected = '';

                                    if($i==date('Y',strtotime($member->birthdate)) && $member->birthdate!=null){
                                        $year_selected = 'selected';
                                    }
                                    echo '<option value="'.$i.'" '.$year_selected.'>'.$i.'</option>';
                                } ?>
                                </select> -->
                            </div>
                          <!-- <input type="text" name="field_birthdate" id="field_birthdate" placeholder="BIRTH DATE" value="<?php echo $member->birthdate; ?>" class="input-member-details editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow blue subtitle nicdark_calendar" style="height:62px, width: 89%;" /> -->
                          <a title="CLOSE" href="#!" class="close_field nicdark_btn_icon small nicdark_bluedark nicdark_radius_circle">
                              <i class="icon-cancel"></i>
                          </a>
                      </div>

                </div>

                <div class="nicdark_space20"></div>

                <div class="nicdark_progressbar nicdark_bg_grey nicdark_radius nicdark_shadow whitout_bg">
                    <!-- Opcion eliminada, Herlbeng, 25-05-2018 -->
                    <!-- <h5 class="member-details editable-zone nicdark_progressbar_title nicdark_bg_green nicdark_bg_greendark_hover nicdark_radius nicdark_shadow fade-left animate3 animated fadeInLeft" style="width:75%">
                        <div class="container">
                            <?php if(is_null($member->gender)) : ?>
                            <i class="icon-puzzle"></i>&nbsp;SEX ¡¤ <span class="field_value">EDIT</span>
                            <?php else : ?>
                                <i class="icon-<?php echo $member->gender;?>"></i>&nbsp;SEX ¡¤ <span class="field_value"><?php echo strtoupper($member->gender);?></span>
                            <?php endif;?>
                        </div>
                    </h5>
                    -->
                    <!-- cambiado de grey a green -->
                    <div style="display:block;" class="container_field nicdark_archive1 nicdark_green nicdark_radius nicdark_shadow" >
                        <select style="color:white;" name="field_gender" id="field_gender" placeholder="YOUR GENDER" class="input-member-details editable-input nicdark_bg_green nicdark_radius nicdark_shadow green small subtitle">
                            <option value="">YOUR GENDER</option>
                            <?php foreach (App\User::$genders as $gender): ?>
                                <option value="<?php echo $gender; ?>" <?php echo  ($gender == $member->gender) ? 'selected' : '';?>>
                                    <?php echo strtoupper($gender);?>
                                </option>

                            <?php endforeach; ?>
                        </select>
                        <!-- Opcion eliminada, Herlbeng, 25-05-2018 -->
                        <!-- <a title="close" href="#!" class="close_field nicdark_btn_icon small nicdark_greendark nicdark_radius_circle" >
                            <i class="icon-cancel"></i>
                        -->
                        </a>
                    </div>

                </div>

            </form>
            <!-- end -->

            <div class="nicdark_space20">
                <input type="hidden" id="field_photo" value="<?php echo $member->photo; ?>" />
            </div>
        </div> <!-- /.grid_4 -->

        <div class="grid grid_2"></div>
        <!--
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
                        <div class="nicdark_space20"></div>
                        <div class="grid grid_8">
                            <p class="editable-zone">
                                <span class="blue nicdark_size_big"><i class="icon-brush"></i></span>
                                <span class="field_value">
                                <?php if($member->description == null) : ?>
                                Your Description
                                <?php else  : ?>
                                <?php echo $member->description; ?>
                                <?php endif; ?>
                                </span>
                            </p>
                            <div style="display:none;" class="container_field nicdark_archive1 nicdark_grey nicdark_radius nicdark_shadow">
                                <textarea id="field_description" placeholder="YOUR DESCRIPTION" value="<?php echo $member->description;?>" rows="4" class="editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow grey small subtitle"></textarea>
                                <a title="CLOSE" href="#!" class="close_field nicdark_btn_icon small nicdark_greydark nicdark_radius_circle"><i class="icon-cancel"></i></a>
                            </div>
                        </div>
                        <div class="nicdark_space50"></div>
                    </div>
            </div>
        </div>
        -->

        <!--
        <div class="grid grid_12">
            <div class="grid grid_2"></div>
            <div class="grid grid_8">
                <div class="grid grid_3 bng-edit-date">
                    <span>FROM:</span><span class="bng-date"><?php echo strtoupper(strtolower($group->start_date));?></span>
                </div>
                <div class="grid grid_1"></div>
                <div class="grid grid_3 bng-edit-date">
                    <span>TO:</span><span class="bng-date"><?php echo strtoupper(strtolower($group->end_date));?></span>
                </div>
            </div>
        </div>
      -->


        <!-- <div class="nicdark_textevidence center" style="text-align: center;">
            <a id="take_quiz_btn" class="nicdark_zoom nicdark_btn nicdark_bg_red_btn medium nicdark_shadow nicdark_radius white nicdark_margin10" href="{{ URL::action( 'QuizController@take', ['id'=>$group->token, 'member_id'=>$member->token] ) }}">TAKE ME TO THE TEST!!</a>

        </div> -->

        <?php if($group->state = 0):?>
        <div class="nicdark_textevidence center" style="text-align: center;">
            <a class="nicdark_zoom nicdark_btn nicdark_bg_info_btn medium nicdark_shadow nicdark_radius white nicdark_margin10" href="{{ URL::action( 'QuizController@reemail', ['  id'=>$member->token] ) }}">SEND QUIZ RESULTS</a>

        </div>
        <?php endif;?>

        <div id="nicdark_window" class="zoom-anim-dialog mfp-hide popup-fixed-width">
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                    <h4 class="white nicdark_margin20">Upload your photo!</h4>
                </div>
                <div class="nicdark_margin20">
                    <div class="dropzone" id="dropzone"></div>
                </div>
            </div>
        </div>


        <div id="alert_10" class="zoom-anim-dialog mfp-hide popup-fixed-width">
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                    <center><h4 class="white nicdark_margin20">UPDATED CORRECTLY</h4></center>
                </div>
                <div class="nicdark_margin20">
                    <p class="success-p">Thanks for saving your profile data..</p>
                </div>
            </div>
        </div>

        <div id="alert_report_problem" class="zoom-anim-dialog mfp-hide popup-fixed-width">
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                    <center><h4 class="white nicdark_margin20">Success</h4></center>
                </div>
                <div class="nicdark_margin20">
                    <p class="success-p">Your information has been submitted.</p>
                </div>
            </div>
        </div>

        <div id="alert_101" class="zoom-anim-dialog mfp-hide popup-fixed-width">
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                    <center><h4 class="white nicdark_margin20">Wait a moment!</h4></center>
                </div>
                <div class="nicdark_margin20">
                    <p class="success-p">Please verify and complete your profile data! then save the changes</p>
                </div>
            </div>
        </div>

         <div class="nicdark_space20">
                 <!-- Alert 6 Loadin -->
                <div id="alert_6" class="zoom-anim-dialog mfp-hide modal-define2">
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                        <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                            <center><h4 class="white nicdark_margin20">Loading...</h4></center>
                        </div>
                        <div class="nicdark_margin20">
                            <img src="<?php echo asset('/root/img/load.gif');?>" alt="">
                        </div>
                    </div>
                </div>
            </div>


        <div id="report_form_container" class="zoom-anim-dialog mfp-hide popup-fixed-width">
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                    <center><h4 class="white nicdark_margin20">Send Us your Report!</h4></center>
                </div>
                <div class="nicdark_margin20">
                    <form id="form-report-send">
                        <input name="name_report" id="name_report" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle" type="text" placeholder="NAME" >

                        <div class="nicdark_space20"></div>

                        <input name="email_report" id="email_report" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle" placeholder="EMAIL" type="text" >

                        <div class="nicdark_space20"></div>

                        <select name="type_report" id="type_report" class="editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow black small subtitle">
                            <?php foreach ($types as $type) : ?>
                            <option value="<?php echo $type; ?>"> <?php echo $type;?> </option>
                            <?php endforeach; ?>
                        </select>

                        <div class="nicdark_space20"></div>
                            <textarea name="message_report" id="message_report" placeholder="YOUR MESSAGE"  rows="8" class="editable-input nicdark_bg_grey2 nicdark_radius nicdark_shadow black subtitle bng-fixed-textarea " style="width: 100%;"></textarea>

                        <div class="nicdark_space20"></div>
                        <a href="#" id="submit-report" class="center nicdark_btn nicdark_bg_orange medium nicdark_shadow nicdark_radius white nicdark_press">SEND</a>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!--end nicdark_container-->



</section>
@endsection

@section('javascript')
<script type="text/javascript">
var uploadFiles = [];

jQuery(document).ready(function($){
    $("#form-act").validate({
        ignore: "",
        rules: {
            "field_email": {
                required: true,
                email: true,
            },
            "birth_month": {
                required: true,
            },
            "birth_year": {
                required: true,
            },
            "field_gender": {
                required: true,

            },
        },
        messages: {
            "field_email": {
                required: "Email is required",
                email: "Enter a valid email",
            },
            "birth_month": {
                required: "The birth month field is required",
            },
            "birth_year": {
                required: "The birth year field is required",
            },
            "field_gender": {
                required: "Select a genre",
            },
        },
    });

    $("#form-report-send").validate({
        ignore: "",
        rules: {
            "name_report": {
                required:true,
            },
            "email_report": {
                required: true,
                email: true,
            },
            "type_report": {
                required: true,
            },
            "message_report": {
                required: true,

            },
        },
        messages: {
            "name_report": {
                required : 'Name is required',
            },
            "email_report": {
                required: "Email is required",
                email: "Enter a valid email",
            },
            "type_report": {
                required: "The Type Report field is required",
            },
            "message_report": {
                required: "Enter your message",
            },
        },
    });

   $( '.nicdark_calendar' ).datepicker('destroy');
   $( "#field_birthdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      maxDate: "-1d",
      yearRange: "c-100:<?php echo date('Y');?>",
    });


    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#dropzone", {

        paramName: "profile_photo",
        uploadMultiple : false,
        maxFilesize: 2, // MB
        acceptedFiles : 'image/*',
        url: "<?php echo action('QuizController@uploadMemberPhoto', ['id'=>$member->token]); ?>",
        dictDefaultMessage: '<span class="fileinput" style="border:none;"><span>Choose your photo profile</span> or Drop Here</span>',
        params : {_token : "{{{ csrf_token() }}}" },
        init : function(){
            $('#response_image_message').remove();
            this.on('success', function(file, response){
                if(response.success){

                    $('<h2 id="response_image_message">Please Wait a moment while processing image</h2>').insertBefore('#dropzone');
                    uploadFiles.push({localName: file.name, serverName: response.nameFileServer});
                    var attachments =  '';
                    $.each(uploadFiles, function(i, obj){
                        attachments = attachments + obj.serverName+',';
                    });
                    attachments = attachments.slice(0,-1);
                    $('#field_photo').val(attachments);

                    $('#img_profile_photo').css('background-image', 'url(<?php echo url("/");?>/'+attachments+')');
                    uploadFiles = [];
                    $.magnificPopup.close();
                    //var my_tooltip = $( "#edit_photo" ).tooltip();
                    //my_tooltip.tooltip('close');
                    this.removeAllFiles();
                    //$('#response_image_message').remove();
                }else{
                    var box = $('#dropzone').parent();
                    $(box).prepend('<h2 id="response_image_message">'+response.nameFileServer+'</h2>');
                    //$.magnificPopup.close({});
                    //$('#response_image_message').remove();
                }
            });

            this.on('complete', function(file){
                myDropzone.removeFile(file);

            });



        },
    });

   $(document).on('click', '.editable-zone', function(e){
        e.preventDefault();
        var editable = $(this);
        var field = $(this).next();
        editable.css('display', 'none');
        field.removeAttr('style');

   });

   $(document).on('click', '.close_field', function(e){
        e.preventDefault();
        var field = $(this).parent();
        var editable = field.prev();
        field.css('display', 'none');
        editable.css('display','');

   });

   $(document).on('change', '.editable-input', function(e){
        e.preventDefault();
        value = $(this).val();
        container_value = $(this).parent().prev().find('.field_value');
        old_value = container_value.text();
        if(value == '')
            container_value.text('EDIT');
        else{
            if($(this).attr('id') == 'field_birthdate'){
                birthdate = Date.parse(value);
                today = new Date();
                today = Date.parse(today);
                years = (today - birthdate)/(1000*3600*24*365);
                years = Math.round(years*100)/100;
                years = Math.floor(years);

                container_value.text(years.toString());
            }else{
                container_value.text(value.toUpperCase());
            }
        }
   });

   $(document).on('click', '#edit_photo', function(e){
        $('#response_image_message').remove();
   })

   $(document).on('click', '#submit_changes', function(e){
        e.preventDefault();

       $('#form-act').validate();

       if ($('#form-act').valid() && $('#form-act').valid()) {
                var birthDate = $('#birth_year').val()+'-'+$('#birth_month').val()+'-'+'1';
                data = 'email=' + $('#field_email').val() + '&birthdate=' + birthDate + '&gender=' + $('#field_gender').val() + '&description=' + $('#field_description').val() + '&photo=' + $('#field_photo').val();
                $.ajax({
                    beforeSend: function(){
                        $.magnificPopup.open({
                            items :{ src : '#alert_6', },
                            type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                            closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 0, mainClass: 'my-mfp-zoom-in'
                        });
                    },
                    url : '<?php echo action("QuizController@updateMember", ["id"=>$member->token])?>',
                    data : data,
                    type : 'post',
                    dataType : 'json'
                }).done(function(response){
                    $.magnificPopup.close({});
                    if(response.success){

                        $.magnificPopup.open({
                            items :{ src : '#alert_10', },
                            type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                            closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                        });

                        $( "#submit_changes" ).tooltip( "close" );
                    }
                }).fail(function(err){
                    $.magnificPopup.close({});
                    console.log(err.responseText);
                });

       } else {
           return false;
       }

   });

   $(document).on('click', '#take_quiz_btn', function(e){
        e.preventDefault();
        var btn = $(this);

        $('#form-act').validate();
        if ($('#form-act').valid() && $('#form-act').valid()) {
            window.location.href=btn.attr('href');
        }else{
            $.magnificPopup.open({
                items :{ src : '#alert_101', },
                type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
            });
        }
   });


    $(document).on('click', '#submit-report', function(e){
        e.preventDefault();
       $("#form-report-send").validate();
       if( $('#form-report-send').valid() && $('#form-report-send').valid() ){
            data = 'name='+$('#name_report').val()+'&email='+$('#email_report').val()+'&type='+$('#type_report').val()+'&message='+$('#message_report').val();
            $.ajax({
                beforeSend: function(){
                    $.magnificPopup.open({
                        items :{ src : '#alert_report_problem', },
                        type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                        closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 0, mainClass: 'my-mfp-zoom-in'
                    });
                },
                url : '<?php echo action("QuizController@sendReport", ["id"=>$member->token]); ?>',
                data : data,
                type : 'post',
                dataType : 'json'
            }).done(function(response){

                if(response.success){
                    $('#name_report').val('');
                    $('#email_report').val('');
                    $('#type_report').val('');
                    $('#message_report').val('');
                    $.magnificPopup.close({});
                }
            }).fail(function(err){
                $.magnificPopup.close({});
                console.log(err.responseText);
            });
       }else{
        return false;
       }
    });


});
</script>
@endsection
