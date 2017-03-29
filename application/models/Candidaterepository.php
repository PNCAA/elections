<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidaterepository extends PNCAA_Model {

	public function __construct() {
		$this->_entity = 'candidate';
		$this->_defaultSettings = array('order_by' => 'crdate ASC');
	}

}