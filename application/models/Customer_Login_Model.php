<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Customer_Login_Model extends CI_Model
{

	public function checklogin($mobile, $password)
	{

		$account = $this->db->select('id, rec_date, fullname, mobile, email')
			->where('mobile', $mobile)
			->where('password', $password)
			->where('isUser', 2)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('user_registration')
			->row();


		return $account;
	}

	public function checkaccountvalidity($userid)
	{

		$account = $this->db->select('id, registration_date, expiry_date, card_number')
			->where('userid', $userid)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('subscription_order')
			->row();


		return $account;
	}

	public function loginlog($id)
	{

		$data = array(
			'customerid' => $id,
			'login_at' => date('Y-m-d H:i:s'),
			'server_ip' => getUserIpAddr()
		);
		$this->db->insert('customer_log', $data);
		$this->session->set_userdata('mfb-customerlogid', $this->db->insert_id());


		return true;
	}

	public function updatecustomerlog($customerlogid)
	{

		$data = array(
			'logout_at' => date('Y-m-d H:i:s'),
		);

		$sql_query = $this->db->where('id', $customerlogid)
			->update('customer_log', $data);


		return true;
	}

	public function passwordForgetmsg($mobile)
	{

		$account = $this->db->where('mobile', $mobile)
			->where('isUser', 2)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('user_registration')
			->row();

		if ($account) {
			/* $lastentry = dateDiffInMinutes($account->update_date, date('Y-m-d H:i:s'));

			if ($lastentry > 30) { */
				$password = random_code(6);
				$encpassword = stringCrypt($password, 'encrypt');

				$data = array(
					'update_date' => date('Y-m-d H:i:s'),
					'password' => $encpassword,
				);

				$sql_query = $this->db->where('id', $account->id)
					->update('user_registration', $data);

				// Send SMS
				$message = "Hello " . $account->fullname . " Your indiafinpro account's new password is " . $password . " Do not share it with anyone. Thanks, indiafinpro";
				$smsresponse = sendtextSMSobb($account->mobile, $message);


				return true;
			/* } else {

				return false;
			} */
		} else {

			return false;
		}
	}

}
?>
