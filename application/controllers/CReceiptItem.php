<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CReceiptItem extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MReceiptItem');
	      $this->load->helper('url');
	  	}

		public function index()
		{
			
		}

		public function viewCheckout()
		{
			$this->load->view('imports/vHeader');
			$this->load->view('vCheckout');
		}
	}

?>