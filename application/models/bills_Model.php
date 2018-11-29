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
        echo "<script>alert('Bill updated');</script>";
    }
    
    public function getLegistlatorBills($id){
         $sql= "SELECT * FROM bills
                WHERE bill_sponsor =".$id."
                INNER JOIN bills.bill_sponsor=legistlators.id;";
         
       $query = $this->db->query($sql);
        return $query->result_array();
        
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
    
    
 function fetch_data($limit, $start, $tag)
 {

  $this->db->select("*");
  $this->db->from("bills");
  $this->db->where("bill_tag1='".$tag."' OR bill_tag2='".$tag."' OR bill_tag3='".$tag."'");
  $this->db->order_by("id", "ASC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query;
 }

}