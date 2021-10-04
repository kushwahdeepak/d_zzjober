<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Authentication_worker extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Function for creating user login credentials
     *
     * @param $email
     * @param $password
     * @param $user_id
     * @return bool
     */
    public function createUserLogin($email, $password, $user_id)
    {
        $data = array(
            'email' => $email,
            'password' => $password,
            'user_id' => $user_id,
            'user_status' => 'Active',
            'user_created' => date('Y-m-d H:i:s'),
        );
        if (!$this->db->insert('user_login', $data)) {
            show_error('Error adding user name and password ');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for registration
     *
     * @param $firstname
     * @param $middlename
     * @param $lastname
     * @param $telecom
     * @param $address1
     * @param $city
     * @param $postcode
     * @param $country
     * @param $region
     * @param $email
     * @param $password
     * @param $plan_id
     * @param $expire_date
     * @param $remaining_service
     * @return bool
     */
    public function register($firstname, $middlename, $lastname, $username, $telecom, $address1, $city, $postcode, $country, $region,
                             $email, $password)
    {
        $data = array(
            'first_name' => $firstname,
            'middle_name' => $middlename,
            'last_name' => $lastname,
            'username' => $username,
            'mobile' => $telecom,
            'address' => $address1,
            'city' => $city,
            'country' => $country,
            'state' => $region,
            'zip' => $postcode,
            'user_type' => 'user',
        );
        if (!$this->db->insert('users', $data)) {
            show_error('Error in inserting person data');
            die();
        }
        $user_id = $this->db->insert_id();        
        $this->createUserLogin($email, $password, $user_id);
        return true;
    }


    /**
     * Function for getting free plan info
     *
     * @return mixed
     */
    public function getFreePlanInfo()
    {
        $this->db->select('*');
        $this->db->from('service_plans');
        $this->db->where('plan_id', 1);
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->row();
    }


    /** Function for creating token, used for forgot password
     *
     * @param $token
     * @param $user_id
     * @return bool
     */
    public function createToken($token, $user_id)
    {
        $data = array(
            'user_id' => $user_id,
            'token_code' => $token,
            'from_date' => date('Y-m-d H:i:s')
        );
        if (!$this->db->insert('token', $data)) {
            show_error('Error creating token');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for resetting password
     *
     * @param $model_data
     * @return string
     */
    public function resetPassword($model_data)
    {
        $token = $model_data['token'];
        $con_password = $model_data['con_password'];
        $temppassword = $model_data['password'];
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        if ($con_password != $temppassword) {
            return "notmatched";
        }
        
        $sql = "SELECT `user_id` from `token`  WHERE `token_code`='$token'";
        $row = $this->db->query($sql)->row();
        if (empty($row)) {
            return "false";
        }

        $user_id = $row->user_id;
        $sql1 = "UPDATE `user_login` SET `password` = '$password' WHERE `user_id` ='$user_id'";
        $this->db->query($sql1);

        $sql3 = "DELETE FROM `token` WHERE `token_code`='$token'";
        $this->db->query($sql3);

        return "true";
    }


    /**
     * Function for submitting a contact form
     *
     * @param $model_data
     * @return bool
     */
    public function submitcontact($model_data)
    {
        $data = array(
            'name' => $model_data['name'],
            'email' => $model_data['email'],
            'subject' => $model_data['subject'],
            'review' => $model_data['review'],
            'created_date' => date('Y-m-d H:i:s'),
        );
        if (!$this->db->insert('contact_us', $data)) {
            show_error('Error submiting contact form ');
            die();
        } else {
            return true;
        }
    }

}