<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  Product_M extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function addFournisseur($data){
        $this->db->insert('fournisseur', $data);
    }
public function listeFournisseur(){
    $query = $this->db->query("Select * from fournisseur") ;
    return $query->result() ;
}
    public function getInfFourni($id){
        $query = $this->db->get_where('fournisseur', array('id' => $id)) ;
        return $query->result() ;
    }
    public function getProductFournisseur($id){
        $query = $this->db->get_where('product', array('id_fournisseur' => $id)) ;
        return $query->result();
    }
    public function updatefournisseur($id ,$data){
        $this->db->where('id' ,$id);
        $this->db->update('fournisseur', $data);
    }
    public function deletFournisseur($id){
        $this->db->trans_start();
        $this->db->query("DELETE FROM product WHERE id_fournisseur='$id';");
        $this->db->query("DELETE FROM fournisseur WHERE id='$id';");
        $this->db->trans_complete();
    }
    public function count_Fournisseur(){
        return $this->db->count_all('fournisseur') ;
    }
    public function count_Produit(){
        return $this->db->count_all('product') ;
    }
    public function addProduct($data){
        $this->db->insert('product', $data);
    }
    public function getProductById($id){
        $query = $this->db->get_where('product', array('idp' => $id)) ;
        return $query->result();

    }
    public function updateProduit($id , $data){
        $this->db->where('idp' ,$id);
        $this->db->update('product', $data);

    }
    public function getListProduct(){
        $query = $this->db->query("Select * from product,fournisseur  where id=id_fournisseur order BY (id_fournisseur)");
        return $query->result() ;

    }
    public function deletProduit($id){
        $this->db->query("DELETE FROM product WHERE idp='$id';");
    }














}