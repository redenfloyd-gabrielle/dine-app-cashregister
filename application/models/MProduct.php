<?php
	class MProduct extends MY_Model{
		private $product_id;
		private $product_image;
		private $product_name;
		private $product_description;
		private $product_price;
		private $product_availability;
		private $product_category;
		private $product_created_by;
		private $product_created_on;
		private $product_modified_by;
		private $product_modified_on;
		

    	const DB_TABLE = "product";
    	const DB_TABLE_PK = "product_id";

		public function __construct(){

		}
		public function getProductDetailsById($id)
		{
			$where = array($this::DB_TABLE_PK =>$id);
			$query = $this->read_where($where);
			return $query;
		}


		public function do_upload_product($id)
		{
			$config = array(
				'upload_path' => './assets/images/',
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "100000000000000000000000000000000000000000000000000000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "1000000000000",
				'max_width' => "1000000000"
			);

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());
				return false;
			}
			else
			{
				$data = array('upload_data' => $this->upload->data()); //actual uploading
				
				if($this->insertPhotoProduct($this->upload->data()['file_name'], $id)) { //query to db
					return true;	
				} else {
					return false;
				}
			}
		}
		
		//called upon uploading file
		public function insertPhotoProduct($filename,$id) 
		{ 
			$where = array(
				"product_image" =>  "assets/images/".$filename,
			);

			return $result = $this->update($id, $where);
		}


		public function getAllProducts(){
			$query = $this->read_all();
			return $query;			             
		}

		public function getProductsByCategory($cat){
		   $this->db->select("*");
		   $this->db->from($this::DB_TABLE);
		   $this->db->where('product_category', $cat);
		   $this->db->order_by("product_name", "asc");
		   $query = $this->db->get();
		   return $query->result();
		}

		public function getItemsByCategory($cat)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('product_category', $cat);
			$query = $this->db->get();
			return $query;

			# code...
		}
		public function getProduct_id(){
			return $this->product_id;
		}

		public function setProduct_id($product_id){
			$this->product_id = $product_id;
		}

		public function getProduct_image(){
			return $this->product_image;
		}

		public function setProduct_image($product_image){
			$this->product_image = $product_image;
		}

		public function getProduct_name(){
			return $this->product_name;
		}

		public function setProduct_name($product_name){
			$this->product_name = $product_name;
		}

		public function getProduct_description(){
			return $this->product_description;
		}

		public function setProduct_description($product_description){
			$this->product_description = $product_description;
		}

		public function getProduct_price(){
			return $this->product_price;
		}

		public function setProduct_price($product_price){
			$this->product_price = $product_price;
		}

		public function getProduct_availability(){
			return $this->product_availability;
		}

		public function setProduct_availability($product_availability){
			$this->product_availability = $product_availability;
		}

		public function getProduct_category(){
			return $this->product_category;
		}

		public function setProduct_category($product_category){
			$this->product_category = $product_category;
		}

		public function getProduct_created_by(){
			return $this->product_created_by;
		}

		public function setProduct_created_by($product_created_by){
			$this->product_created_by = $product_created_by;
		}

		public function getProduct_created_on(){
			return $this->product_created_on;
		}

		public function setProduct_created_on($product_created_on){
			$this->product_created_on = $product_created_on;
		}

		public function getProduct_modified_by(){
			return $this->product_modified_by;
		}

		public function setProduct_modified_by($product_modified_by){
			$this->product_modified_by = $product_modified_by;
		}
		
		public function getProduct_modified_on(){
			return $this->product_modified_on;
		}

		public function setProduct_modified_on($product_modified_on){
			$this->product_modified_on = $product_modified_on;
		}

	}
?>
