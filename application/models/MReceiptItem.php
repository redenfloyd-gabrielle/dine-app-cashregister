<?php
	class MReceiptItem extends MY_Model{
		private $receipt_item_id;
		private $receipt_item_subtotal;
		private $receipt_item_quantity;
		private $receipt_item_product_id;
		private $receipt_item_receipt_id;
		private $receipt_item_status;
		

    	const DB_TABLE = "receipt_item";
    	const DB_TABLE_PK = "receipt_item_id";

		public function __construct(){

		}

		public function getReceiptItemDetailsByProduct($pid,$rid)
		{
			$where = array($this::DB_TABLE.'_product_id' =>$pid,
		                   $this::DB_TABLE.'_receipt_id'=> $rid);
			$query = $this->read_where($where);
			return $query;
		}

		public function getReceiptItemDetailsByReceipt($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('product',$this::DB_TABLE.'.receipt_item_product_id= product_id' );
			$this->db->where(array($this::DB_TABLE.'_receipt_id' => $id,
								   $this::DB_TABLE.'_status !=' => 'INACTIVE'));
			$query = $this->db->get();
			return $query->result();
		}


		public function getReceipt_item_id(){
			return $this->receipt_item_id;
		}

		public function setReceipt_item_id($receipt_item_id){
			$this->receipt_id = $receipt_item_id;
		}

		public function getReceipt_item_subtotal(){
			return $this->receipt_item_subtotal;
		}

		public function setReceipt_item_subtotal($receipt_item_subtotal){
			$this->receipt_subtotal = $receipt_item_subtotal;
		}

		public function getReceipt_item_quantity(){
			return $this->receipt_item_quantity;
		}

		public function setReceipt_item_quantity($receipt_item_quantity){
			$this->receipt_quantity = $receipt_item_quantity;
		}

		public function getReceipt_item_product_id(){
			return $this->receipt_item_product_id;
		}

		public function setReceipt_item_product_id($receipt_item_product_id){
			$this->receipt_item_product_id = $receipt_item_product_id;
		}

		public function getReceipt_item_receipt_id(){
			return $this->receipt_item_receipt_id;
		}

		public function setReceipt_item_receipt_id($receipt_item_receipt_id){
			$this->receipt_item_receipt_id = $receipt_item_receipt_id;
		}

		public function getReceipt_item_status(){
			return $this->receipt_item_status;
		}

		public function setReceipt_item_status($receipt_item_status){
			$this->receipt_item_status = $receipt_item_status;
		}

	}
?>
