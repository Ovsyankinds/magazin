<?php
	class General_new_block extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		public $array = array(
														array()
													);
		public $cnt = 0;
		
		public function query_select_block(){
			$this->load->database();
			$sql = 'SELECT block_name.block_title, block_name.block_content, id_category FROM block_name';
			$query = $this->db->query($sql);
			foreach($query->result() as $row){
				$this->array['array' . $this->cnt]['block_title'] = $row->block_title; 
				$this->array['array' . $this->cnt]['block_content'] = $row->block_content;
				$this->array['array' . $this->cnt]['id_category'] = $row->id_category;
				++$this->cnt;
			}
			array_splice($this->array, 0, 1); // убирает пустой массив 
			return $this->array;
		}
		
		public function select_block_adminpanel(){
			//$this->load->library('session');
			$login = (string)$this->session->userdata('user_login');
			$this->load->database();
			$sql = "SELECT block_name.block_title, block_name.block_content, id_category, 
							login FROM block_name WHERE login = '$login'";
			$query = $this->db->query($sql);
			foreach($query->result() as $row){
				$this->array['array' . $this->cnt]['block_title'] = $row->block_title; 
				$this->array['array' . $this->cnt]['block_content'] = $row->block_content;
				$this->array['array' . $this->cnt]['id_category'] = $row->id_category;
				$this->array['array' . $this->cnt]['login'] = $row->login;
				++$this->cnt;
			}
			array_splice($this->array, 0, 1); // убирает пустой массив 
			return $this->array;
		}
		
		
		public function select_block_title(){
			$array = array();
			$this->load->database();
			$sql = "SELECT block_name.block_title FROM block_name";
			$query = $this->db->query($sql);
			foreach($query->result() as $row){
				$array['block_title_'. $this->cnt] = $row->block_title;
				++$this->cnt;
			}
			return $array;
		}
		
		public function query_insert_block($block_title, $block_content, $id_category, $login){
			$this->load->database();
			$sql = "INSERT INTO block_name(block_title, block_content, id_category, login) 
								VALUES(".$this->db->escape($block_title).",".$this->db->escape($block_content).",
												".$this->db->escape($id_category).",".$this->db->escape($login).")";
			$query = $this->db->query($sql);	
		}
		
		
	}
?>