<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrdered extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrdered');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}
 
		
		function viewQDashboard(){
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vQDashboard');
		}

		function displayOrder(){
			$qr = $_POST['qr'];
			
			$this->load->view('pos/vQrScan');
			
		}
	}

?>