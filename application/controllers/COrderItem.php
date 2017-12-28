<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrderItem extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrderItem');
	      $this->load->model('MOrdered');
	      $this->load->model('MProduct');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}

		public function viewEditOrder(){
			
           $order = new MOrdered();

			$page = $_POST['page'];
			$id = $_POST['eid'];

			$result = $order->displayOrderItemsByOrder($id);
			if($result){
				foreach ($result as $q) {}
				$id = $q->ordered_id;
				$total = $q->ordered_total;
				$qr = $q->ordered_qr_code;
				$result1 = $order->displayOrderItemsByOrder($id);
			   
			    $qty = 0;
			
				$data['order_info'] = null;
				if($result1){
					foreach ($result1 as $r) {
					$qty += $r->order_item_qty;
				    }
					$data['order_info'] = $result1;
				}
				$data['total'] = $total;
			}else{
				$data = null;
			}
			$data['eid'] = $id;
			$data['page'] = $page;

			$res = $this->load->view('pos/vEditOrder',$data,TRUE);
			echo $res;
		}


		public function displayOrderListFromQR()
		{
			$ordered_item = new MOrderItem();
			$order = new MOrdered();
			$ordered_id = $_POST['ordered_id'];
			$result = $ordered_item->getOrderItemDetailsByOrder($ordered_id);
 
			if(isset($result)){
				$qty = 0;
				$array = array();
				foreach ($result as $value) {
					$arr= new stdClass;
					$arr->product_name = $value->product_name;
					$arr->product_price = $value->product_price;
					$arr->order_item_qty = $value->order_item_qty;
					$arr->order_item_subtotal = $value->order_item_subtotal;
					$arr->order_item_id = $value->order_item_id;
					$array[] = $arr;
					$qty += $value->order_item_qty;
			    }

			    $data['order_info'] = $array;
				$data['qty'] = $qty;
				$data['eid'] = $ordered_id;

			}else{
				$data = null;
			}
			
			$get_qr = $order->getOrderById($ordered_id);
		    if($get_qr){
		    	foreach ($get_qr as $key) {}
			$data['qr'] = $key->ordered_qr_code;
		    }
			
		    $res = $this->load->view('pos/vEditComponent',$data,TRUE);


		    echo $res;
			// print_r($result);
		}

		public function addOrderItem($product_id)
		{
			$order_item = new MOrderItem();
			$prod = new MProduct();
			
			$ordered_id = $this->input->post('ordered_id');
	       
			$qty = 1;

			$checker = $order_item->getOrderItemDetailsByProduct($product_id,$ordered_id);
			
			$product = $prod->getProductDetailsById($product_id);
			
			foreach ($product as $p) {}

			if(empty($checker)){
				 $insertData = array('order_item_id' => null,
	   				       'order_item_subtotal' => $p->product_price,
	   				       'order_item_qty' => 1,
	   				       'order_item_product_id' => $product_id,
	   				       'order_item_ordered_id' => $ordered_id
					);
				  $o = $order_item->insert($insertData);
			 }else{
				foreach ($checker as $check) {}
					$qty += $check->order_item_qty;
				    $id = $check->order_item_id;
					$subtotal = $qty * $p->product_price;
				    
					$updateField = array('order_item_qty'=> $qty,
									'order_item_subtotal' => $subtotal);
					$o = $order_item->update($id,$updateField);  
			}	
			$cat = $p->product_category;
			 if ($o){
				redirect('CProduct/viewProductQR/qr/'.$cat.'/'.$ordered_id);
			} else {
				print_r('SOMETHING WENT WRONG;');
			}
		}

		public function viewEditOrderFromProduct($id)
		{
			$data['page'] = "qr";
			$data['eid'] = $id;

			$this->load->view('pos/vEditOrder',$data);
		}


}



		function viewOrderInfo()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vOrderInfo');
			$this->load->view('imports/vAdminFooter');
		}
	}


?>