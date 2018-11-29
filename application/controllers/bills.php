<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bills extends CI_Controller {

	public function index()
	{
        //index is loaded, the js funcion there calls fetch through a model which loads bills on scroll
        $this->load->helper('url');
        $data['page'] = "index";        //get bill info through Bill model
        $data['source'] ="all";
        $data['filter'] = "all";
        $this->load->view('index', $data);                    
	}
    
    public function display($bill_ID)
    {   
        $data['bill'] = $this->bills_Model->getBill($bill_ID);         //get bill info through Bill model
        $this->load->view('bill_detail',$data);             //display bill detail in bill detail view
    }
    
    public function getBills($chamber, $filter)
    {   
        $data['page'] = "".$chamber."-".$filter."";         //get bill info through Bill model
        $data['source'] = "".$chamber."";
        $data['filter'] = "".$filter."";
        $this->load->view('index',$data);             //display bill detail in bill detail view
    }
    
    public function legistlatorBills($id){
        $this->load->model('legistlatorbills_Model');
        $data['legistlator'] = $this->legistlatorbills_Model->getLegistlator($id);
        $data['page'] = "legistlator bills";
        $data['source'] = "legistlator bills";
        $data['filter'] = $id;
        $this->load->view('index',$data);             //display bill detail in bill detail view
    }
    
    public function tag($tag){
        $tag = urldecode($tag);
        $data['tag'] = $tag;
        $data['page'] = 'tag';
        $data['source'] = "tag";
         $data['filter'] = $tag;
        $this->load->view('index',$data);
    }
    
    function displayBill($data){
        $output="";
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
        if($row->bill_status=="Passed"){$status.='<i class="fas fa-check-circle" style="color:green;"></i> on '.$row->bill_thirdreading;}
        else if($row->bill_status=="In consideration"){$status.='<i class="fa fa-clock" style="color:orange;"></i>';}
        else if($row->bill_status=="Thrown out"){$status.='<i class="fa fa-ban" style="color:red;"></i>';}
                    
        $output .= '<div class="col-lg-6"><div class="nopadding card shadow p-3 mb-5 rounded " style ="text-align:center;margin-bottom: 20px; padding:0px 0px 0px 0px;background-color:"><div class="card-header" style="padding:0; background:#ffffff"><h5>'.$row->bill_question.'</h5></div><div class="card-body" style="padding:0"> <img src ="'.site_url('application/uploads/').$row->bill_img.'/><div class="card-header" style="padding:0; background-color:">'.$status.' '.$row->bill_number.', introduced on '.$row->bill_firstreading.'<hr style="max-width:70%; margin:0 auto;background:#4ecdc4;"/></div><div>'.$tags.'</div><hr/><a class=" btn" style="background:#4ecdc4; color:white" href="'.site_url('bills/display/').$row->id.'" role="button">View Details</a></div></div>';
       }
                 $output .='</div>';
            }
      }
        return $output;
        
    }
    
      public function fetchByTag($tag)
    {
        $output = '';
        $this->load->model('bills_Model');
        $data = $this->bills_Model->fetch_data($this->input->post('limit'), $this->input->post('start'), urldecode($tag));
        $output = $this->displayBill($data);
        echo $output;
    }  
    
    public function fetchByLegistlator($id)
    {
        $output = '';
        $this->load->model('legistlatorbills_Model');
        $data = $this->legistlatorbills_Model->fetch_data($this->input->post('limit'), $this->input->post('start'), $id);
        $output = $this->displayBill($data);
        echo $output;
    }
        
    
    
    public function fetchDefault($source, $filter)
    {
        $output = '';
        $this->load->model('scroll_pagination_model');
        $data = $this->scroll_pagination_model->fetch_data($this->input->post('limit'), $this->input->post('start'), $source, $filter);
        $output = $this->displayBill($data);
        echo $output;
    }

    public function db_test()
    {
        $this->Bill->connection_test();
    }
}
