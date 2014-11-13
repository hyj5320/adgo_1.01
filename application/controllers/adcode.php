<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class adcode extends CI_Controller {
	function adcode(){
		parent::__construct();
		$this->load->model('add_code_model');
		$this->load->model('new_site_model');
		$this->load->model('site_config_model');
		$this->load->helper(array('form', 'url', 'directory','alert'));
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
		$data['site'] = $this->new_site_model->site_search();
		foreach ($data['site'] as $value){
			$search_idx = $value->id;
		}
		$data['code'] = $this->add_code_model->code_search($search_idx);
		$this->load->view('adgo/adcode_view',$data);
	}
	
	function search(){
		$site = $this->input->post('site', TRUE);
		$data['site'] = $this->new_site_model->site_search();
		$data['code'] = $this->add_code_model->code_search($site);
		$this->load->view('adgo/adcode_view',$data);
	}
}
