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
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vUsersList');
		}

		function viewUserInfo()
		{
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vUserInfo');
		}

		function addUser()
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