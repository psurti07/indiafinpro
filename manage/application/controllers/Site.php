<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
		$this->role = $this->session->userdata('admintype');
	}

	public function index(){
		redirect('dashboard');
	}

	public function newsletter(){
		$this->load->model('Manage_Site_Model');
		$subscribelist = $this->Manage_Site_Model->getnewsletterlist();
		$this->load->view('newsletter-subsciptions',['subscribelist'=>$subscribelist]);
	}

	public function emailtemplates(){
		$this->load->model('Manage_Site_Model');
		$emaillist = $this->Manage_Site_Model->getemailtemplates();
		$this->load->view('email-templates',['emaillist'=>$emaillist]);
	}

	public function unsubscribedusers(){
		$this->load->model('Manage_Site_Model');
		$unsubscribeuserlist = $this->Manage_Site_Model->getunsubscribeduserlist();
		$this->load->view('unsubscribed-users',['unsubscribeuserlist'=>$unsubscribeuserlist]);
	}

	public function substatus($statusid, $id){
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->changesubscription($statusid, $id);
		redirect('site/newsletter');
	}

	public function subscribedelete($id){
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deletesubscription($id);
		redirect('site/newsletter');
	}

	public function sitesettings(){
		$this->load->model('Manage_Site_Model');
		$sitedetails = $this->Manage_Site_Model->getsitesettings();
		$this->load->view('site-settings',['sitedetails'=>$sitedetails]);
	}

	public function editPage($pagename){
		$this->load->model('Manage_Site_Model');
		$pagedetails = $this->Manage_Site_Model->getpagedetails($pagename);
		$this->load->view('page-edit',['pagedetails'=>$pagedetails,'pagename' => $pagename]);
	}

	public function updatePage(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['content']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editpage($_REQUEST['id'], $data);

		redirect('site/editPage/'.$_REQUEST['page']);
	}

	public function modelstatus($value){
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatemodelstatus($value);

		redirect('site/sitesettings');
	}

	public function updatesenderid(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['senderid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'smssenderid');

		redirect('site/sitesettings');
	}

	public function updatefbdomain(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['domainid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'facebookdomain');

		redirect('site/sitesettings');
	}

	public function updatefbpixel(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['pixelid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'facebookpixel');

		redirect('site/sitesettings');
	}

	public function updatefbaccesstokendigital() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbaccesstokendigital'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbaccesstokendigital');

		redirect('site/sitesettings');
	}

	public function updatefbeventnamedigital() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbeventnamedigital'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventnamedigital');

		redirect('site/sitesettings');
	}

	public function updatefbeventiddigital() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbeventiddigital'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventiddigital');

		redirect('site/sitesettings');
	}
	public function updatewpcampmain() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignmain']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignmain');

		redirect('site/sitesettings');
	}

	public function updatewpcampmainoffer() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignoffer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignoffer');

		redirect('site/sitesettings');
	}

	public function updatewpcampmainsuccess() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['wpcampaignsuccess']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignsuccess');

		redirect('site/sitesettings');
	}
	public function updatefbaccesstokenpartner() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbaccesstokenpartner'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbaccesstokenpartner');

		redirect('site/sitesettings');
	}

	public function updatefbeventnamepartner() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbeventnamepartner'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventnamepartner');

		redirect('site/sitesettings');
	}

	public function updatefbeventidpartner() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbeventidpartner'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventidpartner');

		redirect('site/sitesettings');
	}
	public function update_intkt_getoffer() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_getoffer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intekt_get_offer_name');
		
		redirect('site/sitesettings');
	}

	public function update_intktrm_offer() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_rm_offer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intekt_rm_offer_name');
		
		redirect('site/sitesettings');
	}

	public function update_intkt_usrpass() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_user_password']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intkt_userwelcomename');
		
		redirect('site/sitesettings');
	}

	public function update_intkt_payment_success() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_payment_success']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intkt_payment_success');
		
		redirect('site/sitesettings');
	}

	public function search(){
		$module = "customer";
		$mobile = "";
		$datalist = $response = array();

		$this->load->model('Manage_Site_Model');

		if(isset($_REQUEST['module']) && isset($_REQUEST['mobile'])) {
			$module = $_REQUEST['module'];
			$mobile = $_REQUEST['mobile'];

			switch ($module) {
				case 'customer':
					$response = $this->Manage_Site_Model->searchcustomer($mobile);
					
					if(!empty($response)) {
						$userapp = $this->Manage_Site_Model->getapplicationid($response->id);
						$datalist = array(
							'id' => $response->id,
							'mobile' => $response->mobile,
							'rec_date' => $response->rec_date,
							'fullname' => $response->fullname,
						    'emailid' => $response->email,
						    'isuser' => $response->isUser,
							'appid' => $userapp->id
						);
					}
					break;

				case 'career':
					$response = $this->Manage_Site_Model->searchcareer($mobile);
					if(!empty($response)) {
						$datalist = array(
							'id' => $response->id,
							'mobile' => $response->mobile,
							'rec_date' => $response->rec_date,
							'fullname' => $response->firstname." ".$response->lastname,
						    'emailid' => $response->email
						);
					}
					break;

				case 'bulksms':
					$response = $this->Manage_Site_Model->searchbulksms($mobile);
					if(!empty($response)) {
						$datalist = array(
							'id' => $response->id,
							'mobile' => $response->mobileno,
							'rec_date' => $response->rec_date,
							'fullname' => $response->fullname,
						    'emailid' => $response->emailid
						);
					}
					break;
				
				default:
					# code...
					break;
			}
		}

		$this->load->view('search',['module'=>$module, 'mobile'=>$mobile, 'datalist'=>$datalist]);
	}

	public function impupdate(){
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getimpupdatelist();
		$this->load->view('imp-update',['datalist'=>$datalist]);
	}

	public function addNoteForm(){
		$this->load->view('imp-update-add');
	}

	public function addNoteData(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'tags' => $_REQUEST['tags'],
			'descriptions' => $_REQUEST['descriptions'],
			'isActive' => 1,
			'isDelete' => 0
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->addimpupdate($data);

		redirect('site/impupdate');
	}

	public function impupdatestatus($statusid, $id){
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->impupdatestatus($statusid, $id);
		redirect('site/impupdate');
	}

	public function deleteimpupdate($id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deleteimpupdate($id);
		redirect('site/impupdate');
	}

	public function advertisement($adtype){
		$this->load->model('Manage_Site_Model');

		if($adtype == 'img') {
			$type = 2;
			$adslist = $this->Manage_Site_Model->getadvertisementlist($type);
			$this->load->view('advertisement-image',['adslist'=>$adslist]);
		}
		else if($adtype == 'txt') {
			$type = 1;
			$adslist = $this->Manage_Site_Model->getadvertisementlist($type);
			$this->load->view('advertisement-text',['adslist'=>$adslist]);
		}
		else {
			redirect('dashboard');
		}
	}

	public function addAdstxt(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'ad_content' => $_REQUEST['adcontent'],
			'ad_type' => 1,
			'isDelete' => 0
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->addadvertisement($data);
		redirect('site/advertisement/txt');
	}

	public function addAdsimg(){
		$adimage = "";

		if($_FILES['adimage']['name'] != '') {
			$this->load->model('Manage_General_Model');
			$adimage = $this->Manage_General_Model->single_file_upload('adimage', 'img/adsimages', 'jpg|gif|png|jpeg', 1);

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'ad_content' => $adimage,
				'ad_type' => 2,
				'isDelete' => 0
			);

			$this->load->model('Manage_Site_Model');
			$response = $this->Manage_Site_Model->addadvertisement($data);
		}

		redirect('site/advertisement/img');
	}

	public function deleteads($adtype, $id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deleteadvertisement($id);
		redirect('site/advertisement/'.$adtype);
	}

	public function accountmsg(){
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getaccountmsg();
		$this->load->view('account-message',['datalist'=>$datalist]);
	}

	public function updateaccountmsg(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => trim($_REQUEST['content'])
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editaccountmsg($_REQUEST['id'], $data);

		redirect('site/accountmsg');
	}

	public function fileremarks(){
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getfileremarkslist();
		$this->load->view('file-remarks',['datalist'=>$datalist]);
	}

	public function addRemarkForm(){
		$this->load->model('Manage_Site_Model');
		$statuslist = $this->Manage_Site_Model->getstatuslist();
		$this->load->view('file-remarks-add',['statuslist'=>$statuslist]);
	}

	public function addFileRemark(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'title' => $_REQUEST['title'],
			'remarks' => $_REQUEST['remarks'],
			'statusid' => $_REQUEST['statusid'],
			'isDelete' => 0
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->addfileremark($data);

		redirect('site/fileremarks');
	}

	public function editRemarkForm($id){
		$this->load->model('Manage_Site_Model');
		$remarkdetails = $this->Manage_Site_Model->getremarkdetails($id);
		$statuslist = $this->Manage_Site_Model->getstatuslist();
		$this->load->view('file-remarks-edit',['remarkdetails'=>$remarkdetails, 'statuslist'=>$statuslist]);
	}

	public function editFileRemark(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'title' => $_REQUEST['title'],
			'remarks' => $_REQUEST['remarks'],
			'statusid' => $_REQUEST['statusid']
		);
		
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editfileremark($_REQUEST['id'], $data);

		redirect('site/fileremarks');
	}

	public function deletefileremark($id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->deleteremark($id);
		redirect('site/fileremarks');
	}

	public function restorefileremark($id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->restoreremark($id);
		redirect('site/fileremarks');
	}

	public function userverification() {
		$this->load->model('Manage_Site_Model');
		$userlist = $this->Manage_Site_Model->userverification();
	}

	public function stafflist(){
		if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getstaffmemberlist();
		$this->load->view('staff-members',['datalist'=>$datalist]);
	}

	public function staffaddForm(){
		if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
		$this->load->view('staff-members-add');
	}
  public function addStaffmember() {
	if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
        // Load the model
        $this->load->model('Manage_Site_Model');
    
        // Check if passwords match
        if ($_REQUEST['newpassword'] == $_REQUEST['retypepassword']) {
            // Check if email already exists
            $email = $_REQUEST['emailid'];
            $existingUser = $this->Manage_Site_Model->getStaffByEmail($email);
    
            if ($existingUser) {
                echo json_encode(array("success" => false, "message" => "Email already exists. Please use a different email."));
                return;
            }
    
            // Proceed to add staff member
            $enc_password = encryptPassword($email, $_REQUEST['newpassword']);
    
            $data = array(
                'rec_date' => date('Y-m-d H:i:s'),
                'fullname' => $_REQUEST['fullname'],
                'mobile' => $_REQUEST['mobile'],
                'emailid' => $email,
                'password' => $enc_password,
                'role' => $_REQUEST['staffrole'],
                'isActive' => 1,
                'isDelete' => 0,
            );

            $response = $this->Manage_Site_Model->addstaffmember($data);
    
            echo json_encode(array("success" => true, "message" => "Staff account successfully created."));
        } else {
            echo json_encode(array("success" => false, "message" => "Both passwords are not equal."));
        }
    }

	public function deletestaff($id) {
		if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->deletestaffaccount($id);
		redirect('site/stafflist');
	}

	/*public function datasolve(){
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->datasolvefunction();
	}*/

}
?>
