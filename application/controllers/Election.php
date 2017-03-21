<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Election extends PNCAA_Controller {

	public function index() {
		$this->load->view('index.phtml', $this->_data);
	}

}
