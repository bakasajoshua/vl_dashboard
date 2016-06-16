<?php
defined("BASEPATH") or exit();

/**
* 
*/
class Partner extends MY_Controller
{
	public $data = array();

	function __construct()
	{
		parent:: __construct();
		$this->data	=	array_merge($this->data,$this->load_libraries(array('material','highstock','highmaps','highcharts')));
		$this->data['part'] = TRUE;
	}

	public function index()
	{
		$this->load->module('charts/summaries');
		
		$this->data['content_view'] = 'partner/partner_summary_view';
		$this -> template($this->data);
	}

	public function nosuppression()
	{
		$this->load->module('charts/nonsuppression');

		$this->data['content_view'] = 'partner/partner_no_suppression_view';
		$this -> template($this->data);
	}

	public function get_selected_partner()
	{
		if ($this->session->userdata('partner_filter')) {
			$partner = $this->session->userdata('partner_filter');
		} else {
			$partner = 1;
		}
		 echo $partner;
	}

	public function check_partner_select()
	{
		if ($this->session->userdata('partner_filter')) {
			$partner = $this->session->userdata('partner_filter');
		} else {
			$partner = null;
		}
		 echo $partner;
	}
}
?>