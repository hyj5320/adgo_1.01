<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class admin_model extends CI_Model {

	function admin_model()
	{
		parent::__construct();
	}
	
	function idByEmail($email){
		$this->db->select('id');
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->result();
	}
	
	function user_list(){
		$this->db->select('*');
		$query = $this->db->get('users');
		return $query->result();
	}
	
	function user_list_by($val){
		$this->db->select('*');
		$this->db->like('email', strtolower($val));
		$this->db->or_like('site_url',strtolower($val));
		$query = $this->db->get('users');
		return $query->result();
	}
	
	function user_modify(){
		$data = $this->input->post(NULL, TRUE);
		print_r($data);
		$this->db->where('id', $data['id']);
		$this->db->update('users', $data);
	}
	
	function user_delete($var){
		$data = $this->input->post(NULL, TRUE);
		$this->db->where('id', $var);
		$this->db->delete('users');
	}
	
	function user_site_list($email){
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get('user_site_info');
		return $query->result();
	}
	
	function report_insert($var){
		$data = $this->input->post(NULL, TRUE);
		$data['minimum_payment_amount'] = $var;
		$this->db->insert('report_list', $data);
	}
	
	function report_list($type, $email)
	{
		$this->db->select('*');
		if($type == '1'){
			$this->db->where('user_email', $email);
		}
		$this->db->order_by('date desc');
		$query = $this->db->get('report_list');
		return $query->result();
	}
	
	function report_modify(){
		$data = $this->input->post(NULL, TRUE);
		$this->db->where('id', $data['id']);
		$this->db->update('report_list', $data);
	}
	
	function report_delete($var){
		$data = $this->input->post(NULL, TRUE);
		$this->db->where('id', $var);
		$this->db->delete('report_list');
	}
	
	function approval_list(){
		$this->db->select('*');
		$this->db->where('activated', '0');
		$query = $this->db->get('users');
		return $query->result();
	}
	
	function activation($email){
		$data['new_email_key'] = md5(rand().microtime());
		$this->db->where('email', $email);
		$this->db->update('users', $data);
		return true;
	}
	
	function activation_user_info($email){
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->result();
	}
}
?>