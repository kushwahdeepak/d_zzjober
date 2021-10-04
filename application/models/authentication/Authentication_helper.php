<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Authentication_helper extends CI_Model
{

    /**
     * Function for getting login information
     *
     * @param $user_id
     * @return mixed
     */
    public function getLoginInfo($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('user_id', $user_id);
        return  $this->db->get()->row();
    }


    /**
     * Function to verify password
     *
     * @param $user_id
     * @param $currentpassword
     * @return bool
     */
    public function verify_pass($user_id, $currentpassword)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get()->row();
        if (password_verify($currentpassword, $result->password)) {
            return true;
        } else{
            return false;
        }
    }


    /**
     * Function to checking email id is present in db or not
     *
     * @param $email_id
     * @return bool
     */
    public function checkEmail($email_id)
    {
        if ($email_id == null) {
            return false;
        } else {
            $this->db->select('*');
            $this->db->from('user_login');
            $this->db->where('email', $email_id);
            $this->db->where('user_deleted', '0000-00-00 00:00:00');
            if (!$this->db->get()) {
                return false;
            } else {
                $this->db->select('*');
                $this->db->from('user_login');
                $this->db->where('email', $email_id);
                $this->db->where('user_deleted', '0000-00-00 00:00:00');
                $result = $this->db->get()->row();
                if (!empty($result)) {
                    return $result->user_id;
                }
                return false;
            }
        }
    }


    /**
     * Function to checking email id is present in db or not
     *
     * @param $email_id
     * @return bool
     */
    public function checkUsername($username)
    {
        $user_id = null;
        if(!empty($this->session->userdata('userInfo')))
        {
            $sess_array = $this->session->userdata('userInfo');
            $user_id = $sess_array->user_id;
        }

        if ($username == null) {
            return false;
        } else {
            $this->db->select('users.user_id');
            $this->db->from('users');
            $this->db->join('user_login', 'users.user_id = user_login.user_id');
            $this->db->where('username', $username);
            $this->db->where('user_deleted', '0000-00-00 00:00:00');
            if (!$this->db->get()) {
                return false;
            } else {
                $this->db->select('users.user_id');
                $this->db->from('users');
                $this->db->join('user_login', 'users.user_id = user_login.user_id');
                $this->db->where('username', $username);
                if(!empty($user_id))
                {
                    $this->db->where('users.user_id !=', $user_id);
                }
                $this->db->where('user_deleted', '0000-00-00 00:00:00');
                $result = $this->db->get()->row();
                if (!empty($result)) {
                    return $result->user_id;
                }
                return false;
            }
        }
    }


    /**
     * Function to verify username and password
     *
     * @param $email
     * @param $password
     * @return string
     */
    public function verify_login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $this->db->join('users', 'users.user_id = user_login.user_id');
        $this->db->where('users.user_type', 'user');
        $this->db->where('user_deleted', '0000-00-00 00:00:00');
        $result = $this->db->get();

        $numrows = $result->num_rows();


        if ($numrows == 1) {
            $row = $result->row();

            if (password_verify($password, $row->password)) {

                $user_id = $row->user_id;
                $this->db->select('*');
                $this->db->from('users');
                $this->db->join('user_login', 'user_login.user_id = users.user_id');
                $this->db->where('users.user_id', $user_id);
                $this->db->where('user_type', 'user');
                if (!$this->db->get()) {
                    show_error('Error in username or password');
                    die();
                } else {
                    $this->db->select('*');
                    $this->db->from('users');
                    $this->db->join('user_login', 'user_login.user_id = users.user_id');
                    $this->db->where('user_type', 'user');
                    $this->db->where('users.user_id', $user_id);
                    return $this->db->get()->row();
                }
            }
        } else {
            return "NO_USER_FOUND";
        }
        return false;
    }


    /**
     * Function to verify email
     *
     * @param $email
     * @return bool|int
     */
    public function verify_email($email) {
        $this->db->select('*');
        $this->db->from('contact_mech');
        $this->db->where('info_string', $email);
        $result = $this->db->get();
        $numrows = $result->num_rows();

        if ($numrows > 1) {
            return 0;
        } else {
            return true;
        }
    }


    /**
     * Function to change password of any user
     *
     * @param $model_data
     * @return bool
     */
    public function changepassword($model_data)
    {
        $sess_array = $this->session->userdata('sess_array');
        $party_id = $sess_array['party_id'];

        $temppassword = $model_data['newpwd'];
        $password = password_hash($temppassword, PASSWORD_BCRYPT);

        $sql = "UPDATE `user_login` SET `current_password` = '$password' WHERE `party_id` = '$party_id'";
        if(!$this->db->query($sql)) {
            show_error('Error updating password');
            die();
        }
        return true;
    }


    /**
     * Function to checking freelancer email id is present in db or not
     *
     * @param $email_id
     * @return bool
     */
    public function checkFreelancerEmail($email_id)
    {
        if ($email_id == null) {
            return false;
        } else {
            $this->db->select('*');
            $this->db->from('contact_mech cm');
            $this->db->join('party_contact_mech pcm', 'pcm.contact_mech_id = cm.contact_mech_id');
            $this->db->join('party_role pr', 'pr.party_id = pcm.party_id');
            $this->db->where('pr.role_type_id', 'freelancer');
            $this->db->where('cm.info_string', $email_id);
            if (!$this->db->get()) {
                return false;
            } else {
                $this->db->select('*');
                $this->db->from('contact_mech cm');
                $this->db->join('party_contact_mech pcm', 'pcm.contact_mech_id = cm.contact_mech_id');
                $this->db->join('party_role pr', 'pr.party_id = pcm.party_id');
                $this->db->where('pr.role_type_id', 'freelancer');
                $this->db->where('cm.info_string', $email_id);
                $result = $this->db->get()->row();
                if (!empty($result)) {
                    return $this->getUserLoginId($email_id);
                }
                return false;
            }
        }
    }


    /**
     * Function to checking Specialisms id is present in db or not
     *
     * @param $specialisms
     * @return bool
     */
    public function checkRequestSpecialisms($specialisms)
    {
        if ($specialisms == null) {
            return false;
        } else {
            $this->db->select('*');
            $this->db->from('skill_type');
            $this->db->where('lower(description)', strtolower($specialisms));
            if (!$this->db->get()) {
                return false;
            } else {
                $this->db->select('*');
                $this->db->from('skill_type');
                $this->db->where('lower(description)', strtolower($specialisms));
                $result = $this->db->get()->row();
                if (!empty($result)) {
                    return $result->skill_type_id;
                }
                return false;
            }
        }
    }


    /**
     * Check token and username for authenticity
     *
     * @param $token
     * @param $username
     * @return bool
     */
    public function checkTokenUsername($token, $username, $password)
    {
        $this->db->select('*');
        $this->db->from('token');
        $this->db->where('token_id', $token);
        $this->db->where('user_login_id', $username);

        if (!$this->db->get()) {
            show_error('Error in executing this query');
            die();
        } else {
            $query = $this->db->get();
            if ($query->num_rows() != 0) {
                $this->load->model('party/party_worker');
                if ($this->updatePassword($username, $password)) {
                    return true;
                }
            } else {
                return false;
            }
        }
        return false;
    }


    /**
     * Function for getting about us information
     *
     * @return mixed
     */
    public function getAboutUs()
    {
        $this->db->select('*');
        $this->db->from('about_us');
        return $this->db->get()->row();
    }


    /**
     * Function for getting features
     *
     * @return mixed
     */
    public function getFeatures()
    {
        $this->db->select('*');
        $this->db->from('features');
        return $this->db->get()->result();
    }


    /**
     * Function for getting FAQ list
     *
     * @return mixed
     */
    public function getfaqsList()
    {
        $this->db->select('*');
        $this->db->from('faqs');
        $this->db->where('status =', '1');
        return $this->db->get()->result();
    }


    /**
     * Function for getting privacy policy
     *
     * @return mixed
     */
    public function getPrivacyPolicy()
    {
        $this->db->select('*');
        $this->db->from('privacy_policy');
        return $this->db->get()->row();
    }


    /**
     * Function for getting terms and conditions
     *
     * @return mixed
     */
    public function getTermCondition()
    {
        $this->db->select('*');
        $this->db->from('term_condition');
        return $this->db->get()->row();
    }


    /**
     * Function for getting how it works information
     *
     * @return mixed
     */
    public function getWorking()
    {
        $this->db->select('*');
        $this->db->from('how_it_works');
        return  $this->db->get()->row();
        
    }


    /**
     * Function for getting all product list
     *
     * @return mixed
     */
    public function getAllProductList()
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('user_plans. expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->group_by('product.product_id');
        return  $this->db->get()->result();
    }
    

    /**
     * Function for getting all product list
     *
     * @return mixed
     */
    public function getAllNewProductList($user_id)
    {
        $currentdate = date('Y-m-d');

        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('product_status', 'enabled');
        $this->db->where('user_plans.expire_date >=', $currentdate);
        $this->db->where('product_deleted_date', '0000-00-00');
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->group_by('product.product_id');
        $this->db->order_by('product.product_created_date','DESC');
        return $this->db->get()->result();
    }

    /**
     * Function for getting all product list
     *
     * @return mixed
     */
    public function getAllNewHistoryProductList($user_id="")
    {
        if($user_id!=""){
            $this->db->select('product.*, product_category.*,product_sub_category.*');
            $this->db->from('product');
            $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
            $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
            
            // $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
            $this->db->join('history_product','history_product.product_id=product.product_id');
            
            // $this->db->where('user_plans.deleted_date', "0000-00-00");
            $this->db->where('product.product_status', "enabled");
            $this->db->where('product.product_deleted_date', "0000-00-00");
            
            $this->db->where('history_product.user_id', $user_id);

            $this->db->group_by('product.product_id');
            $this->db->order_by('history_product.h_id','DESC');
            $this->db->limit(20);
            return  $this->db->get()->result();
        }else{
            return array();
        }
    }

    /**
     * Function for getting product list
     *
     * @param $user_id
     * @return mixed
     */
    public function getProductList($user_id)
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00"); 
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->group_by('product.product_id');
        return $this->db->get()->result();
    }

    /**
     * Function for getting product list
     *
     * @param $user_id
     * @return mixed
     */
    public function getAllCategoryProductList($user_id,$category_id)
    {   
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product_category.product_category =', $category_id);
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->group_by('product.product_id');
        return $this->db->get()->result();
    }




    /**
     * Function for getting product info by price
     *
     * @param $from_price
     * @param $to_price
     * @return mixed
     */
    public function getProductInfoByPrice($from_price, $to_price)
    {
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_price >=', $from_price);
        $this->db->where('product.product_price <=', $to_price);
        $this->db->where('product.product_deleted_date', "0000-00-00");
        return   $this->db->get()->result();

    }


    /**
     * Function for getting product info by subcategory
     *
     * @param $subcat_id
     * @return mixed
     */
    public function getProductInfoBysubcategory($subcat_id)
    {
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product_sub_category.product_subcategory', $subcat_id);
        $this->db->where('product.product_deleted_date', "0000-00-00");
        return  $this->db->get()->result();
    }


    public function getFeaturedProductList()
    {

        $currentdate = date('Y-m-d');
        $this->db->select('feedback.*,product.*,AVG(rating) as cnt');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');
        $this->db->join('feedback','feedback.product_id=product.product_id', 'left'); 

        // if (!empty($user_id)) {
        //     $this->db->where('product.user_id !=', $user_id);    
        // }

        $this->db->where('feedback.provider_user_id', 0);
        $this->db->where('expire_date >=', $currentdate);
        $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->group_by('feedback.product_id');
        $this->db->order_by('cnt',"DESC");
        $this->db->limit("8");
        return $this->db->get()->result();
    }


    // public function getBestSellerProductList($user_id)
    // {

    //     $currentdate = date('Y-m-d');
    //     $this->db->select('product_invoice.*,product.*,COUNT(product_invoice.product_id) as cnt');
    //     $this->db->from('product');
    //     $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');
    //     $this->db->join('product_invoice','product_invoice.product_id=product.product_id', 'left'); 

    //     if (!empty($user_id)) {
    //         $this->db->where('product.user_id !=', $user_id);    
    //     }

    //     $this->db->where('client_status !=', "Cancel");
    //     $this->db->where('provider_status !=', "Cancel");
    //     $this->db->where('client_status !=', "Pending");
    //     $this->db->where('provider_status !=', "Pending");

    //     $this->db->where('expire_date >=', $currentdate);
    //     $this->db->where('user_plans.deleted_date', "0000-00-00");
    //     $this->db->where('product.product_status', "enabled");
    //     $this->db->where('product.product_deleted_date', "0000-00-00");
    //     $this->db->group_by('product_invoice.product_id');
    //     $this->db->order_by('cnt',"DESC");
    //     $this->db->limit("10");
    //     return $this->db->get()->result();
    // }


    public function getBestSellerProductList($user_id)
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00");s
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->group_by('product.product_id');
    //    $this->db->order_by('product.product_created_date','ASC');
        return  $this->db->get()->result();
    }

    public function getTestimonialInfo($user_id)
    {
        $this->db->select('*');
        $this->db->from('testimonial');
        $this->db->where('user_id', $user_id);
        return  $this->db->get()->row();
    }

    public function getAllTestimonialInfo()
    {
        $this->db->select('*');
        $this->db->from('testimonial');
        return  $this->db->get()->result();
    }

    /**
     * Function for getting favourite product list
     *
     * @param $user_id
     * @return mixed
     */
    public function getfavouriteProductList($user_id)
    {
        $currentdate = date('Y-m-d');
        $this->db->select('tbl_user_fav.*,product.*');
        $this->db->from('tbl_user_fav');
        $this->db->join('product','product.product_id=tbl_user_fav.user_product_id', 'left');
        $this->db->where('tbl_user_fav.user_id', $user_id);
        return $this->db->get()->result();
    }
     /**
     * Function for getting favourite product list
     *
     * @param $user_id
     * @return mixed
     */

     public function getUserProductList()
     {
        $currentdate = date('Y-m-d');

        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('product_status', 'enabled');
        $this->db->where('user_plans.expire_date >=', $currentdate);
        $this->db->where('product_deleted_date', '0000-00-00');
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->group_by('product.product_id');
        return $this->db->get()->result();
    }
    
    /**
     * Function for getting favourite product list
     *
     * @param $user_id
     * @return mixed
     */

    public function AllProductList()
    {
        $this->db->select('*');
        $this->db->from('product');
        return  $this->db->get()->result();
    }
    
    
    /**
     * Function forinsert history product
     *
     * @param $user_id
     * @return mixed
     */

    public function insert_history($data)
    {  
        $this->db->insert('history_product',$data);
        if($this->db->affected_rows()>0):
            return true;
        else:
            return false;
        endif;
    }

    public function clear_all_history($user_id)
    {  
        $this->db->where('user_id', $user_id);
        $this->db->delete('history_product');
        if($this->db->affected_rows()>0):
            return true;
        else:
            return false;
        endif;
    }

    public function clear_favorite($user_id, $product_id)
    {  
        $this->db->where('user_id', $user_id);
        $this->db->where('user_product_id', $product_id);
        $this->db->delete('tbl_user_fav');
        if($this->db->affected_rows()>0):
            return true;
        else:
            return false;
        endif;
    }

    public function counting_services($id){
       $this->db->select('product_id,no_of_click');
       $this->db->from('product');
       $this->db->where('product_id', $id);
       return  $this->db->get()->row_array();
   }

   public function counting_add($id,$click)
   {
    $data = array(
     'no_of_click' => $click
 );

    $this->db->where('product_id', $id);
    $this->db->update('product', $data); 
    if($this->db->affected_rows()>0):
        return true;
    else:
        return false;
    endif;

}

public function wanted_service()
{
    $currentdate = date('Y-m-d');

    $this->db->select('product.product_id,product.time_price_check,product.product_price,product.product_name,product_image.product_image_name');
    $this->db->from('product');
    $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
    $this->db->join('product_image','product_image.product_id = product.product_id','left');
    $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
    $this->db->where('product_status', 'enabled');
    $this->db->where('user_plans.expire_date >=', $currentdate);
    $this->db->where('product_deleted_date', '0000-00-00');
    $this->db->where('user_login.user_deleted', "0000-00-00");
    $this->db->group_by('product.product_id');
    $this->db->order_by("product.no_of_click", "desc");
    return $this->db->get()->result();
}

public function wanted_allservice(){
    $currentdate = date('Y-m-d');
    $this->db->select('product.product_id,product.time_price_check,product.product_price,product.product_name,product_image.product_image_name');
    $this->db->from('product');
    $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
    $this->db->join('product_image','product_image.product_id = product.product_id','left');
    $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
    $this->db->where('user_plans. expire_date >=', $currentdate);
    // $this->db->where('user_plans.deleted_date', "0000-00-00");
    $this->db->where('user_login.user_deleted', "0000-00-00");
    $this->db->where('product.product_status', "enabled");
    $this->db->where('product.product_deleted_date', "0000-00-00");
    $this->db->order_by("product.no_of_click", "desc");
    $this->db->group_by('product.product_id');
    return  $this->db->get()->result();
}

public function new_servicesList(){
    $currentdate = date('Y-m-d');
    $this->db->select('product.product_id,product.time_price_check,product.product_price,product.product_name,product_image.product_image_name');
    $this->db->from('product');
    $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
    $this->db->join('product_image','product_image.product_id = product.product_id','left');
    $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
    $this->db->where('user_plans. expire_date >=', $currentdate);
    // $this->db->where('user_plans.deleted_date', "0000-00-00");
    $this->db->where('user_login.user_deleted', "0000-00-00");
    $this->db->where('product.product_status', "enabled");
    $this->db->where('product.product_deleted_date', "0000-00-00");
    $this->db->order_by("product.product_id", "desc");
    $this->db->group_by('product.product_id');
    return  $this->db->get()->result();
}


public function getServiceRecord($record){
    $currentdate = date('Y-m-d');
    $this->db->select('product.product_id,product.time_price_check,product.product_price,product.product_name,product_image.product_image_name');
    $this->db->from('product');
    $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
    $this->db->join('product_image','product_image.product_id = product.product_id','left');
    $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
    $this->db->where('user_plans. expire_date >=', $currentdate);
    // $this->db->where('user_plans.deleted_date', "0000-00-00");
    $this->db->where('user_login.user_deleted', "0000-00-00");
    $this->db->where('product.product_status', "enabled");
    $this->db->where('product.product_deleted_date', "0000-00-00");
    $this->db->where('product.product_id', $record);
    $this->db->order_by("product.no_of_click", "desc");
    $this->db->group_by('product.product_id');
    return  $this->db->get()->result();
}
}