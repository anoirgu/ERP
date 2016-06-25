<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        if($this->Logged_in()==0)
            redirect('Login') ;
        else{

        }
    }

    public function Logged_in()
    {
        if ($this->session->userdata('logged_in') != null && $_SESSION['isSysAdmin'] == 1) {
            return 1;}
        else//si n'est pas connecter
            return 0;
    }

    public function Ajouter(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
         $this->load->view('AjoutAdmin') ;
        }
    }
    public function addAdmin(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $da  =new stdClass() ;
            $this->form_validation->set_rules('username','', 'trim|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('mail','', 'trim|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('password','', 'trim|min_length[4]|max_length[50]');
            if ($this->form_validation->run() == false ){
                $this->Ajouter($da);
            }else {
                $username = $this->input->post('username');
                $mail = $this->input->post('mail');
                $password = $this->input->post('password');
                $data = array(
                    'username'=>$username,
                    'email' => $mail,
                    'password' => sha1($password)
                );
                $this->load->model('Admin_M') ; 
                $this->Admin_M->addAdmin($data) ; 
                redirect('GestionAdmin/Consulter') ;
            }
            
            
        }
    }
    
    
    
    public function Consulter(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Admin_M') ;
            $data['listeadmin'] = $this->Admin_M->getAllAdmin();
            $this->load->view('ListeAdmin', $data) ;
        }
        
 }
    public function ViewInfAdmin($id){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Admin_M') ;
            $data['admininf'] = $this->Admin_M->getAdminById($id) ;
            $data['listebon'] = $this->Admin_M->getBon($id) ;
            $data['listDevis'] = $this->Admin_M->getDevis($id) ; 
            $data['listfacture'] = $this->Admin_M->getFacture($id);
            $this->load->view('ViewInfAdmin',$data) ;
        }
    }
public function delet_Admin($id){
    if($this->Logged_in()==0)
        redirect('Login') ;
    else{
        $this->load->model('Admin_M') ;
        $this->Admin_M->deletAdmin($id) ;
        redirect('GestionAdmin/Consulter');
    }
}





}