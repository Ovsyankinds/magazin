<?php

class General extends CI_Controller{
	/* 
	 * Массив трехмерный data (заполняется с базы данных) для передачи в файл представления generalIndex данных:
	 * о заголовке блока ('block_title);
	 * о его контенте (block_content); 
	 * о его категории (block_category).
	 * Пример кода массива: 
	 * array(
	 *	[count] => 1;
	 * 	[array] => Array
	 *						(
	 *							['array' конкатенация с номером массива $cnt] => Array(
	 *  																																		[block_title] => значение из БД 
	 *																																			[block_content] => значение из БД
	 *																													            [block_category] => значение из БД
	 *               																											)
	 *            )
	 * )
	 *
	 * $data['count'] содержит число блоков
	*/
	
	private $data = array();
	
	/* Переменная $cnt для применения в названии ключа массива 'array' . $cnt*/
	private $cnt = 0;
	
	public function index(){
		$this->load->helper('url'); // загрузка хелпера ссылок
		$this->load->model('general_new_block'); // загрузка модели 
		$result = $this->general_new_block->query_select_block();
		//array_splice($result, 0, 1); // удаляем нулевой элемент массива
		$this->data['count'] = count($result) - 1; // число блоков в массиве
		
		/*Наполняем массив $data данными с БД*/
		foreach($result as $row){
				$this->data['array']['array' . $this->cnt]['block_title'] = $row['block_title'];
				$this->data['array']['array' . $this->cnt]['block_content'] = $row['block_content'];
				$this->data['array']['array' . $this->cnt]['category_id'] = $row['category_id'];
			++$this->cnt;
		}
		
		$this->load->view('index', $this->data); // загрузка представления с параметрами (массивом $data)
		
		/*echo "<pre>";
		print_r($this->data);
		echo "</pre>";*/
	}
}


?>