@extends('layouts.master_email')


@section('content')

<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div class="nicdark_space50"></div>

		<div class="grid grid_12">
            <h4>You have a new <?php echo $report->type; ?></h4>
            <p><?php echo $report->message; ?> </p>
            <div class="nicdark_space50"></div>
            <h4>Aditional Data</h4>
            <table>
                <tr>
                    <td>Name : </td>
                    <td><?php echo $report->name;?></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><?php echo $report->email;?></td>
                </tr>
            </table>
        </div>
		
    </div>
    <!--end nicdark_container-->
            
</section>
<!--end section-->
@endsection
