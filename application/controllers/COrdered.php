<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrdered extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrdered');
	      $this->load->helper('url');
	  	}

		public function index()
		{
			
		}

		function viewMDashboard(){
			$this->load->view('imports/vHeader');
			$this->load->view('vMDashboard');
		}
		function viewQDashboard(){
			$this->load->view('imports/vHeader');
			$this->load->view('vQDashboard');
		}

	}

?>