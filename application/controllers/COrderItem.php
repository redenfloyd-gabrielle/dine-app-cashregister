<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrderItem extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrderItem');
	      $this->load->model('MReceiptItem');
	      $this->load->model('MOrdered');
	      $this->load->model('MProduct');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}

		public function viewEdit($page,$id,$qr)
		{
			$order_item = new MOrderItem();
			$receipt_item = new MReceiptItem();

			
			$array = array();
			
			if($page=='qr'){
				$result = $this->MOrderItem->getOrderItemDetailsByOrder($id);
				if($result){
					$array = array();
					foreach ($result as $value) {
						$arr= new stdClass;
						$arr->product_id = $value->product_id;
						$arr->product_name = $value->product_name;
						$arr->item_id = $value->order_item_id;
						$arr->product_price = $value->product_price;
						$arr->order_item_qty = $value->order_item_qty;
						$arr->order_item_subtotal = $value->order_item_subtotal;
						$array[] = $arr;
						
					}
					$data['order_info'] = $array;
				}else{
					$data = null;
				}
			}else{
				$result = $this->MReceiptItem->getReceiptItemDetailsByReceipt($id);

				if($result){
					foreach ($result as $value) {
						$arr= new stdClass;
						$arr->product_id = $value->product_id;
						$arr->item_id = $value->receipt_item_id;
						$arr->product_name = $value->product_name;
						$arr->product_price = $value->product_price;
						$arr->order_item_qty = $value->receipt_item_quantity;
						$arr->order_item_subtotal = $value->receipt_item_subtotal;
						$array[] = $arr;
						
					}
					$data['order_info'] = $array;

			    }else{
			    	$data = null;
			    }
			}
			$data['page'] = $page;
			$data['eid'] = $id;
			$data['qr'] = $qr;
			if($data != null){
				$this->load->view('pos/vEditOrder',$data);
			}else{
				$res = $this->load->view('vError');
				echo $res;
			}
		}

	
		function viewOrderInfo($id)
		{	
			
	 			
			$data['orders'] = $this->MOrdered->getOrderById($id);
			$data['items'] = $this->MOrdered->getOrderItemsByOrder($id);
			
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vOrderInfo',$data);
			$this->load->view('imports/vAdminFooter');
			
			
		}

		public function removeToList($page,$eid,$qr,$cat)
		{
			
			$id = $this->input->post('order_item_id');
			
			if($page == 'qr'){
				$result = $this->MOrderItem->delete($id);
			}else{
				$result = $this->MReceiptItem->delete($id);
			}
			
			if($cat != 'NONE'){
				redirect('CProduct/viewProductEdit/'.$page.'/'.$cat.'/'.$eid.'/'.$qr);
			}else{
				redirect('COrderItem/viewEdit/'.$page.'/'.$eid.'/'.$qr);
			}
		}

		public function updateList($item_id,$page,$eid,$qr)
		{
			$qty = $this->input->post('qty'."$item_id"); 
			$price = $this->input->post('prod_price');
			$subtotal = $price * $qty;
			if($page == "manual"){
				if($qty > 0){
					$data = array('receipt_item_quantity' => $qty,
							  'receipt_item_subtotal' => $subtotal
							  );
					$result = $this->MReceiptItem->update($item_id,$data);
					if($result){
						 redirect('COrderItem/viewEdit/'.$page.'/'.$eid.'/'.$qr);
					}
				} else {
					$result = $this->MReceiptItem->delete($item_id);
					if($result){
						 redirect('COrderItem/viewEdit/'.$page.'/'.$eid.'/'.$qr);
					}
				}
			}else{
				if($qty > 0){
					$data = array('order_item_qty' => $qty,
							  'order_item_subtotal' => $subtotal
							  );
					$result = $this->MOrderItem->update($item_id,$data);
					if($result){
						 redirect('COrderItem/viewEdit/'.$page.'/'.$eid.'/'.$qr);
					}
				} else {
					$result = $this->MOrderItem->delete($item_id);
					if($result){
						 redirect('COrderItem/viewEdit/'.$page.'/'.$eid.'/'.$qr);
					}
				}
			}
		
		}
 	}
?>