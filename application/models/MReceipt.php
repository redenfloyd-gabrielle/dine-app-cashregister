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

		public function countOrders()
		{
			$this->db->select('count(*) as orders');
			$this->db->from($this::DB_TABLE);
			$query = $this->db->get();
			return $query->result();
		}

		public function getTotal(){
        	  $this->db->select('SUM(receipt_total) AS total');
              $this->db->from($this::DB_TABLE);
              $query = $this->db->get();

			return $query->result();
        }

        public function getDailySales(){
        	$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
	    	
	    	$this->db->select('SUM(receipt_total) AS total');
	        $this->db->from($this::DB_TABLE);
	        $this->db->where('receipt_date >= "'.$now->format('Y-m-d 00:00:00').'" AND receipt_date <= "'.$now->format('Y-m-d H:i:s').'"');
	        $query = $this->db->get();

			return $query->result();
        }

     	public function getWeeklySales(){
     		$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $start = date('Y-m-d', strtotime('monday this week'));
            $end = date('Y-m-d', strtotime('sunday this week'));

    	  	$this->db->select('SUM(receipt_total) AS total');
          	$this->db->from($this::DB_TABLE);
           	$this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');
          	$query = $this->db->get();

			return $query->result();
        }

        public function getMonthlySales(){
        	$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

    	  	$this->db->select('SUM(receipt_total) AS total');
          	$this->db->from($this::DB_TABLE);
           	$this->db->where('receipt_date >= "'. $now->format('Y-m-01').'" AND receipt_date <= "'.$now->format('Y-m-t').'"');
          	$query = $this->db->get();

			return $query->result();
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
