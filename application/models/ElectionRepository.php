<?php

class ElectionRepository extends CI_Model {

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

	/**
	 * Retrieve records by identifier
	 *
	 * @param string $identifier
	 * @return array_object|bool
	 */
	public function findBySelection($identifier) {
		if (!empty($identifier)) {
			$this->db->select('C.*');
			$this->db->from('candidate C');
			$this->db->join('vote V', 'C.identifier = V.candidate');
			$this->db->where('V.identifier', $identifier);
			$result = $this->db->get();
			if ($result->num_rows() > 0) {
				return $result->result();
			}
		}
		return FALSE;
	}

	/**
	 * Create new record
	 *
	 * @param array $data
	 * @return bool
	 */
	public function create($data = array()) {
		unset($data['save']);
		$this->session->set_userdata('identifier', GUID());
		foreach ($data['candidates'] as $candidate) {
			$this->db->set('candidate', $candidate);
			$this->db->set('major', $data['major']);
			$this->db->set('promotion', $data['promotion']);
			$this->db->set('full_name', $data['full_name']);
			$this->db->set('ip', $this->input->ip_address());
			$this->db->set('crdate', time());
			$this->db->set('identifier', $this->session->userdata('identifier'));
			$this->db->insert('vote');
		}
		return TRUE;
	}
}
