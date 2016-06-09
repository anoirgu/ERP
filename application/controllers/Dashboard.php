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
            $this->load->model('Client_M');
            $this->load->model('Product_M') ;
            $data['numberClient'] = $this->Client_M->count_client();
            $data['numberFourni'] = $this->Product_M->count_Fournisseur() ; 
            $data['numberProduit'] = $this->Product_M->count_Produit() ;
            $this->load->view('Dashboard',$data) ;
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
        $this->form_validation->set_rules('mail','', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('password','', 'trim|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('repassword','', 'trim|min_length[4]|max_length[50]|matches[password]');
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

    public function Setting(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Setting_M') ;
            $data['setting'] = $this->Setting_M->get_Setting() ;
            $this->load->view('Setting' , $data) ;
        }

    }
    public function Setsetting(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $da  =new stdClass() ;
            $this->form_validation->set_rules('piedpagedevis','', 'trim|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('piedpagefacture','', 'trim|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('defaulttva','', 'trim|min_length[1]|max_length[50]|numeric');
            $this->form_validation->set_rules('defaulttaxe','', 'trim|min_length[1]|max_length[50]|numeric');
            $this->form_validation->set_rules('fraisport','', 'trim|min_length[1]|max_length[50]|numeric');
            if ($this->form_validation->run() == false ){
                $this->Setting($da);
            }else{
                $piedpagedevis = $this->input->post('piedpagedevis') ;
                $piedpagefacture = $this->input->post('piedpagefacture') ;
                $defaulttva= $this->input->post('defaulttva') ;
                $defaulttaxe = $this->input->post('defaulttaxe') ;
                $fraisport = $this->input->post('fraisport') ;
                $data= array(
                    'pieddevis'=>$piedpagedevis,
                    'piedfacture'=>$piedpagefacture,
                    'defaulttva'=>$defaulttva,
                    'defaulttax'=>$defaulttaxe,
                    'fraisport'=>$fraisport
                );
                $this->load->model('Setting_M') ;
                $res = $this->Setting_M->get_Setting() ;
                if(empty($res)){
                    $this->Setting_M->add_Setting($data) ;

                }else{
                    $this->Setting_M->update_Setting($data) ;
                }
                redirect('Dashboard'); 





            }
















        }
        
        
        
        
    }

    
    
    
    

}