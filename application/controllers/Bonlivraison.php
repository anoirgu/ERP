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
    
    
    public function ajouterbon(){


        $this->load->model('Client_M') ;
        $this->load->model('Product_M') ;
        $this->load->model('Setting_M') ;
        $data = $this->Setting_M->getbonliv();
        $da = array(
            'id_client' => $data[0]->id_client,
            'numerobonliv' => $data[0]->numerobonliv,
            'id_bon' => $data[0]->numerobonliv
        );
        foreach ($data as $data) {
            $dat = array(
                'designation' => $data->designation,
                'prixachat' => $data->prixachat,
                'tva' => $data->tva,
                'prixvente' => $data->prixvente,
                'quantite' => $data->quantite,
                'numerobonlivraison'=>$data->numerobonliv
            );
             $this->Setting_M->addbonper($dat);
        }
            $this->Setting_M->addbonpermanant($da) ;

        $this->Setting_M->drop() ;
        redirect('Bonlivraison/Listebon');
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
    public function suprimerbon($id){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Setting_M') ;
            $this->Setting_M->deletebon($id) ;
            redirect('Bonlivraison/Listebon');
        }
    }

public function Imprimer($id){
    if ($this->Logged_in() == 0)
        redirect('Login');
    else {
        $this->load->model('Setting_M') ;
        $this->load->model('Ent_Seting_M') ;
        $data = $this->Setting_M->getproduitbon($id) ;
        $cli = $this->Setting_M->getBonClient($id);
        $set = $this->Ent_Seting_M->get_configuration();
        $header = array('Designation', 'Prix Achat', 'TVA', 'Qauntite','Prix Vente');

        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',16);
        $this->pdf->Image(base_url().'uploads/'.$set[0]->logo ,10,6,30);
        $this->pdf->Text(80,15,'Bon De Livraison',0,0,'C');
        $this->pdf->Text(160,38,$cli[0]->nom.' '.$cli[0]->prenom);
        $this->pdf->Text(160,48,$cli[0]->raisonsocial ) ;
        $this->pdf->Text(160,56,$cli[0]->adresse ) ;
        $this->pdf->Text(160,62,$cli[0]->ville ) ;
        $this->pdf->Text(160,68,$cli[0]->code_postal ) ;



        $this->pdf->Text(8,38,$set[0]->nom);
        $this->pdf->Text(8,48,$set[0]->raison_social);
        $this->pdf->Text(8,56,$set[0]->adresse);
        $this->pdf->Text(8,62,$set[0]->ville);
        $this->pdf->Text(8,68,$set[0]->code_postal);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);
        $this->pdf->Ln(10);



        // Arial bold 15
        $this->pdf->SetFont('Arial','I',15);
        // Move to the right
        // Title
        $this->pdf->Ln(10);$this->pdf->Ln(10);$this->pdf->Ln(10);$this->pdf->Ln(10);

        // $this->pdf->Image(base_url().'uploads/'.$set[0]->logo,10,10,-300) ;
        $this->pdf->BasicTable($header,$data);



        $this->pdf->SetY(-10);
        // Arial italic 8
        $this->pdf->SetFont('Arial','I',8);
        // Page number

        $this->pdf->Output();



    }


}



    
    
    public function Listebon(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Client_M')  ;
            $this->load->model('Product_M') ;
            $this->load->model('Setting_M') ;

            $data['listebon'] = $this->Setting_M->getbonpermanant() ;

            $this->load->view('Listebon',$data) ;
        }
        
        
        
    }
    
    
    
    
    
    
    public function Ajouter(){
        if ($this->Logged_in() == 0)
            redirect('Login');
        else {
            $this->load->model('Client_M') ;
            $this->load->model('Product_M') ;
            $this->load->model('Ent_Seting_M') ;
            $this->load->model('Setting_M') ; 
            $data['client'] = $this->Client_M->getallclient();
            $data['product'] = $this->Product_M->getListProduct() ;
            $data['entseting'] = $this->Ent_Seting_M->get_configuration() ; 
            $data['bonlivraison'] = $this->Setting_M->getbonliv() ;
            if(!empty($this->Setting_M->getbonliv())){
                $data['clientchoisi'] = $this->Client_M->getCientId($this->Setting_M->getbonliv()[0]->id_client);
            }
            $this->load->view('AjouterBonLivraison', $data) ;
        }
    }
    public function addProduit($id){
        $this->load->model('Product_M');
        $data=  $this->Product_M->getProductById($id);
        echo json_encode($data);
    }



    public function addbonlivraison(){

        $data = array(
            'designation'=>$this->input->post('designation'),
            'prixachat'=>$this->input->post('prixachat'),
            'tva'=>$this->input->post('tva'),
            'prixvente'=>$this->input->post('prixvente'),
            'quantite'=>$this->input->post('quantite'),
            'id_client'=>$this->input->post('clientid'),
            'numerobonliv'=>$this->input->post('numerobonliv')
        );
        $this->load->model('Setting_M') ;
        $this->Setting_M->addbonliv($data) ;
        redirect('Bonlivraison/Ajouter') ;

    }
    public function deletebonlivraison($id){
        $this->load->model('Setting_M') ;
        $this->Setting_M->deletbon($id) ;
        echo json_encode(array("status" => TRUE));
    }
public function BonList(){
    $this->load->model('Setting_M') ;
    $list = $this->Setting_M->getbonliv();
    $no = $_POST['start'];
    foreach ($list as $person) {
        $row = array();
        $row[] = $person->designation;
        $row[] = $person->prixachat;
        $row[] = $person->tva;
        $row[] = $person->prixvente;
        $row[] = $person->quantite;
        $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>';
        $data[] = $row;
    }
    $output = array("data" => $data);
    echo json_encode($output);
}





    public function AddBon(){
      
    }
    
    
    
    
    

}