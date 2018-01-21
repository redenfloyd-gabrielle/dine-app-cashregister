<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CUser extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->library('session');
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MUser');
	      $this->load->model('MOrdered');
	      $this->load->model('MProduct');
	      $this->load->model('MReceipt');
	      $url = $this->config->site_url();
     	  $this->urlSite = $url.'/CUser/editUserInfo/';
	  	}

		public function index()
		{
			
		}

		public function changePassword()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$id = $this->session->userdata['userSession']['user_id'];
			$data = array('user_password' => hash('sha512',$this->input->post('confirm')),
						  'user_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'user_modified_on' => $now->format('Y-m-d H:i:s')
						 );

			$result = $this->MUser->update($id, $data);
			if ($result) {
				redirect('CLogin/userLogout');
			} else {
				redirect('CLogin/viewSuperadminDashboard');
			}
		}

		public function resetPassword()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$id = $this->input->post('ruser_id');
			$data = array('user_password' => hash('sha512','123456'),
						  'user_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'user_modified_on' => $now->format('Y-m-d H:i:s')
						 );
			$result = $this->MUser->update($id, $data);
			if ($result) {
				redirect('CUser/viewUsersList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}
			
		}

		public function activateUser()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$id = $this->input->post('auser_id');
			$data = array('user_status' => 'ACTIVE',
						  'user_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'user_modified_on' => $now->format('Y-m-d H:i:s')
						 );
			$result = $this->MUser->update($id, $data);
			if ($result) {
				redirect('CUser/viewUsersList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}
			# code...
		}

		public function addUser()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$type = null;
			if($this->input->post('position') == 'Manager' ){
				$type = 'ADMIN';
			} else if ($this->input->post('position') == 'Owner' || $this->input->post('position') == 'Supervisor'){
				$type = 'SUPERADMIN';
			} else {
				$type = 'REGULAR';
			}

			$data = array('user_first_name' => $this->input->post('fname'),
						  'user_mi' => $this->input->post('mname'),
			  			  'user_last_name' => $this->input->post('lname'),
			  			  'user_position' => $this->input->post('position'),
						  'user_type' => $type,
						  'user_created_by' => $this->session->userdata['userSession']['user_id'],
						  'user_created_on' => $now->format('Y-m-d H:i:s'),
						  'user_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'user_modified_on' => $now->format('Y-m-d H:i:s'),
						 );
			$result = $this->MUser->insert($data);
			if ($result) {
				redirect('CUser/viewUsersList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}

		}

		public function updateUser($user_id)
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

			$type = null;
			if($this->input->post('position') == 'Manager' ){
				$type = 'ADMIN';
			} else if ($this->input->post('position') == 'Owner' || $this->input->post('position') == 'Supervisor'){
				$type = 'SUPERADMIN';
			} else {
				$type = 'REGULAR';
			}

			$data = array('user_first_name' => $this->input->post('fname'),
						  'user_mi' => $this->input->post('mname'),
			  			  'user_last_name' => $this->input->post('lname'),
						  'user_position' => $this->input->post('position'),
						  'user_type' => $type,
						  'user_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'user_modified_on' => $now->format('Y-m-d H:i:s'),
						 );
			$result = $this->MUser->update($user_id,$data);
			if ($result) {
				// $this->viewUsersList();
				redirect('CUser/viewUserInfo/'.$user_id);
			} else {
				print_r('SOMETHING WENT WRONG;');
			}
			# code...
		}

		public function deleteUser()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$user_id = $this->input->post('user_id');
			$data = array('user_status' => 'DELETED',
						  'user_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'user_modified_on' => $now->format('Y-m-d H:i:s'),
						 );
			$result = $this->MUser->update($user_id, $data);
			if ($result) {
				// $this->viewUsersList();
				redirect('CUser/viewUsersList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}

		}


		public function getUsers()
		{
			// Datatables Variables
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));

			$users = $this->MUser->getUsers();
         	$data = array();

			foreach($users->result() as $us) {
				if ($us->user_status == 'ACTIVE') {
					$reset = '<a class="ui inverted orange icon disabled button" data-tooltip="Reset Password">
                               	<i class="refresh icon"></i> 
                              </a>';
					if($us->user_type != 'REGULAR'){
						$reset = ' <a id="reset" class="ui inverted orange icon button resetPassword" data-id="'.$us->user_id.'" data-tooltip="Reset Password">
                               			<i class="refresh icon"></i> 
                               	    </a>';
					} 
					$actions = 	'<a href="'.$this->urlSite.''.$us->user_id.'" >
									<div class="ui inverted blue icon button" data-tooltip="Edit User">
										<i class="edit icon"></i> 
									</div>	
                               	</a>'.$reset.'
	                           	<a id="deleteUser" class="ui inverted red icon button deleteUser" data-id="'.$us->user_id.'" data-tooltip="Delete User">
                                    <i class="trash icon"></i> 
                                </a>';
				} else {
					$actions = 	'<a class="ui inverted green icon button activateUser" data-id="'.$us->user_id.'" data-tooltip="Activate User">
                                    <i class="power icon"></i> 
                                </a>';
				}
			   	$data[] = array(
			        $us->user_id,
			        $us->user_first_name.' '.$us->user_mi.'. '.$us->user_last_name,
			        $us->user_position,
			        $us->user_type,
			        $us->user_status,
			        $actions,
			        
			   	);
			}

			$output = array(
			  	"draw" => $draw,
			    "recordsTotal" => $users->num_rows(),
			    "recordsFiltered" => $users->num_rows(),
			    "data" => $data
			);
			echo json_encode($output);
			exit();
		}


		function viewAdminDashboard()
		{
			$data['count'] = $this->MReceipt->countOrders();
			$data['product'] = $this->MProduct->countProducts();
			$data['sales'] = $this->MReceipt->getTotal();

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

		function viewUsersList()
		{
			$result = $this->MUser->getUsers();

			$data['users'] = ($result)? $result->result() : null;

			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vUsersList',$data);	
			$this->load->view('imports/vSuperadminFooter');
		}

		function viewUserInfo($user_id)
		{
			$data['user'] = $this->MUser->getUser($user_id);

			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vUserInfo',$data);
			$this->load->view('imports/vSuperadminFooter');
		}

		function viewReports()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vReports');
			$this->load->view('imports/vAdminFooter');
		}

		function vAddUser()
		{
			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vAddUser');
			$this->load->view('imports/vSuperadminFooter');
		}

		function editUserInfo($user_id)
		{
			$data['user'] = $this->MUser->getUser($user_id);

			$this->load->view('imports/vSuperadminHeader');
			$this->load->view('superadmin/vEditUserInfo',$data);
			$this->load->view('imports/vSuperadminFooter');
		}
	}

?>