<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Payment_Model extends CI_Model
{

	// Phonepe payment gateway
	public function getphoneperecords($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 11 THEN "Personal Loan" 
		 WHEN entryfor = 12 THEN "Business Loan" 
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('phonepe_entry pg')
			->join('user_registration r', 'pg.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 3 THEN "Card Offer" 
		 WHEN entryfor = 4 THEN "IVR Payment offer"
		  WHEN entryfor = 5 THEN "Special Offer" 
		 WHEN entryfor = 6 THEN "Bumper Offer" 
		 WHEN entryfor = 7 THEN "Festival Offer"  
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('phonepe_entry pg')
			->join('cardoffer_order r', 'pg.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');

		return $query->result();
	}
	// razorpay payment gateway
	public function getrazorpayrecords($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pg.rec_date, pg.entryfor, 
	 (CASE WHEN entryfor = 11 THEN "Personal Loan" 
	 WHEN entryfor = 12 THEN "Business Loan" 
	 ELSE entryfor END) AS entrydetail, 
	 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('razorpay_entry pg')
			->join('user_registration r', 'pg.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pg.rec_date, pg.entryfor, 
	 (CASE WHEN entryfor = 3 THEN "Card Offer" 
	 WHEN entryfor = 4 THEN "IVR Payment Offer"
	  WHEN entryfor = 5 THEN "Special Offer" 
		 WHEN entryfor = 6 THEN "Bumper Offer" 
		 WHEN entryfor = 7 THEN "Festival Offer"  
	 ELSE entryfor END) AS entrydetail, 
	 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('razorpay_entry pg')
			->join('cardoffer_order r', 'pg.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');

		return $query->result();
	}
	// Sabpaisa payment gateway
	public function getsabpaisarecords($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pg.rec_date, pg.entryfor, 
	 (CASE WHEN entryfor = 11 THEN "Personal Loan" 
	 WHEN entryfor = 12 THEN "Business Loan" 
	 ELSE entryfor END) AS entrydetail, 
	 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('subpaisa_entry pg')
			->join('user_registration r', 'pg.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 3 THEN "Card Offer" 
		 WHEN entryfor = 4 THEN "IVR Payment offer"
		  WHEN entryfor = 5 THEN "Special Offer" 
		 WHEN entryfor = 6 THEN "Bumper Offer" 
		 WHEN entryfor = 7 THEN "Festival Offer" 
		 WHEN entryfor = 5 THEN "Special Offer" 
		 WHEN entryfor = 6 THEN "Bumper Offer" 
		 WHEN entryfor = 7 THEN "Festival Offer"  
		 ELSE entryfor END) AS entrydetail, 
	 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('subpaisa_entry pg')
			->join('cardoffer_order r', 'pg.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');

		return $query->result();
	}
	// Worldline payment gateway
	public function getworldlinerecords($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 11 THEN "Personal Loan" 
		 WHEN entryfor = 12 THEN "Business Loan" 
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('worldline_entry pg')
			->join('user_registration r', 'pg.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(3, 4, 5, 6, 7);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 3 THEN "Card Offer" 
		 WHEN entryfor = 4 THEN "IVR Payment offer"
		  WHEN entryfor = 5 THEN "Special Offer" 
		 WHEN entryfor = 6 THEN "Bumper Offer" 
		 WHEN entryfor = 7 THEN "Festival Offer"  
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('worldline_entry pg')
			->join('cardoffer_order r', 'pg.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');


		return $query->result();
	}

	// Zaakpay payment gateway
	public function getzaakpayrecords($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 11 THEN "Personal Loan" 
		 WHEN entryfor = 12 THEN "Business Loan" 
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, statuscode, transactionid, paymentmode, statusdescription, r.fullname, r.mobile, r.email')
			->from('zaakpay_entry pg')
			->join('user_registration r', 'pg.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(3, 4, 5, 6, 7);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 3 THEN "Card Offer" 
		 WHEN entryfor = 4 THEN "IVR Payment offer"
		  WHEN entryfor = 5 THEN "Special Offer" 
		 WHEN entryfor = 6 THEN "Bumper Offer" 
		 WHEN entryfor = 7 THEN "Festival Offer"  
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, statuscode, transactionid, paymentmode, statusdescription, r.fullname, r.mobile, r.emailid as email')
			->from('zaakpay_entry pg')
			->join('cardoffer_order r', 'pg.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');


		return $query->result();
	}

	public function getairpayentryrecord($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 11 THEN "Personal Loan" 
		 WHEN entryfor = 12 THEN "Business Loan" 
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, statuscode, transactionid, paymentmode, r.fullname, r.mobile, r.email')
			->from('airpay_entry pg')
			->join('user_registration r', 'pg.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7);
		$this->db->where('pg.rec_date >=', $dt_to . ' 00:00:00')
			->where('pg.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pg.rec_date, pg.entryfor, 
		 (CASE WHEN entryfor = 3 THEN "Card Offer" 
		 WHEN entryfor = 4 THEN "IVR Payment offer"
		 WHEN entryfor = 5 THEN "Special Offer" 
		 WHEN entryfor = 6 THEN "Bumper Offer" 
		 WHEN entryfor = 7 THEN "Festival Offer"   
		 ELSE entryfor END) AS entrydetail, 
		 orderid, orderamount, ordernote, statuscode, transactionid, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('airpay_entry pg')
			->join('cardoffer_order r', 'pg.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');

		return $query->result();
	}

	public function getopenmoneyentrylist($dt_to, $dt_from){
			
		$offer_code1 = array(11, 12);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
				(CASE WHEN entryfor = 11 THEN "Personal Loan" 
					  WHEN entryfor = 12 THEN "Business Loan" ELSE entryfor 
				END) AS entrydetail, 
				orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('openmoney_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "IVR Payment offer"
						WHEN entryfor = 5 THEN "Special Offer" 
						WHEN entryfor = 6 THEN "Bumper Offer" 
						WHEN entryfor = 7 THEN "Festival Offer" 
						  ELSE entryfor 
					END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('openmoney_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');
		return $query->result();
		
	}

	public function geteasebuzzlogrecord($dt_to, $dt_from){
			
		$offer_code1 = array(11, 12);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
				(CASE WHEN entryfor = 11 THEN "Personal Loan" 
					  WHEN entryfor = 12 THEN "Business Loan" ELSE entryfor 
				END) AS entrydetail, 
				orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.email')
			->from('easebuzz_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "IVR Payment offer"
						WHEN entryfor = 5 THEN "Special Offer" 
						WHEN entryfor = 6 THEN "Bumper Offer" 
						WHEN entryfor = 7 THEN "Festival Offer" 
						  ELSE entryfor 
					END) AS entrydetail, 
					orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('easebuzz_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY rec_date ASC');
		return $query->result();
		
	}


}

?>
