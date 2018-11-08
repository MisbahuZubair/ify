<?php
class l_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }
    
     public function getLegistlator($bill_ID)
    {
        $sql= "SELECT * FROM legistlators";
         
        $query = $this->db->query($sql);
        return $query->row_array();
    }
}
?>