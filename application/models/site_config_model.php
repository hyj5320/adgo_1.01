<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class site_config_model extends CI_Model {

	function site_config_model()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->db->select('*');
		$this->db->where('site_no', '1');
		$query = $this->db->get('site_config');
		return $query->result();
	}
	
	function getValue($select){
		$this->db->select($select);
		$this->db->where('site_no', '1');
		$query = $this->db->get('site_config');
		$row = $query->row_array();
		return $row[$select];
	}
	
	function update()
	{
		$data = $this->input->post(NULL, TRUE);
		$this->db->where('site_no', '1');
		$this->db->update('site_config', $data);
	}
}
?>