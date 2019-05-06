<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bills extends CI_Controller {
        public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $this->output->set_header('Pragma: no-cache');
            $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

	public function index()
	{
        //index is loaded, the js funcion there calls fetch through a model which loads bills on scroll
        $this->load->helper('url');
        $data['page'] = "index";        //get bill info through Bill model
        $data['source'] ="all";
        $data['filter'] = "all";
        $this->load->view('index', $data);                    
	}
    
    public function details($bill_ID="")
    {
        if($bill_ID==""){redirect('', 'refresh');}
        
        try{
            $bill_type = $this->bills_Model->checkSponsor($bill_ID); 
            $data['bill'] = $this->bills_Model->getBill($bill_ID, $bill_type);         //get bill info through Bill model 
        }
        catch(UserException $error){
            redirect('', 'refresh');
        }
            
        $this->load->view('bill_detail',$data);             //display bill detail in bill detail view
    }
    
    public function display($chamber="", $filter="")
    {   
        if($chamber==""){redirect('', 'refresh');}
        $data['page'] = "".$chamber."-".$filter."";         //get bill info through Bill model
        $data['source'] = "".$chamber."";
        $data['filter'] = "".$filter."";
        $this->load->view('index',$data);             //display bill detail in bill detail view
    }
    
    public function legislator($id=""){
        if($id==""){redirect('', 'refresh');}
        $this->load->model('legislators_Model');
        $data['legislator'] = $this->legislators_Model->fetch_Legislator($id);
        $data['page'] = "legislator bills";
        $data['source'] = "legislator bills";
        $data['filter'] = $id;
        $this->load->view('index',$data);             //display bill detail in bill detail view
    }
    
    public function tag($tag=""){
        if($tag==""){redirect('', 'refresh');}
        $tag = urldecode($tag);
        $data['tag'] = $tag;
        $data['page'] = 'tag';
        $data['source'] = "tag";
        $data['filter'] = $tag;
        $this->load->view('index',$data);
    }
    
    function DisplayBill($data){
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
        if($row->bill_status=="Passed"){$status.='<i class="fas fa-check-circle"></i>';}
        else if($row->bill_status=="In consideration"){$status.='<i class="fa fa-clock"></i>';}
        else if($row->bill_status=="Thrown out"){$status.='<i class="fa fa-ban"></i>';}
        
        $theme="house_maintheme";
        if ($row->bill_origin=="Senate"){$theme = "senate_maintheme";}
        
        $date = date_create($row->bill_firstreading);
                    
        $output .= '<div class="col-lg-6 text-center"><div class="nopadding card shadow p-3 mb-5 rounded"><div class="card-header bill-header"><h5>'.$row->bill_question.'</h5></div><div class="card-body nopadding"> <img src ="'.site_url('application/uploads/').$row->bill_img.'"/></div><div class="nopadding">'.$status.' '.$row->bill_number.', introduced on '.date_format($date,"d/m/Y").'<hr class="'.$theme.' hr_billcard"/></div><div class="nopadding">'.$tags.'</div><a class="btn '.$theme.' text-white" href="'.site_url('bills/details/').$row->id.'" role="button">View Details</a></div></div>';
            }
                 $output .='</div>';
            }
        }
        return $output; 
    }
    
      public function BillsByTag($tag)
    {
        $output = '';
        $this->load->model('bills_Model');
        $data = $this->bills_Model->fetch_BillsByTag($this->input->post('limit'), $this->input->post('start'), urldecode($tag));
        $output = $this->DisplayBill($data);
        echo $output;
    }  
    
    public function BillsByLegislator($id)
    {
        $output = '';
        $this->load->model('bills_Model');
        $data = $this->bills_Model->fetch_BillsByLegislator($this->input->post('limit'), $this->input->post('start'), $id);
        $output = $this->DisplayBill($data);
        echo $output;
    }
        
    public function AllBills($source="all", $filter="all")
    {
        $output = '';
        $this->load->model('bills_Model');
        $data = $this->bills_Model->fetch_AllBills($this->input->post('limit'), $this->input->post('start'), $source, $filter);
        $output = $this->DisplayBill($data);
        echo $output;
    }

    public function db_test()
    {
        $this->Bill->connection_test();
    }
}
