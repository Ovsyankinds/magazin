<?php
	class AddNewBlock extends CI_Model{
		private $cnt = 0;
		private $value_block_title;
		private $value_block_content;
		private $value_category_name;
		private $category_id;

		public function add_new_block_view(){
            $this->load->helper('url');
            $this->load->helper('form'); //загрузили хелпер формы
            $this->load->model('selectCategory');
            $result = $this->selectCategory->selectCategoryName();
            array_splice($result, 0, 1);
            $data['count'] = count($result) - 1;
            foreach ($result as $row) {
                $data['array']['array' . $this->cnt]['categoryName'] = $row['name_category'];
                ++$this->cnt;
            }
            $this->load->view('addNewBlock', $data); //загрузили файл представления из application\views\addNewBlock.php

            if ($this->input->post('add_block')) {
                $this->insert_block();
            }
        }
		
		public function insert_block(){
			$this->load->helper('form');
			//$this->load->library('session');
			$this->load->model('general_new_block');
			$this->value_block_title = $this->input->post('block_title');
			$this->value_block_content = $this->input->post('block_content');
			$this->value_category_name = $this->input->post('category');
			switch($this->value_category_name){
				case 'clothes':
					$this->category_id = 13;
					break;
				case 'org_teh':
					$this->category_id = 14;
					break;
				case 'home_teh':
					$this->category_id = 15;
					break;
				case 'auto_chem':
					$this->category_id = 16;
			}
			
			$this->general_new_block->query_insert_block($this->value_block_title, $this->value_block_content, 
																										$this->category_id, $this->session->userdata('user_login'));
		}
	}

?>