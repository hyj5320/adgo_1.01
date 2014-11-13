<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class add_code_model extends CI_Model {

	function add_code_model()
	{
		parent::__construct();
	}
	
	function add_code($user_id)
	{
		$result['email'] = $this->input->post('email', TRUE);
		$result['site'] = $this->input->post('id', TRUE);
		$result['size'] = $this->input->post('size', TRUE);
		$result['code'] = $this->input->post('code', TRUE);
		$result['add_time'] = date("Y-m-d H:i",time());
		$result['user_id'] = $user_id;
		$this->db->insert('addcode', $result);
	}
	
	function code_search($search_idx){
		$this->db->select('*');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('site', $search_idx);
		$query = $this->db->get('addcode');
		return $query->result();
	}
	
	function code_make_list(){
		$this->db->select('*');
		$query = $this->db->get('user_site_info');
		return $query->result();
	}
	
	function code_make(){
		$id = $this->input->post('id', TRUE);
		$result['make_code'] = '1';
		$this->db->where('id', $id);
		$this->db->update('user_site_info', $result);
	}
}
?>