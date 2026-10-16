<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect()->to('customer/login');
			die;
		}
	}

	public function index()
	{
		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');
		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$profiledata = $this->Customer_Profile_Model->getprofile($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/profile', ['meta' => $meta, 'profiledata' => $profiledata]);
	}

	public function subscription()
	{
		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$plandata = $this->Customer_Profile_Model->getsubscriptionplan($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/subscription-plan', ['meta' => $meta, 'plandata' => $plandata]);
	}

	public function documents()
	{
		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$profiledata = $this->Customer_Profile_Model->getprofile($customerid);

		$docflags = $this->Customer_Profile_Model->getdocumentflag($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/kyc-documents', ['meta' => $meta, 'profiledata' => $profiledata, 'docflags' => $docflags]);
	}

	public function uploaddocument()
	{
		if ($_REQUEST['doc'] != '') {
			$doctype = $_REQUEST['doc'];
			$customerid = stringCrypt($_REQUEST['customerid'], 'decrypt');

			$this->load->model('Customer_Profile_Model');
			$isdata = $this->Customer_Profile_Model->checkdocuments($customerid);

			if ($_FILES['userfile']['name'] != '') {
				$this->load->model('Site_General_Model');
				$kycdoc = $this->Site_General_Model->single_file_upload('userfile', 'kycdocuments', 'jpg|jpeg|png|doc|docx|pdf', 0);

				if ($kycdoc != false) {
					if ($isdata == 0) {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'userid' => $customerid,
							$doctype => $kycdoc
						);

						if (isset($_REQUEST['userfile_number'])) {
							$data[$doctype . '_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Customer_Profile_Model->createdocaccount($data);
					} else {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							$doctype => $kycdoc
						);

						if (isset($_REQUEST['userfile_number'])) {
							$data[$doctype . '_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Customer_Profile_Model->updatedocaccount($customerid, $data);
					}
				}
			}
		}

		return redirect('customer/profile/documents');
		die;
	}

	public function documentmsg()
	{
		$data = array(
			'remarks' => $_REQUEST['remarks'],
		);

		$this->load->model('Customer_Profile_Model');
		$response = $this->Customer_Profile_Model->documentremarks(stringCrypt($_REQUEST['customerid'], 'decrypt'), $data);

		return redirect('customer/profile/documents');
		die;
	}

	public function payoutdocuments()
	{

		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');;

		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$profiledata = $this->Customer_Profile_Model->getprofile($customerid);

		$docflags = $this->Customer_Profile_Model->getpayoutdocumentflag($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/payout-documents', ['meta' => $meta, 'profiledata' => $profiledata, 'docflags' => $docflags]);
	}

	public function uploadpayoutdocument()
	{
		if ($_REQUEST['doc'] != '') {
			$doctype = $_REQUEST['doc'];
			$customerid = $_REQUEST['customerid'];

			$this->load->model('Customer_Profile_Model');
			$isdata = $this->Customer_Profile_Model->checkpayoutdocuments($customerid);

			if ($_FILES['userfile']['name'] != '') {
				$this->load->model('Site_General_Model');
				$kycdoc = $this->Site_General_Model->single_file_upload('userfile', 'kycdocuments', 'jpg|jpeg|png|doc|docx|pdf', 0);

				if ($kycdoc != false) {
					if ($isdata == 0) {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'userid' => $customerid,
							$doctype => $kycdoc
						);

						if (isset($_REQUEST['userfile_number'])) {
							$data[$doctype . '_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Customer_Profile_Model->createpayoutdocaccount($data);
					} else {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							$doctype => $kycdoc
						);

						if (isset($_REQUEST['userfile_number'])) {
							$data[$doctype . '_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Customer_Profile_Model->updatepayoutdocaccount($customerid, $data);
					}
				}
			}
		}

		return redirect('customer/profile/payoutdocuments');
		die;
	}

	public function payoutdocumentmsg()
	{
		$data = array(
			'remarks' => $_REQUEST['remarks'],
		);

		$this->load->model('Customer_Profile_Model');
		$response = $this->Customer_Profile_Model->payoutdocumentremarks($_REQUEST['customerid'], $data);

		return redirect('customer/profile/payoutdocuments');
		die;
	}

	public function invoice($id)
	{
		$id = stringCrypt($id, 'decrypt');
		$this->load->model('Customer_Profile_Model');
		$invdetails = $this->Customer_Profile_Model->getinvoicedetails($id);
		$invoiceno = 'INV-' . $invdetails['orderinfo']->id;

		$this->load->library('pdf');
		$html = $this->load->view('customer/invoice', ['invdetails' => $invdetails], true);

		$this->pdf->createPDF($html, $invoiceno, false);

		/* return redirect('customer/profile/mcard'); */
	}

	public function changeprofile()
	{
		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');

		if($customerid == stringCrypt($_REQUEST['customerid'], 'decrypt')) {
			$data = array(
				'fullname' => $_REQUEST['fullname'],
				'email' => $_REQUEST['emailid'],
				'city' => $_REQUEST['city'],
				'state' => $_REQUEST['state']
			);

			$this->load->model('Customer_Profile_Model');
			$response = $this->Customer_Profile_Model->updateprofile($data, stringCrypt($_REQUEST['customerid'], 'decrypt'));

			if ($response == true) {
				echo json_encode(array("success" => true, "message" => "Profile successfully updated."));
			} else {
				echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));
		}
	}

	public function changepassword()
	{
		if ($this->session->userdata('mfb-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}

		$customerid = stringCrypt($this->session->userdata('mfb-customerid'), 'decrypt');;

		if ($customerid == stringCrypt($_REQUEST['customerid'], 'decrypt')) {
			$password = $_REQUEST['password'];
			$retypepassword = $_REQUEST['retypepassword'];

			if ($password === $retypepassword) {
				$this->load->model('Customer_Profile_Model');
				$enc_password = stringCrypt($password, 'encrypt');

				$response = $this->Customer_Profile_Model->changepassword($enc_password, stringCrypt($_REQUEST['customerid'], 'decrypt'));

				if ($response == true) {
					echo json_encode(array("success" => true, "message" => "Password successfully changed."));
				} else {
					echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));
				}
			} else {
				echo json_encode(array("success" => false, "message" => "Both password doesn't match."));
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Ops! Something goes wrong."));
		}
	}

}
?>