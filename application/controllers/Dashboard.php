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
    
    
    
    
    
    
    

}