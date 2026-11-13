<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Report_Model extends CI_Model
{

	public function getdashcustomerdata()
	{

		$query = $this->db->select('year(rec_date) as recyear,month(rec_date) as recmonth, day(rec_date) as recday, count(id) as totaluser')
			->where('isUser', 2)
			->where('isDelete', 0)
			->group_by('year(rec_date)')
			->group_by('month(rec_date)')
			->group_by('day(rec_date)')
			->order_by('year(rec_date) desc')
			->order_by('month(rec_date) desc')
			->order_by('day(rec_date) desc')
			->limit(15)
			->get('user_registration')
			->result();


		return $query;
	}

	public function getcustomersReportDaywise($month, $year)
	{

		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = $resdata = array();
		$currentDate = $startDate;
		$inc = 0;
		while ($currentDate <= $endDate) {
			$allDates[$inc]['formatted_date'] = $currentDate;
			$allDates[$inc]['recdate'] = displayDate($currentDate);
			$allDates[$inc]['totaluser'] = 0;
			$currentDate = date('Y-m-d', strtotime("$currentDate +1 day"));
			$inc++;
		}

		$query = $this->db->select('DATE_FORMAT(rec_date, "%Y-%m-%d") AS formatted_date, year(rec_date) as recyear, month(rec_date) as monthno, MONTHNAME(rec_date) as recmonth, rec_date AS recdate, count(id) as totaluser')
			->where('isUser', 2)
			->where('isDelete', 0)
			->where("DATE(rec_date) >=", $startDate)
			->where("DATE(rec_date) <=", $endDate)
			->group_by('DATE(rec_date)')
			->order_by('rec_date asc')
			->get('user_registration')
			->result();

		if (count($allDates)) {
			foreach ($allDates as $key => $value) {
				foreach ($query as $r1) {
					if ($allDates[$key]['formatted_date'] == $r1->formatted_date && $r1->totaluser != 0) {
						$allDates[$key]['totaluser'] = $r1->totaluser;
					}
				}
			}
		}


		return $allDates;
	}
	public function getdashleaddata()
	{

		$query = $this->db->select('year(update_date) as recyear,month(update_date) as recmonth, day(update_date) as recday, count(id) as totaluser')
			->where('isUser !=', 2)
			->where('isDelete', 0)
			->group_by('year(update_date)')
			->group_by('month(update_date)')
			->group_by('day(update_date)')
			->order_by('year(update_date) desc')
			->order_by('month(update_date) desc')
			->order_by('day(update_date) desc')
			->limit(15)
			->get('user_registration')
			->result();


		return $query;
	}

	public function digitalloanstatistics()
	{

		$statistics_res = [];

		/* Online Loan */
		$query_digital = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid', NULL)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['digitalloans'] = $query_digital->num_rows();

		$query_digitalpl = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->join('user_application a', 'a.userid = r.id')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid', NULL)
			->where('a.loantype', 11)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['digitalpersonal'] = $query_digitalpl->num_rows();

		$query_digitalbl = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->join('user_application a', 'a.userid = r.id')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid', NULL)
			->where('a.loantype', 12)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['digitalbusiness'] = $query_digitalbl->num_rows();
		/* Online Loan */

		$query_otps = $this->db->select('id')
			->where('rec_date', date('Y-m-d'))
			->get('otpverification');
		$statistics_res['otpmessage'] = $query_otps->num_rows();

		$query_otps = $this->db->select('id')
			->where('status', 1)
			->where('isDelete', 0)
			->get('support_request');
		$statistics_res['openticket'] = $query_otps->num_rows();


		return $statistics_res;
	}

	public function membercarddata()
	{

		$statistics_res = [];

		$query_premium = $this->db->select('r.id')
			->from('user_registration r')
			->join('subscription_order m', 'm.userid=r.id')
			->where("CAST(m.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('r.cardtype', 11)
			->where('m.isDelete', 0)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['personalplans'] = $query_premium->num_rows();

		$query_platinum = $this->db->select('r.id')
			->from('user_registration r')
			->join('subscription_order m', 'm.userid=r.id')
			->where("CAST(m.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('r.cardtype', 12)
			->where('m.isDelete', 0)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['businessplans'] = $query_platinum->num_rows();

		return $statistics_res;
	}

	public function getdigitalleadReportDaywise($loantype, $month, $year)
	{

		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = $resdata = array();
		$currentDate = $startDate;
		$inc = 0;
		while ($currentDate <= $endDate) {
			$allDates[$inc]['formatted_date'] = $currentDate;
			$allDates[$inc]['recdate'] = displayDate($currentDate);
			$allDates[$inc]['totaluser'] = 0;
			$currentDate = date('Y-m-d', strtotime("$currentDate +1 day"));
			$inc++;
		}

		if ($loantype == 'pl') {
			$where = " a.loantype=11 ";
		} else if ($loantype == 'bl') {
			$where = " a.loantype=12 ";
		} else {
			$where = " a.loantype=11 or a.loantype=12 ";
		}

		$query = $this->db->select('DATE_FORMAT(r.rec_date, "%Y-%m-%d") AS formatted_date, r.rec_date AS recdate, count(r.id) as totaluser')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where("DATE(r.rec_date) >=", $startDate)
			->where("DATE(r.rec_date) <=", $endDate)
			->where($where)
			->group_by('DATE(r.rec_date)')
			->order_by('r.rec_date asc')
			->get()
			->result();

		if (count($allDates)) {
			foreach ($allDates as $key => $value) {
				foreach ($query as $r1) {
					if ($allDates[$key]['formatted_date'] == $r1->formatted_date && $r1->totaluser != 0) {
						$allDates[$key]['totaluser'] = $r1->totaluser;
					}

				}
			}
		}


		return $allDates;
	}

	public function offerdata()
	{

		$statistics_res = [];

		$query_cardoffer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 3)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statistics_res['cardoffer'] = $query_cardoffer->num_rows();

		$query_ivrpaymentoffer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 4)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statistics_res['ivrpaymentoffer'] = $query_ivrpaymentoffer->num_rows();

		$query_specialoffer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 5)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statistics_res['specialoffer'] = $query_specialoffer->num_rows();

		$query_bumperoffer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 6)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statistics_res['bumperoffer'] = $query_bumperoffer->num_rows();

		$query_festivaloffer = $this->db->select('id')
			->where('registration_date', date('Y-m-d'))
			->where('offerpage', 7)
			->where('isActive', 1)
			->where('isDelete', 0)
			->get('cardoffer_order');
		$statistics_res['festivaloffer'] = $query_festivaloffer->num_rows();

		return $statistics_res;
	}

	public function customerdata()
	{

		$statistics_res = [];

		$query_custleads = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid !=', NULL)
			->where('t.refferaltype', 1)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['customerleadsall'] = $query_custleads->num_rows();

		$query_custleadspl = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid !=', NULL)
			->where('t.refferaltype', 1)
			->where('r.cardtype', 11)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['customerleadspl'] = $query_custleadspl->num_rows();

		$query_custleadsbl = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid !=', NULL)
			->where('t.refferaltype', 1)
			->where('r.cardtype', 12)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['customerleadsbl'] = $query_custleadsbl->num_rows();

		$query_custleads = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid !=', NULL)
			->where('t.refferaltype', 1)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['customersellall'] = $query_custleads->num_rows();

		$query_custleadspl = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid !=', NULL)
			->where('t.refferaltype', 1)
			->where('r.cardtype', 11)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['customersellpl'] = $query_custleadspl->num_rows();

		$query_custleadsbl = $this->db->select('r.id')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('t.subuserid !=', NULL)
			->where('t.refferaltype', 1)
			->where('r.cardtype', 12)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->order_by('r.id asc')
			->get();
		$statistics_res['customersellbl'] = $query_custleadsbl->num_rows();

		$query_refferalcstpending = $this->db->select('t.id')
			->from('user_tree t')
			->join('user_registration r1', 't.refferaluserid=r1.id')
			->join('user_registration r2', 't.subuserid=r2.id')
			->join('subscription_order m', 'r2.id=m.userid')
			->where('t.refferaltype', 1)
			->where('t.payout', 0)
			->where('r2.isDelete', 0)
			->where('r2.isUser', 2)
			->where('r1.isUser', 2)
			->order_by('t.rec_date asc')
			->get();
		$statistics_res['refcustomerpayoutpending'] = $query_refferalcstpending->num_rows();

		$query_refferalcstapproved = $this->db->select('t.id')
			->from('user_tree t')
			->join('user_registration r1', 't.refferaluserid=r1.id')
			->join('user_registration r2', 't.subuserid=r2.id')
			->join('subscription_order m', 'r2.id=m.userid')
			->where('t.refferaltype', 1)
			->where('t.payout', 1)
			->where('r2.isDelete', 0)
			->where('r2.isUser', 2)
			->where('r1.isUser', 2)
			->order_by('t.rec_date asc')
			->get();
		$statistics_res['refcustomerpayoutapproved'] = $query_refferalcstapproved->num_rows();

		$query_refferalcstrejected = $this->db->select('t.id')
			->from('user_tree t')
			->join('user_registration r1', 't.refferaluserid=r1.id')
			->join('user_registration r2', 't.subuserid=r2.id')
			->join('subscription_order m', 'r2.id=m.userid')
			->where('t.refferaltype', 1)
			->where('t.payout', 2)
			->where('r2.isDelete', 0)
			->where('r2.isUser', 2)
			->where('r1.isUser', 2)
			->order_by('t.rec_date asc')
			->get();
		$statistics_res['refcustomerpayoutrejected'] = $query_refferalcstrejected->num_rows();

		$query_kycdocs = $this->db->select('d.id')
			->from('user_registration r')
			->join('user_documents d', 'd.userid=r.id')
			->where('d.isVerified', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->order_by('r.rec_date asc')
			->get();
		$statistics_res['kycunverifieddocs'] = $query_kycdocs->num_rows();

		$query_payoutdocs = $this->db->select('d.id')
			->from('user_registration r')
			->join('user_payout_documents d', 'd.userid=r.id')
			->join('user_tree t', 't.refferaluserid=r.id', 'LEFT')
			->join('user_registration u', 't.subuserid=u.id', 'LEFT')
			->where('d.isVerified', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->where('t.refferaltype', 1)
			->where('u.isUser', 2)
			->group_by('t.refferaluserid')
			->order_by('r.rec_date asc')
			->get();
		$statistics_res['payoutunverifieddocs'] = $query_payoutdocs->num_rows();


		return $statistics_res;
	}

	public function applicationdata()
	{

		$statistics_res = [];

		$query_userapp = $this->db->select('a.id')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['userapplication'] = $query_userapp->num_rows();

		$query_reapplyapp = $this->db->select('a.id')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where('a.userid in (SELECT userid FROM user_application GROUP BY userid HAVING COUNT(*) > 1)')
			->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['reapplyapplication'] = $query_reapplyapp->num_rows();

		$query_oldapp = $this->db->select('a.id')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where("a.rec_date < NOW() - INTERVAL 21 DAY")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['oldapplication'] = $query_oldapp->num_rows();


		return $statistics_res;
	}

	public function processstepdata()
	{

		$statistics_res = [
			'userregistration' => 0,
			'usereligibility' => 0,
			'userpreapproved' => 0,
			'subscriptionplan' => 0,
			'userverification' => 0,
			'docverification' => 0,
			'appinprocess' => 0,
			'appqueryprocess' => 0,
			'appfilereopen' => 0,
			'apprejected' => 0,
			'appapproved' => 0
		];

		$query_res = $this->db->select('process_step, COUNT(*) as totalrec')
			->where('isActive', 1)
			->where('isDelete', 0)
			->group_by('process_step')
			->get('user_registration')
			->result();

		foreach ($query_res as $row) {
			switch ($row->process_step) {
				case '1':
					$statistics_res['userregistration'] = $row->totalrec;
					break;

				case '2':
					$statistics_res['usereligibility'] = $row->totalrec;
					break;

				case '3':
					$statistics_res['userpreapproved'] = $row->totalrec;
					break;

				case '4':
					$statistics_res['subscriptionplan'] = $row->totalrec;
					break;

				case '5':
					$statistics_res['userverification'] = $row->totalrec;
					break;

				case '6':
					$statistics_res['docverification'] = $row->totalrec;
					break;

				case '7':
					$statistics_res['appinprocess'] = $row->totalrec;
					break;

				case '8':
					$statistics_res['appqueryprocess'] = $row->totalrec;
					break;

				case '9':
					$statistics_res['appfilereopen'] = $row->totalrec;
					break;

				case '10':
					$statistics_res['apprejected'] = $row->totalrec;
					break;

				case '11':
					$statistics_res['appapproved'] = $row->totalrec;
					break;
			}
		}


		return $statistics_res;
	}

	public function getuserprocessstep($step, $dt_to, $dt_from)
	{

		$query = $this->db->select('id, update_date, fullname, mobile, email, city, state, isActive, isUser')
			->where('update_date >=', $dt_to . ' 00:00:00')
			->where('update_date <=', $dt_from . ' 23:59:59')
			->where('process_step', $step)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('user_registration')
			->result();


		return $query;
	}

	public function getcustomersReport()
	{

		$query = $this->db->select('year(rec_date) as recyear,month(rec_date) as monthno,MONTHNAME(rec_date) as recmonth,count(id) as totaluser')
			->where('isUser', 2)
			->where('isDelete', 0)
			->group_by('year(rec_date)')
			->group_by('month(rec_date)')
			->order_by('year(rec_date) desc')
			->order_by('month(rec_date) desc')
			->limit(12)
			->get('user_registration')
			->result();


		return $query;
	}

	public function getofflineleadReport($loantype)
	{

		if ($loantype == 'pl') {
			$where = " loantype=11 ";
		} else if ($loantype == 'bl') {
			$where = " loantype=12 ";
		} else {
			$where = " loantype=11 or loantype=12 ";
		}

		$query = $this->db->select('year(rec_date) as recyear,MONTHNAME(rec_date) as recmonth,count(id) as totaluser')
			->where('isDelete', 0)
			->where($where)
			->group_by('year(rec_date)')
			->group_by('month(rec_date)')
			->order_by('year(rec_date) desc')
			->order_by('month(rec_date) desc')
			->limit(12)
			->get('enquiry')
			->result();


		return $query;
	}

	public function getdigitalleadReport($loantype)
	{

		if ($loantype == 'pl') {
			$where = " a.loantype=11 ";
		} else if ($loantype == 'bl') {
			$where = " a.loantype=12 ";
		} else {
			$where = " a.loantype=11 or a.loantype=12 ";
		}

		$query = $this->db->select('year(r.rec_date) as recyear,month(r.rec_date) as monthno,MONTHNAME(r.rec_date) as recmonth,count(r.id) as totaluser')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where($where)
			->group_by('year(r.rec_date)')
			->group_by('month(r.rec_date)')
			->order_by('year(r.rec_date) desc')
			->order_by('month(r.rec_date) desc')
			->limit(12)
			->get()
			->result();

		return $query;
	}

	public function getgstrecords($dt_to, $dt_from)
	{

		$resdata = array();
		$queryres = $this->db->where('inv_date >=', $dt_to)
			->where('inv_date <=', $dt_from)
			->where('isDelete', 0)
			->order_by('inv_date desc')
			->group_by('userid')
			->get('invoice')
			->result();

		if (count($queryres)) {
			foreach ($queryres as $row) {
				$resrow = array();
				$resrow['fullname'] = $resrow['mobile'] = $resrow['email'] = $resrow['city'] = $resrow['state'] = $resrow['paymentid'] = $resrow['gstno'] = $resrow['aadharno'] = $resrow['panno'] = '';

				$resrow['id'] = $row->id;
				$resrow['inv_prefix'] = $row->inv_prefix;
				$resrow['inv_number'] = $row->inv_number;
				$resrow['inv_date'] = $row->inv_date;
				$resrow['inv_price'] = $row->inv_price;
				$resrow['inv_cgst'] = $row->inv_cgst;
				$resrow['inv_sgst'] = $row->inv_sgst;
				$resrow['inv_igst'] = $row->inv_igst;
				$resrow['inv_grandtotal'] = $row->inv_grandtotal;

				if ($row->inv_for == 1 || $row->inv_for == 2) {
					$this->load->model('Manage_User_Model');
					$response_user = $this->Manage_User_Model->getuserdata($row->userid);

					if ($response_user) {
						$resrow['fullname'] = $response_user->fullname;
						$resrow['mobile'] = $response_user->mobile;
						$resrow['email'] = $response_user->email;
						$resrow['city'] = $response_user->city;
						$resrow['state'] = $response_user->state;

						if ($row->cardid != '' && $row->cardid > 0) {
							$response_order = $this->Manage_User_Model->getsubscriptionrecord($row->cardid);
							$resrow['paymentid'] = $response_order->paymentid;
						}

						$response_user_doc = $this->Manage_User_Model->getpayoutdocuments($row->userid);
						if ($response_user_doc) {
							$resrow['gstno'] = $response_user_doc->gstdoc_number;
							$resrow['aadharno'] = $response_user_doc->aadharcard_number;
							$resrow['panno'] = $response_user_doc->pancard_number;
						}
						$resdata[] = $resrow;
					}
				} 

				
			}
		}


		return $resdata;
	}

	public function gettdsrecords($dt_to, $dt_from)
	{

		$resdata = array();
		$queryres = $this->db->where('payout_date >=', $dt_to)
			->where('payout_date <=', $dt_from)
			->where('payout', 1)
			->order_by('payout_date desc')
			->get('user_tree')
			->result();

		if (count($queryres)) {
			foreach ($queryres as $row) {
				$resrow = array();
				$resrow['gstno'] = $resrow['aadharno'] = $resrow['panno'] = '';

				$resrow['id'] = $row->id;
				$resrow['payout_date'] = $row->payout_date;
				$resrow['payout_amount'] = $row->payout_amount;
				$resrow['order_amount'] = $row->order_amount;
				$resrow['refferaltype'] = $row->refferaltype;

				if ($row->refferaltype == 1) {
					$this->load->model('Manage_User_Model');
					$response_user = $this->Manage_User_Model->getuserdata($row->refferaluserid);

					if ($response_user) {
						$resrow['fullname'] = $response_user->fullname;
						$resrow['mobile'] = $response_user->mobile;
						$resrow['email'] = $response_user->email;
						$resrow['city'] = $response_user->city;
						$resrow['state'] = $response_user->state;

						$response_user_doc = $this->Manage_User_Model->getpayoutdocuments($row->refferaluserid);

						if ($response_user_doc) {
							$resrow['gstno'] = $response_user_doc->gstdoc_number;
							$resrow['aadharno'] = $response_user_doc->aadharcard_number;
							$resrow['panno'] = $response_user_doc->pancard_number;
						}
						$resdata[] = $resrow;
					}
				} 
			}
		}


		return $resdata;
	}

	public function getrefundrecords($dt_to, $dt_from)
	{

		$resdata = array();
		$queryres = $this->db->where('ref_date >=', $dt_to)
			->where('ref_date <=', $dt_from)
			->where('isDelete', 0)
			->order_by('ref_date desc')
			->get('refund')
			->result();

		if (count($queryres)) {
			foreach ($queryres as $row) {
				$resrow = array();
				$resrow['gstno'] = $resrow['aadharno'] = $resrow['panno'] = '';

				$resrow['id'] = $row->id;
				$resrow['ref_number'] = $row->ref_number;
				$resrow['ref_date'] = $row->ref_date;
				$resrow['ref_price'] = $row->ref_price;
				$resrow['ref_cgst'] = $row->ref_cgst;
				$resrow['ref_sgst'] = $row->ref_sgst;
				$resrow['ref_igst'] = $row->ref_igst;
				$resrow['ref_grandtotal'] = $row->ref_grandtotal;
				$resrow['paymentid'] = $row->paymentid;

				if ($row->ref_for == 1 || $row->ref_for == 2) {
					$this->load->model('Manage_User_Model');
					$response_user = $this->Manage_User_Model->getuserdata($row->userid);

					if ($response_user) {
						$resrow['fullname'] = $response_user->fullname;
						$resrow['mobile'] = $response_user->mobile;
						$resrow['email'] = $response_user->email;
						$resrow['city'] = $response_user->city;
						$resrow['state'] = $response_user->state;

						$response_user_doc = $this->Manage_User_Model->getpayoutdocuments($row->userid);

						if ($response_user_doc) {
							$resrow['gstno'] = $response_user_doc->gstdoc_number;
							$resrow['aadharno'] = $response_user_doc->aadharcard_number;
							$resrow['panno'] = $response_user_doc->pancard_number;
						}
						$resdata[] = $resrow;
					}
				} 
			}
		}


		return $resdata;
	}

	public function remarketing_cron_data($corndays)
	{
		$statistics_res = array();
		foreach ($corndays as $cdays) {
			$d = strtotime("-" . $cdays . " day");
			$crondate = date('Y-m-d', $d);

			$statistics_res[$cdays] = $this->db->select('r.id')
				->from('user_registration r')
				->join('user_application a', 'a.userid=r.id')
				->join('user_tree t', 't.subuserid=r.id', 'left')
				->where("CAST(r.update_date as date) = '" . $crondate . "'")
				->where('r.isDnd', 0)
				->where('r.isUser', 1)
				->where('r.isActive', 1)
				->where('r.isDelete', 0)
				->where('a.status', 1)
				->where('a.isDelete', 0)
				->where('t.subuserid', NULL)
				->order_by('r.id asc')
				->get()
				->num_rows();
		}


		return $statistics_res;
	}

	public function whatsapp_cron_data($corndays)
	{
		$statistics_res = array();
		foreach ($corndays as $cdays) {
			$d = strtotime("-" . $cdays . " day");
			$crondate = date('Y-m-d', $d);

			$statistics_res[$cdays] = $this->db->select('r.id')
				->from('user_registration r')
				->join('user_application a', 'a.userid=r.id')
				->join('user_tree t', 't.subuserid=r.id', 'left')
				->where("CAST(r.rec_date as date) = '" . $crondate . "'")
				->where('r.isDnd', 0)
				->where('r.isUser', 1)
				->where('r.isActive', 1)
				->where('r.isDelete', 0)
				->where('a.status', 1)
				->where('a.isDelete', 0)
				->where('t.subuserid', NULL)
				->order_by('r.id asc')
				->get()
				->num_rows();
		}

		return $statistics_res;
	}

	public function getApplicationReport()
	{
		$sql = "
			SELECT
				YEAR(u.rec_date) AS recyear,
				MONTH(u.rec_date) AS monthno,
				MONTHNAME(u.rec_date) AS recmonth,

				SUM(CASE WHEN u.statusid = 1 THEN 1 ELSE 0 END) AS approved,
				SUM(CASE WHEN u.statusid = 2 THEN 1 ELSE 0 END) AS rejected,
				SUM(CASE WHEN u.statusid = 4 THEN 1 ELSE 0 END) AS queryprocess,
				SUM(CASE WHEN u.statusid = 7 THEN 1 ELSE 0 END) AS customerdecline,

				SUM(CASE WHEN u.statusid IN (1,2,4,7) THEN 1 ELSE 0 END) AS totalapplication

			FROM user_application_status u

			INNER JOIN
			(
				SELECT applicationid, MAX(id) AS lastid
				FROM user_application_status
				WHERE isDelete = 0
				GROUP BY applicationid
			) latest
			ON latest.lastid = u.id

			WHERE u.isDelete = 0

			GROUP BY YEAR(u.rec_date), MONTH(u.rec_date)

			ORDER BY YEAR(u.rec_date) DESC,
					MONTH(u.rec_date) DESC
		";

		return $this->db->query($sql)->result();
	}

	public function getApplicationReportDaywise($month, $year)
	{
		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate   = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = array();

		$currentDate = $startDate;

		while ($currentDate <= $endDate) {

			$allDates[$currentDate] = array(
				'formatted_date'   => $currentDate,
				'recdate'          => displayDate($currentDate),
				'approved'         => 0,
				'rejected'         => 0,
				'queryprocess'     => 0,
				'customerdecline'  => 0,
				'totalapplication' => 0
			);

			$currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
		}

		$sql = "
			SELECT

				DATE(u.rec_date) AS formatted_date,

				SUM(CASE WHEN u.statusid = 1 THEN 1 ELSE 0 END) AS approved,
				SUM(CASE WHEN u.statusid = 2 THEN 1 ELSE 0 END) AS rejected,
				SUM(CASE WHEN u.statusid = 4 THEN 1 ELSE 0 END) AS queryprocess,
				SUM(CASE WHEN u.statusid = 7 THEN 1 ELSE 0 END) AS customerdecline,

				SUM(CASE WHEN u.statusid IN (1,2,4,7) THEN 1 ELSE 0 END) AS totalapplication

			FROM user_application_status u

			INNER JOIN
			(
				SELECT applicationid, MAX(id) AS lastid
				FROM user_application_status
				WHERE isDelete = 0
				GROUP BY applicationid
			) latest
			ON latest.lastid = u.id

			WHERE u.isDelete = 0
			AND DATE(u.rec_date) >= '{$startDate}'
			AND DATE(u.rec_date) <= '{$endDate}'

			GROUP BY DATE(u.rec_date)

			ORDER BY DATE(u.rec_date)
		";

		$query = $this->db->query($sql)->result();

		foreach ($query as $row) {

			if (isset($allDates[$row->formatted_date])) {

				$allDates[$row->formatted_date]['approved']         = $row->approved;
				$allDates[$row->formatted_date]['rejected']         = $row->rejected;
				$allDates[$row->formatted_date]['queryprocess']     = $row->queryprocess;
				$allDates[$row->formatted_date]['customerdecline']  = $row->customerdecline;
				$allDates[$row->formatted_date]['totalapplication'] = $row->totalapplication;
			}
		}

		return array_values($allDates);
	}
}

?>
