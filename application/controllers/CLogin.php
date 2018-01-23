<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CLogin extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MUser');
	      $this->load->model('MReceipt');
	      $this->load->model('MProduct');
	      $this->load->library('session');
	      $this->load->library('form_validation');
		  $this->load->helper('url'); 
		  $this->load->model('MReceipt');
		  $this->load->model('MOrdered');
	  	}

		public function index()
		{
			if ($this->session->userdata('userSession') == FALSE) {
				$this->load->view('vLogin');
			} elseif ($this->session->userdata['userSession']['user_type'] == 'ADMIN') {
			    redirect('CLogin/viewAdminDashboard');
			} else if ($this->session->userdata['userSession']['user_type'] == 'REGULAR') {
			    redirect('CLogin/viewPos');
			} else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
			    redirect('CLogin/viewSuperadminDashboard');
			} else {
			    redirect('CInitialize');
			}
		}

		function viewAdminDashboard()
		{
			$data['count'] = $this->MReceipt->countOrders();
			$data['product'] = $this->MProduct->countProducts();
			$data['sales'] = $this->MReceipt->getTotal();
			$data['daily'] = $this->MReceipt->getDailySales();
			$data['weekly'] = $this->MReceipt->getWeeklySales();
			$data['monthly'] = $this->MReceipt->getMonthlySales();
			$result = $this->MOrdered->getPendingOrders();
			$array = array();
			if($result){
				foreach($result as $value){
					$arr = new stdClass;
					$arr->ordered_id = $value->ordered_id;
					$arr->ordered_total = $value->ordered_total;
					$arr->ordered_qr_code = $value->ordered_qr_code;
					$array[]=$arr;
				}
				$data['pending'] = $array;
			}else{
				$data['pending'] = null;
			}

			$result1 = $this->MOrdered->getScannedOrders();
			$array = array();
			if($result1){
				foreach($result1 as $value){
					$arr = new stdClass;
					$arr->ordered_id = $value->ordered_id;
					$arr->ordered_total = $value->ordered_total;
					$arr->ordered_qr_code = $value->ordered_qr_code;
					$array[]=$arr;
				}$data['scanned'] = $array;
			}else{
				$data['scanned'] = null;
			}


			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vDashboard',$data);
			$this->load->view('imports/vAdminFooter');
			
		}

		function viewSuperadminDashboard()
		{
			$data['users'] = $this->MUser->countUsers();
			$data['active'] =  $this->MUser->countActiveUsers();
			$data['inactive'] =  $this->MUser->countInactiveUsers();

			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vDashboard', $data);
			$this->load->view('imports/vSuperadminFooter');
		}

		function viewPos()
		{
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/POSHome');
		}
	
		function userLogin(){
			if ($this->session->userdata('userSession') == FALSE) {
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
						$this->updateOrderStatus();
						//print_r($this->session->userdata['userSession']['user_type']);
						if ($result[0]->user_type == 'ADMIN') {
							redirect('CLogin/viewAdminDashboard');
						} elseif ($result[0]->user_type == 'SUPERADMIN') {
							redirect('CLogin/viewSuperadminDashboard');
						} else if ($result[0]->user_type == 'REGULAR') {
							redirect('CLogin/viewPos');
						} else {
							$this->session->set_flashdata('response',"Invalid Login Attempt!");
							$this->session->set_flashdata('error',"Check User ID and Password.");
							redirect('CInitialize');
						}
					} else {
						$this->session->set_flashdata('response',"Invalid Login Attempt!");
						$this->session->set_flashdata('error',"Check User ID and Password.");
						redirect('CInitialize');

					}
				}else{
					$this->session->set_flashdata('response',"Empty Login!");
					$this->session->set_flashdata('error',"Enter User ID and Password.");
					redirect('CInitialize');
				}
			} elseif ($this->session->userdata['userSession']['user_type'] == 'ADMIN') {
			    redirect('CLogin/viewAdminDashboard');
			} else if ($this->session->userdata['userSession']['user_type'] == 'REGULAR') {
			    redirect('CLogin/viewPos');
			} else if ($this->session->userdata['userSession']['user_type'] == 'SUPERADMIN') {
			    redirect('CLogin/viewSuperadminDashboard');
			} else {
			    redirect('CInitialize');
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
								 'user_position' => $row->user_position,
								 'user_password' => $row->user_password
	                     		);
			$this->session->set_userdata('userSession', $sessionData);
			}
		}

		
		public function userLogout()
		{
			$this->session->unset_userdata('userSession');
			redirect('CLogin');
		}

		public function updateOrderStatus()
		{
			$result = $this->MOrdered->getPendingOrdersResult();
			 foreach ($result as $value) {
			 	$id = $value->ordered_id;
				$time = $value->ordered_time;
				$date_now =new DateTime(NULL, new DateTimeZone('Asia/Manila'));
				$dt = $date_now->format('Y-m-d H:i:s');
			    $date = date_create_from_format('Y-m-d H:i:s', $time);
				$datenow = date_create_from_format('Y-m-d H:i:s', $dt);
				$interval = date_diff($datenow,$date);
				$diff += $interval->h;
				if($interval ->d > 0){
					$diff = $interval->d * 24;
				}
		        if($diff >= 4){
		        	$stat = array('ordered_status' => 'expired');
					$query = $this->MOrdered->update($id, $stat);
			    }
		  }
			
		
		}
	}
?>