<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class help extends CI_Controller {
	function help(){
		parent::__construct();
		$this->load->model('site_config_model');
	}

	function index(){
		$data['site_title'] = $this->site_config_model->getValue('site_title');
		$data['site_privacy_policy'] = $this->site_config_model->getValue('site_privacy_policy');
		$this->load->view('help/privacy_policy', $data);
	}
}
