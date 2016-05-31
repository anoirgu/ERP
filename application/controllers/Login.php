<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model('Login_M');

    }

    public function index()
    {  //verefication if he already logged on
            if($this->Logged_in()==1){
                redirect('Dashboard') ;
        }else{
        $this->load->view('Template/Header');
        $this->load->view('Login/Login_Form');}
    }


    public function Logged_in()
    {
        if ($this->session->userdata('logged_in') != null && $_SESSION['is_admin'] == 1) {
                return 1;}
             else//si n'est pas connecter
            return 0;
    }


    /**
     * login function.
     *
     * @access public
     * @return void
     */
    public function login()
    {
        if ($this->Logged_in() == 1) {
            redirect('Dashboard');
        } else {
            // create the data object
            $data = new stdClass();
            // set validation rules
            $this->form_validation->set_rules('email', '', 'trim|required|min_length[6]|max_length[50]|valid_email');
            $this->form_validation->set_rules('password', '', 'required');

            if ($this->form_validation->run() == false) {

                // validation not ok, send validation errors to the view
                $this->load->view('Template/Header');
                $this->load->view('Login/Login_Form', $data);

            } else {

                // set variables from the form
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                if ($this->Login_M->resolve_user_login($email, sha1($password)) == 0) {

                    $user_id = $this->Login_M->get_user_id_from_username($email);
                    $user = $this->Login_M->get_user($user_id);

                    // set session user data
                    $_SESSION['user_id'] = (int)$user->id;
                    $_SESSION['email'] = (string)$user->email;
                    $_SESSION['logged_in'] = (bool)true;
                    $_SESSION['is_admin'] = (int)$user->admin;
                    if ((int)$user->admin == 1) {
                        // user login ok
                        redirect('Dashboard');

                    } else {
                        //$this->load->view('Template/Employee_Default_Page');
                        redirect('Login');
                    }
                } else {

                    // login failed
                    $data->error = "nom d'utilisateur ou mot de passe incorrect ";
                    // send error to the view
                    $this->load->view('Template/Header');
                    $this->load->view('Login/Login_Form', $data);
                }
            }

        }
    }

    //forgot password
    public function Forgot_password(){
        if($this->Logged_in()==1){
            redirect('Dashboard') ;
        }else
        $this->load->view('Login/Forgot_password_form') ;
    }
 public function resetPassowrd()
 {
     if ($this->Logged_in() == 1) {
         redirect('Dashboard');
     } else {
         $data = new stdClass();
         $this->load->library('form_validation');
         $this->form_validation->set_rules('emailRsest', '', 'required|trim|valid_email');
         $email = $this->input->post('emailRsest');
         if ($this->form_validation->run()==false) {
             // validation not ok, send validation errors to the view
             $this->load->view('Template/Header');
             $this->load->view('Login/Forgot_password_form');
         } else {
             if (!$this->Login_M->email_exists($email)) {
                 $data->error = "Email n'existe pas ! ";
                 $this->load->view('Template/Header');
                 $this->load->view('Login/Forgot_password_form', $data);
             } else {
                 $config = array();
                 $config['useragent'] = "CodeIgniter";
                 $config['mailpath'] = "/usr/sbin/sendmail";
                 $config['protocol'] = "smtp";
                 $config['smtp_host'] = "localhost";
                 $config['smtp_port'] = "25";
                 $config['mailtype'] = 'html';
                 $config['charset'] = 'utf-8';
                 $config['newline'] = "\r\n";
                 $config['wordwrap'] = TRUE;
                 $this->load->library('email');
                 $this->email->initialize($config);
                 $password = $this->Login_M->get_user_password($email);
                 $this->email->from('guesmianoir@gmail.com', 'Your Name');
                 $this->email->to($this->input->post('email'));
                 $this->email->subject('Forgotten Password');
                 $message = "<p>This email has been sent as a request to recover your password</p>";
                 $message .= "<p>if you want to reset your password,if not, then ignore</p>";
                 $message .= "<br> <h2>Your Password : </h2> $password ";
                 $this->email->message($message);
                 $this->email->send();
                 echo $this->email->print_debugger();
                 if ($this->email->send()) {
                     $data->success = "An Email has been Send to you  , chek your message ";
                     $this->load->view('Template/Header');
                     $this->load->view('Login/Forgot_password_form', $data);
                 } else {
                     $data->error = "Email  Not Send to you   ";
                     $this->load->view('Template/Header');
                     $this->load->view('Login/Forgot_password_form', $data);
                 }
             }
         }


     }
 }
public function Logout(){

    $this->session->all_userdata();
    $this->session->sess_destroy();
    redirect("Login");

}


}
