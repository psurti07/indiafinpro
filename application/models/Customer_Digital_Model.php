<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Customer_Digital_Model extends CI_Model {

	public function getlastrecord($customerid){
		
		$query = $this->db->where('isDelete',0)
					->where('userid',$customerid)
					->order_by('id desc')
					->limit(1)
					->get('user_application')
					->row();

				
		return $query;
	}

	public function applyapplication($data){
		
		$this->db->insert('user_application',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function updateregistration($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('user_registration', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function updateapplication($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('user_application', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function applicationstatus($data){
		
		$this->db->insert('user_application_status',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}
	
	public function sendGreetings($mobile='', $emailid='', $loan){
		if($mobile != '') {
			$message = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Please check your registered email id and login to the Customer Portal to submit the required documents. Thanks, indiafinpro";
			$smsresponse = sendtextSMSobb($mobile, $message);
		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome indiafinpro";
			
			$message = '<p>Dear Customer,</p>';
			$message .= '<p><strong>Congratulations!</strong></p>';
			$message .= '<p>Submission of your loan application is done. Our Customer Executive will be in touch shortly.</p>';
			$message .= '<p>Thanks & Regards,<br/>indiafinpro</p>';

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 1);
				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}

		}

		return true;
	}

}
?>
