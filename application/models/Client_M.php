<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_M extends CI_Model {
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }
    public function add_client($data)
    {$this->db->insert('client', $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
    }
    public function insertadresse($data){
        $this->db->insert('adresse_livraison_client', $data) ;
    }

    public function getCientId($id){
        $query = $this->db->get_where('client', array('id' => $id)) ;
        return $query->result() ;
     }
    public function getadrreLivr($id){
        $query = $this->db->get_where('adresse_livraison_client', array('id_client' => $id)) ;
        return $query->result() ;
        
    }




    public function update($id,$data,$data2){
        $this->db->trans_start();
        $this->db->where('id_client' , $id);
        $this->db->update('adresse_livraison_client', $data2);
        $this->db->where('id',$id);
        $this->db->update('client', $data);
        $this->db->trans_complete();

}
    public function delete($id){
        $this->db->trans_start();
        $this->db->query("DELETE FROM adresse_livraison_client WHERE id_client='$id';");
        $this->db->query("DELETE FROM client WHERE id='$id';");
        $this->db->trans_complete();
    }
    public function getallclient(){
        $this->db->order_by('MONTH(date_creation), YEAR(date_creation)');
        $query = $this->db->get('client');
        return $query->result() ;
    }
    public function updateprofile($data){
        $this->db->where('id' ,1);
        $this->db->update('users', $data);
    }
    public function getInf(){
        $query = $this->db->query("Select * from users") ;
        return $query->result() ;
    }
    public function count_client(){
        return $this->db->count_all('client') ;
    }





}