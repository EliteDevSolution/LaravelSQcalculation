<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_style.css')}}"> <!--style-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_responsive.css')}}"> <!--nicdark_responsive--> 
    <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}"> 
</head>
<body class="bng-body-report">
	<div class="nicdark_container bng-report">
		<h1>Social Quotient<span class="bng-text-red">&#174;</span> report</h1>
		<div class="grid grid_12">
			<div class="grid grid_3">
				<span>Form:</span><span class="bng-text-red"><?php echo ucwords($user->name); ?></span>
			</div>
			<div class="grid grid_5" style="text-align: center;">
				<span>Group : <?php echo ucwords($group->name); ?></span>
			</div>
			<div class="grid grid_3" style="text-align: right;">
				<span>Zip Code <?php echo $group->zip; ?></span>
			</div>
		</div>
		<div class="grid grid_12" style="text-align: center;">
			<span>Your group of <?php echo $total_members;?> gave you as <span class="bng-text-red">SQ rating of <?php echo $user->scoreB; ?></span> or "<?php echo $user->getScore('second');?>" on <?php echo $group->format_date('end_date');?></span>
		</div>
		<div class="grid grid_12" style="text-align: center;">
			<span>Your SQ rating is above <?php echo $percent;?>% of other in your group</span>
		</div>
		
		<div class="grid grid_12">
			<span>You  Marked yourself as ____ male or ____ female and your age as ____</span>
		</div>
		<div class="grid grid_12">
			<span>Bellow are the you marked yourself on -and comparations to others</span>
		</div>
		-------------------------------------------------------------------------------------------------------------------------------------------------------------------
		<p>This first set traits are know to relate to SQ scores, from previus research</p>
		<table class="bng-table-notes">
			<thead>
				<tr>
					<td>Traid</td>
					<td>Your mark</td>
					<td colspan="4" style="text-align: center;">SQ of all marking "above average"</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td colspan="2" style="text-align: center;">Males</td>
					<td colspan="2" style="text-align: center;">Females</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>Your group</td>
					<td>All groups</td>
					<td>Your group</td>
					<td>All groups</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($first_trait as $data) : ?>
				<tr>
					<td><?php echo $data->question->text;?></td>
					<td><?php echo $data->alternative->text;?></td>
					<td><?php echo round($data->group_score['males']['total']/($data->group_score['males']['qty'] == 0 ? 1 : $data->group_score['males']['qty']), 2)?></td>
					<td><?php echo round($data->global_score['males']['total']/($data->global_score['males']['qty'] == 0 ? 1 : $data->global_score['males']['qty']), 2)?></td>
					<td><?php echo round($data->group_score['females']['total']/($data->group_score['females']['qty'] == 0 ? 1 : $data->group_score['females']['qty']), 2)?></td>
					<td><?php echo round($data->global_score['females']['total']/($data->global_score['females']['qty'] == 0 ? 1 : $data->global_score['females']['qty']), 2)?></td>
				</tr>
				<?php endforeach;?>
				<!--
				<tr>
					<td>-My Grade point average(in high scjhool)</td>
					<td>average</td>
					<td>111</td>
					<td>109</td>
					<td>115</td>
					<td>119</td>
				</tr>
				<tr>
					<td>-My General happines</td>
					<td>average</td>
					<td>111</td>
					<td>109</td>
					<td>115</td>
					<td>119</td>
				</tr>
				-->
				<tr>
					<td colspan="6"></td>	
				</tr>
				<tr>
					<td colspan="6">
						<p>This second set of traits may be related to SQ scores. Your self-ratings will help us learn!</p>			
					</td>	
				</tr>
				<tr>
					<td colspan="6"></td>
				</tr>
				<?php foreach($second_trait as $data) : ?>
				<tr>
					
					<td><?php echo $data->question->text;?></td>
					<td><?php echo $data->alternative->text;?></td>
					<td><?php echo round($data->group_score['males']['total']/($data->group_score['males']['qty'] == 0 ? 1 : $data->group_score['males']['qty']), 2)?></td>
					<td><?php echo round($data->global_score['males']['total']/($data->global_score['males']['qty'] == 0 ? 1 : $data->global_score['males']['qty']), 2)?></td>
					<td><?php echo round($data->group_score['females']['total']/($data->group_score['females']['qty'] == 0 ? 1 : $data->group_score['females']['qty']), 2)?></td>
					<td><?php echo round($data->global_score['females']['total']/($data->global_score['females']['qty'] == 0 ? 1 : $data->global_score['females']['qty']), 2)?></td>
						
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<!--
		<p>This second set of traits may be related to SQ scores. Your self-ratings will help us learn!</p>
		<table>
			<tr>
				<td>my general grooming</td>
				<td>average</td>
			</tr>
			<tr>
				<td>styleshness of my clothes</td>
				<td></td>
			</tr>
			<tr>
				<td>I'm easy to get along</td>
				<td></td>
			</tr>
			<tr>
				<td>Open to new ideas</td>
				<td></td>
			</tr>
			<tr>
				<td>praising others</td>
				<td></td>
			</tr>
			<tr>
				<td>welcome friends pointing out my flaws</td>
				<td></td>
			</tr>
			<tr>
				<td>Other fell relaxed around me</td>
				<td></td>
			</tr>
			<tr>
				<td>other tell me their problems</td>
				<td></td>
			</tr>
			<tr>
				<td>people really trust me </td>
				<td></td>
			</tr>
			<tr>
				<td>I feel peaceful inside</td>
				<td></td>
			</tr>
			<tr>
				<td>my patience</td>
				<td></td>
			</tr>
			<tr>
				<td>maintain my clam in situations</td>
				<td></td>
			</tr>
			<tr>
				<td>my smoking</td>
				<td>(none, little, moderate )</td>
			</tr>
			<tr>
				<td>my parting</td>
				<td>(none, little, moderate )</td>
			</tr>
			<tr>
				<td>my anger</td>
				<td>(none, little, moderate )</td>
			</tr>

		</table>
		-->
</body>
</html>