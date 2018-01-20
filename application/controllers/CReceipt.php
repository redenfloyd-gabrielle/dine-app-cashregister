<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CReceipt extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MReceipt');
	      $this->load->model('MOrdered');
	      $this->load->model('MReceiptItem');
	      $this->load->model('MReceipt');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}
		public function printReceipt2($id, $page)
		{
			

			
			 if($page == 'qr'){
			 	$result = $this->MOrderItem->getOrderItemDetailsByOrder($id);
			 	if ($result) {
			 	foreach ($result as $value) {
			 		$arrObj = new stdClass;
					$arrObj->name = $value->product_name;
					$arrObj->qty= $value->order_item_qty;
					$array[] = $arrObj;	
			 	}
			 	
			 }
				
			 }else{
				$result = $this->MReceiptItem->getReceiptItemDetailsByReceipt($id);
				if ($result) {
				 	foreach ($result as $value) {
				 		$arrObj = new stdClass;
						$arrObj->name = $value->product_name;
						$arrObj->qty= $value->receipt_item_quantity;
						$array[] = $arrObj;	
				 	}
			 	}
			 }

			 
			 $data['receipt_item'] = $array;
				
			if($result){
				
				$res = $this->load->view('pos/vChef',$data,TRUE);	
			}else{
				print_r("SOMETHING WENT WRONG.");
			}

			
			
		}
   

		public function printReceipt()
		{
			$page =  $_POST['page'];
			$tableData = stripcslashes($_POST['pTableData']);
			$tableData = json_decode($tableData,TRUE);
			$receipt_total = $_POST['total'];
			$receipt_cash = $_POST['cash'];
			$receipt_change = $_POST['change'];
			$receipt_id = $this->session->userdata['receiptSession']['receipt_id'];
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$receipt_date = $now->format('Y-m-d H:i:s');
			$array = array();
			$fname = $this->session->userdata['userSession']['user_first_name'];
			$name = $fname[0].'. '.$this->session->userdata['userSession']['user_last_name'];
			
			$date = $now->format('Y-m-d');
			$time = $now->format('h:i A');

			$item = array('receipt_date' => $receipt_date,
						  'receipt_total' => $receipt_total,
						  'receipt_cash' => $receipt_cash,
						  'receipt_change' => $receipt_change
			);
			$result = $this->MReceipt->update($receipt_id,$item);

			 if($tableData){

				if($page == 'qr'){
					$eid = $_POST['eid'];
					foreach ($tableData as $table) {
						$data1 = array('receipt_item_id' => null,
								  'receipt_item_subtotal' => $table['subtotal'],
								  'receipt_item_quantity' => $table['qty'],
								  'receipt_item_product_id' =>$table['prod_id'],
								  'receipt_item_receipt_id' => $receipt_id
						);
						$result1 = $this->MReceiptItem->insert($data1);
					}
					$data = array('receipt_date' => $receipt_date,
							  'receipt_total' => $receipt_total,
							  'receipt_cash' => $receipt_cash,
							  'receipt_change' => $receipt_change,
							  'receipt_ordered_id' => $eid
					);
				}else{
					$data = array('receipt_date' => $receipt_date,
							  'receipt_total' => $receipt_total,
							  'receipt_cash' => $receipt_cash,
							  'receipt_change' => $receipt_change
					);
				}

				$result = $this->MReceipt->update($receipt_id,$data);


	 			foreach ($tableData as $key => $datas) {
	 				$arrObj = new stdClass;
					$arrObj->name = $datas['name'];
					$arrObj->qty= $datas['qty'];
					$arrObj->subtotal = $datas['subtotal'];
					$array[] = $arrObj;		
	 			}
				
				$data['receipt_item'] = $array;
				$data['cashier'] = $name;
				$data['date'] = $date;
				$data['time'] = $time;
				$data['order_id'] = $receipt_id;
				$data['due'] = $receipt_total;
				$data['cash'] = $receipt_cash;
				$data['change'] = $receipt_change;
			 }else{
				$data = null;
			 }
			if($result){
				if($page == 'qr'){
					$status = array('ordered_status' => 'scanned');
					$query = $this->MOrdered->update($eid, $status);
				}
				$this->session->unset_userdata('receiptSession');
				$res = $this->load->view('pos/vReceipt',$data,TRUE);
		  	    echo $res;	
			}else{
				print_r("SOMETHING WENT WRONG.");
			}

			
			
		}

		public function addOrderToReceipt()
		{

			$page =  $_POST['page'];
			$tableData = stripcslashes($_POST['pTableData']);
			$tableData = json_decode($tableData,TRUE);
			$receipt_total = $_POST['total'];
			$receipt_cash = $_POST['cash'];
			$receipt_change = $_POST['change'];
			$receipt_id = $this->session->userdata['receiptSession']['receipt_id'];
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$receipt_date = $now->format('Y-m-d H:i:s');

			if($page == 'qr'){
				$eid = $_POST['eid'];
				foreach ($tableData as $table) {
					$data1 = array('receipt_item_id' => null,
							  'receipt_item_subtotal' => $table['subtotal'],
							  'receipt_item_quantity' => $table['qty'],
							  'receipt_item_product_id' =>$table['prod_id'],
							  'receipt_item_receipt_id' => $receipt_id
					);
					$result1 = $this->MReceiptItem->insert($data1);
				}
			}

			$data = array('receipt_date' => $receipt_date,
						  'receipt_total' => $receipt_total,
						  'receipt_cash' => $receipt_cash,
						  'receipt_change' => $receipt_change
			);
			$result = $this->MReceipt->update($receipt_id,$data);

			foreach ($tableData as $key => $datas) {
	 				$arrObj = new stdClass;
					$arrObj->name = $datas['name'];
					$arrObj->qty= $datas['qty'];
					$array[] = $arrObj;		
	 			}
				
				$data1['receipt_item'] = $array;

			if($result){
				if($page == 'qr'){
					$status = array('ordered_status' => 'scanned');
					$query = $this->MOrdered->update($eid, $status);
				}
				$this->session->unset_userdata('receiptSession');
				$res = $this->load->view('pos/vChef',$data1,TRUE);
				echo $res;
				
			}else{
				print_r("SOMETHING WENT WRONG.");
			}

			
		}

         

           
			

			










			
	}

?>