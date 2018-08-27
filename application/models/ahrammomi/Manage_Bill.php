<?php
class Manage_Bill extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }
    
    public function get($id)
    {
        $this->db->where(['id' => $id]);
        $query = $this->db->get('bills');
        return $query->row_array();
    }
    
    public function update($id,$new_data)
    {
        $this->db->where(['id' => $id]);
        $this->db->update('bills', $new_data);
    }
    
     public function addComment($new_data, $id)
    {
        $this->db->insert('Bill_'.$id.'_Comments', $new_data);
     }
     public function add($new_data)
    {
        $this->db->insert('bills', $new_data);
        $billid = $this->db->insert_id();
        
        $sql = "CREATE TABLE `assemblify`.`Bill_".$billid."_Comments` (
           `user_fname` text NOT NULL,
  `user_lname` text NOT NULL,
  `comment` text,
  `vote` tinyint(1) DEFAULT NULL,
  `id` int(11) NOT NULL)";
        $query = $this->db->query($sql);
    }
    
     public function edit($new_data)
    {
        $this->db->insert('bills', $new_data);
    }
    
    public function connection_test()
    {
        $this->load->database('default', TRUE);
    }
    
    public function allBills()
    {
        $result_set =$this->db->get('bills');
        return $result_set->result_array(); 
    }
}