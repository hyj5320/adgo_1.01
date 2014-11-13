<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class payment_update extends CI_Controller {
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
		if( method_exists($this, $method) )
		{
			$this->{"{$method}"}();
		}
		$foot['facebook'] = $this->site_config_model->getValue('facebook');
		$foot['twitter'] = $this->site_config_model->getValue('twitter');
		$this->load->view('main_foot_view',$foot);
	}

	function index(){
		$result = $this->payment_profile_model->index('user_payment_w9');
		$this->load->view('adgo/payment_update_view', $result);
	}
	
	function update(){
		$this->payment_profile_model->payment_profile_config('user_payment_w9');
		redirect(base_url("payment_update/index/"));
	}
}
