<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CReceipt extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MReceipt');
	      $this->load->model('MReceiptItem');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}
   
		public function viewReceipt(){
			$this->load->view('pos/vReceipt');
		}

		public function addQROrderToReceipt()
		{
			$tableData = stripcslashes($_POST['pTableData']);
			$tableData = json_decode($tableData,TRUE);
			$receipt_total = $_POST['total'];
			$receipt_cash = $_POST['cash'];
			$receipt_change = $_POST['change'];
			$receipt_id = $this->session->userdata['receiptSession']['receipt_id'];
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$receipt_date = $now->format('Y-m-d H:i:s');

			$data = array('receipt_date' => $receipt_date,
						  'receipt_total' => $receipt_total,
						  'receipt_cash' => $receipt_cash,
						  'receipt_change' => $receipt_change
			);
			$result = $this->MReceipt->update($receipt_id,$data);

			foreach ($tableData as $table) {
				$data1 = array('receipt_item_id' => null,
						  'receipt_item_subtotal' => $table['subtotal'],
						  'receipt_item_quantity' => $table['qty'],
						  'receipt_item_product_id' =>$table['prod_id'],
						  'receipt_item_receipt_id' => $receipt_id
				);
				$result1 = $this->MReceiptItem->insert($data1);
			}
			if($result1){
				$this->session->unset_userdata('receiptSession');
				redirect('CLogin/viewPos');
			}else{
				print_r("SOMETHING WENT WRONG.");
			}
			
		}

		public function addManualOrderToReceipt()
		{
			$receipt_total = $_POST['total'];
			$receipt_cash = $_POST['cash'];
			$receipt_change = $_POST['change'];
			$receipt_id = $this->session->userdata['receiptSession']['receipt_id'];
			$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
			$receipt_date = $now->format('Y-m-d H:i:s');

			$data = array('receipt_date' => $receipt_date,
						  'receipt_total' => $receipt_total,
						  'receipt_cash' => $receipt_cash,
						  'receipt_change' => $receipt_change
			);
			$result = $this->MReceipt->update($receipt_id,$data);

			if($result){
				$this->session->unset_userdata('receiptSession');
				redirect('CLogin/viewPos');
			}else{
				print_r("SOMETHING WENT WRONG.");
			}
			
		}
			
	}

?>