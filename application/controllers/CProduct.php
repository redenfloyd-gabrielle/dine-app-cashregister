<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CProduct extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MProduct');
	      $this->load->helper('url');
	  	}

		public function index()
		{
			
		}

		function viewProduct()
		{
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vProducts');
		}

		function viewMenuList()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vMenuList');
			$this->load->view('imports/vAdminFooter');
		}

		function addMenu()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vAddMenu');
			$this->load->view('imports/vAdminFooter');
		}

		function viewMenuInfo()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vMenuInfo');
			$this->load->view('imports/vAdminFooter');
		}

		function editMenuInfo()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vEditMenuInfo');
			$this->load->view('imports/vAdminFooter');
		}
	}

?>