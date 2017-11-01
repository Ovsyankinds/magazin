<?php
	class UserWorkPlace extends CI_Controller{
        private $array_block;
        private $data = array();
        private $cnt = 0;

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

                /*echo "<pre>";
                    print_r($this->array_block);
                echo "</pre>";*/

                $this->data['count'] = count($this->array_block) - 1; // число блоков в массиве
                foreach($this->array_block as $row){ 																										//сохраняем в массив данные о блоках, выборка для данного пользователя
                    if($row['login'] === $this->session->userdata('user_login')){
                        $this->data['array']['array' . $this->cnt]['block_title'] = $row['block_title'];
                        $this->data['array']['array' . $this->cnt]['block_content'] = $row['block_content'];
                        $this->data['array']['array' . $this->cnt]['category_id'] = $row['category_id'];

                        switch($this->data['array']['array' . $this->cnt]['category_id']){         //пробегаем по категориям, для вывода категории в карточке блока
                            case 13:
                                $this->data['array']['array' . $this->cnt]['category_id'] = 'Одежда';
                                break;
                            case 14:
                                $this->data['array']['array' . $this->cnt]['category_id'] = 'Оргтехника';
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
                $this->load->view('registerUser/userWorkPlace', $data);
				}
			}

        function addNewBlock(){
            $this->load->library('session'); 	//загружаем библиотеку работы с сессиями
            $this->load->helper('url');        //загружаем хепер для работы с ссылками
            $this->load->helper('form');
            $this->load->model('general_new_block');  //загружаем модель для работы с базой данных
            $this->load->model('registerUser/addNewBlock', 'addNewBlock');	 //загружаем модель, которая отрисовывает форму добавления нового блока

            /*если сессия существует, то работаем далее*/
            if($this->session->userdata('login') === 'yes'){
                $this->data['user_login'] = $this->session->userdata('user_login');       //сохранили логин из сессии пользователя
                $this->array_block = $this->general_new_block->select_block_adminpanel(); //сохраняем в переменную массив с существующими блоками, используя метод из класса general_new_block

                /*echo "<pre>";
                    print_r($this->array_block);
                echo "</pre>";*/

                $this->data['count'] = count($this->array_block) - 1; // число блоков в массиве
                foreach($this->array_block as $row){ 																										//сохраняем в массив данные о блоках, выборка для данного пользователя
                    if($row['login'] === $this->session->userdata('user_login')){
                        $this->data['array']['array' . $this->cnt]['block_title'] = $row['block_title'];
                        $this->data['array']['array' . $this->cnt]['block_content'] = $row['block_content'];
                        $this->data['array']['array' . $this->cnt]['category_id'] = $row['category_id'];

                        switch($this->data['array']['array' . $this->cnt]['category_id']){         //пробегаем по категориям, для вывода категории в карточке блока
                            case 13:
                                $this->data['array']['array' . $this->cnt]['category_id'] = 'Одежда';
                                break;
                            case 14:
                                $this->data['array']['array' . $this->cnt]['category_id'] = 'Оргтехника';
                        }
                        ++$this->cnt;
                    }
                }

                /*echo "<pre>";
                    print_r($this->data);
                echo "</pre>";*/

                $this->load->view('registerUser/addNewBlock', $this->data); //загружаем представление с параметрами в виде массива
                $this->addNewBlock->add_new_block_view();						//загружаем форму для добавления нового блока
            }else{
                $data['error'] = 'Вы не зашли';
                $data['url_login'] = anchor('login', 'login');
                $this->load->view('registerUser/addNewBlock', $data);
            }
				
        }
	}
?>