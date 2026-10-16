<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Loan_Enquiry_Model extends CI_Model {

	public function getenquirylist($dt_to, $dt_from){
		
		$query = $this->db->select('e.*, l.loanname')
				->from('enquiry e')
				->join('loanlist l','l.id=e.loantype')
				->where('e.rec_date >=', $dt_to.' 00:00:00')
				->where('e.rec_date <=', $dt_from.' 23:59:59')
				->where('e.isDelete', 0)
				->order_by('e.rec_date asc')
				->get()
				->result();

				
		return $query;      
	}

	public function getenquiryloan($loan, $dt_to, $dt_from){
		
		$query = $this->db->where('loantype', $loan)
				->where('rec_date >=', $dt_to.' 00:00:00')
				->where('rec_date <=', $dt_from.' 23:59:59')
				->where('isDelete', 0)
				->order_by('rec_date asc')
				->get('enquiry')
				->result();

				
		return $query;      
	}

	public function deleteenquiry($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('enquiry', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getloanapplicationlist($status, $dt_to, $dt_from){
		
		$query = $this->db->select('a.id, a.rec_date, a.loantype, a.loanamount, a.loantenure, a.userid, r.fullname, r.mobile')
					->from('user_registration r')
					->join('user_application a', 'a.userid=r.id')
					->where('a.rec_date >=', $dt_to.' 00:00:00')
					->where('a.rec_date <=', $dt_from.' 23:59:59')
					->where('a.status',$status)
					->where('a.isDelete',0)
					->where('r.isUser',2)
					->where('r.isDelete',0)
					->order_by('a.rec_date asc')
					->get()
					->result();

				
		return $query;
	}

	public function getloanreapplyapplist($status, $dt_to, $dt_from){
		
		$query = $this->db->select('a.id, a.rec_date, a.loantype, a.loanamount, a.loantenure, a.userid, r.fullname, r.mobile')
					->from('user_registration r')
					->join('user_application a', 'a.userid=r.id')
					->where('a.userid in (SELECT userid FROM user_application GROUP BY userid HAVING COUNT(*) > 1)')
					->where('a.rec_date >=', $dt_to.' 00:00:00')
					->where('a.rec_date <=', $dt_from.' 23:59:59')
					->where('a.status',$status)
					->where('a.isDelete',0)
					->where('r.isUser',2)
					->where('r.isDelete',0)
					->order_by('a.rec_date asc')
					->get()
					->result();

				
		return $query;
	}

	public function getoldapplicationlist($status, $days){
		
		$query = $this->db->select('a.id, a.rec_date, a.loantype, a.loanamount, a.loantenure, a.userid, r.fullname, r.mobile')
					->from('user_registration r')
					->join('user_application a', 'a.userid=r.id')
					->where("a.rec_date < NOW() - INTERVAL ".$days." DAY")
					->where('a.status',$status)
					->where('a.isDelete',0)
					->where('r.isUser',2)
					->where('r.isDelete',0)
					->order_by('a.rec_date asc')
					->get()
					->result();

				
		return $query;
	}

	public function getapplicationdetails($id){
		
		$query = $this->db->select('a.*, r.id as userid, r.fullname, r.mobile, r.email')
					->from('user_application a')
					->join('user_registration r', 'a.userid=r.id')
					->where('a.isDelete',0)
					->where('a.id',$id)
					->get()
					->row();

				
		return $query;
	}

	public function getappstatuslist($id){
		
		$query = $this->db->select('s.*, b.bank_name, l.statusname, l.colorclass, a.fullname')
					->from('user_application_status s')
					->join('banks b', 's.bankid=b.id')
					->join('loanstatus l', 's.statusid=l.id')
					->join('administration a', 's.staffid=a.id', 'left')
					->where('s.isDelete',0)
					->where('s.applicationid',$id)
					->order_by('s.statusdate desc')
					->get()
					->result();

				
		return $query;
	}

	public function manageapplicationstatus($status, $id){
		
		$data = array(
	   		'status' => $status,
		);

		$query = $this->db->where('id', $id)
					->update('user_application', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function addapplicationstatus($data){
		
		$this->db->insert('user_application_status',$data);
		$id = $this->db->insert_id();

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function deleteappstatus($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('user_application_status', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}


	public function sendStatusMessage($remarks='', $mobile='', $emailid=''){
		if($mobile != '') {
			$smsmessage = "Dear Customer, the latest update of your loan file is displayed on your customer portal & sent to your email id. Check here https://indiafinpro.com/customer";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage);
		}

		if($emailid != '') {
			$userdata = array(
				'email' => $emailid,
				'name' => $emailid
			);

			$subject = "Loan application status update - indiafinpro";
			$message = '<p>'.$remarks.'</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if($content != '') {
				//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 2);
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
