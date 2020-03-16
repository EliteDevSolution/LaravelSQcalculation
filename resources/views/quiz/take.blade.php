@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')
<style type="text/css">
.xwb-center{
    width: 780px;
    margin: 0 auto;
    float: none;
    display: table;
}
    
</style>
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
        <div class="nicdark_container bng-description-title">
            <h2 class="color_404547">
                <strong><?php echo strtoupper(strtolower($group->name));?></strong>
            </h2>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius" style="width: 25%"></span></div>
            <div class="nicdark_space20"></div>
            <div class="bng-subtitle-content color_404547">
                <h5 class="black group-description"><?php echo strtoupper(strtolower($group->description));?></h5>
            </div>
        </div>
        <div class="nicdark_space20"></div>
        <div class="grid grid_12">
            <h1 class="subtitle greydark black">BEFORE THE QUIZ</h1>
            <div class="nicdark_space20"></div>
            <h3 class="subtitle black">HERE ARE SOME RECOMMENDATIONS TO TAKE AN ACCURATE QUIZ</h3>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left big"><span class="nicdark_bg_yellow nicdark_radius"></span></div>
            <div class="nicdark_space10"></div>
        </div>

        <div class="grid grid_8 nicdark_relative xwb-center">

            <div class="nicdark_btn_iconbg nicdark_bg_green nicdark_absolute extrabig nicdark_shadow nicdark_radius">
                <div>
                    <i class="icon-cab nicdark_iconbg left big white"></i>
                </div>
            </div>

            <div class="nicdark_activity nicdark_marginleft100">
                
                <div class="nicdark_space20"></div>

                <h1>IMAGINE THIS SCENE</h1>
                    <p>You enter a large store and notice that the sales clerks are all your classmates.</p>
                    <p>Think about them in three groups:</p>
                    <ul>
                        <li><p>Your friends plus those you might ask to help you in making a purchase</p></li>
                        <li><p>Classmates you don't feel as comfortable with</p></li>
                        <li><p>A smaller group of people you don't know as well as the above groups</p></li>
                    </ul>
                <div class="nicdark_space20"></div>
            </div>

        </div>

        <div class="grid grid_6 nicdark_relative">

            <div class="nicdark_btn_iconbg nicdark_bg_yellow nicdark_absolute extrabig nicdark_shadow nicdark_radius">
                <div>
                    <i class="icon-leaf-1 nicdark_iconbg left big white"></i>
                </div>
            </div>

            <div class="nicdark_activity nicdark_marginleft100">
                
                <div class="nicdark_space20"></div>

                <p>IMPORTANT - your number of classmates in each category A – D should be about the same. In a class of 30, aim for 6 people in each of the 5 groups. During the quiz, you will be asked several times to balance your rating groups.</p>
                <p>You will not be rating yourself. Before marking a person in class, wait for them to stand and say something.</p>

                <div class="nicdark_space20"></div>
            </div>

        </div>

        <div class="grid grid_6 nicdark_relative">

            <div class="nicdark_btn_iconbg nicdark_bg_orange nicdark_absolute extrabig nicdark_shadow nicdark_radius">
                <div>
                    <i class="icon-stopwatch nicdark_iconbg left big white"></i>
                </div>
            </div>

            <div class="nicdark_activity nicdark_marginleft100">
                
                <div class="nicdark_space20"></div>

                <p>On the next page you will start to rate your classmates as clerks for you:</p>
                <ul>
                    <li><p>Mark an A (best) or B for the first group. (red x changes to green check)</p></li>
                    <li><p>Mark a C or D (lowest on your list) for the second group</p></li>
                    <li><p>Mark Don't Know for classmates you are uncertain about</p></li>
                </ul>
                <div class="nicdark_space20"></div>
            </div>

        </div>

        <div class="nicdark_clearfix"></div>

        <div class="nicdark_space10"></div>

        <!-- <div class="grid grid_12 nicdark_relative nicdark_activity">
            <h1>IMAGINE THIS SCENE</h1>
            <p>You enter a large store and notice that the sales clerks are all your classmates.</p>
            <p>Think about them in three groups:</p>
            <ul>
                <li><p>Your friends plus those you might ask to help you in making a purchase</p></li>
                <li><p>Classmates you don't feel as comfortable with</p></li>
                <li><p>A smaller group of people you don't know as well as the above groups</p></li>
            </ul>
            <p>On the next page you will start to rate your classmates as clerks for you:</p>
            <ul>
                <li><p>Mark an A (best) or B for the first group. (red x changes to green check)</p></li>
                <li><p>Mark a C or D (lowest on your list) for the second group</p></li>
                <li><p>Mark Don't Know for classmates you are uncertain about</p></li>
            </ul>
        
            <p>IMPORTANT - your number of classmates in each category A – D should be about the same. In a class of 30, aim for 6 people in each of the 5 groups. During the quiz, you will be asked several times to balance your rating groups.</p>
            <p>You will not be rating yourself. Before marking a person in class, wait for them to stand and say something.</p>
        </div> -->

        <div class="nicdark_clearfix"></div>

        <div class="nicdark_space10"></div>

        <div class="nicdark_textevidence center">
                <a href="{{ URL::action( 'QuizController@quiz', ['id'=>$group->token, 'member_id'=>$user->token] ) }}" class="nicdark_zoom nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white nicdark_margin10"><i class="icon-lightbulb-1" style="padding-right: 10px;"></i>START QUIZ</a>
        </div>

        <div class="nicdark_space50"></div>
    </div>
    <!--end nicdark_container-->

</section>
@endsection

@section('javascript')
@endsection
