<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Election extends CI_Controller {

	/**
	 * @var ElectionRepository
	 */
	public $electionRepository;

	/**
	 * @var CandidateRepository
	 */
	public $candidateRepository;

	/**
	 * @var array
	 */
	public $data = array();

	public function __construct() {
		parent::__construct();
		$this->load->model(array('ElectionRepository' => 'electionRepository', 'CandidateRepository' => 'candidateRepository'));
	}

	/**
	 * Vote
	 */
	public function index() {
		if ($this->input->cookie('pncaa_election')) {
			redirect('/election/confirmation/', 'refresh');
		}
		$this->data['title'] = 'Election - ' . SITE_TITLE;
		$this->data['status'] = 'primary';
		$this->data['headline'] = 'LIST OF CANDIDATES FOR ALUMNI ADDITIONAL BOARD ELECTION';
		$this->data['candidates'] = $this->candidateRepository->findAll();
		$this->load->view('index', $this->data);
	}

	/**
	 * Voting
	 */
	public function vote() {
		if ($this->input->cookie('pncaa_election')) {
			redirect('/election/confirmation/', 'refresh');
		}
		$this->electionRepository->create($this->input->post());
		redirect('/election/success/', 'refresh');
	}

	/**
	 * Voted
	 */
	public function success() {
		if ($this->input->cookie('pncaa_election')) {
			redirect('/election/confirmation/', 'refresh');
		}
		$this->input->set_cookie('pncaa_election', time() + 3600, 1296000);
		$this->data['title'] = 'Thank You - ' . SITE_TITLE;
		$this->data['status'] = 'success';
		$this->data['headline'] = 'THANK YOU!';
		$this->data['selectedCandidates'] = $this->electionRepository->findBySelection($this->session->userdata('identifier'));
		$this->load->view('index', $this->data);
	}

	/**
	 * Had voted
	 */
	public function confirmation() {
		if ($this->session->userdata('identifier')) {
			$this->session->unset_userdata('identifier');
		}
		$this->data['title'] = 'Thank You - ' . SITE_TITLE;
		$this->data['status'] = 'warning';
		$this->data['headline'] = 'ALREADY VOTED!';
		$this->load->view('index', $this->data);
	}
}
