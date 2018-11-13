<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bills extends CI_Controller {

	public function index()
	{
        //index is loaded, the js funcion there calls fetch through a model which loads bills on scroll
        $this->load->helper('url');
        $this->load->view('index');                    
	}
        
    public function display($bill_ID)
    {   
        $data['bill'] = $this->bills_Model->getBill($bill_ID);         //get bill info through Bill model
        $this->load->view('bill_detail',$data);             //display bill detail in bill detail view
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
    
    
    public function fetch()
    {
        $output = '';
        $this->load->model('scroll_pagination_model');
        $data = $this->scroll_pagination_model->fetch_data($this->input->post('limit'), $this->input->post('start'));
        if($data->num_rows() > 0)
      {
            foreach(array_chunk($data->result(), 2) as $pair) {
                $output .='<div class="row">';
                foreach ($pair as $row)
       {
        $output .= '<div class="col-lg-6"><div class="nopadding card shadow p-3 mb-5 bg-white rounded " style ="text-align:center;margin-bottom: 20px; padding:0px 0px 0px 0px;"><div class="card-header" style="padding:0; background:#ffffff"><h5>'.$row->bill_question.'</h5></div><div class="card-body" style="padding:0"> <img src ="'.site_url('application/uploads/').$row->bill_img.'/><div class="card-header" style="padding:0"><div class="row"><div class ="col-md-auto">'.$row->bill_number.'</div><div class ="col">#'.$row->bill_tag1.' #'.$row->bill_tag2.' #'.$row->bill_tag3.'</div><div class ="col-md-auto float-right"><i class="fa fa-ban" style="color:red;"></i></div></div></div><a class=" btn" style="background:#4ecdc4; color:white" href="'.site_url('bills/display/').$row->id.'" role="button">View Details</a></div></div>';
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
