<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
            if($this->session->userdata('logged')!=TRUE)
        {
            $this->session->set_flashdata("error", "please login first"); 
            redirect("auth/login");  
        }
    }
    
	public function profile()
	{
		$this->load->view('profile');
        echo anchor ('user/logout', 'Logout');
	}
    
    function logout(){
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
