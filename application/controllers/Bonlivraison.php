<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bonlivraison extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf'); // Load library
    }

    public function index()
    {
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            redirect('Dashboard');
        }
    }

    public function Logged_in()
    {
        if ($this->session->userdata('logged_in') != null && $_SESSION['is_admin'] == 1) {
            return 1;
        } else//si n'est pas connecter
            return 0;
    }
    
    


    public function Imprimer($id){
    if ($this->Logged_in() == 0)
        redirect('Login');
    else {
        $this->load->model('Setting_M') ;
        $this->load->model('Ent_Seting_M') ;
        $this->load->model('BonLiv_M') ; 
        $bon  = $this->BonLiv_M->getbonbyid($id) ;
        $data = $this->Setting_M->getproduitbon($id) ;
        $cli = $this->Setting_M->getBonClient($id);
        $set = $this->Ent_Seting_M->get_configuration();
        $prixtotal = 0 ;

        $this->pdf->SetFont('Arial','',10);
      $header = array('Designation','Qauntite','Prix Vente');
        $this->pdf->AddPage();
        $this->pdf->Image(base_url().'uploads/'.$set[0]->logo ,10,6,30);
        $this->pdf->Text(160,10,$bon[0]->datebon,0,0,'C');
        $this->pdf->Text(160,38,$cli[0]->nom.' '.$cli[0]->prenom);
        $this->pdf->Text(160,43,$cli[0]->raisonsocial ) ;
        $this->pdf->Text(160,48,$cli[0]->adresse ) ;
        $this->pdf->Text(160,53,$cli[0]->ville ) ;
        $this->pdf->Text(160,58,$cli[0]->code_postal ) ;



        $this->pdf->Text(8,38,$set[0]->nom);
        $this->pdf->Text(8,43,$set[0]->raison_social);
        $this->pdf->Text(8,48,$set[0]->adresse);
        $this->pdf->Text(8,53,$set[0]->ville);
        $this->pdf->Text(8,58,$set[0]->code_postal);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);




        $this->pdf->Text(12,75,'Bon De Livraison Numero : '.$id,0,0,'C');
        $this->pdf->Ln(10);
        $this->pdf->BasicTable($header,$data);
        foreach ($data as $data){
            $prixtotal+=$data->prixvente*$data->quantite ;
        }
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);

        $this->pdf->Text(150,240,'Montant Total A payee :'.$prixtotal."  dinar");


        $this->pdf->SetY(-10);
        // Arial italic 8
        $this->pdf->SetFont('Arial','I',8);
        // Page number

        $this->pdf->Output();



    }


}


    public function Ajouter(){
        $this->load->model('Client_M') ;
        $this->load->model('BonLiv_M');
        if(!empty($this->BonLiv_M->getbonliv())){
        $data['clientchoisi']=$this->Client_M->getCientId($this->BonLiv_M->getbonliv()[0]->id_client);}
        $data['bonlivraison'] = $this->BonLiv_M->getbonliv() ;
        $data['client'] = $this->Client_M->getallclient() ;
        $this->load->view('AjouterBonLivraison',$data);


    }
    public function addProduit($id){
        $this->load->model('Product_M');
        $data=  $this->Product_M->getProductByName($id);
        echo json_encode($data);
    }
    public function addbonlivraison(){
        $this->load->model('BonLiv_M');
        if(!empty($this->BonLiv_M->getbonliv())){
            $client_id = $this->BonLiv_M->getbonliv()[0]->id_client ;
        }else {
        $client_id = $this->input->post('client') ;}
        $designation = $this->input->post('designation') ;
        $quantite = $this->input->post('quantite') ;
        $prixvente = $this->input->post('prixvente') ;

        $data = array(
            'designation'=>$designation,
            'prixvente'=>$prixvente,
            'quantite'=>$quantite,
            'id_client'=>$client_id
        );
        $this->load->model('BonLiv_M');
        $this->BonLiv_M->addbonliv($data);
        redirect('Bonlivraison/Ajouter') ;




    }
    public function  ajouterbon(){
    $this->load->model('BonLiv_M');
    if(!empty($this->BonLiv_M->getbonliv())){
        $data =$this->BonLiv_M->getbonliv();
        $datpermanante = array(
            'id_client'=>$data[0]->id_client,
            'id_bon'=>$data[0]->id_client,
              );
        $numerobonliv =  $this->BonLiv_M->addbonpermanant($datpermanante);
        foreach ($data as $data){
            $da = array(
                'designation'=>$data->designation,
                'prixvente'=>$data->prixvente,
                'quantite'=>$data->quantite,
                'id_client'=>$data->id_client,
                'numerobonliv'=>$numerobonliv
            );
            $quantitinitial = $this->BonLiv_M->getProductById($data->designation)[0]->quantite;
            $newqauuntite = $quantitinitial - $data->quantite ;
            $updat = array(
                'quantite'=>$newqauuntite
            );
            $this->BonLiv_M->updateProduit($data->designation , $updat) ;

             $this->BonLiv_M->insertBonliv($da);


        }
        $this->BonLiv_M->drop() ;
        redirect('Bonlivraison/Listebon') ;
    }else {
        redirect('Bonlivraison/Ajouter') ;
    }
}
    public function Listebon(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('BonLiv_M');
            $this->load->model('Client_M')  ;
            $this->load->model('Product_M') ;
            $data['listebon'] = $this->BonLiv_M->getbonpermanant() ;
            $this->load->view('Listebon',$data) ;
        }
    }

    public function suprimerbon($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('BonLiv_M') ;
            $this->BonLiv_M->deletebon($id) ;
            redirect('Bonlivraison/Listebon');
        }
    }
    public function  annuler(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('BonLiv_M') ;
            $this->BonLiv_M->drop() ;
            redirect('Bonlivraison/Ajouter') ;

        }
    }
    public function AficherBon($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Setting_M') ;
            $data['produitbon'] = $this->Setting_M->getproduitbon($id) ;
            $data['clienbon'] = $this->Setting_M->getBonClient($id);
            $this->load->view('ViewInfBon',$data) ;

        }
    }


























}