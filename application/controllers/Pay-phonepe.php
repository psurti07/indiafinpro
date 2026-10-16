<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Pay extends CI_Controller {
	
	public function index(){
		return redirect()->to('Infopage');
	}

	/* START : Card Offer loan */
	public function cardoffer() {
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

		$this->load->view('cardoffer', ['meta' => $meta, 'productdata' => $productdata, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getcardoffer() {
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('card-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

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

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');

		$returnUrl = base_url('pay/cardofferreturn');
		$callbackUrl = base_url('pay/cardoffercallback');

		if (PHONEPE_MODE == "PROD") {
			$curlurl = 'https://api.phonepe.com/apis/hermes/pg/v1/pay';
		} else {
			$curlurl = 'https://api-preprod.phonepe.com/apis/hermes/pg/v1/pay';
		}

		$phonepedata = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'entryfor' => 3,
		 'userid' => $userid,
		 'orderid' => $orderid,
		 'orderamount' => $grandamount,
		 'ordernote' => $productdata->productname
		);
		$this->load->model('Site_Payment_Gateway_Model');
		$response = $this->Site_Payment_Gateway_Model->phonepeentry($phonepedata);

		$data_res = array(
		 "merchantId" => PHONEPE_MID,
		 "merchantTransactionId" => strval($orderid),
		 "merchantUserId" => strval($userid),
		 "amount" => $grandamount * 100,
		 "redirectUrl" => $returnUrl,
		 "redirectMode" => "POST",
		 "callbackUrl" => $callbackUrl,
		 "mobileNumber" => strval($mobileno),
		 "paymentInstrument" => array(
		  "type" => "PAY_PAGE"
		 )
		);

		$this->load->helper('phonepe');
		$payurl = getpaymenturl($curlurl, PHONEPE_KEY, PHONEPE_KEY_INDEX, $data_res);

		if ($payurl) {
			if ($payurl->data->instrumentResponse->redirectInfo->url) {
				header("location:" . $payurl->data->instrumentResponse->redirectInfo->url);
				die;
			} else {
				return redirect("cardoffer");
				die;
			}
		} else {
			return redirect("cardoffer");
			die;
		}
	}

	public function cardofferreturn() {
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');

		if (!isset($_POST["code"]) || !isset($_POST["transactionId"]) || !isset($_POST["providerReferenceId"])) {
			return redirect("cardoffer");
			die;
		}

		$this->load->model('Site_Payment_Gateway_Model');
		$paymentdata = $this->Site_Payment_Gateway_Model->getphonepeentry($_POST["transactionId"]);

		$txStatus = $_POST["code"];
		$transactionId = $_POST["transactionId"];
		$referenceId = $_POST["providerReferenceId"];

		$phonepedata = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'referenceid' => $referenceId,
		 'txstatus' => $txStatus
		);

		$response1 = $this->Site_Payment_Gateway_Model->updatephonepeentry($paymentdata->id, $phonepedata);

		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

		if ($txStatus == "PAYMENT_SUCCESS") {
			$isentry = $this->Site_Digital_Model->checkcardofferentry($referenceId);
			if ($isentry == 0) {
				$cardno = random_code(16);

				$data = array(
				 'rec_date' => date('Y-m-d H:i:s'),
				 'card_number' => $cardno,
				 'registration_date' => date('Y-m-d'),
				 'expiry_date' => date('Y-m-d', strtotime('+6 month')),
				 'amount' => $paymentdata->orderamount,
				 'paymentid' => $referenceId,
				 'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else if ($txStatus == "PAYMENT_FAILURE") {
			$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
			$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
		} else {
			$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
			$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function cardoffercallback() {
		die;
	}
	/* STOP : Card Offer loan */

	/* START : IVRpayment offer loan */
	public function ivrpaymentoffer(){
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

		$this->load->view('ivrpaymentoffer',['meta'=>$meta, 'productdata'=>$productdata, 'banklist'=>$banklist, 'testimoniallist'=>$testimoniallist]);
	}

	public function getivrpaymentoffer() {
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('ivrpayment-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'offerpage' => 4,
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

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');

		$returnUrl = base_url('pay/ivrpaymentreturn');
		$callbackUrl = base_url('pay/ivrpaymentcallback');

		if (PHONEPE_MODE == "PROD") {
			$curlurl = 'https://api.phonepe.com/apis/hermes/pg/v1/pay';
		} else {
			$curlurl = 'https://api-preprod.phonepe.com/apis/hermes/pg/v1/pay';
		}

		$phonepedata = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'entryfor' => 4,
		 'userid' => $userid,
		 'orderid' => $orderid,
		 'orderamount' => $grandamount,
		 'ordernote' => $productdata->productname
		);
		$this->load->model('Site_Payment_Gateway_Model');
		$response = $this->Site_Payment_Gateway_Model->phonepeentry($phonepedata);

		$data_res = array(
		 "merchantId" => PHONEPE_MID,
		 "merchantTransactionId" => strval($orderid),
		 "merchantUserId" => strval($userid),
		 "amount" => $grandamount * 100,
		 "redirectUrl" => $returnUrl,
		 "redirectMode" => "POST",
		 "callbackUrl" => $callbackUrl,
		 "mobileNumber" => strval($mobileno),
		 "paymentInstrument" => array(
		  "type" => "PAY_PAGE"
		 )
		);

		$this->load->helper('phonepe');
		$payurl = getpaymenturl($curlurl, PHONEPE_KEY, PHONEPE_KEY_INDEX, $data_res);

		if ($payurl) {
			if ($payurl->data->instrumentResponse->redirectInfo->url) {
				header("location:" . $payurl->data->instrumentResponse->redirectInfo->url);
				die;
			} else {
				return redirect("ivrpaymentoffer");
				die;
			}
		} else {
			return redirect("ivrpaymentoffer");
			die;
		}
	}

	public function ivrpaymentreturn() {
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');

		if (!isset($_POST["code"]) || !isset($_POST["transactionId"]) || !isset($_POST["providerReferenceId"])) {
			return redirect("ivrpaymentoffer");
			die;
		}

		$this->load->model('Site_Payment_Gateway_Model');
		$paymentdata = $this->Site_Payment_Gateway_Model->getphonepeentry($_POST["transactionId"]);

		$txStatus = $_POST["code"];
		$transactionId = $_POST["transactionId"];
		$referenceId = $_POST["providerReferenceId"];

		$phonepedata = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'referenceid' => $referenceId,
		 'txstatus' => $txStatus
		);

		$response1 = $this->Site_Payment_Gateway_Model->updatephonepeentry($paymentdata->id, $phonepedata);

		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

		if ($txStatus == "PAYMENT_SUCCESS") {
			$isentry = $this->Site_Digital_Model->checkcardofferentry($referenceId);
			if ($isentry == 0) {
				$cardno = random_code(16);

				$data = array(
				 'rec_date' => date('Y-m-d H:i:s'),
				 'card_number' => $cardno,
				 'registration_date' => date('Y-m-d'),
				 'expiry_date' => date('Y-m-d', strtotime('+6 month')),
				 'amount' => $paymentdata->orderamount,
				 'paymentid' => $referenceId,
				 'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('ivrpaymentoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('ivrpaymentoffer-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else if ($txStatus == "PAYMENT_FAILURE") {
			$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
			$this->load->view('ivrpaymentoffer-response', ['meta' => $meta, 'status' => 'false']);
		} else {
			$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
			$this->load->view('ivrpaymentoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function ivrpaymentcallback() {
		die;
	}
	/* STOP : IVRpayment offer loan */
}
?>