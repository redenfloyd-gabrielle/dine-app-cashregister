<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CUser extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->database(); // load database
	      $this->load->model('MUser');
	  	}

		public function index()
		{
			
		}

	}

?>