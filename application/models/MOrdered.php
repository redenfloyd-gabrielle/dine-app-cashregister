<?php
	class MOrdered extends MY_Model{
		private $ordered_id;
		private $ordered_time;
		private $ordered_qr_code;
		private $ordered_total;
		private $ordered_order_item;
		private $ordered_guest_id;

    	const DB_TABLE = "ordered";
    	const DB_TABLE_PK = "ordered_id";

		public function __construct(){

		}

		public function getOrdered_id(){
			return $this->ordered_id;
		}

		public function setOrdered_id($ordered_id){
			$this->ordered_id = $ordered_id;
		}

		public function getOrdered_time(){
			return $this->ordered_time;
		}

		public function setOrdered_time($ordered_time){
			$this->ordered_time = $ordered_time;
		}
		public function getOrdered_qr_code(){
			return $this->ordered_qr_code;
		}

		public function setOrdered_qr_code($ordered_qr_code){
			$this->ordered_qr_code = $ordered_qr_code;
		}

		public function getOrdered_total(){
			return $this->ordered_total;
		}

		public function setOrdered_total($ordered_total){
			$this->ordered_total = $ordered_total;
		}
	}
?>
