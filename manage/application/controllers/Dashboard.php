<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
		$this->role = $this->session->userdata('admintype');
	}
	
	public function index(){
		$this->load->model('Manage_Report_Model');
		$custlist = $this->Manage_Report_Model->getdashcustomerdata();
		$leadlist = $this->Manage_Report_Model->getdashleaddata();

		$custlist = array_reverse($custlist);
		$leadlist = array_reverse($leadlist);

		$ac_data = array();

		$currentDate = new DateTime();
		$dayOfMonth = (int) $currentDate->format('d');

		$ac_flag = 1; // Change 1 to hide messages and change 0 to show messages
		//$dayOfMonth = 12;

		if ($dayOfMonth >= 1 && $dayOfMonth <= 10 && $ac_flag == 0) {
			$ac_data = array(
				'ac_class' => "warning",
				'ac_title' => "Important Notice",
				'ac_msg' => "If the previous month’s AMC or Royalty payment is not paid by the 10th of this month, your website will be automatically suspended. If paid, kindly ignore.",
			);
		} else {
			$ac_data = array(
				'ac_class' => "",
				'ac_title' => "",
				'ac_msg' => "",
			);
		}

		$this->load->view('dashboard',['custlist'=>$custlist, 'leadlist'=>$leadlist, 'ac_data' => $ac_data,'userrole' => $this->role]);
	}

	public function loanstatistics(){
		$this->load->view('statistics-loanenquiry');
	}

	public function digitalstatistics(){
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->digitalloanstatistics();
		echo json_encode(array("success"=>true, "statistics"=>$statistics));
	}

	public function cardstatistics(){
		$this->load->view('statistics-subscriptionplan');
	}

	public function membercarddata(){
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->membercarddata();
		echo json_encode(array("success"=>true, "statistics"=>$statistics));
	}

	public function offerdata(){
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->offerdata();
		echo json_encode(array("success"=>true, "statistics"=>$statistics));
	}

	public function customerstatistics(){
		$this->load->view('statistics-customer');
	}

	public function customerdata(){
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->customerdata();
		echo json_encode(array("success"=>true, "statistics"=>$statistics));
	}

	public function applicationstatistics(){
		$this->load->view('statistics-application');
	}
	
	public function applicationdata(){
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->applicationdata();
		echo json_encode(array("success"=>true, "statistics"=>$statistics));
	}

	public function processstatistics(){
		$this->load->view('statistics-processstep');
	}

	public function processstepdata(){
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->processstepdata();
		echo json_encode(array("success"=>true, "statistics"=>$statistics));
	}

	public function remarketingstatistics()
	{
		$this->load->view('remarketing_user_statistics');
	}

	public function remarketingcrondata()
	{
		$crondays = array();
		$crondays[] = '0';
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '3';
		$crondays[] = '7';

		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->remarketing_cron_data($crondays);

		echo json_encode(array("success" => true, "statistics" => $statistics));
		//$this->load->view('remarketing_user_statistics', ['statistics'=>$statistics]);
	}

	public function whatsappstatistics() {
		$this->load->view('whatsapp_user_statistics');
	}

	public function whatsappcrondata() {
		$crondays = array();
		$crondays[] = '0';
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '3';
		$crondays[] = '6';
		$crondays[] = '10';
		$crondays[] = '20';
		$crondays[] = '30';
		$crondays[] = '50';
		$crondays[] = '70';
		$crondays[] = '90';

		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->whatsapp_cron_data($crondays);

		echo json_encode(array("success" => true, "statistics" => $statistics));
	}

}
?>
