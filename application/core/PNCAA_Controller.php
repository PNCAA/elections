<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PNCAA_Controller extends CI_Controller {

	/**
	 * @var CI_Loader
	 */
	public $load;

	/**
	 * @var CI_Form_validation
	 */
	public $form_validation;

	/**
	 * @var CI_Input
	 */
	public $input;

	/**
	 * @var CI_Session
	 */
	public $session;

	/**
	 * @var array
	 */
	protected $_data = array();

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Welcome';
	}

}
