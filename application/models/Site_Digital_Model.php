<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Digital_Model extends CI_Model {

	public function checkuser($mobile){
		
		$query = $this->db->select('r.id as userid, r.isUser, r.process_step, a.id')
				->from('user_registration r')
				->join('user_application a','a.userid=r.id')
				->where('r.mobile', $mobile)
				->where('r.isUser !=', 0)
				->where('a.isDelete', 0)
				->where('r.isDelete', 0)
				->get()
				->row();

				
		return $query; 
	}

	public function checkexistinguser($mobile){
		
		$query = $this->db->where('mobile', $mobile)
				->where('isUser', 2)
				->where('isDelete', 0)
				->get('user_registration')
				->row();

				
		return $query; 
	}

	public function checkuserregdata($id){
		
		$query = $this->db->select('r.id as userid, r.fullname, r.mobile, r.email, r.city, r.state, r.isUser, r.cardtype, r.process_step, a.id, a.loantype, a.loanamount, a.income, a.currentemi')
				->from('user_application a')
				->join('user_registration r','r.id=a.userid')
				->where('r.id', $id)
				->where('r.isDelete', 0)
				->get()
				->row();

				
		return $query; 
	}

	public function checkuserdata($id){
		
		$query = $this->db->select('r.id as userid, r.rec_date, r.fullname, r.mobile, r.email, r.city, r.state, r.isUser, r.cardtype, r.process_step, a.id, a.loantype, a.loanamount, a.income, a.currentemi')
				->from('user_application a')
				->join('user_registration r','r.id=a.userid')
				->where('a.id', $id)
				->where('r.isDelete', 0)
				->get()
				->row();

				
		return $query; 
	}

	public function userorderdata($id){
		
		$query = $this->db->where('userid', $id)
				->where('isDelete', 0)
				->order_by('id desc')
				->get('subscription_order')
				->row();

				
		return $query; 
	}

	public function userregistration($data){
		
		$this->db->insert('user_registration',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function userapplication($data){
		
		$this->db->insert('user_application',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function updateregistration($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('user_registration', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

				
		return $flag;
	}

	public function updateapplication($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('user_application', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function sendProcessMessage($loantype='', $mobile='', $emailid=''){
		switch ($loantype) {
			case '11':
				if($mobile != '') {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('pl-process-sms');

					if($message != ''){
						$smsresponse = senddynamicSMSobb($mobile, $message);
					}
				}
				
				if($emailid != '') {
					// Send email
					/* $subject = "Welcome indiafinpro";
					
					$message = '<h3>Congratulations!</h3>';
					$message .= '<p>We appreciate your registration with us! You\'re eligible for a pre-approved loan. Get your offer in just 3 steps. Buy Subscription Plan now: <a href="https://indiafinpro.com/digital/applynow" target="_blank">Click Here</a></p>';
					$message .= '<p>Thank You,<br/>indiafinproo</p>';

					$this->load->model('Site_General_Model');
					$content = $this->Site_General_Model->simpleemailtemplate($message);

					if($content != '') {
						//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 1);
						$maildata = array(
							'fullname' => $emailid,
							'email' => $emailid
						);
						$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
					} */
				}
				break;

			case '12':
				if($mobile != '') {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('bl-process-sms');

					if($message != ''){
						$smsresponse = senddynamicSMSobb($mobile, $message);
					}
				}
				
				if($emailid != '') {
					// Send email
					/* $subject = "Welcome indiafinpro";
			
					$message = '<h3>Congratulations!</h3>';
					$message .= '<p>We appreciate your registration with us! You\'re eligible for a pre-approved loan. Get your offer in just 3 steps. Buy Subscription Plan now: <a href="https://indiafinpro.com/digital/applynow" target="_blank">Click Here</a></p>';
					$message .= '<p>Thank You,<br/>indiafinpro</p>';

					$this->load->model('Site_General_Model');
					$content = $this->Site_General_Model->simpleemailtemplate($message);

					if($content != '') {
						//$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 1);
						$maildata = array(
							'fullname' => $emailid,
							'email' => $emailid
						);
						$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
					} */
				}
				break;
			
			default:
				# code...
				break;
		}
		
		return true;
	}

	public function sendOfferMessage($loantype='', $eligibilityamt=0, $mobile='', $emailid=''){
		switch ($loantype) {
			case '11':
				if($mobile != '' && $eligibilityamt != 0) {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('pl-offer-sms');

					/*$eligibilityamt = substr($eligibilityamt, 0, -3);*/
					$eligibilityamtin = formatePriceIndia($eligibilityamt, 0);
					$premessage = str_replace("<#preamount>",$eligibilityamtin,$message);

					if($premessage != ''){
						$smsresponse = senddynamicSMSobb($mobile, $premessage);
					}
				}
				
				if($emailid != '') {
					// Send email
					$subject = "Welcome indiafinpro";

					$message = '<h3>Congratulations!</h3>';
					$message .= '<p>You\'re Eligible for Pre-Approved Personal Loan of Rs.'.$eligibilityamt.' Buy Subscription plan & Get Loan in Your A/C in 30 mins. Buy subscription plan now : <a href="https://indiafinpro/digital/applynow" target="_blank">Click Here</a></p>';
					$message .= '<p>Thanks & Regards,<br/>indiafinpro</p>';

					$this->load->model('Site_General_Model');
					$content = $this->Site_General_Model->simpleemailtemplate($message);

					if($content != '') {
						/*$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 1);*/
						$maildata = array(
							'fullname' => $emailid,
							'email' => $emailid
						);
						//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
					}
				}
				break;
			
			case '12':
				if($mobile != '' && $eligibilityamt != 0) {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('bl-offer-sms');

					/*$eligibilityamt = substr($eligibilityamt, 0, -3);*/
					$eligibilityamtin = formatePriceIndia($eligibilityamt, 0);
					$premessage = str_replace("<#preamount>",$eligibilityamtin,$message);

					if($premessage != ''){
						$smsresponse = senddynamicSMSobb($mobile, $premessage);
					}
				}
				break;

			default:
				# code...
				break;
		}

		return true;
	}

	public function applicationstatus($data){
		
		$this->db->insert('user_application_status',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function subscriptionorder($data){
		
		$this->db->insert('subscription_order',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function checksubscriptionentry($referenceId){
		
		$query = $this->db->where('paymentid', $referenceId)
				->where('isDelete', 0)
				->get('subscription_order')
				->num_rows();

				
		return $query; 
	}

	public function getreferraluserid($referralcode){
		
		$query = $this->db->where('refcode', $referralcode)
			   	->get('user_registration')
			   	->row();

				
		return $query; 
	}

	public function referraluserentry($data){
		
		$this->db->insert('user_tree',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function updatepayoutdata($id, $data){
		
		$user = $this->db->where('subuserid', $id)
				->order_by('id desc')
			   	->get('user_tree')
			   	->row();

		if($user) {
			$query = $this->db->where('id', $user->id)
						->update('user_tree', $data);

						
			return true;
		}
		else {
						
			return false;
		}
	}
	
	public function cardofferorder($data){
		
		$this->db->insert('cardoffer_order',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function checkcardofferdata($id){
		
		$query = $this->db->where('id', $id)
				->get('cardoffer_order')
				->row();

				
		return $query; 
	}

	public function updatecardofferorder($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('cardoffer_order', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

				
		return $flag;
	}

	public function checkcardofferentry($referenceId) {
		
		$query = $this->db->where('paymentid', $referenceId)
		  ->where('isDelete', 0)
		  ->get('cardoffer_order')
		  ->num_rows();

				
		return $query;
	}

	public function generateinvoice($data, $invoiceno){
		
		$this->db->insert('invoice',$data);
		$id = $this->db->insert_id();

		$data2 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $invoiceno + 1
		);
		$query = $this->db->where('option_key', 'newinvoiceno')
					->update('site_options', $data2);

				
		return $id;
	}

	public function sendPaymentGreetings($name='', $mobile='', $emailid=''){
		if($mobile != '') {
			$smsmessage = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Our Customer Executive will call you shortly. Thanks, indiafinpro";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage);
		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome indiafinpro";
			
			$message = '<p>Hello,</p>';
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

	public function sendPaymentFailedGreetings($mobile='', $emailid=''){
		if($mobile != '') {
			$this->load->model('Site_Info_Model');
			$message = $this->Site_Info_Model->getsmsmessage('payment-fail-sms');

			if($message != ''){
				$smsresponse = senddynamicSMSobb($mobile, $message);
			}
		}
		return true;
	}

	public function sendSuccessGreetings($maildata){
		if($maildata['mobile'] != '') {
			$this->load->model('Site_Info_Model');
			$message = $this->Site_Info_Model->getsmsmessage('account-sms');

			if($message != ''){
				$smsresponse = senddynamicSMSobb($maildata['mobile'], $message);
			}
		}
		
		if($maildata['email'] != '') {
			// Send email
			$userdata = array(
				'email' => $maildata['email'],
				'name' => $maildata['fullname']
			);

			$subject = "Welcome to indiafinpro";

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->customerwelcomeemailtemplate($maildata);

			if($content != '') {
				//$mailresponse = sendHTMLmail($maildata['email'], COMPANY_EMAIL, $subject, $content, 1);
				$maildata = array(
					'fullname' => $maildata['fullname'],
					'email' => $maildata['email']
				);
				$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
		
		return true;
	}


}
