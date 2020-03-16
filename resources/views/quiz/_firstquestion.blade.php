<div class="pull-xs-right question-field col-xs-8 col-md-6 nicdark_bg_blue nicdark_radius bng_height_85" style="padding:10px 3px">
		<h2 class="question-heading">
				Rate Person <span class="number_question">1</span>:
		</h2>
		<p>
			<?php echo $question->text;?>
		</p>
</div>
<div class="col-xs-4 col-md-6 hidden-md hidden-lg" style="padding: 14px 0; margin:0;">

	<div class="col-xs-2 col-md-2 bng_height_85">
		<a href="" class="nicdark_radius_circle white  nicdark_shadow without-href">
			<img id="target-image" class="small_img nicdark_radius nicdark_opacity nicdark_focus" src="<?php echo $member->getPhoto(); ?>">
		</a>
	</div>

	<div class="col-xs-12 col-md-10 bng_height_85">
		<span class="member-name">
			<?php echo strtoupper(strtolower($member->name)); ?>
		</span>
		<input type="hidden" id="taken_member" value="<?php echo $member->token;?>">
	</div>

</div>
<div class="col-xs-12 col-md-6 " style="padding:0; margin:0;">
	<?php for ($i = 0; $i < count($alternatives); $i++) : $alternative = $alternatives[$i];?>
	<div class="answer-field col-xs-12 <?php echo ($alternative->id == 5) ? "col-md-4" : "col-md-2" ?> nicdark_bg_blue nicdark_radius border-left-dashed bng_height_85">
			<a data-id="<?php echo $alternative->id;?>" href="#" class="visible-xs visible-sm answer nicdark_btn_icon nicdark_bg_red small nicdark_radius_circle white">
				<i class="icon-cancel-outline"></i>
			</a>
			<p class="black text-center">
				<strong class="alternative-text">
					<?php echo ($alternative->id == 5) ? "Don't Know" : $alternative->text; ?>
				</strong>
			</p>
	</div>
	<?php endfor;?>

</div>

<div class="clearfix">

</div>

<div class="col-xs-12 col-md-6 hidden-xs hidden-sm" style="padding:0;margin: 10px 0px;">
	<div class="col-xs-2 col-md-2 bng_height_85">
		<a href="" class="nicdark_radius_circle white  nicdark_shadow without-href">
			<img id="target-image" class="small_img nicdark_radius nicdark_opacity nicdark_focus" src="<?php echo $member->getPhoto(); ?>">
		</a>
	</div>
	<div class="col-xs-10 col-md-10 bng_height_85">
		<h2 class="inline color_404547 ">
			<span id="target-text" class="member-name">
				<?php echo strtoupper(strtolower($member->name)); ?>
			</span>
		</h2>
		<input type="hidden" id="taken_member" value="<?php echo $member->token;?>">
	</div>

</div>
<div class="col-xs-12 col-md-6 hidden-xs hidden-sm" style="padding:0; margin:0;">
	<?php for ($i = 0; $i < count($alternatives); $i++) : $alternative = $alternatives[$i];?>
	<div class="col-xs-2 <?php echo ($alternative->id == 5) ? "col-md-4" : "col-md-2" ?> text-center bng_padding_20">
		<a data-id="<?php echo $alternative->id;?>" href="#" class="answer nicdark_btn_icon nicdark_bg_red small nicdark_radius_circle white">
			<i class="icon-cancel-outline"></i>
		</a>
	</div>
	<?php endfor;?>
</div>
