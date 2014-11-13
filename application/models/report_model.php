<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class report_model extends CI_Model {

	function report_model()
	{
		parent::__construct();
	}
	
	function index($sDate, $eDate, $size, $site)
	{
		$value = 'date >= '.$sDate.' and date <= '.$eDate;
		$this->db->select('*');
		$this->db->where('user_email', $this->session->userdata('email'));
		$this->db->where("date >= $sDate and date <= $eDate");
		if($size != 0)$this->db->where("size",$size);
		if($site != 0)$this->db->where("site",$site);
		$this->db->order_by('date desc');
		$query = $this->db->get('report_list');
		return $query->result();
	}
	
	function sum($sDate, $eDate, $size, $site)
	{
		$this->db->select_sum('impressions');
		$this->db->select_sum('paid_impressions');
		$this->db->select_sum('ecpm');
		$this->db->select_sum('revenue');
		$this->db->where('user_email', $this->session->userdata('email'));
		$this->db->where("date >= $sDate and date <= $eDate");
		if($size != 0)$this->db->where("size",$size);
		if($site != 0)$this->db->where("site",$site);
		$query = $this->db->get('report_list');
		return $query->result();
	}
	
	function totalSumImpressions()
	{
		$this->db->select_sum('impressions');
		$query = $this->db->get('report_list');
		return $query->result();
	}
	
}
?>