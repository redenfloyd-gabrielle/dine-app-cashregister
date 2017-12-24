<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CLogin extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MUser');
	      $this->load->library('session');
	      $this->load->library('form_validation');
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
			$this->load->view('imports/vAdminFooter');
		}

		function viewSuperadminDashboard()
		{
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vDashboard');
			$this->load->view('imports/vSuperadminFooter');
		}

		function viewPos()
		{
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/index');
		}

		function userLogin(){
			
			$this->form_validation->set_rules('user_id','User ID','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run()){
				$userID = $this->input->post('user_id');
				$password =	hash('sha512',$this->input->post('password')) ;
				$this->MUser->setUser_id($this->input->post('user_id'));
				$this->MUser->setUser_password(hash('sha512',$this->input->post('password')));
				$result = $this->MUser->attemptLogin();
				// print_r($result);
				if ($result) {
					// print_r($result);
					$this->createSession($result);
					if ($result[0]->user_type == 'ADMIN') {
						redirect('CLogin/viewAdminDashboard');
					} elseif ($result[0]->user_type == 'SUPERADMIN') {
						redirect('CLogin/viewSuperadminDashboard');
					} else if ($result[0]->user_type == 'REGULAR') {
						redirect('CLogin/viewPos');
					} else {
						redirect('CLogin');
					}
				} else {
					$data['errors'] = "";

					redirect('CLogin');
				}
			}else{
				redirect('CLogin');
			}
		}

		public function createSession($result)
		{
			foreach ($result as $row) {
			$sessionData = array('user_id' => $row->user_id,
                 				 'user_first_name' => $row->user_first_name,
	                             'user_mi' => $row->user_mi,
	                             'user_last_name' => $row->user_last_name,
	                             'user_type' => $row->user_type,
	                     		);
			$this->session->set_userdata('userSession', $sessionData);
			}
		}

		public function userLogout()
		{
			$this->session->unset_userdata('userSession');
			redirect('CLogin');
		}
	}
?>