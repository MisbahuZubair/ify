<?php
class auth extends CI_Controller
{
    public function login()
    {
        $validation = array(
            array('field' => 'username', 'rules' => 'required'),
            array('field' => 'password', 'rules' => 'required'),
        );
        
        $this->form_validation->set_rules($validation);
        if($this->form_validation->run() == true){
            $user_post =$this->input->post('username');
            $pass_post =$this->input->post('password');
            if($this->resolve_user_login($user_post, $pass_post)){
                $id = $this->_get_user_ID_from_username($user_post);
                $name =$this->_get_name_from_username($user_post);
                $create_session = array(
                    'logged' => TRUE,
                    'name' => $username);
                
                
                $this->session->set_userdata($create_session);
                redirect('admin/dashboard');
                
            }
        }
        
        $this->load->view('login');
    }
     private function  resolve_user_login($username, $password){
        $this->db->where('username', $username);
        $pass = $this->db->get('users')->row('pwd');
        if($pass == $password)return true;
        else return false;
    }
    
    /*private function  resolve_user_login($username, $password){
        $this->db->where('username', $username);
        $hash = $this->db->get('users')->row('pwd');
        return $this->verify_password_hash($password,$hash);
    }*/
    
    private function _get_user_ID_from_username($username){
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username', $username);
        return $this->db->get()->row('id');
    }
    
     private function _get_name_from_username($username){
        $this->db->select('firstname');
        $this->db->from('users');
        $this->db->where('username', $username);
        return $this->db->get()->row('firstname');
    }
    
    private function verify_password_hash($password, $hash){
        return password_verify($password, $hash);
    }
    
    public function register()
    {
        if (isset($_POST['register'])){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password', 'Confirm Password', 'required|min_length[5]|matches[password]');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('lga', 'LGA', 'required');
            
            if($this->form_validation->run() ==TRUE){
                echo 'form validated';
                
                $data =array(
                    'username' => $_POST['username'],
                    'pwd' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                    'email' => $_POST['email'],
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'state' => $_POST['state'],
                    'lga' => $_POST['lga'],
                    //'datecreated' => $_POST['datecreated'],
                    'gender' => $_POST['gender']
                );
                
                $this->db->insert('users',$data);
                    $this->session->set_flashdata("success", "Your account has been registered.You can login now");
                redirect("auth/register", "refresh");
            }
        }
        $this->load->view('register');
    }
    
    public function logout(){
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->sess_destroy();
        redirect('bills');
    }
}
?>