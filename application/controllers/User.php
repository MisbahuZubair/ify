<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_logged']))
        {
            $this->session->set_flashdata("error", "please login first"); 
            redirect("auth/login");  
        }
    }
	public function profile()
	{
		$this->load->view('profile');
	}
}
