<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class COrdered extends CI_Controller {

		public function __Construct(){
	      parent::__Construct ();
	      $this->load->helper('url');
	      $this->load->database(); // load database
	      $this->load->model('MOrdered');
	      $this->load->helper('url');
	      $this->load->library('session');
	  	}

		public function index()
		{
			
		}
 
		
		public function viewQDashboard(){
			$this->load->view('imports/vPosHeader');
			$this->load->view('pos/vQDashboard');
		}

		public function displayOrderFromQR(){
			$order = new MOrdered();
			$qr = $_POST['qr'];

			$result = $order->getOrderByQR($qr);
			if($result){
				foreach ($result as $q) {}
				$id = $q->ordered_id;
				$total = $q->ordered_total;
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
				$data['qty'] = $qty;
				$data['id'] = $id;
			}else{
				$data = null;
			}
			
			 $this->load->view('pos/vQROrder',$data);	
			   // print_r($qr);	
		}


		public function displayQROrderFromEdit($id){
		// 	$order = new MOrdered();
		// 	$qr = $id;
			
		// 	$total = $q->ordered_total;
		// 	$result1 = $order->displayOrderItemsByOrder($id);
		   
		//     $qty = 0;
		
		// 	$data['order_info'] = null;
		// 	if($result1){
		// 		foreach ($result1 as $r) {
		// 		$qty += $r->order_item_qty;
		// 	    }
		// 		$data['order_info'] = $result1;
		// 	}
		// 	$data['total'] = $total;
		// 	$data['qty'] = $qty;
		// 	$data['id'] = $id;
		// }else{
		// 	$data = null;
		// 
		 $this->load->view('imports/vPosHeader');
		 $this->load->view('pos/index');	
		}	
}
?>