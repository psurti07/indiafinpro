<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Support_Model extends CI_Model {

	public function getsupportrequestlist($dt_to, $dt_from){
		
		$query = $this->db->select('id, rec_date, ticketno, usertype, fullname, mobile, emailid, status')
				->where('rec_date >=', $dt_to.' 00:00:00')
				->where('rec_date <=', $dt_from.' 23:59:59')
				->where('isDelete', 0)
				->order_by('rec_date asc')
				->get('support_request')
				->result();

				
		return $query;      
	}

	public function getsupportrequestdetails($id){
		
		$query = $this->db->where('id',$id)
					->get('support_request')
					->row();

				
		return $query;    
	}

	public function getsupportstaffreply($id){
		
		$query = $this->db->select('c.*, a.fullname')
					->from('support_request_chat c')
					->join('administration a','a.id=c.staffid')
					->where('c.requestid',$id)
					->where('c.isDelete', 0)
					->get()
					->result();

				
		return $query;    
	}

	public function changeticketstatus($statusid, $id){
		
		$data = array(
		   'status' => $statusid
		);
		$query = $this->db->where('id', $id)
					->update('support_request', $data);
					
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		
		return $flag;
	}

	public function addrequeststaffmsg($data){
		
		$this->db->insert('support_request_chat',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function getcontactenqlist($dt_to, $dt_from){
		
		$query = $this->db->where('rec_date >=', $dt_to.' 00:00:00')
				->where('rec_date <=', $dt_from.' 23:59:59')
				->order_by('rec_date asc')
				->get('contact_enquiry')
				->result();

				
		return $query;      
	}

	public function deletecontactenq($id){
		
		$query = $this->db->where('id', $id)
					->delete('contact_enquiry');
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		
		return $flag;
	}
	
	public function sendTicketMessage($remarks='', $ticketno='', $emailid=''){
		if($emailid != '') {
			$subject = "Update regarding your ticket id: ".$ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<h3>We have an update regarding your ticket id: '.$ticketno.'</h3>';
			$message .= '<p>'.$remarks.'</p>';
			$message .= '<p>Thanks,<br/>indiafinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 2);
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketOpenMessage($ticketno='', $emailid='', $mobile=''){
		if($mobile != '') {
			$message = "Your request ticket has been raised in our system with the Ticket Id: ".$ticketno." We will contact you within 24-48 hours for a follow-up. indiafinpro";
			$smsresponse = sendtextSMSobb($mobile, $message);
		}
		
		if($emailid != '') {
			$subject = "Your Request has been raised and is Open with Ticket Id: ".$ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>Your request ticket is raised in our system & Ticket Id is '.$ticketno.'. We will contact you within 24-48 hours to discuss further.</p>';
			$message .= '<p>Regards,<br/>indiafinproo</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 2);
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketProcessMessage($ticketno='', $emailid='', $mobile=''){
		if($mobile != '') {
			$message = "Hello, Your request with Ticket ID: ".$ticketno." is under process. The query will be solved soon and it will be informed to you shortly. Thanks, indiafinpro";
			$smsresponse = sendtextSMSobb($mobile, $message);
		}
		
		if($emailid != '') {
			$subject = "Your Request is Under Process With Ticket Id: ".$ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>Your request with Ticket ID: '.$ticketno.' is under process. The query will be solved soon and it will be informed to you shortly.</p>';
			$message .= '<p>Thanks,<br/>indiafinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 2);
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketClosedMessage($ticketno='', $emailid='', $mobile=''){
		if($mobile != '') {
			$message = "Hello, Your request with Ticket Id: ".$ticketno." is closed as the company tried calling you for the last 3 days but got no response. Thanks, indiafinpro";
			$smsresponse = sendtextSMSobb($mobile, $message, 'main');
		}
		
		if($emailid != '') {
			$subject = "Your Request with Ticket Id: ".$ticketno." is Closed due to No Response";

			$message = '<p>Hello,</p>';
			$message .= '<p>This is to inform you that your request with Ticket Id: '.$ticketno.' is Closed as the company is calling you regarding your query for the last 3 times but there has been no response/no proper communication from your end.</p>';
			$message .= '<p>In case you have further queries, kindly raise a new request.</p>';
			$message .= '<p>Thanks,<br/>indiafinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 2);
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketResolvedMessage($ticketno='', $emailid='', $mobile=''){
		if($mobile != '') {
			$message = "Hello, Your request with Ticket Id: ".$ticketno." is Solved. We thank you for the opportunity to serve you. Thanks, indiafinpro";
			$smsresponse = sendtextSMSobb($mobile, $message, 'main');
		}
		
		if($emailid != '') {
			// Send email
			$subject = "Your Request with Ticket Id: ".$ticketno." is Solved";

			$message = '<p>Hello,</p>';
			$message .= '<p>Your request with Ticket Id: '.$ticketno.' is Solved. We thank you for the opportunity to serve you.</p>';
			$message .= '<p>Thanks,<br/>indiafinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 2);
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}
	
}

?>
