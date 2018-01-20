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
 			
 			//////////////////////////////////DAILY/////////////////////////////////////////////////
 			if(date('Y-m-d') >= date('Y-m-01')){
 				$data["daily1"] = $this->MReports->get_daily1();
 			}else{
 				$data["daily1"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-02')){
 				$data["daily2"] = $this->MReports->get_daily2();
 			}else{
 				$data["daily2"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-03')){
 				$data["daily3"] = $this->MReports->get_daily3();
 			}else{
 				$data["daily3"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-04')){
 				$data["daily4"] = $this->MReports->get_daily4();
 			}else{
 				$data["daily4"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-05')){
 				$data["daily5"] = $this->MReports->get_daily5();
 			}else{
 				$data["daily5"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-06')){
 				$data["daily6"] = $this->MReports->get_daily6();
 			}else{
 				$data["daily6"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-07')){
 				$data["daily7"] = $this->MReports->get_daily7();
 			}else{
 				$data["daily7"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-08')){
 				$data["daily8"] = $this->MReports->get_daily8();
 			}else{
 				$data["daily8"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-09')){
 				$data["daily9"] = $this->MReports->get_daily9();
 			}else{
 				$data["daily9"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-10')){
 				$data["daily10"] = $this->MReports->get_daily10();
 			}else{
 				$data["daily10"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-11')){
 				$data["daily11"] = $this->MReports->get_daily11();
 			}else{
 				$data["daily11"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-12')){
 				$data["daily12"] = $this->MReports->get_daily12();
 			}else{
 				$data["daily12"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-13')){
 				$data["daily13"] = $this->MReports->get_daily13();
 			}else{
 				$data["daily13"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-14')){
 				$data["daily14"] = $this->MReports->get_daily14();
 			}else{
 				$data["daily14"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-15')){
 				$data["daily15"] = $this->MReports->get_daily15();
 			}else{
 				$data["daily15"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-16')){
 				$data["daily16"] = $this->MReports->get_daily16();
 			}else{
 				$data["daily16"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-17')){
 				$data["daily17"] = $this->MReports->get_daily17();
 			}else{
 				$data["daily17"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-18')){
 				$data["daily18"] = $this->MReports->get_daily18();
 			}else{
 				$data["daily18"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-19')){
 				$data["daily19"] = $this->MReports->get_daily19();
 			}else{
 				$data["daily19"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-20')){
 				$data["daily20"] = $this->MReports->get_daily20();
 			}else{
 				$data["daily20"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-21')){
 				$data["daily21"] = $this->MReports->get_daily21();
 			}else{
 				$data["daily21"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-22')){
 				$data["daily22"] = $this->MReports->get_daily22();
 			}else{
 				$data["daily22"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-23')){
 				$data["daily23"] = $this->MReports->get_daily23();
 			}else{
 				$data["daily23"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-24')){
 				$data["daily24"] = $this->MReports->get_daily24();
 			}else{
 				$data["daily24"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-25')){
 				$data["daily25"] = $this->MReports->get_daily25();
 			}else{
 				$data["daily25"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-26')){
 				$data["daily26"] = $this->MReports->get_daily26();
 			}else{
 				$data["daily26"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-27')){
 				$data["daily27"] = $this->MReports->get_daily27();
 			}else{
 				$data["daily27"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-28')){
 				$data["daily28"] = $this->MReports->get_daily28();
 			}else{
 				$data["daily28"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-29')){
 				$data["daily29"] = $this->MReports->get_daily29();
 			}else{
 				$data["daily29"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-30')){
 				$data["daily30"] = $this->MReports->get_daily30();
 			}else{
 				$data["daily30"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-31')){
 				$data["daily31"] = $this->MReports->get_daily31();
 			}else{
 				$data["daily31"] = 0;
 			}

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
 			if(date('Y-m-d') > date('Y-01-d')){
 				$data["monthly1"] = $this->MReports->get_month1();
 			}else{
 				$data["monthly1"] = 0;
 			}	

 			if(date('Y-m-d') > date('Y-02-d')){
 				$data["monthly2"] = $this->MReports->get_month2();
 			}else{
 				$data["monthly2"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-03-d')){
 				$data["monthly3"] = $this->MReports->get_month3();
 			}else{
 				$data["monthly3"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-04-d')){
 				$data["monthly4"] = $this->MReports->get_month4();
 			}else{
 				$data["monthly4"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-05-d')){
 				$data["monthly5"] = $this->MReports->get_month5();
 			}else{
 				$data["monthly5"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-06-d')){
 				$data["monthly6"] = $this->MReports->get_month6();
 			}else{
 				$data["monthly6"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-07-d')){
 				$data["monthly7"] = $this->MReports->get_month7();
 			}else{
 				$data["monthly7"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-08-d')){
 				$data["monthly8"] = $this->MReports->get_month8();
 			}else{
 				$data["monthly8"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-09-d')){
 				$data["monthly9"] = $this->MReports->get_month9();
 			}else{
 				$data["monthly9"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-10-d')){
 				$data["monthly10"] = $this->MReports->get_month10();
 			}else{
 				$data["monthly10"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-11-d')){
 				$data["monthly11"] = $this->MReports->get_month11();
 			}else{
 				$data["monthly11"] = 0;
 			}

			
 			$data["monthly"] = $this->MReports->get_month();
 
 			
 			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vReports',$data);
			$this->load->view('imports/vAdminFooter');
	 		}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	 		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 		public function getData($str){
 			$this->load->model("MReports");

 			switch ($str) {
 				case 'Daily':
 					$data["data"] = $this->MReports->get_data_daily();
 					break;
 				case 'Weekly':
 					$data["data"] = $this->MReports->get_data_weekly();
 					break;
 				case 'Monthly':
 					$data["data"] = $this->MReports->get_data_monthly();
 					break;
 				default:
 					$data["data"] = $this->MReports->get_data();
 					break;
 			}
 			
 			
 			//////////////////////////////////DAILY/////////////////////////////////////////////////
 			if(date('Y-m-d') >= date('Y-m-01')){
 				$data["daily1"] = $this->MReports->get_daily1();
 			}else{
 				$data["daily1"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-02')){
 				$data["daily2"] = $this->MReports->get_daily2();
 			}else{
 				$data["daily2"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-03')){
 				$data["daily3"] = $this->MReports->get_daily3();
 			}else{
 				$data["daily3"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-04')){
 				$data["daily4"] = $this->MReports->get_daily4();
 			}else{
 				$data["daily4"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-05')){
 				$data["daily5"] = $this->MReports->get_daily5();
 			}else{
 				$data["daily5"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-06')){
 				$data["daily6"] = $this->MReports->get_daily6();
 			}else{
 				$data["daily6"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-07')){
 				$data["daily7"] = $this->MReports->get_daily7();
 			}else{
 				$data["daily7"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-08')){
 				$data["daily8"] = $this->MReports->get_daily8();
 			}else{
 				$data["daily8"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-09')){
 				$data["daily9"] = $this->MReports->get_daily9();
 			}else{
 				$data["daily9"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-10')){
 				$data["daily10"] = $this->MReports->get_daily10();
 			}else{
 				$data["daily10"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-11')){
 				$data["daily11"] = $this->MReports->get_daily11();
 			}else{
 				$data["daily11"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-12')){
 				$data["daily12"] = $this->MReports->get_daily12();
 			}else{
 				$data["daily12"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-13')){
 				$data["daily13"] = $this->MReports->get_daily13();
 			}else{
 				$data["daily13"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-14')){
 				$data["daily14"] = $this->MReports->get_daily14();
 			}else{
 				$data["daily14"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-15')){
 				$data["daily15"] = $this->MReports->get_daily15();
 			}else{
 				$data["daily15"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-16')){
 				$data["daily16"] = $this->MReports->get_daily16();
 			}else{
 				$data["daily16"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-17')){
 				$data["daily17"] = $this->MReports->get_daily17();
 			}else{
 				$data["daily17"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-18')){
 				$data["daily18"] = $this->MReports->get_daily18();
 			}else{
 				$data["daily18"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-19')){
 				$data["daily19"] = $this->MReports->get_daily19();
 			}else{
 				$data["daily19"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-20')){
 				$data["daily20"] = $this->MReports->get_daily20();
 			}else{
 				$data["daily20"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-21')){
 				$data["daily21"] = $this->MReports->get_daily21();
 			}else{
 				$data["daily21"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-22')){
 				$data["daily22"] = $this->MReports->get_daily22();
 			}else{
 				$data["daily22"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-23')){
 				$data["daily23"] = $this->MReports->get_daily23();
 			}else{
 				$data["daily23"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-24')){
 				$data["daily24"] = $this->MReports->get_daily24();
 			}else{
 				$data["daily24"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-25')){
 				$data["daily25"] = $this->MReports->get_daily25();
 			}else{
 				$data["daily25"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-26')){
 				$data["daily26"] = $this->MReports->get_daily26();
 			}else{
 				$data["daily26"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-27')){
 				$data["daily27"] = $this->MReports->get_daily27();
 			}else{
 				$data["daily27"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-28')){
 				$data["daily28"] = $this->MReports->get_daily28();
 			}else{
 				$data["daily28"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-29')){
 				$data["daily29"] = $this->MReports->get_daily29();
 			}else{
 				$data["daily29"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-30')){
 				$data["daily30"] = $this->MReports->get_daily30();
 			}else{
 				$data["daily30"] = 0;
 			}

 			if(date('Y-m-d') >= date('Y-m-31')){
 				$data["daily31"] = $this->MReports->get_daily31();
 			}else{
 				$data["daily31"] = 0;
 			}

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



 			if(date('Y-m-d') > date('Y-01-d')){
 				$data["monthly1"] = $this->MReports->get_month1();
 			}else{
 				$data["monthly1"] = 0;
 			}	

 			if(date('Y-m-d') > date('Y-02-d')){
 				$data["monthly2"] = $this->MReports->get_month2();
 			}else{
 				$data["monthly2"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-03-d')){
 				$data["monthly3"] = $this->MReports->get_month3();
 			}else{
 				$data["monthly3"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-04-d')){
 				$data["monthly4"] = $this->MReports->get_month4();
 			}else{
 				$data["monthly4"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-05-d')){
 				$data["monthly5"] = $this->MReports->get_month5();
 			}else{
 				$data["monthly5"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-06-d')){
 				$data["monthly6"] = $this->MReports->get_month6();
 			}else{
 				$data["monthly6"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-07-d')){
 				$data["monthly7"] = $this->MReports->get_month7();
 			}else{
 				$data["monthly7"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-08-d')){
 				$data["monthly8"] = $this->MReports->get_month8();
 			}else{
 				$data["monthly8"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-09-d')){
 				$data["monthly9"] = $this->MReports->get_month9();
 			}else{
 				$data["monthly9"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-10-d')){
 				$data["monthly10"] = $this->MReports->get_month10();
 			}else{
 				$data["monthly10"] = 0;
 			}

 			if(date('Y-m-d') > date('Y-11-d')){
 				$data["monthly11"] = $this->MReports->get_month11();
 			}else{
 				$data["monthly11"] = 0;
 			}

			
 			$data["monthly"] = $this->MReports->get_month();
 			

 			
 			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vReports',$data);
			$this->load->view('imports/vAdminFooter');
 		}

 		public function downloadToExcel($str){

 			$this->load->model("MReports");
 			switch ($str) {
 				case 'Daily':
 					$data["data"] = $this->MReports->get_data_daily();
 					break;
 				case 'Weekly':
 					$data["data"] = $this->MReports->get_data_weekly();
 					break;
 				case 'Monthly':
 					$data["data"] = $this->MReports->get_data_monthly();
 					break;
 				default:
 					$data["data"] = $this->MReports->get_data();
 					break;
 			}
			$this->load->view('admin/vDownload',$data);
			// $this->load->view('imports/vAdminFooter');

 		// 	header('Content-Type: application/vnd.ms-excel');
			// header('Content-Disposition: attachment;filename="download.xls"');
			// echo $output;
 		}
	}

?>