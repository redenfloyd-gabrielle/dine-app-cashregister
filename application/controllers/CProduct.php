<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CProduct extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MProduct');
	      $this->load->model('MOrdered');
	      $this->load->model('MOrderItem');
	      $this->load->model('MReceiptItem');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}

		public function deleteProduct()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$prod_id = $this->input->post('product_id');
			$data = array('product_availability' => 'NOT AVAILABLE',
						  'product_modified_by' => $this->session->userdata['userSession']['user_id'],
			              'product_modified_on' => $now->format('Y-m-d H:i:s a'),
						 );
			$result = $this->MProduct->update($prod_id, $data);
			if ($result) {
				redirect('CProduct/viewCategoryList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}

		}
		
		public function updateProduct($id)
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			
			$data = array('product_name' => $this->input->post('name'),
						  'product_description' => $this->input->post('description'),
						  'product_price' => $this->input->post('price'),
						  'product_availability' => $this->input->post('availability'),
						  'product_category' => $this->input->post('category'),
						  'product_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'product_modified_on' => $now->format('Y-m-d H:i:s a'),
						  );
			$result = $this->MProduct->update($id,$data);
			
			if ($result) {
				if($this->input->post('pic')){
					$image = $this->MProduct->do_upload_product($id);
					if(!$image){
						$photo = $this->MProduct->insertPhotoProduct("rice.png",$prod_id);
					}
				} 
				redirect('CProduct/viewCategoryList');
			} else {
				print_r('SOMETHING WENT WRONG;');
			}
		}
		

		public function viewProducts()
		{
			
			$this->load->view('imports/vAdminHeader'); 
			$this->load->view('admin/vProductsInCategory');
			$this->load->view('imports/vAdminFooter');

		}

		public function addProduct()
		{
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			
			$data = array('product_image' => 'rice.png',
						  'product_name' => $this->input->post('name'),
						  'product_description' => $this->input->post('description'),
						  'product_price' => $this->input->post('price'),
						  'product_availability' => $this->input->post('availability'),
						  'product_category' => $this->input->post('category'),
						  'product_created_by' => $this->session->userdata['userSession']['user_id'],
						  'product_created_on' => $now->format('Y-m-d H:i:s a'),
						  'product_modified_by' => $this->session->userdata['userSession']['user_id'],
						  'product_modified_on' => $now->format('Y-m-d H:i:s a'),
						  );
			$result = $this->MProduct->insert($data);
			
			if ($result) {
				$prod_id = $this->MProduct->db->insert_id();
				$image = $this->MProduct->do_upload_product($prod_id);
				if(!$image){
					$photo = $this->MProduct->insertPhotoProduct("rice.png",$prod_id);
				}
				redirect('CProduct/viewCategoryList');
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
			$cat = urldecode($cat);
			$result = $this->MProduct->getProductsByCategory($cat);

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
				$data['products']  = $array;
				
			}else{
				$data['products']  = null;
			}
			////////////STOPS HERE///////////////////////////////////////////////////
			$data['prod_cat']  = $cat;
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vProducts',$data);

			// print_r($data);
		}
		public function viewProductEdit($page,$cat,$id)
		{
			$cat = urldecode($cat);
			$result = $this->MProduct->getProductsByCategory($cat);


			$data['page'] = $page;
			$data['prod_cat']  = $cat;
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
			$data['products']  = $array;
			}else{
				$data = null;
			}
			////////////STOPS HERE//////////////////////////////////////////////////

			if($page=='qr'){
				$result = $this->MOrderItem->getOrderItemDetailsByOrder($id);
				if($result){
					foreach ($result as $value) {
						$arr= new stdClass;
						$arr->product_name = $value->product_name;
						$arr->item_id = $value->order_item_id;
						$arr->product_price = $value->product_price;
						$arr->order_item_qty = $value->order_item_qty;
						$arr->order_item_subtotal = $value->order_item_subtotal;
						$array1[] = $arr;
					}
					$data['order_info'] = $array1;
				}else{
					$data['order_info'] = null;
				}
			}else{
				$result = $this->MReceiptItem->getReceiptItemDetailsByReceipt($id);

				if($result){
					foreach ($result as $value) {
						$arr= new stdClass;
						$arr->item_id = $value->receipt_item_id;
						$arr->product_name = $value->product_name;
						$arr->product_price = $value->product_price;
						$arr->order_item_qty = $value->receipt_item_quantity;
						$arr->order_item_subtotal = $value->receipt_item_subtotal;
						$array1[] = $arr;
					}

					$data['order_info'] = $array1;
			    }else{
			    	$data['order_info'] = null;
			    }
			}
			
			$data['eid'] = $id;
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vProductEdit',$data);

			
		}

		function viewCategoryList()
		{

			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vCategoryList');
			$this->load->view('imports/vAdminFooter');
		} 

		function viewProductsInCategory($cat)
		{
			$cat = urldecode($cat);
			$result = $this->MProduct->getProductsByCategory($cat);
			$data['prod_cat']  = $cat;
			
            $array = array();
			if($result){
				foreach ($result as $value) {
						$arrObj = new stdClass;
						$arrObj->product_id = $value->product_id;
						$arrObj->product_image = $value->product_image;
						$arrObj->product_name = $value->product_name;
						$arrObj->product_availability = $value->product_availability;
						$array[] = $arrObj;
				}
			$data['products']  = $array;
			}

			$this->load->view('imports/vAdminHeader'); 
			$this->load->view('admin/vProductsInCategory',$data);
			$this->load->view('imports/vAdminFooter');
		}

		function addNewProduct()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vAddProduct');
			$this->load->view('imports/vAdminFooter');
		}

		function viewProductInfo($id)
		{
			$data['product'] = null;
			$result = $this->MProduct->getProductDetailsById($id);
			if($result){
				$data['product'] = $result;
			}
			
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vProductInfo',$data);
			$this->load->view('imports/vAdminFooter');
		}

		function editProductInfo($id)
		{
			$data['product'] = null;
			$result = $this->MProduct->getProductDetailsById($id);
			if($result){
				$data['product'] = $result;
			} 

			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vEditProductInfo',$data);
			$this->load->view('imports/vAdminFooter');
		}
	}

?>