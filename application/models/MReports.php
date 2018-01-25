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

        public function get_data_weekly(){
            $this->load->database();
            $start = date('Y-m-d', strtotime('monday this week'));
            $end = date('Y-m-d', strtotime('sunday this week'));


            $this->db->select('*, SUM(receipt_item_quantity) as quantity, SUM(receipt_item_subtotal) as subtotal');
            $this->db->from('receipt_item ri');
            $this->db->join('product p', 'p.product_id = ri.receipt_item_product_id');
            $this->db->join('receipt r','r.receipt_id = ri.receipt_item_receipt_id');
            $this->db->where('r.receipt_date >= "'.$start.'" AND r.receipt_date <= "'.$end.'"');
            $this->db->group_by("receipt_item_product_id");

            $data = $this->db->get();
            return $data->result();
        }

        public function get_data_daily(){
            $this->load->database();
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_item_quantity) as quantity, SUM(receipt_item_subtotal) as subtotal');
            $this->db->from('receipt_item ri');
            $this->db->join('product p', 'p.product_id = ri.receipt_item_product_id');
            $this->db->join('receipt r','r.receipt_id = ri.receipt_item_receipt_id');
            $this->db->where('r.receipt_date >= "'.$now->format('Y-m-d 00:00:00').'" AND r.receipt_date <= "'.$now->format('Y-m-d 23:59:59').'"');
            $this->db->group_by("receipt_item_product_id");

            $data = $this->db->get();
            return $data->result();
        }

        public function get_data_monthly(){
            $this->load->database();
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_item_quantity) as quantity, SUM(receipt_item_subtotal) as subtotal');
            $this->db->from('receipt_item ri');
            $this->db->join('product p', 'p.product_id = ri.receipt_item_product_id');
            $this->db->join('receipt r','r.receipt_id = ri.receipt_item_receipt_id');
            $this->db->where('r.receipt_date >= "'.$now->format('Y-m-01').'" AND r.receipt_date <= "'.$now->format('Y-m-t').'"');
            $this->db->group_by("receipt_item_product_id");

            $data = $this->db->get();
            return $data->result();
        }

        public function get_daily1(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-01 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-01 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily2(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-02 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-02 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily3(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-03 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-03 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily4(){
            $this->load->database();

            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-04 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-04 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily5(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-05 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-05 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily6(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-06 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-06 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily7(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-07 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-07 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily8(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-08 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-08 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily9(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-09 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-09 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily10(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-10 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-10 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily11(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-11 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-11 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily12(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-12 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-12 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily13(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-13 00:00:00').'" AND receipt_date <= "'.$now->format('Y-m-13 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily14(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-14 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-14 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily15(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-15 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-15 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily16(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-16 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-16 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily17(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-17 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-17 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily18(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-18 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-18 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily19(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-19 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-19 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily20(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-20 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-20 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily21(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-21 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-21 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily22(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-22 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-22 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily23(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-23 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-23 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily24(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-24 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-24 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily25(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-25 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-25 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily26(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-26 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-26 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily27(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-27 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-27 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily28(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-28 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-28 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily29(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-29 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-29 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily30(){
            $this->load->database();

            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-30 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-30 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }
        public function get_daily31(){
            $this->load->database();
            
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-31 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-31 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_daily(){

            $this->load->database();
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >="'.$now->format('Y-m-d 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-d 23:59:59').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
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
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }

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
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
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
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
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
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month1(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-01-01').'" AND receipt_date <= "'.$end->format('Y-01-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month2(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-02-01').'" AND receipt_date <= "'.$end->format('Y-02-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month3(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-03-01').'" AND receipt_date <= "'.$end->format('Y-03-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month4(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-04-01').'" AND receipt_date <= "'.$end->format('Y-04-t').'"');

           $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month5(){
            $this->load->database();

            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-05-01').'" AND receipt_date <= "'.$end->format('Y-05-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month6(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-06-01').'" AND receipt_date <= "'.$end->format('Y-06-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month7(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-07-01').'" AND receipt_date <= "'.$end->format('Y-07-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month8(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-08-01').'" AND receipt_date <= "'.$end->format('Y-08-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month9(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-09-01').'" AND receipt_date <= "'.$end->format('Y-09-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month10(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-10-01').'" AND receipt_date <= "'.$end->format('Y-10-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month11(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-11-01').'" AND receipt_date <= "'.$end->format('Y-11-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }

        public function get_month(){
            $this->load->database();
            $start = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            $end = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
            
            
            
            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start->format('Y-m-01').'" AND receipt_date <= "'.$end->format('Y-m-t').'"');

            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }


        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////


        public function getReceipt(){
            $this->load->database();
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

            $this->db->select('*');
            $this->db->from('receipt');
            $this->db->where('receipt_total > 0');            
            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }


        public function getReceiptday(){

            $this->load->database();
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

            $this->db->select('*');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$now->format('Y-m-d 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-d 23:59:59').'" AND receipt_total > 0');

           // SELECT * FROM `receipt` WHERE receipt_date >= '2018-01-25 0:0:0' and receipt_date <= '2018-01-25 23:59:59'

            $data = $this->db->get();
            return $data->result();
        }

        public function getReceiptmonth(){

            $this->load->database();
            $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

            $this->db->select('*');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$now->format('Y-m-01 0:0:0').'" AND receipt_date <= "'.$now->format('Y-m-t 23:59:59').'" AND receipt_total > 0');
        
            $data = $this->db->get();
            if($data->result() > 0){
               return $data->result();
            }else{
               return $total = 0;
            }
        }


        public function getReceiptweek(){

            $this->load->database();
            $start = date('Y-m-d', strtotime('monday this week'));
            $end = date('Y-m-d', strtotime('sunday this week'));


            $this->db->select('*');
            $this->db->from('receipt');
            $this->db->where('receipt_date >= "'.$start.'" AND receipt_date <= "'.$end.'" AND receipt_total > 0');
    

            $data = $this->db->get();
            return $data->result();
        }

        public function getReceiptInfoByID($id){

            $this->load->database();

            $this->db->select('*');
            $this->db->from('receipt');
            $this->db->join('user ', 'user_id = receipt_cashier');
            $this->db->where('receipt_id = '.$id.'');


            $data = $this->db->get();
            return $data->result();

        }

        public function getTableValues($id){
            $this->load->database();
            $this->db->select('*');
            $this->db->from('receipt r');
            $this->db->join('receipt_item re','re.receipt_item_receipt_id = r.receipt_id');
            $this->db->join('product p', 'p.product_id = re.receipt_item_product_id');
            $this->db->where('receipt_id = '.$id.'');

            $data = $this->db->get();
            return $data->result();

        }

        public function getTotalSales(){
            $this->load->database();

            $this->db->select('*, SUM(receipt_total) as total');
            $this->db->from('receipt');
            $data = $this->db->get();
            return $data->result();
        }
    }

?>