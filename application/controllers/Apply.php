<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Apply extends CI_Controller {
	
	public function index(){
		return redirect()->to('Infopage');
	}

	public function career($slug){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('career');
		$jobdetails = $this->Site_Info_Model->getjobdetails($slug);
		$this->load->view('apply-career',['meta'=>$meta, 'jobdetails'=>$jobdetails]);
	}

	public function careerSubmission(){
		$resume = "";

		$this->load->model('Site_Info_Model');
		$isresume = $this->Site_Info_Model->isalreadyresume($_REQUEST['mobile']);

		if($isresume == 0) {
			if($_FILES['resume']['name'] != '') {
				$this->load->model('Site_General_Model');
				$resume = $this->Site_General_Model->single_file_upload('resume', 'resume', 'doc|docx|xls|xlsx|ppt|pptx|pdf|txt', 0);

				if($resume == false) {
					$resume = "";
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'firstname' => $_REQUEST['firstname'],
				'lastname' => $_REQUEST['lastname'],
				'email' => $_REQUEST['emailid'],
				'mobile' => $_REQUEST['mobile'],
				'applyfor' => $_REQUEST['id'],
				'resume' => $resume,
				'qualifications' => $_REQUEST['qualifications'],
				'experience' => $_REQUEST['experience'],
				'keyskills' => $_REQUEST['keyskills'],
				'city' => $_REQUEST['city'],
				'server_ip' => getUserIpAddr(),
				'isDelete' => 0
			);

			$response = $this->Site_Info_Model->careersubmission($data);

			if($response == true) {
				$message = "We're extremely happy with you showing interest in us! Our HR team will call you shortly. All the best, indiafinproo";
				echo json_encode(array("success"=>true, "message"=>$message));
			} 
			else {
				$message = 'Ops. Something goes wrong.';
				echo json_encode(array("success"=>false, "message"=>$message));
			}
		}
		else {
			$message = '<div class="alert alert-danger" role="alert">Your resume is already submitted in our system, kindly contact to our HR department.</div>';
			echo json_encode(array("success"=>false, "message"=>$message));
		}
	}



}