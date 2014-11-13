<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class new_site_model extends CI_Model {

	function new_site_model()
	{
		parent::__construct();
	}
	
	function new_site_add()
	{
		$data = $this->input->post(NULL, TRUE);
		$data['activated'] = '0';
		$data['make_code'] = '0';
		$data['email'] = $this->session->userdata('email');
		$this->db->insert('user_site_info', $data);
	}
	
	function res_site_add($data){
		$data['activated'] = '0';
		$data['make_code'] = '0';
		$this->db->insert('user_site_info', $data);
	}
	
	function res_search_mail($id){
		$this->db->select('email');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->result();
	}
	
	function res_activate($email){
		$data['activated'] = '1';
		$this->db->where('email', $email);
		$this->db->update('user_site_info', $data);
	}
	
	function site_search(){
		$this->db->select('*');
		$this->db->where('email', $this->session->userdata('email'));
		$query = $this->db->get('user_site_info');
		return $query->result();
	}
}
?>