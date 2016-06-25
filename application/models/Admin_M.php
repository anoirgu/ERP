<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_M extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function count_Admin(){
        $this->db->like('sysadmin',0) ;
        $this->db->from('users') ;
        return $this->db->count_all_results();
    }
    
    
    public function addAdmin($data){
        $this->db->insert('users', $data);
    }

    public function getAllAdmin(){
        $query = $this->db->get_where('users', array('sysadmin' => 0)) ;
        return $query->result() ;
    }
    public function getAdminById($id){
        $query = $this->db->get_where('users', array('id' => $id)) ;
        return $query->result() ;
    }
    public function deletAdmin($id){
        $this->db->query("DELETE FROM users WHERE id='$id';");
    }
    public function getBon($id){
        $query = $this->db->query("SELECT * from bonlivraisonpermanat,client WHERE id_admin='$id' and id_client=client.id ") ;
        return $query->result() ;
    }
    public function getDevis($id){
        $query = $this->db->query("SELECT * from devispermanant,client WHERE id_admin='$id' and id_client=client.id ") ;
        return $query->result() ;
    }
    public function getFacture($id){
        $query = $this->db->query("SELECT * from facturepermanant,client WHERE id_admin='$id' and id_client=client.id ") ;
        return $query->result() ;
    }
    
    
    
    
    
    
    
}