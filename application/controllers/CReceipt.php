<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CReceipt extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MReceipt');
	  	}

		public function index()
		{
			
		}

	}

?>