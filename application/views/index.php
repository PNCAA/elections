<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url(); ?>">
	<meta charset="utf-8">
	<meta name="description" content="PN Cambodia Alumni Association strives to establish lifelong, meaningful and valued relationships as well as strong solidarity.">
	<meta name="keywords" content="pncaa, pn, alumni, board election, alumni election">
	<meta name="author" content="Man Math">
	<meta name="og:type" content="website">
	<meta name="og:title" content="PNC Alumni Additional Board Election for 2016">
	<meta name="og:description" content="Please select 5 strong candidates that you believe that they are helpful to sustain PNCAA.">
	<meta name="og:image" content="<?php echo base_url() . IMG_PATH . 'banner.jpg'; ?>">
	<meta name="og:url" content="<?php echo base_url(); ?>">
	<title><?php echo $title; ?></title>
	<?php
	echo link_tag('favicon.ico?' . time(), 'shortcut icon', 'image/x-icon; charset=binary');
	echo link_tag('favicon.ico?' . time(), 'icon', 'image/x-icon; charset=binary');
	echo link_tag(CSS_PATH . 'app.min.css?' . time());
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php echo img(IMG_PATH . 'banner.jpg?' . time(), false, 'class="img-responsive"'); ?>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-<?php echo $status; ?>">
					<div class="panel-heading">
						<h1 class="panel-title"><?php echo $headline; ?></h1>
					</div>
					<div class="panel-body">
						<?php
						if (!$this->uri->segment(2) || $this->uri->segment(2) === 'index') {
							echo form_open_multipart('election/vote', array('class' => 'form-horizontal', 'role' => 'form'));
							$this->load->view('partials/candidate');
							echo form_submit('save', 'Vote', 'class="btn btn-primary" disabled="disabled"');
							echo form_close();
						} else {
							$this->load->view('partials/' . $this->uri->segment(2));
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<hr>
				Copy &copy; right by PN Cambodia Alumni Association - 2016.
			</div>
		</div>
	</div>
<script src="<?php echo site_url(JS_PATH. 'library.min.js?' . time()); ?>"></script>
<script src="<?php echo site_url(JS_PATH. 'app.min.js?' . time()); ?>"></script>
</body>
</html>
