<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @메인페이지
 * @CodeIgniter 기반으로 제작
 * @package		adgo
 * @author		이유리 
 * @version		beta test
 * @license		MIT License
 */
class main extends CI_Controller {
	function main(){
		parent::__construct();
		$this->load->model('report_model');
		$this->load->model('site_config_model');
		$this->load->config('adgo_auth', TRUE);
		$this->load->helper(array('form', 'url', 'directory', 'alert'));
		$this->load->library(array('live_rail_api'));
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
// 		if($this->live_rail_api->login('nick@saygoodbuy.com', 'liverail1', md5('liverail1'))){
// // 			$this->live_rail_api->pullReport();
// 			$this->live_rail_api->getList();
// 		}
		$data = $this->report_model->totalSumImpressions();
		foreach ($data as $row)
		{
			$count = $row->impressions;
		}
		$data['total'] = $count;
		$this->load->view('adgo/main_view',$data);
	}
}
