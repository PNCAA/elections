<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidaterepository extends PNCAA_Model {

	public function __construct() {
		$this->_entity = 'candidate';
	}

}