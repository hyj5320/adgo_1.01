<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {
	function payment_update(){
		parent::__construct();
		$this->load->model('payment_profile_model');
		$this->load->model('site_config_model');
		$this->load->helper(array('form', 'url', 'directory','alert'));
		$this->load->library(array('form_validation'));
	}

	public function _remap($method)
	{
		if(!$this->session->userdata('user_id')){
			redirect('auth/login');
		}
		
		$this->load->view('main_top_view');
		//if( method_exists($this, $method) )
		//{
		//	$this->{"{$method}"}();
		//}
		//$foot['facebook'] = $this->site_config_model->getValue('facebook');
		//$foot['twitter'] = $this->site_config_model->getValue('twitter');
		$this->load->view('adgo/old/report_view.php');
		$this->load->view('main_foot_view');
	}

	function index(){
		//$result = $this->payment_profile_model->index('user_payment_w9');
		$this->load->view('adgo/old/report_view.php');
	}
}
