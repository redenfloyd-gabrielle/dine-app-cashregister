<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CUser extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MUser');
	  	}

		public function index()
		{
			
		}

		public function addUser($value='')
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

			$data = array('user_first_name' => $this->input->post('fname'),
						  'user_mi' => $this->input->post('mname'),
			  			  'user_last_name' => $this->input->post('lname'),
						  'user_type' => $this->input->post('position'),
						  'user_created_by' => '1',
						  'user_created_on' => $now->format('Y-m-d H:i:s'),
						  'user_modified_by' => '1',
						  'user_modified_on' => $now->format('Y-m-d H:i:s'),
						 );
			$result = $this->MUser->insert($data);
			if ($result) {
				// $this->viewUsersList();
				redirect('CUser/viewUsersList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}

		}

		function viewAdminDashboard()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vDashboard');
		}

		function viewSuperadminDashboard()
		{

			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vDashboard');
		}

		function viewUsersList()
		{
			$data['users'] = $this->MUser->getUsers();
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vUsersList',$data);
		}

		function viewUserInfo()
		{
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vUserInfo');
		}

		function vAddUser()
		{
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vAddUser');
			$this->load->view('imports/vSuperadminFooter');
		}

		function editUserInfo()
		{
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vEditUserInfo');
			$this->load->view('imports/vSuperadminFooter');
		}
	}

?>