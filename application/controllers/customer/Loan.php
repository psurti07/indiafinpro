<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Loan extends CI_Controller {

	public function index() {	
		if($this->session->userdata('mfb-customerid') == TRUE) {
			return redirect()->to('customer/dashboard');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/login', ['meta'=>$meta]);
	}

	public function history(){
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

		$this->load->model('Customer_Loan_Model');
		$loanhistory = $this->Customer_Loan_Model->getloanhistory($id);
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/loan-history',['meta'=>$meta, 'loanhistory'=>$loanhistory]);
	}

	public function appdetails($id){
		$id = stringCrypt($id, 'decrypt');
		$this->load->model('Customer_Loan_Model');
		$appdetails = $this->Customer_Loan_Model->getapplicationdetails($id);
		$statuslist = $this->Customer_Loan_Model->getappstatuslist($id);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('customer/loan-details',['meta'=>$meta, 'appdetails'=>$appdetails, 'statuslist'=>$statuslist]);
	}

	public function downloadfile($sanctionletter, $id) {
		$this->load->model('Site_General_Model');
		$sanction_letter = $this->Site_General_Model->filedownload('images/sanctionletter', $sanctionletter);

		return redirect('customer/loan/appdetails/'.$id);
		die;
	}

	public function reapplypersonal(){
		if($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}
		
		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');
		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$directlinks = $this->Site_Info_Model->getdirectlinks(11);

		$this->load->view('customer/reapply-personal-loan', ['meta'=>$meta, 'directlinks'=>$directlinks]);
	}

	public function reapplybusiness() {
		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');
		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$directlinks = $this->Site_Info_Model->getdirectlinks(12);

		$this->load->view('customer/reapply-business-loan', ['meta' => $meta, 'directlinks' => $directlinks]);
	}

}
?>