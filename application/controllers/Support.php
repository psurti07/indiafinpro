<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Support extends CI_Controller {
	
	public function index(){
		return redirect('support/request');
	}

	public function request(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('company');
		$faqlist = $this->Site_Info_Model->getsitefaqs(5);
		$this->load->view('raise-request', ['meta'=>$meta, 'faqlist'=>$faqlist]);
	}

	public function submitrequest() {
		$ticketno = date('mdh').random_code(4);

		$this->load->model('Site_Support_Model');
		$activeticket = $this->Site_Support_Model->countactiveticket($_REQUEST['mobile']);

		if($activeticket == 0) {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'ticketno' => $ticketno,
				'usertype' => $_REQUEST['usertype'],
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'emailid' => $_REQUEST['emailid'],
				'cardnumber' => $_REQUEST['cardnumber'],
				'issuetype' => $_REQUEST['issuetype'],
				'message' => $_REQUEST['message'],
				'server_ip' => getUserIpAddr(),
				'status' => 1,
				'isDelete' => 0
			);
			
			$id = $this->Site_Support_Model->addsupportrequest($data);

			if($id > 0) {
				$response2 = $this->Site_Support_Model->sendTicketMessage($ticketno, $_REQUEST['mobile'], $_REQUEST['emailid']); 

				$message = "Your request ticket has been raised in our system with the Ticket Id: ".$ticketno.". We will contact you within 24-48 hours for a follow-up.";

				echo json_encode(array("success"=>true, "message"=>$message));
				die;
			}
			else {
				echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
				die;
			}
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Your Ticket has been already registered in our system, Please contact our customer support team."));
			die;
		}
		
	}

	public function downloadwhitepaper() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'fullname' => $_REQUEST['fullname'],
			'mobile' => $_REQUEST['mobile'],
			'email' => $_REQUEST['email'],
			'profession' => $_REQUEST['profession'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state']
		);

		$this->load->model('Site_Support_Model');
		$id = $this->Site_Support_Model->addwhitepaperrequest($data);

		if($id > 0) {
			$this->load->model('Site_General_Model');
			/*$doc = $this->Site_General_Model->filedownload('docs', 'the-company-white-paper.pdf');*/

			echo json_encode(array("success"=>true, "message"=>"Your request for white-paper is submitted."));
			die;
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
			die;
		}
	}

}
?>