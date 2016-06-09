<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_M extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function add_Setting($data){
        $this->db->insert('setting', $data);
  }

    public function update_Setting($data){
        $this->db->where('id' , 1);
        $this->db->update('setting', $data);
    }
    public function get_Setting(){
        $query = $this->db->query('SELECT * from setting') ;
        return $query->result() ;
    }

    
    public function deletbon($id){
        $this->db->query("DELETE FROM bonlivraison WHERE id='$id';");
    }
    
    public function addbonper($data) {
        $this->db->insert('bonliv', $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
    }

    public function getproduitbon($id){
        $query = $this->db->query("SELECT designation,quantite,prixvente from bonliv where numerobonliv='$id'") ;
        return $query->result() ;

    }
    public function getBonClient($id){
        $query = $this->db->query("SELECT * from bonlivraisonpermanat,client where numerobonliv='$id' and client.id =id_client ") ;
        return $query->result() ;
    }
    public function getlistBonPermanant(){
        $query = $this->db->query("SELECT * from bonlivraisonpermanat") ;
        return $query->result() ;
    }


   
    public function getbonpermanant(){
        $query = $this->db->query('SELECT * from bonlivraisonpermanat,client WHERE id_client=client.id ') ;
        return $query->result() ;
    }
   

    public function findproduit($id){
        $this->db->select('*')->from('product');
        $this->db->like('designation',$id,'after');
        $query = $this->db->get();
        return $query->result();
 }






























































}