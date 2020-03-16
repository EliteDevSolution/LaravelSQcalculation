<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    

     <title>@yield('title')</title> <!--insert your title here-->
    <meta name="description" content="nicdark Framework"> <!--insert your description here-->
    <meta name="author" content="nicdark"> <!--insert your name here-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--meta responsive-->

    <!--START CSS-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_style.css')}}"> <!--style-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_responsive.css')}}"> <!--nicdark_responsive-->

    <!--revslider-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/revslider/settings.css')}}"> <!--revslider-->

    <!--dropzone-->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/dropzone/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/dropzone/basic.min.css')}}">
    <!--dropzone-->

    <!--responsive-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">
    <!--END CSS-->

    <!--customize-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/shame.css')}}"> <!--customize-->


    <!--google fonts-->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> <!-- font-family: 'Montserrat', sans-serif; -->
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'> <!-- font-family: 'Raleway', sans-serif; -->
    <link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'> <!-- font-family: 'Montez', cursive; -->

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--FAVICONS-->
    <link rel="shortcut icon" href="{{URL::asset('assets/img/favicon/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{URL::asset('assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('assets/img/favicon/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('assets/img/favicon/apple-touch-icon-114x114.png')}}">
    <!--END FAVICONS-->

    <!--Estilos Personales-->
    @section('styles')

    @show
    <link rel="stylesheet" href="{{URL::asset('assets/css/global.css')}}">



</head>
<body id="start_nicdark_framework" class="brown-bg">

    <div class="nicdark_site image-bg">
        <div class="nicdark_site_fullwidth nicdark_clearfix">
            <div class="nicdark_overlay"></div>

            <!--start section-->
            <section id="nicdark_parallax_title" class="nicdark_section">
                <div class="nicdark_filter">
                    <!--start nicdark_container-->
                    <div class="nicdark_container nicdark_clearfix">
                        <div class="grid grid_12 stain-bg">
                            <div class="nicdark_space40"></div>
                            <h1 class="title">
                                <a href="<?php echo url('/');?>">
                                    <span>Social</span>-<span>Quotient</span>
                                </a>
                            </h1>
                            <div class="nicdark_space10"></div>
                            <h3 class="subtitle subtitle-lead red">® a non-profit website</h3>
                            <div class="nicdark_space20"></div>
                            <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius"></span></div>
                            <div class="nicdark_space20"></div>

<!--                            <a href="{{URL::action('QuizController@create')}}" class="btn-create-group nicdark_zoom nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white nicdark_margin10">
                                <i class="icon-lightbulb-1"></i>&nbsp;&nbsp;&nbsp;CREATE YOUR OWN GROUP LIST
                            </a>
-->
                            <!-- menu -->

                            <div class="nicdark_section nicdark_navigation fade-down" id="principal-menu">
                                <div class="nicdark_menu_boxed menu_mobilex" style="width: 100%">
                                    <!--<div class="nicdark_section nicdark_bg_blue nicdark_shadow nicdark_radius_bottom sq-menu-container menu_mobilex" style="width: 100%">

                                        <div class="nicdark_container nicdark_clearfix menu_mobilex">

                                            <div class="grid grid_12 percentage">
                                                <nav>
                                                    <ul class="nicdark_menu">
                                                        <li class="red">
                                                            <a class="grey" href="<?php echo url('/');?>">
                                                                Home
                                                            </a>
                                                        </li>
                                                        <li class="red">
                                                            <a class="grey" href="<?php echo action('QuizController@create')?>">
                                                                Create your own List Group
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>

                                        </div>-->
                                        <!--end container-->
                                    </div>
                                    <!--end header-->
                                </div>
                            </div>

                            <!-- end menu-->

                            <div class="nicdark_space10"></div>
                        </div>
                    </div>
                    <!--end nicdark_container-->
                </div>
            </section>
            <!--end section-->

            @yield('content')


        </div>
        <!--start section-->
        <div class="nicdark_section">

            <!--start nicdark_container-->
            <div class="nicdark_clearfix nicdark_bg_greydark2 nicdark_copyrightlogo">
                <div class="nicdark_space3 nicdark_bg_gradient"></div>

                <div class="nicdark_container">
                    <div class="grid grid_10 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
                        <div class="nicdark_space20"></div>
                        <p class="white">® "Social Quotient" is a protected trademark by the <span class="grey">US Patent Office</span> in 2000</p>
                    </div>

            
                    <div class="grid grid_2">
                        <div class="nicdark_focus right nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
                            <!--<div class="nicdark_margin10">
                                <a href="#" class="nicdark_facebook nicdark_press right nicdark_btn_icon small nicdark_radius white"><i class="icon-facebook-1"></i></a>
                            </div>
                            <div class="nicdark_margin10">
                                <a href="#" class="nicdark_press right nicdark_btn_icon nicdark_bg_red nicdark_shadow small nicdark_radius white"><i class="icon-gplus"></i></a>
                            </div>
                            <div class="nicdark_margin10">
                                <a href="#" class="nicdark_press right nicdark_btn_icon nicdark_bg_blue nicdark_shadow small nicdark_radius white"><i class="icon-twitter-1"></i></a>
                            </div> -->
                            <div class="nicdark_margin10">
                                <a href="#start_nicdark_framework" class="nicdark_zoom nicdark_internal_link right nicdark_btn_icon nicdark_bg_greydark2 small nicdark_radius white"><i class="icon-up-outline"></i></a>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
            <!--end nicdark_container-->

        </div>
        <!--end section-->
    </div>

    <!--main-->
    <script src="{{URL::asset('assets/js/main/jquery.min.js')}}"></script> <!--Jquery-->
    <script src="{{URL::asset('assets/js/main/jquery-ui.js')}}"></script> <!--Jquery UI-->
    <script src="{{URL::asset('assets/js/main/excanvas.js')}}"></script> <!--canvas need for ie-->

    <!--plugins-->
    <script src="{{URL::asset('assets/js/plugins/revslider/jquery.themepunch.tools.min.js')}}"></script> <!--revslider-->
    <script src="{{URL::asset('assets/js/plugins/revslider/jquery.themepunch.revolution.min.js')}}"></script> <!--revslider-->

    <!--menu-->
    <script src="{{URL::asset('assets/js/plugins/menu/superfish.min.js')}}"></script> <!--superfish-->
    <script src="{{URL::asset('assets/js/plugins/menu/tinynav.min.js')}}"></script> <!--tinynav-->

    <!--other-->
    <script src="{{URL::asset('assets/js/plugins/isotope/isotope.pkgd.min.js')}}"></script> <!--isotope-->
    <script src="{{URL::asset('assets/js/plugins/mpopup/jquery.magnific-popup.min.js')}}"></script> <!--mpopup-->
    <script src="{{URL::asset('assets/js/plugins/scroolto/scroolto.js')}}"></script> <!--Scrool To-->
    <script src="{{URL::asset('assets/js/plugins/nicescrool/jquery.nicescroll.min.js')}}"></script> <!--Nice Scroll-->
    <script src="{{URL::asset('assets/js/plugins/inview/jquery.inview.min.js')}}"></script> <!--inview-->
    <script src="{{URL::asset('assets/js/plugins/parallax/jquery.parallax-1.1.3.js')}}"></script> <!--parallax-->
    <script src="{{URL::asset('assets/js/plugins/countto/jquery.countTo.js')}}"></script> <!--jquery.countTo-->
    <script src="{{URL::asset('assets/js/plugins/countdown/jquery.countdown.js')}}"></script> <!--countdown-->
    <script src="{{URL::asset('assets/plugins/dropzone/dropzone.min.js')}}"></script> <!--dropzone-->
    <script src="{{URL::asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script> <!--jquery-validation-->
    <script src="{{URL::asset('assets/js/jquery.form.js')}}"></script> <!--Jquery-->

    <!--settings-->
    <script src="{{URL::asset('assets/js/settings.js')}}"></script> <!--settings-->

    <script type="text/javascript">
    jQuery(document).ready(function($){
        var items = $('.nicdark_menu li a');
        var url = window.location.href.slice(0,-1);

        $.each(items, function(i, item){
            $(item).parent().removeClass('active');

            if($(item).attr('href') == url){
                $(item).parent().addClass('active');
            }
        });

        $(document).on('mouseenter', '.nicdark_menu li', function(){
            $(this).find('a').css('color', '#FFF');
            $(this).find('a').css('font-weight', 'bold');
        });
        $(document).on('mouseleave', '.nicdark_menu li', function(){
            $(this).find('a').css('color', '#164449');
            $(this).find('a').css('font-weight', '400');
        });


    });
    </script>
<!--custom js-->
@section('javascript')


@show<!--custom js-->


</body>
</html>
