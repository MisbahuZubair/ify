<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function index()
	{
        $this->load->helper('url');
		$data['bills'] = $this->Manage_Bill->allBills();
        $this->load->view('ahrammomi/Admin_View', $data); 
	}
    
    public function addBill()
    {
        $this->load->helper('form');
        if($_POST)
        {
            $image = FALSE;
            if($_FILES)
            {
                $image = $this->do_upload();
            }
            
            $bill_number = $this->input->post('billNumber');
            $bill_title = $this->input->post('billTitle');
            $bill_sponsor= $this->input->post('billSponsor');
            $bill_summary= $this->input->post('billSummary');
            $bill_facts= $this->input->post('billfacts');
            
            $new_data['bill_number'] = $bill_number;
            $new_data['bill_title'] = $bill_title;
            $new_data['bill_sponsor'] = $bill_sponsor;
            $new_data['bill_summary'] = $bill_summary;
            $new_data['bill_facts'] = $bill_facts;
            
            if($image)
            {
                $new_data['bill_img'] = $image;
            }
            
            $this->Manage_Bill->add($new_data);
            
        }
        $this->load->view('ahrammomi/Add_Bill');
    }
    
    public function show($id)
    {   
        $data['id'] = $id;
        $this->load->view('show',$data);
    }
    
    public function editBill($id)
    {   
        $this->load->helper('form');
        if($_POST)
        {
             $image = FALSE;
            if($_FILES)
            {
                $image = $this->do_upload();
            }
            
            $bill_number = $this->input->post('billNumber');
            $bill_title = $this->input->post('billTitle');
            $bill_sponsor= $this->input->post('billSponsor');
            $bill_summary= $this->input->post('billSummary');
            $bill_facts= $this->input->post('billfacts');
            
            $new_data['bill_number'] = $bill_number;
            $new_data['bill_title'] = $bill_title;
            $new_data['bill_sponsor'] = $bill_sponsor;
            $new_data['bill_summary'] = $bill_summary;
            $new_data['bill_facts'] = $bill_facts;
            
            if($image)
            {
                $new_data['bill_img'] = $image;
            }
            
            $this->Manage_Bill->update($id, $new_data);
            
        }
        $data['bill'] = $this->Bill->get($id);
        $this->load->view('editBill',$data);
    }
    
    public function do_upload()
    {
        $config['upload_path'] = './application/uploads/';
        $config['allowed_types'] ='gif|jpg|png';
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
