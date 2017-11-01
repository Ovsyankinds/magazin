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

			function addNewBlockCategory(){
                if(isset( $_POST['addNewBlockCategory'] )){
                    $this->form_validation->set_rules('nameCategory', 'nameCategory', 'required');

                    if ($this->form_validation->run() == true) {
                        $nameCategory = $_POST['nameCategory'];
                        $this->load->database();
                        $sql = "INSERT INTO block_category (name_category) VALUES (".$this->db->escape($nameCategory).")";
                        $this->db->query($sql);
                        //echo $this->db->affected_rows();
                    }
                }

                $this->load->view('admin/addNewBlockCategory');
            }
	}
?>