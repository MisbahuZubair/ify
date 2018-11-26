<?php
class Dashboard_Model extends CI_Model
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
    
    public function deleteLegistlator($id){
        $sql = "SELECT *
           FROM bills
           WHERE bill_sponsor = ".$id."";
        $query = $this->db->query($sql)->row_array();
        if(empty($query)){
            $sql = "DELETE from legistlators 
                WHERE id=".$id."";
            $query = $this->db->query($sql);
            echo '<script language="javascript">';
            echo 'alert("Successfully deleted")';
            echo '</script>';
        }        
        else{
            echo '<script language="javascript">';
            echo 'alert("Cannot delete a legistlator attached as a sponsor to at least one bill")';
            echo '</script>';
        }
        redirect('/admin/dashboard/manageLegistlators', 'refresh');
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
    
    public function getTermLegistlators($term) { 
         $sql = "SELECT id, name 
           FROM legistlators
           WHERE term ='".$term."'";
           //ORDER by name";
        $query = $this->db->query($sql)->result_array(); 
        return $query; 
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
        //redirect('/admin/dashboard/manageLegistlators', 'refresh');
    }
        
    public function addLegistlator($new_data)
    {
       $this->db->insert('legistlators', $new_data);
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
        redirect('/admin/dashboard', 'refresh');
    }
    
     public function publishBill($id,$inital)
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
    
    public function allLegistlators()
    {
        $result_set =$this->db->get('legistlators');
        return $result_set->result_array(); 
    }
}