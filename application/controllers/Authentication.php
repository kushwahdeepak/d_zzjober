<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('geo/geo_helper');
        $this->load->model('authentication/authentication_helper');
        $this->load->model('authentication/authentication_worker');
    }


    /**
     * Function for submitting a contact form
     */
    public function submitContactForm()
    {
        $model_data  = array(
            'name' => $this->input->post('contactname'),
            'email' => $this->input->post('contactemail'),
            'subject' => $this->input->post('contactsubject'),
            'review' => $this->input->post('contactmessage'),
        );
        $email_data = array(
            'to' => $model_data['email'],
            'subject' => $model_data['subject'],
            'message' => $model_data['review'],
        );
        $this->authentication_worker->submitcontact($model_data);

        $this->sendMail($email_data['to'], "ZZjober", "Obrigado pelo seu comentário, responderemos o mais rápido possível!");

        $msg = "Name: ".$model_data['name']."<br>Email: ".$model_data['email']."<br>Subject: ".$model_data['subject']."<br>Review: ".$model_data['review'];

        $msgsndstatus = $this->sendMailToCompany("atendimento@zzjober.com", $email_data['to'], "Contact Mail", $msg);
        
        if($msgsndstatus)
        {
            $this->session->set_flashdata('success_msg', 'E-mail enviado com sucesso');
            redirect('home/Contato');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'E-mail não enviado');
            redirect('home/Contato');
        }
    }


    /**
     * Function for registering user
     * @access public
     * @return void
     * @work: user registration
     */
    public function registerUser()
    {
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('cpassword');
        $email = $this->input->post('email');

        if($password != $confirm_password) {
            $this->session->set_flashdata('error_msg', 'A senha e a confirmação da senha não correspondem');
            redirect('home/Registrar_Conta');
        }

        if(empty($email)) {
            $this->session->set_flashdata('error_msg', 'O e-mail é obrigado');
            redirect('home/Registrar_Conta');
        }


        /*password encryption*/
        $CURRENT_PASSWORD = password_hash($password, PASSWORD_BCRYPT);

        $firstname = $this->input->post('firstname');
        $middlename = $this->input->post('middlename');
        $lastname = $this->input->post('lastname');
        $username = $this->input->post('username');
        $telecom = $this->input->post('telecom');
        $address1 = $this->input->post('address1');
        $city = $this->input->post('city');
        $postcode = $this->input->post('postcode');
        $country = $this->input->post('country');
        $region = $this->input->post('region');
        $password = $CURRENT_PASSWORD;

        $subject = "Thank you for registering with us";
        $message = "Thank you for registering with us";
        // $status = $this->sendMail($email, $subject, $message);
        $status = true;

        if(!$status) {
            $this->session->set_flashdata('error_msg', 'Diante de algum problema técnico, voltarei em breve');
            redirect('home/Registrar_Conta');
        } else {        
            $this->authentication_worker->register($firstname, $middlename, $lastname, $username, $telecom, $address1, $city, $postcode, $country, $region, $email, $password); 

            $this->session->set_flashdata('success_msg', 'Usuário registrado com sucesso');
            redirect('home/Entrar');
        } 
    }


    /**
     * userLogin
     * @access public
     * @return void
     * @work: login for registered user
     */
    public function userLogin()
    {
        $this->load->model('authentication/authentication_helper');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->authentication_helper->verify_login($email, $password);

        if (!$result) {
            $this->session->set_flashdata('error_msg', 'O nome de usuário ou senha está incorreto');
            redirect('home/Entrar');
        } else if ($result == 'NO_USER_FOUND') {
            $this->session->set_flashdata('error_msg', 'O nome de usuário ou senha está incorreto');
            redirect('home/Entrar');
        } else if ($result->user_status == "Deactive") {
            $this->session->set_flashdata('error_msg', 'O id não foi verificado...Por favor retorne mais tarde!');
            redirect('home/Entrar');
        }  else  {

            $data_update_login = array(
                'user_last_login' => date('Y-m-d H:i:s'),
            );
            $this->db->where('user_id', $result->user_id);
            $this->db->update('users', $data_update_login);

            $this->session->set_userdata('userInfo', $result);
            $this->userInfo = $this->session->userInfo; 

            if ($this->userInfo->user_type == "user")
            {
                $this->session->set_flashdata('success_msg', 'Você fez login com sucesso!');
                redirect("home");
            } 
            else 
            {
               redirect('authentication/logout');
            }
        }
    }


    /**
     *logout
     * @access public
     * @return void
     * @work: logout for user who logged in
     */
    public function logout()
    {   
        $this->session->unset_userdata('userInfo');
        unset($_SESSION['image_array']);
        $this->session->set_flashdata('success_msg', 'Você foi desconectado com sucesso!');
        redirect('home/Entrar');
    }

    
    /**
     *  Function for taking reset password email
     */
    public function forgotPassword()
    {
        $email = $this->input->post('email');
        $token = bin2hex(random_bytes(25));

        $user_id = $this->authentication_helper->checkEmail($email);

        if (isset($user_id) && !empty($user_id)) 
        {
            $status = $this->authentication_worker->createToken($token, $user_id);
            if ($status) {
                $to_email = $email;
                $subject = "Redefina sua senha";
                $url = site_url('authentication/resetNewPassword' . "?token=" . $token);
                $message = "Redefina sua senha da ZZjober clicando no link<br/><a href='" . $url. "'>".$url."</a>";
                $this->sendMail($to_email, $subject, $message);
                $this->session->set_flashdata('success_msg', 'Verifique seu e-mail para redefinir sua nova senha através do link');
                redirect('home/Entrar');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'E-mail não encontrado');
            redirect('home/Entrar');
        }

    }


    /**
     *  Function for getting reset password page
     */
    public function resetNewPassword()
    {
        $data = array(
            'pageName' => 'RESETNEWPASSWORD',
            'token' => $this->input->get('token'),
        );
        $this->load->view('content_handler', $data);
    }


    /**
     *  Function for resetting a password
     */
    public function resetPassword()
    {
        $model_data = array(
            'token' => $this->input->post('token'),
            'password' => $this->input->post('password'),
            'con_password' => $this->input->post('con_password'),
        );
        $status = $this->authentication_worker->resetPassword($model_data);
        
        if ($status == "true") {
            $this->mViewData['data'] = array(
                'pageName' => "LOGIN",
            );
            $this->session->set_flashdata('success_msg', 'Senha alterada com sucesso');
            redirect('home/Entrar');
        } else {
            $this->session->set_flashdata('error_msg', 'Erro ao redefinir a senha');
            $this->mViewData['data'] = array(
                'pageName' => "LOGIN",
            );
            redirect('home/Entrar');
        }
    }


    /**
     *  Function for resetting customer password
     */
    public function updateCustomerPassword()
    {
        $sess_array = $this->session->userdata('sess_array');
        $party_id = $sess_array['party_id'];

        $model_data = array(
            'currentpwd' => $this->input->post('currentpwd'),
            'newpwd' => $this->input->post('newpwd'),
            'confirmnewpwd' => $this->input->post('confirmnewpwd'),
        );

        if ($model_data['newpwd'] != $model_data['confirmnewpwd']) {
            $this->session->set_flashdata('error_msg', 'A senha e a confirmação da senha não correspondem');
            redirect('home/customer_dashboard?profile_tab=change_password');
        }

        $state = $this->party_helper->checkPassword($party_id,$model_data['currentpwd']);
        if(!$state)
        {
            $this->session->set_flashdata('error_msg', 'Digite uma senha atual válida');
            redirect('home/customer_dashboard?profile_tab=change_password');
        }

        $state1 = $this->party_helper->checkPassword($party_id,$model_data['newpwd']);
        if($state1)
        {
            $this->session->set_flashdata('error_msg', 'A senha e a nova senha não podem ser iguais');
            redirect('home/customer_dashboard?profile_tab=change_password');
        }

        $this->load->model('authentication/authentication_helper');
        $status = $this->authentication_helper->changepassword($model_data);

        if ($status == 1) {
            $this->session->set_flashdata('success_msg', 'Senha alterada com sucesso');
            $this->session->unset_userdata('sess_array');
            redirect('home/Entrar');
        }
    }


    


    /** 
     * Generic function used for sending mail
     *
     * @param $to
     * @param $subject
     * @param $message
     * @return bool
     */
    public function sendMail($to, $subject, $message)
    {
        $this->load->library('email');
        
         $config = Array(
           'protocol' => 'smtp',
           'smtp_host' => 'ssl://zzjober.com',
           'smtp_port' => 465,
           'smtp_user' => 'atendimento@zzjober.com',
           'smtp_pass' => 'Checkebra%',
           'mailtype'  => 'html',
           'charset'   => 'utf-8'
       );

        $this->email->initialize($config);
        $this->email->from('atendimento@zzjober.com', 'ZZjober');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_newline("\r\n");

         if(!$this->email->send()) {
           // print error message, in case of any issue
           // print_r($this->email->print_debugger());
           return false;
        } else {
           
           return true;   
        // response for sending successful mail
       }
    }


    /** 
     * Generic function used for sending mail
     *
     * @param $to
     * @param $subject
     * @param $message
     * @return bool
     */
    public function sendMailToCompany($to, $replyto, $subject, $message)
    {
        $this->load->library('email');
        
         $config = Array(
           'protocol' => 'smtp',
           'smtp_host' => 'ssl://zzjober.com',
           'smtp_port' => 465,
           'smtp_user' => 'atendimento@zzjober.com',
           'smtp_pass' => 'Checkebra%',
           'mailtype'  => 'html',
           'charset'   => 'utf-8'
       );

        $this->email->initialize($config);
        $this->email->from('atendimento@zzjober.com', 'ZZjober');
        $this->email->to($to);
        $this->email->reply_to($replyto);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_newline("\r\n");

         if(!$this->email->send()) {
           // print error message, in case of any issue
           // print_r($this->email->print_debugger());
           return false;
        } else {
           return true;   
        // response for sending successful mail
       }
    }


    /**
     * Function for checking email id is present or not
     *
     * @return string
     */
    public function checkRegisteredEmail()
    {
        $email = $this->input->post('email');

        $user_login_id = $this->authentication_helper->checkEmail($email);
        
        if (isset($user_login_id) && !empty($user_login_id)) {
            echo json_encode(true);
        }
        else
        {
            echo json_encode(false);
        }
    }


    /**
     * Function for checking email id is present or not
     *
     * @return string
     */
    public function checkEmail()
    {
        $email = $this->input->post('email');

        $user_login_id = $this->authentication_helper->checkEmail($email);

        if (isset($user_login_id) && !empty($user_login_id)) {
            echo json_encode(false);
        }
        else
        {
            echo json_encode(true);
        }
    }


    /**
     * Function for checking email id is present or not
     *
     * @return string
     */
    public function checkUsername()
    {
        $username = $this->input->post('username');

        $user_login_id = $this->authentication_helper->checkUsername($username);

        if (isset($user_login_id) && !empty($user_login_id)) {
            echo json_encode(false);
        }
        else
        {
            echo json_encode(true);
        }
    }


    /**
     * Function for checking email id is present or not for forget password
     *
     * @return string
     */
    public function checkEmailAvailability()
    {
        $email = $this->input->post('email');

        $user_login_id = $this->authentication_helper->checkEmail($email);
        if (isset($user_login_id) && !empty($user_login_id)) {
            echo json_encode(true);
        }
        else
        {
            echo json_encode(false);
        }
    }

}