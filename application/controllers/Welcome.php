<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->helper('url');
		$data['bills'] = $this->Bill->allBills();
        $this->load->view('home', $data);
        
	}
    
    public function show($id)
    {   
        $data['bill'] = $this->Bill->get($id);
        $data['comments'] =$this->Bill->get_comments('Bill_'.$id.'_Comments');
        if ($this->session->userdata('logged')==TRUE)
        {
            $data['user_id'] = $this->session->userdata('id');
            $this->load->helper('form');
        if($_POST)
        {
                    
            $comment = $this->input->post('comment');
            
            $new_data['comment'] = $comment;
            
            
            $this->Bill->addComment($new_data, $id);
            
        }
        }
        
        //add user detail, votes and comments
        $this->load->view('billDetail',$data);
    }

    

    /*public function edit($id)
    {   
        if($_POST)
        {
            //$bill_id = $this->input->post('billID');
            $bill_title = $this->input->post('billTitle');
            $bill_sponsor= $this->input->post('billSponsor');
            
            //$new_data['bill_id'] = $bill_id;
            $new_data['bill_title'] = $bill_title;
            $new_data['bill_sponsor'] = $bill_sponsor;
            
            $this->Bill->update($id, $new_data);
            
        }
        $data['bill'] = $this->Bill->get($id);
        $this->load->view('editBill',$data);
    }*/
    
    public function db_test()
    {
        $this->Bill->connection_test();
    }
}
