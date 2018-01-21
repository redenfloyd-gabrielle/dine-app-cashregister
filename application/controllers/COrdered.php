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
	      $url = $this->config->site_url();
     	  $this->urlSite = $url.'COrderItem/viewOrderInfo/';
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
			$this->load->helper('date');
			$qr = $this->input->post('qr');

			$result = $this->MOrdered->getOrderByQR($qr);

			if($result){
				foreach ($result as $q) {}
				$id = $q->ordered_id;
				$total = $q->ordered_total;
				$status = $q->ordered_status;
				$time = $q->ordered_time;
				$date_now =new DateTime(NULL, new DateTimeZone('Asia/Manila'));
				$dt = $date_now->format('Y-m-d H:i:s');
			    $date = date_create_from_format('Y-m-d H:i:s', $time);
				$datenow = date_create_from_format('Y-m-d H:i:s', $dt);
				
                $interval = date_diff($datenow,$date);
		        if($interval ->h >= 4){
		        	$status = array('ordered_status' => 'expired');
					$query = $this->MOrdered->update($id, $status);
		        }

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
				    $data['order_info'] = $array;
				}else{
					$data['order_info'] = null;
				}
				// if($status == "scanned"){
				// 	$data['error'] = "Please try again. Code has been scanned.";
				// }else if($status == "expired"){
				// 	$data['error'] = "Please try again. Code has expired.";
				// }else{
				// 	$data['error'] = "Please try again. Make sure you are scanning a valid code. ";
				// }
				
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


		public function getOrders()
		{
			// Datatables Variables
	        $draw = intval($this->input->get("draw"));
	        $start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));

			$orders = $this->MOrdered->getOrders();
         	$data = array();

			foreach($orders->result() as $o) {
				$actions = 	' <a href="'.$this->urlSite.''.$o->ordered_id.'"><button class="ui inverted blue icon button">
                                        <i class="unhide icon"></i>
                                    </button></a>';

                $date = date_create_from_format('Y-m-d H:i:s', $o->ordered_time); 

			   	$data[] = array(
			        $o->ordered_id,
			       	$date->format('F d, Y H:i a'),
			        $o->ordered_total,
			        $o->ordered_qr_code,
			        $actions,
			        
			   	);
			}

			$output = array(
			  	"draw" => $draw,
			    "recordsTotal" => $orders->num_rows(),
			    "recordsFiltered" => $orders->num_rows(),
			    "data" => $data
			);
			echo json_encode($output);
			exit();
		}
    }
?>