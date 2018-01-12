<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CReceiptItem extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MReceiptItem');
	      $this->load->model('MOrderItem');
	      $this->load->model('MProduct');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}


		public function addReceiptItem($product_id,$receipt_id)
		{
			$qty = 1;

			$checker = $this->MReceiptItem->getReceiptItemDetailsByProduct($product_id,$receipt_id);
			
			$product = $this->MProduct->getProductDetailsById($product_id);
			
			foreach ($product as $p) {}

			if(empty($checker)){
				 $insertData = array('receipt_item_id' => null,
	   				       'receipt_item_subtotal' => $p->product_price,
	   				       'receipt_item_quantity' => 1,
	   				       'receipt_item_product_id' => $product_id,
	   				       'receipt_item_receipt_id' => $receipt_id
					);
				  $r = $this->MReceiptItem->insert($insertData);
			 }else{
				
				foreach ($checker as $check) {}
					$qty += $check->receipt_item_quantity;
				    $id = $check->receipt_item_id;
					$subtotal = $qty * $p->product_price;
				    
					$updateField = array('receipt_item_quantity'=> $qty,
									'receipt_item_subtotal' => $subtotal);
					$r = $this->MReceiptItem->update($id,$updateField);  
			}	
			$cat = $p->product_category;
			 if ($r) {
				redirect('CProduct/viewProduct/'.$cat);
			} else {
				print_r('SOMETHING WENT WRONG;');
			}

		}

		public function editItems($page,$product_id,$eid,$qr)
		{
			$qty = 1;
			$product = $this->MProduct->getProductDetailsById($product_id);
			
			foreach ($product as $p) {}

			if($page == 'qr') {

				$checker = $this->MOrderItem->getOrderItemDetailsByProduct($product_id,$eid);
				
				if(empty($checker)){
					 $insertData = array('order_item_id' => null,
		   				       'order_item_subtotal' => $p->product_price,
		   				       'order_item_qty' => 1,
		   				       'order_item_product_id' => $product_id,
		   				       'order_item_ordered_id' => $eid,
		   				       'order_item_status' => 'pending'
						);
					  $o = $this->MOrderItem->insert($insertData);
				 }else{
					foreach ($checker as $check) {}
						$qty += $check->order_item_qty;
					    $id = $check->order_item_id;
						$subtotal = $qty * $p->product_price;
					    
						$updateField = array('order_item_qty'=> $qty,
										'order_item_subtotal' => $subtotal);
						$o = $this->MOrderItem->update($id,$updateField);
				} 
			}else{
			       
				$checker = $this->MReceiptItem->getReceiptItemDetailsByProduct($product_id,$eid);
		
				if(empty($checker)){
					 $insertData = array('receipt_item_id' => null,
		   				       'receipt_item_subtotal' => $p->product_price,
		   				       'receipt_item_quantity' => 1,
		   				       'receipt_item_product_id' => $product_id,
		   				       'receipt_item_receipt_id' => $eid
						);
					  $o = $this->MReceiptItem->insert($insertData);
				 }else{
					
					foreach ($checker as $check) {}
						$qty += $check->receipt_item_quantity;
					    $id = $check->receipt_item_id;
						$subtotal = $qty * $p->product_price;
					    
						$updateField = array('receipt_item_quantity'=> $qty,
										'receipt_item_subtotal' => $subtotal);
						$o = $this->MReceiptItem->update($id,$updateField);  
				}	
		    }
			$cat = $p->product_category;
			 if ($o){
				redirect('CProduct/viewProductEdit/'.$page.'/'.$cat.'/'.$eid.'/'.$qr);
			} else {
				print_r('SOMETHING WENT WRONG;');
			}

		}
		public function displayOrderListManual()
		{
			$receipt_id = $_POST['receipt_id'];
			$result = $this->MReceiptItem->getReceiptItemDetailsByReceipt($receipt_id);
 
			if(isset($result)){
				$qty = 0;
				$array = array();
				foreach ($result as $value) {
					$arr= new stdClass;
					$arr->product_id = $value->product_id;
					$arr->product_name = $value->product_name;
					$arr->product_price = $value->product_price;
					$arr->receipt_item_quantity = $value->receipt_item_quantity;
					$arr->receipt_item_subtotal = $value->receipt_item_subtotal;
					$array[] = $arr;
					$qty += $value->receipt_item_quantity;
			    }

			    $data['receipt_item'] = $array;
			    $data['total'] = 0;
				$data['qty'] = $qty;
				$data['id'] = $receipt_id;
			}else{
				$data = null;
			}
			
		    $res = $this->load->view('pos/vOrder',$data,TRUE);

		    echo $res;
		    
		}

		// public function displayOrderListManual()
		// {
		// 	$tableData = stripcslashes($_POST['pTableData']);
		// 	$tableData = json_decode($tableData,TRUE);
		// 	$array = array();

		// 	foreach ($tableData as $value) {
		// 		if($tableData){
		// 		$arr= new stdClass;
		// 		$arr->product_id = $table['prod_id'];
		// 		$arr->product_name = $table['name'];
		// 		$arr->product_price = $table['price'];
		// 		$arr->receipt_item_quantity = $table['qty'];
		// 		$arr->receipt_item_subtotal =  $table['subtotal'];
		// 		$array[] = $arr;
		// 		}else{
		// 			$array[] = null;
		// 		}
		//     }
		// 	$data['receipt_item'] = $array;
			
		//     $res = $this->load->view('pos/vOrder',$data,TRUE);

		//     echo $res;
		    
		// }
	
	}

?>