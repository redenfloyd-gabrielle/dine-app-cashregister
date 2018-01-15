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

    	public function get_daily(){
    		$this->load->database();
            $date_now = date('Y-m-d');
            $first = date('Y-m-d', strtotime('first day of this month'));
    		
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$first.'"');
            $this->db->group_by('receipt_date');

    		$data = $this->db->get();
    		return $data->result();
    	}

        public function get_weekly3(){

            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-m-d', strtotime('-21 day', strtotime('monday this week')));
            $end = date('Y-m-d', strtotime('-21 day', strtotime('sunday this week')));
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND 
                receipt_date <="'.$end.'" ');

            $data = $this->db->get();
            return $data->result();

        }

         public function get_weekly2(){

            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-m-d', strtotime('-14 day', strtotime('monday this week')));
            $end = date('Y-m-d', strtotime('-14 day', strtotime('sunday this week')));
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND 
                receipt_date <="'.$end.'" ');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_weekly1(){

            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-m-d', strtotime('-7 day', strtotime('monday this week')));
            $end = date('Y-m-d', strtotime('-7 day', strtotime('sunday this week')));
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND 
                receipt_date <="'.$end.'" ');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_weekly(){

            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-m-d', strtotime('monday this week'));
            $end = date('Y-m-d', strtotime('sunday this week'));
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND 
                receipt_date <="'.$end.'" ');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month1(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-01-01');
            $end = date('Y-01-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month2(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-02-01');
            $end = date('Y-02-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month3(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-03-01');
            $end = date('Y-03-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month4(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-04-01');
            $end = date('Y-04-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month5(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-05-01');
            $end = date('Y-05-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month6(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-06-01');
            $end = date('Y-06-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month7(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-07-01');
            $end = date('Y-07-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month8(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-08-01');
            $end = date('Y-08-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month9(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-09-01');
            $end = date('Y-09-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month10(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-10-01');
            $end = date('Y-10-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month11(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-11-01');
            $end = date('Y-11-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }

        public function get_month(){
            $this->load->database();
            $date_now = date('Y-m-d');

            $start = date('Y-m-01');
            $end = date('Y-01-t');
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'"');

            $data = $this->db->get();
            return $data->result();
        }
	}
?>