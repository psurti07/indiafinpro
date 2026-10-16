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

	/* START : IVRpayment Offer loan */
	public function ivrpaymentoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');
		$prores = $this->Site_Info_Model->getproductdetails('ivrpayment-offer');
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

		$this->load->view('ivrpaymentoffer', ['meta' => $meta, 'productdata' => $productdata, 'roipackages' => $roipackages, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getivrpaymentoffer()
	{
		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Payment_Gateway_Model');

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
		$successURL = base_url('pay/ivrpaymentresponse');
		$failURL = base_url('ivrpaymentoffer');

		$razorpaydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
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

	public function ivrpaymentresponse()
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

				$this->load->view('ivrpaymentoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('ivrpaymentoffer-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else {
			$this->load->view('ivrpaymentoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : IVRpayment Offer loan */
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
		$roundamout = floor($grandamount);
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
					$roundamout = 1;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 5,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $roundamout,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);

			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$receiptid = number_format(microtime(true) * 1000, 0, '.', '');

			$orderdata = array(
				'amount' => $roundamout * 100,
				'currency' => 'INR',
				'receipt' => $receiptid,
				'notes' => array(
					'key1' => $fullname,
					'key2' => $mobileno
				)
			);

			$this->load->helper('razorpay');
			$orderres = generateorder($orderdata);
			$successURL = base_url('pay/specialresponse');
			$failURL = base_url('specialpay');

			$razorpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 5,
				'userid' => $userid,
				'orderid' => $orderres->id,
				'orderamount' => $roundamout,
				'ordernote' => $productdata->productname
			);

			$this->load->model('Site_Payment_Gateway_Model');
			$razorpayentry = $this->Site_Payment_Gateway_Model->razorpayentry($razorpaydata);

			$postData = array(
				'applyid' => $userid,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'email' => $emailid,
				'orderamount' => $roundamout,
				'orderid' => $orderres->id,
				'description' => $productdata->productname,
				'successURL' => $successURL,
				'failURL' => $failURL
			);

			$this->load->view('razorpay-checkout', ['postData' => $postData]);
		}
	}

	public function specialresponse()
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

				$this->load->view('specialpay-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else {
			$this->load->view('specialpay-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Special Offer loan */
	/* START : Bumper Offer loan */
	public function bumperoffer()
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

		$this->load->view('bumperoffer', ['meta' => $meta, 'productdata' => $productdata, 'roipackages' => $roipackages, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function getbumperoffer()
	{
		$this->load->model('Site_Info_Model');
		$this->load->model('Site_Payment_Gateway_Model');

		$productdata = $this->Site_Info_Model->getproductdetails('bumper-offer');
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
			'offerpage' => 6,
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
		$successURL = base_url('pay/bumperresponse');
		$failURL = base_url('bumperoffer');

		$razorpaydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 6,
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

	public function bumperresponse()
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

				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'true']);
			}
		} else {
			$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Bumper Offer loan */
}
?>