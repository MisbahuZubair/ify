<?php
class legistlators_model extends CI_Model
{
    
 function getLegistlator($id)
 {

  $this->db->select("*");
  $this->db->from("legistlators");
  $this->db->where("id=".$id);
  $query = $this->db->get();
  return $query;
 }
}
?>