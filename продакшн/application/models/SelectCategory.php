<?php
	class SelectCategory extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		private $result = array();
		private $cnt = 0;
		public function selectCategoryName(){
			$this->load->database(); //загрузили хелпер подключения к базе данных
			$sql = "SELECT category_id, name_category FROM block_category ";
			$query = $this->db->query($sql);
			$count = $query->num_rows();
			$this->result['count'] = $count - 1;
			foreach($query->result() as $row){
				$this->result['array' . $this->cnt]['category_id'] = $row->category_id;
				$this->result['array' . $this->cnt]['name_category'] = $row->name_category;
				++$this->cnt;
			}
			
			return $this->result;
		}
		
		//public function selectIdCa
	}
?>