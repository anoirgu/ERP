<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonCommande extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf'); // Load library
        $this->load->model('BonCommande_M');
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
    
    public  function AjouterBonCommande(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Client_M');
            $this->load->model('Product_M');
            if(!empty($_SESSION['clientCommande'])){
                $data['clientchoisi']=$this->Client_M->getCientId($_SESSION['clientCommande']);}
            $data['productlist'] = $this->Product_M->getListProduct();
            $data['devis'] = $this->BonCommande_M->getBonCommandeTemp();
            $data['client'] = $this->Client_M->getallclient();
            $this->load->view('AjouterBonCommande',$data);


            

        }
    }
    public function AddBonCommande(){
        $this->load->model('Product_M');
        $client_id  = $_SESSION['clientCommande']  ;
        $id = $this->input->post('id') ;
        $designat = $this->Product_M->getProductById($id) ;
        $designation = $designat[0]->designation ;
        $remise = $this->input->post('remise');
        $prixvente = $this->input->post('prixvente')-$remise;
        $prixht = ($prixvente*100)/118;
        $quantite = $this->input->post('quantite') ;
        $data = array(
            'designation'=>$designation,
            'prixvente'=>$prixvente,
            'quantite'=>$quantite,
            'id_client'=>$client_id,
            'remise'=>$remise,
            'prixht'=>$prixht,
            'prixtotalttc'=>$prixvente*$quantite
        );
        $this->BonCommande_M->addBonCOmmandeTemp($data);
        redirect('BonCommande/AjouterBonCommande') ;
    }

    public function ajoutBonCommande(){
        if (!empty($this->BonCommande_M->getBonCommandeTemp())) {
            $data = $this->BonCommande_M->getBonCommandeTemp();
            $datpermanante = array(
                'id_client' => $data[0]->id_client,
                'id_boncommande' => $data[0]->id_client,
                'id_admin'=>$_SESSION['user_id']
            );
            $numeroDevis = $this->BonCommande_M->addBonCommandepermanant($datpermanante);
            foreach ($data as $data) {
                $da = array(
                    'designation' => $data->designation,
                    'prixvente' => $data->prixvente,
                    'quantite' => $data->quantite,
                    'id_client' => $data->id_client,
                    'numeroboncommande'=> $numeroDevis,
                    'remise'=>$data->remise,
                    'prixht'=>$data->prixht,
                    'prixtotalttc'=>$data->prixtotalttc
                );
                $this->BonCommande_M->insertBoncommande($da) ;
            }
            $this->BonCommande_M->drop() ;
            unset($_SESSION['clientCommande']);
            redirect('BonCommande/ConsulterBonCommande');
        }else {
            redirect('BonCommande/AjouterBonCommande') ;
        }

    }

    public function ConsulterBonCommande(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Client_M')  ;
            $this->load->model('Product_M') ;
            $data['listBonCommande'] = $this->BonCommande_M->getBonCommandepermanant();
            $this->load->view('ListeBonCommande', $data) ;
        }
    }

    public function choisirClient(){
        if(empty($_SESSION['clientCommande'])){
            $client_id = $this->input->post('client') ;
            $_SESSION['clientCommande'] = $client_id  ;
            redirect('BonCommande/AjouterBonCommande') ;
        }
    }
    public function annuler(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->BonCommande_M->drop() ;
            unset($_SESSION['clientCommande']);
            redirect('BonCommande/AjouterBonCommande') ;
        }
    }
    public function AficherBonCommande($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $data['produitbon'] = $this->BonCommande_M->getproduitBonCommande($id) ;
            $data['clienbon'] = $this->BonCommande_M->getBonCommandeClient($id);
            $this->load->view('ViewInfBonCommande',$data) ;

        }

    }

    public function suprimerBonCommande($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->BonCommande_M->deleteBoncommande($id) ;
            redirect('BonCommande/ConsulterBonCommande');
        }
    }

    public function Imprimer($id){

        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Setting_M');
            $this->load->model('Ent_Seting_M');
            $bon = $this->BonCommande_M->getBonCommandebyid($id);
            $data = $this->BonCommande_M->getproduitBonCommande($id);
            $cli = $this->BonCommande_M->getBonCommandeClient($id);
            $set = $this->Ent_Seting_M->get_configuration();
            $prixtotal = 0;
            $this->pdf->SetFont('Arial', '', 10);
            $header = array('Designation','Qauntite',' Prix HT ','PU TTC','TVA','Remise','PU Total TTC');
            $this->pdf->AddPage();
            //  $this->pdf->Image(base_url() . 'uploads/' . $set[0]->logo, 10, 6, 30);
            $this->pdf->Text(160, 10, $bon[0]->dateboncommande, 0, 0, 'C');
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
            $this->pdf->Text(8,63,'MF : 1051752A/A/c/000' ) ;
            $this->pdf->Text(8,68,'RC : A812271020/4' ) ;
            $this->pdf->Text(8,73,'CCB : 01078105111002744893 ' ) ;
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);
            $this->pdf->Ln(10);

            $this->pdf->SetTextColor(51,102,255) ;
            $this->pdf->SetFont('Times','B',15);
            $this->pdf->Text(12, 85, 'Bon Commande Numero : ', 0, 0, 'C');
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Arial','',10);
            $this->pdf->Text(80,85,$id,0,0,'C');
            $this->pdf->Ln(10);
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
            $this->pdf->SetXY(115,250);
            $this->pdf->MultiCell(90,5,'Net A Payer :'.$this->int2str($prixtotal).' DT');

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