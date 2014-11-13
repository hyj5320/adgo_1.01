<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class paymentprofile extends CI_Controller {
	function paymentprofile(){
		parent::__construct();
		$this->load->model('payment_profile_model');
		$this->load->model('country_code_model');
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
		$result['payee_name'] = '';$result['street1'] = '';$result['street2'] = '';$result['city'] = '';
		$result['zip_postal_code'] = '';$result['last_change_time'] = '';$result['minimum_payment_amount'] = '';
		$result['w9_name'] = '';$result['w9_time'] = '';
		
		$result = $this->payment_profile_model->index('user_payment');
		$name = $this->payment_profile_model->get_data('user_payment_w9','name');
		$date = $this->payment_profile_model->get_data('user_payment_w9','last_change_time');
		$result['country_arr'] = $this->country_code_model->index();
		$result['state_arr'] = $this->country_code_model->state();
		
		foreach($name as $row){
			$result['w9_name'] = $row;
		}
		
		foreach($date as $row){
			$result['w9_time'] = $row;
		}
		
		$this->load->view('adgo/payment_view', $result);
	}
	
	function update(){
		$data = $this->payment_profile_model->index('user_payment');
		$able = true;
		if(count($data) > 0){
			$able = false;
			foreach($data as $key => $value){
				if($this->input->post($key, TRUE)){
					if($this->input->post($key, TRUE) != $value){
						$able = true;
						break;
					}
				}
			}
		}
		if($able){
			$this->payment_profile_model->payment_profile_config('user_payment');
			redirect('/auth/change_payment_info');
		}
		else{
			alert("No information has been changed");
		}
	}
}
