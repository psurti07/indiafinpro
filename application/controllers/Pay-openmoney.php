<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pay extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}

	/* START : Card Offer loan */
	public function cardpay()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');
		$prores = $this->Site_Info_Model->getproductdetails('card-offer');
		$banklist = $this->Site_Info_Model->getbanklist(8);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);

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

		$this->load->view('cardpay', ['meta' => $meta, 'productdata' => $productdata, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getcardpay()
	{

		$this->load->model('Site_Digital_Model');
		$this->load->model('Site_Payment_Gateway_Model');

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('card-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = floor($amount + ($amount * 0.18));

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('cardpay');
		} else {
			
			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 1;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 3,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $grandamount,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);

			$this->load->model('Site_Digital_Model');
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$receiptid = number_format(microtime(true) * 1000, 0, '.', '');

			$orderdata = array(
				'amount' => $grandamount * 100,
				'currency' => 'INR',
				'receipt' => $receiptid,
				'notes' => array(
					'key1' => $fullname,
					'key2' => $mobileno
				)
			);

			$this->load->helper('razorpay');
			$orderres = generateorder($orderdata);
			$successURL = base_url('pay/cardpayreturn');
			$failURL = base_url('cardpay');

			$razorpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 3,
				'userid' => $userid,
				'orderid' => $orderres->id,
				'orderamount' => $grandamount,
				'ordernote' => $productdata->productname
			);

			$this->load->model('Site_Payment_Gateway_Model');
			$razorpayentry = $this->Site_Payment_Gateway_Model->razorpayentry($razorpaydata);

			$postData = array(
				'applyid' => $userid,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'email' => $emailid,
				'orderamount' => $grandamount,
				'orderid' => $orderres->id,
				'description' => $productdata->productname,
				'successURL' => $successURL,
				'failURL' => $failURL
			);

			$this->load->view('razorpay-checkout', ['postData' => $postData]);
		}
	}

	public function cardpayreturn()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');

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
			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			$amount = (isset($_REQUEST['orderamount'])) ? $_REQUEST['orderamount'] : 0;
			$paymentid = (isset($_REQUEST['paymentid'])) ? $_REQUEST['paymentid'] : '';

			$isentry = $this->Site_Digital_Model->checkcardofferentry($paymentid);

			if ($isentry == 0) {
				$cardno = random_code(16);

				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+6 month')),
					'amount' => $amount,
					'paymentid' => $paymentid,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else {
			$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* STOP : Card Offer loan */


	/* START : IVRpayment offer loan */
	public function ivrpaymentpay()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');
		$prores = $this->Site_Info_Model->getproductdetails('ivrpayment-offer');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$banklist = $this->Site_Info_Model->getbanklist(8);

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

		$this->load->view('ivrpaymentpay', ['meta' => $meta, 'productdata' => $productdata, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getivrpaymentpay()
	{
		$this->load->model('Site_Digital_Model');
		$this->load->model('Site_Payment_Gateway_Model');
		$alldata = $buyerAddress = $buyerCity = $buyerState = $amount = $buyerPinCode = $orderid = '';

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('ivrpayment-offer');
		$get_amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$amount = $get_amount + ($get_amount * 0.18);

		$buyerFirstName = $buyerLastName = trim($_REQUEST['fullname']);
		$buyerPhone = trim($_REQUEST['mobileno']);
		$buyerEmail = trim($_REQUEST['emailid']);
		$buyerCountry = 'India';
	
		$existingUser = $this->Site_Digital_Model->checkexistinguser($buyerPhone);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('ivrpaymentpay');
		} else {


			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $buyerPhone) {
					$amount = 1;
				}
			}

			$orderid = "APLive" . number_format(microtime(true) * 1000, 0, '.', '');
			$url = "https://payments.airpay.co.in/pay/index.php";

			$returnUrl = base_url('pay/ivrpaymentresponse');
			$this->load->helper('airpay');

			$hiddenmod = "";

			$postData = array(
				"username" => AIRPAY_USERNAME,
				"password" => AIRPAY_KEY_PASSWORD,
				"secret" => AIRPAY_SECRET,
				"mercid" => AIRPAY_MERCHANT,
				"orderid" => $orderid,
				"url" => $url,
				"currency" => 356,
				"isocurrency" => 'INR',
				"amount" => $amount,
				"buyerFirstName" => $buyerFirstName,
				"buyerLastName" => $buyerLastName,
				"buyerEmail" => $buyerEmail,
				"buyerPhone" => $buyerPhone,
				"buyerAddress" => $buyerAddress,
				"buyerCity" => $buyerCity,
				"buyerState" => $buyerState,
				"buyerPinCode" => $buyerPinCode,
				"backurl" => $returnUrl,
				"hiddenmod" => $hiddenmod,
				"buyerCountry" => 'India',
				"customvar" => $productdata->productname,
			);

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 4,
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobileno'],
				'emailid' => $_REQUEST['emailid'],
				'amount' => $amount,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);


			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$airpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 4,
				'userid' => $userid,
				'orderid' => $orderid,
				'orderamount' => $amount,
				'ordernote' => $productdata->productname,
			);


			$response = $this->Site_Payment_Gateway_Model->airpayentry($airpaydata);

			$this->load->view('airpay-checkout', ['postData' => $postData, 'url' => $url]);
		}
	}

	public function ivrpaymentresponse()
	{
		$this->load->model('Site_Digital_Model');
		$this->load->model('Site_Payment_Gateway_Model');
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$transactionid = trim($_POST['TRANSACTIONID']);
		$aptransactionid = trim($_POST['APTRANSACTIONID']);
		$amount = trim($_POST['AMOUNT']);
		$transactionstatus = trim($_POST['TRANSACTIONSTATUS']);
		$message = trim($_POST['MESSAGE']);
		$ap_SecureHash = trim($_POST['ap_SecureHash']);
		$chmod = "";

		if (isset($_POST['CHMOD'])) {
			$chmod = trim($_POST['CHMOD']);
		}

		if (isset($_POST['CUSTOMVAR'])) {
			$customvar = trim($_POST['CUSTOMVAR']);
		} else {
			$customvar = "";
		}
		$paymentdata = $this->Site_Payment_Gateway_Model->getairpayentry($transactionid);

		$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

		if ($transactionstatus == 200) {


			$airpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $amount,
				'statuscode' => $transactionstatus,
				'transactionid' => $aptransactionid,
				'paymentmode' => $chmod
			);
			$response1 = $this->Site_Payment_Gateway_Model->updateairpayentry($paymentdata->id, $airpaydata);

			$cardno = random_code(16);
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'bumper_number' => $cardno,
				'registration_date' => date('Y-m-d'),
				'expiry_date' => date('Y-m-d', strtotime('+6 month')),
				'amount' => $amount,
				'paymentid' => $transactionid,
				'isActive' => 1
			);

			$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

			$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

			$this->load->view('ivrpaymentpay-response', ['meta' => $meta, 'status' => $response]);
		} else {
			$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
			$this->load->view('ivrpaymentpay-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function ivrpaymentcallback()
	{
		die;
	}
	/* STOP : IVRpayment offer loan */

	/* START : Special Offer loan */
	public function specialpay()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');
		$prores = $this->Site_Info_Model->getproductdetails('special-offer');
		$banklist = $this->Site_Info_Model->getbanklist(8);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);

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

		$this->load->model('Site_Info_Model');
		$roipackages = $this->Site_Info_Model->getroipackages(11);

		$this->load->view('specialpay', ['meta' => $meta, 'productdata' => $productdata, 'roipackages' => $roipackages, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getspecialpay()
	{
		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Payment_Gateway_Model');

		$productdata = $this->Site_Info_Model->getproductdetails('special-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		
		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];
		$this->load->model('Site_Digital_Model');
		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('specialpay');
		} else {

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 1;
				}
			}

		$orderid = 'order_' . number_format(microtime(true) * 1000, 0, '.', '');
		$return_url = base_url('pay/specialresponse');

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 5,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$paymentData = [
			"order_id" => $orderid,
			"customer_id" => strval($userid),
			'amount' => $grandamount,
			'currency' => 'INR',
			'name' => $fullname,
			'email_id' => $emailid,
			'contact_number' => $mobileno,
			'mtx' => $orderid,
			'return_url' => $return_url
		];

		$this->load->helper('openmoney_helper');
		$environment = OPENMONEY_MODE;

		if (OPENMONEY_MODE == "PROD") {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		} else {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		}

		$payment_token = create_payment_token($environment, $accesskey, $secretkey, $paymentData);

		if (empty($error) && isset($payment_token['error'])) {
			$error = 'E55 Payment error. ' . ucfirst($payment_token['error']);
			if (isset($payment_token['error_data'])) {
				foreach ($payment_token['error_data'] as $d)
					$error .= " " . ucfirst($d[0]);
			}
		}

		if (empty($error) && (!isset($payment_token["id"]) || empty($payment_token["id"]))) {
			$error = 'Payment error. ' . 'Layer token ID cannot be empty.';
		}

		if (!empty($payment_token["id"]))
			$payment_token_data = get_payment_token($environment, $accesskey, $secretkey, $payment_token["id"]);

		if (empty($error) && !empty($payment_token_data)) {
			if (isset($layer_payment_token_data['error'])) {
				$error = 'E56 Payment error. ' . $payment_token_data['error'];
			}

			if (empty($error) && $payment_token_data['status'] == "paid") {
				$error = "Layer: this order has already been paid.";
			}

			if (empty($error) && $payment_token_data['amount'] != $paymentData['amount']) {
				$error = "Layer: an amount mismatch occurred.";
			}

			$jsdata['payment_token_id'] = html_entity_decode((string) $payment_token_data['id'], ENT_QUOTES, 'UTF-8');
			$jsdata['accesskey'] = html_entity_decode((string) $accesskey, ENT_QUOTES, 'UTF-8');

			$hash = create_hash(array(
				'layer_pay_token_id' => $payment_token_data['id'],
				'layer_order_amount' => $payment_token_data['amount'],
				'tranid' => $orderid,
			), $accesskey, $secretkey);

			$postData = "<form action='" . base_url('pay/specialresponse') . "' method='post' style='display: none' name='layer_payment_int_form'>
				<input type='hidden' name='layer_pay_token_id' value='" . $payment_token_data['id'] . "'>
				<input type='hidden' name='tranid' value='" . $orderid . "'>
				<input type='hidden' name='layer_order_amount' value='" . $payment_token_data['amount'] . "'>
				<input type='hidden' id='layer_payment_id' name='layer_payment_id' value=''>
				<input type='hidden' id='fallback_url' name='fallback_url' value=''>
				<input type='hidden' name='hash' value='" . $hash . "'>
				</form>";
			$postData .= "<script>";
			$postData .= "var layer_params = " . json_encode($jsdata) . ';';

			$postData .= "</script>";
			$postData .= '<script src="' . base_url('assets/js/layer_checkout.js') . '"></script>';

		}
		$openmoneydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 5,
			'userid' => strval($userid),
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Payment_Gateway_Model->openmoneyentry($openmoneydata);

		$this->load->view('openmoney_checkout', ['postData' => $postData]);
		}
	}

	public function specialresponse()
	{
		
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$this->load->model('Site_Payment_Gateway_Model');
		$this->load->model('Site_Digital_Model');

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');

		$this->load->helper('openmoney_helper');

		$environment = OPENMONEY_MODE;

		if (OPENMONEY_MODE == "PROD") {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		} else {
			$accesskey = OPENMONEY_API_KEY;
			$secretkey = OPENMONEY_API_SECRET;
		}

		if ($_POST['layer_payment_id'] == '') {
			$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'false']);
		}

		$data = array(
			'layer_pay_token_id' => $_POST['layer_pay_token_id'],
			'layer_order_amount' => $_POST['layer_order_amount'],
			'tranid' => $_POST['tranid'],
		);

		if (empty($error) && verify_hash($data, $_POST['hash'], $accesskey, $secretkey) && !empty($data['tranid'])) {
			$payment_data = get_payment_details($environment, $accesskey, $secretkey, $_POST['layer_payment_id']);

			if (isset($payment_data['error'])) {
				$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'false']);
				die;
			}

			if (empty($error) && isset($payment_data['id']) && !empty($payment_data)) {
				if ($payment_data['payment_token']['id'] != $data['layer_pay_token_id']) {
					$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'false']);
				} else {
					if ($payment_data['status'] == 'captured' && $payment_data['payment_token']['status'] == 'paid') {
						$orderid = $payment_data['payment_token']['mtx'];
						$txstatus = $payment_data['status'];
						$referenceid = $payment_data['id'];
						$paymentmode = $payment_data['payment_token']['status'];
						$orderamount = $payment_data['payment_token']['amount'];

						$paymentdata = $this->Site_Payment_Gateway_Model->getopenmoneyentry($orderid);

						$openmoneydata = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'referenceid' => $referenceid,
							'txstatus' => $txstatus,
							'paymentmode' => $paymentmode
						);
						$response1 = $this->Site_Payment_Gateway_Model->updateopenmoneyentry($paymentdata->id, $openmoneydata);

						$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);
						$cardno = random_code(16);

						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'card_number' => $cardno,
							'registration_date' => date('Y-m-d'),
							'expiry_date' => date('Y-m-d', strtotime('+6 months')),
							'amount' => $orderamount,
							'paymentid' => $referenceid,
							'isActive' => 1
						);

						$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

						$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);
						$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'true']);
					} else {
						$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'false']);
					}
				}
			}
		} else {
			$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Special Offer loan */

	/* START : Bumper Offer loan */
	public function bumperpay()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');
		$prores = $this->Site_Info_Model->getproductdetails('bumper-offer');
		$banklist = $this->Site_Info_Model->getbanklist(8);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);

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

		$this->load->model('Site_Info_Model');
		$roipackages = $this->Site_Info_Model->getroipackages(11);

		$this->load->view('bumperpay', ['meta' => $meta, 'productdata' => $productdata, 'roipackages' => $roipackages, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getbumperpay()
	{

		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Payment_Gateway_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('card-offer');
		$get_amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $get_amount + ($get_amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$this->load->model('Site_Digital_Model');
		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('bumperpay');
		} else {

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 25;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 6,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $grandamount,
				'registration_date' => date('Y-m-d'),
				'expiry_date' => date('Y-m-d', strtotime('+6 month')),
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);
			
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$orderId = number_format(microtime(true) * 1000, 0, '.', '');
			$returnUrl = base_url('pay/bumperresponse');

			if (LYRA_MODE == "PROD") {
				$curlurl = "https://api.in.lyra.com/pg/rest/v1/charge";
			} else {
				$curlurl = "https://api.in.lyra.com/pg/rest/v1/charge";
			}

			$postData = array(
				"orderId" => $orderId,
				"currency" => 'INR',
				"amount" => $grandamount * 100,
				"orderInfo" => $productdata->productname,
				"maxAgeInHours" => '240',
				"customer" => array(
					"uid" => $userid,
					"name" => $fullname,
					"emailId" => $emailid,
					"phone" => $mobileno
				),
				"webhook" => array(
					"url" => $returnUrl
				),
				"return" => array(
					"method" => 'POST',
					"url" => $returnUrl,
					"timeout" => '0'
				)
			);
			$this->load->helper('lyra');
			$payurl = getpaymenturl($curlurl, $postData);

			$lyradata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 6,
				'userid' => $userid,
				'orderid' => $orderId,
				'orderamount' => $grandamount,
				'ordernote' => $productdata->productname,
			);

			$response = $this->Site_Payment_Gateway_Model->lyraentry($lyradata);

			if ($payurl) {
				if ($payurl->paymentLink) {
					header("location:" . $payurl->paymentLink);
					die;
				} else {
					return redirect("bumperpay");
					die;
				}
			} else {
				return redirect("bumperpay");
				die;
			}
		}
	}

	public function bumperresponse()
	{

		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Payment_Gateway_Model');
		$this->load->model('Site_Digital_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		if (isset($_POST["vads_order_id"])) {
			$orderId = $_POST["vads_order_id"];
			$orderAmount = $_POST["vads_amount"];
			$responseCode = $_POST["vads_charge_status"];
			$txnId = $_POST["vads_trans_uuid"];


			$paymentdata = $this->Site_Payment_Gateway_Model->getlyraentry($orderId);

			$lyradata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $orderAmount / 100,
				'statuscode' => $responseCode,
				'transactionid' => $txnId
			);
			//log_message('error', '');
			$response1 = $this->Site_Payment_Gateway_Model->updatelyraentry($paymentdata->id, $lyradata);
			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			if ($responseCode == "PAID") {
				$cardno = random_code(16);

				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'amount' => $orderAmount / 100,
					'paymentid' => $txnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('bumperpay-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
				$this->load->view('bumperpay-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('bumperpay-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Bumper Offer loan */

	/* START : Festival Offer loan */
	public function festivalpay()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');
		$prores = $this->Site_Info_Model->getproductdetails('festival-offer');
		$banklist = $this->Site_Info_Model->getbanklist(8);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);

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

		$this->load->model('Site_Info_Model');
		$roipackages = $this->Site_Info_Model->getroipackages(11);

		$this->load->view('festivalpay', ['meta' => $meta, 'productdata' => $productdata, 'roipackages' => $roipackages, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getfestivaloffer()
	{
		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Payment_Gateway_Model');

		$productdata = $this->Site_Info_Model->getproductdetails('festival-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$roundamount = floor($grandamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];
		$this->load->model('Site_Digital_Model');
		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('festivalpay');
		} else {


			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 1;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 7,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $grandamount,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$orderid = number_format(microtime(true) * 1000, 0, '.', '');
			$encData = null;

			if (SABPAISA_MODE == 'PROD') {
				$spDomain = "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
			} else {
				$spDomain = "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
			}

			$returnUrl = base_url('pay/festivalresponse');

			$encData = "?clientCode=" . SABPAISA_CLIENT_CODE . "&transUserName=" . SABPAISA_USERNAME . "&transUserPassword=" . SABPAISA_PASSWORD . "&amount=" . $roundamount . "&amountType=INR&clientTxnId=" . trim($orderid) . "&payerName=" . trim($fullname) . "&payerMobile=" . trim($mobileno) . "&payerEmail=" . trim($emailid) . "&mcc=5137&channelId=#&callbackUrl=" . $returnUrl;

			$this->load->helper('subpaisa');
			$encryptData = encrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $encData);

			$postData = array(
				'clientCode' => SABPAISA_CLIENT_CODE,
				'encryptData' => $encryptData,
				'action' => $spDomain
			);

			$subpaisadata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 7,
				'userid' => $userid,
				'orderid' => $orderid,
				'orderamount' => $roundamount,
				'ordernote' => $productdata->productname
			);
			$response = $this->Site_Payment_Gateway_Model->subpaisaentry($subpaisadata);

			$this->load->view('sabpaisa-checkout', ['postData' => $postData]);
		}
	}

	public function festivalresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if (isset($_REQUEST)) {
			$query = $_REQUEST['encResponse'];
			$query = str_replace("%2B", "+", $query);
			$decText = null;

			$this->load->helper('subpaisa');
			$decText = decrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $query);
			$token = strtok($decText, "&");

			$i = 0;
			while ($token !== false) {
				$i = $i + 1;
				$token1 = strchr($token, "=");
				$token = strtok("&");
				$stringpart = ltrim($token1, "=");

				if ($i == 1) {
					$payerName = $stringpart;
				}
				if ($i == 2) {
					$payerEmail = $stringpart;
				}
				if ($i == 3) {
					$payerMobile = $stringpart;
				}
				if ($i == 4) {
					$clientTxnId = $stringpart;
				}
				if ($i == 6) {
					$amount = $stringpart;
				}
				if ($i == 8) {
					$paidAmount = $stringpart;
				}
				if ($i == 9) {
					$paymentMode = $stringpart;
				}
				if ($i == 10) {
					$bankName = $stringpart;
				}
				if ($i == 12) {
					$status = $stringpart;
				}
				if ($i == 13) {
					$statusCode = $stringpart;
				}
				if ($i == 15) {
					$sabpaisaTxnId = $stringpart;
				}
				if ($i == 20) {
					$bankTxnId = $stringpart;
				}
			}

			$this->load->model('Site_Digital_Model');
			$this->load->model('Site_Payment_Gateway_Model');
			$paymentdata = $this->Site_Payment_Gateway_Model->getsubpaisaentry($clientTxnId);

			$subpaisadata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $sabpaisaTxnId,
				'txstatus' => $status,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Payment_Gateway_Model->updatesubpaisaentry($paymentdata->id, $subpaisadata);

			if ($statusCode == '0000') {
				$userdata = $this->Site_Payment_Gateway_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+6 month')),
					'p ymentid' => $sabpaisaTxnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('festivalpay-response', ['meta' => $meta, 'status' => $response]);
			} else if ($statusCode == '0300') {
				$this->load->view('festivalpay-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('festivalpay-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('festivalpay-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Festival Offer loan */
}
