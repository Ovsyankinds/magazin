<?php
	class registration_user extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		
		public function insert_reg_user($login, $email, $password){
			$this->load->database();
			$sql="INSERT INTO registered_users(login, email, password) VALUES('$login', '$email', '$password')";
			$this->db->query($sql);
		}
	}
?>