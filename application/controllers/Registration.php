<?php
	class Registration extends CI_Controller{
		public function index(){
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', 'Поле %s не должно быть пустым');
			$this->form_validation->set_message('valid_email', 'Неправильный формат адреса');
			
			$rules = array(
								array(
												'field' => 'login',
												'label' => 'Логин',
												'rules' => 'trim|required'
								),
								array(
												'field' => 'email',
												'label' => 'email',
												'rules' => 'trim|required|valid_email'
								),
								array(
												'field' => 'password',
												'label' => 'Пароль',
												'rules' => 'trim|required'
								),
								array(
												'field' => 'password_confirm',
												'label' => 'Подтверждение пароля',
												'rules' => 'trim|required|matches[password]'
								)
			);
			
			$this->form_validation->set_rules($rules);
			
			if($this->form_validation->run() == false){
				$this->load->view('registration');
			}else{
				$this->load->model('registration_user');
                echo "Ovs";
				$this->registration_user->insert_reg_user($this->input->post('login'), $this->input->post('email'), $this->input->post('password'));
				//$this->registration_user->insert_reg_user(1, 2, 3);
				$this->load->view('admin/adminpanel');
			}
		}
	}
?>