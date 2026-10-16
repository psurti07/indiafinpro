<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Offer_Model extends CI_Model {

	public function getcardoffersales($dt_to, $dt_from, $offer = 4){
		
		$query = $this->db->where('registration_date >=', $dt_to)
				->where('registration_date <=', $dt_from)
				->where('offerpage', $offer)
				->where('isActive', 1)
				->where('isDelete', 0)
				->order_by('id asc')
				->get('cardoffer_order')
				->result();

				
		return $query;      
	}

	public function changeleadstatus($statusid, $id){
		
		if($statusid == 1) {
			$data = array(
			   'isCustomer' => 0
			);
		}
		else {
			$data = array(
			   'isCustomer' => 1
			);
		}
		$query = $this->db->where('id', $id)
					->update('cardoffer_order', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag; 
	}


}

?>
