<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  EntrepriseSetting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Ent_Seting_M') ;
            $data['setting'] = $this->Ent_Sting_M->get_configuration() ; 
            $this->load->view('Entrepise_Seting' , $data);
        }
    }

    public function Logged_in()
    {
        if ($this->session->userdata('logged_in') != null && $_SESSION['is_admin'] == 1) {
            return 1;}
        else//si n'est pas connecter
            return 0;
    }






}