<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Infopage extends CI_Controller {
	
	public function index(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$banklist = $this->Site_Info_Model->getbanklist(8);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$welcomemsg = $this->Site_Info_Model->getwelcomemessage();
		$productdata = $this->Site_Info_Model->getproductdetails('personal-subscription-plan');
		$this->load->view('index',['meta'=>$meta, 'banklist'=>$banklist, 'testimoniallist'=>$testimoniallist, 'msg'=>$welcomemsg, 'productdata'=>$productdata]);
	}

	public function company(){
		$this->load->model('Site_Info_Model');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$banklist = $this->Site_Info_Model->getbanklist(8);

        $plplan = $this->Site_Info_Model->getproductdetails('personal-subscription-plan');
        $blplan = $this->Site_Info_Model->getproductdetails('business-subscription-plan');

		$meta = $this->Site_Info_Model->getmetakeywords('company');
		$this->load->view('company',['meta'=>$meta, 'banklist'=>$banklist, 'testimoniallist'=>$testimoniallist, 'plplan'=>$plplan, 'blplan'=>$blplan]);
	}

	public function service(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$this->load->view('service',['meta'=>$meta]);
	}

	public function contact(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('contact');
		$this->load->view('contact',['meta'=>$meta]);
	}

	public function career(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('career');
		$openinglist = $this->Site_Info_Model->getopeninglist();
		$this->load->view('career',['meta'=>$meta, 'openinglist'=>$openinglist]);
	}

	public function faqs(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('faqs');
		$pllist = $this->Site_Info_Model->getsitefaqs(1);
		$bllist = $this->Site_Info_Model->getsitefaqs(2);
		$cplist = $this->Site_Info_Model->getsitefaqs(3);
		$sclist = $this->Site_Info_Model->getsitefaqs(4);
		$this->load->view('faqs',['meta'=>$meta, 'pllist'=>$pllist, 'bllist'=>$bllist, 'cplist'=>$cplist, 'sclist'=>$sclist]);
	}

	public function important_update(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$noteslist = $this->Site_Info_Model->getimpnoteslist();
		$this->load->view('important-update',['meta'=>$meta, 'noteslist'=>$noteslist]);
	}

	public function privacy_policy(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('privacy-policy');
		$contentdetails = $this->Site_Info_Model->getpagedetails('privacy-policy');
		$this->load->view('privacy-policy',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function refund_policy(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('refund-policy');
		$contentdetails = $this->Site_Info_Model->getpagedetails('refund-policy');
		$this->load->view('refund-policy',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function disclaimer(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('disclaimer');
		$contentdetails = $this->Site_Info_Model->getpagedetails('disclaimer');
		$this->load->view('disclaimer',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function terms_conditions(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('terms');
		$contentdetails = $this->Site_Info_Model->getpagedetails('terms-conditions');
		$this->load->view('terms-conditions',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function sitemap(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$this->load->view('sitemap',['meta'=>$meta]);
	}

	public function contactsubmission(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'fullname' => $_REQUEST['fullname'],
			'mobile' => $_REQUEST['mobile'],
			'email' => $_REQUEST['email'],
			'subject' => $_REQUEST['subject'],
			'message' => $_REQUEST['message']
		);

		$this->load->model('Site_Info_Model');
		$response = $this->Site_Info_Model->contactsubmission($data);

		if($response == true) {
			$message = 'Contact form successfully submited.';
			echo json_encode(array("success"=>true, "message"=>$message));
		} 
		else {
			$message = 'Ops. Something goes wrong.';
			echo json_encode(array("success"=>false, "message"=>$message));
		}
	}

	public function unsubscribe() {
		$this->load->view('unsubscribe');
	}

    public function unsubscribed() {
		$this->load->view('unsubscribe_response');
	}

	public function sendotpCode(){
		$regdata = array(
			'mobileno' => $_REQUEST['mobileno'],
			'reason' => $_REQUEST['reason']
		);
		
		// first check the number in user table if not present then check into channel partner table
		$this->load->model('Site_Info_Model');
		$user_partner_res = $this->Site_Info_Model->checkuserexists($_REQUEST['mobileno']);
		if($user_partner_res!=NULL && array_key_exists('isDnd',$user_partner_res)){
			if($user_partner_res->isDnd == 1) {
				echo json_encode(array("success"=>false, "message"=>"You are already unsubscribed.", "regdata"=>""));
			} else {
				// check otp count	// 
				$this->load->model('Site_General_Model');
				$countsms = $this->Site_General_Model->countotpentry($_REQUEST['mobileno']);
				if($countsms < 3) {
					$response = $this->Site_General_Model->generateotp($_REQUEST['mobileno'], '', 1);
				} else {
					$response = 0;
				}
				if($response != 0){
					echo json_encode(array("success"=>true, "message"=>"OTP sent to mobile.", "regdata"=>$regdata));
					die;
				}
				else {
					echo json_encode(array("success"=>false, "message"=>"Too much otp send.Try after some time.", "regdata"=>""));
					die;
				}
			}
		} else {
			echo json_encode(array("success"=>false, "message"=>"This mobile number is not registered with us.", "regdata"=>""));
		}
	}
	
	public function checkotpCode(){
		$mobileno = $_REQUEST['mobileno'];
		$reason = $_REQUEST['reason'];
		$otpcode = $_REQUEST['otpcode'];
		
		$this->load->model('Site_General_Model');
		$response = $this->Site_General_Model->checkOTP($mobileno, $otpcode);
		
		if($response == true) {
			$this->load->model('Site_Info_Model');
			$res = $this->Site_Info_Model->updatedndstatus($mobileno,$reason);
			if($res == true){
				echo json_encode(array("success"=>true, "message"=>"You have successfully unsubscribed to get messages from indiafinpro. Thank you", "mobileno"=>$mobileno,'dnd'));
			} else {

				echo json_encode(array("success"=>false, "message"=>"Opps! Something went wrong.", "mobileno"=>""));
			}
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"OTP is invalid.", "mobileno"=>""));
		}
	}

	public function testdata(){
		$maildata = array(
		 'fullname' => 'Bimal patel',
		 'mobile' => '992427751',
		 'email' => 'jankiverloop@gmail.com',
		 'password' => '123456',
		 'order_number' => '101',
		 'order_date' => date('d-m-Y'),
		 'order_amount' => '999.00'
		);

		$subject = "Welcome to indiafinpro";
		
		$this->load->model('Site_General_Model');
		$content = $this->Site_General_Model->customerwelcomeemailtemplate($maildata);

		
		if ($content != '') {
			 $maildata = array(
					'fullname' => $maildata['fullname'],
					'email' => $maildata['email']
				);
				$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			//$mailresponse = sendHTMLmail($maildata['email'], COMPANY_EMAIL, $subject, $content, 1);
		}
	}

}
?>