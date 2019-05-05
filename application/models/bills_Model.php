<?php
class Bills_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }
    
    function fetch_AllBills($limit, $start, $source, $filter)
    {
        $this->db->select("*");
        $this->db->from("bills");
        if($source!="all"){
            $this->db->where("bill_origin ='".$source."'");
        }
        if($filter!="all"){
        $this->db->where("bill_status ='".urldecode($filter)."'");
        }
        $this->db->where("publish=1");
        $this->db->order_by("id", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }
    
    function fetch_BillsByLegistlator($limit, $start, $id)
     {
        $this->db->select("*");
        $this->db->from("bills");
        $this->db->where("bill_sponsor = ".$id);
        $this->db->where("publish=1");
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
     }
    
    function fetch_BillsByTag($limit, $start, $tag)
    {
        $this->db->select("*");
        $this->db->from("bills");
        $this->db->where("bill_tag1='".$tag."' OR bill_tag2='".$tag."' OR bill_tag3='".$tag."'");
        $this->db->where("publish=1");
        $this->db->order_by("id", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    public function checkSponsor($bill_ID){
        $this->db->select("bill_sponsor");
        $this->db->from("bills");
        $this->db->where("bills.id =".$bill_ID);
        $result = $this->db->get()->row();
        return $result->bill_sponsor;
    }

     public function getBill($bill_ID, $bill_sponsor)
    {
        $this->db->select("*");
        $this->db->from("bills");
        if($bill_sponsor!=""){
        $this->db->join('legistlators', 'bills.bill_sponsor = legistlators.id', 'inner');}
        $this->db->join('committees', 'bills.bill_committee = committees.id', 'inner');
        $this->db->where("bills.id =".$bill_ID);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function updateBill($bill_ID,$new_data)
    {
        $this->db->where(['id' => $bill_ID]);
        $this->db->update('bills', $new_data);
        echo "<script>alert('Bill updated');</script>";
    }

}