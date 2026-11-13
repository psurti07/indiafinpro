<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Career extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}
	
	public function index(){
		$this->load->model('Manage_Career_Model');
		$openinglist = $this->Manage_Career_Model->getopeninglist();
		$this->load->view('careeropening',['openinglist'=>$openinglist]);
	}


	public function addForm(){
		$this->load->view('career-add');
	}

	public function addCareer(){
		$slug = random_code(6);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'slug' => $slug,
			'title' => $_REQUEST['co_title'],
			'descriptions' => $_REQUEST['co_description'],
			'isActive' => 1,
			'isDelete' => 0
		);

		$this->load->model('Manage_Career_Model');
		$response = $this->Manage_Career_Model->addcareer($data);

		redirect('career');
	}

	public function editForm($id){
		$this->load->model('Manage_Career_Model');
		$careerdetails = $this->Manage_Career_Model->getcareerdetails($id);
		$this->load->view('career-edit',['careerdetails'=>$careerdetails]);
	}

	public function editCareer(){
		$id = $_REQUEST['id'];
		
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'title' => $_REQUEST['co_title'],
			'descriptions' => $_REQUEST['co_description'],
			'isActive' => 1
		);
		
		$this->load->model('Manage_Career_Model');
		$response = $this->Manage_Career_Model->editcareer($id, $data);

		redirect('career');
	}

	public function changestatus($statusid, $id){
		$this->load->model('Manage_Career_Model');
		$this->Manage_Career_Model->changestatus($statusid, $id);
		redirect('career');
	}

	public function deletecareer($id) {
		$this->load->model('Manage_Career_Model');
		$this->Manage_Career_Model->deletecareer($id);
		redirect('career');
	}

	public function enquiry(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Career_Model');
		$enquirylist = $this->Manage_Career_Model->getcareerenqlist($dt_to, $dt_from);
		$this->load->view('careerenquiry',['enquirylist'=>$enquirylist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function deletecareerenq($id) {
		$this->load->model('Manage_Career_Model');
		$this->Manage_Career_Model->deletecareerenq($id);
		redirect('career/enquiry');
	}

	public function resumedownload($resume) {
		$this->load->model('Manage_General_Model');
		$this->Manage_General_Model->filedownload('resume', $resume);
		redirect('career/enquiry');
	}

}
?>