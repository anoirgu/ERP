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

    public function addbonliv($data){
        $this->db->insert('bonlivraison', $data);
    }
    public function deletbon($id){
        $this->db->query("DELETE FROM bonlivraison WHERE id='$id';");
    }
    public function getbonliv(){
        $query = $this->db->query('SELECT * from bonlivraison') ;
        return $query->result() ;
    }


























}