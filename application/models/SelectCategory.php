<?php
	class SelectCategory extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		private $result = array();
		private $cnt = 0;
		public function selectCategoryName(){
			$this->load->database(); //загрузили хелпер подключения к базе данных
			$sql = "SELECT id_category, name_category FROM block_category ";
			$query = $this->db->query($sql);
			$count = $query->num_rows();
			$this->result['count'] = $count - 1;
			foreach($query->result() as $row){
				$this->result['array' . $this->cnt]['id_category'] = $row->id_category;
				$this->result['array' . $this->cnt]['name_category'] = $row->name_category;
				++$this->cnt;
			}
			
			return $this->result;
		}
		
		//public function selectIdCa
	}
?>