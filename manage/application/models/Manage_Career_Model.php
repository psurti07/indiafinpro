<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Career_Model extends CI_Model {

	public function getopeninglist(){
		
		$query = $this->db->where('isDelete', 0)
				->order_by('id asc')
				->get('career_opening')
				->result();

				
		return $query;      
	}

	public function getcareerdetails($id){
		
		$query = $this->db->where('id', $id)
				->get('career_opening')
				->row();

				
		return $query;      
	}

	public function addcareer($data){
		
		$this->db->insert('career_opening',$data);
		$id = $this->db->insert_id();

				
		return $id; 
	}

	public function editcareer($id, $data){
		
		$query = $this->db->where('id', $id)
					->update('career_opening', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function changestatus($statusid, $id){
		
		if($statusid == 1) {
			$data = array(
			   'isActive' => 0
			);
		}
		else {
			$data = array(
			   'isActive' => 1
			);
		}
		$query = $this->db->where('id', $id)
					->update('career_opening', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function deletecareer($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
					->update('career_opening', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}

	public function getcareerenqlist($dt_to, $dt_from){
		
		$query = $this->db->select('e.*, o.title')
				->from('career_enquiry e')
				->join('career_opening o','o.id=e.applyfor')
				->where('e.rec_date >=', $dt_to.' 00:00:00')
				->where('e.rec_date <=', $dt_from.' 23:59:59')
				->where('e.isDelete', 0)
				->where('o.isDelete', 0)
				->order_by('e.rec_date asc')
				->get()
				->result();

				
		return $query;      
	}

	public function deletecareerenq($id){
		
		$data = array(
		   'isDelete' => 1
		);
		$query=$this->db->where('id', $id)
					->update('career_enquiry', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

				
		return $flag;
	}
}
?>