<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis_M extends CI_Model {
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function drop(){
        $this->db->query("DELETE FROM devistemporaire");
    }
    public function addDevisTemp($data){
        $this->db->insert('devistemporaire', $data);
    }
    public function getDevisTemp(){
        $query = $this->db->query('SELECT * from devistemporaire') ;
        return $query->result() ;
    }
    public function addDevispermanant($data){
        $this->db->insert('devispermanant', $data);
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
    public function getDevispermanant(){
        $query = $this->db->query('SELECT * from devispermanant,client WHERE id_client=client.id ') ;
        return $query->result() ;
    }
    public function insertDevis($data){
        $this->db->insert('devis', $data);
    }
    public function deleteDevis($id)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM devis WHERE numerodevis='$id' ");
        $this->db->query("DELETE FROM  devispermanant WHERE numerodevis='$id';");
        $this->db->trans_complete();
    }
    public function getDevisbyid($id){
        $query = $this->db->query("SELECT * from devispermanant WHERE numerodevis='$id'") ;
        return $query->result() ;
    }
    public function getproduitDevis($id){
        $query = $this->db->query("SELECT designation,quantite,prixvente from devis where numerodevis='$id'") ;
        return $query->result() ;
    }
    public function getDevisClient($id){
        $query = $this->db->query("SELECT * from devispermanant,client where numerodevis='$id' and client.id =id_client ") ;
        return $query->result() ;
    }
   

















}