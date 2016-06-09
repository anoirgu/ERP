<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonLiv_M extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function drop(){
        $this->db->query("DELETE FROM bonlivraison");
    }

    public function addbonliv($data){
        $this->db->insert('bonlivraison', $data);
    }
    public function getbonliv(){
        $query = $this->db->query('SELECT * from bonlivraison') ;
        return $query->result() ;
    }

    public function addbonpermanant($data){
        $this->db->insert('bonlivraisonpermanat', $data);
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
    public function getbonpermanant(){
        $query = $this->db->query('SELECT * from bonlivraisonpermanat,client WHERE id_client=client.id ') ;
        return $query->result() ;
    }
    public function insertBonliv($data){
        $this->db->insert('bonliv', $data);
    }
    public function deletebon($id)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM bonliv WHERE numerobonliv='$id' ");
        $this->db->query("DELETE FROM bonlivraisonpermanat WHERE numerobonliv='$id';");
        $this->db->trans_complete();
    }
    
    public function getbonbyid($id){
        $query = $this->db->query("SELECT * from bonlivraisonpermanat WHERE numerobonliv='$id'") ;
        return $query->result() ;

    }
    
    
    
}