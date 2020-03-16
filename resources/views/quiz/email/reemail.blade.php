@extends('layouts.master')


@section('content')

<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div class="nicdark_space50"></div>

		<div class="grid grid_12">
            <h4>Hello! <?php echo $member->name; ?></h4>
            <p><?php //echo ?> </p>
            <div class="nicdark_space50"></div>
            <h4>ENTER THIS LINK TO YOUR REPORT</h4>
            <a href="{{ URL::action( 'QuizController@report_one') }}">SIGN IN</a>       
        </div>
		
    </div>
    <!--end nicdark_container-->
            
</section>

@endsection

@section('javascript')

@endsection