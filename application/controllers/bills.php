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
        //$data['bills'] = $this->bills_Model->getLegistlatorBills(306);         //get bill info through Bill model
        $this->load->model('legistlatorbills_Model');
        $data['legistlator'] = $this->legistlatorbills_Model->getLegistlator($id);
        $this->load->view('legistlator_bills',$data);             //display bill detail in bill detail view
    }
    
    public function tagBills($tag){
      $data['tag'] = $tag;
        $this->load->view('tag_bills',$data);
    }
    
      public function fetch__($tag)
    {
        $output = '';
        $this->load->model('bills_Model');
        $data = $this->bills_Model->fetch_data($this->input->post('limit'), $this->input->post('start'), $tag);
        if($data->num_rows() > 0)
      {
            foreach(array_chunk($data->result(), 2) as $pair) {
                $output .='<div class="row">';
                foreach ($pair as $row)
       {
        $output .= '<div class="col-lg-6"><div class="card" style ="text-align:center;margin-bottom: 20px;"><div class="card-body" style="padding:0"> <img src ="'.site_url('application/uploads/').$row->bill_img.'/> <div class="card-header" style="padding:0"><h5>'.$row->bill_question.'</h5></div><div class="card-header" style="padding:0">'.$row->bill_number.''.$row->bill_title.'</div><a class=" btn btn-success"  href="'.site_url('bills/display/').$row->id.'" role="button">View Details</a></div></div>';
       }
                $output .='</div>';
            }
      }
      echo $output;
    }  
    
    public function fetch_($id)
    {
        $output = '';
        $this->load->model('legistlatorbills_Model');
        $data = $this->legistlatorbills_Model->fetch_data($this->input->post('limit'), $this->input->post('start'), $id);
        if($data->num_rows() > 0)
      {
            foreach(array_chunk($data->result(), 2) as $pair) {
                $output .='<div class="row">';
                foreach ($pair as $row)
       {
        $output .= '<div class="col-lg-6"><div class="card" style ="text-align:center;margin-bottom: 20px;"><div class="card-body" style="padding:0"> <img src ="'.site_url('application/uploads/').$row->bill_img.'/> <div class="card-header" style="padding:0"><h5>'.$row->bill_question.'</h5></div><div class="card-header" style="padding:0">'.$row->bill_number.''.$row->bill_title.'</div><a class=" btn btn-success"  href="'.site_url('bills/display/').$row->id.'" role="button">View Details</a></div></div>';
       }
                $output .='</div>';
            }
      }
      echo $output;
    }
    
    
    public function fetch($source, $filter)
    {
        $output = '';
        $this->load->model('scroll_pagination_model');
        $data = $this->scroll_pagination_model->fetch_data($this->input->post('limit'), $this->input->post('start'), $source, $filter);
        if($data->num_rows() > 0)
      {
            foreach(array_chunk($data->result(), 2) as $pair) {
                $output .='<div class="row">';
                foreach ($pair as $row)
       {
        $tags="";
        if($row->bill_tag1!=""){$tags.="#".$row->bill_tag1." ";}
        if($row->bill_tag2!=""){$tags.="#".$row->bill_tag2." ";}
        if($row->bill_tag3!=""){$tags.="#".$row->bill_tag3." ";}
        
        $status="";
        if($row->bill_status=="Passed"){$status.='Passed <i class="fas fa-check-circle" style="color:green;"></i> on '.$row->bill_thirdreading;}
        else if($row->bill_status=="In consideration"){$status.='In Consideration <i class="fa fa-clock" style="color:orange;"></i>';}
        else if($row->bill_status=="Thrown out"){$status.='Thrown out <i class="fa fa-ban" style="color:red;"></i>';}
                    
        $output .= '<div class="col-lg-6"><div class="nopadding card shadow p-3 mb-5 rounded " style ="text-align:center;margin-bottom: 20px; padding:0px 0px 0px 0px;background-color:#F5FCFB"><div class="card-header" style="padding:0; background:#ffffff"><h5>'.$row->bill_question.'</h5></div><div class="card-body" style="padding:0"> <img src ="'.site_url('application/uploads/').$row->bill_img.'/><div class="card-header" style="padding:0; background-color:#EEFAF9">'.$row->bill_number.', introduced on '.$row->bill_firstreading.'</div><hr/><div>'.$tags.'</div><hr/><div>'.$status.'</div><a class=" btn" style="background:#4ecdc4; color:white" href="'.site_url('bills/display/').$row->id.'" role="button">View Details</a></div></div>';
       }
                $output .='</div>';
            }
      }
      echo $output;
    }

    public function db_test()
    {
        $this->Bill->connection_test();
    }
}
