<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Payment extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}

	public function index(){
		redirect('dashboard');
	}

	public function phonepelog() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->getphoneperecords($dt_to, $dt_from);

		$this->load->view('pg-phonepe-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function razorpaylog() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->getrazorpayrecords($dt_to, $dt_from);

		$this->load->view('pg-razorpay-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function sabpaisalog() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->getsabpaisarecords($dt_to, $dt_from);

		$this->load->view('pg-sabpaisa-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function worldlinelog() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->getworldlinerecords($dt_to, $dt_from);

		$this->load->view('pg-worldline-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function zaakpaylog() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->getzaakpayrecords($dt_to, $dt_from);

		$this->load->view('pg-zaakpay-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function airpaylog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->getairpayentryrecord($dt_to, $dt_from);
		$this->load->view('pg-airpay-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function openmoneylog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->getopenmoneyentrylist($dt_to, $dt_from);
		$this->load->view('pg-openmoney-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function easebuzzlog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Payment_Model');
		$paymentlist = $this->Manage_Payment_Model->geteasebuzzlogrecord($dt_to, $dt_from);
		$this->load->view('pg-easebuzz-data', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}


}
?>
