<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged')!=TRUE)                        //checks if user is logged in
        {
            $this->session->set_flashdata("error", "please login first"); 
            redirect("admin/auth/login");    
        }
    }
    public function index()
	{
        $this->load->helper('url');
		$data['page'] = 'manage_bills';
        $this->load->view('admin/dashboard', $data); 
	}
    
     public function fetchbills()
	{
        $output = '';
        $this->load->model('scroll_pagination_model');
        $data = $this->scroll_pagination_model->fetch_data($this->input->post('limit'), $this->input->post('start'), 'all', 'all');
        if($data->num_rows() > 0)
      {
            foreach(array_chunk($data->result(), 2) as $pair) {
                $output .='<div class="row">';
                foreach ($pair as $row)
       {
         $tags="";
        if($row->bill_tag1!=""){$tags.="<a href='".site_url('bills/tag/'.$row->bill_tag1)."'>#".$row->bill_tag1."</a> ";}
        if($row->bill_tag2!=""){$tags.="<a href='".site_url('bills/tag/'.$row->bill_tag2)."'>#".$row->bill_tag2."</a> ";}
        if($row->bill_tag3!=""){$tags.="<a href='".site_url('bills/tag/'.$row->bill_tag3)."'>#".$row->bill_tag3."</a> ";}
        
        $status="";
        if($row->bill_status=="Passed"){$status.='Passed <i class="fas fa-check-circle" style="color:green;"></i> on '.$row->bill_thirdreading;}
        else if($row->bill_status=="In consideration"){$status.='In Consideration <i class="fa fa-clock" style="color:orange;"></i>';}
        else if($row->bill_status=="Thrown out"){$status.='Thrown out <i class="fa fa-ban" style="color:red;"></i>';}
                    
        $output .= '<div class="col-lg-6"><div class="nopadding card shadow p-3 mb-5 rounded " style ="text-align:center;margin-bottom: 20px; padding:0px 0px 0px 0px;"><div class="card-header" style="padding:0; background:#ffffff"><h5>'.$row->bill_question.'</h5></div><div class="card-body" style="padding:0"> <img src ="'.site_url('application/uploads/').$row->bill_img.'/><div class="card-header" style="padding:0;">'.$row->bill_number.', introduced on '.$row->bill_firstreading.'</div><hr/><div>'.$tags.'</div><hr/><div>'.$status.'</div><hr/><div class="row btn-group"><div class="col-sm-3"><a class=" btn bg-secondary " style="color:white" href="'.site_url('bills/display/').$row->id.'" role="button">View</a></div><div class="col-sm-3"><a class="btn bg-info" style=" color:white" href="'.site_url('admin/dashboard/editBill/').$row->id.'" role="button">Edit</a></div><div class="col-sm-3"><a class="btn bg-danger" style="color:white" href="'.site_url('admin/dashboard/deleteBill/').$row->id.'" role="button">Delete</a></div><div class="col-sm-3"><a class="btn bg-success" style=" color:white" href="'.site_url('admin/dashboard/publishBill/').$row->id.'" role="button">Publish</a></div></div></div></div>';
       }
                 $output .='</div>';
            }
      }
        echo $output;
    }
    
    public function deleteBill($id, $name){
        $this->dashboard_Model->delete($id, $name);
    }
    
    public function publishBill($id, $initial){
        if($initial == 1){$new_data['publish'] =0;} else {$new_data['publish'] =1;}
        $this->dashboard_Model->update($id, $new_data);
    }
    
    public function deleteLegistlator($id){
        $this->dashboard_Model->deleteLegistlator($id);
    }
    
    public function addLegistlator(){
        $this->load->helper('url');
        $this->load->helper('form');
        if($_POST)
        {        
            $new_data['name'] = $this->input->post('name');
            $new_data['chamber'] = $this->input->post('chamber');
            $new_data['party']= $this->input->post('party');
            $new_data['state']= ($this->input->post('state'));
            $new_data['constituency']= ($this->input->post('constituency'));
            $new_data['active']= $this->input->post('active');
             
            $this->dashboard_Model->addLegistlator($new_data);       
        }
        $this->load->view('admin/add_legistlator');
    }
    
    public function addBill()
    {
        $this->load->helper('form');
        if($_POST)
        {
            $img_name = "bill".time();
            $image = FALSE;
            if($_FILES)
            {
                $image = $this->do_upload($img_name);
            }
            
            $new_data['bill_number'] = $this->input->post('billNumber');
            $new_data['bill_imagename'] = $img_name;
            $new_data['bill_title'] = $this->input->post('billTitle');
            $new_data['bill_sponsor']= $this->input->post('billSponsor');
            $new_data['bill_summary']= $this->input->post('billSummary');
            $new_data['bill_additionalinfo']= $this->input->post('billAdditionalinfo');
            $new_data['bill_origin']= $this->input->post('origin');
            $new_data['bill_sponsor'] = $this->input->post('billSponsor');
            $new_data['bill_fulltext'] = $this->input->post('billFulltext');
            $new_data['bill_impact'] = $this->input->post('billImpact');
            $new_data['bill_topic1'] = $this->input->post('billTopic1');
            $new_data['bill_topic2'] = $this->input->post('billTopic2');
            $new_data['bill_topic3'] = $this->input->post('billTopic3');
            $new_data['bill_news'] = $this->input->post('billNews');
            $new_data['bill_status'] = $this->input->post('billStatus');
            $new_data['bill_firstreading'] = $this->input->post('billFirstreading');
            $new_data['bill_secondreading'] = $this->input->post('billSecondreading');
            $new_data['bill_thirdreading'] = $this->input->post('billThirdreading');
            $new_data['bill_committeereport'] = $this->input->post('billReportoutofcommittee');
            $new_data['bill_committee'] = $this->input->post('billCommittee');
            $new_data['bill_remarks'] = $this->input->post('billRemarks');
            $new_data['bill_question'] = $this->input->post('billQuestion');
            
            if($image)
            {
                $new_data['bill_img'] = $image;
            }
            
            $this->Dashboard_Model->add($new_data);
            
        }
$data['committees'] = $this->Dashboard_Model->getCommittees(); 
        $data['legistlators'] = $this->Dashboard_Model->getLegistlators(); 
        $this->load->view('admin/add_bill', $data);
    }
    
    public function show($id)
    {   
        $data['id'] = $id;
        $this->load->view('show',$data);
    }
    
    public function manageLegistlators(){
        $this->load->helper('url');
		$data['legistlators'] = $this->dashboard_Model->allLegistlators();
        $this->load->view('admin/manage_legistlators', $data);
    }
    
    public function editLegistlator($id){
        $this->load->helper('url');
        $this->load->helper('form');
         if($_POST)
        {        
            
            $new_data['name'] = $this->input->post('name');
            $new_data['chamber'] = $this->input->post('chamber');
            $new_data['party']= $this->input->post('party');
            $new_data['state']= ($this->input->post('state'));
            $new_data['constituency']= ($this->input->post('constituency'));
            $new_data['active']= $this->input->post('active');
             
            $this->dashboard_Model->updateLegistlator($id, $new_data);       
        }
        
        $data['legistlator'] = $this->dashboard_Model->editLegistlator($id);
        $this->load->view('admin/add_legistlator',$data);
    }
    
    public function editBill($id)
    {   
        $this->load->helper('form');
        if($_POST)
        {
            if($_FILES['billimage']['name']=='')
            {
                
            }
            else{
                 $image = FALSE;
                if($_FILES)
                {
                    $image = $this->do_upload($this->input->post('billImagename'));
                }
                 
                if($image)
                {
                    $new_data['bill_img'] = $image;
                }
            }
           
            
            $new_data['bill_number'] = $this->input->post('billNumber');
            $new_data['bill_title'] = $this->input->post('billTitle');
            $new_data['bill_sponsor']= $this->input->post('billSponsor');
            $new_data['bill_summary']= trim($this->input->post('billSummary'));
            $new_data['bill_additionalinfo']= trim($this->input->post('billAdditionalinfo'));
            $new_data['bill_origin']= $this->input->post('origin');
            $new_data['bill_sponsor'] = $this->input->post('billSponsor');
            $new_data['bill_fulltext'] = $this->input->post('billFulltext');
            $new_data['bill_impact'] = $this->input->post('billImpact');
            $new_data['bill_topic1'] = $this->input->post('billTopic1');
            $new_data['bill_topic2'] = $this->input->post('billTopic2');
            $new_data['bill_topic3'] = $this->input->post('billTopic3');
            $new_data['bill_news'] = $this->input->post('billNews');
            $new_data['bill_status'] = $this->input->post('billStatus');
            $new_data['bill_firstreading'] = $this->input->post('billFirstreading');
            $new_data['bill_secondreading'] = $this->input->post('billSecondreading');
            $new_data['bill_thirdreading'] = $this->input->post('billThirdreading');
            $new_data['bill_committeereport'] = $this->input->post('billReportoutofcommittee');
            $new_data['bill_committee'] = $this->input->post('billCommittee');
            $new_data['bill_remarks'] = $this->input->post('billRemarks');
            $new_data['bill_question'] = $this->input->post('billQuestion');
            
            $this->Dashboard_Model->update($id, $new_data);       
        }
        
        $data['bill'] = $this->bills_Model->getBill($id);
        $data['committees'] = $this->dashboard_Model->getCommittees();
        $data['legistlators'] = $this->dashboard_Model->getLegistlators();
        $this->load->view('admin/edit_bill',$data);
    }
    
    public function do_upload($name)
    {
        $config['upload_path'] = './application/uploads/';
        $config['allowed_types'] ='gif|jpg|png';
        $config['file_name'] = $name;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('billimage');
        $data = $this->upload->data();
        return $data['file_name']; 
    }
    
    public function db_test()
    {
        $this->Bill->connection_test();
    }
}
