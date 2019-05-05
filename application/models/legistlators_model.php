<?php
class legistlators_Model extends CI_Model
{
    public function fetch_Legistlator($id)
    {
        $this->db->select("*");
        $this->db->from("legistlators");
        $this->db->where("id=".$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function fetch_AllLegistlators($limit, $start, $filter)
    {
        $this->db->select("*");
        $this->db->from("legistlators");
        if($filter!="all"){
            $this->db->where("chamber ='".$filter."'");
        }
        $this->db->where("term ='9th National Assembly (2019 - 2023)'");
        $this->db->order_by("id", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }
}
?>