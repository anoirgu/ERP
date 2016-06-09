<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis extends CI_Controller {
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
    public function AjouterDevis(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Client_M') ;
            $this->load->model('Devis_M');
            if(!empty($this->Devis_M->getDevisTemp())){
                $data['clientchoisi']=$this->Client_M->getCientId($this->Devis_M->getDevisTemp()[0]->id_client);}
                $data['devis'] = $this->Devis_M->getDevisTemp();
                $data['client'] = $this->Client_M->getallclient() ;
            $this->load->view('AjoutDevis',$data);
        }
    }
    public function  ConsulterDevis()
    {
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Devis_M');
            $this->load->model('Client_M')  ;
            $this->load->model('Product_M') ;
            $data['listDevis'] = $this->Devis_M->getDevispermanant();
            $this->load->view('ListeDevis', $data) ;
        }


    }
    public function AddDevis(){
        $this->load->model('Devis_M');
        if(!empty($this->Devis_M->getDevisTemp())){
        $client_id = $this->Devis_M->getDevisTemp()[0]->id_client ;
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
        $this->Devis_M->addDevisTemp($data);
        redirect('Devis/AjouterDevis') ;
}
    public  function  ajoutDevis()
    {
        $this->load->model('Devis_M');
        if (!empty($this->Devis_M->getDevisTemp())) {
            $data = $this->Devis_M->getDevisTemp();
            $datpermanante = array(
                'id_client' => $data[0]->id_client,
                'id_devis' => $data[0]->id_client,
            );
            $numeroDevis = $this->Devis_M->addDevispermanant($datpermanante);
            foreach ($data as $data) {
                $da = array(
                    'designation' => $data->designation,
                    'prixvente' => $data->prixvente,
                    'quantite' => $data->quantite,
                    'id_client' => $data->id_client,
                    'numerodevis' => $numeroDevis
                );
                $this->Devis_M->insertDevis($da) ;
            }
            $this->Devis_M->drop() ;
            redirect('Devis/ConsulterDevis');
        }else {
            redirect('Devis/AjouterDevis') ;
        }
    }
    public function annuler(){
    if ($this->Logged_in() == 0)
        redirect('Login');
    else {
        $this->load->model('Devis_M');
        $this->Devis_M->drop() ;
        redirect('Devis/AjouterDevis') ;
    }
}
    public function AficherDevis($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Devis_M') ;
            $data['produitbon'] = $this->Devis_M->getproduitDevis($id) ;
            $data['clienbon'] = $this->Devis_M->getDevisClient($id);
            $this->load->view('ViewInfDevis',$data) ;

        }
    }
    public function suprimerDevis($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Devis_M') ;
            $this->Devis_M->deleteDevis($id) ;
            redirect('Devis/ConsulterDevis');
        }
    }
    public function Imprimer($id)
    {
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Setting_M');
            $this->load->model('Ent_Seting_M');
            $this->load->model('Devis_M');
            $bon = $this->Devis_M->getDevisbyid($id);
            $data = $this->Devis_M->getproduitDevis($id);
            $cli = $this->Devis_M->getDevisClient($id);
            $set = $this->Ent_Seting_M->get_configuration();
            $prixtotal = 0;
            $this->pdf->SetFont('Arial', '', 10);
            $header = array('Designation', 'Qauntite', 'Prix Vente');
            $this->pdf->AddPage();
            $this->pdf->Image(base_url() . 'uploads/' . $set[0]->logo, 10, 6, 30);
            $this->pdf->Text(160, 10, $bon[0]->datedevis, 0, 0, 'C');
            $this->pdf->Text(160, 38, $cli[0]->nom . ' ' . $cli[0]->prenom);
            $this->pdf->Text(160, 43, $cli[0]->raisonsocial);
            $this->pdf->Text(160, 48, $cli[0]->adresse);
            $this->pdf->Text(160, 53, $cli[0]->ville);
            $this->pdf->Text(160, 58, $cli[0]->code_postal);


            $this->pdf->Text(8, 38, $set[0]->nom);
            $this->pdf->Text(8, 43, $set[0]->raison_social);
            $this->pdf->Text(8, 48, $set[0]->adresse);
            $this->pdf->Text(8, 53, $set[0]->ville);
            $this->pdf->Text(8, 58, $set[0]->code_postal);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);


            $this->pdf->Text(12, 75, 'Devis Numero : ' . $id, 0, 0, 'C');
            $this->pdf->Ln(10);
            $this->pdf->BasicTable($header, $data);
            foreach ($data as $data) {
                $prixtotal += $data->prixvente * $data->quantite;
            }
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);

            $this->pdf->Text(150, 240, 'Montant Total A payee :' . $prixtotal . "  dinar");


            $this->pdf->SetY(-10);
            // Arial italic 8
            $this->pdf->SetFont('Arial', 'I', 8);
            // Page number

            $this->pdf->Output();
        }
    }

}