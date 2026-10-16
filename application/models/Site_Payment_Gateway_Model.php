<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Payment_Gateway_Model extends CI_Model {

	public function cashfreeentry($data){
		
		$this->db->insert('cashfree_entry',$data);
		$id = $this->db->insert_id();

		
		return $id;
	}

	public function getcashfreeentry($orderid){
		
		$query = $this->db->where('orderid', $orderid)
				->get('cashfree_entry')
				->row();

		
		return $query; 
	}

	public function updatecashfreeentry($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('cashfree_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		
		return $flag;
	}

	public function zaakpayentry($data){
		
		$this->db->insert('zaakpay_entry',$data);
		$id = $this->db->insert_id();

		
		return $id;
	}

	public function getzaakpayentry($orderid){
		
		$query = $this->db->where('orderid', $orderid)
				->get('zaakpay_entry')
				->row();

		
		return $query; 
	}

	public function updatezaakpayentry($id, $data){
		
		$query=$this->db->where('id', $id)
					->update('zaakpay_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		
		return $flag;
	}

	public function paygentry($data){
		
		$this->db->insert('payg_entry',$data);
		$id = $this->db->insert_id();

		
		return $id;
	}

	public function getpaygentry($uid){
		
		$query = $this->db->where('uniqueid', $uid)
				->get('payg_entry')
				->row();

		
		return $query; 
	}

	public function updatepaygentry($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('payg_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		
		return $flag;
	}

	public function paytmentry($data){
		
		$this->db->insert('paytm_entry',$data);
		$id = $this->db->insert_id();

		
		return $id;
	}

	public function getpaytmentry($id){
		
		$query = $this->db->where('orderid', $id)
				->get('paytm_entry')
				->row();

		
		return $query; 
	}

	public function updatepaytmentry($id, $data){
		
		$sql_query=$this->db->where('id', $id)
					->update('paytm_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		
		return $flag;
	}

	public function subpaisaentry($data){
		$this->db->insert('subpaisa_entry',$data);
		$id = $this->db->insert_id();
		
		return $id;
	}

	public function getsubpaisaentry($id){
		
		$query = $this->db->where('orderid', $id)
				->get('subpaisa_entry')
				->row();

		
		return $query; 
	}

	public function updatesubpaisaentry($id, $data){
		
		$sql_query=$this->db->where('id', $id)
					->update('subpaisa_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		
		return $flag;
	}

	public function phonepeentry($data){
		$this->db->insert('phonepe_entry',$data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function getphonepeentry($id){
		
		$query = $this->db->where('orderid', $id)
				->get('phonepe_entry')
				->row();

		
		return $query; 
	}

	public function updatephonepeentry($id, $data){
		
		$sql_query=$this->db->where('id', $id)
					->update('phonepe_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		
		return $flag;
	}

	public function worldlineentry($data){
		
		$this->db->insert('worldline_entry',$data);
		$id = $this->db->insert_id();

		
		return $id;
	}

	public function getworldlineentry($id){
		
		$query = $this->db->where('orderid', $id)
				->get('worldline_entry')
				->row();

		
		return $query; 
	}

	public function updateworldlineentry($id, $data){
		
		$sql_query=$this->db->where('id', $id)
					->update('worldline_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		
		return $flag;
	}
	public function razorpayentry($data) {
		$this->db->insert('razorpay_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getrazorpayentry($id) {
		$query = $this->db->where('orderid', $id)
		  ->get('razorpay_entry')
		  ->row();
		return $query;
	}

	public function updaterazorpayentry($id, $data) {
		$sql_query = $this->db->where('id', $id)
		   ->update('razorpay_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';
		return $flag;
	}

	public function airpayentry($data) {
		$this->db->insert('airpay_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getairpayentry($orderid) {
		$query = $this->db->where('orderid', $orderid)
		 ->get('airpay_entry')
		 ->row();
		return $query;
	}

	public function updateairpayentry($id, $data) {
		$query = $this->db->where('id', $id)
		 ->update('airpay_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function lyraentry($data) {
		$this->db->insert('lyra_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getlyraentry($orderid) {
		$query = $this->db->where('orderid', $orderid)
		 ->get('lyra_entry')
		 ->row();
		return $query;
	}

	public function updatelyraentry($id, $data) {
		$query = $this->db->where('id', $id)
		 ->update('lyra_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';
		return $flag;
	}

	public function openmoneyentry($data){
		$this->db->insert('openmoney_entry',$data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function getopenmoneyentry($id){
		$query = $this->db->where('orderid', $id)
				->get('openmoney_entry');
		return $query->row(); 
	}

	public function updateopenmoneyentry($id, $data){
		$sql_query=$this->db->where('id', $id)
					->update('openmoney_entry', $data); 
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function easebuzzentry($data){
		$this->db->insert('easebuzz_entry',$data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function geteasebuzzentry($orderid){
		$query = $this->db->where('orderid', $orderid)
				->get('easebuzz_entry');
		return $query->row(); 
	}

	public function updateeasebuzzentry($id, $data){
		$sql_query=$this->db->where('id', $id)
					->update('easebuzz_entry', $data); 
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function getPendingOrdersData(){
		$this->db->select('*');
		$this->db->from('zaakpay_entry');
		$this->db->where('statuscode IS NULL', null, false); 
		$this->db->where_in('entryfor', [11, 12]);
		$this->db->where('rec_date >=', date('Y-m-d H:i:s', strtotime('-2 hours')));
		$this->db->order_by('rec_date', 'DESC');          
		$query = $this->db->get();
		return $query->result();
	}

	public function updateZaakpayEntryOrder($orderId, $data){
		$this->db->where('orderid', $orderId);
		return $this->db->update('zaakpay_entry', $data);
	}
}
?>
