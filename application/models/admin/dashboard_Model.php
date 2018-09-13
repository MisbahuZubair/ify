<?php
class dashboard_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }
    
    
    public function delete($id, $name){
        unlink('./application/uploads/'.$name.'.jpg');
        $sql = "DELETE from bills 
                WHERE bills.id=".$id."";
        $query = $this->db->query($sql);
        
        redirect('/admin/dashboard', 'refresh');
    }
    
    
    public function getLegistlators() { 
        $result = $this->db->select('id, name')->get('legistlators')->result_array(); 
        return $result; 
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
        redirect('/admin/dashboard', 'refresh');
    }
    
     public function addComment($new_data, $id)
    {
        $this->db->insert('Bill_'.$id.'_Comments', $new_data);
     }
    
     public function add($new_data)
    {
        $this->db->insert('bills', $new_data);
        redirect('/admin/dashboard', 'refresh');
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