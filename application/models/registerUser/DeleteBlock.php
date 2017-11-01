<?php

class DeleteBlock extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    private $block_title;
    private $id_category;
    public function delete_block($block_title, $id_category){
        $this->block_title = $block_title;
        $this->id_category = $id_category;

        /*echo $this->block_title;
        echo $this->id_category;*/
        $this->load->database();
        $sql = "DELETE FROM block_name WHERE block_title='$this->block_title'";
        $this->db->query($sql);
    }
}

?>