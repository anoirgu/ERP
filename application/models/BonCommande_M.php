<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BonCommande_M extends CI_Model {
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }
    public function drop(){
        $this->db->query("DELETE FROM boncommandetemporaire");
    }
    public function addBonCOmmandeTemp($data){
        $this->db->insert('boncommandetemporaire', $data);
    }
    public function getBonCommandeTemp(){
        $query = $this->db->query('SELECT * from boncommandetemporaire') ;
        return $query->result() ;
    }
    public function addBonCommandepermanant($data){
        $this->db->insert('boncommandepermanant', $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
    }
    public function getProductById($id){
        $query = $this->db->query("Select * from product  where  designation ='$id'");
        return $query->result();
    }
    public function getBonCommandepermanant(){
        $query = $this->db->query('SELECT * from boncommandepermanant,client WHERE id_client=client.id ') ;
        return $query->result() ;
    }
    public function insertBoncommande($data){
        $this->db->insert('boncommande', $data);
    }
    public function deleteBoncommande($id)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM boncommande WHERE numeroboncommande='$id' ");
        $this->db->query("DELETE FROM  boncommandepermanant WHERE numeroboncommande='$id';");
        $this->db->trans_complete();
    }
    public function getBonCommandebyid($id){
        $query = $this->db->query("SELECT * from boncommandepermanant WHERE numeroboncommande='$id'") ;
        return $query->result() ;
    }
    public function getproduitBonCommande($id){
        $query = $this->db->query("SELECT designation,quantite,prixht,prixvente,defaulttva,remise,prixtotalttc from boncommande,setting where numeroboncommande='$id'") ;
        return $query->result() ;
    }
    public function getBonCommandeClient($id){
        $query = $this->db->query("SELECT * from boncommandepermanant,client where numeroboncommande='$id' and client.id =id_client ") ;
        return $query->result() ;
    }




}