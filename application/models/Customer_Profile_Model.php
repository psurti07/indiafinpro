<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Customer_Profile_Model extends CI_Model {

	public function getallstatestics($id){
		
		$statestics_res = [];

		$query1 = $this->db->where('userid',$id)
				->where('loantype',11)
				->where('isDelete',0)
				->get('user_application');
		$statestics_res['personalloan'] = $query1->num_rows(); 

		$query2 = $this->db->where('userid',$id)
				->where('loantype',12)
				->where('isDelete',0)
				->get('user_application');
		$statestics_res['businessloan'] = $query2->num_rows();  

		$query3 = $this->db->from('user_tree t')
				->join('user_registration r','r.id=t.subuserid')
				->where('t.refferaltype',1)
				->where('t.refferaluserid',$id)
				->where('r.isUser',2)
				->where('r.isActive',1)
				->where('r.isDelete',0)
				->get();
		$statestics_res['referalusers'] = $query3->num_rows();

				
		return $statestics_res;
	}

	public function getprofile($customerid){
		
		$account = $this->db->select('id, rec_date, fullname, mobile, email, city, state, usertype, cardtype, refcode')
					->where('id',$customerid)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->get('user_registration')
					->row();

				
		return $account;
	}

	public function getlicensestatus($customerid){
		
		$query = $this->db->select('iAgree')
						->where('id',$customerid)
						->get('user_registration')
						->row();

				
		if($query) {
			return $query->iAgree;
		}
		else {
			return 0;
		}
	}

	public function getappreapplystatus($customerid){
		
		$wheredate = "CAST(rec_date as DATE) <= DATE_ADD(CURDATE(),INTERVAL -90 DAY)";
		$wherestatus = "(status=2 or status=3)";

		$query = $this->db->where('userid',$customerid)
					->where($wheredate)
					->where($wherestatus)
					->where('isDelete',0)
					->order_by('rec_date desc')
					->limit(1)
					->get('user_application')
					->row();

				
		if($query) {
			return dateDiffInDays($query->rec_date, date('Y-n-d'));
		}
		else {
			return 0;
		}
	}

	public function getkycstatus($customerid){
		
		$query = $this->db->select('isVerified')
						->where('userid',$customerid)
						->get('user_documents')
						->row();

				
		if($query) {
			return $query->isVerified;
		}
		else {
			return 0;
		}
	}

	public function checkdocuments($customerid){
		
		$query = $this->db->where('userid',$customerid)
				->get('user_documents')
				->num_rows();

				
		return $query;
	}

	public function createdocaccount($data){
		
		$this->db->insert('user_documents',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function updatedocaccount($id, $data){
		
		$query = $this->db->where('userid', $id)
					->update('user_documents', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function documentremarks($id, $data){
		
		$query = $this->db->where('userid', $id)
					->update('user_documents', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getdocumentflag($customerid){
		
		$docflags = array(
			'profilephoto' => 0,
			'aadharcard' => 0,
			'aadharcard_number' => '',
			'pancard' => 0,
			'pancard_number' => '',
			'cancelcheque' => 0,
			'lightbill' => 0,
			'bankstatement' => 0,
			'formsixteen' => 0,
			'salaryslip' => 0,
			'businessproof' => 0,
			'itreturn' => 0,
			'isVerified' => 0,
			'remarks' => ''
		);

		$query = $this->db->where('userid',$customerid)
						->get('user_documents')
						->row();

		if($query) {
			$docflags['profilephoto'] = ($query->profilephoto != NULL) ? 1 : 0;
			$docflags['aadharcard'] = ($query->aadharcard != NULL) ? 1 : 0;
			$docflags['aadharcard_number'] = ($query->aadharcard_number != NULL) ? $query->aadharcard_number : '';
			$docflags['pancard'] = ($query->pancard != NULL) ? 1 : 0;
			$docflags['pancard_number'] = ($query->pancard_number != NULL) ? $query->pancard_number : '';
			$docflags['cancelcheque'] = ($query->cancelcheque != NULL) ? 1 : 0;
			$docflags['lightbill'] = ($query->lightbill != NULL) ? 1 : 0;
			$docflags['bankstatement'] = ($query->bankstatement != NULL) ? 1 : 0;
			$docflags['formsixteen'] = ($query->formsixteen != NULL) ? 1 : 0;
			$docflags['salaryslip'] = ($query->salaryslip != NULL) ? 1 : 0;
			$docflags['businessproof'] = ($query->businessproof != NULL) ? 1 : 0;
			$docflags['itreturn'] = ($query->itreturn != NULL) ? 1 : 0;
			$docflags['isVerified'] = $query->isVerified;
			$docflags['remarks'] = $query->remarks;
		}

				
		return $docflags;    
	}

	public function checkpayoutdocuments($customerid){
		
		$query = $this->db->where('userid',$customerid)
						->get('user_payout_documents')
						->num_rows();

				
		return $query;
	}

	public function createpayoutdocaccount($data){
		
		$this->db->insert('user_payout_documents',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function updatepayoutdocaccount($id, $data){
		
		$query = $this->db->where('userid', $id)
					->update('user_payout_documents', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function payoutdocumentremarks($id, $data){
		
		$query = $this->db->where('userid', $id)
					->update('user_payout_documents', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getpayoutdocumentflag($customerid){
		
		$docflags = array(
			'gstdoc' => 0,
			'gstdoc_number' => '',
			'aadharcard' => 0,
			'aadharcard_number' => '',
			'pancard' => 0,
			'pancard_number' => '',
			'cancelcheque' => 0,
			'isVerified' => 0,
			'remarks' => ''
		);

		$query = $this->db->where('userid',$customerid)
						->get('user_payout_documents')
						->row();

		if($query) {
			$docflags['gstdoc'] = ($query->gstdoc != NULL) ? 1 : 0;
			$docflags['gstdoc_number'] = ($query->gstdoc_number != NULL) ? $query->gstdoc_number : '';
			$docflags['aadharcard'] = ($query->aadharcard != NULL) ? 1 : 0;
			$docflags['aadharcard_number'] = ($query->aadharcard_number != NULL) ? $query->aadharcard_number : '';
			$docflags['pancard'] = ($query->pancard != NULL) ? 1 : 0;
			$docflags['pancard_number'] = ($query->pancard_number != NULL) ? $query->pancard_number : '';
			$docflags['cancelcheque'] = ($query->cancelcheque != NULL) ? 1 : 0;
			$docflags['isVerified'] = $query->isVerified;
			$docflags['remarks'] = $query->remarks;
		}

				
		return $docflags;    
	}

	public function getsubscriptionplan($customerid){
		$query = $this->db->select('r.fullname, r.mobile, r.email, r.cardtype, m.id, m.registration_date, m.expiry_date, m.card_number')
					->from('subscription_order m')
					->join('user_registration r','r.id = m.userid')
					->where('r.id',$customerid)
					->where('m.isActive',1)
					->where('m.isDelete',0)
					->get()
					->row();
		return $query;
	}

	public function getinvoicedetails($id){
		
		$details = array();

		$queryref = $this->db->where('id',$id)
					->get('subscription_order')
					->row();
		$details['orderinfo'] = $queryref;  

		$queryuser = $this->db->where('id',$details['orderinfo']->userid)
					->get('user_registration')
					->row();
		$details['userinfo'] = $queryuser;   

		$where = "(inv_for=1 or inv_for=2)";
		$queryinv = $this->db->where('userid',$details['orderinfo']->userid)
					->where('cardid',$id)
					->where($where)
					->get('invoice')
					->row();
		$details['invoiceinfo'] = $queryinv;

				
		return $details;    
	}

	public function updateprofile($data, $customerid){
		
		$query = $this->db->where('id', $customerid)
					->update('user_registration', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function changepassword($enc_password, $customerid){
		
		$data = array(
		   'update_date' => date('Y-m-d H:i:s'),
		   'password' => $enc_password
		 );
		
		$query = $this->db->where('id', $customerid)
					->update('user_registration', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getaccountmsg(){
		
		$query = $this->db->where('option_key','account-msg-customer')
					->get('site_options')
					->row();

				
		return $query;
	}
}
?>
