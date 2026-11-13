<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

function send_order_data($data, $entry_from = 'direct_api')
{
	$endpoints = [
		'direct_api' => 'https://bizfin.indiakarobar.com/api/channel-partners/turnover', // automatic
		'manual_api' => 'https://bizfin.indiakarobar.com/api/channel-partners/syncInvoiceData' // manual
	];

	$curl_url = $endpoints[$entry_from] ?? $endpoints['direct_api'];

	$curl = curl_init();
	curl_setopt_array($curl, [
		CURLOPT_URL            => $curl_url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING       => '',
		CURLOPT_MAXREDIRS      => 5,
		CURLOPT_TIMEOUT        => 60,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST  => 'POST',
		CURLOPT_POSTFIELDS     => $data,
		CURLOPT_HTTPHEADER     => [
			'Content-Type: application/json',
			'Accept: application/json'
		],
	]);

	$response   = curl_exec($curl);
	$http_code  = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$curl_error = curl_error($curl);
	curl_close($curl);

	// ✅ Error Handling
	if ($curl_error) {
		log_message('error', "send_order_data: CURL error ($curl_url) => " . $curl_error);
		return [
			'status'  => 'error',
			'message' => $curl_error
		];
	}

	if ($http_code >= 400) {
		log_message('error', "send_order_data: HTTP $http_code ($curl_url) => " . $response);
		return [
			'status'  => 'error',
			'http'    => $http_code,
			'message' => $response
		];
	}

	// ✅ Decode JSON safely
	$decoded = json_decode($response, true);
	if (json_last_error() === JSON_ERROR_NONE) {
		log_message('info', "send_order_data: Success ($curl_url)");
		return [
			'status'  => 'success',
			'http'    => $http_code,
			'data'    => $decoded
		];
	} else {
		log_message('warning', "send_order_data: Non-JSON response ($curl_url) => " . $response);
		return [
			'status'  => 'success',
			'http'    => $http_code,
			'data'    => $response
		];
	}
}

function getFacebookPixel() {
    $value = null;
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('option_value');
    $ci->db->where('option_key', 'facebookpixel');
    $cirow = $ci->db->get('site_options')->row();

    if($cirow != "") {
        if($cirow->option_value != "") {
            $value = $cirow->option_value;
        }
    }
    return $value;
}

function getFacebookDomain() {
    $value = null;
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('option_value');
    $ci->db->where('option_key', 'facebookdomain');
    $cirow = $ci->db->get('site_options')->row();

    if($cirow != "") {
        if($cirow->option_value != "") {
            $value = $cirow->option_value;
        } 
    } 
    return $value;
}

function getSMSsenderid() {
    $value = null;
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('option_value');
    $ci->db->where('option_key', 'smssenderid');
    $cirow = $ci->db->get('site_options')->row();

    if($cirow != "") {
        if($cirow->option_value != "") {
            $value = $cirow->option_value;
        }
    }
    return $value;
}

function sendxmlSMS($dataset) {
    $smssenderid = getSMSsenderid();

    $xmldataset = "<SmsQueue><Account><APIKey>".SMS_API_KEY."</APIKey><SenderId>".$smssenderid."</SenderId><Channel>2</Channel><DCS>0</DCS><FlashSms>0</FlashSms><Route>1</Route></Account><Messages>".$dataset."</Messages></SmsQueue>";

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.smsgatewayhub.com/api/mt/SendSms",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $xmldataset,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/xml"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    /*if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }*/
    
    return $response;
}

function senddynamicSMS($mobile, $message) {
    $sms_text = urlencode($message);
    $smssenderid = getSMSsenderid();

    $api_url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=".SMS_API_KEY."&senderid=".$smssenderid."&channel=2&DCS=0&flashsms=0&number=".$mobile."&text=".$sms_text."&route=";

    //Submit to server
    $response = file_get_contents($api_url);
    return $response;
}

function sendtextSMS($mobile, $message) {
    $sms_text = urlencode($message);

    $api_url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=".SMS_API_KEY."&senderid=".SMS_SENDER_ID."&channel=2&DCS=0&flashsms=0&number=".$mobile."&text=".$sms_text."&route=";

    //Submit to server
    $response = file_get_contents($api_url);
    return $response;
}

function sendotpSMS($mobile, $message) {
    $sms_text = urlencode($message);
    
     $api_url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=".SMS_API_KEY."&senderid=".SMS_SENDER_ID."&channel=2&DCS=0&flashsms=0&number=".$mobile."&text=".$sms_text."&route=";

    //Submit to server
    $response = file_get_contents($api_url);
    return $response;
}

function sendxmlSMSobb($dataset) {
    $smssenderid = getSMSsenderid();

    $xmldataset = "<?xml version='1.0'?><smslist>".$dataset."</smslist>";

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://m.onlinebusinessbazaar.in/sendsms.jsp?",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST => 1,
      CURLOPT_ENCODING => 'UTF-8',
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => 1,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $xmldataset,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/xml"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    /*if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }*/
    
    return $response;
}

function sendotpSMSobb($mobile, $message) {
    $sms_text = urlencode($message);
    
    $api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=".SMS_OBB_USERNAME."&password=".SMS_OBB_API_KEY."&senderid=".SMS_OBB_SENDER_ID."&mobiles=".$mobile."&sms=".$sms_text;
    
    //Submit to server
    $response = file_get_contents($api_url);
    return $response;
}

function senddynamicSMSobb($mobile, $message) {
    $sms_text = urlencode($message);
    $smssenderid = getSMSsenderid();

    $api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=".SMS_OBB_USERNAME."&password=".SMS_OBB_API_KEY."&senderid=".$smssenderid."&mobiles=".$mobile."&sms=".$sms_text;
    
    //Submit to server
    $response = file_get_contents($api_url);
    return $response;
}

function sendtextSMSobb($mobile, $message) {
    $sms_text = urlencode($message);

    $api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=".SMS_OBB_USERNAME."&password=".SMS_OBB_API_KEY."&senderid=".SMS_OBB_SENDER_ID."&mobiles=".$mobile."&sms=".$sms_text;

    //Submit to server
    $response = file_get_contents($api_url);
    return $response;
}

function sendinblueHTMLmail($userdata, $subject="", $htmlmessage="") {
    // POST Data
    $data["sender"]["name"] = SIB_NAME;
	  $data["sender"]["email"] = SMTP_USER;
    
    //$data["replyTo"]["name"] = SIB_NAME;
    //$data["replyTo"]["email"] = SIB_EMAILID;
    
    $user_res["name"] = $userdata["fullname"];
	  $user_res["email"] = $userdata["email"];
    // $userdata[] = $user_res;
    $data["to"][] = $userdata;

    $data["subject"] = $subject;
    $data["htmlContent"] = $htmlmessage;

    // Turn Data to JSON
    $data_json = json_encode($data);

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>  $data_json,
      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Content-Type: application/json",
        "api-key: ".SIB_APIKEY
      ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    /*if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }*/

    return $response;
}

function sendinblueTemplatemail($emailist, $templateid="") {
    // POST Data
    $data["emailTo"] = $emailist;
    $data["replyTo"] = SIB_EMAILID;

    // Turn Data to JSON
    $data_json = json_encode($data);

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/templates/".$templateid."/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>  $data_json,
      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Content-Type: application/json",
        "api-key: ".SIB_APIKEY
      ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    /*if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }*/

    return $response;
}

function sendHTMLmail($to, $from, $subject, $message, $smtpemail = '', $attachfile = '') {
    switch ($smtpemail) {
      case '1':
        $smtpuser = SMTP_USER_INFO;
        $smtppassword = SMTP_PASSWORD_INFO;
        break;
      
      case '2':
        $smtpuser = SMTP_USER_SUPPORT;
        $smtppassword = SMTP_PASSWORD_SUPPORT;
        break;

      case '3':
        $smtpuser = SMTP_USER_HR;
        $smtppassword = SMTP_PASSWORD_HR;
        break;

      case '4':
        $smtpuser = SMTP_USER_PARTNER;
        $smtppassword = SMTP_PASSWORD_PARTNER;
        break;

      default:
        $smtpuser = SMTP_USER_INFO;
        $smtppassword = SMTP_PASSWORD_INFO;
        break;
    }
    
    $config = array();
    $config['protocol']     = 'smtp';
    $config['smtp_host']    = SMTP_HOST;
    $config['smtp_port']    = '587';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = $smtpuser;
    $config['smtp_pass']    = $smtppassword;
    $config['charset']      = 'utf-8';
    $config['newline']      = "\r\n";
    $config['mailtype']     = 'html'; // or html
    $config['validation']   = TRUE;
    $config['wordwrap']     = TRUE;

    $ci = get_instance();
    $ci->email->initialize($config);
    $ci->email->from($from, 'indiafinpro.com');
    $ci->email->to($to);
    $ci->email->subject($subject);
    $ci->email->message($message);
    $ci->email->set_crlf("\r\n");
    
    if($attachfile != '') {
        $ci->email->attach($attachfile);
    }
    $ci->email->send();
    
    return true;
    /*if($ci->email->send()) {
      return true;
    }
    else { 
      show_error($ci->email->print_debugger());
      return false;
    }*/
}

function getLoanStatusMsg($statusid = 0) {
    $option = "";
    $ci =& get_instance();
    $ci->load->database();
    $ci->db->select('title, remarks');
    $ci->db->where('statusid',$statusid);
    $ci->db->where('isDelete',0);
    $statusmsg = $ci->db->get('loanstatus_remarks')->result();

    $option .= "<option value=''>Select Option</option>";

    foreach($statusmsg as $row){
            $option .= "<option ";
            $option .= " value=\"".$row->remarks."\"";
            $option .= " >";
            $option .= $row->title;
            $option .= "</option>";
        }
    return $option;
}

function aisensy_track($postdata) {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://backend.aisensy.com/campaign/t1/api/v2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($postdata),
      CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    return true;
}

function interakt_track($postdata)
{
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($postdata),
  CURLOPT_HTTPHEADER => [
    "Authorization: Basic " . INTERAKT_KEY,
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

return $response;
}

?>
