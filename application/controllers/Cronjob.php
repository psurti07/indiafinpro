<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cronjob extends CI_Controller
{

	public function index() {
		return redirect()->to('Infopage');
	}

	/* Online loan customer marketing message */
	public function onlineremarketing() {
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '15 17 * * *';
		
		$cronjobs['a1'] = '0 10 * * *';
		$cronjobs['b1'] = '0 18 * * *';
		
		$cronjobs['a2'] = '15 11 * * *';
		
		$cronjobs['a3'] = '15 12 * * *';

		$cronjobs['a6'] = '15 13 * * *';

		$cronjobs['a9'] = '15 14 * * *';
		
		$cronjobs['a12'] = '15 15 * * *';

		$cronjobs['a15'] = '15 16 * * *';

		$cronjobs['a17'] = '15 10 * * *';

		$cronjobs['a20'] = '15 17 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$schedule_arr[] = $schedule;
			}
		}

		if (!empty($schedule_arr)) {
			$response = $this->Site_Cronjob_Model->online_marketing_message($schedule_arr);
		}
		die;
	}
	/* Online loan customer marketing message */

	/* Whatsapp marketing message */
	public function whatsappremarketing() {
		
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '0 14 * * *';

		$cronjobs['a1'] = '15 7 * * *';

		$cronjobs['a2'] = '15 11 * * *';

		$cronjobs['a3'] = '15 12 * * *';

		$cronjobs['a6'] = '15 13 * * *';

		$cronjobs['a9'] = '15 14 * * *';

		$cronjobs['a12'] = '15 15 * * *';

		$cronjobs['a15'] = '15 16 * * *';

		$cronjobs['a17'] = '15 10 * * *';

		$cronjobs['a20'] = '15 17 * * *';


		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$schedule_arr[] = $schedule;
			}
		}

		if (!empty($schedule_arr)) {
			$response = $this->Site_Cronjob_Model->whatsapp_marketing_message($schedule_arr);
		}
		die;
	}
	/* Whatsapp marketing message */

	/* Whatsapp marketing message */
	public function whatsappremarketing_new() {
		
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '0 11 * * *';


		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$schedule_arr[] = $schedule;
			}
		}

		if (!empty($schedule_arr)) {
			$response = $this->Site_Cronjob_Model->whatsapp_marketing_message_new($schedule_arr);
		}
		die;
	}
	/* Whatsapp marketing message */

	/* Customer support message */
	public function customersupportmsg() {
		$this->load->model('Site_Cronjob_Model');
		$schedule = '9999';

		$cronjobs = array();
		$cronjobs[] = "0 10 * * *";
		$cronjobs[] = "0 14 * * *";
		$cronjobs[] = "0 18 * * *";

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$response = $this->Site_Cronjob_Model->customer_support_message();
			}
		}

		die;
	}
	/* Customer support message */

	/* Customer reapply eligible message */
	public function customerreapply() {
		$this->load->model('Site_Cronjob_Model');
		$response = $this->Site_Cronjob_Model->customer_reapplyeligible();
		die;
	}
	/* Customer reapply eligible message */

	/* Whatsapp marketing message */
	public function intrekt_whatsappremarketing() {
		
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '0 23 * * *';

		$cronjobs['a1'] = '15 6 * * *';

		$cronjobs['a2'] = '15 23 * * *';

		$cronjobs['a3'] = '15 21 * * *';

		$cronjobs['a4'] = '15 20 * * *';

		$cronjobs['a8'] = '15 19 * * *';

		$cronjobs['a10'] = '15 18 * * *';


		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->intrekt_marketing_message($schedule);
			}
		}
		die;
	}
	/* Whatsapp marketing message */

}
?>