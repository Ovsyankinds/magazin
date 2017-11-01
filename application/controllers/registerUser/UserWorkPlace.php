<?php
	class UserWorkPlace extends CI_Controller{
        private $array_block;
        private $data = array();
        private $cnt = 0;
        private $value_block_title;
        private $value_block_content;
        private $value_category_name;
        private $id_category;

       /* function __construct()
        {
            parent::__construct();
            $this->load->library('session', 'libraries/session');
        }*/

        function index(){
            $this->load->library('session', 'libraries/session'); 	//загружаем библиотеку работы с сессиями
            $this->load->helper('url');        //загружаем хепер для работы с ссылками
            $this->load->model('general_new_block');  //загружаем модель для работы с базой данных
            $this->load->model('registerUser/addNewBlock', 'addNewBlock');	 //загружаем модель, которая отрисовывает форму добавления нового блока

            /*если сессия существует, то работаем далее*/
            if($this->session->userdata('login') === 'yes'){
                $this->data['user_login'] = $this->session->userdata('user_login');       //сохранили логин из сессии пользователя
                $this->array_block = $this->general_new_block->select_block_adminpanel(); //сохраняем в переменную массив с существующими блоками, используя метод из класса general_new_block

                /*echo "<br><br><br><pre>";
                    print_r($this->array_block);
                echo "</pre>";*/

                $this->data['count'] = count($this->array_block) - 1; // число блоков в массиве
                if(!count($this->array_block)){
                    $this->data['message_for_user_not_block']="У Вас пока нет магазинов";
                }

                foreach($this->array_block as $row){ 																										//сохраняем в массив данные о блоках, выборка для данного пользователя
                    if($row['login'] === $this->session->userdata('user_login')){
                        $this->data['array']['array' . $this->cnt]['block_title'] = $row['block_title'];
                        $this->data['array']['array' . $this->cnt]['block_content'] = $row['block_content'];
                        $this->data['array']['array' . $this->cnt]['id_category'] = $row['id_category'];

                        switch($this->data['array']['array' . $this->cnt]['id_category']){//пробегаем по категориям, для вывода категории в карточке блока
                            case 1:
                                $this->data['array']['array' . $this->cnt]['id_category'] = 'Одежда';
                                break;
                            case 2:
                                $this->data['array']['array' . $this->cnt]['id_category'] = 'Оргтехника';
                        }
                        ++$this->cnt;
                    }
                }

                /*echo "<pre>";
                    print_r($this->data);
                echo "</pre>";*/

                $this->load->view('registerUser/userWorkPlace', $this->data); //загружаем представление с параметрами в виде массива
                //$this->addNewBlock->add_new_block_view();						//загружаем форму для добавления нового блока
            }else{
                $data['error'] = 'Вы не зашли';
                $data['url_login'] = anchor('login', 'login');
                $this->load->view('registerUser/userWorkPlace', $this->data);
				}
			}

        function addNewBlock(){
            $this->load->helper('url');
            $this->load->helper('form'); //загрузили хелпер формы
            $this->load->model('selectCategory');
            $result = $this->selectCategory->selectCategoryName();

            /*echo "<pre>";
            print_r($result);
            echo "</pre>";*/
            $this->data['category'] = $result;

            /*echo "<pre>";
           print_r($this->data["category"]);
           echo "</pre>";*/

            array_splice($result, 0, 1);
            $data['count'] = count($result) - 1;
            foreach($result as $row){
                $data['array']['array' . $this->cnt]['categoryName'] = $row['name_category'];
                ++$this->cnt;
            }
            $this->load->view('registerUser/addNewBlock', $this->data); //загрузили файл представления из application\views\addNewBlock.php

            if($this->input->post('add_block')){
                $this->insert_block();
            }
        }

        public function insert_block(){
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->model('general_new_block');
            $this->load->model('selectCategory');
            $this->value_block_title = $this->input->post('block_title');
            $this->value_block_content = $this->input->post('block_content');
            $this->value_category_name = $this->input->post('category');

            $arrayCategory = $this->selectCategory->selectCategoryName();

            foreach($arrayCategory as $row){

            }

            switch($this->value_category_name){
                case 'clother':
                    $this->id_category = 1;
                    break;
                case 'orgteh':
                    $this->id_category = 2;
                    break;
            }

            $this->general_new_block->query_insert_block($this->value_block_title,
                $this->value_block_content,
                $this->id_category, $this->session->userdata('user_login'));
        }

        public function deleteBlock(){
            if ($this->session->userdata('login') === 'yes') {
                $this->load->model('general_new_block');  //загружаем модель для работы с базой данных
                $this->load->model('registerUser/addNewBlock', 'addNewBlock');     //загружаем модель, которая отрисовывает форму добавления нового блока
                $this->load->model('registerUser/DeleteBlock');

                /*если сессия существует, то работаем далее*/
                if ($this->session->userdata('login') === 'yes') {
                    $this->data['user_login'] = $this->session->userdata('user_login');       //сохранили логин из сессии пользователя
                    $this->array_block = $this->general_new_block->select_block_adminpanel(); //сохраняем в переменную массив с существующими блоками, используя метод из класса general_new_block

                    /*echo "<br><br><br><pre>";
                        print_r($this->array_block);
                    echo "</pre>";*/

                    $this->data['count'] = count($this->array_block) - 1; // число блоков в массиве
                    foreach ($this->array_block as $row) {                                                                                                        //сохраняем в массив данные о блоках, выборка для данного пользователя
                        if ($row['login'] === $this->session->userdata('user_login')) {
                            $this->data['array']['array' . $this->cnt]['block_title'] = $row['block_title'];
                            $this->data['array']['array' . $this->cnt]['block_content'] = $row['block_content'];
                            $this->data['array']['array' . $this->cnt]['id_category'] = $row['id_category'];

                            switch ($this->data['array']['array' . $this->cnt]['id_category']) {//пробегаем по категориям, для вывода категории в карточке блока
                                case 1:
                                    $this->data['array']['array' . $this->cnt]['id_category'] = 'Одежда';
                                    break;
                                case 2:
                                    $this->data['array']['array' . $this->cnt]['id_category'] = 'Оргтехника';
                            }
                            ++$this->cnt;
                        }
                    }

                   /* echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';*/

                    if(isset($_POST['submit'])){
                     $this->DeleteBlock->delete_block($_POST['name'][0], $_POST['val'][0]);
                    }

                    /*echo "<pre>";
                        print_r($this->data);
                    echo "</pre>";*/
                    $this->load->view('registerUser/deleteBlock', $this->data);
                    /*echo $this->data['page'];
                    echo $this->session->userdata('user_login');*/
                }
            }
        }

        public function editBlock(){
            $this->load->model('registerUser/selectBlock', 'selectBlock');
            $result = $this->selectBlock->selectBlock();
            $data['selectBlock'] = $result;
            $data['header'] = "Редактирование блоков 55555";
            $this->load->view('registerUser/editBlock', $data);
        }
    }
?>