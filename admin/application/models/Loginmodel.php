<?php

Class Loginmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // function verify login credentials
    public function verify_login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('users.user_type', "admin");
        $this->db->where('user_login.email', $email);
        $result = $this->db->get();

        $numrows = $result->num_rows();

        if ($numrows > 0) {
            $row = $result->row();
            if (password_verify($password, $row->password)) {
                return $row;
            } else {
                return "Incorrect";
            }
        } else {
            return "NO_USER_FOUND";
        }
    }

}
