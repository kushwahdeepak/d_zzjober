<?php

Class Adminmodel extends CI_Model
{   
    public $userInfo = null;
    public $login_user_id = null;

    function __construct()
    {
        parent::__construct();
        $this->userInfo = $this->session->login_data;
        $this->login_user_id = $this->userInfo->user_id;
    }

    // ==============================================Get Data Methods==============================================

    // get user details
    public function getUserInfo($model_data)
    {
        $user_id = $model_data['user_id'];

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = user_login.user_id');
        $this->db->where('users.user_id', $user_id);
        return $this->db->get()->row();
    }

    // get plan details
    public function getPlanInfo()
    {
        $this->db->select('*');
        $this->db->from('service_plans');
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->result();
    }

    // get user details
    public function getContactInfo()
    {
        $this->db->select('*');
        $this->db->from('contact_us');
        $this->db->where('deleted_date', '0000-00-00');
        return $this->db->get()->result();
    }
    // Delete contactDelete Info
    public function contactDelete($model_data)
    {   $date =  date('Y-m-d');
        $contact_id = $model_data['contact_id'];

        $sql = "UPDATE `contact_us` SET `deleted_date` = '$date' WHERE contact_id = '$contact_id'";
        $this->db->query($sql);
    }

    public function getAllActiveProductList()
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*,users.first_name,category.*,subcategory.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('users','users.user_id=product.user_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->join('category','category.category_id=product_category.product_category', 'left');
        $this->db->join('subcategory','subcategory.subcategory_id=product_sub_category.product_subcategory', 'left');
        $this->db->where('expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->order_by('product_created_date', 'desc');
        $this->db->group_by('product.product_id');
        return $this->db->get()->result();
    }

    public function getAllExpireProductList()
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*,users.first_name,category.*,subcategory.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('users','users.user_id=product.user_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->join('category','category.category_id=product_category.product_category', 'left');
        $this->db->join('subcategory','subcategory.subcategory_id=product_sub_category.product_subcategory', 'left');
        $this->db->where('expire_date <', $currentdate);
        // $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->order_by('product_created_date', 'desc');
        $this->db->group_by('product.product_id');
        return $this->db->get()->result();
    }


 // get service by id ....................

    public function getAllActiveProductListbyid($user_id)
    {
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*,users.first_name,category.*,subcategory.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('users','users.user_id=product.user_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->join('category','category.category_id=product_category.product_category', 'left');
        $this->db->join('subcategory','subcategory.subcategory_id=product_sub_category.product_subcategory', 'left');
        $this->db->where('expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('users.user_id', $user_id);
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->order_by('product_created_date', 'desc');
        $this->db->group_by('product.product_id');
        return $this->db->get()->result();
    }

    public function getAllExpireProductListbyid($user_id)
    { 
        $currentdate = date('Y-m-d');
        $this->db->select('product.*, product_category.*,product_sub_category.*,users.first_name,category.*,subcategory.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('users','users.user_id=product.user_id', 'left');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');
        $this->db->join('category','category.category_id=product_category.product_category', 'left');
        $this->db->join('subcategory','subcategory.subcategory_id=product_sub_category.product_subcategory', 'left');
        $this->db->where('expire_date <', $currentdate);
        // $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->where('users.user_id', $user_id);
        $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('product.product_status', "enabled");
        $this->db->where('product.product_deleted_date', "0000-00-00");
        $this->db->order_by('product_created_date', 'desc');
        $this->db->group_by('product.product_id');
        return $this->db->get()->result();
    }

    public function getAllOrderList()
    {
        $this->db->select('invoices.*');
        $this->db->from('invoices');
        $this->db->join('product_invoice','product_invoice.invoice_id=invoices.invoice_id', 'left');
        $this->db->group_by('invoices.invoice_id');
        return $this->db->get()->result();
    }

    public function getUserName($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }

    public function getQuantityCount($invoice_id)
    {
        $this->db->select('*');
        $this->db->from('product_invoice');
        $this->db->where('invoice_id',$invoice_id);
        return $this->db->get()->num_rows();
    }

    public function getSingleProductInfo($product_id)
    {
        $this->db->select('product.*, product_category.*,product_sub_category.*,users.first_name,category.*,subcategory.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id', 'left');
        $this->db->join('users','users.user_id=product.user_id', 'left');
        $this->db->join('category','category.category_id=product_category.product_category', 'left');
        $this->db->join('subcategory','subcategory.subcategory_id=product_sub_category.product_subcategory', 'left');
        $this->db->where('product.product_id', $product_id);    
        $this->db->where('product.product_deleted_date', "0000-00-00");
        return $this->db->get()->row();
    }

    public function getProductImages($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_image');
        $this->db->where('product_id',$product_id);
        return $this->db->get()->result();
    }

    public function getStateName($state_id)
    {
        $this->db->select('*');
        $this->db->from('state');
        $this->db->where('state_id',$state_id);
        return $this->db->get()->row();
    }

    public function geCityName($city_id)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where('city_id',$city_id);
        return $this->db->get()->row();
    }


    //get requested service count
    public function getNoOfCategory() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_deleted', '0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    } 

    //get requested service count
    public function getNoOfSubCategory() {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('subcategory_deleted', '0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    } 

     // Get Services data
    public function getcategorytinfo($id)
    {  
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id', $id);
        return $this->db->get()->row();
    }

    //get requested service count
    public function getNoOfCustomer() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('users.user_type', 'user');
        $this->db->where('user_login.user_deleted', '0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    } 

    //get requested service count
    public function getNoOfVendor() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('user_type', 'vendor');
        $this->db->where('user_deleted', '0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    } 

    //get requested service count
    public function getNoOfNewNotConfirmVendor() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('confirm_register', 'not_confirm');
        $this->db->where('user_type', 'vendor');
        $this->db->where('user_deleted', '0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    } 

     // Get customer data
    public function getcustomerinfo($model_data)
    {   $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('users.user_id',$id);
        return $this->db->get()->row();
    } 

    // get customer List
    public function getcustomerinfolist()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('user_type', 'user');
        $this->db->order_by('user_created', 'desc');
      //  $this->db->where('user_deleted', '0000-00-00 00:00:00.000000');
        return $this->db->get()->result();
    }


    public function getCustomerData($id="")
    {   
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'users.user_id = user_login.user_id');
        $this->db->where('users.user_id',$id);
        return $this->db->get()->row();
    }

    // get party wallet
    public function getUserWallet($user_id="")
    {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }

    // get Services List
    public function getcategoriesinfolist()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_deleted','0000-00-00 00:00:00');
        return $this->db->get()->result();
    }

    // get Services List
    public function getSubCategoryListOfCategory($category_id)
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('category_id', $category_id);
        $this->db->where('subcategory_deleted','0000-00-00 00:00:00');
        return $this->db->get()->result();
    }

    // get Services List
    public function getSubCategoryCountOfCategory($category_id)
    {
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('category_id', $category_id);
        $this->db->where('subcategory_deleted','0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    }

    // Get Services data
    public function getnumberofcustomer()
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('user_type','customer');
        $this->db->where('user_deleted','0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    }

     // Get Services data
    public function getnumberofVendor()
    {  
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id');
        $this->db->where('user_type','vendor');
        $this->db->where('user_deleted','0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    }

    // Get Services data
    public function getnumberofServices()
    {  
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('service_status','Active');
        $this->db->where('service_deleted','0000-00-00 00:00:00');
        return $this->db->get()->num_rows();
    }

    public function getcustomername($user_id)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        $this->db->where('user_type', 'customer');
        return $this->db->get()->row();   
    }

    // get WEb Abourt Us
    public function getAboutUs()
    {
        $this->db->select('*');
        $this->db->from('about_us');
        return $this->db->get()->row();
    }
    // get web Term and Condition
    public function getTermCondition()
    {
        $this->db->select('*');
        $this->db->from('term_condition');
        return $this->db->get()->row();
    }

    // get web Privacy Policy
    public function getPrivacyPolicy()
    {
        $this->db->select('*');
        $this->db->from('privacy_policy');
        return $this->db->get()->row();
    }

    // get web faqs List
    public function getfaqsList()
    {
        $this->db->select('*');
        $this->db->from('faqs');
        return $this->db->get()->result();
    }

    // get faqs Data
    public function getFaqEditInfo($model_data)
    {
        $faq_id = $model_data['faq_id'];

        $this->db->select('*');
        $this->db->from('faqs');
        $this->db->where('faq_id', $faq_id);
        return $this->db->get()->row();
    }
    // get WEb how it works
    public function getWorking()
    {
        $this->db->select('*');
        $this->db->from('how_it_works');
        return  $this->db->get()->row();
        
    }

    // get working Data
    public function getFeatureData($model_data)
    {
        $feature_id = $model_data['feature_id'];

        $this->db->select('*');
        $this->db->from('features');
        $this->db->where('feature_id', $feature_id);
        return $this->db->get()->row();
    }

    // get Feature
    public function getFeatures()
    {
        $this->db->select('*');
        $this->db->from('features');
        return $this->db->get()->result();
    }

    public function getUserBasicPlanInfo($user_id)
    {   $currentdate = date('Y-m-d H:i:s');
        $this->db->select('*');
        $this->db->from('user_plans');
         $this->db->join('service_plans','service_plans.plan_id=user_plans.plan_id', 'left');
        $this->db->where('user_id', $user_id);
        $this->db->where('user_plans.deleted_date', '0000-00-00 00:00:00');
        return  $this->db->get()->row();
    }

    // Send Mail
    public function sendMail($model_data) {

        $login_user_id = $model_data['login_user_id'];
        $to = $model_data['to'];
        $subject = $model_data['subject'];
        $message = $model_data['message'];

        $sql = "INSERT INTO notification(`from_party`,`to_party`,`subject`,`message`) 
        VALUES('$login_user_id','$to','$subject','$message')";
        $result = $this->db->query($sql);
        return true;    
    }
    
    //move to trash Notification
    public function deleteMail() {
        $notifications = $this->input->post('notifications[]');
        if(isset($notifications) and $notifications != NULL) {
            foreach ($notifications as $notification_id) { 
                $data['admin_status'] = 0; 
                $this->db->where('notification_id',$notification_id);
                $this->db->update('notification',$data);
            }
        }
    }

    //delete Notification count
    public function per_deleteMail() {
        $notifications = $this->input->post('notifications[]');
        if(isset($notifications) and $notifications != NULL) {
            foreach ($notifications as $notification_id) { 
                $data['admin_status'] = 2; 
                $this->db->where('notification_id',$notification_id);
                $this->db->update('notification',$data);
            }
        }
    }

    //add Notification
    public function mail($subject="",$message="") {

        $sql = "INSERT INTO notification(`from_user`,`to_user`,`subject`,`message`) 
        VALUES('1','1','$subject','$message')";
        $this->db->query($sql);
    }



//===================================================== Add Model Method ================================================//


    // Add Services Plan data 
    public function addplan($model_data)
    {
        $plan_title = $model_data['plan_title'];
        $plan_description = $model_data['plan_description'];
        $plan_status = $model_data['plan_status'];
        $plan_price = $model_data['plan_price'];
        $plan_validate = $model_data['plan_validate'];
        $num_of_service = $model_data['num_of_service'];
  
        $sql = "INSERT INTO service_plans(`plan_title`,`plan_description`,`plan_status`,`plan_price`,`plan_validate`,`num_of_service`)  VALUES('$plan_title','$plan_description','$plan_status','$plan_price','$plan_validate','$num_of_service')";
        $this->db->query($sql);

        $this->mail("New Plan ".$plan_title." Added","New Plan ".$plan_title." Added by Admin");
    }

    // Add Services data 
    public function addcategory($model_data)
    {
        $title = $model_data['title'];
        $description = $model_data['description'];
        $image = $model_data['image'];
        $status = $model_data['status'];
     
        $sql = "INSERT INTO category(`category_title`,`category_des`,`category_img`,`category_status`)  VALUES('$title','$description','$image','$status')";
        $this->db->query($sql);

        $this->mail("New category ".$title." Added","New category ".$title." Added by Admin");
    }
    // Add Services data 
    public function addcategorywithoutimg($model_data)
    {
        $title = $model_data['title'];
        $description = $model_data['description'];
        $status = $model_data['status'];
    
        $sql = "INSERT INTO category(`category_title`,`category_des`,`category_status`)  VALUES('$title','$description','$status')";
        $this->db->query($sql);

        $this->mail("New category ".$title." Added","New category ".$title." Added by Admin");
    }

    // Add Services data 
    public function addsubcategory($model_data)
    {
        $category_id = $model_data['category_id'];
        $title = $model_data['title'];
        $description = $model_data['description'];
        $image = $model_data['image'];
        $status = $model_data['status'];
     
        $sql = "INSERT INTO subcategory(`category_id`,`subcategory_title`,`subcategory_des`,`subcategory_img`,`subcategory_status`)  VALUES('$category_id','$title','$description','$image','$status')";
        $this->db->query($sql);

        $this->mail("New sub category ".$title." Added","New sub category ".$title." Added by Admin");
    }

    // Add Services data 
    public function addsubcategorywithoutimg($model_data)
    {
        $category_id = $model_data['category_id'];
        $title = $model_data['title'];
        $description = $model_data['description'];
        $status = $model_data['status'];
    
        $sql = "INSERT INTO subcategory(`category_id`,`subcategory_title`,`subcategory_des`,`subcategory_status`)  VALUES('$category_id','$title','$description','$status')";
        $this->db->query($sql);

        $this->mail("New sub category ".$title." Added","New sub category ".$title." Added by Admin");
    }

    // Add vendor Info data 
    public function addvendorInfo($model_data)
    {
        $data  = array( 
            'first_name' => $model_data['fname'],
            'last_name' => $model_data['lname'],
            'email' => $model_data['email'],
            'mobile' => $model_data['mobile'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'country' => $model_data['country'],
            'address' => $model_data['address'],
            'user_type' => $model_data['user_type'],
            'user_img' => $model_data['image'],
            'gender' => $model_data['gender'],
            'area_code' => $model_data['area_code'],
            'phone' => $model_data['phone_no'],
            'state' => $model_data['state'],
        );
    
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    // Add vendor Info data 
    public function addvendorwithoutimgInfo($model_data)
    {
        $data  = array( 
            'first_name' => $model_data['fname'],
            'last_name' => $model_data['lname'],
            'email' => $model_data['email'],
            'mobile' => $model_data['mobile'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'country' => $model_data['country'],
            'address' => $model_data['address'],
            'user_type' => $model_data['user_type'],
            'gender' => $model_data['gender'],
            'area_code' => $model_data['area_code'],
            'phone' => $model_data['phone_no'],
            'state' => $model_data['state'],
        );
    
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    // Add vendor Info data 
    public function addvendorservice($model_data)
    {
        $data  = array( 
            'parent_ups_id' => $model_data['ups_id'],
            'usc_status' => $model_data['status'],
            'usc_title' => $model_data['service_name'],
            'usc_charge' => $model_data['service_charge'],
            'appointment_duration' => $model_data['app_duration'],
        );
    
        $this->db->insert('user_service_conn',$data);
        $this->mail("New sub service ".$data['usc_title']." Added","New sub service ".$data['usc_title']." Added by Admin");

        return true;
    }


     // Add Employee 
    public function addemployee($model_data)
    {

        $currentdate = date('Y-m-d H:i:s');
        $data1  = array( 
            'parent_ups_id' => $model_data['parent_ups_id'],
            'ue_status' => $model_data['status'],
            'employee_name' => $model_data['employee_name'],
            'employee_mobile' => $model_data['employee_mobile'],
            
            'employee_img' => $model_data['employee_img'],

            'ue_created' => $currentdate
            
          );
    
        $this->db->insert('user_employees',$data1);
        $ue_id = $this->db->insert_id();


        $service = $model_data['service'];

        if(isset($service) and $service != NULL) {
            foreach ($service as $ser) 
            {
                $data['ue_id'] = $ue_id;
                $data['usc_id'] = $ser;
                $data['uesc_status'] = 'active';
                $data['uesc_created'] = $currentdate;
                $this->db->insert('user_employee_service_conn',$data);
            }
        }

         $this->mail("New employee ".$data1['employee_name']." Added","New Employee ".$data1['employee_name']." Added by Admin");

        return true;
    }


    public function checkemployeename($model_data)
    {

        $employee_name = $model_data['employee_name'];
 

        $this->db->select('*');
        $this->db->from('user_employees');
        $this->db->where('employee_name', $employee_name);
        return $this->db->get()->num_rows();
    }


   // Add Customer Info data 
    public function addcustomerInfo($model_data)
    {
        $data  = array( 
            'first_name' => $model_data['fname'],
            'last_name' => $model_data['lname'],
            'email' => $model_data['email'],
            'mobile' => $model_data['mobile'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'country' => $model_data['country'],
            'address' => $model_data['address'],
            'user_type' => $model_data['user_type'],
            'user_img' => $model_data['image'],
            'state' => $model_data['state'],
            'area_code' => $model_data['area_code'],
            'phone' => $model_data['phone_no'],
            'gender' => $model_data['gender'],
        );
    
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    // Add Customer Info data 
    public function addcustomerwithoutimgInfo($model_data)
    {
        $data  = array( 
            'first_name' => $model_data['fname'],
            'last_name' => $model_data['lname'],
            'email' => $model_data['email'],
            'mobile' => $model_data['mobile'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'country' => $model_data['country'],
            'address' => $model_data['address'],
            'user_type' => $model_data['user_type'],
            'state' => $model_data['state'],
            'area_code' => $model_data['area_code'],
            'phone' => $model_data['phone_no'],
            'gender' => $model_data['gender'],
        );
    
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    // Add Customer password Info data 
    public function addcustomerpassword($model_data)
    {
        $temppassword = $model_data['password'];
        $model_data['newpassword'] = password_hash($temppassword, PASSWORD_BCRYPT);

        $data  = array( 
        'email' => $model_data['email'],
        'password' => $model_data['newpassword'],
        'user_id' => $model_data['user_id'],
        'user_status' => $model_data['status'],
        );
    
        $this->db->insert('user_login',$data);
        return true;
    }

    // Add Vendor password Info data 
    public function addvendorpassword($model_data)
    {
        $temppassword = $model_data['password'];
        $model_data['newpassword'] = password_hash($temppassword, PASSWORD_BCRYPT);

        $data  = array( 
        'email' => $model_data['email'],
        'password' => $model_data['newpassword'],
        'user_id' => $model_data['user_id'],
        'user_status' => $model_data['status'],
        );
    
        $this->db->insert('user_login',$data);
        $this->mail("New pasword Added","New password Added");
        return true;
    }

    // Add Vendor password Info data 
    public function vendorchangepassword($model_data)
    {
        $temppassword = $model_data['password'];
        $model_data['newpassword'] = password_hash($temppassword, PASSWORD_BCRYPT);

        $data  = array( 
        'password' => $model_data['newpassword'],
        );
    
        $this->db->where('user_id',$model_data['user_id']);
        $this->db->update('user_login',$data);
        $this->mail("Password change successfully","Password change successfully");
        return true;
    }






















    // Get Services plan data
    public function updatePlanInfo($model_data)
    {   
        $this->mail("Plan info updated successfully","Plan info updated successfully");

        $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('service_plans');
        $this->db->where('plan_id',$id);
        return $this->db->get()->row();
    }


    // Get Services data
    public function updatecategoryInfo($model_data)
    {   
        $this->mail("Category info updated successfully","Category info updated successfully");

        $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id',$id);
        return $this->db->get()->row();
    }

    // Get Services data
    public function updatesubcategoryInfo($model_data)
    {   
        $this->mail("Sub category info updated successfully","Sub category info updated successfully");

        $id = $model_data['id'];

        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('subcategory_id',$id);
        return $this->db->get()->row();
    }


    // Update vendor Info data 
    public function updatevendorInfo($model_data)
    {
        $this->mail("Vendor info updated successfully","Vendor info updated successfully");

        $data  = array( 
            'first_name' => $model_data['fname'],
            'last_name' => $model_data['lname'],
            'email' => $model_data['email'],
            'mobile' => $model_data['mobile'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'address' => $model_data['address'],
            'state' => $model_data['state'],
            'area_code' => $model_data['area_code'],
            'phone' => $model_data['phone_no'],
            'gender' => $model_data['gender'],
        );

        $data1  = array( 
            'email' => $model_data['email'],
        );

        $this->db->where('user_id',$model_data['id']);
        $this->db->update('users',$data);

        $this->db->where('user_id',$model_data['id']);
        $this->db->update('user_login',$data1);
        return true;
    } 


    // Update vendor Info data 
    public function updatecustomerInfo($model_data)
    {
        $this->mail("User info updated successfully","User info updated successfully");

        $id = $model_data['id'];
        $data  = array( 
            'first_name' => $model_data['fname'],
            'last_name' => $model_data['lname'],
            'mobile' => $model_data['mobile'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'country' => $model_data['country'],
            'address' => $model_data['address'],
            'state' => $model_data['state'],
        );

        $data1  = array(   
            'email' => $model_data['email'],
        );

        $this->db->where('user_id',$model_data['id']);
        $this->db->update('users',$data);

        $this->db->where('user_id',$model_data['id']);
        $this->db->update('user_login',$data1);
        return true;
    } 

    public function updatecategory($model_data)
    {
        $this->mail("Category info updated successfully","Category info updated successfully");

        $id = $model_data['id'];

        if (!empty($model_data['image'])) {
            $data  = array( 
                'category_title' => $model_data['title'],
                'category_des' => $model_data['description'],
                'category_img' => $model_data['image'],
            );   
        } else{
            $data  = array( 
                'category_title' => $model_data['title'],
                'category_des' => $model_data['description'],
            );
        }

        $this->db->where('category_id',$id);
        $this->db->update('category',$data);
        return true;
    }

    public function updateplan($model_data)
    {
        $this->mail("Plan info updated successfully","Plan info updated successfully");


        $currentdate = date('Y-m-d H:i:s');
        $plan_id = $model_data['plan_id'];
        $data  = array( 
            'plan_title' => $model_data['plan_title'],
            'plan_description' => $model_data['plan_description'],
            'plan_price' => $model_data['plan_price'],
            'plan_validate' => $model_data['plan_validate'],
            'num_of_service' => $model_data['num_of_service'],
            'laste_updated_date' => $currentdate,
        );

        $this->db->where('plan_id',$plan_id);
        $this->db->update('service_plans',$data);
        return true;
    }


    public function updatecategorywithoutimg($model_data)
    {
        $this->mail("Category info updated successfully","Category info updated successfully");

        $id = $model_data['id'];
        $data  = array( 
            'category_title' => $model_data['title'],
            'category_des' => $model_data['description'],
        );

        $this->db->where('category_id',$id);
        $this->db->update('category',$data);
        return true;
    }

    public function updatesubcategory($model_data)
    {
        $this->mail("Sub category info updated successfully","Category info updated successfully");

        $id = $model_data['id'];
        $data  = array( 
            'subcategory_title' => $model_data['title'],
            'subcategory_des' => $model_data['description'],
            'subcategory_img' => $model_data['image'],
        );

        $this->db->where('subcategory_id',$id);
        $this->db->update('subcategory',$data);
        return true;
    }

    public function updatesubcategorywithoutimg($model_data)
    {
        $this->mail("Sub category info updated successfully","Category info updated successfully");

        $id = $model_data['id'];
        $data  = array( 
            'subcategory_title' => $model_data['title'],
            'subcategory_des' => $model_data['description'],
        );

        $this->db->where('subcategory_id',$id);
        $this->db->update('subcategory',$data);
        return true;
    }

    // Update vendor Info data 
    public function updateUserInfo($model_data)
    {
        $this->mail("User info updated successfully","User info updated successfully");

        $id = $model_data['id']; 
        $data  = array(   
            'first_name' => $model_data['fname'],
            'middle_name' => $model_data['mname'],
            'last_name' => $model_data['lname'],
            'mobile' => $model_data['mobile'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'country' => $model_data['country'],
            'address' => $model_data['address'],
            'state' => $model_data['state'],
        );

        $this->db->where('user_id',$id);
        $this->db->update('users',$data);

        $data1  = array(   
            'email' => $model_data['email'],
        );
    
        $this->db->where('user_id',$id);
        $this->db->update('user_login',$data1);

        return true;
    }

    // check for password or current password
    public function checkPassword($user_id, $password)
    {
        $this->db->select('password');
        $this->db->from('user_login');
        $this->db->where('user_id', $user_id);
        $row = $this->db->get()->row();

        if (password_verify($password, $row->password)) {
            return true;
        } else {
            return false;
        }
    }

    // Update User password Info
    public function updateUserPasswordInfo($model_data)
    {
        $id = $model_data['id'];
        $temp_password = $model_data['password'];
        $newpassword = password_hash($temp_password, PASSWORD_BCRYPT);


        $sql = "UPDATE `user_login` SET `password` = '$newpassword' WHERE user_id = '$id'";
        $this->db->query($sql);
        return true;
    }

    // Update User password Info
    public function updateUserPictureInfo($model_data)
    {
        $id = $model_data['id'];
        $image = $model_data['image'];

        $sql = "UPDATE `users` SET `user_img` = '$image' WHERE user_id = '$id'";
        $this->db->query($sql);
        return true;
    }

    public function updateservicerequest($id)
    {
        
        $servicerequestinfo = $this->getservicerequestinfo($id);

        $service_title = $servicerequestinfo->service_name;
        $service_des = $servicerequestinfo->service_des;
        $service_status = "Active";
        $request_service_id = $servicerequestinfo->request_service_id;
        $id = $model_data['id'];

        $sql = "INSERT INTO services(`service_title`,`service_des`,`service_status`)  VALUES('$service_title','$service_des','$service_status')";
        $this->db->query($sql);

        $sql = "UPDATE `request_service` SET `status` = '$service_status' WHERE request_service_id = '$id'";
        $this->db->query($sql);
        return $servicerequestinfo->email;
    }

    public function updateservicerequestcancel($id)
    {   
        
        $servicerequestinfo = $this->getservicerequestinfo($id);

        $service_status = "cancel";
        $id = $model_data['id'];

        $sql = "UPDATE `request_service` SET `status` = '$service_status' WHERE request_service_id = '$id'";
        $this->db->query($sql);
        return $servicerequestinfo->email;

    }

//=================================update=================
    // Update About Us 
    public function updateWebAboutUs($model_data)
    {
        $about_id = $model_data['id'];
        $data = array(
            'description' => $model_data['description'],
            'title' => $model_data['title'],
        );

        if (empty($about_id)) {            
            $this->db->insert('about_us',$data);
        } else {
            $this->db->where('about_id',$about_id);
            $this->db->update('about_us',$data);
        }

        
        return true;
    }
    
    // Update About Us 
    public function updateFeature($model_data)
    {
        $id = $model_data['id'];
        $data = array(
            'description' => $model_data['description'],
            'title' => $model_data['title'],
            'image' => $model_data['image'],
        );
        if (empty($id)) {            
            $this->db->insert('features',$data);
        } else {
            $this->db->where('feature_id',$id);
            $this->db->update('features',$data);
        }
        
        return true;
    }

    // Update Privacy Policy
    public function updateWebPrivacyPolicy($model_data)
    {
        $privacy_policy_id = $model_data['id'];
        $data = array(
            'description' => $model_data['description'],
            'title' => $model_data['title'],
        );

        if (empty($privacy_policy_id)) {            
            $this->db->insert('privacy_policy',$data);
        } else {
            $this->db->where('privacy_policy_id',$privacy_policy_id);
            $this->db->update('privacy_policy',$data);
        }
        return true;
    }

    // Update Terms and conditions
    public function updateWebTermCondition($model_data)
    {
        $term_condition_id = $model_data['id'];
        $data = array(
            'description' => $model_data['description'],
            'title' => $model_data['title'],
        );

        if (empty($term_condition_id)) {            
            $this->db->insert('term_condition',$data);
        } else {
            $this->db->where('term_condition_id',$term_condition_id);
            $this->db->update('term_condition',$data);
        }
        return true;
    }
    // feature
    
    public function updateHowItWorks($model_data)
    {
        $id = $model_data['id'];
        $data = array(
            'description' => $model_data['description'],
            'title' => $model_data['title'],
        );
        if (empty($id)) {            
            $this->db->insert('how_it_works',$data);
        } else {
            $this->db->where('id',$id);
            $this->db->update('how_it_works',$data);
        }
        return true;
    }

    // Update Faq's
    public function updateWebfaqs($model_data)
    {
        $faq_id = $model_data['id'];
        $data = array(
            'question' => $model_data['title'],
            'answer' => $model_data['description'],
        );

        if (empty($faq_id))
            $this->db->insert('faqs',$data);            
        else
            $this->db->where('faq_id',$faq_id);
            $this->db->update('faqs',$data);

        return true;
    }

    // Update Faq's status
    public function updatefaqstatus($model_data, $status)
    {
        $faq_id = $model_data['faq_id'];

        if ($status == "Enable") {
            $sql = "UPDATE `faqs` SET `status` = '1' WHERE faq_id = '$faq_id'";
            $this->db->query($sql);
        }
        else {
            $sql = "UPDATE `faqs` SET `status` = '0' WHERE faq_id = '$faq_id'";
            $this->db->query($sql);
        }
        return true;
    }





    // Update clients Inline data
    public function updatevendordeleteInline($model_data) {
        $columns = array(
            1 => 'user_status',
            2 => 'user_deleted',
            3 => 'confirm_register',
        );
        $colVal = '';
        $colIndex = $rowid = 0;
        $date = date('Y-m-d');

        $vendorresult = $this->checkvendorappointment($model_data);
         
        if(empty($vendorresult)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

            if($colIndex == 3) {

                $sql1 = "UPDATE `user_login` SET `confirm_register` = '', `user_status` = 'Active' WHERE user_id = '".$rowid."'"; 
                $this->db->query($sql1);

            } else if($colIndex == 2 || $colIndex == 4) {

                $sql1 = "UPDATE `users` SET `user_deleted` = '$date' WHERE user_id = '".$rowid."'"; 
                $this->db->query($sql1);
                $sql2 = "UPDATE `user_login` SET `user_status` = 'Deacitve' WHERE user_id = '".$rowid."'"; 
                $this->db->query($sql2);

            } else {

                $sql = "UPDATE  user_login SET ".$columns[$colIndex]." = '".$colVal."' WHERE user_id='".$rowid."'";
                $this->db->query($sql);
            }

            return true;
        }
        return false;
    }


    // Update clients Inline data
    public function updatecustomerdeleteInline($model_data) {
        $columns = array(
            1 => 'user_deleted',
            2 => 'user_status',
        );
        $colVal = '';
        $colIndex = $rowid = 0;
        $date = date('Y-m-d');


        $customerresult = "";
         
        if(empty($customerresult)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }

        

                if($colIndex == 1)
                {
                    $sql = "UPDATE `user_login` SET `user_status` = 'Deleted', `user_deleted` = '".$date."' WHERE user_id = '".$rowid."'"; 
                    $this->db->query($sql);
                } else  {

                    $sql = "UPDATE  user_login SET ".$columns[$colIndex]." = '".$colVal."' WHERE user_id='".$rowid."'";
                }

                $this->db->query($sql);
                return true;
           
            }
     
        return false;
    }
      
    // Update clients Inline data
    public function updateservicestatusInline($model_data) {
        $columns = array(
            1 => 'service_status',
            2 => 'service_deleted',
        );
        $colVal = '';
        $colIndex = $rowid = 0;
        $date = date('Y-m-d');

        $serviceresult = $this->checkserviceappointment($model_data);
         
        if(empty($serviceresult)){
            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }


            if($colIndex == 2) {
                $sql = "UPDATE `services` SET `service_deleted` = '$date', `service_status` = '0'  WHERE service_id = '".$rowid."'"; 
            } else{
                $sql = "UPDATE  services SET ".$columns[$colIndex]." = '".$colVal."' WHERE service_id='".$rowid."'";
            }

            $this->db->query($sql);
            return true;
        }
        return false;
    } 
      
    // Update clients Inline data
    public function updatecategoryInline($model_data) {
        $columns = array(
            1 => 'category_status',
            2 => 'category_deleted',
        );
        $colVal = '';
        $colIndex = $rowid = 0;
        $date = date('Y-m-d');
         

            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }


            if($colIndex == 2) {
                $sql = "UPDATE `category` SET `category_deleted` = '$date', `category_status` = '0'  WHERE category_id = '".$rowid."'"; 
            } else{
                $sql = "UPDATE  category SET ".$columns[$colIndex]." = '".$colVal."' WHERE category_id='".$rowid."'";
            }

            $this->db->query($sql);
            return true;

    } 
   
      
    // Update plan Inline data
    public function updatePlanInline($model_data) {
        $columns = array(
            1 => 'plan_status',
            2 => 'plan_deleted',
        );
        $colVal = '';
        $colIndex = $rowid = 0;
        $date = date('Y-m-d');
         

            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }


            if($colIndex == 2) {
                $sql = "UPDATE `service_plans` SET `deleted_date` = '$date', `plan_status` = '0'  WHERE plan_id = '".$rowid."'"; 
            } else{
                $sql = "UPDATE  service_plans SET ".$columns[$colIndex]." = '".$colVal."' WHERE plan_id='".$rowid."'";
            }

            $this->db->query($sql);
            return true;

    }

    // Update clients Inline data
    public function updatesubcategoryInline($model_data) {
        $columns = array(
            1 => 'subcategory_status',
            2 => 'subcategory_deleted',
        );
        $colVal = '';
        $colIndex = $rowid = 0;
        $date = date('Y-m-d');
         

            if(isset($model_data['val']) && !empty($model_data['val'])) {
                $colVal =  preg_replace('/\s+/S', " ", $model_data['val']);
            }

            if(isset($model_data['index']) && $model_data['index'] >= 0) {
              $colIndex = $model_data['index'];
            }

            if(isset($model_data['id']) && $model_data['id'] != NULL) {
              $rowid = $model_data['id'];
            }


            if($colIndex == 2) {
                $sql = "UPDATE `subcategory` SET `subcategory_deleted` = '$date', `subcategory_status` = '0'  WHERE subcategory_id = '".$rowid."'"; 
            } else{
                $sql = "UPDATE  subcategory SET ".$columns[$colIndex]." = '".$colVal."' WHERE subcategory_id='".$rowid."'";
            }

            $this->db->query($sql);
            return true;

    } 

 


//==============================delete===================

    // Delete Faq Info
    public function faqDelete($model_data)
    {
        $faq_id = $model_data['faq_id'];

        $sql = "DELETE FROM faqs WHERE faq_id = $faq_id";
        $this->db->query($sql);

    }




    // =================================== Add notification and mail function =========================================

    // add Notificatio Info
    public function addPartyMail($from_party="", $to_party="", $subject="", $message="") {

        $sql = "INSERT INTO `party_notification`(`from_party`,`to_party`,`subject`,`message`) VALUES('$from_party','$to_party','$subject','$message')";  
        $status = $this->db->query($sql); 
    }

    public function addpartynNotification($from_party="",$for="", $subject="", $status="3") {

        $sql = "INSERT INTO party_notification(`from_party`,`notification_for`,`subject`,`status`) VALUES('$from_party','$for','$subject','$status')";
        $this->db->query($sql);
    }



































}