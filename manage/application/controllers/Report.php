<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Report extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}

	public function index(){
		redirect('dashboard');
	}

	public function customers(){
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getcustomersReport();
		$this->load->view('report-customers',['datalist'=>$datalist]);
	}
	
	public function customersdaywise($month = '', $year = '')
	{
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getcustomersReportDaywise($month, $year);
		echo json_encode($datewiselist);
	}
	
	public function offlineleads($loantype = ''){
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getofflineleadReport($loantype);
		$this->load->view('report-offline-loan',['datalist'=>$datalist, 'loantype'=>$loantype]);
	}

	public function digitalleads($loantype = ''){
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getdigitalleadReport($loantype);
		$this->load->view('report-digital-loan',['datalist'=>$datalist, 'loantype'=>$loantype]);
	}

	public function digitalleadsdaywise($loantype = '', $month = '', $year = '')
	{
		$loantype = $_REQUEST['loantype'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getdigitalleadReportDaywise($loantype, $month, $year);
		echo json_encode($datewiselist);
	}

	public function gstdata(){
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Report_Model');
		$gstlist = $this->Manage_Report_Model->getgstrecords($dt_to, $dt_from);
		$this->load->view('report-gst-data',['gstlist'=>$gstlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function tdsdata(){
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Report_Model');
		$tdslist = $this->Manage_Report_Model->gettdsrecords($dt_to, $dt_from);
		$this->load->view('report-tds-data',['tdslist'=>$tdslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function refunddata(){
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Report_Model');
		$refundlist = $this->Manage_Report_Model->getrefundrecords($dt_to, $dt_from);
		$this->load->view('report-refund-data',['refundlist'=>$refundlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function processstep($step = ''){
		if($step != '') {
			$dt_to = date('Y-m-d', strtotime('-2 days'));
			$dt_from = date('Y-m-d');

			if(isset($_REQUEST['dt_to'])) {
				$dt_to = $_REQUEST['dt_to'];
			}

			if(isset($_REQUEST['dt_from'])) {
				$dt_from = $_REQUEST['dt_from'];
			}
			
			$this->load->model('Manage_Report_Model');
			$userlist = $this->Manage_Report_Model->getuserprocessstep($step, $dt_to, $dt_from);
			$this->load->view('report-processstep',['userlist'=>$userlist, 'step'=>$step, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
		}
		else {
			redirect('dashboard/processstatistics');
		}
	}

	public function applications()
	{
		$this->load->model('Manage_Report_Model');

		$datalist = $this->Manage_Report_Model->getApplicationReport();

		$this->load->view('report-application', [
			'datalist' => $datalist
		]);
	}

	public function applicationdaywise()
	{
		$month = $this->input->post('month');
		$year  = $this->input->post('year');

		$this->load->model('Manage_Report_Model');

		$data = $this->Manage_Report_Model->getApplicationReportDaywise($month, $year);

		echo json_encode($data);
	}
}
?>
