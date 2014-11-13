<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class cpm_model extends CI_Model {

	function cpm_model()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->db->select('*');
		$this->db->where('id', '0');
		$query = $this->db->get('cpm_info');
		return $query->result();
	}
	
	function update()
	{
		$data = $this->input->post(NULL, TRUE);
		$this->db->where('id', '0');
		$this->db->update('cpm_info', $data);
	}
}
?>