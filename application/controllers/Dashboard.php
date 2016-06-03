<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->view('Dashboard') ;
        }
    }

    public function Logged_in()
    {
        if ($this->session->userdata('logged_in') != null && $_SESSION['is_admin'] == 1) {
            return 1;}
        else//si n'est pas connecter
            return 0;
    }
    
    
    public function updateProfile(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Client_M') ; 
            $data['profile'] = $this->Client_M->getInf() ;
            $this->load->view('UpdateProfile',$data) ;
        }
        
        
        
    }
    public function miseaJourProfile(){
        $da  =new stdClass() ;
        $this->form_validation->set_rules('mail','', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('password','', 'trim|required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('repassword','', 'trim|required|min_length[4]|max_length[50]|matches[password]');
        if ($this->form_validation->run() == false ){
            $this->updateProfile($da);
        }else{
            $mail = $this->input->post('mail') ;
            $password = $this->input->post('password') ;
                $data = array(
                    'email'=>$mail,
                    'password'=>sha1($password)
                );
                $this->load->model('Client_M') ;
                $this->Client_M->updateprofile($data) ;
                redirect('Dashboard');

            }





        }

    
    
    
    

}