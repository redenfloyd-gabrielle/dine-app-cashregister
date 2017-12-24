<?php
	class MOrderItem extends MY_Model{
		private $order_item_id;
		private $order_item_qty;
		private $order_item_subtotal;
		private $order_item_product_id;
		

    	const DB_TABLE = "order_item";
    	const DB_TABLE_PK = "order_item_id";

		public function __construct(){

		}

		public function getOrder_item_id(){
			return $this->order_item_id;
		}

		public function setOrder_item_id($order_item_id){
			$this->order_item_id = $order_item_id;
		}

		public function getOrder_item_qty(){
			return $this->order_item_qty;
		}

		public function setOrder_item_qty($order_item_qty){
			$this->order_item_qty = $order_item_qty;
		}

		public function getOrder_item_subtotal(){
			return $this->order_item_subtotal;
		}

		public function setOrder_item_subtotal($order_item_subtotal){
			$this->order_item_subtotal = $order_item_subtotal;
		}

		public function getOrder_item_product_id(){
			return $this->order_item_product_id;
		}

		public function setOrder_item_product_id($order_item_product_id){
			$this->order_item_product_id = $order_item_product_id;
		}
	}
?>
