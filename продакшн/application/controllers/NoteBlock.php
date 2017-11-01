<?php
	class NoteBlock extends CI_Controller{
		public function index($arg){
			$this->load->model('general_new_block');
			$result = $this->general_new_block->select_block_title();
			$data = $result;
			
			//echo $arg;
			
			/*echo '<pre>';
			print_r($data);
			echo '</pre>';*/
			
			$value = explode('/', $_SERVER['REQUEST_URI'] );
			
			/*echo '<pre>';
			print_r($value);
			echo '</pre>';*/
			
			/*echo $value[3];*/
						
			foreach($data as $key=>$result){
				/*echo $key . '->' . $result;
				echo '</br>';*/
				if($result === $arg){
					$this->load->view("nike");
				}
			}
		}
		
		 function create_functions($arg){

		}
	}
?>