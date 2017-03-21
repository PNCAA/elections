<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PNCAA_Model extends CI_Model {

	/**
	 * Entity name
	 *
	 * @var string
	 */
	protected $_entity;

	/**
	 * Default settings
	 *
	 * @example array('order_by' => 'name ASC, crdate DESC')
	 * @var array
	 */
	protected $_defaultSettings = array();

	/**
	 * @param string $identifier
	 * @return array|boolean
	 */
	public function findByIdentifier($identifier) {
		$this->db->where('identifier', $identifier);
		/** @var CI_DB_result $result */
		$result = $this->db->get($this->_entity, 1);
		if ($result->num_rows() > 0) {
			return $result->result_object();
		}
		return FALSE;
	}

	/**
	 * @param string $field
	 * @param string $value
	 * @return array|boolean
	 */
	public function findByUniqueField($field, $value) {
		$this->db->where($field, $value);
		/** @var CI_DB_result $result */
		$result = $this->db->get($this->_entity, 1);
		if ($result->num_rows() > 0) {
			return $result->result_object();
		}
		return FALSE;
	}

	/**
	 * @return array|false
	 */
	public function findAll() {
		if (count($this->_defaultSettings) > 0) {
			foreach ($this->_defaultSettings as $key => $value) {
				$this->db->$key($value);
			}
		}
		/** @var CI_DB_result $result */
		$result = $this->db->get($this->_entity);
		if ($result->num_rows() > 0) {
			return $result->result_object();
		}
		return FALSE;
	}

	/**
	 * @param string $key field to present array index
	 * @param string $value field to present array value
	 * @return array|false
	 */
	public function findAllAsArray($key, $value) {
		$records = $this->findAll();
		if ($records) {
			$result = array();
			foreach ($records as $record) {
				$result[$record->$key] = $record->$value;
			}
			return $result;
		}
		return FALSE;
	}

	/**
	 * @param boolean $hidden
	 * @return integer|boolean
	 */
	public function countAll($hidden = TRUE) {
		if (! $hidden) {
			$this->db->where('hidden', $hidden);
		}
		return $this->db->count_all_result($this->_entity);
	}

	/**
	 * @param array $data
	 * @return boolean
	 */
	public function add($data = array()) {
		$this->db->set('identifier', guid());
		$this->db->set('crdate', now());
		return $this->db->insert($this->_entity, $data) ? TRUE : FALSE;
	}

	/**
	 * @param array $data
	 * @param string $identifier
	 * @return boolean
	 */
	public function update($data = array(), $identifier = '') {
		if (!empty($identifier)) {
			$this->db->where('identifier', $identifier);
			$this->db->limit(1);
		}
		$this->db->set('modate', now());
		return $this->db->update($this->_entity, $data) ? TRUE : FALSE;
	}

	/**
	 * @param string $identifier
	 * @return boolean
	 */
	public function remove($identifier) {
		$this->db->where('identifier', $identifier);
		return $this->db->delete($this->_entity) ? TRUE : FALSE;
	}

}