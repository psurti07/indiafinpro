<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller {

	public function index() {	
		if($this->session->userdata('mfb-customerid') == TRUE) {
			return redirect('customer/dashboard');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/login', ['meta'=>$meta]);
	}

	//function for check admin login
	public function validateLogin() {
		$mobile = $_REQUEST['mobile'];
		$password = stringCrypt($_REQUEST['password'], 'encrypt');
		
		$this->load->model('Customer_Login_Model');
		$validate = $this->Customer_Login_Model->checklogin($mobile, $password);

		if($validate) {
			$accountdata = $this->Customer_Login_Model->checkaccountvalidity($validate->id);

			if($accountdata) {
				if(strtotime(date('Y-m-d')) <= strtotime($accountdata->expiry_date)) {
					$logged = $this->Customer_Login_Model->loginlog($validate->id);
					$enc_id = stringCrypt($validate->id, 'encrypt');
					$this->session->set_userdata('mfb-customerid',$enc_id);
					$this->session->set_userdata('mfb-customername',$validate->fullname);
					$this->session->set_userdata('mfb-customermobile',$validate->mobile);

					echo json_encode(array("success"=>true, "message"=>"Login successful."));
				}
				else{
				   echo json_encode(array("success"=>false, "message"=>"Your account validity has expired. Kindly contact our customer support."));
				}
			}
			else {
				echo json_encode(array("success"=>false, "message"=>"Your account details not found."));
			}
		} 
		else {
			echo json_encode(array("success"=>false, "message"=>"Invalid mobile no or password."));
		}
	}

	public function forgotpassword() {	
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('customer/forget-password', ['meta'=>$meta]);
	}

	public function sendForgetmessage() {	
		$mobile = $_REQUEST['mobile'];

		$this->load->model('Customer_Login_Model');
		$response = $this->Customer_Login_Model->passwordForgetmsg($mobile);

		if($response) {
			echo json_encode(array("success"=>true, "message"=>"Password sent to registred mobile no."));
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"No customer account found."));
		}
	}

	public function logout() {		
		$customerlogid = $this->session->userdata('mfb-customerlogid');
		$this->load->model('Customer_Login_Model');
		$response = $this->Customer_Login_Model->updatecustomerlog($customerlogid);

		$this->session->unset_userdata('mfb-customerid');
        $this->session->unset_userdata('mfb-customername');
        $this->session->unset_userdata('mfb-customermobile');
		$this->session->sess_destroy();
		
		return redirect('customer/login');
		die;
	}

}
?>