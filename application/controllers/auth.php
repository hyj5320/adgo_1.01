<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->config('adgo_auth', TRUE);
		$this->load->config('email', TRUE);
		$this->lang->load('adgo_auth');
		$this->load->model('payment_profile_model');
		$this->load->model('country_code_model');
		$this->load->model('new_site_model');
		$this->load->model('site_config_model');
		$this->load->helper(array('form', 'url', 'directory', 'alert'));
		$this->load->library(array('security', 'adgo_auth_lib', 'form_validation'));
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
	
	function login()
	{
		if ($this->adgo_auth_lib->is_logged_in()) {
			if($this->session->userdata('level') ==10)
				redirect('');
			if($this->session->userdata('level') < 10)
				redirect('');
		} else if ($this->adgo_auth_lib->is_logged_in(FALSE)) {
			redirect('/auth/send_again/');
		} 
		else {
			$data['login_by_email'] = $this->config->item('login_by_email', 'adgo_auth');

			$this->form_validation->set_rules('login', 'login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
			
			if ($this->config->item('login_count_attempts', 'adgo_auth') AND ($login = $this->input->post('login'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}
			
			$data['use_recaptcha'] = $this->config->item('use_recaptcha', 'adgo_auth');
			if ($this->adgo_auth_lib->is_max_login_attempts_exceeded($login)) {
				if ($data['use_recaptcha'])
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				else
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
			}
			$data['errors'] = array();
			
			if ($this->form_validation->run()) {
				if ($this->adgo_auth_lib->login(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('password'))) {
					if($this->session->userdata('level') < 10){
						redirect('report');
					}
					else{
						redirect('main');
					}
				}
				else {
					$errors = $this->adgo_auth_lib->get_error_message();
					if (isset($errors['banned'])) {
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned'], '/main');
					} elseif (isset($errors['not_activated'])) {
						$this->_show_message($this->lang->line('auth_message_not_activated').' '.$errors['not_activated'], '');
					} else {
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
			$data['show_captcha'] = FALSE;
			if ($this->adgo_auth_lib->is_max_login_attempts_exceeded($login)) {
				$data['show_captcha'] = TRUE;
				if ($data['use_recaptcha']) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}
			
			$this->load->view('adgo/login_view', $data);
		}
	}

	function logout()
	{
		$this->adgo_auth_lib->logout();
		$this->_show_message($this->lang->line('auth_message_logged_out'), '/main');
	}

	function register()
	{
		if ($this->adgo_auth_lib->is_logged_in()) 
		{
			redirect('');
		} 
		elseif ($this->adgo_auth_lib->is_logged_in(FALSE)) 
		{
			redirect('/auth/send_again/');
		} 
		else 
		{
			$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('company', 'company', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'adgo_auth').']|max_length['.$this->config->item('username_max_length', 'adgo_auth').']|alpha_dash');
			$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('timezone1', 'timezone1', 'trim|required|xss_clean');
			$this->form_validation->set_rules('timezone2', 'timezone1', 'trim|required|xss_clean');
			$this->form_validation->set_rules('state', 'state', 'trim|required|xss_clean');
			$this->form_validation->set_rules('site_kind', 'site_kind', 'trim|required|xss_clean');
			$this->form_validation->set_rules('site_url', 'site_url', 'trim|required|xss_clean|prep_url');
			$this->form_validation->set_rules('site_title', 'site_title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('site_description', 'site_description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('site_keywords', 'site_keywords', 'trim|required|xss_clean');
			$this->form_validation->set_rules('site_category', 'site_category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('privacy', 'privacy', 'trim|required|xss_clean');
			$this->form_validation->set_rules('daily_visits', 'daily_visits', 'trim|required|xss_clean');
			$this->form_validation->set_rules('agree', 'agree', 'trim|required|xss_clean');
			
			$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'adgo_auth').']|max_length['.$this->config->item('password_max_length', 'adgo_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'confirm_password', 'trim|required|xss_clean|matches[password]');
				
			$data['errors'] = array();
			
			$email_activation = $this->config->item('email_activation', 'adgo_auth');
			
			if ($this->form_validation->run())
			{
				if (!is_null($data = $this->adgo_auth_lib->create_user(
						$this->form_validation->set_value('username'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('company'),
						$this->form_validation->set_value('phone'),
						$this->form_validation->set_value('timezone1'),
						$this->form_validation->set_value('timezone2'),
						$this->form_validation->set_value('state'),
						$this->form_validation->set_value('site_kind'),
						$this->form_validation->set_value('site_url'),
						$this->form_validation->set_value('site_title'),
						$this->form_validation->set_value('site_description'),
						$this->form_validation->set_value('site_keywords'),
						$this->form_validation->set_value('site_category'),
						$this->form_validation->set_value('privacy'),
						$this->form_validation->set_value('daily_visits'),
						$this->form_validation->set_value('agree'),
						
						$email_activation))) {
					$data['site_url'] = $this->site_config_model->getValue('site_title');
					unset($data['password']);
					
					if ($email_activation) 
					{
						$data['activation_period'] = $this->config->item('email_activation_expire', 'adgo_auth') / 3600;
						$data['site_title'] = $this->site_config_model->getValue('site_title');
						$this->_send_email('welcome', $data['email'], $data);
						unset($data['password']);
						$this->_show_message($this->lang->line('auth_message_registration_completed_1'), './login');
					}
				} 
				else 
				{
					$errors = $this->adgo_auth_lib->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			
			$result;
			$result['country_arr'] = $this->country_code_model->index();
			$result['timezone_arr'] = $this->country_code_model->timezone();
			$result['category_arr'] = $this->country_code_model->category();
			$this->load->view('adgo/register_view',$result);
		}
	}

	/**
	 * Send activation email again, to the same or new email address
	 * 새이메일 주소 설정위해서 인증메일 보내기
	 * @return void
	 */

	function send_again()
	{
		if (!$this->adgo_auth_lib->is_logged_in(FALSE)) {
			redirect('/auth/login/');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();
			if ($this->form_validation->run()) {
				if (!is_null($data = $this->adgo_auth_lib->change_email($this->form_validation->set_value('email')))) {	
					$data['site_name']	= $this->site_config_model->getValue('site_title');
					$data['activation_period'] = $this->config->item('email_activation_expire', 'adgo_auth') / 3600;
					$this->_send_email('activate', $data['email'], $data);
					$this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']), '');
				} else {
					$errors = $this->adgo_auth_lib->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('adgo/forget_password_view', $data);
		}
	}

	/**
	 * Activate user account.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 * 사용자 계정을 활성화합니다.
	 * 사용자 URL의 USER_ID 및 인증 코드를 확인합니다.
	 * 이메일을 확인한후 이메일 링크를 클릭하여 호출 할 수 있습니다.
	 * @return void
	 */

	function activate()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		if ($this->adgo_auth_lib->activate_user($user_id, $new_email_key)) {
			$email_arr = $this->new_site_model->res_search_mail($user_id);
			foreach ($email_arr as $row){
				$email = $row->email;
			}
			$this->new_site_model->res_activate($email);
			
			$this->adgo_auth_lib->logout($user_id);
			$this->_show_message($this->lang->line('auth_message_activation_completed'),'/auth/login');
		} else {
			$this->_show_message($this->lang->line('auth_message_activation_failed'),'/main');
		}
	}
	
	function forgot_password() {
		if ($this->adgo_auth_lib->is_logged_in()) {	
			redirect('');
		} elseif ($this->adgo_auth_lib->is_logged_in(FALSE)) {
			redirect('/auth/send_again/');
		} else {
			$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {
				$data = $this->adgo_auth_lib->forgot_password($this->form_validation->set_value('email'));
				if (!is_null($data)) {
					$this->_send_email('forgot_password', $data['email'], $data);
					alert($this->lang->line('auth_message_new_password_sent'));
				} else {
					$errors = $this->adgo_auth_lib->get_error_message();
					foreach ($errors as $k => $v) {
						$data['errors'][$k] = $this->lang->line($v);
					}
				}
			} 
			$this->load->view('adgo/forget_password_view', $data);
		}
	}
	
	/**
	 * Replace user password (forgotten) with a new one (set by user).
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
  	 * 새로운 유저암호 (암호 찾기) 교체.
     * URL의 USER_ID 및 인증 코드 확인.
	 * 이 메일 링크를 클릭하여 호출 할 수 있습니다.
	 * @return void
	 */

	function reset_password()
	{
		$user_id		= $this->uri->segment(3);
		$new_pass_key	= $this->uri->segment(4);

		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'adgo_auth').']|max_length['.$this->config->item('password_max_length', 'adgo_auth').']|alpha_dash');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

		$data['errors'] = array();

		if ($this->form_validation->run()) {								// validation ok
			if (!is_null($data = $this->adgo_auth_lib->reset_password(
					$user_id, $new_pass_key,
					$this->form_validation->set_value('new_password')))) {	// success

				$data['site_name'] = $this->site_config_model->getValue('site_title');

				$this->_send_email('reset_password', $data['email'], $data);

				$this->_show_message($this->lang->line('auth_message_new_password_activated'),'/main');

			} else {														// fail
				$this->_show_message($this->lang->line('auth_message_new_password_failed'),'');
			}
		} else {
			$this->adgo_auth_lib->activate_user($user_id, $new_pass_key, FALSE);

			if (!$this->adgo_auth_lib->can_reset_password($user_id, $new_pass_key)) {
				$this->_show_message($this->lang->line('auth_message_new_password_failed'),'');
			}
		}
		$this->load->view('adgo/password_reset_view', $data);
	}

	//비밀번호 변경폼 출력됨
	function change_password()
	{
		if (!$this->adgo_auth_lib->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'adgo_auth').']|max_length['.$this->config->item('password_max_length', 'adgo_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|xss_clean|matches[new_password]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->adgo_auth_lib->change_password(
						$this->form_validation->set_value('old_password'),
						$this->form_validation->set_value('new_password'))) {	// success
					alert($this->lang->line('auth_message_password_changed'));
				} else {														// fail
					$errors = $this->adgo_auth_lib->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('adgo/password_view', $data);
		}
	}
	
	/**
	 * Show info message
	 * 정보 메시지를 표시
	 * @param	string
	 * @return	void
	 */
	function _show_message($message, $redirect_url)
	{
		alert($message, $redirect_url);
	}

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 * 메일 (활성화, forgot_password 등)전송
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	//이메일 발송
	function _send_email($type, $email, $data) {
		$this->load->library('email', $this->config->item('email'));
		$this->email->set_newline("\r\n");
		if($type == 'contact'){
			$this->email->from($email);
			$this->email->to($this->site_config_model->getValue('site_mail'), $this->site_config_model->getValue('site_title'));
		}
		else{
			$this->email->from($this->site_config_model->getValue('site_mail'), $this->site_config_model->getValue('site_title'));
			$this->email->to($email);
		}
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->site_config_model->getValue('site_title')));
		
		$data['website_name'] = $this->site_config_model->getValue('site_title');
		$data['webmaster_email'] = $this->site_config_model->getValue('site_mail');
		
		$email = $this->load->view('email/'.$type.'-html', $data, TRUE);
		$alt_email = $this->load->view('email/'.$type.'-txt', $data, TRUE);
		$this->email->message($email);
		$this->email->set_alt_message($alt_email);
		$this->email->send();
	}
	
	function contact(){
		$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('question', 'question', 'trim|required|xss_clean');
		
		$data['errors'] = array();
		
		if ($this->form_validation->run()) {
			$data['email'] = $this->input->post('email', TRUE);
			$data['name'] = $this->input->post('name', TRUE);
			$data['title'] = $this->input->post('title', TRUE);
			$data['question'] = $this->input->post('question', TRUE);
			
			$data['company'] = $this->input->post('company', TRUE);
			$data['phone'] = $this->input->post('phone', TRUE);
			$data['inquiry'] = $this->input->post('inquiry', TRUE);
			
			$this->_send_email('contact', $data['email'], $data);
			$this->_show_message('e-mail send success','/main');
		}
		
		$data['site_mail'] = $this->site_config_model->getValue('site_mail');
		$data['site_company_name'] = $this->site_config_model->getValue('site_company_name');
		$data['site_company_phone'] = $this->site_config_model->getValue('site_company_phone');
		$data['site_company_address'] = $this->site_config_model->getValue('site_company_address');
		$data['site_company_email'] = $this->site_config_model->getValue('site_company_email');
		$this->load->view('adgo/contact_us_view', $data);
	}
	
	function change_payment_info(){
		$email = $this->session->userdata('email');
		$data = $this->payment_profile_model->index('user_payment');
		if($data['country'] == '0'){
			$data['country_name'] = '-';
		}else{
			$data['country_name'] = $this->country_code_model->getData('country_name', 'country_code', 'country_id', $data['country']);
		}
		if($data['state_or_province'] == '0'){
			$data['state_name'] = '-';
		}else{
			$data['state_name'] = $this->country_code_model->getData('state_name', 'state_code', 'state_id', $data['state_or_province']);
		}
		$this->_send_email('change_payment_info', $email, $data);
		$this->_show_message('E-mail this information on changes and changes completed','/paymentprofile/index');
	}
	
	/**
	 * 스팸방지 이미지 생성
	 *
	 * @return	string
	 */
	//스팸방지 코드 설정
	function _create_captcha()
	{
		$this->load->helper('captcha');
	
		$cap = create_captcha(array(
				'img_path'		=> './'.$this->config->item('captcha_path', 'adgo_auth'),
				'img_url'		=> base_url().$this->config->item('captcha_path', 'adgo_auth'),
				'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'adgo_auth'),
				'font_size'		=> $this->config->item('captcha_font_size', 'adgo_auth'),
				'img_width'		=> $this->config->item('captcha_width', 'adgo_auth'),
				'img_height'	=> $this->config->item('captcha_height', 'adgo_auth'),
				'show_grid'		=> $this->config->item('captcha_grid', 'adgo_auth'),
				'expiration'	=> $this->config->item('captcha_expire', 'adgo_auth'),
		));
	
		// 세션의 보안문자 파라미터 저장
		$this->session->set_flashdata(array(
				'captcha_word' => $cap['word'],
				'captcha_time' => $cap['time'],
		));
	
		return $cap['image'];
	}
	
	/**
	 * Callback function. Check if CAPTCHA test is passed.
	 * 보안문자 통과 확인
	 * @param	string
	 * @return	bool
	 */
	function _check_captcha($code)
	{
		$time = $this->session->flashdata('captcha_time');
		$word = $this->session->flashdata('captcha_word');
	
		list($usec, $sec) = explode(" ", microtime());
		$now = ((float)$usec + (float)$sec);
	
		if ($now - $time > $this->config->item('captcha_expire', 'adgo_auth')) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
			return FALSE;
	
		} elseif (($this->config->item('captcha_case_sensitive', 'adgo_auth') AND
				$code != $word) OR
				strtolower($code) != strtolower($word)) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * Create reCAPTCHA JS and non-JS HTML to verify user as a human
	 * 작성 reCAPTCHA를 JS가 아닌 JS HTML은 인간으로 사용자를 확인합니다
	 * @return	string
	 */
	function _create_recaptcha()
	{
		$this->load->helper('recaptcha');
	
		// Add custom theme so we can get only image
		$options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";
	
		// Get reCAPTCHA JS and non-JS HTML
		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'adgo_auth'));
	
		return $options.$html;
	}
	
	/**
	 * Callback function. Check if reCAPTCHA test is passed.
	 * 콜백함수 테스트 통과 확인
	 * @return	bool
	 */
	function _check_recaptcha()
	{
		$this->load->helper('recaptcha');
	
		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'adgo_auth'),
				$_SERVER['REMOTE_ADDR'],
				$_POST['recaptcha_challenge_field'],
				$_POST['recaptcha_response_field']);
	
		if (!$resp->is_valid) {
			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */