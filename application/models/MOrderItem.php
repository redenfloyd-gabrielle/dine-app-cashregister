<?php
	class MOrderItem extends MY_Model{
		private $order_item_id;
		private $order_item_qty;
		private $order_item_subtotal;
		private $order_item_product_id;
		private $order_item_ordered_id;
		private $order_item_status;
		

    	const DB_TABLE = "order_item";
    	const DB_TABLE_PK = "order_item_id";

		public function __construct(){

		}

		public function getOrderItemDetailsByOrder($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('product',$this::DB_TABLE.'.order_item_product_id= product_id' );
			$this->db->where(array($this::DB_TABLE.'_ordered_id' => $id,
		 						   $this::DB_TABLE.'_status !=' => 'INACTIVE'));
			$query = $this->db->get();
			return $query->result();
		}

		public function updateQty($id,$qty){
			$where = array($this::DB_TABLE_PK =>$id);
			$field = array($this::DB_TABLE.'_qty' => $qty);
			$query = $this->update1($where,$field);
			return $query;
		}


		public function getOrderItemDetailsByProduct($pid,$oid)
		{
			$where = array($this::DB_TABLE.'_product_id' =>$pid,
		                   $this::DB_TABLE.'_ordered_id'=> $oid);
			$query = $this->read_where($where);
			return $query;
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

		public function getOrder_item_ordered_id(){
			return $this->order_item_ordered_id;
		}

		public function setOrder_item_ordered_id($order_item_ordered_id){
			$this->order_item_ordered_id = $order_item_ordered_id;
		}

		public function getOrder_item_status(){
			return $this->order_item_status;
		}

		public function setOrder_item_status($order_item_status){
			$this->order_item_status = $order_item_status;
		}

	}
?>
