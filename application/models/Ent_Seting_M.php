<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ent_Seting_M extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function get_configuration(){
        $query = $this->db->query('SELECT * from societe_Inf') ;
        return $query->result() ;
    }
    public function add_configuration($data){
        $this->db->insert('societe_Inf',$data) ;
    }
    public function update_configuration($data){
        $this->db->where('id',1);
        $this->db->update('societe_Inf',$data);

    }















}