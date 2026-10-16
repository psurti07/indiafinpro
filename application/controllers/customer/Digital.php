<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Digital extends CI_Controller {
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('mfb--customerid')) {
			return redirect('customer/login');
		}
	}
	public function index(){
		return redirect()->to('customer/dashboard');
	}


	// START : PERSONAL LOAN FUNCTIONS
	public function personalLoan($step = 's1') {
		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		return redirect()->to('customer/dashboard');

		$flag = 0;
		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		$this->load->model('Customer_Profile_Model');
		$profiledata = $this->Customer_Profile_Model->getprofile($customerid);

		/*if($profiledata->cardtype != 11) {
			return redirect('customer/offers');
			die;
		}*/

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->model('Customer_Digital_Model');
		$lastapplication = $this->Customer_Digital_Model->getlastrecord($customerid);

		if($lastapplication->rec_date != "") {
			$now = time(); // or your date as well
			$your_date = strtotime($lastapplication->rec_date);
			$datediff = $now - $your_date;
			$days = round($datediff / (60 * 60 * 24));
			$flag = ($days>=180) ? 1 : 0;
		}
		
		$data = array(
			'flag' => $flag,
			'step' => $step,
			'userid' => $customerid
		);

		$this->load->view('customer/digital-personal-loan', ['meta'=>$meta, 'userdetails'=>$data]);
	}

	public function userPersonalApply(){
		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$userid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		$data_res = array(
			'userid' => $_REQUEST['userid'],
			'loantype' => $_REQUEST['loantype'],
			'loanamount' => $_REQUEST['loanamount'],
			'cibilscore' => $_REQUEST['cibilscore'],
			'loanpurpose' => $_REQUEST['loanpurpose'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi'],
			'emibounce' => $_REQUEST['emibounce']
		);

		$this->load->model('Customer_Digital_Model');
		$response = $this->Customer_Digital_Model->applyapplication($data_res);
		
		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'process_step' => 4
		);
		$response1 = $this->Customer_Digital_Model->updateregistration($userid, $data1);

		$data = array(
			'step' => 's2',
			'flag' => 1,
			'userid' => $userid,
			'applyid' => $response,
			'loanamount' => $_REQUEST['loanamount'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi']
		);

		/* $data3 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'applicationid' => $response,
			'statusid' => 1,
			'staffid' => 1,
			'isDelete' => 0
		);
		$response3 = $this->Customer_Digital_Model->applicationstatus($data3); */

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/digital-personal-loan', ['meta'=>$meta, 'userdetails'=>$data]);
	}
	// END : PERSONAL LOAN FUNCTIONS


	// START : BUSINESS LOAN FUNCTIONS
	public function businessloan($step = 's1') {
		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		return redirect()->to('customer/dashboard');

		$flag = 0;
		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		$this->load->model('Customer_Profile_Model');
		$profiledata = $this->Customer_Profile_Model->getprofile($customerid);
		
		/*if($profiledata->cardtype != 12) {
			return redirect('customer/offers');
			die;
		}*/

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->model('Customer_Digital_Model');
		$lastapplication = $this->Customer_Digital_Model->getlastrecord($customerid);

		if($lastapplication->rec_date != "") {
			$now = time(); // or your date as well
			$your_date = strtotime($lastapplication->rec_date);
			$datediff = $now - $your_date;
			$days = round($datediff / (60 * 60 * 24));
			$flag = ($days>=180) ? 1 : 0;
		}
		
		$data = array(
			'flag' => $flag,
			'step' => $step,
			'userid' => $customerid
		);

		$this->load->view('customer/digital-business-loan', ['meta'=>$meta, 'userdetails'=>$data]);
	}

	public function userBusinessApply(){
		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}
		
		$userid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		$data_res = array(
			'userid' => $_REQUEST['userid'],
			'loantype' => $_REQUEST['loantype'],
			'loanamount' => $_REQUEST['loanamount'],
			'cibilscore' => $_REQUEST['cibilscore'],
			'loanpurpose' => $_REQUEST['loanpurpose'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi'],
			'emibounce' => $_REQUEST['emibounce']
		);

		$this->load->model('Customer_Digital_Model');
		$response = $this->Customer_Digital_Model->applyapplication($data_res);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'process_step' => 4
		);
		$response1 = $this->Customer_Digital_Model->updateregistration($userid, $data1);

		$data = array(
			'step' => 's2',
			'flag' => 1,
			'userid' => $userid,
			'applyid' => $response,
			'loanamount' => $_REQUEST['loanamount'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi'],
			'apr' => 11.5
		);

		/* $data3 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'applicationid' => $response,
			'statusid' => 1,
			'staffid' => 1,
			'isDelete' => 0
		);
		$response3 = $this->Customer_Digital_Model->applicationstatus($data3); */

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/digital-business-loan', ['meta'=>$meta, 'userdetails'=>$data]);
	}
	// END : BUSINESS LOAN FUNCTIONS


	public function getpreApproval(){
		$data = array(
			'loantenure' => $_REQUEST['tenure']
		);

		$this->load->model('Customer_Digital_Model');
		$response = $this->Customer_Digital_Model->updateapplication($_REQUEST['applyid'], $data);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		if($response == true) {
			$this->load->view('customer/payment-response', ['meta'=>$meta, 'status'=>'true']);
		}
		else {
			$this->load->view('customer/payment-response', ['meta'=>$meta, 'status'=>'false']);
		}
	}
}
?>