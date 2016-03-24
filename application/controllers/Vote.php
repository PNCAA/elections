<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {

	/**
	 * @var VoteRepository
	 */
	public $voteRepository;

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
		$this->load->model(array('VoteRepository' => 'voteRepository', 'CandidateRepository' => 'candidateRepository'));
	}

	public function index() {
		$this->data['title'] = 'Results - ' . SITE_TITLE;
		$this->data['status'] = 'success';
		$this->data['headline'] = 'VOTING FINAL RESULTS';
		$candidates = $this->candidateRepository->findAll();
		$results = array();
		$name = array();
		$votes = array();
		foreach ($candidates as $index => $candidate) {
			$results[$index] = array(
				'name' => $candidate->last_name . ' ' . $candidate->first_name,
				'profile' => strtolower($candidate->first_name),
				'sex' => strtolower($candidate->sex),
				'votes' => $this->voteRepository->countResultByIdentifier($candidate->identifier)
			);
			$name[$index] = $candidate->last_name . ' ' . $candidate->first_name;
			$votes[$index] = $this->voteRepository->countResultByIdentifier($candidate->identifier);
		}
		array_multisort($votes, SORT_DESC, $results);
		$this->data['results'] = $results;
		$this->load->view('index', $this->data);
	}

	/**
	 * Export election participation
	 */
	public function export() {
		$this->load->dbutil();
		$delimiter = ',';
		$newline = "\r\n";
		$filename = 'alumni-board-election-2016.csv';
		$result = $this->voteRepository->findAllParticipation();
		$data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
		force_download($filename, mb_convert_encoding($data, 'UCS-2LE', 'UTF-8'));
	}
}
