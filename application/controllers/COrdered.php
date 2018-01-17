<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrdered extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrdered');
	       $this->load->model('MReceipt');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}
 		function viewOrderList()
 		{
 			$this->load->view('imports/vAdminHeader');
			$this->load->view('admin/vOrderList');
			$this->load->view('imports/vAdminFooter');
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
		

 		
		public function viewQDashboard(){
			
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vQDashboard');
		}

		public function displayOrderFromQR()
		{
			$qr = $this->input->post('qr');

			$result = $this->MOrdered->getOrderByQR($qr);
			if($result){
				foreach ($result as $q) {}
				$id = $q->ordered_id;
				$total = $q->ordered_total;
				$result1 = $this->MOrdered->displayOrderItemsByOrder($id);
			   
			    $qty = 0;
			
				$data['order_info'] = null;
				$array = array();
				if($result1){
					foreach ($result1 as $value) {
						$arr= new stdClass;
						$qty += $value->order_item_qty;
						$arr->product_id = $value->product_id;
						$arr->product_name = $value->product_name;
						$arr->product_price = $value->product_price;
						$arr->item_quantity = $value->order_item_qty;
						$arr->item_subtotal = $value->order_item_subtotal;
						$array[] = $arr;	
				    }  
				}
				$data['order_info'] = $array;
				$data['total'] = $total;
				$data['qty'] = $qty;
				$data['id'] = $id;
				$data['qr'] = $qr;
				$data['page'] = 'qr';
			}else{
				$data = null;
				
			}
			if($data != null){
				if(!$this->session->userdata('receiptSession')){
					$this->createReceiptSession();
				}
				$res = $this->load->view('pos/vOrder',$data,TRUE);
				echo $res;	
			}
			
		}

		public function displayOrderFromEditPage($qr)
		{
			$result = $this->MOrdered->getOrderByQR($qr);
			if($result){
				foreach ($result as $q) {}
				$id = $q->ordered_id;
				$total = $q->ordered_total;
				$result1 = $this->MOrdered->displayOrderItemsByOrder($id);
			   
			    $qty = 0;
			
				$data['order_info'] = null;
				$array = array();
				if($result1){
					foreach ($result1 as $value) {
						$arr= new stdClass;
						$qty += $value->order_item_qty;
						$arr->product_id = $value->product_id;
						$arr->product_name = $value->product_name;
						$arr->product_price = $value->product_price;
						$arr->item_quantity = $value->order_item_qty;
						$arr->item_subtotal = $value->order_item_subtotal;
						$array[] = $arr;	
				    }  
				}
				$data['order_info'] = $array;
				$data['total'] = $total;
				$data['qty'] = $qty;
				$data['id'] = $id;
				$data['qr'] = $qr;
				$data['page'] = 'qr';
			}else{
				$data = null;
				
			}
			if($data != null){
				$res = $this->load->view('pos/vOrder',$data,TRUE);
				echo $res;	
			}
			
			
		}
    }
?>