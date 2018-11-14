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

public function fetch_legistlators_model($limit, $start, $filter)
    {
        $this->db->select("*");
        $this->db->from("legistlators");
        if($filter!="all"){
            $this->db->where("chamber ='".$filter."'");
        }
        //$this->db->where("publish=0");
        $this->db->order_by("id", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }
}
?>