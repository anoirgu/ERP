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
            $data['setting'] = $this->Ent_Seting_M->get_configuration() ;
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
    
    
    public function set_Setting(){
          $da  = new stdClass() ;
        $this->form_validation->set_rules('EntName','', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('FormJuridique','', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('RaisSocial','', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('Adresse','', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('CodePostal','', 'trim|min_length[3]|max_length[50]|numeric');
        $this->form_validation->set_rules('Ville','', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('NtvaIntra','', 'trim|min_length[3]|max_length[50]|numeric');
        $this->form_validation->set_rules('CodeApe','', 'trim|min_length[3]|max_length[50]|numeric');
        $this->form_validation->set_rules('RCS','', 'trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('NSiret','', 'trim|min_length[1]|max_length[35]|numeric');
        $this->form_validation->set_rules('NtelephFixe','', 'trim|min_length[3]|max_length[50]|numeric');
        $this->form_validation->set_rules('NumeroMobile','', 'trim|min_length[3]|max_length[50]|numeric');
        $this->form_validation->set_rules('NumFax','', 'trim|min_length[3]|max_length[50]|numeric');
        $this->form_validation->set_rules('Adrmail','', 'trim|min_length[3]|max_length[50]');
        $config =  array(
            'upload_path'     => "./uploads/",
            'allowed_types'   => "gif|jpg|png|jpeg|pdf",
            'overwrite'       => TRUE,
            'max_size'        => "2048000",  // Can be set to particular file size
            'max_height'      => "768",
            'max_width'       => "1024"
        );
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false || ! $this->upload->do_upload() ){
           $da->error = $this->upload->display_errors() ;
            $this->index($da) ;
        }else{
            $finfo=$this->upload->data();
            $EntName = $this->input->post('EntName') ;
            $FormJuridique = $this->input->post('FormJuridique') ;
            $RaisSocial = $this->input->post('RaisSocial') ;
            $Adresse = $this->input->post('Adresse') ;
            $CodePostal = $this->input->post('CodePostal') ;
            $Ville = $this->input->post('Ville') ;
            $NtvaIntra = $this->input->post('NtvaIntra') ;
            $CodeApe= $this->input->post('CodeApe') ;
            $RCS = $this->input->post('RCS') ;
            $NSiret = $this->input->post('NSiret') ;
            $NtelephFixe = $this->input->post('NtelephFixe') ;
            $NumeroMobile = $this->input->post('NumeroMobile') ;
            $NumFax = $this->input->post('NumFax') ;
            $Adrmail = $this->input->post('Adrmail');
            $datat=  array(
                'nom'=>$EntName ,
                'form_juridique'=>$FormJuridique,
                'raison_social'=>$RaisSocial ,
                'adresse'=>$Adresse,
                'code_postal'=>$CodePostal,
                'ville'=>$Ville,
                'n_tva_intra'=>$NtvaIntra,
                'code_ape'=>$CodeApe,
                'rcs'=>$RCS ,
                'n_siret'=>$NSiret,
                'n_tel_fix'=>$NtelephFixe,
                'n_tel_mobil'=>$NumeroMobile,
                'n_fax'=>$NumFax,
                'email'=>$Adrmail,
                'logo'=>$finfo['file_name']
            );
            $this->load->model('Ent_Seting_M') ;
            $array = $this->Ent_Seting_M->get_configuration();
            if(empty($array)) {
                $this->Ent_Seting_M->add_configuration($datat) ;
                redirect('EntrepriseSetting') ;
                }else {
                $this->Ent_Seting_M->update_configuration($datat) ;
                redirect('EntrepriseSetting') ;
            }




        }


       
        
        
        
        
        
        
    }
    
    






}