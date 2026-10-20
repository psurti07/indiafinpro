<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Digital extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return redirect()->to('Infopage');
	}

	public function referral($referralcode)
	{
		if (!$referralcode) {
			return redirect()->to('Infopage');
			die;
		} else {
			$this->session->set_tempdata('referralcode', $referralcode, 3600);
			return redirect('digital/applynow');
			die;
		}
	}

	public function sendotpCode()
	{
		if ($_REQUEST['loanamount'] != "" && $_REQUEST['mobile'] != "") {
			$loanamount = $_REQUEST['loanamount'];
			$mobile = $_REQUEST['mobile'];

			$this->load->model('Site_Digital_Model');
			$data = $this->Site_Digital_Model->checkuser($mobile);

			if ($data != '') {
				if ($data->isUser == 2) {
					echo json_encode(array("success" => false, "message" => "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>", "mobile" => "", "redirect_url" => ""));
					die;
				} else {
					$key = stringCrypt($data->id, 'encrypt');

					$data1 = array(
						'update_date' => date('Y-m-d H:i:s')
					);
					$response1 = $this->Site_Digital_Model->updateregistration($data->userid, $data1);

					switch ($data->process_step) {
						case '3':
							$redirect_url = site_url("digital/subscriptionorder/" . $key);
							break;

						case '2':
							$redirect_url = site_url("digital/preapproval/" . $key);
							break;

						default:
							$redirect_url = site_url("digital/checkeligibility/" . $key);
							break;
					}

					/*$redirect_url = site_url("digital/checkeligibility/".$key);*/

					echo json_encode(array("success" => true, "message" => "Customer found.", "mobile" => "", "redirect_url" => $redirect_url));
					die;
				}
			} else {
				$this->session->set_tempdata('userloanamount', $loanamount, 3600);
				$this->session->set_tempdata('usermobile', $mobile, 3600);

				$this->load->model('Site_General_Model');
				$countsms = $this->Site_General_Model->countotpentry($mobile);

				if ($countsms < 10) {
					$response = $this->Site_General_Model->generateotp($mobile, '', 1);
					echo json_encode(array("success" => true, "message" => "OTP sent to mobile.", "mobile" => $mobile, "redirect_url" => ""));
					die;
				} else {
					echo json_encode(array("success" => false, "message" => "You have reached the OTP limit. Please contact customer support.", "mobile" => "", "redirect_url" => ""));
					die;
				}
			}

			echo json_encode(array("success" => false, "message" => "Ops. Something is wrong. Try again.", "mobile" => "", "redirect_url" => ""));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Customer mobile and loan amount is mandatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function resendotpCode()
	{
		if ($_REQUEST['loanamount'] != "" && $_REQUEST['mobile'] != "") {
			$loanamount = $_REQUEST['loanamount'];
			$mobile = $_REQUEST['mobile'];

			$this->load->model('Site_General_Model');
			$countsms = $this->Site_General_Model->countotpentry($mobile);

			if ($countsms < 10) {
				$response = $this->Site_General_Model->generateotp($mobile, '', 2);
				echo json_encode(array("success" => true, "message" => "New OTP sent to mobile."));
				die;
			} else {
				$response = 0;
				echo json_encode(array("success" => false, "message" => "Ops. Something is wrong. Try again."));
				die;
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Customer mobile and loan amount is mandatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function checkotpCode()
	{
		if (isset($_REQUEST['otpmobile']) && isset($_REQUEST['loanamount'])) {
			$mobile = $_REQUEST['otpmobile'];
			$otpcode = implode("",$_REQUEST['otpcode']);

			$this->session->set_tempdata('usermobile', $mobile, 3600);
			$this->session->set_tempdata('userloanamount', $_REQUEST['loanamount'], 3600);

			$this->load->model('Site_General_Model');
			$response = $this->Site_General_Model->checkOTP($mobile, $otpcode);

			if ($response == true) {
				echo json_encode(array("success" => true, "message" => "OTP verification successful.", "mobile" => $mobile));
				die;
			} else {
				echo json_encode(array("success" => false, "message" => "OTP is invalid.", "mobile" => "#"));
				die;
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Ops! Something goes wrong.", "mobile" => "#"));
			die;
		}
	}


	// START : PERSONAL LOAN FUNCTIONS
	public function applynow($step = 's1', $mobile = '')
	{
		$data = array();

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');
		$banklist = $this->Site_Info_Model->getbanklist(8);
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		if ($this->session->tempdata('userloanamount') == TRUE) {
			$loanamount = $this->session->tempdata('userloanamount');
		} else {
			$loanamount = '';
		}

		if (isset($_REQUEST['fbclid'])) {
			set_cookie('fbclidpl', $_REQUEST['fbclid'], '3600');
			//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid'], 3600);
		}

		if ($step == "s2" && $mobile != '') {
			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile
			);
			$this->load->view('digital-apply-now', ['meta' => $meta, 'banklist' => $banklist, 'processstep' => 'step2', 'userdetails' => $data]);
			return false;
		}
		if ($step == "s3" && $mobile != '') {
			if ($this->session->tempdata('referralcode') == TRUE) {
				$referralcode = $this->session->tempdata('referralcode');
			} else {
				$referralcode = '';
			}

			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('digital-apply-now', ['meta' => $meta, 'banklist' => $banklist, 'processstep' => 'step3', 'userdetails' => $data]);
			return false;
		} else {
			$this->load->view('digital-apply-now', ['meta' => $meta, 'banklist' => $banklist, 'processstep' => 'step1']);
		}
	}
	// END : PERSONAL LOAN FUNCTIONS

	public function registeredUser()
	{
		$fullname = $_REQUEST['username'];
		$mobile = $_REQUEST['usermobile'];
		$email = $_REQUEST['useremail'];
		$loanamount = $_REQUEST['loanamount'];
		$referralcode = $_REQUEST['referralcode'];

		if ($_REQUEST['usertype'] == 2) {
			$usertype = 2;
			$cardtype = 12;
		} else {
			$usertype = 1;
			$cardtype = 11;
		}

		$this->load->model('Site_Digital_Model');
		$usr_res = $this->Site_Digital_Model->checkuser($_REQUEST['usermobile']);

		if ($usr_res != '') {
			if ($usr_res->isUser == 2) {
				echo json_encode(array("success" => false, "message" => "You are already a registered customer. Kindly login to customer panel.", "mobile" => "", "redirect_url" => ""));
				die;
			} else {
				$key = stringCrypt($usr_res->id, 'encrypt');
				$redirect_url = site_url("digital/checkeligibility/" . $key);
				echo json_encode(array("success" => true, "message" => "Customer found.", "mobile" => "", "redirect_url" => $redirect_url));
				die;
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'update_date' => date('Y-m-d H:i:s'),
			'fullname' => $fullname,
			'mobile' => $mobile,
			'email' => $email,
			'cardtype' => $cardtype,
			'usertype' => $usertype,
			'process_step' => 1,
			'isUser' => 1,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->userregistration($data);

		if ($userid != 0) {
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'userid' => $userid,
				'loanamount' => $loanamount,
				'loantype' => $cardtype,
				'isDelete' => 0
			);

			$this->load->model('Site_Digital_Model');
			$applyid = $this->Site_Digital_Model->userapplication($data1);

			if ($referralcode != '') {
				$this->load->model('Site_Digital_Model');
				$referral = $this->Site_Digital_Model->getreferraluserid($referralcode);

				$data2 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'refferaltype' => 1,
					'refferaluserid' => $referral->id,
					'subuserid' => $userid,
					'payout' => 0
				);
				$response = $this->Site_Digital_Model->referraluserentry($data2);
			}

			//$offerresponse = $this->Site_Digital_Model->sendProcessMessage($cardtype, $mobile, $email);

			$key = stringCrypt($applyid, 'encrypt');
			$redirect_url = site_url("digital/checkeligibility/" . $key);

			echo json_encode(array("success" => true, "message" => "Customer registration successful.", "redirect_url" => $redirect_url));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong.", "redirect_url" => "#"));
			die;
		}
	}

	public function checkeligibility($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');

		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid, 3600);
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdata == NULL) {
			return redirect('digital/applynow');
			die;
		} else if ($userdata->isUser == 2) {
			return redirect('digital/applynow');
			die;
		} else {
			$loanname = ($userdata->loantype == 12) ? "Business Loan" : "Personal Loan";

			$data = array(
				'applyid' => $applyid,
				'userid' => $userdata->userid,
				'fullname' => $userdata->fullname,
				'mobile' => $userdata->mobile,
				'email' => $userdata->email,
				'loanamount' => $userdata->loanamount,
				'loantype' => $userdata->loantype,
				'loanname' => $loanname,
				'cardtype' => $userdata->cardtype
			);

			$this->load->view('digital-eligibility', ['meta' => $meta, 'userdetails' => $data]);
		}
	}

	public function preapproval($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');

		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid, 3600);
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdata == NULL) {
			return redirect('digital/applynow');
			die;
		} else if ($userdata->isUser == 2) {
			return redirect('digital/applynow');
			die;
		} else {
			$loanname = ($userdata->loantype == 12) ? "Business Loan" : "Personal Loan";
			$apr = ($userdata->loantype == 12) ? 11.5 : 12.5;
			$stramt = ($userdata->loantype == 12) ? 1853 : 1903;

			$data = array(
				'applyid' => $applyid,
				'rec_date' => $userdata->rec_date,
				'userid' => $userdata->userid,
				'fullname' => $userdata->fullname,
				'mobile' => $userdata->mobile,
				'email' => $userdata->email,
				'loantype' => $userdata->loantype,
				'loanname' => $loanname,
				'loanamount' => $userdata->loanamount,
				'income' => $userdata->income,
				'currentemi' => $userdata->currentemi,
				'cardtype' => $userdata->cardtype,
				'apr' => $apr,
				'stramt' => $stramt
			);

			$this->load->model('Site_Info_Model');
			$roiapproved = $this->Site_Info_Model->getroipackages($userdata->loantype, 1, 2);
			$roinotapproved = $this->Site_Info_Model->getroipackages($userdata->loantype, 0, 2);
			$roipackages = array_merge($roiapproved, $roinotapproved);
			$roicachefile = $userdata->loantype . $userdata->mobile;

			if ($this->cache->file->get($roicachefile)) {
				$cache_data = $this->cache->file->get($roicachefile);
				$roipackages = $cache_data["roiuser_data"];
			} else {
				$cache_data = array();
				$cache_data["roiuser_data"] = $roipackages;
				$this->cache->file->save($roicachefile, $cache_data, 2592000);
			}

			$this->load->view('digital-pre-approval', ['meta' => $meta, 'userdetails' => $data, 'roipackages' => $roipackages]);
		}
	}

	public function subscriptionorder($key = '')
	{
		$roipackages = array();
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');

		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid, 3600);
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdata == NULL) {
			return redirect('digital/applynow');
			die;
		} else if ($userdata->isUser == 2) {
			return redirect('digital/applynow');
			die;
		} else {
			$banklist = $this->Site_Info_Model->getbanklist(8);
			$testimoniallist = $this->Site_Info_Model->gettestimoniallist($userdata->loantype);

			$loanname = ($userdata->loantype == 12) ? "Business Loan" : "Personal Loan";
			$productslug = ($userdata->cardtype == 12) ? "business-subscription-plan" : "personal-subscription-plan";
			$cardname = ($userdata->loantype == 12) ? "Platinum" : "Premium";

			$apr = ($userdata->loantype == 12) ? 11.5 : 12.5;
			$stramt = ($userdata->loantype == 12) ? 1853 : 1903;

			$prores = $this->Site_Info_Model->getproductdetails($productslug);
			if ($prores->inOffer == 1) {
				$productdata = array(
					'inOffer' => $prores->inOffer,
					'amount' => $prores->amount,
					'offeramount' => $prores->offeramount,
					'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
					'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
				);
			} else {
				$productdata = array(
					'inOffer' => 0,
					'amount' => $prores->amount,
					'offeramount' => 0,
					'offerdate' => '',
					'payamount' => $prores->amount + ($prores->amount * 0.18)
				);
			}

			$data = array(
				'applyid' => $applyid,
				'rec_date' => $userdata->rec_date,
				'userid' => $userdata->userid,
				'fullname' => $userdata->fullname,
				'mobile' => $userdata->mobile,
				'email' => $userdata->email,
				'loantype' => $userdata->loantype,
				'loanname' => $loanname,
				'loanamount' => $userdata->loanamount,
				'income' => $userdata->income,
				'currentemi' => $userdata->currentemi,
				'cardname' => $cardname,
				'cardtype' => $userdata->cardtype,
				'apr' => $apr,
				'stramt' => $stramt
			);

			$this->load->model('Site_Info_Model');
			$roiapproved = $this->Site_Info_Model->getroipackages($userdata->loantype, 1, 2);
			$roinotapproved = $this->Site_Info_Model->getroipackages($userdata->loantype, 0, 2);
			$roipackages = array_merge($roiapproved, $roinotapproved);
			$roicachefile = $userdata->loantype . $userdata->mobile;

			if ($this->cache->file->get($roicachefile)) {
				$cache_data = $this->cache->file->get($roicachefile);
				$roipackages = $cache_data["roiuser_data"];
			} else {
				$cache_data = array();
				$cache_data["roiuser_data"] = $roipackages;
				$this->cache->file->save($roicachefile, $cache_data, 2592000);
			}

			$this->load->view('digital-subscription-plan', ['meta' => $meta, 'userdetails' => $data, 'productdata' => $productdata, 'roipackages' => $roipackages]);
		}
	}

	public function userApply()
	{
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'cibilscore' => $_REQUEST['cibilscore'],
			'loanpurpose' => $_REQUEST['loanpurpose'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi']
		);

		$this->load->model('Site_Digital_Model');
		$response = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state'],
			'process_step' => 2
		);
		$response1 = $this->Site_Digital_Model->updateregistration($_REQUEST['userid'], $data1);

		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		return redirect("digital/preapproval/" . $key);

		die;
	}

	public function getpreApproval()
	{
		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantenure' => $_REQUEST['tenure']
		);
		$response = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data);

		$apr = ($userdata->loantype == 12) ? 11.5 : 12.5;
		$eligibilityamt = calEligiblity($userdata->income, $userdata->currentemi, $apr, $userdata->loanamount);

		if ($userdata->process_step < 3) {
			$offerresponse = $this->Site_Digital_Model->sendOfferMessage($userdata->loantype, $eligibilityamt, $userdata->mobile, $userdata->email);
		}

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'process_step' => 3
		);
		$response1 = $this->Site_Digital_Model->updateregistration($userdata->userid, $data1);

		$this->load->model('Site_Info_Model');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignoffer');

		$data3 = array(
			'apiKey' => AISENSY_KEY,
			'campaignName' => $wpcampaignname,
			'destination' => '+91' . $userdata->mobile,
			'media' => array(
				'url' => AISENSY_OFFER_URL,
				'filename' => AISENSY_OFFER_IMAGE
			),
			'userName' => $userdata->fullname,
			'templateParams' => array('$Name', '$EligibleAmount'),
			'tags' => array('Get Offer'),
			'attributes' => array(
				'EligibleAmount' => strval($eligibilityamt)
			)
		);
		$restrack3 = aisensy_track($data3);

		$data4 = array(
			'apiKey' => AISENSY_KEY_OFFER,
			'campaignName' => '22sep_get',
			'destination' => '+91' . $userdata->mobile,
			'media' => array(
				'url' => 'https://d3jt6ku4g6z5l8.cloudfront.net/IMAGE/6aacfc9d314f4324d2064766/32e6487d-7fb8-4dda-9bcc-9ef3899db300_myfinget.jpeg',
				'filename' => 'myfin_get.jpeg'
			),
			'userName' => $userdata->fullname,
			'templateParams' => array('$Name', '$EligibleAmount'),
			'tags' => array('Get Offer'),
			'attributes' => array(
				'EligibleAmount' => strval($eligibilityamt)
			)
		);
		$restrack4 = aisensy_track($data4);

		log_message('error', 'aisency data  '. json_encode($restrack4));

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		return redirect("digital/subscriptionorder/" . $key);
		die;
	}

	public function checkoutDigital()
	{
	$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);
		$this->session->set_tempdata('applyid', $_REQUEST['applyid'], 3600);
		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');

		$data3 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'status' => 1,
			'isDelete' => 0
		);
		$response3 = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data3);

		$productslug = ($userdata->cardtype == 12) ? "business-subscription-plan" : "personal-subscription-plan";

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails($productslug);
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$roundamount = floor($grandamount);
		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $userdata->mobile) {
				$roundamount = 1;
			}
		}

		$receiptid = number_format(microtime(true) * 1000, 0, '.', '');

		$orderdata = array(
		 'amount' => $roundamount * 100,
		 'currency' => 'INR',
		 'receipt' => $receiptid,
		 'notes' => array(
		  'key1' => $userdata->fullname,
		  'key2' => $userdata->mobile
		 )
		);

		$this->load->helper('razorpay');
		$orderres = generateorder($orderdata);
		$successURL = base_url('digital/buycardDigital');
		$failURL = base_url('digital/paymentResponse/false');

		$razorpaydata = array(
		'rec_date' => date('Y-m-d H:i:s'),
		'entryfor' => $userdata->cardtype,
		'userid' => $userdata->userid,
		'orderid' => $orderres->id,
		'orderamount' => $roundamount,
		'ordernote' => $productdata->productname
		);

		$this->load->model('Site_Payment_Gateway_Model');
		$razorpayentry = $this->Site_Payment_Gateway_Model->razorpayentry($razorpaydata);

		$postData = array(
		'applyid' => $_REQUEST['applyid'],
		'fullname' => $userdata->fullname,
		'mobile' => $userdata->mobile,
		'email' => $userdata->email,
		'orderamount' => $roundamount,
		'orderid' => $orderres->id,
		'description' => $productdata->productname,
		'successURL' => $successURL,
		'failURL' => $failURL
		);

		$this->load->view('razorpay-checkout', ['postData' => $postData]);
	}

	public function buycardDigital()
	{
		
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

		if (isset($_REQUEST['paymentid']) && $_REQUEST['paymentid'] != '') {
			$this->load->model('Site_Payment_Gateway_Model');
			$paymentdata = $this->Site_Payment_Gateway_Model->getrazorpayentry($_POST["orderid"]);

			$razorpaydata = array(
			 'rec_date' => date('Y-m-d H:i:s'),
			 'referenceid' => $_REQUEST['paymentid'],
			 'txstatus' => 'Success'
			);

			$response1 = $this->Site_Payment_Gateway_Model->updaterazorpayentry($paymentdata->id, $razorpaydata);

			$this->load->model('Site_Digital_Model');
			$userdata = $this->Site_Digital_Model->checkuserregdata($paymentdata->userid);
			$this->session->set_tempdata('applyid', $_REQUEST['applyid']);

			$cardno = random_code(16);
			$amount = (isset($_REQUEST['orderamount'])) ? $_REQUEST['orderamount'] : 0;
			$paymentid = (isset($_REQUEST['paymentid'])) ? $_REQUEST['paymentid'] : '';

			$isentry = $this->Site_Digital_Model->checksubscriptionentry($paymentid);

			if ($isentry == 0) {
				$data = array(
				 'rec_date' => date('Y-m-d H:i:s'),
				 'userid' => $userdata->userid,
				 'registration_date' => date('Y-m-d'),
				 'expiry_date' => date('Y-m-d', strtotime('+6 months')),
				 'card_number' => $cardno,
				 'amount' => $amount,
				 'paymentid' => $paymentid,
				 'isActive' => 1,
				 'isDelete' => 0
				);
				$memberid = $this->Site_Digital_Model->subscriptionorder($data);

				$password = random_code(6);
				$passwordkey = stringCrypt($password, 'encrypt');
				$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname), 0, 3));
				$refcode .= substr($userdata->mobile, -4);

				$regdata = array(
				 'rec_date' => date('Y-m-d H:i:s'),
				 'update_date' => date('Y-m-d H:i:s'),
				 'password' => $passwordkey,
				 'refcode' => $refcode,
				 'process_step' => 4,
				 'isUser' => 2
				);
				$response2 = $this->Site_Digital_Model->updateregistration($userdata->userid, $regdata);

				$this->load->model('Site_Info_Model');
				$invoiceno = $this->Site_Info_Model->getinvoiceno();

				if ($userdata->cardtype == 12) {
					$productslug = "business-subscription-plan";
					$invfor = 2;
					$invprefix = "BL_";
				} else {
					$productslug = "personal-subscription-plan";
					$invfor = 1;
					$invprefix = "PL_";
				}

				$this->load->model('Site_Info_Model');
				$productdata = $this->Site_Info_Model->getproductdetails($productslug);
				$netamount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;

				if ($userdata->state == 'Gujarat') {
					$cgstamount = $netamount * 0.09;
					$sgstamount = $netamount * 0.09;
				} else {
					$igstamount = $netamount * 0.18;
				}

				$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

				$invdata3 = array(
				 'rec_date' => date('Y-m-d H:i:s'),
				 'userid' => $userdata->userid,
				 'cardid' => $memberid,
				 'inv_for' => $invfor,
				 'inv_prefix' => $invprefix,
				 'inv_number' => $invoiceno,
				 'inv_date' => date('Y-m-d'),
				 'inv_price' => $netamount,
				 'inv_cgst' => $cgstamount,
				 'inv_sgst' => $sgstamount,
				 'inv_igst' => $igstamount,
				 'inv_grandtotal' => $grandtotal,
				 'isDelete' => 0
				);

				$exists_mobile = in_array($userdata->mobile, unserialize(UAT_MOBILE_NUMBERS), true);
				if (!$exists_mobile) {
					$responseinvoice = $this->Site_Digital_Model->generateinvoice($invdata3, $invoiceno);
				}

				if (!$exists_mobile) {
					$remote_data = array(
						'company_code' => COMPANY_CODE,
						'company_local_ip' => LOCAL_IP,
						'product_code' => 'subscription', 
						'customer_name' => $userdata->fullname,
						'customer_email' => $userdata->email,
						'customer_mobile' => $userdata->mobile,
						'userid' => $userdata->userid,
						'card_number' => $cardno,
						'rec_date' => date('Y-m-d H:i:s'),
						'inv_for' => $invfor,
						'inv_prefix' => $invprefix,
						'inv_number' => $invoiceno,
						'inv_date' => date('Y-m-d'),
						'inv_price' => $netamount,
						'inv_cgst' => $cgstamount,
						'inv_sgst' => $sgstamount,
						'inv_igst' => $igstamount,
						'inv_grandtotal' => $grandtotal,
					);

					$api_response = send_order_data(json_encode($remote_data));
				}

				$maildata = array(
					'fullname' => $userdata->fullname,
					'mobile' => $userdata->mobile,
					'email' => $userdata->email,
					'password' => $password,
					'order_number' => $invoiceno,
					'order_date' => date('d-m-Y'),
					'order_amount' => $grandtotal
				);

				$sent = $this->Site_Digital_Model->sendSuccessGreetings($maildata);

				redirect("digital/paymentResponse/" . $response2);
			} else {
				return redirect("digital/paymentResponse/true");
				die;
			}
		} else {
			$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
			redirect("digital/subscriptionorder/" . $key);
		}
	}

	public function paymentResponse($status = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignsuccess');

		$fbclidpl = $applyid = "";

		$applyid = $this->session->tempdata('applyid');

		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($status != '') {
			if ($status == "true" && $applyid != "") {
				if ($applyid > 0) {

					$firstname = strtok($userdata->fullname, " ");
					$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdata->city));
					$state = strtolower(getStateAbbreviation($userdata->state));
					$orderid = date('md') . random_code(4);

					$fbdata = array(
						'type' => 'digital',
						'firstname' => $firstname,
						'mobile' => '91' . $userdata->mobile,
						'email' => $userdata->email,
						'city' => $city,
						'state' => $state,
						'orderid' => $orderid,
						'sourceurl' => base_url('/digital/paymentResponse/true')
					);

					if (get_cookie('fbclidpl') != "") {
						$fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
					}

					$fbdata['fbclid'] = $fbclidpl;

					$fbresponse = fbconversioncurl($fbdata);

					$snapdata = array(
						'email' => $userdata->email,
						'mobile' => $userdata->mobile,
						'userid' => $userdata->id,
					);
					$snapresponse = snapconversioncurl($snapdata);
					/* log_message("Error", "Snap response in : " . json_encode($snapresponse)); */


					/*$data3 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => $wpcampaignname,
						'destination' => '+91' . $userdata->mobile,
						'media' => array(
							'url' => AISENSY_SUCCESS_URL,
							'filename' => AISENSY_SUCCESS_IMAGE
						),
						'userName' => $userdata->fullname,
						'templateParams' => array('$Name', '$EligibleAmount'),
						'tags' => array('Payment Successful')
					);
					$restrack3 = aisensy_track($data3);*/

					$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $status]);
				} else {
					$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $status]);
				}
			} else if ($status == "false" && $applyid != "") {
				/*$data3 = array(
								'apiKey' => AISENSY_KEY,
								'campaignName' => '19april_fail',
								'destination' => '+91' . $userdata->mobile,
								'media' => array(
									'url' => AISENSY_FAIL_URL,
									'filename' => AISENSY_FAIL_IMAGE
								),
								'userName' => $userdata->fullname,
								'templateParams' => array('$Name', '$EligibleAmount'),
								'tags' => array('Payment Failed')
							);
							$restrack3 = aisensy_track($data3);*/

				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $status]);
			} else {
				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $status]);
			}
		} else {
			return redirect('digital/applynow');
			die;
		}
	}

}
?>