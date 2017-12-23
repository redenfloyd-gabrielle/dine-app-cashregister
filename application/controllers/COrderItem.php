<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrderItem extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrderItem');
	      $this->load->helper('url');
	  	}

		public function index()
		{
			
		}

		function viewEditOrder(){
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vEditOrder');
		}

	}

?>