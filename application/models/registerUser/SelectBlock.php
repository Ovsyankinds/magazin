<?php

class SelectBlock extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    private $data = array();
    private $cnt = 0;
    public function selectBlock(){
        $this->load->database();
        $query = $this->db->query('SELECT block_title, block_content, login FROM block_name');
        $count = $query->num_rows();
        $this->data['count'] = $count - 1;
        foreach ($query->result() as $row) {
            $this->data['block_num ' . $this->cnt]['title'] = $row->block_title;
            $this->data['block_num ' . $this->cnt]['content'] = $row->block_content;
            $this->data['block_num ' . $this->cnt]['login'] = $row->login;
            ++$this->cnt;
        }
        /*print_r($this->data);*/
        return $this->data;
    }
}