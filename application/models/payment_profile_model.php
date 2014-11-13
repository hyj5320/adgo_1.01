<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class payment_profile_model extends CI_Model {

	function payment_profile_model()
	{
		parent::__construct();
	}
	
	function count($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	function user_count($table){
		$this->db->select("*");
		$this->db->where('user_id ', $this->session->userdata('user_id'));
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	function index($table)
	{
		$this->db->select("*");
		$this->db->where('user_id ', $this->session->userdata('user_id'));
		$this->db->order_by('last_change_time desc');
		$query = $this->db->get($table);
		$data = $query->row_array();
		return $data;
	}
	
	function get_data($table, $var)
	{
		$this->db->select($var);
		$this->db->where('user_id ', $this->session->userdata('user_id'));
		$this->db->order_by('last_change_time desc');
		$query = $this->db->get($table);
		$data = $query->row_array();
		return $data;
	}
	
	function get_amountByMail($var)
	{
		$this->db->select('minimum_payment_amount');
		$this->db->where('user_email ', $var);
		$query = $this->db->get('user_payment');
		return $query->result();
	}

	function payment_profile_config($table)
	{
		$data = $this->input->post(NULL, TRUE);
		
		$data['user_id'] = $this->session->userdata('user_id');
		if($table != 'user_payment_w9')$data['user_email'] = $this->session->userdata('email');
		$data['last_change_time'] = date("Y-m-d H:i",time());
		$data['last_change_ip'] = $this->input->ip_address();
		$this->db->insert($table, $data);
	}
}
?>