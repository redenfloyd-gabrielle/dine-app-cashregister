<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CProduct extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->database(); // load database
	      $this->load->model('MProduct');
	      $this->load->helper('url');
	  	}

		public function index()
		{
			
		}

		function viewProduct(){
			$this->load->view('imports/vHeader');
			$this->load->view('vProducts');
		}

	}

?>