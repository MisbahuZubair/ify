<?php
class Scroll_pagination_model extends CI_Model
{
    function fetch_data($limit, $start, $source, $filter)
    {
        $this->db->select("*");
        $this->db->from("bills");
        if($source!="all"){
            $this->db->where("bill_origin ='".$source."'");
        }
        if($filter!="all"){
        $this->db->where("bill_status ='".urldecode($filter)."'");
        }
        //$this->db->where("publish=0");
        $this->db->order_by("id", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }
}
?>