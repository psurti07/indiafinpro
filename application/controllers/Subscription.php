<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Subscription extends CI_Controller {
	
	public function index(){
		return redirect()->to('Infopage');
	}

	public function personal(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-subscription-plan');
		$plandata = $this->Site_Info_Model->getproductdetails('personal-subscription-plan');
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		
		$this->load->view('personal-subscription-plan',['meta'=>$meta, 'plandata'=>$plandata, 'banklist'=>$banklist, 'testimoniallist'=>$testimoniallist]);
	}

	public function business(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('business-subscription-plan');
		$plandata = $this->Site_Info_Model->getproductdetails('business-subscription-plan');
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$this->load->view('business-subscription-plan',['meta'=>$meta, 'plandata'=>$plandata, 'banklist'=>$banklist, 'testimoniallist'=>$testimoniallist]);
	}

	public function plan_benefits(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('subscription-plan');
		$this->load->view('plan-benefits',['meta'=>$meta]);
	}
	
}
