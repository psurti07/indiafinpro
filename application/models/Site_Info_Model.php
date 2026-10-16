<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Info_Model extends CI_Model {

	public function getmetakeywords($slug = ''){
		
		$query = $this->db->where('slug', $slug)
				->get('meta_keywords')
				->row();

				
		return $query;
	}

	public function getproductdetails($slug = ''){
		
		$query = $this->db->where('productslug', $slug)
				->get('products')
				->row();

				
		return $query;
	}

	public function getpagedetails($pagename = ''){
		
		$query = $this->db->where('option_key',$pagename)
				->get('site_options')
				->row();

				
		return $query;      
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

	public function getbanklist($limit = 12){
		
		$query = $this->db->where('isDelete',0)
				->order_by("rand()")
				->limit($limit)
				->get('banks')
				->result();

				
		return $query;      
	}

	public function gettestimoniallist($page = ''){
		
		$query = $this->db->where('reviewpage',$page)
				->where('isDelete',0)
				->order_by("rand()")
				->get('testimonials')
				->result();

				
		return $query;      
	}

	public function getsitefaqs($faqtype = 1){
		
		$query = $this->db->where('faq_type',$faqtype)
				->where('isDelete',0)
				->order_by("id")
				->get('site_faqs')
				->result();

				
		return $query;      
	}

	public function getroipackages($loantype, $preapproval = 0, $limit = 4){
		
		$query = $this->db->select('r.*, b.bank_name, b.bank_image')
				->from('roipackages r')
				->join('banks b','b.id=r.bankid')
				->where('r.loantype', $loantype)
				->where('r.isPreapproval', $preapproval)
				->where('r.isDelete', 0)
				->order_by('rand()')
				->limit($limit)
				->get()
				->result();
		
		return $query;
	}

	public function getdirectlinks($loantype){
		
		$query = $this->db->select('l.id, l.applyurl, b.bank_name, b.bank_image')
				->from('bankapplylink l')
				->join('banks b','b.id=l.bankid')
				->where('l.loantype', $loantype)
				->where('l.isDelete', 0)
				->order_by('rand()')
				->get()
				->result();

				
		return $query;
	}

	public function getwelcomemessage(){
		
		//$where = "id=3 OR id=4";
		$where = "option_key='welcome-status' OR option_key='welcome-message'";
		$query = $this->db->select('option_value')
				->where($where)
				->get('site_options')
				->result();

				
		return $query;      
	}
	
	public function contactsubmission($data){
		
		$this->db->insert('contact_enquiry',$data);
		$id = $this->db->insert_id();

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function subscribenewsletter($data){
		
		$this->db->insert('newsletter_subscribe',$data);
		$id = $this->db->insert_id();

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getopeninglist(){
		$query = $this->db->where('isActive', 1)
				->where('isDelete', 0)
				->order_by('rec_date desc')
				->get('career_opening')
				->result();
				
		return $query;
	}

	public function getjobdetails($slug = ''){
		
		$query = $this->db->where('isActive', 1)
				->where('slug', $slug)
				->where('isDelete', 0)
				->get('career_opening')
				->row();

		return $query;      
	}

	public function isalreadyresume($mobile){
		
		$query = $this->db->select('count(id) as totalid')
				->where('mobile', $mobile)
				->where('isDelete', 0)
				->get('career_enquiry')
				->row();

				
		return $query->totalid;
	}
 
	public function careersubmission($data){
		
		$this->db->insert('career_enquiry',$data);
		$careerid = $this->db->insert_id();

		if($data['mobile'] != '' && $careerid != '') {
			$smsmessage = "Thank You for showing interest in indiafinpro. Our HR team will call you back soon. Have a nice day. Thanks & Regards, indiafinpro";
			$smsresponse = sendtextSMSobb($data['mobile'], $smsmessage);
		}

		if($data['email'] != '' && $careerid != '') {
			// Send email
			$subject1 = "Welcome to indiafinpro";
			$message1 = "<p>Hello ".$data['firstname']." ".$data['lastname'].",</p>"; 
			$message1 .= "<p>We're elated that you showed interest in working with our company. Our HR Team will be in touch soon.</p>";
			$message1 .= "<p>In case you've any queries/doubts, please write to us at hr@indiafinpro.com</p>";
			$message1 .= "<p>Thanks & Regards,<br/>indiafinpro";

			$this->load->model('Site_General_Model');
			$content1 = $this->Site_General_Model->hremailtemplate($message1);

			if($content1 != '') {
				//$mailresponse = sendHTMLmail($data['email'], 'hr@indiafinpro.com', $subject1, $content1, 3);
				$maildata = array(
					'fullname' => $data['mobile'],
					'email' => $data['email']
				);
				$mailresponse = sendinblueHTMLmail($maildata, $subject1, $content1);
			}

			// Send email
			$subject2 = "Career Form Submission";
			$message2 = "<p>Hello,</p>"; 
			$message2 .= "<p>A new Career Form has been submitted through the website. Following are the details:</p>"; 
			$message2 .= "<p>Name : <strong>".$data['firstname']." ".$data['lastname']."</strong></p>";
			$message2 .= "<p>Email Id : <strong>".$data['email']."</strong></p>";
			$message2 .= "<p>Mobile : <strong>".$data['mobile']."</strong></p>";
			$message2 .= "<p>Kindly check the portal for more information.</p>";

			$this->load->model('Site_General_Model');
			$content2 = $this->Site_General_Model->hremailtemplate($message2);

			if($content2 != '') {
				//$mailresponse = sendHTMLmail('hr@indiafinpro.com', $data['email'], $subject2, $content2, 3);
				$maildata = array(
					'fullname' => $data['mobile'],
					'email' => $data['email']
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject1, $content1);
			}
		}

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getimpnoteslist(){
		
		$query = $this->db->where('isActive',1)
				->where('isDelete',0)
				->order_by("rec_date desc")
				->get('important_update')
				->result();

				
		return $query;      
	}

	public function getadvertisementlist($adtype){
		
		$query = $this->db->where('ad_type',$adtype)
					->where('isDelete',0)
					->order_by('id asc')
					->get('adscontent')
					->result();

				
		return $query;
	}
	
	public function checkuserexists($mobile){
		
		$query = $this->db->select('r.id as userid, r.isUser, a.id, r.isDnd, a.loantype')
				->from('user_registration r')
				->join('user_application a','a.userid=r.id')
				->where('r.mobile', $mobile)
				->where('r.isUser', 2)
				->where('a.isDelete', 0)
				->where('r.isDelete', 0)
				->get();

		if($query->num_rows() > 0){
			$response = $query->row();

						
			return $response;
		} 
	}

	public function updatedndstatus($mobile,$reason){
		
		$isPartner = '';
		$query = $this->db->select('r.id as userid, r.isUser, a.id, r.isDnd, a.loantype')
			->from('user_registration r')
			->join('user_application a','a.userid=r.id')
			->where('r.mobile', $mobile)
			->where('r.isUser', 2)
			->where('a.isDelete', 0)
			->where('r.isDelete', 0)
			->get();

		if($query->num_rows() > 0){
			$isPartner = '0';
			$res = $query->row();
		} 
		
		if($mobile!=''){
			$data = [
				'isDnd' => 1
			];

			$tbl = 'user_registration';
			$wheredata = array(
				'mobile' => $mobile
			);
			
			$this->db->where($wheredata)->update($tbl, $data);
			$arr = [
				'user_id' =>  $res->userid,
				'user_type' => (array_key_exists('isPartner',$res)?3:(array_key_exists('loantype',$res)?(($res->loantype==11)?11:12):'')),
				'mobile_no' => $mobile,
				'reason' => $reason
			];
			$this->db->insert('unsubscription_logs',$arr);
	
			return true;
		} else {
						
			return false;
		}
	}
}
?>
