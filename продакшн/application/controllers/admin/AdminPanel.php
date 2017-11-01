<?php
	class AdminPanel extends CI_Controller{
			function index(){
				$this->load->library('session');
				$this->load->helper('url');
				if($this->session->userdata('login') === 'yes'){
					$data['user_login'] = $this->session->userdata('user_login');
					$this->load->view('admin/adminPanel', $data);
				}else{
						$data['error'] = 'Вы не зашли';
						$data['url_login'] = anchor('login', 'login');
						$this->load->view('admin/adminPanel', $data);
				}
			}
	}
?>