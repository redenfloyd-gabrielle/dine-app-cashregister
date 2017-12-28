<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrderItem extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrderItem');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}

		function viewEditOrder($page,$id){
			$data['page'] = $page;
			$data['id'] = $id;
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vEditOrder',$data);
		}

	}

?>