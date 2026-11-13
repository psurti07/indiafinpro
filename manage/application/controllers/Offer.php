<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Offer extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}

	public function index(){
		redirect('dashboard');
	}

	public function cardoffer(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Offer_Model');
		$saleslist = $this->Manage_Offer_Model->getcardoffersales($dt_to, $dt_from, 3);
		$this->load->view('sales-cardoffer',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function ivrpaymentoffer(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Offer_Model');
		$saleslist = $this->Manage_Offer_Model->getcardoffersales($dt_to, $dt_from, 4);
		$this->load->view('sales-ivrpaymentoffer',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function specialoffer()
	{
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Offer_Model');
		$saleslist = $this->Manage_Offer_Model->getcardoffersales($dt_to, $dt_from, 5);
		$this->load->view('sales-specialoffer', ['saleslist' => $saleslist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function bumperoffer()
	{
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Offer_Model');
		$saleslist = $this->Manage_Offer_Model->getcardoffersales($dt_to, $dt_from, 6);
		$this->load->view('sales-bumperoffer', ['saleslist' => $saleslist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}


	public function festivaloffer()
	{
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Offer_Model');
		$saleslist = $this->Manage_Offer_Model->getcardoffersales($dt_to, $dt_from, 7);
		$this->load->view('sales-festivaloffer', ['saleslist' => $saleslist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function offerstatus($page, $statusid, $id)
	{
		$this->load->model('Manage_Offer_Model');
		$response = $this->Manage_Offer_Model->changeleadstatus($statusid, $id);

		if ($page == 3) {
			redirect('offer/cardoffer');
		} else if ($page == 4) {
			redirect('offer/ivrpaymentoffer');
		} else if ($page == 5) {
			redirect('offer/specialoffer');
		}  else if ($page == 6) {
			redirect('offer/bumperoffer');
		}  else if ($page == 7) {
			redirect('offer/festivaloffer');
		} else {
			redirect('offer');
		}
	}

	

}
?>
