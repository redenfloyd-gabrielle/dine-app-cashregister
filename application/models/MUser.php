<?php
	class MUser extends MY_Model{
		private $user_id;
		

    	const DB_TABLE = "user";
    	const DB_TABLE_PK = "user_id";

		public function __construct(){

		}

		public function getUsers()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			// $this->db->where('user_id !=' , $this->session->userdata['empSession']['userID']);
			$query = $this->db->get();
			
			return $query->result();
		}
	}
?>
