<?php
/**
 * Created by PhpStorm.
 * User: Ovsyankinds
 * Date: 20.03.2017
 * Time: 6:37
 */

class Auth extends CI_Controller {

    public function login(){
        if( isset($_POST['login']) ) {
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run() == true) {
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where( array('email' => $email, 'password' => $password ));
                $query = $this->db->get();
                $row = $query->row();
                if (isset($row->password)) {
                    $this->session->set_flashdata("login_success", "Вход выполнен");
                } else {
                    $this->session->set_flashdata("login_error ", "Вход не выполнен");
                }

            }
        }
            $this->load->view('login_auth');
    }

    public function registration(){
        if(isset($_POST['register'])){
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('password2', 'password2', 'required|min_length[5]|matches[password]');
            $this->form_validation->set_rules('phone', 'phone', 'required');

            if($this->form_validation->run() == true){
                $data = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => md5( $_POST['password'] ),
                    'gender' => $_POST['gender'],
                    'create_date' => date('Y-m-d'),
                    'phone' => $_POST['phone']
                );

                $this->db->insert('users', $data);
                $this->session->set_flashdata("success", "Регистрация прошла успешно");
                redirect("auth/registration", "refresh");
            }
        }
        $this->load->view('registration_auth');
    }
}