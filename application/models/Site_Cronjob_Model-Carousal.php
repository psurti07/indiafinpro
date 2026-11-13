<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_Cronjob_Model extends CI_Model
{
	/* START : Online loan customer marketing message */
	public function online_marketing_message($schedule_arr)
	{

		$schedule = $url = $smsmessage = $smsresponse = $wheredate = $dataset = '';

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
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where($wheredate)
			->where('r.rec_date >=', '2023-03-01 00:00:00')
			->where('r.isDnd', 0)
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('t.subuserid', NULL)
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
			
			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9662846258</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9998807538</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9998807538</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9998892746</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>6358988761</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";
			
			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9913953471</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9023987358</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

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
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where($wheredate)
			->where('r.isDnd', 0)
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('t.subuserid', NULL)
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if ($row->loanamount != 0 && $row->income != 0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					$data1 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => $wpcampaignname,
						'destination' => '+91' . $row->mobile,
						'userName' => $row->fullname,
						'tags' => array('carousel_rm'),
						'attributes' => array(
							'EligibleAmount' => strval($eligibilityamt)
						),
						'templateParams' => array('$Name', '$EligibleAmount'),
						'carouselCards' => array(
							array(
								'card_index' => 0,
								'components' => array(
									array(
										'type' => 'HEADER',
										'parameters' => array(
											array(
												'type' => 'image',
												'image' => array(
													'link' => 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65c9e9cc335c7e6594d5dc26/1861842_rmcar12mar.jpg'
												) // image array end
											) // parameters inner array end
										) // parameters main array end
									), // components inner array end
									array(
										'type' => 'BUTTON',
										'sub_type' => 'URL',
										'index' => 0,
										'parameters' => array(
											array(
												'type' => 'text',
												'text' => '#SAMPLE-CLICK-TRACKING#'
											) // parameters inner array end
										) // parameters main array end
									) // components inner array end
								) // components main array end
							), // carouselCards inner array end
							array(
								'card_index' => 1,
								'components' => array(
									array(
										'type' => 'HEADER',
										'parameters' => array(
											array(
												'type' => 'image',
												'image' => array(
													'link' => 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65c9e9cc335c7e6594d5dc26/76200_rmcar22mar.jpg'
												) // image array end
											) // parameters inner array end
										) // parameters main array end
									), // components inner array end
									array(
										'type' => 'BUTTON',
										'sub_type' => 'URL',
										'index' => 0,
										'parameters' => array(
											array(
												'type' => 'text',
												'text' => '#SAMPLE-CLICK-TRACKING#'
											) // parameters inner array end
										) // parameters main array end
									) // components inner array end
								) // components main array end
							), // carouselCards inner array end
							array(
								'card_index' => 2,
								'components' => array(
									array(
										'type' => 'HEADER',
										'parameters' => array(
											array(
												'type' => 'image',
												'image' => array(
													'link' => 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65c9e9cc335c7e6594d5dc26/6714719_rmcar32mar.jpg'
												) // image array end
											) // parameters inner array end
										) // parameters main array end
									), // components inner array end
									array(
										'type' => 'BUTTON',
										'sub_type' => 'URL',
										'index' => 0,
										'parameters' => array(
											array(
												'type' => 'text',
												'text' => '#SAMPLE-CLICK-TRACKING#'
											) // parameters inner array end
										) // parameters main array end
									) // components inner array end
								) // components main array end
							) // carouselCards inner array end
						) // carouselCards main array end
					);
					$restrack1 = aisensy_track($data1);
					$airesponse .= $row->mobile . "-" . $restrack1 . "|";
					$cnt++;
				}
			}

			$adminlist = ['9662846258', '9998807538', '9998892746','6358988761','9913953471', '9023987358'];
			$eligibilityamt = "5,00,000";

			foreach ($adminlist as $row2) {
				$data2 = array(
					'apiKey' => AISENSY_KEY,
					'campaignName' => $wpcampaignname,
					'destination' => '+91' . $row2,
					'userName' => 'Company',
					'tags' => array('carousel_rm'),
					'attributes' => array(
						'EligibleAmount' => strval($eligibilityamt)
					),
					'templateParams' => array('$Name', '$EligibleAmount'),
					'carouselCards' => array(
						array(
							'card_index' => 0,
							'components' => array(
								array(
									'type' => 'HEADER',
									'parameters' => array(
										array(
											'type' => 'image',
											'image' => array(
												'link' => 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65c9e9cc335c7e6594d5dc26/1861842_rmcar12mar.jpg'
											) // image array end
										) // parameters inner array end
									) // parameters main array end
								), // components inner array end
								array(
									'type' => 'BUTTON',
									'sub_type' => 'URL',
									'index' => 0,
									'parameters' => array(
										array(
											'type' => 'text',
											'text' => '#SAMPLE-CLICK-TRACKING#'
										) // parameters inner array end
									) // parameters main array end
								) // components inner array end
							) // components main array end
						), // carouselCards inner array end
						array(
							'card_index' => 1,
							'components' => array(
								array(
									'type' => 'HEADER',
									'parameters' => array(
										array(
											'type' => 'image',
											'image' => array(
												'link' => 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65c9e9cc335c7e6594d5dc26/76200_rmcar22mar.jpg'
											) // image array end
										) // parameters inner array end
									) // parameters main array end
								), // components inner array end
								array(
									'type' => 'BUTTON',
									'sub_type' => 'URL',
									'index' => 0,
									'parameters' => array(
										array(
											'type' => 'text',
											'text' => '#SAMPLE-CLICK-TRACKING#'
										) // parameters inner array end
									) // parameters main array end
								) // components inner array end
							) // components main array end
						), // carouselCards inner array end
						array(
							'card_index' => 2,
							'components' => array(
								array(
									'type' => 'HEADER',
									'parameters' => array(
										array(
											'type' => 'image',
											'image' => array(
												'link' => 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/IMAGE/65c9e9cc335c7e6594d5dc26/6714719_rmcar32mar.jpg'
											) // image array end
										) // parameters inner array end
									) // parameters main array end
								), // components inner array end
								array(
									'type' => 'BUTTON',
									'sub_type' => 'URL',
									'index' => 0,
									'parameters' => array(
										array(
											'type' => 'text',
											'text' => '#SAMPLE-CLICK-TRACKING#'
										) // parameters inner array end
									) // parameters main array end
								) // components inner array end
							) // components main array end
						) // carouselCards inner array end
					) // carouselCards main array end
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

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>9904466599</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_API_KEY . "</password><mobiles>7486047532</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

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

}

?>
