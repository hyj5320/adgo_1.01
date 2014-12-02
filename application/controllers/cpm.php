<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class cpm extends CI_Controller {
	function cpm(){
		parent::__construct();
		$this->load->model('cpm_model');
		$this->load->model('site_config_model');
		$this->load->helper(array('form', 'url', 'directory','alert'));
		$this->load->library(array('form_validation'));
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
		$this->load->view('adgo/cpm_view');
	}
	
	function calculator(){
		$impressions = $this->input->post('impressions', TRUE);
		$usa = $this->input->post('usa', TRUE);
		$uk = $this->input->post('uk', TRUE);
		$canada = $this->input->post('canada', TRUE);
		$australia = $this->input->post('australia', TRUE);
		$international = $this->input->post('international', TRUE);
		
		if($impressions == null){
			alert('impressions has not been entered.', 'index');
		}

		$result = $this->cpm_model->index();
		foreach ($result as $row){

			$m_usa = $row->usa;
			$m_uk = $row->uk;
			$m_canada = $row->canada;
			$m_australia = $row->australia;
			$m_international = $row->international;
		}

		
		$mvar = 0;
		if($usa != null){
			$mvar += ((((int)$m_usa/1000)*(int)$impressions)/100)*(int)$usa;
		}
		
		if($uk != null){
			$mvar += ((((int)$m_uk/1000)*(int)$impressions)/100)*(int)$uk;
		}
		
		if($canada != null){
			$mvar += ((((int)$m_canada/1000)*(int)$impressions)/100)*(int)$canada;
		}
		
		if($australia != null){
			$mvar += ((((int)$m_australia/1000)*(int)$impressions)/100)*(int)$australia;
		}
		
		if($international != null){
			$mvar += ((((int)$m_international/1000)*(int)$impressions)/100)*(int)$international;
		}
		
		if($impressions != null){
			$ecpm = 0;
			if(0 < (int)$impressions && (int)$impressions < 10000){
				$ecpm = 0.92;
			}
			else if(10000 <= (int)$impressions && (int)$impressions < 100000){
				$ecpm = 0.88 - (10*0.000001*(int)$impressions);
			}
			else if(100000 <= (int)$impressions && (int)$impressions < 1000000){
				$ecpm = 0.805 - (2.5*0.0000001*(int)$impressions);
			}
			else if(1000000 <= (int)$impressions && (int)$impressions < 10000000){
				$ecpm = 0.56 - (1*0.00000001*(int)$impressions);
			}
			elseif (10000000 <= (int)$impressions){
				$ecpm = 0.46;
			}
		}
		
		$data['mvar'] = round($mvar);
		$data['dvar'] = round($mvar/30);
		$data['ecpm'] = round($ecpm, 3);
		
		$data['impressions'] = $impressions;
		$data['usa'] = $usa;
		$data['uk'] = $uk;
		$data['canada'] = $canada;
		$data['australia'] = $australia;
		$data['international'] = $international;
		
		$this->load->view('adgo/cpm_view', $data);
	}
}
