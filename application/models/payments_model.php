<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class payments_model extends CI_Model {

	function payments_model()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->db->select('date');
		$this->db->select('minimum_payment_amount');
		$this->db->select_sum('revenue');
		$this->db->select_sum('carried_over');
		$this->db->where('user_email ', $this->session->userdata('email'));
		$this->db->order_by('date desc');
		$this->db->group_by('EXTRACT(YEAR_MONTH FROM date)');
		$query = $this->db->get('report_list');
		return $query->result();
	}
}
?>