<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CProduct extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MProduct');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}
        function viewMDashboard(){
			$prod = new MProduct();
			$result = $prod->getAllProducts();
			$arr = array();
			foreach ($result as $filter_result) {
				$arr[] = $filter_result->product_category;
			}
			$unique_category = array_unique($arr);
			$data['category'] = $unique_category;
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vMDashboard',$data);
			
		}
	

		function viewProduct($cat)
		{
			$prod = new MProduct();
			$result = $prod->getProductsByCategory($cat);

            $array = array();
			if($result){
				foreach ($result as $value) {
						$arrObj = new stdClass;
						$arrObj->product_name = $value->product_name;
						$arrObj->product_price = $value->product_price;
						$array[] = $arrObj;
				}
			}
			////////////STOPS HERE///////////////////////////////////////////////////
			$data['products']   = $array;
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vProducts',$data);
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