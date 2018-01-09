<?php
	class MCart extends MY_Model{
		private $guest_id;
		

    	const DB_TABLE = "cart";
    	const DB_TABLE_PK = "guest_id";

		public function __construct(){

        }
        
        public function getAllOrderProducts($ordered_id)
		{	
			$where = array('ordered_id' => $ordered_id);
			$query = $this->read_where($where);
			return $query;
		}

		public function getGuest_id(){
			return $this->guest_id;
		}

		public function setGuest_id($guest_id){
			$this->guest_id = $guest_id;
		}
	}
?>
