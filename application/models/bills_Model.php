<?php
class Bills_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }
    
     public function getBill($bill_ID)
    {
        $sql= "SELECT * FROM bills
                INNER JOIN legistlators
                ON bills.bill_sponsor=legistlators.id
                INNER JOIN committees
                ON bills.bill_committee=committees.id
                WHERE bills.id =".$bill_ID." ;";
         
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    public function updateBill($bill_ID,$new_data)
    {
        $this->db->where(['id' => $bill_ID]);
        $this->db->update('bills', $new_data);
    }
    
    public function getLegistlatorBills($id){
         $sql= "SELECT * FROM bills
                WHERE bills.bill_sponsor =".$id." ;";
         
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    public function allBills()
    {
        $result_set =$this->db->get('bills');
        return $result_set->result_array(); 
    }
     public function addComment($new_data, $id)
    {
        $this->db->insert('Bill_'.$id.'_Comments', $new_data);
     }
}