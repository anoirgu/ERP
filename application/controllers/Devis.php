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
            $this->load->model('Product_M') ;
            if(!empty($_SESSION['clientDevis'])){
                $data['clientchoisi']=$this->Client_M->getCientId($_SESSION['clientDevis']); 
            }
                $data['productlist'] = $this->Product_M->getListProduct();
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
        $this->load->model('Product_M');
        $client_id  = $_SESSION['clientDevis']  ;
       $quantite = $this->input->post('quantite') ;
        $id = $this->input->post('id') ;
        $designat = $this->Product_M->getProductById($id) ;
        $designation = $designat[0]->designation ;
        $remise = $this->input->post('remise');
        $prixvente = $this->input->post('prixvente')-$remise;
        $prixht =($prixvente*100)/118;
        $data = array(
        'designation'=>$designation,
        'prixvente'=>$prixvente,
        'quantite'=>$quantite,
        'id_client'=>$client_id,
            'remise'=>$remise,
            'prixht'=>$prixht,
            'prixtotalttc'=>$prixvente*$quantite
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
                    'numerodevis' => $numeroDevis ,
                    'remise'=>$data->remise,
                    'prixht'=>$data->prixht,
                    'prixtotalttc'=>$data->prixtotalttc
                );
                $this->Devis_M->insertDevis($da) ;
            }
            $this->Devis_M->drop() ;
            unset($_SESSION['clientDevis']);
            redirect('Devis/ConsulterDevis');
        }else {
            redirect('Devis/AjouterDevis') ;
        }
    }
    public function choisirClient(){
        if(empty($_SESSION['clientDevis'])){
            $client_id = $this->input->post('client') ;
            $_SESSION['clientDevis'] = $client_id  ;
            redirect('Devis/AjouterDevis') ;
        }



    }

    public function annuler(){
    if ($this->Logged_in() == 0)
        redirect('Login');
    else {
        $this->load->model('Devis_M');
        $this->Devis_M->drop() ;
        unset($_SESSION['clientDevis']);
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
            $header = array('Designation','Qauntite',' Prix HT ','PU TTC','TVA','Remise','PU Total TTC');
            $this->pdf->AddPage();
           // $this->pdf->Image(base_url() . 'uploads/' . $set[0]->logo, 10, 6, 30);
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

            $this->pdf->SetTextColor(51,102,255) ;
            $this->pdf->SetFont('Times','B',15);
            $this->pdf->Text(12, 75, 'Devis Numero : ' , 0, 0, 'C');
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Arial','',10);
            $this->pdf->Text(60,75,$id,0,0,'C');
            $this->pdf->Ln(10);
            $this->pdf->BasicTable($header, $data);
            foreach ($data as $data) {
                $prixtotal += $data->prixvente * $data->quantite;
            }
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->SetLineWidth(0.5);
            $this->pdf->SetFillColor(102 ,178, 255);
            $this->pdf->RoundedRect(113, 230, 93, 50, 3.5, 'DF');
            $this->pdf->Text(115, 240, 'Montant Total A payee :' . $prixtotal . "  dinar");
            $this->pdf->Text(115,250,'Net A Payer :'.$this->int2str($prixtotal).' DT');

            $this->pdf->SetY(-10);
            // Arial italic 8
            $this->pdf->SetFont('Arial', 'I', 8);
            // Page number

            $this->pdf->Output();
        }
    }

    function int2str($a){
        $joakim = explode('.',$a);
        if (isset($joakim[1]) && $joakim[1]!=''){
            return $this->int2str($joakim[0]).' virgule '.$this->int2str($joakim[1]) ;
        }
        if ($a<0) return 'moins '.$this->int2str(-$a);
        if ($a<17){
            switch ($a){
                case 0: return 'zero';
                case 1: return 'un';
                case 2: return 'deux';
                case 3: return 'trois';
                case 4: return 'quatre';
                case 5: return 'cinq';
                case 6: return 'six';
                case 7: return 'sept';
                case 8: return 'huit';
                case 9: return 'neuf';
                case 10: return 'dix';
                case 11: return 'onze';
                case 12: return 'douze';
                case 13: return 'treize';
                case 14: return 'quatorze';
                case 15: return 'quinze';
                case 16: return 'seize';
            }
        } else if ($a<20){
            return 'dix-'.$this->int2str($a-10);
        } else if ($a<100){
            if ($a%10==0){
                switch ($a){
                    case 20: return 'vingt';
                    case 30: return 'trente';
                    case 40: return 'quarante';
                    case 50: return 'cinquante';
                    case 60: return 'soixante';
                    case 70: return 'soixante-dix';
                    case 80: return 'quatre-vingt';
                    case 90: return 'quatre-vingt-dix';
                }
            } elseif (substr($a, -1)==1){
                if( ((int)($a/10)*10)<70 ){
                    return $this->int2str((int)($a/10)*10).'-et-un';
                } elseif ($a==71) {
                    return 'soixante-et-onze';
                } elseif ($a==81) {
                    return 'quatre-vingt-un';
                } elseif ($a==91) {
                    return 'quatre-vingt-onze';
                }
            } elseif ($a<70){
                return $this->int2str($a-$a%10).'-'.$this->int2str($a%10);
            } elseif ($a<80){
                return $this->int2str(60).'-'.$this->int2str($a%20);
            } else{
                return $this->int2str(80).'-'.$this->int2str($a%20);
            }
        } else if ($a==100){
            return 'cent';
        } else if ($a<200){
            return $this->int2str(100).' '.$this->int2str($a%100);
        } else if ($a<1000){
            return $this->int2str((int)($a/100)).' '.$this->int2str(100).' '.$this->int2str($a%100);
        } else if ($a==1000){
            return 'mille';
        } else if ($a<2000){
            return $this->int2str(1000).' '.$this->int2str($a%1000).' ';
        } else if ($a<1000000){
            return $this->int2str((int)($a/1000)).' '.$this->int2str(1000).' '.$this->int2str($a%1000);
        } else if ($a==1000000) {
            return 'million';
        } else if ($a<2000000) {
            return $this->int2str(1000000).' '.$this->int2str($a%1000000).' ';
        } else if($a<1000000000){
            return $this->int2str((int)($a/1000000)).' '.$this->int2str(1000000).' '.$this->int2str($a%1000000) ;
        }
    }
    
}