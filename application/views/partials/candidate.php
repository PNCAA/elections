<div class="form-group">
	<label class="control-label col-md-2">Your name *</label>
	<div class="col-md-10">
		<?php
		echo form_input('full_name', set_value('full_name'), 'class="form-control" placeholder="Family name + First name"');
		?>
		<span class="help-block">eg. Math Man</span>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-2">Your major *</label>
	<div class="col-md-10">
		<?php
		$options = [
			'' => '-- select one --',
			'SNA' => 'SNA',
			'WEP' => 'WEP / DOP',
			'DMO' => 'DEO / DMO'
		];
		echo form_dropdown('major', $options, '', 'class="form-control"');
		?>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-2">Your promotion *</label>
	<div class="col-md-10">
		<?php
		echo form_input('promotion', set_value('promotion'), 'class="form-control" placeholder="2012"');
		?>
	</div>
</div>
<hr>
<div class="hint-message">
	Please select 5 candidates who you want them to lead PN Cambodia Alumni Association!
</div>
<?php foreach ($candidates as $candidate) { ?>
<div class="media">
	<div class="media-left">
		<?php echo img(IMG_PATH . strtolower($candidate->first_name) .'.jpg?' . time()); ?>
	</div>
	<div class="media-body">
		<div class="checkbox">
			<label>
				<?php
				echo form_checkbox('candidates[]', $candidate->identifier)
					. ($candidate->sex === 'f' ? 'MS. ' : 'MR. ')
					. strtoupper($candidate->last_name . ' ' . $candidate->first_name);
				?>
			</label>
			<a class="label label-info" role="button" data-toggle="collapse" href="#<?php echo $candidate->identifier; ?>" aria-expanded="false" aria-controls="<?php echo $candidate->identifier; ?>">
				<span class="glyphicon glyphicon-hand-right"></span> detail
			</a>
			&nbsp;
			<a class="label label-success" target="_blank" href="https://www.facebook.com/<?php echo $candidate->facebook; ?>" title="<?php echo $candidate->first_name; ?> facebook">Facebook</a>
			&nbsp;
			<a class="label label-warning" target="_blank" href="https://www.linkedin.com/in/<?php echo $candidate->linkedin; ?>" title="<?php echo $candidate->first_name; ?> linkedin">Linkedin</a>
			<div class="collapse" id="<?php echo $candidate->identifier; ?>">
				<figure>
					<?php echo img(IMG_PATH . strtolower($candidate->first_name) .'-info.jpg?' . time(), false, 'class="img-responsive"'); ?>
				</figure>
			</div>
		</div>
	</div>
</div>
<?php } ?>
