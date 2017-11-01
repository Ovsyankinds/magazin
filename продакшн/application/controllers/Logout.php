<?php
	class Logout extends CI_Controller{
		function index(){
			$this->load->library('session');
			$this->load->helper('url');
			$this->session->unset_userdata(array('email' => 'ovsyankinds@gmail.com', 'login' => 'yes'));
			$this->load->view('logout');
		}
	}
?>