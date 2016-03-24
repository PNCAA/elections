<p>
	Thanks for your participation! <br>Here is the list of 5 candidates that you have just selected:
</p>

<?php
	if ($selectedCandidates) {
		foreach ($selectedCandidates as $selectedCandidate) {
			?>
<div class="media">
	<div class="media-left">
		<?php echo img(IMG_PATH . strtolower($selectedCandidate->first_name) .'.jpg?' . time()); ?>
	</div>
	<div class="media-body">
		<strong><?php echo ($selectedCandidate->sex === 'f' ? 'Ms. ' : 'Mr. ') . $selectedCandidate->last_name . ' ' . $selectedCandidate->first_name; ?></strong>
	</div>
</div>
<?php
		}
	}
?>
