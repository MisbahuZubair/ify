<?php
class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        
        if($this->form_validation->run() ==TRUE){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('pwd', $password);
        $query = $this->db->get('users');
        $num = $query->num_rows();
        if($query->num_rows == 1)
        {
          $row = $query->row();
            $this->session->set_flashdata("success", "You are logged in");
                
                $_SESSION['user_logged']= TRUE;
                $_SESSION['username']=$user->username;
                
               redirect("user/profile", "refresh"); 
            } else {
            $this->session->set_flashdata("error", "No such account exists") ; 
            }
            }
        $this->load->view('login');
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
                    'pwd' => md5($_POST['password']),
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
}
 
?>