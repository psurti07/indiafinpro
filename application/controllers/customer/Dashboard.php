<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}
	}

	public function index(){
		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$id = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$statestics = $this->Customer_Profile_Model->getallstatestics($id);
		$profiledata = $this->Customer_Profile_Model->getprofile($id);
		$accountmsg = $this->Customer_Profile_Model->getaccountmsg();
		$kycstatus = $this->Customer_Profile_Model->getkycstatus($id);
		$reapplystatus = $this->Customer_Profile_Model->getappreapplystatus($id);

		$this->load->view('customer/dashboard', ['meta'=>$meta, 'statestics'=>$statestics, 'profiledata'=>$profiledata, 'accountmsg'=>$accountmsg, 'kycstatus'=>$kycstatus, 'reapplystatus'=>$reapplystatus]);
	}

	public function license_agreement(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		$contentdetails = $this->Site_Info_Model->getpagedetails('customer-legal-agreement');

		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$id = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');
		$this->load->model('Customer_Profile_Model');
		$profiledata = $this->Customer_Profile_Model->getprofile($id);

		$this->load->view('customer/license-agreement', ['meta'=>$meta, 'contentdetails'=>$contentdetails, 'profiledata'=>$profiledata]);
	}

	public function acceptlicence(){
		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}
		
		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');
		
		if(($customerid == stringCrypt($_REQUEST['customerid'], 'decrypt')) && ($_REQUEST['agree'] == 1)) {
			$data = array(
				'iAgree' => $_REQUEST['agree']
			);

			$this->load->model('Customer_Profile_Model');
			$response = $this->Customer_Profile_Model->updateprofile($data, stringCrypt($_REQUEST['customerid'], 'decrypt'));
		}

		return redirect('customer/dashboard');
		die;
	}

}
?>