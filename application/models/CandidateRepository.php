<?php

class CandidateRepository extends CI_Model {

	/**
	 * Retrieve all records
	 *
	 * @return array_object/bool
	 */
	public function findAll() {
		$result = $this->db->get('candidate');
		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
	}
}
