<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Electionrepository extends PNCAA_Model {

	public function __construct() {
		$this->_entity = 'election';
	}

	/**
	 * @param string $voterEmail
	 * @return boolean|array_object
	 */
	public function findVotedCandidatesByVoter($voterEmail) {
		$this->db->select('C.*');
		$this->db->from('candidate C');
		$this->db->join('election E', 'C.identifier = E.candidate');
		$this->db->where('E.email', $voterEmail);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}

	/**
	 * @param string $candidate
	 * @return integer
	 */
	public function countVotedByCandidate($candidate) {
		/** @var CI_DB_result $result */
		$result = $this->db->where('candidate', $candidate)->get($this->_entity);
		return $result->num_rows();
	}
}