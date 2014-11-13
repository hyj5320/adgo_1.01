<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class con_info extends CI_Controller {
	function con_info(){
		parent::__construct();
		$this->load->model('Users');
		$this->load->model('site_config_model');
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
		$data['users'] = $this->Users->get_user_by_email($this->session->userdata('email'));
		foreach ($data as $val){
			$result['username'] = $val->username;
			$result['email'] = $val->email;
			$result['phone'] = $val->phone;
			$result['company'] = $val->company;
			$result['notifications'] = $val->notifications;
		}
		$this->load->view('adgo/contact_info_view', $result);
	}
	
	function update(){
		$data = $this->input->post(NULL, TRUE);
		$this->Users->update_user_info();
		alert('Profile modifications completed');
	}
}
