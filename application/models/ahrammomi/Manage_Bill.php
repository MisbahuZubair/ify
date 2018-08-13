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
    
     public function add($new_data)
    {
        $this->db->insert('bills', $new_data);
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