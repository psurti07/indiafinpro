<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pay extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}


	/* START : IVRpayment offer loan */
	public function ivrpaymentoffer(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');
		$prores = $this->Site_Info_Model->getproductdetails('ivrpayment-offer');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$banklist = $this->Site_Info_Model->getbanklist(8);

		if($prores->inOffer == 1) {
			$productdata = array(
				'inOffer' => $prores->inOffer,
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')).' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		}
		else {
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

	public function getivrpaymentoffer(){
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('ivrpayment-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$roundamount = floor($grandamount);
		
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

		$orderid = number_format(microtime(true)*1000,0,'.','');
		$encData = null;

		if(SABPAISA_MODE == 'PROD') {
			$spDomain = "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		}
		else {
			$spDomain = "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		}

		$returnUrl = base_url('pay/ivrpaymentresponse');

		$encData = "?clientCode=".SABPAISA_CLIENT_CODE."&transUserName=".SABPAISA_USERNAME."&transUserPassword=".SABPAISA_PASSWORD."&amount=".$roundamount."&amountType=INR&clientTxnId=".$orderid."&payerName=".trim($fullname)."&payerMobile=".$mobileno."&payerEmail=".trim($emailid)."&mcc=5137&channelId=#&callbackUrl=".$returnUrl;

		$this->load->helper('subpaisa');
		$encryptData = encrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $encData); 

		$postData = array(
            'clientCode' => SABPAISA_CLIENT_CODE,
            'encryptData' => $encryptData,
            'action' => $spDomain        
        );

		$subpaisadata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $roundamount,
			'ordernote' => 'ivrpayment Offer'
		);

		$this->load->model('Site_Payment_Gateway_Model');
		$response = $this->Site_Payment_Gateway_Model->subpaisaentry($subpaisadata);
		$this->load->view('sabpaisa-checkout', ['postData'=>$postData]);
	}

	public function ivrpaymentresponse(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if(isset($_REQUEST)) {
			$query = $_REQUEST['encResponse'];
			$query = str_replace("%2B","+",$query);
			$decText = null;

			$this->load->helper('subpaisa');
			$decText = decrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $query); 
			$token = strtok($decText,"&");
			
			$i=0;
			while($token !== false) {
			  $i=$i+1;
			  $token1 = strchr($token, "=");
			  $token = strtok("&");
			  $stringpart = ltrim($token1,"=");

				if($i==1) {
				  $payerName = $stringpart;
				}
				if($i==2) {
				  $payerEmail = $stringpart;
				}
				if($i==3) {
				  $payerMobile = $stringpart;
				}
				if($i==4) {
				  $clientTxnId = $stringpart;
				}
				if($i==6) {
				  $amount = $stringpart;
				}
				if($i==8) {
				  $paidAmount = $stringpart;
				}
				if($i==9) {
				  $paymentMode = $stringpart;
				}
				if($i==10) {
				  $bankName = $stringpart;
				}
				if($i==12) {
				  $status = $stringpart;  
				}
				if($i==13) { 
				  $statusCode = $stringpart; 
				}
				if($i==15) {
				  $sabpaisaTxnId = $stringpart;
				}
				if($i==20) {
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

			if($statusCode == '0000') {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+6 month')),
					'paymentid' => $sabpaisaTxnId,
					'isActive' => 1
				);
				
				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);
				
				$this->load->view('ivrpaymentoffer-response', ['meta'=>$meta, 'status'=>$response]);
			}
			else if($statusCode == '0300') {
				$this->load->view('ivrpaymentoffer-response', ['meta'=>$meta, 'status'=>'false']);
			}
			else {
				$this->load->view('ivrpaymentoffer-response', ['meta'=>$meta, 'status'=>'false']);
			}
		} 
		else {
			$this->load->view('ivrpaymentoffer-response', ['meta'=>$meta, 'status'=>'false']);
		}
	}
	/* STOP : IVRpayment offer loan */
	/* START : Festival Offer loan */
	public function festivaloffer()
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

		$this->load->view('festivaloffer', ['meta' => $meta, 'productdata' => $productdata, 'roipackages' => $roipackages, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
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

		$this->load->model('Site_Digital_Model');
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
					'paymentid' => $sabpaisaTxnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('festivaloffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($statusCode == '0300') {
				$this->load->view('festivaloffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('festivaloffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('festivaloffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
	/* END : Festival Offer loan */
}
?>