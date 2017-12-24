<?php
	class MGuest extends MY_Model{
		private $guest_id;
		

    	const DB_TABLE = "guest";
    	const DB_TABLE_PK = "guest_id";

		public function __construct(){

		}

		public function getGuest_id(){
			return $this->guest_id;
		}

		public function setGuest_id($guest_id){
			$this->guest_id = $guest_id;
		}
	}
?>
