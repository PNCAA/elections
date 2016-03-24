<?php

class VoteRepository extends CI_Model {

	/**
	 * Count voting result by candidate
	 *
	 * @param string $identifier
	 * @return integer/bool
	 */
	public function countResultByIdentifier($identifier) {
		$this->db->where('candidate', $identifier);
		$result = $this->db->get('vote');
		if ($result->num_rows() > 0) {
			return $result->num_rows();
		}
		return FALSE;
	}
	/**
	 * Retrieve all records
	 *
	 * @return array_object/bool
	 */
	public function findAllParticipation() {
		$fields = array(
			'full_name AS Name',
			'major AS Major',
			'promotion AS Promotion',
		);
		$this->db->select($fields);
		$this->db->group_by('identifier');
		$this->db->order_by('major ASC');
		$this->db->order_by('full_name ASC');
		$result = $this->db->get('vote');
		if ($result->num_rows() > 0) {
			return $result;
		}
		return FALSE;
	}
}
