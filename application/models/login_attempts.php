<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login_attempts
 *
 * This model serves to watch on all attempts to login on the site
 * (to protect the site from brute-force attack to user database)
 * 이 모델은 사이트에 로그인하는 모든 시도에 보고하는 역할을 합니다.
 * (사용자 데이터베이스에 무차별 대입 (brute-force) 공격으로부터 사이트를 보호하기 위해)
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Login_attempts extends CI_Model
{
	private $table_name = 'users_login_attempts';

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name = $ci->config->item('db_table_prefix', 'adgo_auth').$this->table_name;
	}

	/**
	 * Get number of attempts to login occured from given IP-address or login
	 * 특정 IP에서 로그인 시도 얻기
	 * @param	string
	 * @param	string
	 * @return	int
	 */
	function get_attempts_num($ip_address, $login)
	{
		$this->db->select('1', FALSE);
		$this->db->where('ip_address', $ip_address);
		if (strlen($login) > 0) $this->db->or_where('login', $login);

		$qres = $this->db->get($this->table_name);
		return $qres->num_rows();
	}

	/**
	 * Increase number of attempts for given IP-address and login
	 * 아이피별 로그인 시도 횟수 증가
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	function increase_attempt($ip_address, $login)
	{
		$this->db->insert($this->table_name, array('ip_address' => $ip_address, 'login' => $login));
	}

	/**
	 * Clear all attempt records for given IP-address and login.
	 * Also purge obsolete login attempts (to keep DB clear).
	 * 로그인 시도 기록 삭제
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	void
	 */
	function clear_attempts($ip_address, $login, $expire_period = 86400)
	{
		$this->db->where(array('ip_address' => $ip_address, 'login' => $login));

		// Purge obsolete login attempts
		$this->db->or_where('UNIX_TIMESTAMP(time) <', time() - $expire_period);

		$this->db->delete($this->table_name);
	}
}

/* End of file login_attempts.php */
/* Location: ./application/models/auth/login_attempts.php */