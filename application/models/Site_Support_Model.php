<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Support_Model extends CI_Model {

	public function countactiveticket($mobile){
		
		$query = $this->db->select('count(id) as totalid')
				->where('mobile', $mobile)
				->where('status', 1)
				->where('isDelete', 0)
				->get('support_request')
				->row();

		
		return $query->totalid;
	}

	public function addwhitepaperrequest($data){
		
		$this->db->insert('whitepaper_request',$data);
		$id = $this->db->insert_id();

		
		return $id;
	}

	public function addsupportrequest($data){
		
		$this->db->insert('support_request',$data);
		$id = $this->db->insert_id();

		
		return $id;
	}

	public function sendTicketMessage($ticketno='', $mobile='', $emailid=''){
		if($mobile != '') {
			$smsmessage = "Your request ticket has been raised in our system with the Ticket Id: ".$ticketno." We will contact you within 24-48 hours for a follow-up. indiafinpro";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage);
		}

		if($emailid != '') {
			// Send email
			$subject = "Your Request has been raised and is Open with Ticket Id: ".$ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>Your request ticket has been raised in our system with the Ticket Id: '.$ticketno.'– which is OPEN. We will contact you within 24-48 hours to discuss further.</p>';
			$message .= '<p>Thanks & Regards,<br/>Support Team,<br/>indiafinpro</p>';

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 2);
				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

}
?>
