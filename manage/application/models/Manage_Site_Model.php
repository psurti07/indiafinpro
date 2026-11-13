<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Site_Model extends CI_Model {

	public function getnewsletterlist(){
		
		$query = $this->db->where('isDelete',0)
					->order_by('id asc')
					->get('newsletter_subscribe')
					->result();

				
		return $query;
	}

	public function getemailtemplates(){
		
		$query = $this->db->order_by('rec_date desc')
				->get('email_list')
				->result();

				
		return $query;
	}

	public function getunsubscribeduserlist(){
		
		$query = $this->db->select('ul.id,
					(CASE WHEN ul.user_type = 1 THEN "Personal Loan" 
		 			WHEN ul.user_type = 2 THEN "Business Loan" 
		 			ELSE ul.user_type END) AS usertype,(CASE WHEN ul.user_type in (1,2) THEN ur.fullname 
		 			WHEN ul.user_type = 3 THEN CONCAT(cp.firstname," ",cp.lastname) 
		 			ELSE ur.fullname END) AS fullname,(CASE WHEN ul.user_type IN (1,2) THEN ur.mobile 
		 			WHEN ul.user_type = 3 THEN cp.mobileno 
		 			ELSE ur.mobile END) AS mobile,(CASE WHEN ul.user_type IN (1,2) THEN ur.email 
		 			WHEN ul.user_type = 3 THEN cp.emailid 
		 			ELSE ur.email END) AS email,(CASE WHEN ul.user_type IN (1,2) THEN ur.city 
		 			WHEN ul.user_type = 3 THEN cp.city 
		 			ELSE ur.city END) AS city,(CASE WHEN ul.user_type IN (1,2) THEN ur.state 
		 			WHEN ul.user_type = 3 THEN cp.state 
		 			ELSE ur.state END) AS state
					,ul.reason')
				->join('user_registration  ur','ur.id=ul.user_id','left')
				->join('channel_partner  cp','cp.id=ul.user_id','left')
				->order_by('ul.rec_date desc')
				->get('unsubscription_logs ul')
				->result();

			$this->db->close();
			$this->db->initialize();
			
		return $query;
	}

	public function changesubscription($statusid, $id){
		
		if($statusid == 1) {
			$data = array(
			   'isActive' => 0,
			   'rec_date' => date('Y-m-d H:i:s')
			);
		}
		else {
			$data = array(
			   'isActive' => 1,
			   'rec_date' => date('Y-m-d H:i:s')
			);
		}

		$query = $this->db->where('id', $id)
					->update('newsletter_subscribe', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function deletesubscription($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query_reg = $this->db->where('id', $id)
						->update('newsletter_subscribe', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getpagedetails($pagename){
		
		$query = $this->db->where('option_key',$pagename)
				->get('site_options')
				->row();

				
		return $query;      
	}
	
	public function editpage($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('site_options', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getadvertisementlist($adtype){
		
		$query = $this->db->where('ad_type',$adtype)
					->where('isDelete',0)
					->order_by('id asc')
					->get('adscontent')
					->result();

				
		return $query;
	}

	public function addadvertisement($data){
		
		$this->db->insert('adscontent',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function deleteadvertisement($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('adscontent', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag; 
	}

	public function getsitesettings(){
		
		$settings = [];

		$query1 = $this->db->where('option_key', 'welcome-status')
					->get('site_options');
		$settings['welcomemodel'] = $query1->row(); 

		$query2 = $this->db->where('option_key', 'facebookpixel')
					->get('site_options');
		$settings['fbpixelvalue'] = $query2->row();

		$query3 = $this->db->where('option_key', 'facebookdomain')
					->get('site_options');
		$settings['fbdomainvalue'] = $query3->row();

		$query4 = $this->db->where('option_key', 'smssenderid')
					->get('site_options');
		$settings['smssenderid'] = $query4->row();

		$query5 = $this->db->where('option_key', 'fbaccesstokendigital')
				  ->get('site_options');
		$settings['fbaccesstokendigital'] = $query5->row();

		$query6 = $this->db->where('option_key', 'fbeventnamedigital')
			->get('site_options');
		$settings['fbeventnamedigital'] = $query6->row();

		$query7 = $this->db->where('option_key', 'fbeventiddigital')
			->get('site_options');
		$settings['fbeventiddigital'] = $query7->row();

		$query8 = $this->db->where('option_key', 'fbaccesstokenpartner')
			->get('site_options');
		$settings['fbaccesstokenpartner'] = $query8->row();

		$query9 = $this->db->where('option_key', 'fbeventnamepartner')
		 ->get('site_options');
		$settings['fbeventnamepartner'] = $query9->row();

		$query10 = $this->db->where('option_key', 'fbeventidpartner')
		 ->get('site_options');
		$settings['fbeventidpartner'] = $query10->row();

		$query11 = $this->db->where('option_key', 'wpcampaignmain')
			->get('site_options');
		$settings['wpcampaignmain'] = $query11->row();

		$query12 = $this->db->where('option_key', 'wpcampaignoffer')
			->get('site_options');
		$settings['wpcampaignoffer'] = $query12->row();

		$query13 = $this->db->where('option_key', 'wpcampaignsuccess')
			->get('site_options');
		$settings['wpcampaignsuccess'] = $query13->row();

		$query14 = $this->db->where('option_key', 'intekt_get_offer_name')
		->get('site_options');
		$settings['intekt_get_offer_name'] = $query14->row();

		$query15 = $this->db->where('option_key', 'intekt_rm_offer_name')
			->get('site_options');
		$settings['intekt_rm_offer_name'] = $query15->row();

		$query16 = $this->db->where('option_key', 'intkt_userwelcomename')
		->get('site_options');
		$settings['intkt_userwelcomename'] = $query16->row();

		$query17 = $this->db->where('option_key', 'intkt_payment_success')
		->get('site_options');
		$settings['intkt_payment_success'] = $query17->row();

				
		return $settings;
	}

	public function updatemodelstatus($value){
		
		$option_value = ($value == 1) ? 0 : 1;

		$data = array(
		   'rec_date' => date('Y-m-d H:i:s'),
		   'option_value' => $option_value
		);
		$query = $this->db->where('option_key', 'welcome-status')
					->update('site_options', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function updatefacebookdata($data, $key) {
		
		$sql_query = $this->db->where('option_key', $key)
            ->update('site_options', $data);

				
		return $sql_query;
    }

	public function updatesitesettingdata($data, $key){
		
		$query = $this->db->where('option_key', $key)
					->update('site_options', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function searchcustomer($mobile){
		
		$query = $this->db->where('isDelete', 0)
				->like('mobile',$mobile)
				->get('user_registration')
				->row();

				
		return $query;      
	}
	public function getapplicationid($id){
		$query = $this->db->select('a.*, r.id as userid, r.fullname, r.mobile, r.email')
					->from('user_application a')
					->join('user_registration r', 'a.userid=r.id')
					->where('a.isDelete',0)
					->where('a.userid',$id)
					->get()
					->row();
		return $query;
	}

	public function searchcareer($mobile){
		
		$query = $this->db->like('mobile',$mobile)
				->get('career_enquiry')
				->row();

				
		return $query;      
	}

	public function searchbulksms($mobile){
		
		$query = $this->db->like('mobileno',$mobile)
				->get('bulksms')
				->row();

				
		return $query;      
	}

	public function getimpupdatelist(){
		
		$query = $this->db->where('isDelete',0)
					->order_by('id asc')
					->get('important_update')
					->result();

				
		return $query;
	}

	public function addimpupdate($data){
		
		$this->db->insert('important_update',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function impupdatestatus($statusid, $id){
		
		if($statusid == 1) {
			$data = array(
			   'isActive' => 0
			);
		}
		else {
			$data = array(
			   'isActive' => 1
			);
		}
		$query = $this->db->where('id', $id)
					->update('important_update', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function deleteimpupdate($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('important_update', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getaccountmsg(){
		
		$msgs = [];

		$query1 = $this->db->where('option_key', 'account-msg-customer')
					->get('site_options');
		$msgs['customermsg'] = $query1->row(); 
				
		return $msgs;
	}

	public function editaccountmsg($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('site_options', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getsmsmessage($smskey = ''){
		
		$query = $this->db->where('option_key',$smskey)
				->get('site_options')
				->row();

				
		return $query->option_value;      
	}

	public function getinvoiceno(){
		
		$query = $this->db->select('option_value')
				->where('option_key', 'newinvoiceno')
				->get('site_options')
				->row();

				
		return $query->option_value;      
	}

	public function getstatuslist(){
		
		$query = $this->db->order_by('priorityno asc')
				->get('loanstatus')
				->result();

				
		return $query;      
	}

	public function getfileremarkslist(){
		
		$query = $this->db->select('r.*, s.statusname')
					->from('loanstatus_remarks r')
					->join('loanstatus s','s.id=r.statusid')
					->order_by('r.id asc')
					->get()
					->result();

				
		return $query;
	}

	public function getremarkdetails($id){
		
		$query = $this->db->where('id',$id)
				->get('loanstatus_remarks')
				->row();

				
		return $query;
	}

	public function addfileremark($data){
		
		$this->db->insert('loanstatus_remarks',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function editfileremark($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('loanstatus_remarks', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function deleteremark($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('loanstatus_remarks', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function restoreremark($id){
		
		$data = array(
		   'isDelete' => 0
		);
		$query = $this->db->where('id', $id)
					->update('loanstatus_remarks', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function userverification(){
		
		$from = 1;
		$to = 10000;

		$where = "(a.status=2 or a.status=3)";
		$userslist = $this->db->select('d.id, d.profilephoto, d.aadharcard, d.pancard')
				->from('user_documents d')
				->join('user_application a','a.userid=d.userid', 'LEFT')
				->where('d.isVerified',0)
				->where($where)
				->where('d.id >=',$from)
				->where('d.id <=',$to)
				->order_by('d.id asc')
				->group_by('d.id')
				->get()
				->result();
	
		foreach ($userslist as $row) {
			if($row->profilephoto != '' && $row->aadharcard != '' && $row->pancard != '') {
				$data2 = array(
				   'isVerified' => 1
				);
				$query2 = $this->db->where('id', $row->id)
						->update('user_documents', $data2);

				echo $row->id."<br/>";
			}
		}

					}

	/*public function datasolvefunction(){
		$userlist = $this->db->select('id, rec_date')
				->where('id >=', 10000)
				->where('id <=', 30000)
				->order_by('id asc')
				->get('user_registration')
				->result();
		
		foreach ($userlist as $row) {
			$data = array(
				'update_date' => $row->rec_date
			);
			
			$query = $this->db->where('id', $row->id)
					->update('user_registration', $data); 
			
			echo $row->id;
			echo "<br/>";
		}
	}*/

	public function datasolvefunction() {
		
		$userlist = $this->db->select('a.id, a.rec_date, a.userid, a.status, r.process_step')
				->from('user_application a')
				->join('user_registration r','r.id=a.userid', 'LEFT')
				->where('r.isUser >=', 2)
				->where('a.rec_date >=', '2022-04-01 00:00:00')
				->where('a.rec_date <=', '2022-05-31 23:59:59')
				->order_by('a.id asc')
				->get()
				->result();
		
		foreach ($userlist as $row) {
			$processstep = 4;

			switch ($row->status) {
				case '1':
					$doclist = $this->db->select('id, rec_date, userid, isVerified')
								->where('userid', $row->userid)
								->get('user_documents')
								->row();
                    
					if($doclist) {
						if($doclist->isVerified == 0) {
							$processstep = 4;
						} else {
							$processstep = 6;
						}
					}
					else {
						$processstep = 4;
					}
					break;
				
				case '2':
					$processstep = 11;
					break;

				case '3':
					$processstep = 10;
					break;

				case '4':
					$processstep = 8;
					break;

				case '5':
					$processstep = 5;
					break;

				default:
					$processstep = 4;
					break;
			}

			$data = array(
				'update_date' => date('Y-m-d H:i:s', strtotime($row->rec_date)),
				'process_step' => $processstep
			);
	        
			$query = $this->db->where('id', $row->userid)
					->update('user_registration', $data); 

			echo $row->id." - ".$row->userid." - ".$processstep."<br/>";	
		}

			}

	public function getstaffmemberlist(){
		
		$query = $this->db->where('isDelete',0)
				->order_by('id desc')
				->get('administration')
				->result();

				
		return $query;      
	}

	public function addstaffmember($data){
		
		$this->db->insert('administration',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}
	  public function getStaffByEmail($email) {
        $this->db->where('emailid', $email);
        $this->db->where('isDelete', 0); // optional if using soft deletes
        $query = $this->db->get('administration'); // Replace 'staff' with your actual table name
    
        if ($query && $query->num_rows() > 0) {
            return $query->row();
        }
    
        return null;
    }

	public function deletestaffaccount($id){
		
		$data = array(
		   'isActive' => 0,
		   'isDelete' => 1
		);
		$query_reg = $this->db->where('id', $id)
						->update('administration', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

}
?>
