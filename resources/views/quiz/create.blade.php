    @extends('layouts.master')

    @section('title', 'Social-Quotient')

    @section('content')
    <style type="text/css">
        .xwb-bottom-setup2{
            display: none;
        }
       .alert-desc{
            color:red;
            font-size: 15px;
       }

       .input-title
       {
            margin-left: 4.5%;
            color:#6fc191;
       }

       .group-description-container
       {
            margin-left:0; 
            margin-right: 0;
       }
       .nicdark_width_percentage8
       {
            margin-top: 8px; 
       }
       .ui-datepicker { 
          margin-top: 10vh;
          z-index: 1000;
        }

        @media only screen and (max-width: 600px) {
        .ui-datepicker 
          {
            margin-top: -40vh;
            z-index: 1000;   
          }
          span{

          }
        }

    </style>
    <section class="nicdark_section">
        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <div class="nicdark_space20"></div>
                <h1 class="subtitle black">CREATE YOUR OWN GROUP LIST</h1>
                <div class="nicdark_space20"></div>
    <!-- Linea Eliminada, Herlbeng, 25-05-2018
    			<h3 class="subtitle black">YOU HAVE TO SET A DURATION FOR THE QUIZ</h3> -->

    			<div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_green nicdark_radius"></span></div>
                <div class="nicdark_space10"></div>
            </div>

    <div class="grid grid_12 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">

    		{!! Form::open(array('action' => 'QuizController@store', 'id'=>'create-form')) !!}

            <div class="grid grid_7 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative bng_margin_10_0">

                <a href="#" class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr nicdark_btn_icon nicdark_bg_green  extrabig nicdark_radius_left white nicdark_absolute"><i class="icon-graduation-cap-1"></i></a>

                <div class="nicdark_textevidence black">
                    <div class="nicdark_margin1820 nicdark_marginleft100 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">
                        <div class="nicdark_focus nicdark_width_percentage100">
                            <span class="input-title">GROUP NAME</span>
                            <input id="group_name" class="field nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle mobile-bottom-input space-20" type="text" placeholder="Our Group" value="<?=$recent_val['name']?>" size="200" name="group_name">
                        </div>
                        <div class="nicdark_space10"></div>
                        <div class="nicdark_focus nicdark_width_percentage100">
                              <span class="input-title">TEACHER NAME</span>
                              <input id="name_owner" name="name_owner" class="field nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle mobile-bottom-input space-20" type="text" placeholder="Jone Deo" value="<?=$recent_val['teacher_name']?>" size="200">
                        </div>
                        <div class="nicdark_focus nicdark_width_percentage100">
                              <span class="input-title">TEACHER EMAIL</span>
                              <input id="email_owner" name="email_owner" class="field nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle mobile-bottom-input space-20" type="text" placeholder="test@test.com" value="<?=$recent_val['email']?>" size="200">
                        </div>
                        <div class="nicdark_space10"></div>
                        <div class="nicdark_focus nicdark_width_percentage100">
                            <span class="input-title">ZIP CODE</span>
                            <input id="zipcode" name="zipcode" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle mobile-bottom-input" type="text" placeholder="12345" value="<?=$recent_val['zip']?>" size="200">
                        </div>
                        <div class="nicdark_space10"></div>
                        <div class="nicdark_space10"></div>
                        <div class="nicdark_focus nicdark_width_percentage100 nicdark_width_percentage8">
                            <span class="input-title">Click HERE to set your QUIZ DATE</span>
                            <input id="quizdate" onchange="validateQuizdate(this.value)" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow orange medium subtitle mobile-bottom-input space-20" type="text" placeholder="10/10/2016" name="quizdate">
                            <span class="alert-desc">
                                <br />
                                * You will then see a calendar of the current month with today's date in green. Click on a Monday, Tuesday, or Wednesday in the following week. Use it to set your in-classroom SQ quiz date. That quiz will take about 20 minutes. Students who are absent on the SQ quiz day can make their SQ marks on Thursday or Friday.
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid_5 nicdark_bg_grey nicdark_shadow nicdark_radius bng_margin_10_0 nicdark_relative">
                <div style="padding-left: 20px;padding-right: 20px;">
                    <div class="nicdark_margin1820 nicdark_focus nicdark_width_percentage100 group-description-container">
                              <span class="input-title">HEAD COUNSELOR EMAIL</span>
                              <input id="email_counselor" name="email_counselor" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle mobile-bottom-input space-20" type="text" placeholder="counselor@test.com" value="<?=$recent_val['email_counselor']?>" size="200">
                    </div>
                    <div class="nicdark_textevidence">
                        <div class="group-description-container" style="width: 100%;">
                                <div class="nicdark_focus nicdark_width_percentage100">
                                    <span class="input-title">GROUP DESCRIPTION</span>
                                    <textarea id="group_description" name="group_description" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle bng-fixed-textarea" placeholder="This Description is..." rows=9><?=$recent_val['description']?></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="nicdark_space10"></div>
                    <div class="nicdark_space10"></div>
                    <div class="nicdark_focus nicdark_width_percentage100 nicdark_width_percentage8">
                            <span class="input-title">Click HERE for day of SQ results</span>
                            <input id="resdate" onchange="validateQuizdate2(this.value)" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow orange medium subtitle mobile-bottom-input space-20" type="text" placeholder="10/15/2016" name="resdate">
                            <span class="alert-desc">
                                <br />
                                    * The teacher/ leader and the head counselor will be emailed the same day a full set of the SQ Reports for individual students. It is strongly recommended that teachers mark the Saturday following the classroom quiz date for sending out all the SQ reports.
                            </span>
                        </div>
                    
                </div>
            <input type="hidden" name="added_members" id="added_members">
    		{!! Form::close() !!}

        </div>
    </div>

            <div class="nicdark_space20"></div>

    		<div class="grid grid_12">
    			<div class="nicdark_space20"></div>
                <!--<h3 class="subtitle black small" >
                    YOU CAN ADD BETWEEN 15 AND 50 MEMBERS IN YOUR GROUP <br>
                    {{--<span class="mini">( <a href="" id="link_batch"> Add multiple members in batch mode</a> )</span>--}}
                    WHEN YOU ARE FINISH ADDING YOUR MEMBERS CLICK "SAVE MY GROUP LIST AND SEND EMAIL AT THE BOTTOM OF THE PAGE"
                </h3>-->
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius"></span></div>

                <div class="nicdark_space20"></div>
                <h3 class="subtitle black small" >
                    <b>This  is the list you entered on the previous page.  Please check it for accuracy and re-paste if you need to make changes.</span>
                </h3>

                <div class="nicdark_space20"></div>

            </div>


            <div class="grid grid_12 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">

                <div class="nicdark_textevidence">

                    <div class="nicdark_margin1820 black members-list-group">

                        <div class="nicdark_focus nicdark_width_percentage50 ">
                            {{--MEMBER&apos;S NAMES--}}
                            <h4 class="subtitle black" style="margin-bottom: 20px;">MEMBER&apos;S NAMES</h4>
                            <textarea id="gmember_name" class="list-members-textarea nicdark_bg_grey2 nicdark_radius nicdark_shadow black small subtitle mobile-bottom-input bng-fixed-textarea" size="150" rows="7" spellcheck="false"
                             style="padding: 0px 0px 0px 30px !important;
                                    float: none !important;">{{$gmember_name}}</textarea>
                        </div>

                        <div class="nicdark_focus nicdark_width_percentage50">
                            {{--MEMBER&apos;S EMAIL--}}
                            <h4 class="subtitle black" style="margin-bottom: 20px;">MEMBER&apos;S EMAIL</h4>
                            <textarea id="gmember_email" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey small subtitle bng-fixed-textarea" size="150" rows="7" spellcheck="false"
                                      style="padding: 0px !important;
                                      padding-left: 30px !important;
                                             float: none !important;">{{$gmember_email}}</textarea>
                        </div>

                    </div>

                </div>
            </div>

            <div class="nicdark_space20"></div>

            <div class="grid grid_12">
                <div class="nicdark_textevidence center">
                    <a href="javascript:;" onclick="add_member_group()" class="nicdark_zoom nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white nicdark_margin10">
                        <i class="icon-paper-plane-1"></i>&nbsp;&nbsp;&nbsp;GROUP VERIFIED.  SEND THEM AND ME EMAILS DESCRIBING THE SQ SURVEY
                    </a>
                </div>
            </div>

            <div class="nicdark_space20"></div>


        <div class="xwb-bottom-setup2">
            <div class="grid grid_12">
                <h3 class="subtitle black small" >
                    <b>YOU WANT TO ADD THE MEMBERS ONE BY ONE?</b><br>
                </h3>

                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius"></span></div>
                <div class="nicdark_space20"></div>
            </div>



            <div class="grid grid_12 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">

                <a href="#" class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr nicdark_btn_icon nicdark_bg_orange  extrabig nicdark_radius_left white nicdark_absolute"><i class="icon-user-2"></i></a>

                <div class="nicdark_textevidence">
                    <div class="nicdark_margin1820 nicdark_marginleft100 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">
                        <form id="members-form" method="post" action="<?php echo action('QuizController@uploadTempPhoto'); ?>"  enctype="multipart/form-data">

                            <div class="nicdark_focus nicdark_width_percentage25">
                                <input id="name" maxlength="30" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle mobile-bottom-input" type="text" placeholder="MEMBER NAME" value="" size="200" name="name" >
                            </div>
                            <div class="nicdark_focus nicdark_width_percentage25">
                                <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                    <input id="email" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle mobile-bottom-input" type="text" placeholder="EMAIL" value="" size="200" name="email" >
                                </div>
                            </div>
                            <div class="nicdark_focus nicdark_width_percentage25">
                                <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                    <input id="url_photo" class="input-file-photo nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle mobile-bottom-input-large" type="file" accept="image/*" placeholder="PHOTO URL" value="" size="200" name="url_photo" >
                                    <label for="url_photo">PHOTO URL</label>
                                </div>
                            </div>
                            <div class="nicdark_focus nicdark_width_percentage25">
                                <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                    <button class="orange-button nicdark_btn fullwidth nicdark_bg_orange medium nicdark_shadow nicdark_radius white" type="submit" id="add_member">ADD MEMBER</button>
                                 <input class="nicdark_btn fullwidth nicdark_bg_orange medium nicdark_shadow nicdark_radius white" type="submit" value="ADD MEMBER" id="add_member">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

             <div id="box-added-members"></div>

            <div class="nicdark_space50" id="separator"></div>

            <p id="submit_response" class="black text-center"></p>

            <div class="grid grid_12">
                <div class="nicdark_textevidence center">
                    <a href="#nicdark_window" class="btn-save-grouplist nicdark_zoom nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white nicdark_margin10" id="submit_form">
                        <i class="icon-paper-plane-1"></i>&nbsp;&nbsp;&nbsp;SAVE MY GROUP LIST AND SEND BY EMAIL
                    </a>
                </div>
            </div>
        </div>

            <!-- Alert -->

                    <!-- Alert 1 -->
                    <div id="alert_1" class="zoom-anim-dialog mfp-hide modal-define3">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Success</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="success-p">Members added correctly.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alert 2 -->
                    <div id="alert_2" class="zoom-anim-dialog mfp-hide modal-define">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Warning</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="warning-p">There can't be empty fields in the lists.</p>
                            </div>
                        </div>
                    </div>


                    <!-- Alert 3 -->
                    <div id="alert_3" class="zoom-anim-dialog mfp-hide modal-define">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Warning</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="warning-p">Sorry, we couldn't add the members. The number of member's names and member's emails typed have to be the same. Be aware to not let blank lines</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alert 4 -->
                    <div id="alert_4" class="zoom-anim-dialog mfp-hide modal-define">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Warning</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="warning-p">Sorry, we couldn't add the members. For the member's email list, the line "<span id="pos_error_email" class="black"></span>" has  invalid emails.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alert 5 Support email -->
                    <div id="alert_5" class="zoom-anim-dialog mfp-hide modal-define">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_orange nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Warning</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="warning-p">Member already added.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alert 6 Loadin -->
                    <div id="alert_6" class="zoom-anim-dialog mfp-hide modal-define3">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Loading...</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <img src="{!!URL::to('root/img/load.gif')!!}" alt="">
                            </div>
                        </div>
                    </div>

                    <!-- Alert 7 Loadin - Successfull -->
                    <div id="alert_7" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">LIST SAVED AND SENT</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="success-p">Thanks for saving and sending the list. An email has been sent to all the persons in the list. The members will be able to modify their own personal information until the Quiz Date Starts.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alert 8 15 - 50 members -->
                    <div id="alert_8" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Please check the members!</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="warning-p">Your Group must consist of at least 15 and maximum 50 members.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alert 9 Set QUIZ DATE at Lunes,martes o miercoles -->
                    <div id="alert_9" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Please check the members!</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="warning-p">Please, set your QUIZ DATE a Mon, Tue, or Wed.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alert 10 Set QUIZ DATE at Lunes,martes o miercoles -->
                    <div id="alert_10" class="zoom-anim-dialog mfp-hide popup-fixed-width">
                        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                            <div class="nicdark_textevidence nicdark_bg_yellow nicdark_radius_top">
                                <center><h4 class="white nicdark_margin20">Please check the members!</h4></center>
                            </div>
                            <div class="nicdark_margin20">
                                <p class="warning-p"> Result Date cannot be less than Quiz Start Date.</p>
                            </div>
                        </div>
                    </div>

            <!-- /Alerts -->

        </div>  <!-- e section -->


        	<div id="nicdark_window" class="nicdark_bg_white nicdark_radius zoom-anim-dialog mfp-hide">
    			<div class="nicdark_margin20">
    				<h1 class="success-p">LIST SAVED AND SENT</h1>
    				<div class="nicdark_space20"></div>
    				<p class="success-p">Thanks for saving and sending the list. An email has been sent to all the persons in the list. The members will be able to modify their own personal information until the Quiz Date Starts.</p><br>
    				<p>
    			</p></div>
    		</div>

            <div id="upload_file" class="nicdark_bg_white nicdark_radius zoom-anim-dialog mfp-hide">
                <div class="nicdark_margin20">
                    <h1>Upload a txt file</h1>
                    <div class="nicdark_space20"></div>
                    <p>The content could be comma separated and line by line in this structure (name,email,photo_url)</p>
                    <div class="nicdark_space20"></div>
                    <div class="dropzone" id="dropzone"></div>
                    <p>
                </p></div>
            </div>

            <div id="error_window" class="nicdark_bg_white nicdark_radius zoom-anim-dialog mfp-hide">
                <div class="nicdark_margin20">
                    <h1>Something was wrong!</h1>
                    <div class="nicdark_space20"></div>
                    <p class="message_error">The file wasn't upload</p><br>
                    <p>
                </p></div>
            </div>

            <div id="number_member_alert_window" class="nicdark_bg_white nicdark_radius zoom-anim-dialog mfp-hide">
                <div class="nicdark_margin20">
                    <h1>Please check the members!</h1>
                    <div class="nicdark_space20"></div>
                    <p class="warning-p">Your Group must consist of at least 15 and maximum 50 members</p><br>
                    <p>
                </p></div>
            </div>

    		<div class="nicdark_space50"></div>
    	</div>
    	<!--end nicdark_container-->

    </section>
    <div class="hidden" id="hidden">
    <div class="grid grid_6" data-ref="{index}" style="display:none;">
        <div class="nicdark_archive1 nicdark_{bg} nicdark_radius nicdark_shadow">

            <div class="nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">
                <img alt=""  class="profile_image nicdark_radius_left nicdark_opacity bng_fix_size_232" src="<?php echo asset("assets/img/quotient/avatar_placeholder.png");?>">
            </div>

            <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive">
                <div class="nicdark_margin20">
                    <h4 class="white"><a class="white" href="#!">{name}</a></h4>
                    <div class="nicdark_space20"></div>
                    <div class="nicdark_divider left small"><span class="nicdark_bg_white nicdark_radius"></span></div>
                    <div class="nicdark_space20"></div>
                    <p class="white">{email}</p>
                    <div class="nicdark_space20"></div>
                </div>
            </div>

            <div class="nicdark_textevidence nicdark_width_percentage10 nicdark_displaynone_responsive">
                <div class="nicdark_space20"></div>
                <div class="nicdark_space5"></div>
                <a title="REMOVE MEMBER" href="#!" class="remove_member nicdark_rotate nicdark_tooltip nicdark_btn_icon small nicdark_{bg}dark nicdark_radius_circle white"><i class="icon-cancel"></i></a>
                <div class="nicdark_space20"></div>
            </div>

        </div>
    </div>
    </div>

    @endsection

    @section('styles')
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{URL::asset('assets/plugins/number-textarea/jquery.numberedtextarea.css')}}">
        <style media="screen">
          .btn-create-group + div,
          .btn-create-group {
            display: none;
          }
        </style>
    @endsection

    @section('javascript')

    <script src="{{URL::asset('assets/plugins/number-textarea/jquery.numberedtextarea.js')}}"></script> <!--plugin text area-->

    <script src="{{URL::asset('assets/js/jquery.form.js')}}"></script>

    <script type="text/javascript">
     var added_members = [];
     var colours = ['bg_orange', 'bg_blue', 'bg_yellow', 'bg_violet'];
     var default_photo = '<?php echo asset("assets/img/quotient/avatar_placeholder.png");?>';
     var min_num_members = 15;
     var max_num_members = 50;

      jQuery("#name").on('keyup', function(e) {
          var val = $(this).val();
          if (val.match(/[^a-zA-Z\s]/g)) {
             jQuery(this).val(val.replace(/[^a-zA-Z\s]/g, ''));
         }
      });

     //Definiendo automatic
     $(document).ready(function() {
         $("#gmember_name").numberedtextarea();
         $("#gmember_email").numberedtextarea();
         $(document).on('keyup', "#gmember_name, #gmember_email", function(e){
            var code = e.keyCode || e.which;
            if(code == 13) {
               var textarea = $(this);
               var lines = textarea.val().split('\n');
               var size = lines.length - 2;
               if( lines[size].length > 100){
                lines[size] = lines[size].substring(0, 100);
                textarea.val(lines.join('\n'));
               }
            }
         });
     })

     function isEmail(email) { //Para validar emails
         if(email == '-')
            return true;

         var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         return regex.test(email);
     }


    function validateQuizdate(fecha) { //Valida que la fecha sea Lunes, Martes o Miercoles, herlbeng 25-05-2018
        d = new Date(fecha);
        dayofweek = d.getUTCDay();
        //alert(dayofweek);
        if(dayofweek != 0 && dayofweek!=1 && dayofweek!=2){
            $.magnificPopup.open({
                items :{ src : '#alert_9', },
                type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
            });
        }
    }

    function validateQuizdate2(fecha){
     startdate = new Date($('#quizdate').val());
     d = new Date(fecha);
        if(startdate > d){
            $.magnificPopup.open({
                items :{ src : '#alert_10', },
                type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
            });
        }   
    }

    function add_member_group(){
        setTimeout(function(){
            jQuery('.mfp-wrap').show();
            jQuery('.mfp-bg').css('display', 'inline-block');
            jQuery('.mfp-container').css('position','fixed');
            jQuery('.mfp-container').css('visibility','visible');
        }, 800);

        //vd
        var v_names = 0;
        var v_emails = 0;
        var inva_emails = 0;
        var added_member = [];
        var index = '';
        var i_por;
        var is_repeat = 0;
        var cont_repeat = 0;
        var pos_invalid_email = [];

        var is_email_duplicate = false;

        var names = $('#gmember_name').val().split('\n');
        for(var i = 0;i < names.length;i++){  //inicia desde 0
            if(!names[i]){  //Es vacio
                v_names++;  //cont vacios
            }
            //console.log(names[i]);
        }


        var emails = $('#gmember_email').val().split('\n');

        emails = emails.map(Function.prototype.call, String.prototype.trim)

        for(var j = 0;j < emails.length;j++){

            if(!emails[j]){  //Es vacio
                v_emails++;  //cont vacios
            }else{
                if(!isEmail(emails[j])){
                    inva_emails++;
                    pos_invalid_email.push(j+1);
                }
            }

            //console.log(emails[j]);
        }

        if(i == j){

            if(v_names == 0 && v_emails == 0){ //Ambos estan en cero

                //console.log('exito');
                if(inva_emails == 0){

                        var valuesSoFar = [];
                        for(var i = 0;i < emails.length;i++){  //start 0
                            var value = emails[i];

                            valuesSoFar[value] = true;
                            if (valuesSoFar.indexOf(value) !== -1) {
                                is_email_duplicate = true;
                                //added_member = [];
                                //return false;
                            }
                            valuesSoFar.push(value);

                            added_member = {name: names[i], email:emails[i], url_photo: default_photo};
                            added_members.push(added_member);


                            /*if(added_members.length <= max_num_members){   //less than 50 members
                                    $.each(added_members, function(m, member_obj){
                                        if(member_obj.email == emails[i] && emails[i] != '-'){
                                            is_repeat++;
                                        }
                                    });

                                    if(is_repeat == 0){
                                        added_member = {name: names[i], email:emails[i], url_photo: default_photo};
                                        added_members.push(added_member);
                                        i_por = added_members.length % 4;
                                        index = added_members.length - 1;
                                        render_member_box_a(added_member, index, false, i_por);
                                        added_member = null;
                                    }else{
                                        cont_repeat++;
                                    }
                                    is_repeat = 0;
                            }*/

                        }

                        /*if(cont_repeat == 0 || cont_repeat >=2){
                            $("#gmember_name").val('');
                            $("#gmember_email").val('');

                            $('.numberedtextarea-number').hide();
                            $('.numberedtextarea-number:first-child').show();

                            //var separatorPos = jQuery('#separator').offset().top;
                            var separatorPos = jQuery('#gmember_name').offset().top;


                              jQuery("html, body").animate({
                                  scrollTop: separatorPos
                              }, 600,function(){
                                $.magnificPopup.open({
                                    items :{ src : '#alert_1', },
                                    type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                                    closeOnBgClick : true, preloader: true, midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                                });

                                $.magnificPopup.instance.close = function() {
                                  jQuery('.mfp-container').css('visibility', 'hidden');
                                  jQuery('.mfp-bg').css('display', 'none');
                                  jQuery('.mfp-wrap').hide();
                                };
                            });

                        }else if(cont_repeat == 1){
                            $.magnificPopup.open({
                                items :{ src : '#alert_5', },
                                type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                                closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                            });
                        }*/



                        if(is_email_duplicate === true){
                            alert('Duplicate emails noted');
                        }


                         /*sending email and validation*/
                            $('#added_members').val(JSON.stringify(added_members));
                            form = $('#create-form');

                            if(form.valid()){

                                if(!(added_members.length <= max_num_members && added_members.length >= min_num_members)){

                                    $.magnificPopup.open({
                                        items :{ src : '#alert_8', },
                                        type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                                        closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                                    });
                                    added_members = [];
                                    return false;
                                }


                                //llamada al modal
                                $.magnificPopup.open({
                                    items :{ src : '#alert_6', },
                                    type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                                    closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 0, mainClass: 'my-mfp-zoom-in'
                                });

                                $.ajax({
                                    url : form.attr('action'),
                                    type : 'post',
                                    dataType: 'json',
                                    data : form.serialize()
                                }).done(function(msg){
                                    if(msg.success){
                                        form[0].reset();
                                        added_members = [];
                                        cboxes = $('.remove_member');
                                        $.each(cboxes, function(i,cbox){
                                            $(cbox).parents('.grid_6').remove();
                                        });

                                        //close modal
                                        $.magnificPopup.close();


                                        $.magnificPopup.open({
                                            items :{ src : '#alert_7', },
                                            type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                                            closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                                        });

                                        $("#submit_response").append("They will be asked to check their name spelling, email address, add a face photo, add their Facebook name if different from their SQ group name.");

                                        setTimeout(function(){
                                            window.location.replace('http://www.social-quotient.info/socialquotient/setup/');
                                        }, 5000);

                                    }

                                }).fail(function(err){
                                    console.log(err);
                                    added_members = [];
                                    alert('Group name already exists.');
                                    $.magnificPopup.close();
                                    return false;
                                });
                            }else{
                                added_members = [];
                                return false;

                            }

                }else{
                    $('#number_error_email').text(inva_emails);
                    if(pos_invalid_email.length > 0)
                        $('#pos_error_email').text(pos_invalid_email.join());
                    $.magnificPopup.open({
                        items :{ src : '#alert_4', },
                        type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                        closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                    });
                }

            }else{
               // Empty Fields
                $.magnificPopup.open({
                    items :{ src : '#alert_2', },
                    type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                    closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                });
            }

        }else{
            // Diferent number lines
            $.magnificPopup.open({
                items :{ src : '#alert_3', },
                type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
            });

        }




    }


     function render_member_box_a(member, index, withRenderImage,i){

         box = $('#hidden').html();
         box = box.replace('{index}',(index).toString());
         box = box.replace('{bg}',colours[i]);
         box = box.replace('{bg}',colours[i]);
         box = box.replace('{name}',member.name);
         box = box.replace('{email}',member.email);
         box = box.replace('style="display:none;"', '');
         if(withRenderImage)
             box = box.replace(default_photo,member.url_photo);
         $('#box-added-members').append(box);
     }


     // /alex

     function testImage(url, callback, timeout, added_member, index) {
        current_member = added_member; // porsiacaso lo almacenamos
        timeout = timeout || 5000;
        var timedOut = false, timer;
        var img = new Image();
        //var is_valid = true;
        img.onerror = img.onabort = function() {
            if (!timedOut) {
                clearTimeout(timer);
                //is_valid = false;
                callback(url, "error", current_member, index);
            }
        };

        img.onload = function() {
            if (!timedOut) {
                clearTimeout(timer);
                //is_valid = true;
                callback(url, "success", current_member, index);
            }
        };

        img.src = url;

        timer = setTimeout(function() {
            timedOut = true;
            callback(url, "timeout", current_member, index);
        }, timeout);
    }


    function record(url, result, member, index) {

        switch(result) {
            case 'error':
                // debe ser null
                render_member_box(member, index, false);
                added_members[index].url_photo = null;
                break;
            case 'success':
                // cambiar la imagen
                console.log(member);
                console.log(default_photo);
                added_members[index].url_photo = url;
                render_member_box(member, index, true);
                break;
            case 'timeout':
                // debe ser null
                render_member_box(member, index, false);
                added_members[index].url_photo = null;
                break;
        }

        console.log(result);
    }


    function render_member_box(member, index, withRenderImage){

            box = $('#hidden').html();
            box = box.replace('{index}',(index).toString());
            box = box.replace('{bg}',colours[i]);
            box = box.replace('{bg}',colours[i]);
            box = box.replace('{name}',member.name);
            box = box.replace('{email}',member.email);
            box = box.replace('style="display:none;"', '');
            if(withRenderImage)
                box = box.replace(default_photo,member.url_photo);
            $('#box-added-members').append(box);
    }


    jQuery(document).ready(function($){

        $("#create-form").validate({
                //onsubmit : false,
                //onfocusout: function(element) { $(element).valid(); },
                //onfocusin: function(element) { $(element).valid(); },
                rules: {
                    group_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 255
                    },
                    name_owner: {
                        required: true,
                        minlength: 2,
                        maxlength: 255
                    },
                    email_owner: {
                        required: true,
                        email: true,
                        maxlength:255
                    },
                    zipcode: {
                        required: true,
                        minlength: 2,
                        maxlength : 255
                    },
                    quizdate:{
                        required: true,
                        date: true
                    },
                    resdate:{
                        required: true,
                        date: true
                    },
                    group_description: {
                        required: true,
                        minlength: 2,
                        maxlength : 255
                    }

                },
                messages: {

                    group_name: {
                        required: "Please enter a group name",
                        minlength: "Your group name must consist of at least 2 characters",
                        maxlength: "your group name must consist of maximum 255 characters",
                    },

                    email: {
                        required: "Please enter a email",
                        email: "Please enter a valid email address",
                        maxlength: "your email must consist of maximum 255 characters",
                    },
                    zipcode: {
                        required: "Please enter a zip code",
                        minlength: "Your zip code must consist of at least 2 characters",
                        maxlength: "your zip code must consist of maximum 255 characters",
                    },
                    quizdate: {
                        required: "Please enter a quiz date",
                        date: "Please enter a valid date",
                    },
                    resdate: {
                        required: "Please enter a quiz result date",
                        date: "Please enter a valid date",
                    },
                    group_description: {
                        required: "Please enter a description",
                        minlength: "Your group description must consist of at least 2 characters",
                        maxlength: "your group description must consist of maximum 255 characters",
                    }

                }
            });

         $("#members-form").validate({
               // onsubmit : false,
                //onfocusout: function(element) { $(element).valid(); },
                //onfocusin: function(element) { $(element).valid(); },
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        maxlength: 200
                    },
                    email: {
                        required: false,
                        email : true
                    },
                    url_photo: {
                        required: false,
                        url: true
                    }

                },
                messages: {

                    name: {
                        required: "Please enter a member name",
                        minlength: "Your group name must consist of at least 2 characters",
                        maxlength: "your group name must consist of maximum 200 characters",
                    },
                    email: {
                        email : "Please provide a valid email",
                    },
                    url_photo: {
                        url : "Please provide a valid url",
                    }

                }
            });

        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#dropzone", {

            paramName: "file",
            uploadMultiple : false,
            maxFilesize: 1, // MB
            acceptedFiles : '.txt',
            url: "<?php echo action('QuizController@batchMembers'); ?>",
            dictDefaultMessage: '<span class="fileinput" style="border:none;"><span>Choose your txt file</span> or Drop Here</span>',
            params : {_token : "{{{ csrf_token() }}}" },
            init : function(){
                this.on('success', function(file, response){
                    this.removeAllFiles();
                    $.magnificPopup.instance.close();

                    if(response.success){

                        added_members = $.parseJSON(response.members);
                        $.each(added_members, function(i, member){
                           j = i % 4;
                            box = $('#hidden').html();
                            box = box.replace('{index}',(i+1).toString());
                            box = box.replace('{bg}',colours[j]);
                            box = box.replace('{bg}',colours[j]);
                            box = box.replace('{name}',member.name);
                            box = box.replace('{email}',member.email);
                            if(member.url_photo)
                                box = box.replace(default_photo,member.url_photo);

                            box = box.replace('style="display:none;"', '');
                            $('#box-added-members').append(box);
                        });



                    }else{
                        $('#error_window .message_error').text(response.members);
                        alert(response.members);

                        /*
                        $.magnificPopup.open({
                            items :{
                                src : '#error_window',
                            },
                            type: 'inline',

                            fixedContentPos: false,
                            fixedBgPos: true,

                            overflowY: 'auto',

                            closeBtnInside: true,
                            preloader: false,

                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });
                        */

                    }
                });

            },
        });

        $('#link_batch').on('click', function(e){
            e.preventDefault();
            $.magnificPopup.open({
                    items :{
                        src : '#upload_file',
                    },
                    type: 'inline',

                    fixedContentPos: false,
                    fixedBgPos: true,

                    overflowY: 'auto',

                    closeBtnInside: true,
                    preloader: false,

                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });
        });

        $('#members-form').ajaxForm({
            beforeSend: function() {
                //
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                console.log('success');
            },
            complete: function(xhr) {
                var response = $.parseJSON(xhr.responseText);
                if(response.success){
                    added_member.photo_url = response.nameFileServer;
                }else{
                    added_member.photo_url  = null;
                }
                testImage(response.nameFileServer, record, 5000, added_member, index);

            }
        });

        $('#add_member').on('click', function(e){
            e.preventDefault();
            if($("#members-form").valid()){
                i = added_members.length % 4;
                var is_repeat = false;

               if($('#email').val() != ''){

                   $.each(added_members, function(m, member_obj){
                        if(member_obj.email == $('#email').val() && $('#email').val() != '-'){
                            is_repeat = true;
                            return false;
                        }
                   });

                   if(is_repeat){

                       $.magnificPopup.open({
                           items :{ src : '#alert_5', },
                           type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                           closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                       });

                       return false;
                   }
               }

                if(added_members.length <= max_num_members){
                        photo = document.getElementById("url_photo");

                        if($(photo).length >0){
                            photo = photo.files[0].name;
                        }else{
                          photo = ""  ;
                        }

                        added_member = {name:$('#name').val(), email:$('#email').val(), url_photo: photo};
                        console.log(added_member); //return false;
                        added_members.push(added_member);
                        index = added_members.length - 1;
                        if(photo){
                            $('#members-form').submit();
                            console.log('hay foto');
                            //testImage(photo, record, 5000, added_member, index);
                        }else{
                            render_member_box(added_member, index, false);
                            added_member = null;
                            console.log('no hay foto');
                        }
                        console.log('flujo normal');
                }else{
                    $.magnificPopup.open({
                        items :{ src : '#alert_8', },
                        type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                        closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                    });
                }

                $('#name').val(''); $('#email').val(''); $('#url_photo').val('');

            }
        });


        $(document).on('click', '.remove_member', function(e){
            e.preventDefault();
            box = $(this).parents('.grid_6');
            index = box.attr('data-ref');
            console.log(index);
            added_members.splice(index,1);
            added_member = null;
            box.remove();
            var boxes = $('#box-added-members .grid_6');
            $.each(boxes, function(k, el) {
                $(el).attr('data-ref', k);
            });
            console.log(added_members);
        });


        $('#submit_form').on('click', function(e){
            e.preventDefault();

            $('#added_members').val(JSON.stringify(added_members));
            form = $('#create-form');

            if(form.valid()){

                if(!(added_members.length <= max_num_members && added_members.length >= min_num_members)){

                    $.magnificPopup.open({
                        items :{ src : '#alert_8', },
                        type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                        closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                    });

                    return false;
                }

                //llamada al modal
                $.magnificPopup.open({
                    items :{ src : '#alert_6', },
                    type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                    closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 0, mainClass: 'my-mfp-zoom-in'
                });

                $.ajax({
                    url : form.attr('action'),
                    type : 'post',
                    dataType: 'json',
                    data : form.serialize()
                }).done(function(msg){
                    if(msg.success){
                        form[0].reset();
                        added_members = [];
                        cboxes = $('.remove_member');
                        $.each(cboxes, function(i,cbox){
                            $(cbox).parents('.grid_6').remove();
                        });

                        //close modal
                        $.magnificPopup.close();


                        $.magnificPopup.open({
                            items :{ src : '#alert_7', },
                            type: 'inline',fixedContentPos: false, fixedBgPos: true,overflowY: 'auto',closeBtnInside: true,
                            closeOnBgClick : false, preloader: false,midClick: true,removalDelay: 300, mainClass: 'my-mfp-zoom-in'
                        });

                        $("#submit_response").append("They will be asked to check their name spelling, email address, add a face photo, add their Facebook name if different from their SQ group name.");

                        setTimeout(function(){
                            location.reload();
                        }, 5000);

                    }

                }).fail(function(err){
                    console.log(err);
                    alert('Group name already exists.');
                });
            }
        });
    });


    $(document).ready(function(){
        var dateToday = new Date();
        $("#quizdate").datepicker({ minDate: dateToday});
        $("#resdate").datepicker({ minDate: dateToday});
    });


    </script>
    @endsection
        