<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @admin
 * @CodeIgniter 기반으로 제작
 * @package		adgo
 * @author		이유리 
 * @version		beta test
 * @license		MIT License
 */
class admin extends CI_Controller {
	function admin(){
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->model('cpm_model');
		$this->load->model('payment_profile_model');
		$this->load->model('add_code_model');
		$this->load->model('site_config_model');
		$this->load->model('country_code_model');
		
		$this->load->config('email', TRUE);
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

	function site(){
		if(isset($_POST['usa'])){
			$this->cpm_model->update();
			redirect(base_url("admin/site"));
		}
		else if(isset($_POST['site_title'])||isset($_POST['site_privacy_policy']) || isset($_POST['facebook'])){
			$this->site_config_model->update();
			redirect(base_url("admin/site"));
		}
		else{
			$data['cpm'] = $this->cpm_model->index();
			$data['site_title'] = $this->site_config_model->getValue('site_title');
			$data['site_mail'] = $this->site_config_model->getValue('site_mail');
			$data['site_mobile'] = $this->site_config_model->getValue('site_mobile');
			$data['site_url'] = $this->site_config_model->getValue('site_url');
			$data['site_company_name'] = $this->site_config_model->getValue('site_company_name');
			$data['site_company_phone'] = $this->site_config_model->getValue('site_company_phone');
			$data['site_company_address'] = $this->site_config_model->getValue('site_company_address');
			$data['site_company_email'] = $this->site_config_model->getValue('site_company_email');
			$data['site_privacy_policy'] = $this->site_config_model->getValue('site_privacy_policy');
			$data['facebook'] = $this->site_config_model->getValue('facebook');
			$data['twitter'] = $this->site_config_model->getValue('twitter');
			$this->load->view('admin/admin_site',$data);
		}
	}
	
	function users(){
		$result['list'] = $this->admin_model->user_list();
		$result['timezone_arr'] = $this->country_code_model->timezone();
		$this->load->view('admin/admin_users',$result);
	}
	
	function users_modify(){
		$this->admin_model->user_modify();
		redirect('/admin/users');
	}
	
	function users_delete(){
		$id	= $this->uri->segment(3);
		$this->admin_model->user_delete($id);
		redirect('/admin/users');
	}
	
	function users_search(){
		$result['list'] = $this->admin_model->user_list_by($_POST['search']);
		$result['timezone_arr'] = $this->country_code_model->timezone();
		$this->load->view('admin/admin_users',$result);
	}
	
	function report(){
		if(isset($_POST['user_email'])){
			$data['amount'] = $this->payment_profile_model->get_amountByMail($_POST['user_email']);
			if(count($data['amount']) == 0){
				$amount = '50';
			}
			else{
				foreach ($data['amount'] as $row)
				{
					$amount = $row->minimum_payment_amount;
				}
			}
			$this->admin_model->report_insert($amount);
		}
		
		$result['list'] = $this->admin_model->report_list('0','');
		$this->load->view('admin/admin_report',$result);
	}
	
	function report_modify(){
		$this->admin_model->report_modify();
		redirect('/admin/report');
	}
	
	function report_delete(){
		$id	= $this->uri->segment(3);
		$this->admin_model->report_delete($id);
		redirect('/admin/report');
	}
	
	function approval(){
		if(isset($_POST['email'])){
			if($this->admin_model->activation($_POST['email'])){
				$data = $this->admin_model->activation_user_info($_POST['email']);
				foreach ($data as $value){
					$data['username'] = $value->username;
					$data['user_id'] = $value->id;
					$data['new_email_key'] = $value->new_email_key;
					$data['email'] = $value->email;
				}
				$data['activation_period'] = $this->config->item('email_activation_expire', 'adgo_auth') / 3600;
				$this->_send_email($_POST['email'], $data);				
			}
		}
		
		$result;
		$result['list'] = $this->admin_model->approval_list();
		$this->load->view('admin/admin_approval',$result);
	}
	
	function _send_email($email, $data) {
		$this->load->library('email', $this->config->item('email'));
		$this->email->set_newline("\r\n");
		$this->email->from($this->site_config_model->getValue('site_mail'), $this->site_config_model->getValue('site_title'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_activate'), $this->site_config_model->getValue('site_title')));
		
		$data['website_name'] = $this->site_config_model->getValue('site_title');
		$data['webmaster_email'] = $this->site_config_model->getValue('site_mail');
		
		$email = $this->load->view('email/activate-html', $data, TRUE);
		$alt_email = $this->load->view('email/activate-txt', $data, TRUE);
		$this->email->message($email);
		$this->email->set_alt_message($alt_email);
		if($this->email->send()){
			alert("approval >> success",'approval');
		}
		else{
			alert("approval >> failed",'approval');
		}
	}
	
	function adcode(){
		$data['list'] = $this->add_code_model->code_make_list();
		$this->load->view('admin/admin_adcode', $data);
	}
	
	function makeCode(){
		$id_arr = $this->admin_model->idByEmail($this->input->post('email', TRUE));
		foreach ($id_arr as $row){
			$user_id = $row->id;
		}
		$this->add_code_model->code_make();
		$this->add_code_model->add_code($user_id);
		alert("makeCode >> success",'adcode');
	}
	
}
