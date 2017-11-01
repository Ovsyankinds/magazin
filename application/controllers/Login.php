<?php
	class Login extends CI_Controller{

      /* function __construct()
        {
            parent::__construct();
            $this->load->library('session', 'libraries/session');
        }*/

		public $users = array(
		                        array()
                            );
		public $cnt = 1;
		private $email_login;
		private $password_login;
		private $session_data = array();
		private $error = '';

		public function index(){			
			$this->load->helper('form');
			$this->load->helper('url');
			//$this->load->library('session', 'libraries/session');
			
			if($this->session->userdata('login') === 'yes'){
				$this->output->set_header("Location: /index.php/registerUser/userWorkPlace");
			}
			
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', 'Поле %s не должно быть пустым');
			$this->form_validation->set_message('valid_email', 'Неправильный формат адреса');
			$rules_login = array(
											array(
														'field' => 'email_login',
														'label' => 'email',
														'rules' => 'trim|required'
											),
											
											array(
														'field' => 'password_login',
														'label' => 'Пароль',
														'rules' => 'trim|required'
											) /*'rules' => 'trim|required|'*/
			
			);
			
			$this->form_validation->set_rules($rules_login);
			if($this->form_validation->run() == false){
				$this->load->view('login');
			}else{
			
				$this->load->database();
				$sql = "SELECT login, email, password FROM registered_users";
				$query = $this->db->query($sql);
				
				foreach($query->result() as $row){					
					$this->users['user_' . $this->cnt]['user_login'] = $row->login;
					$this->users['user_' . $this->cnt]['user_email'] = $row->email;
					$this->users['user_' . $this->cnt]['user_password'] = $row->password;
					++$this->cnt;
				}
				
				array_splice($this->users, 0 , 1);
				
				$this->email_login = $this->input->post('email_login');
				$this->password_login = $this->input->post('password_login');
				
				foreach($this->users as $row){
						if($row['user_email'] === $this->email_login && $row['user_password'] === $this->password_login){
							$this->session_data['user_login'] = $row['user_login'];
							$this->session_data['email'] = $row['user_email'];
							$this->session_data['login'] = 'yes';
							$this->session->set_userdata($this->session_data);
						}else{
							$error = "Не правильный email или пароль";
							$data['error'] = $error;
							$this->load->view('login', $data);
						}
				}
				
				if($this->session->userdata('login') === 'yes'){
					$this->output->set_header("Location: /index.php/registerUser/userWorkPlace");
				}
			}
		}
	}
?>