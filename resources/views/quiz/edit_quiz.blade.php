@extends('layouts.master')

@section('title', 'Social-Quotient')

@section('content')

    <section class="nicdark_section">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_12">
                <h1 class="subtitle greydark">EDIT YOUR QUIZ</h1>
                {{--<div class="nicdark_space20"></div>--}}
                {{--<h3 class="subtitle black">YOU HAVE TO SET A DURATION FOR THE QUIZ</h3>--}}

                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_green nicdark_radius"></span></div>
                <div class="nicdark_space10"></div>

                <p><?php Session::get("flash_message") ?></p>

                @if(Session::has('flash_type'))
                    {{--<div class="nicdark_alerts nicdark_bg_green nicdark_radius nicdark_shadow">--}}
                        {{--<p class="white nicdark_size_medium"><i class="icon-cancel-circled-outline iconclose"></i>&nbsp;&nbsp;&nbsp;<strong>WELL DONE:</strong>&nbsp;&nbsp;&nbsp;You successfully read this important alert message.</p>--}}
                        {{--<i class="icon-ok-outline nicdark_iconbg right medium green"></i>--}}
                    {{--</div>--}}
                @endif



            </div>


            {!! Form::open(array('action' => 'QuizController@update', 'id'=>'form')) !!}


            @foreach($que as $q)

                    <div class="grid grid_12 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">

                        <div class="nicdark_textevidence">

                            <h3 class="subtitle black" style="padding-left: 15px; padding-top: 15px">Question {{$q->order}}</h3>

                            <div class="nicdark_margin1820 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">

                                <div class="nicdark_focus nicdark_width_percentage100">
                                    <input name="q{{$q->id}}" id="group_name" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle mobile-bottom-input" type="text" value="{{$q->text}}" size="200" name="group_name">
                                </div>

                            </div>

                            <h3 class="subtitle black" style="padding-left: 15px; padding-top: 15px">Alternatives</h3>

                            <div class="nicdark_margin1820 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">

                                @foreach($alt as $a)

                                    @if($a->question_id == $q->id)

                                            <div class="nicdark_focus nicdark_width_percentage100">
                                                <input name="a{{$a->id}}" id="group_name" style="margin-bottom: 15px;" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle mobile-bottom-input" type="text" value="{{$a->text}}" size="200" name="group_name">
                                            </div>

                                    @endif

                                @endforeach

                            </div>

                            <h3 class="subtitle black" style="padding-left: 15px; padding-top: 15px">Trait</h3>
                            <div class="nicdark_margin1820 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">

                                   <!-- t-1 -->
                                 <select name="t{{$q->id}}" class="nicdark_bg_grey2 nicdark_radius nicdark_shadow black medium subtitle" style="padding-left: 20px;padding-right: 20px;">
                                      @if($q->trait == 0)
                                         <option value="0" selected>Trait 0</option>
                                      @else
                                         <option value="0">Trait 0</option>
                                      @endif


                                      @if($q->trait == 1)
                                          <option value="1" selected>Trait 1</option>
                                      @else
                                          <option value="1">Trait 1</option>
                                      @endif
                                 </select>

                                  {{--{!! Form::select('t{{$q->id}}', $catProducto, null, ['placeholder' => 'Seleccione Categoria', 'class'=>'form-control'])!!}--}}

                            </div>


                        </div>

                    </div>
            @endforeach




            <div class="grid grid_12">
                <div class="nicdark_textevidence center">

                    <a href="javascript:;" onclick="send()" class="nicdark_zoom nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white nicdark_margin10">
                        <i class="icon-paper-plane-1"></i>&nbsp;&nbsp;&nbsp;EDIT QUIZ
                    </a>

                </div>
            </div>




            {!! Form::close() !!}


            <div class="nicdark_space20"></div>







        </div>  <!-- e section -->


    </section>


@endsection

@section('styles')
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/number-textarea/jquery.numberedtextarea.css')}}">
@endsection

@section('javascript')

    <script>

        function send(){
            $("#form").submit();
        }

    </script>

@endsection
