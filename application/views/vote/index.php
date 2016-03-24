<?php
foreach ($results as $index => $result) {
	?>
<div class="alert alert-<?php echo ($index > 4 ? 'warning' : 'success'); ?>" role="alert">
	<div class="media">
		<div class="media-left">
			<?php echo img(IMG_PATH . strtolower($result['profile']) .'.jpg?' . time()); ?>
		</div>
		<div class="media-body">
			<label><?php echo ($result['sex'] === 'm' ? 'Mr. ' : 'Ms. ') . ' ' . $result['name']; ?></label>
			<span class="label label-success"><?php echo $result['votes']; ?></span>
		</div>
	</div>
</div>
<?php
}
?>
