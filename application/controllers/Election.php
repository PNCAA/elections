<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Election extends PNCAA_Controller {

	/**
	 * @var Candidaterepository
	 */
	public $candidateRepository;

	/**
	 * @var Electionrepository
	 */
	public $electionRepository;

	public function __construct() {
		parent::__construct();
		$this->load->model(array(
			'Candidaterepository' => 'candidateRepository',
			'Electionrepository' => 'electionRepository'
		));
	}

	public function index() {
		if ($this->input->cookie('pncaa_election')) {
			redirect('/election/confirm/', 'refresh');
		}
		$this->_data['title'] = 'Election Sheet';
		$this->validate();
		if ($this->form_validation->run() === FALSE) {
			$this->_data['candidates'] = $this->candidateRepository->findAll();
			$this->load->view('index.phtml', $this->_data);
		} else {
			$data = $this->input->post();
			unset($data['vote']);
			$this->create($data);
		}
	}

	protected function create($data) {
		foreach ($data['candidates'] as $candidate) {
			unset($data['candidates']);
			$data['candidate'] = $candidate;
			$data['ip'] = $this->input->ip_address();
			$this->electionRepository->add($data);
		}
		$this->session->set_userdata('pncaa_voter_email', $data['email']);
		$this->input->set_cookie('election', time() + 3600, 1296000);
		redirect('election/confirm');
	}

	public function confirm() {
		var_dump($this->input->cookie('pncaa_election'));
		$this->_data['title'] = 'Election Confirmation';
		$this->_data['votedCandidates'] = $this->electionRepository->findVotedCandidatesByVoter($this->session->userdata('pncaa_voter_email'));
		$this->load->view('index.phtml', $this->_data);
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
				'field' => 'email',
				'label' => 'email',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'major',
				'label' => 'major',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'promotion',
				'label' => 'promotion',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($config);
	}

	public function result() {
		$this->_data['title'] = 'Election result';
		$candidates = $this->candidateRepository->findAll();
		$results = array();
		$votes = array();
		foreach ($candidates as $index => $candidate) {
			$results[$index] = array(
				'name' => $candidate->first_name . ' ' . $candidate->last_name,
				'votes' => $this->electionRepository->countVotedByCandidate($candidate->identifier),
				'color' => '#79C0DC',
				'bullet' => site_url(IMG_PATH . $candidate->avatar)
			);
			$votes[$index] = $this->electionRepository->countVotedByCandidate($candidate->identifier);
		}
		array_multisort($votes, SORT_DESC, $results);
		$this->_data['results'] = $results;
		$this->load->view('index.phtml', $this->_data);
	}
}
