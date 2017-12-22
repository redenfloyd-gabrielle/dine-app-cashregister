<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CLogin extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->database(); // load database
	      $this->load->model('MUser');
	      $this->load->library('session');
	 	  $this->load->helper('url');
	  	}

		public function index()
		{
			$this->load->view('vLogin');
		}

		function login(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('userID','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()){
				$userID = $this->input->post('userID');
				$password = $this->input->post('password');

				if($userID == '123' && $password == 'user'){
					$this->load->view('imports/vHeader');
					$this->load->view('index');
				}else{
					$this->index();
				}
			}else{
				$this->index();
			}
		}

	}

?>