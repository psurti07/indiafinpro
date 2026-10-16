<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Enquiry_Model extends CI_Model {

	public function addEnquiry($data){
		
		$this->db->insert('enquiry',$data);
		$id = $this->db->insert_id();

				
		return $id;
	}

	public function updateEnquiry($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('enquiry', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}


	
}
?>