<?php
class legistlatorbills_Model extends CI_Model
{
 function fetch_data($limit, $start, $id)
 {

  $this->db->select("*");
  $this->db->from("bills");
  $this->db->where("bill_sponsor = ".$id);
  $this->db->order_by("id", "DESC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query;
 }

     function getLegistlator($id)
 {

  $this->db->select("*");
  $this->db->from("legistlators");
  $this->db->where("id=".$id);
  $query = $this->db->get();
  return $query->row_array();
 }
}
?>