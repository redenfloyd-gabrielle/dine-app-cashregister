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
 			$data["data"] = $this->MReports->get_data();
 			$data["daily"] = $this->MReports->get_daily();


 			//////////////////////////////////WEEKLY////////////////////////////////////////////////
 			if(date('Y-m-d', strtotime('-21 day', strtotime('monday this week'))) >= date('Y-m-01')) {
 				$data["weekly3"] = $this->MReports->get_weekly3();
 			}else{
 				$data["weekly3"] = 0;
 			}

 			if(date('Y-m-d', strtotime('-14 day', strtotime('monday this week'))) >= date('Y-m-01')){
 				$data["weekly2"] = $this->MReports->get_weekly2();
 			}else{
 				$data["weekly2"] = 0;
 			}

 			if(date('Y-m-d', strtotime('-7 day', strtotime('monday this week'))) >= date('Y-m-01')){
 				$data["weekly1"] = $this->MReports->get_weekly1();
 			}else{
 				$data["weekly1"] = 0;
 			}

 			$data["weekly"] = $this->MReports->get_weekly();


 			////////////////////////////////////MONTHLY/////////////////////////////////////////////////
 			if(date('m') > date('Y-01-d')){
 				$data["monthly1"] = $this->MReports->get_month1();
 			}else{
 				$data["monthly1"] = 0;
 			}	

 			if(date('m') > date('Y-02-d')){
 				$data["monthly2"] = $this->MReports->get_month2();
 			}else{
 				$data["monthly2"] = 0;
 			}

 			if(date('m') > date('Y-03-d')){
 				$data["monthly3"] = $this->MReports->get_month3();
 			}else{
 				$data["monthly3"] = 0;
 			}

 			if(date('m') > date('Y-04-d')){
 				$data["monthly4"] = $this->MReports->get_month4();
 			}else{
 				$data["monthly4"] = 0;
 			}

 			if(date('m') > date('Y-05-d')){
 				$data["monthly5"] = $this->MReports->get_month5();
 			}else{
 				$data["monthly5"] = 0;
 			}

 			if(date('m') > date('Y-06-d')){
 				$data["monthly6"] = $this->MReports->get_month6();
 			}else{
 				$data["monthly6"] = 0;
 			}

 			if(date('m') > date('Y-07-d')){
 				$data["monthly7"] = $this->MReports->get_month7();
 			}else{
 				$data["monthly7"] = 0;
 			}

 			if(date('m') > date('Y-08-d')){
 				$data["monthly8"] = $this->MReports->get_month8();
 			}else{
 				$data["monthly8"] = 0;
 			}

 			if(date('m') > date('Y-09-d')){
 				$data["monthly9"] = $this->MReports->get_month9();
 			}else{
 				$data["monthly9"] = 0;
 			}

 			if(date('m') > date('Y-10-d')){
 				$data["monthly10"] = $this->MReports->get_month10();
 			}else{
 				$data["monthly10"] = 0;
 			}

 			if(date('m') > date('Y-11-d')){
 				$data["monthly11"] = $this->MReports->get_month11();
 			}else{
 				$data["monthly11"] = 0;
 			}


 			$data["monthly"] = $this->MReports->get_month();

 			
 			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vReports',$data);
			$this->load->view('imports/vAdminFooter');
 		}

 		public function getData(){
 			$this->load->model("MReports");
 			$data["data"] = $this->MReports->get_data();
 			$data["daily"] = $this->MReports->get_daily();


 			//////////////////////////////////WEEKLY////////////////////////////////////////////////
 			if(date('Y-m-d', strtotime('-21 day', strtotime('monday this week'))) >= date('Y-m-01')) {
 				$data["weekly3"] = $this->MReports->get_weekly3();
 			}else{
 				$data["weekly3"] = 0;
 			}

 			if(date('Y-m-d', strtotime('-14 day', strtotime('monday this week'))) >= date('Y-m-01')){
 				$data["weekly2"] = $this->MReports->get_weekly2();
 			}else{
 				$data["weekly2"] = 0;
 			}

 			if(date('Y-m-d', strtotime('-7 day', strtotime('monday this week'))) >= date('Y-m-01')){
 				$data["weekly1"] = $this->MReports->get_weekly1();
 			}else{
 				$data["weekly1"] = 0;
 			}

 			$data["weekly"] = $this->MReports->get_weekly();


 			////////////////////////////////////MONTHLY/////////////////////////////////////////////////
 			if(date('m') > date('01')){
 				$data["monthly1"] = $this->MReports->get_month1();
 			}	

 			if(date('m') > date('02')){
 				$data["monthly2"] = $this->MReports->get_month2();
 			}

 			if(date('m') > date('03')){
 				$data["monthly3"] = $this->MReports->get_month3();
 			}

 			if(date('m') > date('04')){
 				$data["monthly4"] = $this->MReports->get_month4();
 			}

 			if(date('m') > date('05')){
 				$data["monthly5"] = $this->MReports->get_month5();
 			}

 			if(date('m') > date('06')){
 				$data["monthly6"] = $this->MReports->get_month6();
 			}

 			if(date('m') > date('07')){
 				$data["monthly7"] = $this->MReports->get_month7();
 			}

 			if(date('m') > date('08')){
 				$data["monthly8"] = $this->MReports->get_month8();
 			}

 			if(date('m') > date('09')){
 				$data["monthly9"] = $this->MReports->get_month9();
 			}

 			if(date('m') > date('10')){
 				$data["monthly10"] = $this->MReports->get_month10();
 			}

 			if(date('m') > date('11')){
 				$data["monthly11"] = $this->MReports->get_month11();
 			}


 			$data["monthly"] = $this->MReports->get_month();

 			
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