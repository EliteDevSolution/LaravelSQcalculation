<thead class="nicdark_border_blue">
	<tr>
		<td><h2 class="white"><?php echo $question->text;?></h2></td>
		<td style="width: 15px;">
			<input type="hidden" id="question" value="<?php echo $question->id; ?>">
		</td>
	</tr>
</thead>
<tbody id="answers-container" class="nicdark_bg_grey nicdark_border_grey">
<?php foreach ($question->alternatives as $alternative) : ?>
	<tr>
		<td>
			<h3><?php echo $alternative->text;?></h3>
		</td>
		<td style="width: 15px;">
			<a data-id="<?php echo $alternative->id;?>" href="#" class="answer nicdark_btn_icon nicdark_bg_red small nicdark_radius_circle white">
				<i class="icon-cancel-outline"></i>
			</a>
		</td>
	</tr>
<?php endforeach;?>
</tbody>