<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * 이 모델은 사용자 인증 데이터를 나타냅니다. 그것은 다음과 같은 테이블을 작동 :
 * - user account data, 사용자 계정 데이터,
 * - user profiles, 사용자 프로필
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Users extends CI_Model
{
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles

	function __construct()
	{
		parent::__construct();
	}

	//회원 레코드 가져오기
	function users_record()
	{
		$this->db->select("*");
		$this->db->where('id', $this->adgo_auth_lib->get_user_id());
		$query = $this->db->get($this->table_name);
		$data = $query->row_array();
		return $data;
	}

	/**
	 * Get user record by Id
	 * 아이디기준으로 사용자 레코드 가져오기
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_by_id($user_id, $activated)
	{
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by login (username or email)
	 * 로그인하여 사용자 아이디 또는 메일을 확인
	 * @param	string
	 * @return	object
	 */
	//users테이블에서 회원 아이디 있는지 확인
	function get_user_by_login($login)
	{
		$this->db->where('LOWER(username)=', strtolower($login));
		$this->db->or_where('LOWER(email)=', strtolower($login));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by username
	 * 회원필드로 회원 레코드 가져오기
	 * @param	string
	 * @return	object
	 * strtolower- 소문자로 LOWER-소문자로반환   ,strtoupper - 대문자로 
	 */

	//아이디 로 해당 회원정보 가져오기
	function get_user_by_username($username)
	{
		$this->db->where('LOWER(username)=', strtolower($username));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	//이메일로 회원 레코드 가져오기
	function get_user_by_email($email)
	{
		$this->db->where('LOWER(email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}
	
	function update_user_info()
	{
		$result = $this->input->post(NULL, TRUE);
		$email = $this->input->post('email', TRUE);
		$this->db->where('email', $email);
		$this->db->update('users', $result);
	}

	//우편번호 검색(주소명)
	function search_zip($search)
	{
		$this->db->select("*");
		$this->db->like('gugun',$search);
		$this->db->or_like('dong',$search);
		$query = $this->db->get('zipcode');
		//return $query->result_array();//배열
		return $query->result();//객체
	}

	//이름 중복 첵크
		function is_kname_available($kname)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(kname)=', strtolower($kname));
		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	//닉네임 중복 첵크
		function is_nickname_available($nickname)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(nickname)=', strtolower($nickname));
		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	//핸드폰 중복 첵크
		function is_mobile_available($mobile)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(mobile)=', strtolower($mobile));
		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	//아이디 중복첵크
	function is_username_available($username)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(username)=', strtolower($username));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	// email 중복첵크
	function is_email_available($email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(email)=', strtolower($email));
		$this->db->or_where('LOWER(new_email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Create new user record
	 * 새 회원 생성
	 * @param	array
	 * @param	bool
	 * @return	array
	 */
	function create_user($data, $activated = TRUE)
	{
		$data['created'] = date('Y-m-d H:i:s');
		$data['activated'] = $activated ? 1 : 0;

		if ($this->db->insert($this->table_name, $data)) {
			$user_id = $this->db->insert_id();
			if ($activated)	$this->create_profile($user_id);
			return array('user_id' => $user_id);
		}
		return NULL;
	}

	/**
	 * Activate user if activation key is valid.
	 * Can be called for not activated users only.
	 * 인증키 유효성 검사후 활성
	 * @param	int
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activate_user($user_id, $activation_key, $activate_by_email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		if ($activate_by_email) {
			$this->db->where('new_email_key', $activation_key);
		} else {
			$this->db->where('new_password_key', $activation_key);
		}
		$this->db->where('activated', 0);
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() == 1) {

			$this->db->set('activated', 1);
			$this->db->set('new_email_key', NULL);
			$this->db->where('id', $user_id);
			$this->db->update($this->table_name);

			$this->create_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Purge table of non-activated users
	 * 비활성 회원 레코드들 정해진 시간이 지나면 삭제
	 * @param	int
	 * @return	void
	 */
	function purge_na($expire_period = 172800)
	{
		$this->db->where('activated', 0);
		$this->db->where('UNIX_TIMESTAMP(created) <', date('Y-m-d H:i:s') - $expire_period);
		$this->db->delete($this->table_name);
	}

	/**
	 * Delete user record
	 * 회원 레코드 삭제
	 * @param	int
	 * @return	bool
	 *회원정보 삭제-liboaries/Tank_auth.php에서 검증후 넘어옴
	 *문제 일으키고 도망가는 회원이 있어서 문제회원으로 등록함
	 *회원캐릭터 이미지는 관리자에서 최종 회원정보 삭제시 삭제됨
	 */
	function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			$this->delete_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	 /**회원정보 삭제 - 패스워드만삭제
	 *동일한 함수명으로 만들어서 사이트 접속되지 않았음 주의할것
	 *회원캐릭터 이미지는 관리자에서 최종 회원정보 삭제시 삭제됨
	 */
	function users_out($user_id)
	{
	$data = array(
		'password' => 'NULL' ,
		'users_out' => '0' ,
		'out_reason' => '회원탈퇴' ,
	  );
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, $data);
		return TRUE;
	}

	/**
	 * Set new password key for user.
	 * This key can be used for authentication when resetting user's password.
	 * 새 패스워드 설정 (인증키 사용가능)
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set_password_key($user_id, $new_pass_key)
	{
		$this->db->set('new_password_key', $new_pass_key);
		$this->db->set('new_password_requested', date('Y-m-d H:i:s'));
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Check if given password key is valid and user is authenticated.
	 * 인증키 유효성 확인(회원 인증)
	 * @param	int
	 * @param	string
	 * @param	int
	 * @return	void
	 */
	function can_reset_password($user_id, $new_pass_key, $expire_period = 900)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);
		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >', date('Y-m-d H:i:s') - $expire_period);

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1;
	}

	/**
	 * Change user password if password key is valid and user is authenticated.
	 * 인증키 인증후 사용자 패스워드 변경
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	function reset_password($user_id, $new_pass, $new_pass_key, $expire_period = 900)
	{
		$this->db->set('password', $new_pass);
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);
		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >=', date('Y-m-d H:i:s') - $expire_period);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Change user password
	 * 패스워드 변경
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function change_password($user_id, $new_pass)
	{
		$this->db->set('password', $new_pass);
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Set new email for user (may be activated or not).
	 * The new email cannot be used for login or notification before it is activated.
	 * 새 이메일 등록
	 * 활성화 되기전 로그인 정지
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function set_new_email($user_id, $new_email, $new_email_key, $activated)
	{
		$this->db->set($activated ? 'new_email' : 'email', $new_email);
		$this->db->set('new_email_key', $new_email_key);
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Activate new email (replace old email with new one) if activation key is valid.
	 * 인증키 유효할시 새 메일 활성화
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function activate_new_email($user_id, $new_email_key)
	{
		$this->db->set('email', 'new_email', FALSE);
		$this->db->set('new_email', NULL);
		$this->db->set('new_email_key', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_email_key', $new_email_key);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Update user login info, such as IP-address or login time, and
	 * clear previously generated (but not activated) passwords.
	 * ip주소나 로그인시간등의 정보를 등록하고 암호생성을 취소(미작동됨)
	 * @param	int
	 * @param	bool
	 * @param	bool
	 * @return	void
	 */
	function update_login_info($user_id, $record_ip, $record_time)
	{
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);

		if ($record_ip)		$this->db->set('last_ip', $this->input->ip_address());
		if ($record_time)	$this->db->set('last_login', date('Y-m-d H:i:s'));

		$this->db->where('id', $user_id);
		$this->db->update($this->table_name);
	}

	/**
	 * Ban user
	 * 불량 회원 등록
	 * @param	int
	 * @param	string
	 * @return	void
	 */
//불량회원 설정과 이유-현재 사용되지 않습니다.
	function ban_user($user_id, $reason = NULL)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 1,
			'ban_reason'	=> $reason,
		));
	}

	/**
	 * Unban user
	 * 불량회원 해제
	 * @param	int
	 * @return	void
	 */
	
	function unban_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 0,
			'ban_reason'	=> NULL,
		));
	}

	/**
	 * Create an empty profile for a new user
	 * 회원 프로파일 등록
	 * @param	int
	 * @return	bool
	 */
	private function create_profile($user_id)
	{
		$this->db->set('user_id', $user_id);
		return $this->db->insert($this->profile_table_name);
	}

	/**
	 * Delete user profile
	 * 회원 프로파일 삭제
	 * @param	int
	 * @return	void
	 */
	private function delete_profile($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->profile_table_name);
	}
}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */