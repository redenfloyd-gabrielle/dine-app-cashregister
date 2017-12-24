<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CLogin extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MUser');
	      $this->load->library('session');
	 	  $this->load->helper('url');
	  	}

		public function index()
		{
			$this->load->view('vLogin');
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

		function viewPos()
		{
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/index');
		}

		function login(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('userID','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()){
				$userID = $this->input->post('userID');
				$password = $this->input->post('password');

				if($userID == 'cashier' && $password == 'cashier'){
					$this->viewPos();
				}else if($userID == 'admin' && $password == 'admin'){
					$this->viewAdminDashboard();
				}else if($userID == 'superadmin' && $password == 'superadmin'){
					$this->viewSuperadminDashboard();
				}else{
					$this->index();
				}
			}else{
				$this->index();
			}
		}

	}

?>