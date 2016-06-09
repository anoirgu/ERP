<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class GestionClient extends CI_Controller {

     public function __construct()
     {
         parent::__construct();
     }

     public function index(){

         if($this->Logged_in()==0)
             redirect('Login') ;
         else {
             redirect('Dashboard') ;
         }
     }

     public function Logged_in()
     {
         if ($this->session->userdata('logged_in') != null && $_SESSION['is_admin'] == 1) {
             return 1;}
         else//si n'est pas connecter
             return 0;
     }
     
      public function Ajouter(){
          if($this->Logged_in()==0)
              redirect('Login') ;
          else {
              $this->load->view('Ajouter_Client') ;
          }

          
      }
     public function Consulter()
     {
         if ($this->Logged_in() == 0)
             redirect('Login');
         else {
             $this->load->model('Client_M');
             $data['emplist'] = $this->Client_M->getallclient() ;
             $this->load->view('Consulter_Client' , $data);
         }
     }
     
         public function add_Client(){
             if ($this->Logged_in() == 0)
                 redirect('Login');
             else {
                 $da = new stdClass() ;
                 $this->form_validation->set_rules('nom','', 'trim|min_length[3]|max_length[50]');
                 $this->form_validation->set_rules('prenom','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('email','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('phone','', 'trim|min_length[1]|max_length[50]|numeric');
                 $this->form_validation->set_rules('phoneMobile','', 'trim|min_length[1]|max_length[50]|numeric');
                 $this->form_validation->set_rules('fax','', 'trim|min_length[1]|max_length[50]|numeric');
                 $this->form_validation->set_rules('adress','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('pays','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('ville','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('codePostal','', 'trim|min_length[1]|max_length[50]|numeric');
                 $this->form_validation->set_rules('activite','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('ape','', 'trim|min_length[1]|max_length[50]|numeric');
                 $this->form_validation->set_rules('raisonsocial','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('adresselivraison','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('paysl','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('villel','', 'trim|min_length[1]|max_length[50]');
                 $this->form_validation->set_rules('codepostall','', 'trim|min_length[1]|max_length[50]');
                 if ($this->form_validation->run() == false ){
                     $this->Ajouter($da);
                 }else{
                     $statut = $this->input->post('statut') ;
                     $civilite = $this->input->post('civilite') ;
                     $nom = $this->input->post('nom');
                     $prenom = $this->input->post('prenom') ;
                     $email = $this->input->post('email') ;
                     $phone = $this->input->post('phone') ;
                     $phonemobile  = $this->input->post('phoneMobile') ;
                     $fax = $this->input->post('fax');
                     $adresse = $this->input->post('adress') ;
                     $pays = $this->input->post('pays') ;
                     $ville = $this->input->post('ville');
                     $codepostal = $this->input->post('codePostal') ;
                     $activite = $this->input->post('activite') ;
                     $ape = $this->input->post('ape') ;
                     $raisonsocial  = $this->input->post('raisonsocial') ;
                     $adrlivraison = $this->input->post('adresselivraison' ) ;
                     $paysl = $this->input->post('paysl')  ;
                     $villel = $this->input->post('villel') ;
                     $codepostall = $this->input->post('codepostall') ;
                     $data  = array(
                         'statut'=>$statut,
                         'civilite'=>$civilite,
                         'nom'=>$nom,
                         'prenom'=>$prenom,
                         'adresse'=>$adresse,
                         'code_postal'=>$codepostal,
                         'ville'=>$ville,
                         'pays'=>$pays,
                         'telephone'=>$phone,
                         'mobile'=>$phonemobile,
                         'fax'=>$fax,
                         'email'=>$email,
                         'activite'=>$activite,
                         'code_ape'=>$ape,
                         'raisonsocial'=>$raisonsocial

                     );
                     $this->load->model('Client_M') ;
                     $id = $this->Client_M->add_client($data);

                     $dat2 =array(
                         'adresse'=>$adrlivraison,
                         'code_postal'=>$codepostall,
                         'ville'=>$villel,
                         'pays'=>$paysl,
                         'id_client'=>$id
                     );
                     $this->Client_M->insertadresse($dat2) ;
                      redirect('GestionClient/Consulter') ;
                 }
             }
             
             
             
             
             
         }


         public function  update_client($id){
             if ($this->Logged_in() == 0)
                 redirect('Login');
             else {
                 $_SESSION['idclient'] = $id ;
                 $this->load->model('Client_M') ;
                 $data['client'] = $this->Client_M->getCientId($id) ;
                 $data['livraison'] = $this->Client_M->getadrreLivr($id) ; 
                 $this->load->view('UpdateClient' ,$data) ;
             }
         }

          public function  updateClient(){
              if ($this->Logged_in() == 0)
                  redirect('Login');
              else {
                  $da = new stdClass();
                  $this->form_validation->set_rules('nom', '', 'trim|min_length[3]|max_length[50]');
                  $this->form_validation->set_rules('prenom', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('email', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('phone', '', 'trim|min_length[1]|max_length[50]|numeric');
                  $this->form_validation->set_rules('phoneMobile', '', 'trim|min_length[1]|max_length[50]|numeric');
                  $this->form_validation->set_rules('fax', '', 'trim|min_length[1]|max_length[50]|numeric');
                  $this->form_validation->set_rules('adress', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('pays', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('ville', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('codePostal', '', 'trim|min_length[1]|max_length[50]|numeric');
                  $this->form_validation->set_rules('activite', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('ape', '', 'trim|min_length[1]|max_length[50]|numeric');
                  $this->form_validation->set_rules('raisonsocial', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('adresselivraison', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('paysl', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('villel', '', 'trim|min_length[1]|max_length[50]');
                  $this->form_validation->set_rules('codepostall', '', 'trim|min_length[1]|max_length[50]');
                  if ($this->form_validation->run() == false) {
                      $this->update_client($_SESSION['idclient']);
                  } else {
                      $nom = $this->input->post('nom');
                      $prenom = $this->input->post('prenom');
                      $email = $this->input->post('email');
                      $phone = $this->input->post('phone');
                      $phonemobile = $this->input->post('phoneMobile');
                      $fax = $this->input->post('fax');
                      $adresse = $this->input->post('adress');
                      $pays = $this->input->post('pays');
                      $ville = $this->input->post('ville');
                      $codepostal = $this->input->post('codePostal');
                      $activite = $this->input->post('activite');
                      $ape = $this->input->post('ape');
                      $raisonsocial = $this->input->post('raisonsocial');
                      $adrlivraison = $this->input->post('adresselivraison');
                      $paysl = $this->input->post('paysl');
                      $villel = $this->input->post('villel');
                      $codepostall = $this->input->post('codepostall');
                      $data = array(
                          'nom' => $nom,
                          'prenom' => $prenom,
                          'adresse' => $adresse,
                          'code_postal' => $codepostal,
                          'ville' => $ville,
                          'pays' => $pays,
                          'telephone' => $phone,
                          'mobile' => $phonemobile,
                          'fax' => $fax,
                          'email' => $email,
                          'activite' => $activite,
                          'code_ape' => $ape,
                          'raisonsocial'=>$raisonsocial

                      );

                      $dat2 = array(
                          'adresse' => $adrlivraison,
                          'code_postal' => $codepostall,
                          'ville' => $villel,
                          'pays' => $paysl,
                         

                      );
                      $this->load->model('Client_M');
                      $this->Client_M->update( $_SESSION['idclient'],$data ,$dat2);
                      redirect('GestionClient/Consulter');


                  }
              }
          }



     public function ViewInf($id){
         if ($this->Logged_in() == 0)
             redirect('Login');
         else {
             $this->load->model('Client_M') ;
             $data['client'] = $this->Client_M->getCientId($id) ;
             $data['livraison'] = $this->Client_M->getadrreLivr($id) ;
             $this->load->view('ViewInf',$data);
     }
     }



     
     public function delet_client($id){
         if ($this->Logged_in() == 0)
             redirect('Login');
         else {
             $this->load->model('Client_M');
             $this->Client_M-> delete($id) ;
             redirect('GestionClient/Consulter');
         }
         
         
     }
    












 }