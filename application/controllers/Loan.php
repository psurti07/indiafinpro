<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Loan extends CI_Controller {
	
	public function index(){
		return redirect()->to('Infopage');
	}

	public function calculator(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('calculator');
		$this->load->view('calculator');
	}
	

}
?>