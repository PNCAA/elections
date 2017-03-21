<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends PNCAA_Controller {

	/**
	 * @var Candidaterepository
	 */
	public $candidateRepository;

	public function __construct() {
		parent::__construct();
		$this->load->model('Candidaterepository', 'candidateRepository');
	}

	public function create() {
		$this->_data['title'] = 'Add new candidate';
		$this->validate();
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('index.phtml', $this->_data);
		} else {
			$data = $this->input->post();
			unset($data['save']);
			$data['avatar'] = strtolower($data['first_name'] . '-' . $data['last_name']) . '.jpg';
			$this->candidateRepository->add($data);
			redirect('candidate/create');
		}
	}

	protected function validate() {
		$config = array(
			array(
				'field' => 'first_name',
				'label' => 'first name',
				'rules' => 'trim|required|alpha'
			),
			array(
				'field' => 'last_name',
				'label' => 'last name',
				'rules' => 'trim|required|alpha'
			),
			array(
				'field' => 'sex',
				'label' => '',
				'rules' => 'trim'
			),
			array(
				'field' => 'promotion',
				'label' => 'promotion',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($config);
	}

}
