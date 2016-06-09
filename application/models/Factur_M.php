<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factur_M extends CI_Model{
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }
    public function drop(){
        $this->db->query("DELETE FROM facturetemporaire");
    }
    public function addFactureTemp($data){
        $this->db->insert('facturetemporaire', $data);
    }
    public function getFactureTemp(){
        $query = $this->db->query('SELECT * from facturetemporaire') ;
        return $query->result() ;
    }
    public function addFacturepermanant($data){
        $this->db->insert('facturepermanant', $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
    }
    public function updateProduit($id,$data){
        $this->db->where('designation' ,$id);
        $this->db->update('product', $data);

    }
    public function getProductById($id){
        $query = $this->db->query("Select * from product  where  designation ='$id'");
        return $query->result();
    }
    public function getFacturepermanant(){
        $query = $this->db->query('SELECT * from facturepermanant,client WHERE id_client=client.id ') ;
        return $query->result() ;
    }
    public function insertFacture($data){
        $this->db->insert('facture', $data);
    }
    public function deleteFacture($id)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM facture WHERE numerofacture='$id' ");
        $this->db->query("DELETE FROM  facturepermanant WHERE numerofacture='$id';");
        $this->db->trans_complete();
    }
    public function getFacturebyid($id){
        $query = $this->db->query("SELECT * from facturepermanant WHERE numerofacture='$id'") ;
        return $query->result() ;
    }
    public function getproduitFacture($id){
        $query = $this->db->query("SELECT designation,quantite,prixvente from facture where numerofacture='$id'") ;
        return $query->result() ;
    }
    public function getFactureClient($id){
        $query = $this->db->query("SELECT * from facturepermanant,client where numerofacture='$id' and client.id =id_client ") ;
        return $query->result() ;
    }
















}