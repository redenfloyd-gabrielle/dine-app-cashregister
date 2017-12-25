<?php
	class MReceipt extends MY_Model{
		private $receipt_id;
		private $receipt_date;
		private $receipt_total;
		private $receipt_cashier;
		private $receipt_cash;
		private $receipt_change;
		

    	const DB_TABLE = "receipt";
    	const DB_TABLE_PK = "receipt_id";

		public function __construct(){

		}

		public function getReceipt_id(){
			return $this->receipt_id;
		}

		public function setReceipt_id($receipt_id){
			$this->receipt_id = $receipt_id;
		}

		public function getReceipt_date(){
			return $this->receipt_date;
		}

		public function setReceipt_date($receipt_date){
			$this->receipt_date = $receipt_date;
		}

		public function getReceipt_total(){
			return $this->receipt_total;
		}

		public function setReceipt_total($receipt_total){
			$this->receipt_total = $receipt_total;
		}

		public function getReceipt_cashier(){
			return $this->receipt_cashier;
		}

		public function setReceipt_cashier($receipt_cashier){
			$this->receipt_cashier = $receipt_cashier;
		}

		public function getReceipt_cash(){
			return $this->receipt_cash;
		}

		public function setReceipt_cash($receipt_cash){
			$this->receipt_cash = $receipt_cash;
		}

		public function getReceipt_change(){
			return $this->receipt_change;
		}

		public function setReceipt_change($receipt_change){
			$this->receipt_change = $receipt_change;
		}
		
	}
?>
