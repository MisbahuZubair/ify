<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bills extends CI_Controller {

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

    public function db_test()
    {
        $this->Bill->connection_test();
    }
}
