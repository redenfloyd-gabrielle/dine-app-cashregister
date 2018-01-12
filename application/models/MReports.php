<?php
	class MReports extends MY_Model{
		private $receipt_item_id;
		private $receipt_item_subtotal;
		private $receipt_item_quantity;
		private $receipt_item_product_id;
		private $receipt_item_receipt_id;
		private $receipt_item_status;
		

    	const DB_TABLE = "receipt_item";
    	const DB_TABLE_PK = "receipt_item_id";

    	public function get_data(){
    		$this->load->database();
    		$this->db->select('*, SUM(receipt_item_quantity) as quantity, SUM(receipt_item_subtotal) as subtotal');
    		$this->db->from('receipt_item');
			$this->db->join('product', 'product.product_id = receipt_item.receipt_item_product_id');
			$this->db->group_by("receipt_item_product_id");

    		$data = $this->db->get();
    		return $data->result();
    	}

	}
?>