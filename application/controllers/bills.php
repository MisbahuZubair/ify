<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bills extends CI_Controller {

	public function index()
	{
        $this->load->helper('url');
		$data['bills'] = $this->bills_Model->allBills();             //get all bills from db
        $this->load->view('index', $data);                    //display in index view
	}
    
    public function display($bill_ID)
    {   
        $data['bill'] = $this->bills_Model->getBill($bill_ID);         //get bill info through Bill model
        $this->load->view('bill_detail',$data);             //display bill detail in bill detail view
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
        $output .= '<div class="col-lg-6"><div class="card" style ="text-align:center;margin-bottom: 20px;"><div class="card-body" style="padding:0"> <img src ="'.site_url('application/uploads/').$row->bill_img.'/> <div class="card-header" style="padding:0"><h5>'.$row->bill_question.'</h5></div><div class="card-header" style="padding:0">'.$row->bill_number.''.$row->bill_title.'</div><a class=" btn btn-success"  href="'.site_url('bills/display/').$row->id.'" role="button">View Details</a></div></div>';
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