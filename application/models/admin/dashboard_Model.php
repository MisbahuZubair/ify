<?php
class dashboard_Model extends CI_Model
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
        $this->db->order_by("id", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }
    
    public function delete($id, $picFileName){
        unlink('./application/uploads/'.$picFileName);
        $sql = "DELETE from bills 
                WHERE bills.id=".$id."";
        $query = $this->db->query($sql);
        echo "<script>console.log('model')</script>";
    }
    
    public function deleteLegistlator($id){
        $sql = "SELECT *
        FROM bills
        WHERE bill_sponsor = ".$id."";
        $query = $this->db->query($sql)->row_array();
        if(empty($query)){
            $sql = "DELETE from legistlators 
             WHERE id=".$id."";
            $query = $this->db->query($sql);
            return true;
        }        
        else{
            return false;
        }
    }
    
     public function getLegistlator($bill_ID)
    {
        
        $sql= "SELECT * FROM legistlators";
         
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    public function getLegistlators() { 
         $sql = "SELECT id, name 
           FROM legistlators 
           ORDER by name";
        $query = $this->db->query($sql)->result_array(); 
        return $query; 
    } 
    
    public function getTermLegistlators($term,$chamber) { 
         $sql = "SELECT id, name 
           FROM legistlators
           WHERE FIND_IN_SET('".$term."',term)>0
           AND chamber ='".$chamber."'";
           //ORDER by name";
        $query = $this->db->query($sql)->result_array(); 
        return $query; 
    } 
    
    public function getStates() { 
         $sql = "SELECT state 
           FROM constituencies";
           //ORDER by name";
        $query = $this->db->query($sql)->result_array(); 
        return $query; 
    } 
    
    public function getCons($state, $chamber_cons) { 
         $sql = "SELECT *
           FROM constituencies
           WHERE state= '".$state."'";
           //ORDER by name";
        
        $result = $this->db->query($sql)->row_array();
        $myString = $result[$chamber_cons];
        $myArray = explode(',', $myString);
        sort($myArray);
        print_r($myArray);
        return $myArray;
    } 

    public function getFromInfo($column) { 
        $this->db->select("*");
        $this->db->from("info");
        $this->db->where(['id=0']);
        
        $result = $this->db->get()->row_array();
        $myString = $result[$column];
        $myArray = explode(',', $myString);
        print_r($myArray);
        return $myArray;
    } 
    
    public function editLegistlator($id) { 
         $sql = "SELECT * 
           FROM legistlators
           WHERE id =".$id."
           ORDER by name";
    $query = $this->db->query($sql)->row_array(); ;
        return $query; 
    }
    
    public function updateLegistlator($id, $new_data) { 
        $this->db->where(['id' => $id]);
        $this->db->update('legistlators', $new_data);
        echo "<script>alert('Legistlator data updated');</script>";
        //redirect('/admin/dashboard/manageLegistlators', 'refresh');
    }
     
    public function addLegistlator($new_data)
    {
        $this->db->insert('legistlators', $new_data);
        echo "<script>alert('Legistlator created');</script>";
        redirect('/admin/dashboard/manageLegistlators', 'refresh'); 
    }
    
    public function getSenateCommittees() { 
         $sql = "SELECT id, com_name 
           FROM committees
           WHERE chamber = 'senate'
           ORDER by com_name";
    $query = $this->db->query($sql)->result_array(); ;
        return $query; 
    }
    
    public function getHouseCommittees() { 
         $sql = "SELECT id, com_name 
           FROM committees
           WHERE chamber = 'house'
           ORDER by com_name";
    $query = $this->db->query($sql)->result_array(); ;
        return $query; 
    }
    
    public function getInfo() { 
        $this->db->select('assemblies');
        $this->db->where(['id' => 0]);
        $query = $this->db->get('info');
        //return $query->result_array();
        $result = $query->row_array();
        
        $myString = $result['assemblies'];
    
        $myArray = explode(',', $myString);
        return array_reverse($myArray);
    }
    
    public function getCommittees() { 
        $sql = "SELECT id, com_name 
           FROM committees
           ORDER by com_name";
        $query = $this->db->query($sql)->result_array(); ;
        return $query; 
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
        echo "<script>alert('Bill updated');</script>";
        //redirect('/admin/dashboard', 'refresh');
    }
    
     public function publishBill($id,$new_data)
    {     
        if ($this->ion_auth->in_group("admin")||$this->ion_auth->in_group("data")){
        $this->db->where(['id' => $id]);
        $this->db->update('bills', $new_data);
        redirect('/admin/dashboard', 'refresh');
    }
          else{
              redirect('/admin/dashboard', 'refresh');
               return false;
            }
    }
    
    
     public function add($new_data)
    {
        $this->db->insert('bills', $new_data);
        //echo "<script>alert('Bill created');</script>";
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
    
    public function allLegistlators()
    {
        $this->db->get('legistlators');
        $this->db->order_by("state", "ASC");
        $result_set =$this->db->get('legistlators');
        return $result_set->result_array(); 
    }
}?>