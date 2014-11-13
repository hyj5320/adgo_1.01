<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpass-0.1/PasswordHash.php');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

/**
 * Tank_auth
 *
 * Authentication library for Code Igniter.
 * 코드이그나이트 인증 라이브러리
 *
 * @package		Tank_auth
 * @author		Ilya Konyukhov (http://konyukhov.com/soft/)
 * @version		1.0.9
 * @based on	DX Auth by Dexcell (http://dexcell.shinsengumiteam.com/dx_auth)
 * @license		MIT License Copyright (c) 2008 Erick Hartanto
 */
class adgo_auth_lib {
	private $error = array();

	function __construct() {
		$this->ci =& get_instance();

		$this->ci->load->config('adgo_auth', TRUE);
		$this->ci->load->library('session');
		$this->ci->load->database();
		$this->ci->load->model('users');
		$this->ci->load->helper(array('alert'));
	}

	/**
	 * Login user on the site. Return TRUE if login is successful
	 * 사이트에 로그인합니다. 로그인이 성공하면 true를 반환
	 * (user exists and activated, password is correct), otherwise FALSE.
	 * (사용자가 존재하고 활성화, 암호는 정확하다), 그렇지 않으면  FALSE.
	 * @param	string	(username or email or both depending on settings in config file)
	 * 파라미터  끈 (아이디 또는 이메일 또는 둘 모두 구성 파일의 설정에 따라)
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
function login($login, $password) {
		if ((strlen($login) > 0) AND (strlen($password) > 0)) {
			
			$get_user_func = 'get_user_by_email';
			
			//아이디가 존재하지 않는다면
			if (!is_null($user = $this->ci->users->$get_user_func($login))) {	// login ok
				//password 암호화
				$hasher = new PasswordHash(
						$this->ci->config->item('phpass_hash_strength', 'adgo_auth'),
						$this->ci->config->item('phpass_hash_portable', 'adgo_auth'));
				if ($hasher->CheckPassword($password, $user->password)) {		// password ok
					//문제회원(탈퇴회원)
					if ($user->banned == 1) {									// fail - banned
						$this->error = array('banned' => $user->ban_reason);

					} else {
						//세션 데이터 생성(users테이블 내용 생성)
						$this->ci->session->set_userdata(array(
								'user_id'	=> $user->id,
								'username'	=> $user->username,
								'email'		=> "$user->email",//특수문자(@)포함시 "" 사용
								'phone'		=> $user->phone,
							    'level'		=> $user->level,
								'file1'		=> $user->file1,
								'status'	=> ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
						));
						
						if ($user->activated == 0) {							// fail - not activated
							$this->ci->session->sess_destroy();
							$this->error = array('not_activated' => '');

						} else {												// success
							$this->clear_login_attempts($login);
							$this->ci->users->update_login_info(
									$user->id,
									$this->ci->config->item('login_record_ip', 'adgo_auth'),
									$this->ci->config->item('login_record_time', 'adgo_auth'));
							return TRUE;
						}
					}
				} else {														// fail - wrong password
					$this->increase_login_attempt($login);
					$this->error = array('password' => 'auth_incorrect_password');
				}
			} else {															// fail - wrong login
				$this->increase_login_attempt($login);
				$this->error = array('login' => 'auth_incorrect_login');
			}
		}
		return FALSE;
	}

	/**
	 * Logout user from the site
	 * 사이트 로그아웃
	 * @return	void(무효)
	 */
	function logout()
	{
		$this->ci->session->set_userdata(array('user_id' => '', 'username' => '', 'status' => ''));
		$this->ci->session->sess_destroy();
	}

	/**
	 * Check if user logged in. Also test if user is activated or not.
	 * 사용자는 사용자가 활성화 된 경우에도 테스트를 로그인하지 않은 경우 또는 확인
	 * @param	bool
	 * @return	bool
	 */
	function is_logged_in($activated = TRUE)
	{
		return $this->ci->session->userdata('status') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
	}

	/**
	 * Get user_id
	 * user_id 넘기기
	 * @return	string
	 */
	function get_user_id()
	{
		return $this->ci->session->userdata('user_id');
	}

	/**
	 * Get username
	 *  username 넘기기
	 * @return	string
	 */
	function get_username()
	{
		return $this->ci->session->userdata('username');
	}
	
	function get_email()
	{
		return $this->ci->session->userdata('email');
	}

	//file1 넘기기
	function get_file1()
	{
		return $this->ci->session->userdata('file1');
	}

	/**
	 * Create new user on the site and return some data about it:
	 * user_id, username, password, email, new_email_key (if any).
	 * 사이트에 새 사용자를 생성하고 그것에 대해 몇 가지 데이터를 반환합니다
	 * USER_ID, 사용자 이름, 암호, 이메일, new_email_key (있는 경우)
	 * @param	string
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	array
	 */
	//중복데이터 첵크 및 회원데이터 넘김
	//★회원 필드 추가 아래  create_user함수 세그 멘트 값에 변수 모두 넣어 줘야 함
	function create_user($username, $password, $email, $company, $phone, $timezone1, $timezone2, $state, $site_kind, $site_url, $site_title, $site_description, $site_keywords, $site_category, $privacy, $daily_visits, $agree, $email_activation)
	{
		//아이디 중복 첵크
		if ((strlen($username) > 0) AND !$this->ci->users->is_username_available($username)) {
			$this->error = array('username' => 'auth_username_in_use');
		//이메일 중복 첵크
		} elseif (!$this->ci->users->is_email_available($email)) 
			{
				$this->error = array('email' => 'auth_email_in_use');
		} else {
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'adgo_auth'),
					$this->ci->config->item('phpass_hash_portable', 'adgo_auth'));
			$hashed_password = $hasher->HashPassword($password);

			$data = array(
				'username'	=> $username,
				'password'	=> $hashed_password,
				'email'		=> $email,
				'company'	=> $company,
				'phone'		=> $phone,
				'timezone1'	=> $timezone1,
				'timezone2' => $timezone2,
				'state'		=> $state,
				'site_kind'	=> $site_kind,
				'site_url'	=> $site_url,
				'site_title'=> $site_title,
				'site_description'	=> $site_description,
				'site_keywords'	=> $site_keywords,
				'site_category'	=> $site_category,
				'privacy'	=> $privacy,
				'daily_visits'	=> $daily_visits,
				'agree'	=> $agree,
				'last_ip'	=> $this->ci->input->ip_address(),
			);
			$site_data = array(
				'email'		=> $email,
				'site_kind'	=> $site_kind,
				'site_url'	=> $site_url,
				'site_title'=> $site_title,
				'site_description'	=> $site_description,
				'site_keywords'	=> $site_keywords,
				'site_category'	=> $site_category,
				'privacy'	=> $privacy,
				'daily_visits'	=> $daily_visits,
			);
// 			if ($email_activation) {
// 				$data['new_email_key'] = md5(rand().microtime());
// 			}
			if (!is_null($res = $this->ci->users->create_user($data, !$email_activation))) {
				$this->ci->new_site_model->res_site_add($site_data);
				$data['user_id'] = $res['user_id'];
				$data['password'] = $password;
				unset($data['last_ip']);
				return $data;
			}
		}
		return NULL;
	}

	/**
	 * Check if username available for registering.
	 * Can be called for instant form validation.
	 * 등록에 사용할 경우 사용자 이름을 확인합니다.
	 * 즉시 양식 유효성 검사를 위해 호출 할 수 있습니다.	 
	 * @param	string
	 * @return	bool
	 */
	function is_username_available($username)
	{
		return ((strlen($username) > 0) AND $this->ci->users->is_username_available($username));
	}


	/**
	 * Check if email available for registering.
	 * Can be called for instant form validation.
	 * 확인 등록 가능 이메일을 보내는 경우에는 즉시 양식 유효성 검사를 위해 호출 할 수 있습니다.
	 * @param	string
	 * @return	bool
	 */
	function is_email_available($email)
	{
		return ((strlen($email) > 0) AND $this->ci->users->is_email_available($email));
	}

	/**
	 * Change email for activation and return some data about user:
	 * user_id, username, email, new_email_key.
	 * Can be called for not activated users only.
	 * 인증 이메일을 변경하고 사용자에 대한 일부 데이터를 반환합니다 :
	 * USER_ID, 사용자 이름, 이메일, new_email_key.
	 * 는 활성화되어 사용자를 호출 할 수 있습니다.
	 * @param	string
	 * @return	array
	 */
	function change_email($email)
	{
		$user_id = $this->ci->session->userdata('user_id');

		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, FALSE))) {

			$data = array(
				'user_id'	=> $user_id,
				'username'	=> $user->username,
				'email'		=> $email,
			);
			
			if (strtolower($user->email) == strtolower($email)) {		// leave activation key as is
				$data['new_email_key'] = $user->new_email_key;
				return $data;

			} elseif ($this->ci->users->is_email_available($email)) {
				$data['new_email_key'] = md5(rand().microtime());
				$this->ci->users->set_new_email($user_id, $email, $data['new_email_key'], FALSE);
				return $data;

			} else {
				$this->error = array('email' => 'auth_email_in_use');
			}
		}
		return NULL;
	}

	/**
	 * Activate user using given key
	 * 지정된 키를 사용하여 유저 활성화
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activate_user($user_id, $activation_key, $activate_by_email = TRUE)
	{
		$this->ci->users->purge_na($this->ci->config->item('email_activation_expire', 'adgo_auth'));

		if ((strlen($user_id) > 0) AND (strlen($activation_key) > 0)) {
			return $this->ci->users->activate_user($user_id, $activation_key, $activate_by_email);
		}
		return FALSE;
	}

	/**
	 * Set new password key for user and return some data about user:
	 * user_id, username, email, new_pass_key.
	 * The password key can be used to verify user when resetting his/her password.
	 * 사용자의 새 암호 키를 설정하고 사용자에 대한 일부 데이터를 반환합니다 :
	 * USER_ID, 사용자 이름, 이메일, new_pass_key.
	 * 암호 키는 암호를 재설정 할 때 사용자를 확인하는 데 사용할 수 있습니다.
	 * @param	string
	 * @return	array
	 */
	function forgot_password($login) {
		if (strlen($login) > 0) {
			$user = $this->ci->users->get_user_by_login($login);
			if (!is_null($user)) {
				$data = array(
					'user_id'		=> $user->id,
					'username'		=> $user->username,
					'email'			=> $user->email,
					'new_pass_key'	=> md5(rand().microtime()),
				);
				$this->ci->users->set_password_key($user->id, $data['new_pass_key']);
				return $data;
			} else {
				$this->error = array('login' => 'auth_incorrect_email_or_username');
			}
		}
		return NULL;
	}

	/**
	 * Check if given password key is valid and user is authenticated.
	 * 주어진 암호 키가 유효하고 사용자가 인증되어 있는지 확인합니다.
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function can_reset_password($user_id, $new_pass_key)
	{
		if ((strlen($user_id) > 0) AND (strlen($new_pass_key) > 0)) {
			return $this->ci->users->can_reset_password(
				$user_id,
				$new_pass_key,
				$this->ci->config->item('forgot_password_expire', 'adgo_auth'));
		}
		return FALSE;
	}

	/**
	 * Replace user password (forgotten) with a new one (set by user)
	 * and return some data about it: user_id, username, new_password, email.
	 * 새로운 사용자의 암호 (암호 찾기) 변경
     * USER_ID, 사용자 이름, NEW_PASSWORD, 이메일 : 
	 * 그것에 대해 일부 데이터를 반환합니다.
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function reset_password($user_id, $new_pass_key, $new_password)
	{
		if ((strlen($user_id) > 0) AND (strlen($new_pass_key) > 0) AND (strlen($new_password) > 0)) {

			if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

				// Hash password using phpass
				$hasher = new PasswordHash(
						$this->ci->config->item('phpass_hash_strength', 'adgo_auth'),
						$this->ci->config->item('phpass_hash_portable', 'adgo_auth'));
				$hashed_password = $hasher->HashPassword($new_password);

				if ($this->ci->users->reset_password(
						$user_id,
						$hashed_password,
						$new_pass_key,
						$this->ci->config->item('forgot_password_expire', 'adgo_auth'))) {	// success

					return array(
						'user_id'		=> $user_id,
						'username'		=> $user->username,
						'email'			=> $user->email,
						'new_password'	=> $new_password,
					);
				}
			}
		}
		return NULL;
	}

	/**
	 * Change user password (only when user is logged in)
	 * 사용자 비밀번호 변경 (로그인 한 경우에만)
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function change_password($old_pass, $new_pass)
	{
		$user_id = $this->ci->session->userdata('user_id');

		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

			// Check if old password correct
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'adgo_auth'),
					$this->ci->config->item('phpass_hash_portable', 'adgo_auth'));
			if ($hasher->CheckPassword($old_pass, $user->password)) {			// success

				// Hash new password using phpass
				$hashed_password = $hasher->HashPassword($new_pass);

				// Replace old password with new one
				$this->ci->users->change_password($user_id, $hashed_password);
				return TRUE;

			} else {															// fail
				$this->error = array('old_password' => 'auth_incorrect_password');
			}
		}
		return FALSE;
	}

	/**
	 * Change user email (only when user is logged in) and return some data about user:
	 * user_id, username, new_email, new_email_key.
	 * The new email cannot be used for login or notification before it is activated.
	 * 회원 이메일을 변경 (사용자가 로그인 한 경우에만) 및 회원에 대한 
	 * 일부 데이터를 반환합니다 :
	 * USER_ID, 사용자 이름, new_email, new_email_key가 
	 * 활성화되기 전에 새로운 이메일이 로그인하거나 알림을 사용할 수 없습니다.
	 * @param	string
	 * @param	string
	 * @return	array
	 */
	function set_new_email($new_email, $password)
	{
		$user_id = $this->ci->session->userdata('user_id');

		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

			// Check if password correct
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'adgo_auth'),
					$this->ci->config->item('phpass_hash_portable', 'adgo_auth'));
			if ($hasher->CheckPassword($password, $user->password)) {			// success

				$data = array(
					'user_id'	=> $user_id,
					'username'	=> $user->username,
					'new_email'	=> $new_email,
				);

				if ($user->email == $new_email) {
					$this->error = array('email' => 'auth_current_email');

				} elseif ($user->new_email == $new_email) {		// leave email key as is
					$data['new_email_key'] = $user->new_email_key;
					return $data;

				} elseif ($this->ci->users->is_email_available($new_email)) {
					$data['new_email_key'] = md5(rand().microtime());
					$this->ci->users->set_new_email($user_id, $new_email, $data['new_email_key'], TRUE);
					return $data;

				} else {
					$this->error = array('email' => 'auth_email_in_use');
				}
			} else {															// fail
				$this->error = array('password' => 'auth_incorrect_password');
			}
		}
		return NULL;
	}

	/**
	 * Activate new email, if email activation key is valid.
	 * 새 이메일을 활성화하고 이메일 인증 키가 유효.
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function activate_new_email($user_id, $new_email_key)
	{
		if ((strlen($user_id) > 0) AND (strlen($new_email_key) > 0)) {
			return $this->ci->users->activate_new_email(
					$user_id,
					$new_email_key);
		}
		return FALSE;
	}

	/**
	 * Delete user from the site (only when user is logged in)
	 * 회원탈퇴(회원정보삭제) - 로그인후 탈퇴 가능
	 * @param	string
	 * @return	bool
	 */
	//회원 즉시탈퇴 (관리자/회원관리설정)
	function delete_user($password)
	{
		$user_id = $this->ci->session->userdata('user_id');
		//아이디 존재하는지 첵크함
		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

			//패스워드 맞는지 첵크
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'adgo_auth'),
					$this->ci->config->item('phpass_hash_portable', 'adgo_auth'));
			if ($hasher->CheckPassword($password, $user->password)) {			// success
				
				//models/users.php/delete_user 에서 삭제함
				$this->ci->users->delete_user($user_id);
				
				//회원정보 삭제후 로그 아웃됨
				$this->logout();
				return TRUE;

			} else {															// fail
				$this->error = array('password' => 'auth_incorrect_password');
			}
		}
		return FALSE;
	}

	//관리자 확인후 회원 삭제 (관리자/회원관리설정) - 탈퇴회원으로 등록
	function users_out($password)
	{
		$user_id = $this->ci->session->userdata('user_id');
		//아이디 존재하는지 첵크함
		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

			//패스워드 맞는지 첵크
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'adgo_auth'),
					$this->ci->config->item('phpass_hash_portable', 'adgo_auth'));
			if ($hasher->CheckPassword($password, $user->password)) {			// success
				//models/users.php/delete_user 에서 삭제함
				$this->ci->users->users_out($user_id);
				//회원정보 삭제후 로그 아웃됨
				$this->logout();
				return TRUE;

			} else {															// fail
				$this->error = array('password' => 'auth_incorrect_password');
			}
		}
		return FALSE;
	}

	/**
	 * Get error message.
	 * 오류 메시지
	 * Can be invoked after any failed operation such as login or register.
	 * 로그인 또는 등록 등의 작업이 실패한 후 호출 할 수 있습니다
	 *
	 * @return	string
	 */
	function get_error_message()
	{
		return $this->error;
	}

	/**
	 * Check if login attempts exceeded max login attempts (specified in config)
	 * 로그인 실패 횟수 첵크
	 * @param	string
	 * @return	bool
	 */
	function is_max_login_attempts_exceeded($login)
	{
		if ($this->ci->config->item('login_count_attempts', 'adgo_auth')) {
			$this->ci->load->model('login_attempts');
			return $this->ci->login_attempts->get_attempts_num($this->ci->input->ip_address(), $login)
					>= $this->ci->config->item('login_max_attempts', 'adgo_auth');
		}
		return FALSE;
	}

	/**
	 * Increase number of attempts for given IP-address and login
	 * (if attempts to login is being counted)
	 * 아이피를 첵크하여 로그인 시도 횟수 증가
	 * @param	string
	 * @return	void
	 */
	private function increase_login_attempt($login)
	{
		if ($this->ci->config->item('login_count_attempts', 'adgo_auth')) {
			if (!$this->is_max_login_attempts_exceeded($login)) {
				$this->ci->load->model('login_attempts');
				$this->ci->login_attempts->increase_attempt($this->ci->input->ip_address(), $login);
			}
		}
	}

	/**
	 * Clear all attempt records for given IP-address and login
	 * (if attempts to login is being counted)
	 * 아이피 첵크하여 로그인 횟수 기록 삭제
	 * @param	string
	 * @return	void
	 */
	private function clear_login_attempts($login)
	{
		if ($this->ci->config->item('login_count_attempts', 'adgo_auth')) {
			$this->ci->load->model('login_attempts');
			$this->ci->login_attempts->clear_attempts(
					$this->ci->input->ip_address(),
					$login,
					$this->ci->config->item('login_attempt_expire', 'adgo_auth'));
		}
	}
}

/* End of file Tank_auth.php */
/* Location: ./application/libraries/Tank_auth.php */