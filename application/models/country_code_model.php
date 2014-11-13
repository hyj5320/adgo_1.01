<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class country_code_model extends CI_Model {

	function country_code_model()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->db->select('*');
		$query = $this->db->get('country_code');
		return $query->result();
	}
	
	function state()
	{
		$this->db->select('*');
		$query = $this->db->get('state_code');
		return $query->result();
	}
	
	function timezone()
	{
		$this->db->select('*');
		$query = $this->db->get('timezone');
		return $query->result();
	}
	
	function category()
	{
		$this->db->select('*');
		$query = $this->db->get('category');
		return $query->result();
	}
	
	function getData($select, $table, $var_t, $var){
		$this->db->select($select);
		$this->db->where($var_t, $var);
		$query = $this->db->get($table);
		foreach ($query->result() as $row){
			$get = $row->$select;
		}
		return $get;
	}
}
?>