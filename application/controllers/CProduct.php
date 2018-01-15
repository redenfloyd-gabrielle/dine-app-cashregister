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
	      $this->load->model('MReceipt');
	      $this->load->helper('url');
	      $this->load->library('session');
	      $url = $this->config->site_url();
	      $burl = $this->config->base_url();
	      $this->link = $burl;
     	  $this->urlSite = $url.'/CProduct/viewProductInfo/';
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

		public function getRiceMeals()
		{
			// Datatables Variables
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));


	        $cat = 'RICE MEAL';
			$products = $this->MProduct->getItemsByCategory($cat);
         	$data = array();

			foreach($products->result() as $prod) {
				if ($prod->product_availability == 'AVAILABLE') {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				} else {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
                               	<a id="" class="ui inverted orange icon button" data-id="'.$prod->product_id.'">
                               		<i class="add icon"></i>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				}
			   	$data[] = array(
			        '<img src="'.$this->link.''.$prod->product_image.'" class="ui small image">',
			        $prod->product_name,
			        $prod->product_price,
			        $prod->product_availability,
			        $actions,
			        
			   	);
			}

			$output = array(
			  	"draw" => $draw,
			    "recordsTotal" => $products->num_rows(),
			    "recordsFiltered" => $products->num_rows(),
			    "data" => $data
			);
			echo json_encode($output);
			exit();

		}


		public function getMainCourse()
		{
			// Datatables Variables
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));


	        $cat = 'MAIN COURSE';
			$products = $this->MProduct->getItemsByCategory($cat);
         	$data = array();

			foreach($products->result() as $prod) {
				if ($prod->product_availability == 'AVAILABLE') {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				} else {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
                               	<a id="" class="ui inverted orange icon button" data-id="'.$prod->product_id.'">
                               		<i class="add icon"></i>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				}
			   	$data[] = array(
			        '<img src="'.$this->link.''.$prod->product_image.'" class="ui small image">',
			        $prod->product_name,
			        $prod->product_price,
			        $prod->product_availability,
			        $actions,
			        
			   	);
			}

			$output = array(
			  	"draw" => $draw,
			    "recordsTotal" => $products->num_rows(),
			    "recordsFiltered" => $products->num_rows(),
			    "data" => $data
			);
			echo json_encode($output);
			exit();

		}

		public function getDrinks()
		{
			// Datatables Variables
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));


	        $cat = 'DRINKS';
			$products = $this->MProduct->getItemsByCategory($cat);
         	$data = array();

			foreach($products->result() as $prod) {
				if ($prod->product_availability == 'AVAILABLE') {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				} else {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
                               	<a id="" class="ui inverted orange icon button" data-id="'.$prod->product_id.'">
                               		<i class="add icon"></i>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				}
			   	$data[] = array(
			        '<img src="'.$this->link.''.$prod->product_image.'" class="ui small image">',
			        $prod->product_name,
			        $prod->product_price,
			        $prod->product_availability,
			        $actions,
			        
			   	);
			}

			$output = array(
			  	"draw" => $draw,
			    "recordsTotal" => $products->num_rows(),
			    "recordsFiltered" => $products->num_rows(),
			    "data" => $data
			);
			echo json_encode($output);
			exit();

		}

		public function getExtras()
		{
			// Datatables Variables
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));


	        $cat = 'EXTRAS';
			$products = $this->MProduct->getItemsByCategory($cat);
         	$data = array();

			foreach($products->result() as $prod) {
				if ($prod->product_availability == 'AVAILABLE') {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				} else {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
                               	<a id="" class="ui inverted orange icon button" data-id="'.$prod->product_id.'">
                               		<i class="add icon"></i>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				}
			   	$data[] = array(
			        '<img src="'.$this->link.''.$prod->product_image.'" class="ui small image">',
			        $prod->product_name,
			        $prod->product_price,
			        $prod->product_availability,
			        $actions,
			        
			   	);
			}

			$output = array(
			  	"draw" => $draw,
			    "recordsTotal" => $products->num_rows(),
			    "recordsFiltered" => $products->num_rows(),
			    "data" => $data
			);
			echo json_encode($output);
			exit();

		}

		public function getSoup()
		{
			// Datatables Variables
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));


	        $cat = 'SOUP';
			$products = $this->MProduct->getItemsByCategory($cat);
         	$data = array();

			foreach($products->result() as $prod) {
				if ($prod->product_availability == 'AVAILABLE') {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				} else {
					$actions = 	'<a href="'.$this->urlSite.''.$prod->product_id.'">
									<button class="ui inverted blue icon button">
                                		<i class="unhide icon"></i>
                                	</button>
                               	</a>
                               	<a id="" class="ui inverted orange icon button" data-id="'.$prod->product_id.'">
                               		<i class="add icon"></i>
                               	</a>
	                           	<a id="deleteItem" class="ui inverted red icon button deleteItem" data-id="'.$prod->product_id.'">
	                           		<i class="trash icon"></i>
	                           	</a>';
				}
			   	$data[] = array(
			        '<img src="'.$this->link.''.$prod->product_image.'" class="ui small image">',
			        $prod->product_name,
			        $prod->product_price,
			        $prod->product_availability,
			        $actions,
			        
			   	);
			}

			$output = array(
			  	"draw" => $draw,
			    "recordsTotal" => $products->num_rows(),
			    "recordsFiltered" => $products->num_rows(),
			    "data" => $data
			);
			echo json_encode($output);
			exit();

		}

		public function createReceiptSession()
		{
			$data = array('receipt_id'=>null,
					"receipt_cashier" => $this->session->userdata['userSession']['user_id']);
			$this->MReceipt->insert($data);
			$id = $this->db->insert_id();
			$this->MReceipt->setReceipt_id($id);
			$sessionReceipt = array("receipt_id" =>$id);
			$this->session->set_userdata('receiptSession',$sessionReceipt);
		}
		


        public function viewMDashboard(){
        	if(!$this->session->userdata('receiptSession')){
				$this->createReceiptSession();
			}
        	$data['page'] = 'manual';
        	$data['id'] = $this->session->userdata['receiptSession']['receipt_id'];
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vMDashboard',$data);
		}

		public function backToMDashboard($receipt_id){
        	
			$result = $this->MReceiptItem->getReceiptItemDetailsByReceipt($receipt_id);
 
			if(isset($result)){
				$qty = 0;
				$array = array();
				foreach ($result as $value) {
					$arr= new stdClass;
					$arr->product_id = $value->product_id;
					$arr->product_name = $value->product_name;
					$arr->product_price = $value->product_price;
					$arr->item_quantity = $value->receipt_item_quantity;
					$arr->item_subtotal = $value->receipt_item_subtotal;
					$array[] = $arr;
					$qty += $value->receipt_item_quantity;
			    }

			    $data['order_info'] = $array;
			    $data['total'] = 0;
				$data['qty'] = $qty;
				$data['id'] = $receipt_id;
				$data['page'] = 'manual';
			}else{
				$data = null;
			}
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vMDashboard',$data);
		}

		public function viewProduct($cat)
		{
			$cat = urldecode($cat);
			$cat = str_replace(' ', '', $cat);
			if($cat == 'MAINCOURSE'){
				$cat = 'MAIN COURSE';
			}else if($cat == 'RICEMEAL'){
				$cat = 'RICE MEAL';
			}
			//print_r($cat);
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
			$data['page'] = 'manual';
			$data['id'] = $this->session->userdata['receiptSession']['receipt_id'];
			//$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vProducts',$data);
		
		}
		public function viewProductEdit($page,$cat,$id,$qr)
		{
			$cat = urldecode($cat);
			$cat = str_replace(' ', '', $cat);
			if($cat == 'MAINCOURSE'){
				$cat = 'MAIN COURSE';
			}else if($cat == 'RICEMEAL'){
				$cat = 'RICE MEAL';
			}
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
						$arr->product_id = $value->product_id;
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
						$arr->product_id = $value->product_id;
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
			$data['qr'] = $qr;
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
				$data['products']  = '1';
			} else {
				$data['products'] = null;
			}

			if ($cat == 'RICE MEAL') {
				$this->load->view('imports/vAdminHeader'); 
				$this->load->view('admin/category/vRiceMeals',$data);
				$this->load->view('imports/vAdminFooter');
			} else if ($cat == 'SOUP'){
				$this->load->view('imports/vAdminHeader'); 
				$this->load->view('admin/category/vSoup',$data);
				$this->load->view('imports/vAdminFooter');
			} else if ($cat == 'MAIN COURSE'){
				$this->load->view('imports/vAdminHeader'); 
				$this->load->view('admin/category/vMainCourse',$data);
				$this->load->view('imports/vAdminFooter');
			} else if ($cat == 'DRINKS'){
				$this->load->view('imports/vAdminHeader'); 
				$this->load->view('admin/category/vDrinks',$data);
				$this->load->view('imports/vAdminFooter');
			} else {
				$this->load->view('imports/vAdminHeader'); 
				$this->load->view('admin/category/vExtras',$data);
				$this->load->view('imports/vAdminFooter');
			}
			

			
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