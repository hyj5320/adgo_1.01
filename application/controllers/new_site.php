<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class new_site extends CI_Controller {
	function new_site(){
		parent::__construct();
		$this->load->model('new_site_model');
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
		$this->load->view('adgo/new_site_view');
	}
	
	function add_site(){
		$this->new_site_model->new_site_add();
		alert("update complete");
	}
}
