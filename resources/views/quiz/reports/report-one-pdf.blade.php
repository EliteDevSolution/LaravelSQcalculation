<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_style.css')}}"> <!--style-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/nicdark_responsive.css')}}"> <!--nicdark_responsive--> 
    <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">




</head>
<body class="bng-body-report">
	<div class="nicdark_container bng-report">

    <div class="grid grid_12">
      <h1>
	    <font color="#2c8993" font-weight="bold">Social Quotient</font>
        <span color="#cc0000">&#174;</span>
		  <font color="#2c8993" font-weight="bold">report</font>
      </h1>     
    </div>

		<div class="grid grid_12">
			<table>
				<tr>
					<td><span color="#2c8993">Form:</span><span color="#cc0000"><?php echo ucwords($user->name); ?></span></td>
					<td><span color="#2c8993">Group : <?php echo ucwords($group->name); ?></span></td>
					<td><span color="#2c8993">Zip Code <?php echo $group->zip; ?></span></td>
				</tr>
			</table>
		</div>
		<div class="grid grid_12" style="text-align: center;">
			<span color="#2c8993">Your group of <?php echo $total_members;?> gave you as <span color="#cc0000">SQ rating of <?php echo $score_report['total']; ?></span> or "<?php echo $user->getScore('first');?>" on <?php echo $group->format_date('end_date');?></span>
		</div>
		<div class="grid grid_12" style="text-align: center;">
			<span color="#2c8993">Your SQ rating is above <?php echo $percent;?>% of other in your group</span>
		</div>
		
		<?php foreach($questions as $question) : ?>
		<div class="grid grid_12">
			<p>"<?php echo $question->text; ?>"</p>
		</div>
		<?php endforeach;?>
		<?php 
		$end_texts = ['Your male peers gave you', 'an average SQ of '.$score_report['male'], '', 'Your female peers gave you', 'an average SQ of '.$score_report['female']];
		$start_text = ['Your prees marked you:', '', '', '', ''];
		?>
		<table class="bng-table-rang" width="600">
			<?php foreach($presses  as $key=>$press): ?>
			<tr>
				<td width="140"><?php echo $start_text[$key];?></td>
				<td width="20"><?php echo $press->qty;?></td>
				<td width="20"><?php echo $press->text;?>'s</td>
				<td style="padding-left: 20px;"><?php echo $end_texts[$key];?></td>
			</tr>
			<?php endforeach;?>
		</table>
		<p>SQ ratings,like IQ scores, are based on 100 being average</p>
		<table class="bng-table-scores" width="600">
			<tr>
				<td>Scores of 130's</td>
				<td width="20">+</td>
				<td width="20">=</td>
				<td>Absolutely superb</td>
			</tr>
			<tr>
				<td>120's</td>
				<td width="20"></td>
				<td width="20">=</td>
				<td>Excellent</td>
			</tr>
			<tr>
				<td>110's</td>
				<td width="20"></td>
				<td width="20">=</td>
				<td>Very good</td>
			</tr>
			<tr>
				<td>100's</td>
				<td width="20"></td>
				<td width="20">=</td>
				<td>Slightly above average</td>
			</tr>
			<tr>
				<td>90's</td>
				<td width="20"></td>
				<td width="20">=</td>
				<td>Slightly bellow average</td>
			</tr>
			<tr>
				<td>bellow 90</td>
				<td width="20"></td>
				<td width="20">=</td>
				<td>Bellow average</td>
			</tr>

		</table>

	
</body>
</html>