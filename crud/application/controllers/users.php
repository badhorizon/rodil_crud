<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class users extends CI_Controller 
{
	
 
	public function sign_up()
	{
		$data=array();
        $data=$this->input->post();
        if (isset($data) && $data != null){
            $this->load->model('users_model');
            $this->users_model->sign_up($data);
            
        }
        $this->load->view('signup');
	}
		
    public function login()
    {
        $data=array();
        $data=$this->input->post();
        if (isset($data) && $data != null){
            $this->load->model('users_model');
            $return=$this->users_model->login($data['username'],$data['password']);
            if (is_bool($return)){
                echo "login error";
            }
            else{
                $_SESSION['id']=$return[0]['id'];
                $_SESSION['username']=$return[0]['username'];
                redirect('users/show_users');
            }
        }
        $this->load->view('login');
    }

    public function show_users($id = null)
    {
        if (isset($_SESSION['id']) && $_SESSION['id'] !== null){
            if ($id===null){
                $id=$_SESSION['id'];
            }
            $this->load->model('users_model');
            $user=$this->users_model->get_user($id);
            $output['users']=$user[0];
            $this->load->view('show_users', $output);
        }

    }

    public function logout()
    {
        session_destroy();
        redirect(base_url().'users/login');
    }


        public function updateUser($id = null)
        {
            $this->load->model('users_model');
            $user = $this->users_model->get_user($_SESSION['id']);
            $output['user'] = $user[0];
        
        
            $data = array();
            $data = $this->input->post();
        
            if(isset($data) && $data != null){
                $data['id'] = $_SESSION['id'];
                $this->load->model('users_model');
                $this->users_model->updateUser($data);
                redirect('users/show_users');
            }
            $this->load->view('update', $output);
            
        }

        public function delete()
        {
            $this->load->model('users_model');
            $return=$this->users_model->delete_account($_SESSION['id']);
            if($return == true){
                session_unset('id');
                session_unset('username');
                session_destroy();
                redirect('users/login');
            }
        }
    
}
