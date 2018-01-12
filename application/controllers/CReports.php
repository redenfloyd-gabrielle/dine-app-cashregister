<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CReports extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MGuest');
	      $this->load->library('session');	      
	  	}

		public function index()
		{
			
		}

		function viewReports()
 		{
 			$this->load->model("MReports");
 			$this->load->model("MProduct");
 			$data["data"] = $this->MReports->get_data();
 			$data["product"] = $this->MProduct->getAllProducts();
 			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vReports',$data);
			$this->load->view('imports/vAdminFooter');
 		}

 		public function getData(){
 			$this->load->model("MReports");
 			$this->load->model("MProduct");
 			$data["data"] = $this->MReports->get_data();
 			$data["product"] = $this->MProduct->getAllProducts();
 			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vReports',$data);
			$this->load->view('imports/vAdminFooter');
 		}

 		public function downloadToExcel(){

 			$this->load->model("MReports");
 			$data["data"] = $this->MReports->get_data();
 			
 			// $this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vDownload',$data);
			// $this->load->view('imports/vAdminFooter');

 		// 	header('Content-Type: application/vnd.ms-excel');
			// header('Content-Disposition: attachment;filename="download.xls"');
			// echo $output;
 		}
	}

?>