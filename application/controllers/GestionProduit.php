<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionProduit extends CI_Controller{

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

    public function AjouterFournisseur()
    {
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->view('AjouterFournisseur');

        }
    }
        public function add_Fournisseur() {
            $da = new stdClass() ;
            $this->form_validation->set_rules('nom','', 'trim|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('prenom','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('email','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('phone','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('phoneMobile','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('fax','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('adress','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('pays','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('ville','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('codePostal','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('raisonsocial','', 'trim|min_length[1]|max_length[100]');
            if ($this->form_validation->run() == false ){
            $this->AjouterFournisseur($da) ;
            }else {

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
                $raisonsocial = $this->input->post('raisonsocial');
                $data  = array(
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
                    'raisonsocial'=>$raisonsocial
                );
                $this->load->model('Product_M') ;
                $this->Product_M->addFournisseur($data) ;
                redirect('GestionProduit/ListeFournisseur') ;

            }
        }
        
    public function ListeFournisseur(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Product_M') ; 
            $data['fournisseur'] = $this->Product_M->listeFournisseur() ;
            $this->load->view('ListeFournisseur', $data) ;
        }
        
        
    }   
    
    public function ViewInfFournisseur($id){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
         $this->load->model('Product_M') ; 
            $data['fournisseur'] = $this->Product_M->getInfFourni($id);
            $data['product'] = $this->Product_M->getProductFournisseur($id);
            $this->load->view('ViewInfFournisseur',$data);
        }
    }
    
    public function update_Fournisseur($id){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $_SESSION['idfournisseur'] = $id ;
            $this->load->model('Product_M') ;
            $data['fournisseur'] = $this->Product_M->getInfFourni($id);
            $this->load->view('UpdateFournisseur' ,$data);
        }
    }
   public function miseajour_Fournisseur()
   {
       if ($this->Logged_in() == 0)
           redirect('Login');
       else {
           $this->load->model('Product_M');
           $da = new stdClass();
           $this->form_validation->set_rules('nom', '', 'trim|min_length[3]|max_length[100]');
           $this->form_validation->set_rules('prenom', '', 'trim|min_length[1]|max_length[100]');
           $this->form_validation->set_rules('email', '', 'trim|min_length[1]|max_length[100]');
           $this->form_validation->set_rules('phone', '', 'trim|min_length[1]|max_length[100]|numeric');
           $this->form_validation->set_rules('phoneMobile', '', 'trim|min_length[1]|max_length[100]|numeric');
           $this->form_validation->set_rules('fax', '', 'trim|min_length[1]|max_length[100]|numeric');
           $this->form_validation->set_rules('adress', '', 'trim|min_length[1]|max_length[100]');
           $this->form_validation->set_rules('pays', '', 'trim|min_length[1]|max_length[100]');
           $this->form_validation->set_rules('ville', '', 'trim|min_length[1]|max_length[100]');
           $this->form_validation->set_rules('codePostal', '', 'trim|min_length[1]|max_length[100]|numeric');
           $this->form_validation->set_rules('raisonsocial', '', 'trim|min_length[1]|max_length[100]');
           if ($this->form_validation->run() == false) {
               $this->update_Fournisseur($_SESSION['idfournisseur']);
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
               $raisonsocial = $this->input->post('raisonsocial');
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
                   'raisonsocial' => $raisonsocial
               );
               $this->Product_M->updatefournisseur($_SESSION['idfournisseur'], $data);
               redirect('GestionProduit/ListeFournisseur');

           }

       }
   }
    
    public function delet_Fournisseur($id){

        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Product_M');
            $this->Product_M->deletFournisseur($id) ;
            redirect('GestionProduit/ListeFournisseur');
        }
    }
    
    public function AjouterProduit(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Product_M');
            $this->load->model('Setting_M') ; 
            $data['setting'] = $this->Setting_M->get_Setting() ; 
            $data['listfournisseur'] = $this->Product_M->listeFournisseur() ;
            $this->load->view('AjouterProduit' , $data) ;

        }
    }

    public function addProduct(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $da = new stdClass() ;
            $this->form_validation->set_rules('designation','', 'trim|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('quantite','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('prixachat','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('margeht','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('prixvente','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('reference','', 'trim|min_length[1]|max_length[100]|numeric');

            if ($this->form_validation->run() == false) {
                $this->AjouterProduit($da);
            } else {
                $designation = $this->input->post('designation') ;
                $quantite = $this->input->post('quantite') ;
                $prixachat = $this->input->post('prixachat') ;
                $margeht = $this->input->post('margeht') ;
                $fournisseur = $this->input->post('fournisseur') ;
                $prixvente = $this->input->post('prixvente') ;
                $reference = $this->input->post('reference') ;
                $data = array(
                    'designation'=>$designation,
                    'prix_achat'=>$prixachat,
                    'marge_ht'=>$margeht,
                    'prixventettc'=>$prixvente,
                    'quantite'=>$quantite,
                    'id_fournisseur'=>$fournisseur,
                    'reference'=>$reference
                );
                $this->load->model('Product_M') ;
                $this->Product_M->addProduct($data) ;
                redirect('GestionProduit/ListeProduit');
                
                
                
                
            }


        }




        }
    
    public function update_Produit($id){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $_SESSION['idproduot'] = $id ; 
            $this->load->model('Product_M') ; 
            $data['product'] = $this->Product_M->getProductById($id) ; 
            $this->load->view('UpdateProduit' , $data);
        }
    }
    public function MiseAjourProduct(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $da = new stdClass() ;
            $this->form_validation->set_rules('designation','', 'trim|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('quantite','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('prixachat','', 'trim|min_length[1]|max_length[100]|numeric');
            $this->form_validation->set_rules('margeht','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('tax','', 'trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('reference','', 'trim|min_length[1]|max_length[100]|numeric');
            if ($this->form_validation->run() == false ) {
                $this->AjouterProduit($da);
            } else {
                $designation = $this->input->post('designation') ;
                $quantite = $this->input->post('quantite') ;
                $prixachat = $this->input->post('prixachat') ;
                $margeht = $this->input->post('margeht') ;
                $tax = $this->input->post('tax') ;
                $prixvente = $this->input->post('prixvente') ;
                $reference = $this->input->post('reference') ;
                $data = array(
                    'designation'=>$designation,
                    'prix_achat'=>$prixachat,
                    'marge_ht'=>$margeht,
                    'taxe'=>$tax,
                    'prixventettc'=>$prixvente,
                    'quantite'=>$quantite,
                    'reference'=>$reference
                );
                $this->load->model('Product_M') ;
                $this->Product_M->updateProduit($_SESSION['idproduot'],$data) ;
                redirect('GestionProduit/ListeProduit');
        }

    }
    }
    
    public function delet_Produit($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Product_M');
            $this->Product_M->deletProduit($id) ;
            redirect('GestionProduit/ListeProduit');
        }
        
    }
     
    public function ListeProduit(){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Product_M') ;
            $data['listeproduit']= $this->Product_M->getListProduct();
            $this->load->view('ListeProduit',$data) ;
        }
        
    }
    public function ViewInfProduit($id){
        if($this->Logged_in()==0)
            redirect('Login') ;
        else{
            $this->load->model('Product_M') ;
            $data['produit'] = $this->Product_M->getProductById($id) ;
            $this->load->view('ViewInfProduit', $data);

        }
    }






















}



