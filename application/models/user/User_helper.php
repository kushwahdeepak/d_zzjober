<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_helper extends CI_Model
{

    // get user invoice product details
    public function getUserInvoiceProduct($user_id)
    {
        $this->db->select('*');
        $this->db->from('invoices');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result();
    }


    // get invoice product details
    public function getInvoiceProduct($invoice_id)
    {
        $this->db->select('*');
        $this->db->from('product_invoice');
        $this->db->where('invoice_id', $invoice_id);
        return $this->db->get()->result();
    }


    // Get invoice products of a user
    public function getAllocatedUserInvoiceProducts($invoice_id, $user_id)
    {
        $this->db->select('invoice_and_product_invoice.*');
        $this->db->from('invoice_and_product_invoice');
        $this->db->join('product','product.product_id=invoice_and_product_invoice.product_id');
        $this->db->where('invoice_and_product_invoice.invoice_id', $invoice_id);
        $this->db->where('product.user_id', $user_id);
        return  $this->db->get()->result();
    }

    public function getUserProductStatus($product_invoice_id)
    {
        $this->db->select('*');
        $this->db->from('product_invoice');
        $this->db->where('product_invoice_id', $product_invoice_id);
        return $this->db->get()->row();
    }


    /**
     * Function for getting active plans
     *
     * @return mixed
     */
    public function getPlanInfo()
    {
        $this->db->select('*');
        $this->db->from('service_plans');
        $this->db->where('plan_status', 'Active');
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->result();
    }

    public function getSinglePlanInfo($plan_id)
    {
        $this->db->select('*');
        $this->db->from('service_plans');
        $this->db->where('plan_id', $plan_id);
        $this->db->where('plan_status', 'Active');
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->row();
    }


    /**
     * Function for getting user's plan
     *
     * @param $user_id
     * @param $plan_id
     * @return mixed
     */
    public function getUserPlan($user_id, $plan_id)
    {
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        $this->db->where('plan_id', $plan_id);
        return $this->db->get()->row();
    }

    public function getUserSinglePlanInfo($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }


    /**
     * Function for counting user's plan
     *
     * @param $user_id
     * @return mixed
     */
    public function countUserPlan($user_id)
    {
        $current_date = date('Y-m-d H:i:s');
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        $this->db->where('expire_date >=', $current_date);
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->num_rows();
    }


    /**
     * Function for getting user's plan information
     *
     * @param $user_id
     * @return mixed
     */
    public function getUserPlanInfo($user_id)
    {
        $current_date = date('Y-m-d H:i:s');
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        $this->db->where('expire_date >=', $current_date);
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->row();
    }


    /**
     * Function for getting user's plan information
     *
     * @param $user_id
     * @return mixed
     */
    public function getUserPlanForAddProductInfo($user_id)
    {
        $current_date = date('Y-m-d H:i:s');
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        // $this->db->where('expire_date >=', $current_date);
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->row();
    }


    /**
     * Function for counting user's product
     *
     * @param $user_id
     * @return mixed
     */
    public function countUserProduct($user_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->num_rows();
    }


    /**
     * Function for getting users basic information
     *
     * @param $user_id
     * @return mixed
     */
    public function getUserBasicInfo($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        return  $this->db->get()->row();
    }


    /**
     * Function for getting user login info with user id
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

    public function getUserBasicPlanInfo($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_plans');
         $this->db->join('service_plans','service_plans.plan_id=user_plans.plan_id', 'left');
        $this->db->where('user_id', $user_id);
        $this->db->where('user_plans.deleted_date', '0000-00-00 00:00:00');
        return  $this->db->get()->row();
    }


    /**
     * Function for getting activated categories
     *
     * @return mixed
     */
    public function getCategory()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_status', 'Active');
        $this->db->where('category_deleted', '0000-00-00 00:00:00');
        return  $this->db->get()->result();
    }


    /**
     * Function for getting activated subcategories of a category
     *
     * @param $category_id
     * @return mixed
     */
    public function getSubCategory($category_id)
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('category_id', $category_id);
        $this->db->where('subcategory_status', 'Active');
        $this->db->where('subcategory_deleted', '0000-00-00 00:00:00');
        return  $this->db->get()->result();
    }

    /**
     * Function for getting all product list
     *
     * @return mixed
     */
    public function getAllProductListByCategoryID($catID)
    {
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        // $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product_category.product_category', $catID);
        // $this->db->group_by('product.product_id');
        // echo $this->db->last_query();exit;
        return  $this->db->get()->result();
    }


    /**
     * Function for getting activated products of a user
     *
     * @param $user_id
     * @return mixed
     */
    public function getProductList($user_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('user_id', $user_id);
        $this->db->where('product_status', 'enabled');
        $this->db->where('product_deleted_date', '0000-00-00');
        return  $this->db->get()->result();
    }


    /**
     * Function for getting non deleted products of a user
     *
     * @param $user_id
     * @return mixed
     */
    public function getUserProductList($user_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('product.user_id', $user_id);
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        return  $this->db->get()->result();
    }

    // get others user product list
    public function getOtherUserProductList($user_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('user_id !=', $user_id);
        $this->db->where('product_deleted_date', '0000-00-00');
        return  $this->db->get()->result();
    }


    /**
     * Function for getting users cart products
     *
     * @param $user_id
     * @return mixed
     */
    public function getCartProductList($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_cart');
        $this->db->where('user_id', $user_id);
        $this->db->where('user_cart_deleted_date', '0000-00-00');
        return  $this->db->get()->result();
    }


    /**
     * Function for getting a product detail
     *
     * @param $product_id
     * @return mixed
     */
    public function getProductDetail($product_id)
    {
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->where('product.product_id', $product_id);
        return  $this->db->get()->row();
    }

    /**
     * Function for getting a product detail
     *
     * @param $product_id
     * @return mixed
     */
    public function getProductDetailForFrontEnd($product_id)
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->where('user_plans. expire_date >=', $currentdate);
        $this->db->where('product.product_id', $product_id);
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        return  $this->db->get()->row();
    }

    public function getProductRegisterName($user_id)
    {
        $this->db->select('users.first_name,users.middle_name,users.last_name,users.username,users.user_img');
        $this->db->from('users');
        $this->db->where('users.user_id', $user_id);
        return  $this->db->get()->row();
    }

     /**
     * Function for getting a product detail
     *
     * @param $product_id
     * @return mixed
     */
    public function getProductListByCategory($product_category_id="",$user_id="", $product_id="")
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        
        $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');

        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');

        $this->db->where('expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00");

        $this->db->where('product_category.product_category', $product_category_id);

        if (!empty($user_id)) {
            $this->db->where('product.user_id !=', $user_id);
        }

        if (!empty($product_id)) {
            $this->db->where('product.product_id !=', $product_id);
        }

        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->group_by('product.product_id');
        $this->db->limit("8");
        return  $this->db->get()->result();
    }


    /**
     * Function for getting a product images
     *
     * @param $product_id
     * @return mixed
     */
    public function getProductImages($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_image');
        $this->db->where('product_id', $product_id);
        return $this->db->get()->result();
    }


    /**
     * Function for getting product front images
     *
     * @param $product_id
     * @return mixed
     */
    public function getProductFrontImages($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_image');
        $this->db->where('product_id', $product_id);
        $this->db->limit(2);
        return $this->db->get()->result();
    }


    /**
     * Function for getting one image of a product
     *
     * @param $product_id
     * @return mixed
     */
    public function getOneProductImage($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_image');
        $this->db->where('product_id', $product_id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }


    /**
     * Function for getting booking list of a user
     *
     * @param $user_id
     * @return array
     */
    public function getBookingList($user_id)
    {
        $invoice_id_array = array();
        $user_product_list = $this->getUserProductList($user_id);

        if(isset($user_product_list) && !empty($user_product_list))
        {
            foreach ($user_product_list as $product)
            {
                $this->db->select('invoice_id');
                $this->db->from('product_invoice');
                $this->db->where('product_id', $product->product_id);
                $invoice_ids = $this->db->get()->result_array();

                if(isset($invoice_ids) && !empty($invoice_ids)) {
                    foreach ($invoice_ids as $invoice_id) {
                        if(!in_array($invoice_id['invoice_id'], $invoice_id_array)) {
                            $invoice_id_array[] = $invoice_id['invoice_id'];
                       }
                    }
                }
            }
        }

        return $invoice_id_array;
    }


    /**
     * Function for getting booking list of a user
     *
     * @param $invoice_id
     * @return object
     */
    public function getInvoice($invoice_id)
    {
        $this->db->select('*');
        $this->db->from('invoices');
        $this->db->where('invoice_id', $invoice_id);
        $invoice = $this->db->get()->row();

        return $invoice;
    }

    public function checkUserPlan($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        $this->db->where('remaining_service !=', 0);
        $this->db->where('deleted_date', "0000-00-00 00:00:00");
        return $this->db->get()->row();
    }

    public function UpdateCheckUserPlan($user_id)
    { 
        $currentdate = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        $this->db->where('expire_date >=', $currentdate);
        $this->db->where('deleted_date', "0000-00-00 00:00:00");
        return $this->db->get()->row();
    }

    public function getCustomerFeedbackDetail($product_invoice_id)
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('product_invoice_id', $product_invoice_id);
        $this->db->where('provider_user_id', 0);
        return $this->db->get()->row();
    }

    public function getProviderFeedbackDetail($product_invoice_id)
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('product_invoice_id', $product_invoice_id);
        $this->db->where('client_user_id', 0);
        return $this->db->get()->row();
    }

    public function getclientReviewedInfo($feedback_id)
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('feedback_id', $feedback_id);
        return $this->db->get()->row();
    }

     public function getBestSellerProductList()
    {

        $currentdate = date('Y-m-d');
        $this->db->select('product_invoice.product_id,COUNT(product_invoice.product_id) as cnt');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');
        $this->db->join('product_invoice','product_invoice.product_id=product.product_id', 'left'); 

        $this->db->where('client_status !=', "Cancel");
        $this->db->where('provider_status !=', "Cancel");
        $this->db->where('client_status !=', "Pending");
        $this->db->where('provider_status !=', "Pending");
        
        $this->db->where('expire_date >=', $currentdate);
        $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->group_by('product_invoice.product_id');
        $this->db->order_by('cnt',"DESC");
        $this->db->limit("8");
        return $this->db->get()->result();
    }


    public function getFeaturedCategoryList()
    {
        $this->db->select('*');
        $this->db->from('category');
       // $this->db->join('product_category','product_category.product_category=category.category_id', 'left');
     //   $this->db->where_in('product_id',$result);
        $this->db->where('category_status', 'Active');
        $this->db->where('category_deleted', '0000-00-00 00:00:00');
       // $this->db->group_by('product_category.product_category');
        $this->db->limit("3");
        return  $this->db->get()->result();
    }

    public function getProductRatting($product_id)
    {
        $this->db->select('AVG(rating) as rat,COUNT(rating) as cnt');
        $this->db->from('feedback'); 
       // $this->db->where('feedback.provider_user_id', 0);
        $this->db->where('feedback.product_id', $product_id);
        return $this->db->get()->row();
    }

    public function getProductAllReview($product_id)
    {
        $this->db->select('*');
        $this->db->from('feedback'); 
     //   $this->db->where('feedback.provider_user_id', 0);
        $this->db->where('feedback.product_id', $product_id);
        $this->db->order_by('feedback_created_date','DESC');
      //  $this->db->limit('5');
        return $this->db->get()->result();
    }

    public function getHomeAllReview()
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->order_by('feedback_created_date','DESC');
        $this->db->limit('5');
        return $this->db->get()->result();
    }



    public function getUserName($user_id)
    {
        $this->db->select('*');
        $this->db->from('users'); 
        $this->db->where('users.user_id', $user_id);
        return $this->db->get()->row();
    }

    public function getStateList() 
    {
        $this->db->select('*');
        $this->db->from('state'); 
        return $this->db->get()->result();
    }

    public function getStateOfCityList($state_id)
    {
        $this->db->select('*');
        $this->db->from('city'); 
        $this->db->where('state_id', $state_id);
        return $this->db->get()->result();
    }



}