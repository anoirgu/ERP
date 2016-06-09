<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf'); // Load library
        $this->load->model('Factur_M');
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
    public function AjouterFacture(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Client_M') ;
            if(!empty($this->Factur_M->getFactureTemp())){
                $data['clientchoisi']=$this->Client_M->getCientId($this->Factur_M->getFactureTemp()[0]->id_client);}
            $data['devis'] = $this->Factur_M->getFactureTemp();
            $data['client'] = $this->Client_M->getallclient() ;
            $this->load->view('AjoutFacture',$data);
        }
    }
    public function  ConsulterFacture()
    {
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Client_M')  ;
            $this->load->model('Product_M') ;
            $data['listDevis'] = $this->Factur_M->getFacturepermanant();
            $this->load->view('ListeFacture', $data) ;
        }


    }
    public function AddFacture(){
        if(!empty($this->Factur_M->getFactureTemp())){
            $client_id = $this->Factur_M->getFactureTemp()[0]->id_client ;
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
        $this->Factur_M->addFactureTemp($data);
        redirect('Facture/AjouterFacture') ;
    }
    public  function  ajoutFacture()
    {
        if (!empty($this->Factur_M->getFactureTemp())) {
            $data = $this->Factur_M->getFactureTemp();
            $datpermanante = array(
                'id_client' => $data[0]->id_client,
                'id_facture' => $data[0]->id_client,
            );
            $numeroDevis = $this->Factur_M->addFacturepermanant($datpermanante);
            foreach ($data as $data) {
                $da = array(
                    'designation' => $data->designation,
                    'prixvente' => $data->prixvente,
                    'quantite' => $data->quantite,
                    'id_client' => $data->id_client,
                    'numerofacture' => $numeroDevis
                );
                $this->Factur_M->insertFacture($da) ;
            }
            $this->Factur_M->drop() ;
            redirect('Facture/ConsulterFacture');
        }else {
            redirect('Facture/AjouterFacture') ;
        }
    }
    public function annuler(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->Factur_M->drop() ;
            redirect('Facture/AjouterFacture') ;
        }
    }
    public function AficherFacture($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $data['produitbon'] = $this->Factur_M->getproduitFacture($id) ;
            $data['clienbon'] = $this->Factur_M->getFactureClient($id);
            $this->load->view('ViewInfFacture',$data) ;

        }
    }
    public function suprimerFacture($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->Factur_M->deleteFacture($id) ;
            redirect('Facture/ConsulterFacture');
        }
    }
    public function Imprimer($id)
    {
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Setting_M');
            $this->load->model('Ent_Seting_M');
            $bon = $this->Factur_M->getFacturebyid($id);
            $data = $this->Factur_M->getproduitFacture($id);
            $cli = $this->Factur_M->getFactureClient($id);
            $set = $this->Ent_Seting_M->get_configuration();
            $prixtotal = 0;
            $this->pdf->SetFont('Arial', '', 10);
            $header = array('Designation', 'Qauntite', 'Prix Vente');
            $this->pdf->AddPage();
            $this->pdf->Image(base_url() . 'uploads/' . $set[0]->logo, 10, 6, 30);
            $this->pdf->Text(160, 10, $bon[0]->datefacture, 0, 0, 'C');
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


            $this->pdf->Text(12, 75, 'Facture Numero : ' . $id, 0, 0, 'C');
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