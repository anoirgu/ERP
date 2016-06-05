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
    
    
    public function imprimer(){
        $this->load->model('Client_M') ;
        $this->load->model('Product_M') ;
        $this->load->model('Ent_Seting_M') ;
        $this->load->model('Setting_M') ;
        $cli = $this->Client_M->getCientId($this->input->post('client')) ;
        $set = $this->Ent_Seting_M->get_configuration();
        $data = $this->Setting_M->getbonliv();
        $header = array('Designation', 'Prix Achat', 'TVA', 'Qauntite','Prix Vente');

        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',16);
        $this->pdf->Image(base_url().'uploads/'.$set[0]->logo ,10,6,30);
        $this->pdf->Text(80,15,'Bon De Livraison',0,0,'C');


        $this->pdf->Text(8,38,'N° de facture : ');
        // Arial bold 15
        $this->pdf->SetFont('Arial','I',15);
        // Move to the right
        // Title

      /*  $this->pdf->Cell(50);
        $this->pdf->Cell(200,10,$cli[0]->nom.' '.$cli[0]->prenom.'\n');
        $this->pdf->Cell(290,20,$cli[0]->raisonsocial);
        // Line break
        $this->pdf->Ln(20);
        $this->pdf->Cell(200,10,$set[0]->nom);
        $this->pdf->Ln(10);
        $this->pdf->Cell(200,10,$set[0]->raison_social);
        $this->pdf->Ln(10);
        $this->pdf->Cell(200,10,$set[0]->raison_social);
        $this->pdf->Ln(10);
        $this->pdf->Cell(200,10,$set[0]->raison_social);
        $this->pdf->Ln(10);


*/
        $this->pdf->Ln(10);$this->pdf->Ln(10);$this->pdf->Ln(10);$this->pdf->Ln(10);

       // $this->pdf->Image(base_url().'uploads/'.$set[0]->logo,10,10,-300) ;
        $this->pdf->BasicTable($header,$data);



        $this->pdf->SetY(-15);
        // Arial italic 8
        $this->pdf->SetFont('Arial','I',8);
        // Page number
        $this->pdf->Cell(0,10,'Page 1',0,0,'C');
        $this->pdf->Output();
        
        
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
            'quantite'=>$this->input->post('quantite')
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