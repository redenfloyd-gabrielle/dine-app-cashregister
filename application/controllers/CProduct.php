<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CProduct extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MProduct');
	      $this->load->model('MOrdered');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}

		public function addProduct()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			
			$data = array('product_image' => $this->input->post('image'),
						  'product_name' => $this->input->post('name'),
						  'product_description' => $this->input->post('description'),
						  'product_price' => $this->input->post('price'),
						  'product_availability' => $this->input->post('availability'),
						  'product_category' => $this->input->post('category'),
						  'product_created_by' => $this->session->userdata['userSession']['user_id'],
						  'product_created_on' => $now->format('Y-m-d H:i:s'),
						  'product_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'product_modified_on' => $now->format('Y-m-d H:i:s'),
						  );
			$result = $this->MProduct->insert($data);
			
			if ($result) {
				$prod_id = $this->MProduct->db->insert_id();
				$image = $this->MProduct->do_upload_product($prod_id);
				if(!$image){
					$photo = $this->MProduct->insertPhotoProduct("rice.png",$prod_id);
				}
				redirect('CProduct/viewMenuList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}
		}

        public function viewMDashboard(){
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vMDashboard');
		}
	

		public function viewProduct($cat)
		{
			$prod = new MProduct();
			$result = $prod->getProductsByCategory($cat);

            $array = array();
			if($result){
				foreach ($result as $value) {
						$arrObj = new stdClass;
						$arrObj->product_id = $value->product_id;
						$arrObj->product_name = $value->product_name;
						$arrObj->product_price = $value->product_price;
						$arrObj->product_image = $value->product_image;
						$arrObj->product_category = $value->product_category;
						$array[] = $arrObj;
				}
			}
			////////////STOPS HERE///////////////////////////////////////////////////
			$data['products']  = $array;
			$data['prod_cat']  = $cat;
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vProducts',$data);

			// print_r($data);
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