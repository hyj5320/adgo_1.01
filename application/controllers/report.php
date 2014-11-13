<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {
	function report(){
		parent::__construct();
		$this->load->model('report_model');
		$this->load->model('new_site_model');
		$this->load->model('site_config_model');
		$this->load->helper(array('form', 'url', 'directory','alert', 'date'));
		$this->load->library(array('adgo_auth_lib','form_validation'));
	}

	public function _remap($method)
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		
		$this->load->view('main_top_view');
		if( method_exists($this, $method) )
		{
			$this->{"{$method}"}();
		}
		$foot['facebook'] = $this->site_config_model->getValue('facebook');
		$foot['twitter'] = $this->site_config_model->getValue('twitter');
		$this->load->view('main_foot_view',$foot);
	}

	function index(){
		$datestring = "%Y%m%d";
		$datestring_v = "%m-%d-%Y";
		$time = time();
		$size = '0';
		$site = '0';
		
		$data['site_list'] = $this->new_site_model->site_search();
		$data['result'] = $this->report_model->index(mdate($datestring, $time), mdate($datestring, $time), $size, $site);
		$data['result_sum'] = $this->report_model->sum(mdate($datestring, $time), mdate($datestring, $time), $size, $site);
		
		$data['startDate'] = mdate($datestring_v, $time);
		$data['endDate'] = mdate($datestring_v, $time);
		$data['size'] = $size;
		$data['site'] = $site;
		
		$this->load->view('adgo/report_view', $data);
	}
	
	function search(){
		$start = $this->input->post('startDate', TRUE);
		$end = $this->input->post('endDate', TRUE);
		$size = $this->input->post('size', TRUE);
		$site = $this->input->post('site', TRUE);

		if($start == null){
			$datestring_v = "%m-%d-%Y";
			$time = time();
			$start = mdate($datestring_v, $time);
			$end = mdate($datestring_v, $time);
			$size = '0';
			$site = '0';
		}
		
		$start_a = explode("-", $start);
		$start_d = $start_a[2].$start_a[0].$start_a[1];
		
		$end_a = explode("-", $end);
		$end_d = $end_a[2].$end_a[0].$end_a[1];
		
		$data['site_list'] = $this->new_site_model->site_search();
		$data['result'] = $this->report_model->index($start_d, $end_d, $size, $site);
		$data['result_sum'] = $this->report_model->sum($start_d, $end_d, $size, $site);
		
		$data['startDate'] = $start;
		$data['endDate'] = $end;
		$data['size'] = $size;
		$data['site'] = $site;
		
		$this->load->view('adgo/report_view', $data);
	}
}
