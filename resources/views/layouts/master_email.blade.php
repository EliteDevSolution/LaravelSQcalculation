<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="utf-8">
    <style type="text/css">
/* 1- START NICDARK FRAMEWORK*/
body{ margin:0px; padding:0px; overflow-x:hidden; background-color: #ccc; }
body.nicdark_boxed_img{ background-image: url(<?php echo config('app.url').'assets';?>/img/img4.jpg) !important; background-size: cover; background-attachment: fixed; }

/* 2 - CONTAINER */
.nicdark_container{ width:1200px; margin:auto; padding: 0px; }
.nicdark_clearfix:after { content: ""; display: block; height: 0; clear: both; visibility: hidden; }



/* 3- START NICDARK_SITE*/
.nicdark_site{ float: left; width: 100%; -webkit-transition: all 0.8s ease; -moz-transition: all 0.8s ease; -o-transition: all 0.8s ease; -ms-transition: all 0.8s ease; transition: all 0.8s ease; }
.nicdark_site > .nicdark_site_fullwidth{ float: left; width: 100%; background-color: #fff; }
.nicdark_site > .nicdark_site_boxed{ width:1220px; margin:auto; padding: 0px; background-color: #fff; }
/*START NICDARK_SITE*/



/* 4 - START NICDARKSECTION*/
.nicdark_section{ width: 100%; float: left; }
/*.nicdark_section.nicdark_imgparallax{ background: url(<?php echo config('app.url').'assets';?>/img/img3.jpg) 50% 0 fixed; background-size: cover;}*/
/*END NICDARKSECTION*/



/* 5 - START NICDARKGRID*/
.grid_1, .grid_2, .grid_3, .grid_4, .grid_5, .grid_6, .grid_7, .grid_8, .grid_9, .grid_10, .grid_11, .grid_12{ margin:10px; float:left; display:inline; }
.grid.nomargin{ margin: 0px; padding: 10px; }
.grid.percentage{ margin: 0px; padding: 0px; }
.grid_12.percentage {width:100%;}
.grid_6.percentage {width:50%;}
.grid_4.percentage {width:33.33%;}
.grid_3.percentage {width:25%;}
.grid_8.percentage {width:66.66%;}
.grid_9.percentage {width:75%;}
/*size*/
.grid_1 {width:80px;}
.grid_2 {width:180px;}
.grid_3 {width:280px;}
.grid_4 {width:380px;}
.grid_5 {width:480px;}
.grid_6 {width:580px;}
.grid_7 {width:680px;}
.grid_8 {width:780px;}
.grid_9 {width:880px;}
.grid_10 {width:980px;}
.grid_11 {width:1080px;}
.grid_12 {width:1180px;}
/*END NICDARKGRID*/



/* 6 - START NIKDARKWIDTHPERCENTAGE*/
.nicdark_width_percentage1{ width: 1% !important; }
.nicdark_width_percentage10{ width: 10% !important; }
.nicdark_width_percentage20{ width: 20% !important; }
.nicdark_width_percentage25{ width: 25% !important; }
.nicdark_width_percentage30{ width: 30% !important; }
.nicdark_width_percentage40{ width: 40% !important; }
.nicdark_width_percentage50{ width: 50% !important; }
.nicdark_width_percentage60{ width: 60% !important; }
.nicdark_width_percentage70{ width: 70% !important; }
.nicdark_width_percentage80{ width: 80% !important; }
.nicdark_width_percentage90{ width: 90% !important; }
.nicdark_width_percentage100{ width: 100% !important; }
/*END NIKDARKWIDTHPERCENTAGE*/



/* 7 - START NICDARKTEXT*/
p,h1,h2,h3,h4,h5,h6{ margin:0px; padding:0px; font-weight: normal; }
/*font*/
h1,h2,h3,h4,h5,h6,input[type="text"],textarea,select{ font-family: 'Montserrat', sans-serif; color: #868585; }
h1.subtitle,h2.subtitle,h3.subtitle,h4.subtitle,h5.subtitle,h6.subtitle,input[type="text"].subtitle,textarea.subtitle,select.subtitle, span.subtitle{ font-family: 'Raleway', sans-serif; color:#a4a4a4; }
h1.signature,h2.signature,h3.signature,h4.signature,h5.signature,h6.signature, span.signature{ font-family: 'Montez', cursive; }
/*color*/
p.white,h1.white,h2.white,h3.white,h4.white,h5.white,h6.white,a.white,i.white,span.white, input[type="text"].white, textarea.white, input[type="submit"].white, select.white{ color:#ffffff; }
p.grey,h1.grey,h2.grey,h3.grey,h4.grey,h5.grey,h6.grey,a.grey,i.grey,span.grey, input[type="text"].grey, textarea.grey, input[type="submit"].grey, select.grey, pre.grey{ color:#a4a4a4; }
p.greydark,h1.greydark,h2.greydark,h3.greydark,h4.greydark,h5.greydark,h6.greydark,a.greydark,i.greydark,span.greydark, input[type="text"].greydark, textarea.greydark, input[type="submit"].greydark, select.greydark{ color:#868585; }
p.greydark2,h1.greydark2,h2.greydark2,h3.greydark2,h4.greydark2,h5.greydark2,h6.greydark2,a.greydark2,i.greydark2,span.greydark2, input[type="text"].greydark2, textarea.greydark2, input[type="submit"].greydark2, select.greydark2{ color:#353b3d; }
p.green,h1.green,h2.green,h3.green,h4.green,h5.green,h6.green,a.green,i.green,span.green, input[type="text"].green, textarea.green, input[type="submit"].green, select.green{ color:#6fc191; }
p.blue,h1.blue,h2.blue,h3.blue,h4.blue,h5.blue,h6.blue,a.blue,i.blue,span.blue, input[type="text"].blue, textarea.blue, input[type="submit"].blue, select.blue{ color:#74cee4; }
p.violet,h1.violet,h2.violet,h3.violet,h4.violet,h5.violet,h6.violet,a.violet,i.violet,span.violet, input[type="text"].violet, textarea.violet, input[type="submit"].violet, select.violet{ color:#c389ce; }
p.yellow,h1.yellow,h2.yellow,h3.yellow,h4.yellow,h5.yellow,h6.yellow,a.yellow,i.yellow,span.yellow, input[type="text"].yellow, textarea.yellow, input[type="submit"].yellow, select.yellow{ color:#edbf47; }
p.orange,h1.orange,h2.orange,h3.orange,h4.orange,h5.orange,h6.orange,a.orange,i.orange,span.orange, input[type="text"].orange, textarea.orange, input[type="submit"].orange, select.orange{ color:#ec774b; }
p.red,h1.red,h2.red,h3.red,h4.red,h5.red,h6.red,a.red,i.red,span.red, input[type="text"].red, textarea.red, input[type="submit"].red, select.red{ color:#e16c6c; }

a.red{
    color:#e16c6c;
}
/*align*/
p.center,h1.center,h2.center,h3.center,h4.center,h5.center,h6.center{ text-align: center; }
p.right,h1.right,h2.right,h3.right,h4.right,h5.right,h6.right, span.right{ float: right; }
/*size*/
p{ font-size:15px; line-height: 22px; color:#a4a4a4; font-family: 'Raleway', sans-serif; }
h1{ font-size: 30px; line-height: 30px; }
h1.extrasize{ font-size: 45px; line-height: 45px; }
h2{ font-size: 25px; line-height: 25px; }
h3{ font-size: 20px; line-height: 20px; }
h4{ font-size: 17px; line-height: 17px; }
h5{ font-size: 15px; line-height: 15px; }
h6{ font-size: 14px; line-height: 14px; }
a{ text-decoration: none; color: #868585; }
/*pre*/
pre{ overflow: auto; float: left; width: 100%; margin:0px; padding: 0px; }
pre p{ font-family: monospace; font-size: 13px; line-height: 22px; }
/*END NICDARKTEXT*/



/* 8 - START NICDARKFORMELEMENTS*/
input[type="text"]{ float: left; border: 0; outline: 0; }
textarea{ float: left; border: 0; outline: 0; }
select{ float: left; border: 0; outline: 0; width: 100%; -webkit-appearance: none; cursor: pointer; }
input[type="submit"]{ cursor: pointer; outline: 0; border: 0; }
/*size*/
input[type="text"].small, textarea.small { font-size: 15px; width: 90%; padding: 10px 5%; }
input[type="text"].medium, textarea.medium { font-size: 17px; width: 90%; padding: 10px 5%; }
input[type="text"].big, textarea.big { font-size: 17px; width: 80%; padding: 15px 10%; }
/*size select*/
select.small { font-size: 15px; padding: 10px 5%; }
select.medium { font-size: 17px; padding: 10px 5%; }
select.big { font-size: 17px; padding: 15px 10%; }
/*END NICDARKFORMELEMENTS*/



/*********************************************CUSTOM FOR BABY KIDS*************************************************************/

/* 9 - START CLASS FOR PARALLAX SECTION*/
.nicdark_parallax_img2 { background:url(<?php echo config('app.url').'assets';?>/img/slide/img2.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallax_img3 { background:url(<?php echo config('app.url').'assets';?>/img/slide/img3.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallax_img1 { background:url(<?php echo config('app.url').'assets';?>/img/slide/img1.jpg) 50% 0 fixed; background-size:cover; }

.nicdark_parallaxx_img1 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img1.jpg) 50% 0 fixed; }
.nicdark_parallaxx_img2 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img2.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img3 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img3.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img5 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img5.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img6 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img6.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img7 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img7.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img8 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img8.jpg) 50% 0 fixed; background-size:cover; }

.nicdark_parallaxx_img-teachers-1 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-teachers-1.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img-single-teacher-1 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-single-teacher-1.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img-single-teacher-2 { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-single-teacher-2.jpg) 50% 0 fixed; background-size:cover; }

.nicdark_parallaxx_img-excursions { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-excursions.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img-single-excursion { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-single-excursion.jpg) 50% 0 fixed; background-size:cover; }

.nicdark_parallaxx_img-courses { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-courses.jpg) 50% 0 fixed; background-size:cover; }

.nicdark_parallaxx_img-events { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-events.jpg) 50% 0 fixed; background-size:cover; }
.nicdark_parallaxx_img-single-event { background: url(<?php echo config('app.url').'assets';?>/img/parallax/img-single-event.jpg) 50% 0 fixed; background-size:cover; }
/*END CLASS FOR PARALLAX SECTION*/



/*START CUSTOM CLASS TO AVOID INLINE CSS*/
.nicdark_width60 { width: 60px; }
.nicdark_width50 { width: 50px; }

.nicdark_copyrightlogo { background-image:url(<?php echo config('app.url').'assets';?>/img/footer/copyright.jpg); background-size:95px; background-repeat:no-repeat; background-position:left; }
.nicdark_facebook { background-color:#5977b8; box-shadow:0px 4px 0px 0px #4c67a1;  }
/*END CUSTOM CLASS TO AVOID INLINE CSS*/


/* 1 - START NICDARKBG*/
.nicdark_bg_white{ background-color: #ffffff; }
.nicdark_bg_grey{ background-color: #f9f9f9; }
.nicdark_bg_grey2{ background-color: #f1f1f1; }
.nicdark_bg_greydark{ background-color: #495052;}
.nicdark_bg_greydark2{ background-color: #404547;}
.nicdark_bg_green{ background-color: #6fc191; }
.nicdark_bg_blue{ background-color: #74cee4; }
.nicdark_bg_violet{ background-color: #c389ce; }
.nicdark_bg_orange{ background-color: #ec774b; }
.nicdark_bg_red{ background-color: #e16c6c; }
.nicdark_bg_yellow{ background-color: #edbf47; }
.nicdark_bg_greendark{ background-color: #6ab78a; }
.nicdark_bg_bluedark{ background-color: #6fc4d9; }
.nicdark_bg_violetdark{ background-color: #ac7ab5; }
.nicdark_bg_orangedark{ background-color: #df764e; }
.nicdark_bg_reddark{ background-color: #c86969; }
.nicdark_bg_yellowdark{ background-color: #e0b84e; }
.nicdark_bg_gradient{ 
    background: #74cee4; /* Old browsers */
    background: -moz-linear-gradient(left,  #74cee4 0%, #66ce9c 16%, #edbf47 32%, #ec774b 49%, #74cee4 65%, #66ce9c 83%, #edbf47 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, right top, color-stop(0%,#74cee4), color-stop(16%,#66ce9c), color-stop(32%,#edbf47), color-stop(49%,#ec774b), color-stop(65%,#74cee4), color-stop(83%,#66ce9c), color-stop(100%,#edbf47)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(left,  #74cee4 0%,#66ce9c 16%,#edbf47 32%,#ec774b 49%,#74cee4 65%,#66ce9c 83%,#edbf47 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(left,  #74cee4 0%,#66ce9c 16%,#edbf47 32%,#ec774b 49%,#74cee4 65%,#66ce9c 83%,#edbf47 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(left,  #74cee4 0%,#66ce9c 16%,#edbf47 32%,#ec774b 49%,#74cee4 65%,#66ce9c 83%,#edbf47 100%); /* IE10+ */
    background: linear-gradient(to right,  #74cee4 0%,#66ce9c 16%,#edbf47 32%,#ec774b 49%,#74cee4 65%,#66ce9c 83%,#edbf47 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#74cee4', endColorstr='#edbf47',GradientType=1 ); /* IE6-9 */
}
/*END NICDARKBG*/



/* 2- START NICDARKBORDER: applica l'ombra del colore selezionato*/
.nicdark_border_white, .nicdark_border_white td, .nicdark_border_white th{ border: 2px solid #ffffff; }
.nicdark_border_grey, .nicdark_border_grey td, .nicdark_border_grey th{ border: 2px solid #f1f1f1; }
.nicdark_border_grey2, .nicdark_border_grey2 td, .nicdark_border_grey2 th{ border: 2px solid #e5e5e5; }
.nicdark_border_greydark, .nicdark_border_greydark td, .nicdark_border_greydark th{ border: 2px solid #404547; }
.nicdark_border_greydark2, .nicdark_border_greydark2 td, .nicdark_border_greydark2 th{ border: 2px solid #353b3d; }
.nicdark_border_green, .nicdark_border_green td, .nicdark_border_green th{ border: 2px solid #6ab78a; }
.nicdark_border_blue, .nicdark_border_blue td, .nicdark_border_blue th{ border: 2px solid #6fc4d9; }
.nicdark_border_violet, .nicdark_border_violet td, .nicdark_border_violet th{ border: 2px solid #ac7ab5; }
.nicdark_border_orange, .nicdark_border_orange td, .nicdark_border_orange th{ border: 2px solid #df764e; }
.nicdark_border_red, .nicdark_border_red td, .nicdark_border_red th{ border: 2px solid #c86969; }
.nicdark_border_yellow, .nicdark_border_yellow td, .nicdark_border_yellow th{ border: 2px solid #e0b84e; }
.nicdark_border_greendark, .nicdark_border_greendark td, .nicdark_border_greendark th{ border: 2px solid #65ae83; }
.nicdark_border_bluedark, .nicdark_border_bluedark td, .nicdark_border_bluedark th{ border: 2px solid #6dc0d5; }
.nicdark_border_violetdark, .nicdark_border_violetdark td, .nicdark_border_violetdark th{ border: 2px solid #a675af; }
.nicdark_border_orangedark, .nicdark_border_orangedark td, .nicdark_border_orangedark th{ border: 2px solid #d8734c; }
.nicdark_border_reddark, .nicdark_border_reddark td, .nicdark_border_reddark th{ border: 2px solid #bf6363; }
.nicdark_border_yellowdark, .nicdark_border_yellowdark td, .nicdark_border_yellowdark th{ border: 2px solid #d4ae49; }
/*END NICDARKBORDER*/



/* 3- START NICDARKSHADOW: applica l'ombra in base al colore dato usando la classe nicdark_bg_colore*/
.nicdark_shadow.nicdark_bg_grey{ box-shadow: 0px 4px 0px 0px #f1f1f1; }
.nicdark_shadow.nicdark_bg_grey2{ box-shadow: 0px 4px 0px 0px #e5e5e5; }
.nicdark_shadow.nicdark_bg_greydark{ box-shadow: 0px 4px 0px 0px #404547; }
.nicdark_shadow.nicdark_bg_greydark2{ box-shadow: 0px 4px 0px 0px #353b3d; }
.nicdark_shadow.nicdark_bg_green{ box-shadow: 0px 4px 0px 0px #6ab78a; }
.nicdark_shadow.nicdark_bg_blue{ box-shadow: 0px 4px 0px 0px #6fc4d9; }
.nicdark_shadow.nicdark_bg_violet{ box-shadow: 0px 4px 0px 0px #ac7ab5; }
.nicdark_shadow.nicdark_bg_orange{ box-shadow: 0px 4px 0px 0px #df764e; }
.nicdark_shadow.nicdark_bg_red{ box-shadow: 0px 4px 0px 0px #c86969; }
.nicdark_shadow.nicdark_bg_yellow{ box-shadow: 0px 4px 0px 0px #e0b84e; }
.nicdark_shadow.nicdark_bg_greendark{ box-shadow: 0px 4px 0px 0px #65ae83; }
.nicdark_shadow.nicdark_bg_bluedark{ box-shadow: 0px 4px 0px 0px #6dc0d5; }
.nicdark_shadow.nicdark_bg_violetdark{ box-shadow: 0px 4px 0px 0px #a675af; }
.nicdark_shadow.nicdark_bg_orangedark{ box-shadow: 0px 4px 0px 0px #d8734c; }
.nicdark_shadow.nicdark_bg_reddark{ box-shadow: 0px 4px 0px 0px #bf6363; }
.nicdark_shadow.nicdark_bg_yellowdark{ box-shadow: 0px 4px 0px 0px #d4ae49; }
/*END NICDARKSHADOW*/



/* 4 -START NICDARK_RADIUS*/
.nicdark_radius{ border-radius: 5px 5px 5px 5px;}
.nicdark_radius_top{ border-radius: 5px 5px 0px 0px; }
.nicdark_radius_bottom{ border-radius: 0px 0px 5px 5px; }
.nicdark_radius_left{ border-radius: 5px 0px 0px 5px; }
.nicdark_radius_right{ border-radius: 0px 5px 5px 0px; }
.nicdark_radius_circle{ border-radius: 100%; }
/*END NICDARK_RADIUS*/



/* 5- START NICDARK_STRIKE*/
.nicdark_strike{ text-decoration: line-through; }
/*END NICDARK_STRIKE*/



/*****************************************SOME SHORTCODES FOR CREATE YOUR PAGES********************************************/



/* 6 - START LOGO*/
.nicdark_logo{ float: left; position: relative; width: 10px; height: 10px; }
.nicdark_logo img{ position: absolute; width: 135px; margin-top: 3px; border:0;}
/*END LOGO*/


/* 7 - START NIKBTN:*/
.nicdark_btn{ font-family: 'Montserrat', sans-serif; display: inline-block; text-align: center; cursor: pointer;}
.nicdark_btn.subtitle{ font-family: 'Raleway', sans-serif !important; }
.nicdark_btn.left{ float: left;}
.nicdark_btn.right{ float: right;}
.nicdark_btn.fullwidth{ padding-left: 0px !important; padding-right: 0px !important; width: 100%;}
/*size*/
.nicdark_btn.extrasmall{ padding: 0px 10px; font-size: 13px; }
.nicdark_btn.small{ padding: 5px 10px; font-size: 15px; }
.nicdark_btn.medium{ padding: 10px 20px; font-size: 17px; }
.nicdark_btn.big{ padding: 15px 20px; font-size: 19px; }
.nicdark_btn.extrasize{ padding: 20px; font-size: 45px; line-height: 45px; }
/*END NIKBTN*/



/* 8 - START NIKBTNICON:*/
.nicdark_btn_icon{ font-family: 'Montserrat', sans-serif; display: inline-block; text-align: center; cursor: pointer;}
.nicdark_btn_icon.subtitle{ font-family: 'Raleway', sans-serif !important; }
.nicdark_btn_icon > i{ display: inline-block; width: 20px; height: 20px; }
.nicdark_btn_icon > i:before{ margin: 0px; padding:0px; }
.nicdark_btn_icon.left{ float: left;}
.nicdark_btn_icon.right{ float: right;}
/*size*/
.nicdark_btn_icon.extrasmall{ padding: 5px; font-size: 14px; }
.nicdark_btn_icon.small{ padding: 10px; font-size: 15px; }
.nicdark_btn_icon.medium{ padding: 15px; font-size: 17px; }
.nicdark_btn_icon.big{ padding: 20px; font-size: 19px; }
/*extra big*/
.nicdark_btn_icon.extrabig > i{ display: inline-block; width: 40px; height: 40px; }
.nicdark_btn_icon.extrabig{ padding: 20px; font-size: 32px; }
/*END NIKBTNICON*/



/* 9 - START NIKBTNICON:*/
.nicdark_btn_iconbg{ display: inline-block; }
.nicdark_btn_iconbg > div{ overflow: hidden; position: relative; }
/*size*/
.nicdark_btn_iconbg.small, .nicdark_btn_iconbg.small > div{ width: 40px; height: 40px; }
.nicdark_btn_iconbg.medium, .nicdark_btn_iconbg.medium > div{ width: 50px; height: 50px; }
.nicdark_btn_iconbg.big, .nicdark_btn_iconbg.big > div{ width: 60px; height: 60px; }
.nicdark_btn_iconbg.extrabig, .nicdark_btn_iconbg.extrabig > div{ width: 80px; height: 80px; }
/*END NIKBTNICON*/



/*START NICDARKICONBG*/
.nicdark_iconbg{ position: absolute; bottom: -15px;}
/*position*/
.nicdark_iconbg.left{ left: -20px;}
.nicdark_iconbg.right{ right: -20px;}
/*size*/
.nicdark_iconbg.small{ font-size: 40px; }
.nicdark_iconbg.medium{ font-size: 50px; }
.nicdark_iconbg.big{ font-size: 60px; }
.nicdark_iconbg.extrabig{ font-size: 80px; }
/*color*/
.nicdark_iconbg.grey{ color: #f1f1f1; }
.nicdark_iconbg.green{ color: #6ab78a; }
.nicdark_iconbg.blue{ color: #6fc4d9; }
.nicdark_iconbg.violet{ color: #ac7ab5; }
.nicdark_iconbg.orange{ color: #df764e; }
.nicdark_iconbg.red{ color: #c86969; }
.nicdark_iconbg.yellow{ color: #e0b84e; }
/*END NICDARKICONBG*/



/* 10 - START NIKDIVIDER: color, align, size*/
.nicdark_divider{ float: left; width: 100%;}
.nicdark_divider > span{ display: block; margin:auto; }
/*align*/
.nicdark_divider.left > span{ float: left; }
.nicdark_divider.right > span{ float: right; }
/*size*/
.nicdark_divider.big > span{ width: 80px; height: 5px; }
.nicdark_divider.small > span{ width: 30px; height: 3px; }
/*END NIKDIVIDER*/



/* 11- START NICDARKDROPCAP*/
.nicdark_dropcap{ float: left; font-size: 35px; line-height: 20px; padding: 15px; margin-right: 20px; }
/*END NICDARKDROPCAP*/

/* 12 - START NIKALERTS*/
.nicdark_alerts{ float: left; width: 100%; overflow: hidden; position: relative; }
.nicdark_alerts > p > .iconclose{ cursor: pointer; }
/*END NIKALERTS*/

/* 13 - START NICDARKIFRAME*/
.nicdark_iframe{ float: left; width: 100%; border: 0; }
/*END NICDARKIFRAME*/


/* 14 - START NIKACCORDION*/
.nicdark_accordion{ float: left; width: 100%; }
.nicdark_accordion .ui-accordion-header-active { cursor: initial !important; }
.nicdark_accordion .nicdark_accordion_header{ outline: 0; cursor: pointer; margin-bottom: 20px; }
.nicdark_accordion_content{ padding: 0px 20px 20px 20px; }
/*size*/
.nicdark_accordion_header.small{ padding: 5px 10px; }
.nicdark_accordion_header.medium{ padding: 10px 20px; }
.nicdark_accordion_header.big{ padding: 15px 20px; }
/*icon*/
.nicdark_accordion .ui-accordion-header-active:before { content: '\e9ff' !important; font-family: 'fontello'; margin-right: 10px; }
.nicdark_accordion .ui-accordion-header:before { content: '\ea01'; font-family: 'fontello'; margin-right: 10px; }
/*END NIKACCORDION*/


/* 15  - START NIKTOOGLE*/
.nicdark_toogle{ float: left; width: 100%; }
.nicdark_toogle_content{ padding: 20px; }
.nicdark_toogle .nicdark_toogle_header{ outline: 0; cursor: pointer; float: none; width: initial; }
/*size*/
.nicdark_toogle_header.small{ padding: 5px 10px; }
.nicdark_toogle_header.medium{ padding: 10px 20px; }
.nicdark_toogle_header.big{ padding: 15px 20px; }
/*icon*/
.nicdark_toogle .ui-accordion-header-active:before { content: '\e9ff' !important; font-family: 'fontello'; margin-right: 10px; }
.nicdark_toogle .ui-accordion-header:before { content: '\ea01'; font-family: 'fontello'; margin-right: 10px; }
/*END NIKTOOGLE*/


/* 16 - START NIKPROGRESSBAR*/
.nicdark_progressbar{ float:left; width:100%; }
.nicdark_progressbar_title{ margin: 0px; padding:0px; min-height: 20px; -webkit-transition: all 0.8s ease; -moz-transition: all 0.8s ease; -o-transition: all 0.8s ease; -ms-transition: all 0.8s ease; transition: all 0.8s ease; }
.nicdark_progressbar_title > span{ padding:0px; display:inline-block;}
/*animate*/
.animate_progressbar{ width: 0% !important; }
/*END NIKPROGRESSBAR*/


/* 17 - START NICDARKTABS*/
.nicdark_tab{ float: left; width: 100%; }
.nicdark_tabs{ float: left; width: 100%; }
.nicdark_tab > .nicdark_tabslist{ margin: 0px; padding: 0px; list-style: none; float: left; width: 100%; }
.nicdark_tab > .nicdark_tabslist > li{ margin: 0px; padding: 0px; float: left; }
.nicdark_tab > .nicdark_tabslist > li > a{ outline: 0; }
.nicdark_tab > .nicdark_tabslist > .ui-tabs-active > a{ background-color: #f9f9f9 !important; color: #b7b7b7 !important; box-shadow: 0px 4px 0px 0px #f1f1f1;  }
/*END NICDARKTABS*/


/* 18 - START NICDARKLIST*/
.nicdark_list{ float: left; width: 100%; list-style: none; margin: 0px; padding: 0px; }
.nicdark_list > li{ float: left; width: 100%; border-top: 0px; border-left: 0px; border-right: 0px; border-width: 1px; }
.nicdark_list > li:last-child{ border-bottom-width: 0px; }
/*END NICDARKLIST*/


/* 19 - START NICDARKTABLE*/
.nicdark_table{ float:left; width: 100%; border-collapse: collapse; }
.nicdark_table thead, .nicdark_table tbody { border-width: 0px; }
.nicdark_table tr td, .nicdark_table tr th{ border-width: 1px; }
/*size*/
.nicdark_table.small tr td, .nicdark_table.small tr th{ padding: 5px 10px; }
.nicdark_table.medium tr td, .nicdark_table.medium tr th{ padding: 10px 20px; }
.nicdark_table.big tr td, .nicdark_table.big tr th{ padding: 15px 20px; }
.nicdark_table.extrabig tr td, .nicdark_table.extrabig tr th{ padding: 20px 20px; }
/*align*/
.nicdark_table.center{ text-align: center; }
.nicdark_table.left{ text-align: left; }
.nicdark_table.right{ text-align: right; }
/*END NICDARKTABLE*/



/* 20 - START NICDARKFILTER*/
.nicdark_filter{ float: left; width: 100%; }
.nicdark_filter.greydark { background: rgba(0,0,0,0.2); }
.nicdark_filter.green { background: rgba(111,193,145,0.8); }
.nicdark_filter.blue { background: rgba(116,206,228,0.8); }
.nicdark_filter.violet { background: rgba(195,137,206,0.8); }
.nicdark_filter.yellow { background: rgba(237,191,71,0.8); }
.nicdark_filter.orange { background: rgba(236,119,75,0.8); }
.nicdark_filter.red { background: rgba(225,108,108,0.8); }
/*END NICDARKFILTER*/


/* 21 - 22 - START NICDARKLEFTSIDEBAR*/
.nicdark_left_sidebar{ width:300px; height:100%; position:fixed; left:-300px; top:0px; z-index:99999; -webkit-transition: all 0.8s ease; -moz-transition: all 0.8s ease; -o-transition: all 0.8s ease; -ms-transition: all 0.8s ease; transition: all 0.8s ease; }
.nicdark_right_sidebar{ width:300px; height:100%; position:fixed; right:-300px; top:0px; z-index:99999; -webkit-transition: all 0.8s ease; -moz-transition: all 0.8s ease; -o-transition: all 0.8s ease; -ms-transition: all 0.8s ease; transition: all 0.8s ease; }
/*overlay*/
.nicdark_overlay_on{float: left; width: 100%; height: 100%; background:rgba(0,0,0,0.3); position: fixed; z-index: 999; cursor: crosshair; -webkit-transition: all 0.8s ease; -moz-transition: all 0.8s ease; -o-transition: all 0.8s ease; -ms-transition: all 0.8s ease; transition: all 0.8s ease; }
/*END NICDARKLEFTSIDEBAR*/



/* 23 - START NICDARKTRIANGLE*/
.nicdark_triangle{ width: 0px; height: 0px; border-style: solid; border-width: 15px 15px 0 15px; position: absolute; }
/*color*/
.nicdark_triangle.grey{ border-color: #f1f1f1 transparent transparent transparent; }
.nicdark_triangle.greydark{ border-color: #404547 transparent transparent transparent; }
.nicdark_triangle.green{ border-color: #6ab78a transparent transparent transparent; }
.nicdark_triangle.blue{ border-color: #6fc4d9 transparent transparent transparent;  }
.nicdark_triangle.violet{ border-color: #ac7ab5 transparent transparent transparent;}
.nicdark_triangle.orange { border-color: #df764e transparent transparent transparent;  }
.nicdark_triangle.red{ border-color: #c86969 transparent transparent transparent; }
.nicdark_triangle.yellow{ border-color: #e0b84e transparent transparent transparent; }
/*END NICDARKTRIANGLE*/



/***************************SOME CLASSES FOR MARGIN/SPACE/POSITION/HEIGHT/DISPLAY BETWEEN ELEMENTS***************************************************/

/* 24 - SOME CLASSES*/
.nicdark_block{ display: block !important; }

/* 25 - display*/
.nicdark_displaynone_desktop { display: none; }
.nicdark_displaynone { display: none !important; }

/* 26 - padding*/
.nicdark_padding0{ padding: 0px !important; }
.nicdark_padding50{ padding: 5px 0px !important; }


/* 27 - START NIKSPACE: attribuisco la classe nicdark_space ad un div vuoto per fare degli spazi tra gli elementi*/
.nicdark_space3{ height: 3px; width: 100%; float: left; }
.nicdark_space5{ height: 5px; width: 100%; float: left; }
.nicdark_space10{ height: 10px; width: 100%; float: left; }
.nicdark_space15{ height: 15px; width: 100%; float: left; }
.nicdark_space20{ height: 20px; width: 100%; float: left; }
.nicdark_space30{ height: 30px; width: 100%; float: left; }
.nicdark_space40{ height: 40px; width: 100%; float: left; }
.nicdark_space50{ height: 50px; width: 100%; float: left; }
.nicdark_space60{ height: 60px; width: 100%; float: left; }
.nicdark_space70{ height: 70px; width: 100%; float: left; }
.nicdark_space80{ height: 80px; width: 100%; float: left; }
.nicdark_space90{ height: 90px; width: 100%; float: left; }
.nicdark_space100{ height: 100px; width: 100%; float: left; }
/*END NIKSPACE*/


/* 28 - START NICDARKMARGIN*/
.nicdark_margin5{ margin: 5px; padding: 0px; display: inline-block; }
.nicdark_margin10{ margin: 10px; padding: 0px; display: inline-block; }
.nicdark_margin100{ margin: 10px 0px; padding: 0px; display: inline-block; }
.nicdark_margin20{ margin: 20px; padding: 0px; display: inline-block; }
.nicdark_margin020{ margin: 0px 20px; padding: 0px; display: inline-block; }
.nicdark_margin010{ margin: 0px 10px; padding: 0px; display: inline-block; }
.nicdark_margin1820{ margin: 18px 20px; padding: 0px; display: inline-block; }
.nicdark_margin30{ margin: 30px; padding: 0px; display: inline-block; }
.nicdark_margin40{ margin: 40px; padding: 0px; display: inline-block; }
.nicdark_margin2040{ margin: 20px 40px; padding: 0px; display: inline-block; }
/*left*/
.nicdark_marginleft10{ margin-left: 10px; }
.nicdark_marginleft20{ margin-left: 20px; }
.nicdark_marginleft50{ margin-left: 50px; }
.nicdark_marginleft60{ margin-left: 60px; }
.nicdark_marginleft70{ margin-left: 70px; }
.nicdark_marginleft80{ margin-left: 80px; }
.nicdark_marginleft85{ margin-left: 85px; }
.nicdark_marginleft90{ margin-left: 90px; }
.nicdark_marginleft100{ margin-left: 100px; }
.nicdark_marginleft110{ margin-left: 110px; }
.nicdark_marginleft120{ margin-left: 120px; }
/*right*/
.nicdark_marginright10{ margin-right: 10px; }
.nicdark_marginright20{ margin-right: 20px; }
/*END NICDARKMARGIN*/


/* 28 - START MARGIN NEGATIVE*/
/*top*/
.nicdark_margintop10_negative { margin-top: -10px !important; }
.nicdark_margintop20_negative { margin-top: -20px !important; }
.nicdark_margintop30_negative { margin-top: -30px !important; }
.nicdark_margintop40_negative { margin-top: -40px !important; }
.nicdark_margintop45_negative { margin-top: -45px !important; }
.nicdark_margintop50_negative { margin-top: -50px !important; }
.nicdark_margintop60_negative { margin-top: -60px !important; }
.nicdark_margintop70_negative { margin-top: -70px !important; }
/*bottom*/
.nicdark_marginbottom10_negative { margin-bottom: -10px !important; }
.nicdark_marginbottom20_negative { margin-bottom: -20px !important; }
.nicdark_marginbottom30_negative { margin-bottom: -30px !important; }
.nicdark_marginbottom40_negative { margin-bottom: -40px !important; }
.nicdark_marginbottom50_negative { margin-bottom: -50px !important; }
.nicdark_marginbottom60_negative { margin-bottom: -60px !important; }
.nicdark_marginbottom70_negative { margin-bottom: -70px !important; }
.nicdark_marginbottom80_negative { margin-bottom: -80px !important; }
.nicdark_marginbottom90_negative { margin-bottom: -90px !important; }
/*END MARGIN NEGATIVE*/



/* 29 - NICDARKSIZE: APPLICARE la calsse solo al testo per distanziarlo dal box*/
.nicdark_size_small{ margin: 5px 10px; }
.nicdark_size_medium{ margin: 10px 20px; }
.nicdark_size_big{ margin: 15px 20px; }
/*NICDARKSIZE*/


/* 30 - START NICDARKABSOLUTE*/
.nicdark_absolute{ position:absolute; left: 0;}
.nicdark_absolute_left{ position:absolute; margin-top: 20px; margin-left: 20px; }
.nicdark_absolute_right{ position:absolute; margin-top: 20px; margin-right: 20px; right:0;}
/*10 margin*/
.nicdark_absolute_right10{ position:absolute; margin-top: 10px; margin-right: 10px; right:0;}
/*END NICDARKABSOLUTE*/



/* 31 - START NICDARKRELATIVE*/
.nicdark_relative{ position:relative;}
/*END NICDARKABSOLUTE*/



/* 32 - START NICDARKHEIGHT*/
.nicdark_height100{ height: 100px; }
.nicdark_height150{ height: 150px; }
.nicdark_height200{ height: 200px; }
.nicdark_height250{ height: 250px; }
.nicdark_height300{ height: 300px; }
.nicdark_height350{ height: 350px; }
.nicdark_height400{ height: 400px; }
.nicdark_height450{ height: 450px; }
.nicdark_height500{ height: 500px; }
/*END NICDARKHEIGHT*/



/**********************************SOME CLASSES FOR DIV ARCHIVE**********************************************************************/



/* 33 - START NIKTEXTEVIDENCE*/
.nicdark_textevidence{ float: left; width: 100%; position: relative; overflow: hidden; }
/*align*/
.nicdark_textevidence.center{ text-align: center; }
.nicdark_textevidence.left{ text-align: left; }
.nicdark_textevidence.right{ text-align: right; }
/*overflow*/
.nicdark_textevidence.overflow_scroll { overflow-x:auto !important; }
/*END NIKTEXTEVIDENCE*/


/* 34 - START NICDARKFOCUS*/
.nicdark_focus{ float: left; width: 100%; }
.nicdark_focus.center{ text-align: center; }
.nicdark_focus.right{ text-align: right; }
/*END NICDARKFOCUS*/


/* 35 - START NICDARKARCHIVE1*/
.nicdark_archive1{ float: left; width: 100%; position: relative; overflow: hidden; }
.nicdark_archive1.center{ text-align: center; }
.nicdark_archive1 img{ width: 100%; height: auto; display: block;}
/*END NICDARKARCHIVE1*/


/* 36 - START NICDARKACTIVITY*/
.nicdark_activity{ float: left; }
.nicdark_activity.center{ text-align: center; }
/*END NICDARKACTIVITY*/


/* 37  -  START NICDARKMASONRYCONTAINER*/
.nicdark_masonry_btns{ float: left; width: 100%; }
.nicdark_masonry_container{ float: left; width: 100%; -webkit-transition-duration: 0.8s; -moz-transition-duration: 0.8s; -ms-transition-duration: 0.8s; -o-transition-duration: 0.8s; transition-duration: 0.8s; -webkit-transition-property: height, width; -moz-transition-property: height, width; -ms-transition-property: height, width; -o-transition-property: height, width; transition-property: height, width; }
/*END NICDARKMASONRYCONTAINER*/




/***************************************************HOVER CLASSES EFFECT***********************************************************************/


/* 38 - rotate*/
.nicdark_rotate{
  -webkit-transition: all 0.5s ease;
     -moz-transition: all 0.5s ease;
       -o-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
          transition: all 0.5s ease;
}
.nicdark_rotate:hover {
  -webkit-transform: rotate(360deg);
     -moz-transform: rotate(360deg);
       -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
          transform: rotate(360deg);
}


/* 39 - press*/
.nicdark_press{
  -webkit-transition: all 0.5s ease;
     -moz-transition: all 0.5s ease;
       -o-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
          transition: all 0.5s ease;
}
.nicdark_press:hover {
  box-shadow: 0px 0px 0px 0px transparent !important;
  margin-top: 4px;
  margin-bottom: -4px;
}


/* 40 - nicdark_zoom*/
.nicdark_zoom
{
    -webkit-transition:all 500ms;
    -o-transition:all 500ms;
    transition:all 500ms;
}
.nicdark_zoom:hover 
{
    -webkit-transform:scale(1.2, 1.2);
    -o-transform:scale(1.2, 1.2);
    transform:scale(1.2, 1.2);
}


/* 41 - opacity*/
.nicdark_opacity{
opacity: 1;
-webkit-transition: opacity;
-webkit-transition-timing-function: ease-out;
-webkit-transition-duration: 250ms;
-moz-transition: opacity;
-moz-transition-timing-function: ease-out;
-moz-transition-duration: 250ms;
}
.nicdark_opacity:hover{
opacity: 0.8;
-webkit-transition: opacity;
-webkit-transition-timing-function: ease-out;
-webkit-transition-duration: 250ms;
-moz-transition: opacity;
-moz-transition-timing-function: ease-out;
-moz-transition-duration: 250ms;
}


/* 42 - TRANSITION*/
.nicdark_transition{ -webkit-transition: all 0.8s ease; -moz-transition: all 0.8s ease; -o-transition: all 0.8s ease; -ms-transition: all 0.8s ease; transition: all 0.8s ease; }


/* 43 - START NICDARKBGHOVER*/
.nicdark_bg_grey_hover:hover{ background-color: #f9f9f9 !important; }
.nicdark_bg_grey2_hover:hover{ background-color: #f1f1f1 !important; }
.nicdark_bg_greydark_hover:hover{ background-color: #495052 !important;}
.nicdark_bg_greydark2_hover:hover{ background-color: #404547 !important;}
.nicdark_bg_green_hover:hover{ background-color: #6fc191 !important; }
.nicdark_bg_blue_hover:hover{ background-color: #74cee4 !important; }
.nicdark_bg_violet_hover:hover { background-color: #c389ce !important; }
.nicdark_bg_orange_hover:hover{ background-color: #ec774b !important; }
.nicdark_bg_red_hover:hover{ background-color: #e16c6c !important; }
.nicdark_bg_yellow_hover:hover{ background-color: #edbf47 !important; }
.nicdark_bg_greendark_hover:hover{ background-color: #6ab78a !important; }
.nicdark_bg_bluedark_hover:hover{ background-color: #6fc4d9 !important; }
.nicdark_bg_violetdark_hover:hover{ background-color: #ac7ab5 !important; }
.nicdark_bg_orangedark_hover:hover{ background-color: #df764e !important; }
.nicdark_bg_reddark_hover:hover{ background-color: #c86969 !important; }
.nicdark_bg_yellowdark_hover:hover{ background-color: #e0b84e !important; }


/***************************************************CSS FOR CUSTOM REV SLIDER***********************************************************************/

.nicdark_slide1 > ul { position: absolute; z-index: 0;}




/***************************************************JQUERY UI***********************************************************************/


/* 44 - START NICDARKCALENDAR*/
.ui-datepicker{ float: left; width: 300px; position: relative;}
.grid .ui-datepicker{ float: left; width: 100%; }
/*header*/
.ui-datepicker-header{ background-color: #495052; float: left; width: 100%; border-radius: 5px 5px 0px 0px; }
.ui-datepicker-title { float: left; width: 100%; padding: 15px 0px; text-align: center; font-size: 17px; line-height: 17px; font-family: 'Montserrat', sans-serif; color: #fff; text-transform: uppercase; }
/*arrows*/
.ui-datepicker-prev span, .ui-datepicker-next span{ display: none; }
.ui-datepicker-prev{ position: absolute; left:0; top: 15px; margin-left: 20px; }
.ui-datepicker-prev:before{ content: '\ea73' !important; font-family: 'fontello'; color: #fff; cursor: pointer; }
.ui-datepicker-next{ position: absolute; right:0; top: 15px; margin-right: 20px; }
.ui-datepicker-next:before{ content: '\ea75' !important; font-family: 'fontello'; color: #fff; cursor: pointer; }
/*days*/
.ui-datepicker-calendar{ float: left; width: 100%; border-collapse: collapse; text-align: center; border-radius: 5px; box-shadow: 0px 4px 0px 0px #f1f1f1; background-color: #f9f9f9; }
.ui-datepicker-calendar thead{ background-color: #6fc191; color: #fff; font-size: 13px; line-height: 13px; font-family: 'Montserrat', sans-serif; font-weight: normal; text-transform: uppercase; }
.ui-datepicker-calendar tbody{  }
.ui-datepicker-calendar th{ font-weight: normal; padding: 15px 10px; }
.ui-datepicker-calendar td{ font-weight: normal; box-shadow:inset -1px 1px 0px 0px #f1f1f1}
.ui-datepicker-calendar td a{ font-size: 13px; padding: 10px 10px; line-height: 15px; color: #b7b7b7; display: block;}
/*today*/
.ui-datepicker-today a { color: #fff !important; background-color: #6fc191;}
.ui-datepicker-other-month {  }
/*hover*/
.ui-datepicker-calendar .ui-state-hover{ color: #fff !important; background-color: #6fc191; }
/*END NICDARKCALENDAR*/



/* 45 - START NICDARKTOOLTIP*/
.ui-tooltip{ font-family: 'Raleway', sans-serif; position: absolute; background: rgba(73,80,82,0.9); color: #fff; margin: 0px; padding: 0px; padding: 10px 20px; font-size: 15px; border-radius: 40px; outline: 0; -webkit-appearance: none; border: 0;}
/*END NICDARKTOOLTIP*/



/* 46 - START NICDARKSLIDERRANGE*/
.ui-slider { position: relative; text-align: left; float: left; width: 100%; height: 5px; }
.ui-slider .ui-slider-handle { position: absolute; z-index: 2;width: 20px; height: 20px;cursor: pointer; -ms-touch-action: none; touch-action: none; background-color: #edbf47; border-radius: 100%;outline: 0;bottom: -8px;}
.ui-slider .ui-slider-range {position: absolute;z-index: 1;font-size: .7em;display: block;border: 0;background-position: 0 0;background-color: #e0b84e;height: 5px; }
/*END NICDARKSLIDERRANGE*/

</style>

    <title></title>
</head>
<body id="start_nicdark_framework">

    <div class="nicdark_site brown-bg">
        <div class="nicdark_site_fullwidth nicdark_clearfix image-bg">
            @yield('content')
        </div>
    </div>
    
</body>
</html>

@show