<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('alert_message')) {
	/**
	 * @param $message
	 * @param string $type
	 * @return string
	 */
	function alert_message($message, $type = 'success') {
		$icon = ($type == 'success') ? 'ok-circle' : (($type == 'danger') ? 'remove-circle' : (($type == 'info') ? 'info-sign' : (($type == 'warning') ? 'ban-circle' : 'ban-circle')));
		return '<div class="row"><div class="col-sm-12"><div class="hidden-print alert alert-' . $type . ' alert-dismissable"><button type="button"
		class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="glyphicon glyphicon-' . $icon . '"></span>&nbsp;' . $message . '</div></div></div>';
	}
}

if (! function_exists('guid')) {
	/**
	 * @return string
	 */
	function guid() {
		if (function_exists('com_create_guid')) {
			return strtolower(substr(com_create_guid(), 1, 36));
		}
		return strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
	}
}