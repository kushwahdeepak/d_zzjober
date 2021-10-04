<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NOTE: this controller inherits from MY_Controller instead of home_Controller,
// since no authentication is required

class Login extends MY_Controller
{

    public function index()
    {
        $this->load->model('loginmodel');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //	echo password_hash($password, PASSWORD_DEFAULT)."\n";

        $result = $this->loginmodel->verify_login($email, $password);

    

        if ($result == 'Incorrect') {
            $this->session->set_flashdata('error_msg', ' Incorrect credential...');
            redirect('login/loginPage');
        } else if ($result == 'NO_USER_FOUND') {
            $this->session->set_flashdata('error_msg', ' User not found...');
            redirect('login/loginPage');
        } else {
            $this->session->set_userdata('login_data', $result);
            //$this->checkdashboard();
            redirect('admin');
        }


    
    }

    // Dashboard page
    public function checkdashboard()
    {       
        $this->userInfo = $this->session->login_data; 
        if ( $this->userInfo->user_type == "admin") 
        {
            redirect('admin');
        } 
        else if ( $this->userInfo->user_type == "business") 
        {
            redirect('business');
        } 
        else if ( $this->userInfo->user_type == "driver") 
        {
            redirect('driver');
        } 
        else {
            redirect('login/logout');
        }
    }

    // Logout function
    public function logout()
    {
        $this->session->unset_userdata('login_data');
        redirect('login/loginPage');
    }

    /* function for opening login page
    used by logout function of login controller and
    MY_CONTROLLER is_logged_in method
    */
    public function loginPage()
    {
        $this->mViewData['data'] = array(
            'pageName' => "LOGIN",
        );
        $this->render('common/login');
    }

}

?>
