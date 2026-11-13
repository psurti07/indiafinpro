<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_Cronjob_Model extends CI_Model
{
	/* START : Online loan customer marketing message */
	public function online_marketing_message($schedule_arr)
	{
		$schedule = $url = $smsmessage = $smsresponse = $wheredate = $dataset = '';
		$dynamicDate = getLockDateByDays();

		$lastno = count($schedule_arr);
		$wheredate .= "(";
		for ($i = 0; $i < $lastno; $i++) {
			$schedule .= $schedule_arr[$i];
			$wheredate .= "CAST(r.update_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule_arr[$i] . " DAY)";
			if ($i < $lastno - 1) {
				$schedule .= ", ";
				$wheredate .= " OR ";
			}
		}
		$wheredate .= ") ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', $dynamicDate)
			->where('r.rec_date >=', '2025-09-23 00:00:00')
			->where('r.isDnd', 0)
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			$this->load->model('Site_Info_Model');
			$smsmessage = $this->Site_Info_Model->getsmsmessage('pl-remarketing-sms');
			$smssendid = getSMSsenderid();

			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if ($row->loanamount != 0 && $row->income != 0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = $eligibilityamtsimple;
					}
					$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

					$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";
				}
			}

			$eligibilityamt = "5,00,000";
			$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_API_KEY."</password><mobiles>9979763796</mobiles><message>".$premessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";
			
			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_API_KEY."</password><mobiles>9998807538</mobiles><message>".$premessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_API_KEY."</password><mobiles>9998892746</mobiles><message>".$premessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_API_KEY."</password><mobiles>6357121014</mobiles><message>".$premessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_API_KEY."</password><mobiles>9023987358</mobiles><message>".$premessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_API_KEY."</password><mobiles>9724157166</mobiles><message>".$premessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

			$dataset .= "<sms><user>".SMS_OBB_USERNAME."</user><password>".SMS_OBB_API_KEY."</password><mobiles>9913953471</mobiles><message>".$premessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

			$smsresponse = sendxmlSMSobb($dataset);

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'Customer',
				'parentid' => 1,
				'cronname' => 'SMS Day - ' . $schedule,
				'msgcount' => count($userlist),
				'msgresponse' => $smsresponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Online loan customer marketing message */


	/* START : Whatsapp marketing message */
	public function whatsapp_marketing_message($schedule_arr)
	{
		$schedule = $url = $response = $airesponse = $wheredate = $dataset = '';
		$cnt = 1;
		$dynamicDate = getLockDateByDays();

		$this->load->model('Site_Info_Model');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignmain');


		$lastno = count($schedule_arr);
		$wheredate .= "(";
		for ($i = 0; $i < $lastno; $i++) {
			$schedule .= $schedule_arr[$i];
			$wheredate .= "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule_arr[$i] . " DAY)";
			if ($i < $lastno - 1) {
				$schedule .= ", ";
				$wheredate .= " OR ";
			}
		}
		$wheredate .= ") ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', $dynamicDate)
			->where('r.rec_date >=', '2025-09-23 00:00:00')
			->where('r.isDnd', 0)
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					$data1 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => $wpcampaignname,
						'destination' => '+91' . $row->mobile,
						'media' => array(
							'url' => AISENSY_MARKETING_URL,
							'filename' => AISENSY_MARKETING_IMAGE
						),
						'userName' => $row->fullname,
						'templateParams' => array('$Name','$EligibleAmount'),
						'tags' => array('Get Offer'),
						'attributes' => array(
							'EligibleAmount' => strval($eligibilityamt)
						)
					);
					$restrack1 = aisensy_track($data1);
					$airesponse .= $row->mobile . "-" . $restrack1 . "|";
					$cnt++;
				}
			}

			$adminlist = ['9979763796','9998807538', '9998892746', '6357121014', '9023987358', '9724157166', '9913953471'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data2 = array(
					'apiKey' => AISENSY_KEY,
					'campaignName' => $wpcampaignname,
					'destination' => '+91' . $row2,
					'media' => array(
						'url' => AISENSY_MARKETING_URL,
						'filename' => AISENSY_MARKETING_IMAGE
					),
					'userName' => '$Name',
					'templateParams' => array('$Name','$EligibleAmount'),
					'tags' => array('Get Offer'),
					'attributes' => array(
						'EligibleAmount' => strval($eligibilityamt)
					)
				);
				$restrack2 = aisensy_track($data2);
				$airesponse .= $row2 . "-" . $restrack2 . "|";
				$cnt++;
			}

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'Whatsapp Digital',
				'parentid' => 11,
				'cronname' => 'Whatsapp - ' . $schedule,
				'msgcount' => $cnt,
				'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Whatsapp marketing message */

	/* START : Whatsapp marketing message */
	public function whatsapp_marketing_message_new($schedule_arr)
	{
		$schedule = $url = $response = $airesponse = $wheredate = $dataset = '';
		$cnt = 1;
		$dynamicDate = getLockDateByDays();

		$this->load->model('Site_Info_Model');
		//$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignmain');


		$lastno = count($schedule_arr);
		$wheredate .= "(";
		for ($i = 0; $i < $lastno; $i++) {
			$schedule .= $schedule_arr[$i];
			$wheredate .= "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule_arr[$i] . " DAY)";
			if ($i < $lastno - 1) {
				$schedule .= ", ";
				$wheredate .= " OR ";
			}
		}
		$wheredate .= ") ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', $dynamicDate)
			->where('r.rec_date >=', '2025-09-23 00:00:00')
			->where('r.isDnd', 0)
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					$data1 = array(
						'apiKey' => AISENSY_KEY_OFFER,
						'campaignName' => '3oct_mark_auto',
						'destination' => '+91' . $row->mobile,
						'media' => array(
							'url' => 'https://d3jt6ku4g6z5l8.cloudfront.net/IMAGE/6aacfc9d314f4324d2064766/32e6487d-7fb8-4dda-9bcc-9ef3899db300_myfinget.jpeg',
							'filename' => 'myfin_get.jpeg'
						),
						'userName' => $row->fullname,
						'templateParams' => array('$Name','$EligibleAmount'),
						'tags' => array('Get Offer'),
						'attributes' => array(
							'EligibleAmount' => strval($eligibilityamt)
						)
					);
					$restrack1 = aisensy_track($data1);
					$airesponse .= $row->mobile . "-" . $restrack1 . "|";
					$cnt++;
				}
			}

			$adminlist = ['9979763796','9998807538', '9998892746', '6357121014', '9023987358', '9724157166', '9913953471'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data2 = array(
					'apiKey' => AISENSY_KEY_OFFER,
					'campaignName' => '3oct_mark_auto',
					'destination' => '+91' . $row2,
					'media' => array(
						'url' => 'https://d3jt6ku4g6z5l8.cloudfront.net/IMAGE/6aacfc9d314f4324d2064766/32e6487d-7fb8-4dda-9bcc-9ef3899db300_myfinget.jpeg',
						'filename' => 'myfin_get.jpeg'
					),
					'userName' => '$Name',
					'templateParams' => array('$Name','$EligibleAmount'),
					'tags' => array('Get Offer'),
					'attributes' => array(
						'EligibleAmount' => strval($eligibilityamt)
					)
				);
				$restrack2 = aisensy_track($data2);
				$airesponse .= $row2 . "-" . $restrack2 . "|";
				$cnt++;
			}

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'Whatsapp Digital new',
				'parentid' => 3,
				'cronname' => 'Whatsapp - ' . $schedule,
				'msgcount' => $cnt,
				'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Whatsapp marketing message */

	/* START : Customer support message */
	public function customer_support_message()
	{

		$url = $smsmessage = $dataset = $smsresponse = '';

		$prev_date = date('Y-m-d', strtotime('-1 days'));
		$userlist = $this->db->select('id, update_date, fullname, mobile, email, cardtype')
			->where('update_date >=', $prev_date . ' 21:00:00')
			->where('isUser', 2)
			->where('isActive', 1)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('user_registration')
			->result();

		if (count($userlist) > 0) {
			$smsmessage = "Dear Customer, your loan application is under process. Our Company Executive will connect soon. If you've any query, call us on 7990602205 Regards, indiafinpro";
			$smssendid = getSMSsenderid();

			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";
				}
			}

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9023987358</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>7046134946</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$smsresponse = sendxmlSMSobb($dataset);

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'Support',
				'parentid' => 1,
				'cronname' => 'Customer Support',
				'msgcount' => count($userlist),
				'msgresponse' => $smsresponse
			);

			$this->db->insert('sms_log', $data1);
		}


		return true;
	}
	/* END : Customer support message */

	/* START : Customer reapply eligible message */
	public function customer_reapplyeligible()
	{

		$wheredate = "CAST(a.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -90 DAY)";
		$wherestatus = "(a.status=2 or a.status=3)";

		$userlist = $this->db->select('r.id, a.rec_date, r.mobile, r.email')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			->where($wherestatus)
			->where('r.isUser', 2)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.rec_date desc')
			->get()
			->result();

		if (count($userlist) > 0) {
			foreach ($userlist as $row) {
				$message = "The wait is over! You're now eligible to reapply for a loan. Login to your portal https://indiafinpro.com/customer";

				$smsresponse = sendtextSMSobb($row->mobile, $message);
			}
		}

	}
	/* END : Customer reapply eligible message */

	/* START : Plan Interakt marketing message(Lending Finance Interakt) */
	public function intrekt_marketing_message($schedule = 9999) {
		$airesponse = "";
		$cnt = 1;

		$this->load->model('Site_Info_Model');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', $dynamicDate)
			->where('r.rec_date >=', '2025-09-23 00:00:00')
			->where('r.isDnd', 0)
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		log_message('error', 'userlist -- '. count($userlist));	
		if(count($userlist) > 0) {

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'whatsapp interakt',
				'parentid' => 2,
				'cronname' => 'whatsapp interakt - ' . $schedule,
				'msgcount' => count($userlist)
		   );
		   $this->db->insert('sms_log', $data1);
		   $logid = $id = $this->db->insert_id();
		   
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					// Whatsapp INTERAKT Code
					$data4 = array(
						"fullPhoneNumber" => '+91'.$row->mobile,
						"callbackData"=> "some text here",
						"type"=> "Template",
						"template"=> array(
								"name"=> "5august_rm_1", //7sep_auto
								"languageCode"=> "en",
								"headerValues"=> array(
									"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/bf0a476e-3ee4-44ed-8c3a-426e8420c521/message_template_sample/wLwxu6xRnE58/WhatsApp%20Image%202026-08-05%20at%2012.02.59%20PM.jpeg?se=2031-07-30T07%3A33%3A34Z&sp=rt&sv=2019-12-12&sr=b&sig=GJYrm1Xiq46NdAVZ9MqZ5XqpN1hqZDzt10UpYQqiPyc%3D"
								),
								"bodyValues"=> array(
									$row->fullname, $eligibilityamt
								),
							)
					
					);
					$restrack1 = interakt_track_remarketing($data4, INTERAKT_KEY_RM);
					$airesponse .= $row->mobile . "-" . $restrack1 . "|";
					$data2 = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'crontype' => 'whatsapp interakt',
						'msgcount' => $cnt,
						'msgresponse' => $airesponse
					   );
					   
					   $query = $this->db->where('id', $logid)
						   ->update('sms_log', $data2);
					$cnt++;
				}
			}

			$adminlist = ['9979763796','9998807538', '9998892746', '6357121014', '9023987358', '9724157166', '9913953471'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data4 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> "5august_rm_1",
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/bf0a476e-3ee4-44ed-8c3a-426e8420c521/message_template_sample/wLwxu6xRnE58/WhatsApp%20Image%202026-08-05%20at%2012.02.59%20PM.jpeg?se=2031-07-30T07%3A33%3A34Z&sp=rt&sv=2019-12-12&sr=b&sig=GJYrm1Xiq46NdAVZ9MqZ5XqpN1hqZDzt10UpYQqiPyc%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack2 = interakt_track_remarketing($data4, INTERAKT_KEY_RM);
				$airesponse .= $row2 . "-" . $restrack2 . "|";
				$data2 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'crontype' => 'whatsapp interakt',
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				   );
				   
				   $query = $this->db->where('id', $logid)
					   ->update('sms_log', $data2);
				$cnt++;
			}
		}

		return true;
	}
	/* END : Whatsapp marketing message */


}

?>
