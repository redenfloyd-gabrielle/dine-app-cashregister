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

		// public function viewEditOrder(){
			
  //          $order = new MOrdered();

		// 	$page = $_POST['page'];
		// 	$id = $_POST['eid'];

		// 	$result = $order->displayOrderItemsByOrder($id);
		// 	if($result){
		// 		foreach ($result as $q) {}
		// 		$id = $q->ordered_id;
		// 		$total = $q->ordered_total;
		// 		$qr = $q->ordered_qr_code;
		// 		$result1 = $order->displayOrderItemsByOrder($id);
			   
		// 	    $qty = 0;
			
		// 		$data['order_info'] = null;
		// 		if($result1){
		// 			foreach ($result1 as $r) {
		// 			$qty += $r->order_item_qty;
		// 		    }
		// 			$data['order_info'] = $result1;
		// 		}
		// 		$data['total'] = $total;
		// 	}else{
		// 		$data = null;
		// 	}
		// 	$data['eid'] = $id;
		// 	$data['page'] = $page;

		// 	$res = $this->load->view('pos/vEditOrder',$data,TRUE);
		// 	echo $res;
		// }

		public function viewEdit($page,$id)
		{
			$order_item = new MOrderItem();
			$receipt_item = new MReceiptItem();

			
			$array = array();
			
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
						$array[] = $arr;
						$data['order_info'] = $array;
					}
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
						$data['order_info'] = $array;
					}

			    }else{
			    	$data = null;
			    }
			}
			$data['page'] = $page;
			$data['eid'] = $id;
			
			$this->load->view('pos/vEditOrder',$data);
			
		}

		// public function displayOrderListFromQR()
		// {
		// 	$ordered_item = new MOrderItem();
		// 	$order = new MOrdered();
		// 	$ordered_id = $_POST['ordered_id'];
		// 	$result = $ordered_item->getOrderItemDetailsByOrder($ordered_id);
 
		// 	if(isset($result)){
		// 		$qty = 0;
		// 		$array = array();
		// 		foreach ($result as $value) {
		// 			$arr= new stdClass;
		// 			$arr->product_name = $value->product_name;
		// 			$arr->product_price = $value->product_price;
		// 			$arr->order_item_qty = $value->order_item_qty;
		// 			$arr->order_item_subtotal = $value->order_item_subtotal;
		// 			$arr->order_item_id = $value->order_item_id;
		// 			$array[] = $arr;
		// 			$qty += $value->order_item_qty;
		// 	    }

		// 	    $data['order_info'] = $array;
		// 		$data['qty'] = $qty;
		// 		$data['eid'] = $ordered_id;

		// 	}else{
		// 		$data = null;
		// 	}
			
		// 	$get_qr = $order->getOrderById($ordered_id);
		//     if($get_qr){
		//     	foreach ($get_qr as $key) {}
		// 	$data['qr'] = $key->ordered_qr_code;
		//     }
			
		//     $res = $this->load->view('pos/vEditComponent',$data,TRUE);


		//     echo $res;
		// 	// print_r($result);
		// }

// 		public function addRowItem()
// 		{

// 			$tableData = stripcslashes($_POST['pTableData']);
// 			$tableData = json_decode($tableData,TRUE);
// 			$product_id = $_POST['pid'];

// 			$result = $this->MProduct->getProductDetailsById($product_id);
// 			foreach ($result as $q){}


// 			if($tableData){
// 				foreach ($tableData as $key => $table) {
// 					 if($table['prod_id'] != $product_id){
// 				 	$arr = array('name' => $q->product_name,
// 				 				'price' =>$q->product_price,
// 				 				'qty' =>1,
// 				 				'subtotal' =>$q->product_price,
// 				 				'prod_id' =>$q->product_id
// 				 			);
// //$tableData = $arr;
// 				 	// $dataTable = json_encode($tableData);
// 				 	// $dataTable = json_decode($dataTable, TRUE);
// 				 	array_push($tableData, $arr);

// 				 }else{
// 					$tableData['qty'] = $tableData['qty'] + 1;
// 					$tableData['subtotal'] = $tableData['qty'] * $p->product_price;
// 					// $dataTable =json_encode($tableData);
// 					// $dataTable = json_decode($dataTable, TRUE);
// 				 }
// 				}
// 			}else{
// 				$arr = array('name' => $q->product_name,
// 			 				'price' =>$q->product_price,
// 			 				'qty' =>1,
// 			 				'subtotal' =>$q->product_price,
// 			 				'prod_id' =>$q->product_id
// 			 			);
// 			 	array_push($tableData, $arr);
// 				// $dataTable = json_encode($tableData);
// 				// $dataTable = json_decode($dataTable, TRUE);
// 			}


// 			$array = array();
//  			// $dataTable = json_encode($tableData);
//  			// $dataTable = json_decode($dataTable, TRUE);

// 		 if($tableData){
//  		//	$datas = $tableData;
//  			foreach ($tableData as $key => $datas) {
//  				$arrObj = new stdClass;
// 					$arrObj->name = $datas['name'];
// 					$arrObj->price= $datas['price'];
// 					$arrObj->qty= $datas['qty'];
// 					$arrObj->subtotal = $datas['subtotal'];
// 					$arrObj->prod_id= $datas['prod_id'];
// 					$array[] = $arrObj;
					
					
//  			}
				
// 				$data['receipt_item'] = $array;
// 		}else{
// 			$data['receipt_item'] = null;
// 		}
		
// 		   $this->load->view('pos/vOrder',$data);

 
// 		  // print_r($data);
		  
		   
// 		}

		public function addRowItem()
		{

			$product_id = $_POST['pid'];
			$tableData = array();
			$result = $this->MProduct->getProductDetailsById($product_id);
			foreach ($result as $q){}
			$qty =1;

			echo $q->product_name."|".$q->product_price."|".$qty."|".$q->product_price; 

		}
		public function addOrderItem($page,$product_id,$eid)
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
				redirect('CProduct/viewProductEdit/'.$page.'/'.$cat.'/'.$eid);
			} else {
				print_r('SOMETHING WENT WRONG;');
			}

		}
		function viewOrderInfo()
		{
			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vOrderInfo');
			$this->load->view('imports/vAdminFooter');
		}

		public function removeToList($id,$page,$eid)
		{
			// print_r('deleting..');
			// $order_item_id = $this->input->post('order_item');
			// print_r($order_item_id);
			if($page == 'qr'){
				$result = $this->MOrderItem->delete($id);
			}else{
				$result = $this->MReceiptItem->delete($id);
			}
			
			if($result){
				 redirect('COrderItem/viewEdit/'.$page.'/'.$eid);
			}
		}

		public function updateList($order_item_id,$page,$eid)
		{
			if($this->input->post('qty'."$order_item_id") > 0){
			
				$data = array('receipt_item_quantity' => $this->input->post('qty'."$order_item_id"),
						  'receipt_item_subtotal' => $this->input->post('prod_total')
						  );
				$result = $this->MReceiptItem->update($order_item_id,$data);
				if($result){
					 redirect('COrderItem/viewEdit/'.$page.'/'.$eid);
				}
			} else {
				$result = $this->MReceiptItem->delete($order_item_id);
				if($result){
					 redirect('COrderItem/viewEdit/'.$page.'/'.$eid);
				}
			}
		}
	}
?>