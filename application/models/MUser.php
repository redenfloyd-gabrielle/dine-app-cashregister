<?php
	class MUser extends MY_Model{
		private $user_id;
	 	private $user_first_name;
	 	private $user_mi;
	 	private $user_last_name;
	 	private $user_password;
	 	private $user_type;
	 	private $user_status;
	 	private $user_created_by;
	 	private $user_created_on;
	 	private $user_modified_by;
	 	private $user_modified_on;
		

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
    
    public function attemptLogin(){
			//$hashPass=hash('sha512',$this->agentPassword);
			$query= $this->db->get_where($this::DB_TABLE,array('user_id'=>$this->user_id,'password'=>$this->user_password));
			if($query -> num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}
		}

		public function getUser_id(){
			return $this->user_id;
		}
  }

		public function setUser_id($user_id){
			$this->user_id = $user_id;
		}

		public function getUser_first_name(){
			return $this->user_first_name;
		}

		public function setUser_first_name($user_first_name){
			$this->user_first_name = $user_first_name;
		}

		public function getUser_mi(){
			return $this->user_mi;
		}

		public function setUser_mi($user_mi){
			$this->user_mi = $user_mi;
		}

		public function getUser_last_name(){
			return $this->user_last_name;
		}

		public function setUser_last_name($user_last_name){
			$this->user_last_name = $user_last_name;
		}

		public function getUser_password(){
			return $this->user_password;
		}

		public function setUser_password($user_password){
			$this->user_password = $user_password;
		}

		public function getUser_type(){
			return $this->user_type;
		}

		public function setUser_type($user_type){
			$this->user_type= $user_type;
		}

		public function getUser_status(){
			return $this->user_status;
		}

		public function setUser_status($user_status){
			$this->user_status = $user_status;
		}

		public function getUser_created_by(){
			return $this->user_created_by;
		}

		public function setUser_created_by($user_created_by){
			$this->user_created_by = $user_created_by;
		}

		public function getUser_created_on(){
			return $this->user_created_on;
		}

		public function setUser_created_on($user_created_on){
			$this->user_created_on = $user_created_on;
		}

		public function getUser_modified_by(){
			return $this->user_modified_by;
		}

		public function setUser_modified_by($user_modified_by){
			$this->user_modified_by = $user_modified_by;
		}

		public function getUser_modified_on(){
			return $this->user_modified_by;
		}

		public function setUser_modified_on($user_modified_on){
			$this->user_modified_on = $user_modified_on;
		}
?>
