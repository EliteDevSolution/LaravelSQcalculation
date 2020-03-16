@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')
<style type="text/css">
    .ui-datepicker-calendar td a{
        color:#000000;
    }
</style>

    <section class="nicdark_section">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="nicdark_space40"></div>

            <div class="grid grid_12">
                <h1 class="sc-subtitle subtitle black">
                  Set quiz date
                </h1>

                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius" style="width: 25%"></span></div>
                <div class="nicdark_space50"></div>
                

    <div class="grid grid_12 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">

        {!! Form::open(array('action' => 'QuizController@quizdate', 'id'=>'quizdate-form')) !!}

        <div class="grid grid_7 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative bng_margin_10_0">

            

            <div class="nicdark_textevidence black">
                <div class="nicdark_margin1820 nicdark_marginleft100 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">

                    <div class="nicdark_focus nicdark_width_percentage100">
                        <input id="quizdate" class="nicdark_bg_orange nicdark_radius nicdark_shadow orange medium subtitle mobile-bottom-input space-20" type="text" placeholder="Click to set your QUIZ DATE" name="quizdate">
                    </div>

                    <p>The group Quiz Date should normally be on a Monday, Tuesday, or  Wednesday.</p><br />
                    <p>Friday of that week will be the End Date for entering quiz marks.</p><br />
                    <p>After you click the Submit button below, your students/ group members will each be sent the email below.  It will show the group Quiz date you choose on this page.</p><br />
                    
                    <div class="nicdark_space10"></div>
                        <a href="javascript:;"  class="nicdark_zoom nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white nicdark_margin10">
                        <i class="icon-paper-plane-1"></i> Submit
                    </a>

                </div>

            </div>

        </div>

        

       
        {!! Form::close() !!}

</div>


                
                
            </div>


            <div class="nicdark_space50"></div>

        </div>
        <!--end nicdark_container-->

    </section>
<!--end section-->



			         <div class="nicdark_space40"></div>
               <div class="nicdark_space50"></div>

            </div>
        </div>
        <!--end nicdark_container-->

    </div>

</section>

<!--end section-->
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $("#quizdate").datepicker();
    });
</script>
@endsection
