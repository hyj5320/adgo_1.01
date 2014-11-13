<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class about extends CI_Controller {
	function about(){
		parent::__construct();
		$this->load->model('site_config_model');
		$this->load->helper(array('form', 'url', 'directory','alert'));
		$this->load->library(array('form_validation'));
	}

	public function _remap($method)
	{
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
		$this->load->view('adgo/about_us_view');
	}
}
