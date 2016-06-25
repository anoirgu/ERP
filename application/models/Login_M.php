<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 *
 * @extends CI_Model
 */
class Login_M extends CI_Model {

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }



    /**
     * resolve_user_login function.
     *
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function resolve_user_login($email, $password) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $hash = $this->db->get()->row('password');

        return strcmp($password,$hash);

    }
    public function resolve_user_login_username($email, $password) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('username', $email);
        $hash = $this->db->get()->row('password');

        return strcmp($password,$hash);

    }

    /**
     * get_user_id_from_username function.
     *
     * @access public
     * @param mixed $username
     * @return int the user id
     */
    public function get_user_id_from_email($email) {

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('email', $email);

        return $this->db->get()->row('id');

    }
    public function get_user_id_from_username($email) {

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username', $email);

        return $this->db->get()->row('id');

    }

    public function get_user_password($email) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email', $email);

        return $this->db->get()->row('password');
    }
    public function email_exists($email){

        $query = $this->db->query("SELECT email FROM users WHERE email='".$email."' ");
        if($row = $query->row()){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    /**
     * get_user function.
     *
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function get_user($user_id) {

        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get()->row();

    }

    /**
     * hash_password function.
     *
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password) {

        return password_hash($password, PASSWORD_BCRYPT);

    }

    /**
     * verify_password_hash function.
     *
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {

        return password_verify($password, $hash);

    }

}
