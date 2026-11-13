<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PayGIntegration Base Controller
 *
 * Class PayGIntegration
 * 
 */
class PayGIntegration {
	/** @var string This Request URL */
	private  $paymentURL = 'https://paygapi.payg.in/payment/api/order';
	/** @var string AuthenticationKey For Payment Provided By Gateway */
	private  $AuthenticationKey = '08a436ed43cd44d587c3cb656309bb30'; 
	/** @var string AuthenticationToken For Payment Provided By Gateway */
	private  $AuthenticationToken  ='2db2661c3d934903aaa5c431d5996e18';
	/** @var  string SecureHashKey For Payment Provided By Gateway */
	private  $SecureHashKey  = '0c748a3caa774948a8863a82950bb311';
	/** @var  string MerchantKeyId For Payment Provided By Gateway. */
	private  $MerchantKeyId = '22165';
	/** @var  Integer Time Out For Curl Session. */
	private $timeout = 30;
	
	/**
	 * Sets the genrate random string 10 charactor (mandatory).
	 *
	 * @param string $length Default 10 charactor .
	 * @return 10 charactor radom string 
	 */

	public static function generateRandomString($length = 10) {

		/*$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;*/
		

    // md5 the timestamps and returns substring 
    // of specified length 
		return substr(md5(time()), 0, $length);
	}
	

	/**
	 * Sets Create new customer order for request
	 *
	 * @param PayGIntegration – <MerchantAuthenticationKey>:<MerchantAuthenticationToken>:M:<MerchantKeyId> in base64_encode.
	 * Required Fields 
	 *	Merchantkeyid integer (10) Id which is obtained on MerchantRegistration Mandatory
	 *	UniqueRequestId string(10) Unique Id generated for that particular Request Mandatory
	 *	OrderAmount decimal(18,2) Transaction Amount Mandatory
	 * @return Response Json Object With OrderKeyId and Payment Url
	 */

	public function orderCreate($postdata, $uniqueid, $redirectUrl) {
			/**
	 			* Set Form data in array to pass in request
	 		*/
			$arrData  = array(
				'Merchantkeyid' => $this->MerchantKeyId,
				'UniqueRequestId'=>$uniqueid,
				'UserDefinedData'=>array('UserDefined1' =>'' ),
			 	//'IntegrationData'=> array('UserName' => 'JoeSmith','Source'=>'','IntegrationType'=>'','HashData'=>'','PlatformId'=>'' ),
			 	'RequestDateTime'=> date('mdY'),
				'RedirectUrl' => $redirectUrl,
				'TransactionData'=> array(
					'AcceptedPaymentTypes' =>'' ,
					'PaymentType'=>'', 
					'SurchargeType'=>'',
					'SurchargeValue'=>'',
					'RefTransactionId'=>'',
					'IndustrySpecificationCode'=>'',
					'PartialPaymentOption'=>''
				 ),

			);
			/**
	 			* Set Form data in array to pass in request
	 		*/
			foreach ($postdata as $key => $keyval) {
				if($key == 'CustomerData'){
					foreach ($keyval as $cust_key => $cust_keyval) {
						$arrData[$key][$cust_key] = $cust_keyval;
					}
				}
			/**
	 			* Set Order Amount Data 
	 		*/
				if($key == 'OrderAmountData'){
					foreach ($keyval as $orderamount_key => $orderamount_keyval) {
						$arrData[$key][$orderamount_key] = $orderamount_keyval;
					}
				}
			/**
	 			* Set Integration data in array to pass in request
	 		*/	
				if($key == 'IntegrationData'){
					foreach ($keyval as $integrationdata_key => $integrationdata_keyval) {
						$arrData[$key][$integrationdata_key] = $integrationdata_keyval;
					}
				}

				
				$arrData[$key] = $keyval;
			}
		
		$header = array(
		    'Content-Type: application/json',
		    'Authorization: Basic '. base64_encode($this->AuthenticationKey.":".$this->AuthenticationToken.":M:".$this->MerchantKeyId)
		);
		
		//form data json encode 
		$arrDatajson = json_encode($arrData);
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->paymentURL.'/create',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>$arrDatajson,
		CURLOPT_HTTPHEADER => $header,
		));
		$response = curl_exec($curl);
		if(curl_errno($curl)){
       		throw new Exception(curl_error($curl));
   		}
		curl_close($curl);
		return $response;
	}

	public  function orderUpdate($postdata,$orderKeyID)
	{
			$arrData  = array(
				'Merchantkeyid' => $this->MerchantKeyId,
				'UniqueRequestId'=>PayGIntegration::generateRandomString(),
				'OrderKeyId'=>$orderKeyID,
				'UserDefinedData'=>array('UserDefined1' =>'' ),
			 	'IntegrationData'=> array('UserName' => 'JoeSmith','Source'=>'','IntegrationType'=>'','HashData'=>'','PlatformId'=>'' ),
			 	'RequestDateTime'=>'09212020',
				'RedirectUrl' => 'https://a2zfame.com',
				'TransactionData'=> array(
					'AcceptedPaymentTypes' =>'' ,
					'PaymentType'=>'',
					'SurchargeType'=>'',
					'SurchargeValue'=>'',
					'RefTransactionId'=>'',
					'IndustrySpecificationCode'=>'',
					'PartialPaymentOption'=>''
				 ),

			);
			/**
	 			* Set Form data in array to pass in request
	 		*/
			foreach ($postdata as $key => $keyval) {
				if($key == 'CustomerData'){
					foreach ($keyval as $cust_key => $cust_keyval) {
						$arrData[$key][$cust_key] = $cust_keyval;
					}
				}
				$arrData[$key] = $keyval;
			}
			$header = array(
				
				'Content-Type: application/json',
				'Authorization: Basic '. base64_encode($this->AuthenticationKey.":".$this->AuthenticationToken.":M:".$this->MerchantKeyId)
			);	
			
			$arrDatajson = json_encode($arrData);
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $this->paymentURL.'/Update',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "PUT",
			  CURLOPT_POSTFIELDS =>$arrDatajson,
			  CURLOPT_HTTPHEADER => $header,
			));

			$response = curl_exec($curl);
			
			curl_close($curl);
			return  $response;
	}

	public  function orderDetail($OrderKeyId = null ,$PaymentTransactionId = null,$PaymentType = null)
	{
		$header = array(
		    'Content-Type: application/json',
		    'Authorization: Basic '. base64_encode($this->AuthenticationKey.":".$this->AuthenticationToken.":M:".$this->MerchantKeyId)
			);
		
		$arrData = array('OrderKeyId' =>$OrderKeyId,'MerchantKeyId'=>$this->MerchantKeyId,'PaymentType'=>$PaymentType);

		$arrDatajson = json_encode($arrData);
		/*echo "<pre>";
		print_r($arrDatajson);
		die;*/
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->paymentURL.'/Detail',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>$arrDatajson,
		  CURLOPT_HTTPHEADER => $header,
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}




}