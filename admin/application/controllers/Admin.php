<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main Controller
 */
class Admin extends Main_Controller
{
    public $userInfo = null;
    public $login_user_id = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('image_resize_model');
        $this->userInfo = $this->session->login_data;
        $this->login_user_id = $this->userInfo->user_id;
    }

    // Account Page
    public function index($active = "setting")
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Account';
        $this->mViewData['data'] = array(
            'partyid' => $this->userInfo->user_id,
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'noOfUser' => $this->adminmodel->getNoOfCustomer(),
            'noOfCategory' => $this->adminmodel->getNoOfCategory(),
            'noOfSubCategory' => $this->adminmodel->getNoOfSubCategory(),
            'active' => $active,
            'pageName' => 'ACCOUNT',
        );
        $this->render('account');
    }

    // Account Page
    public function account($active = "setting")
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Account';
        $this->mViewData['data'] = array(
            'partyid' => $this->userInfo->user_id,
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'noOfUser' => $this->adminmodel->getNoOfCustomer(),
            'noOfCategory' => $this->adminmodel->getNoOfCategory(),
            'noOfSubCategory' => $this->adminmodel->getNoOfSubCategory(),
            'active' => $active,
            'pageName' => 'ACCOUNT',
        );
        $this->render('account');
    }

    // Customer List Page
    public function customers()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'customerinfolist' => $this->adminmodel->getcustomerinfolist(),
            'pageName' => 'CUSTOMERS',
        );

        $this->render('customers');
    }
    // contactus
    public function contactus()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'customerinfolist' => $this->adminmodel->getcustomerinfolist(),
            'pageName' => 'CONTACTUS',
            'contactus' => $this->adminmodel->getContactInfo(),
        );

        $this->render('contactus');
    }

    // plans
    public function plans()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Customers';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'customerinfolist' => $this->adminmodel->getcustomerinfolist(),
            'pageName' => 'PLANS',
            'planinfolist' => $this->adminmodel->getPlanInfo(),
        );

        $this->render('plans');
    }
    public function contact_status($task = ""){
        
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $contact_data = array(
            'contact_id' => $this->input->get('contact_id'),
            );
        if ($task == "Delete")
            $this->adminmodel->contactDelete($contact_data);

        redirect('admin/contactus');
    }
    
    // Services List Page
    public function category()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Category';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'categoriesinfolist' => $this->adminmodel->getcategoriesinfolist(),
            'pageName' => 'CATEGORY',
        );
        $this->render('category');
    }

    // Services List Page
    public function subcategory()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Category';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'categoriesinfolist' => $this->adminmodel->getcategoriesinfolist(),
            'pageName' => 'SUBCATEGORY',
        );
        $this->render('subcategory');
    }

    // Customer Overview
    public function subcategorylistoverview($active = "subcategorylist")
    {   
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $category_id = $this->input->get('category_id');
        $this->mPagetitle = 'Subcategory';
        $this->mViewData['data'] = array(
            'active' => $active,
            'category_id' => $category_id,
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'subcategorylist' => $this->adminmodel->getSubCategoryListOfCategory($category_id),
            'pageName' => 'SUBCATEGORY',
        );

        $this->render('category_subcategory_list');
    }

    // Vendor List Page
    // public function vendor()
    // {
    //     $model_data = array(
    //         'user_id' => $this->userInfo->user_id,
    //     );
    //     $this->mPagetitle = 'Vendor';
    //     $this->mViewData['data'] = array(
    //         'adminInfo' => $this->adminmodel->getUserInfo($model_data),
    //         'vendorinfolist' => $this->adminmodel->getvendorinfolist(),
    //         'adminInfo' => $this->adminmodel->getUserInfo($model_data),
    //         'pageName' => 'VENDOR',
    //     );
    //     $this->render('vendor');
    // }



    // check for category name
    public function checkCategoryName()
    {
        $name = $this->input->post('name');

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_title',$name);
        $this->db->where('category_deleted', "0000-00-00 00:00:00");
        $result = $this->db->get()->row();
        
        if (!empty($result)) {
            echo json_encode(false);
        }
        else
        {
            echo json_encode(true);
        }
    }


    // check for category name
    public function checkSubCategoryName()
    {
        $name = $this->input->post('name');

        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where('subcategory_title',$name);
        $this->db->where('subcategory_deleted', "0000-00-00 00:00:00");
        $result = $this->db->get()->row();
        
        if (!empty($result)) {
            echo json_encode(false);
        }
        else
        {
            echo json_encode(true);
        }
    }

    public function servicesList($active = "active_serivce") 
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        
        $this->mPagetitle = 'ServicesList';
        $this->mViewData['data'] = array(
            'active' => $active,
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'productList' => $this->adminmodel->getAllActiveProductList(),
            'allExpireProductList' => $this->adminmodel->getAllExpireProductList(),
            'pageName' => 'SERVICESLIST',
        );

        $this->render('Services_list');
    }

    public function orderList() 
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        
        $this->mPagetitle = 'OrderList';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'AllOrderList' => $this->adminmodel->getAllOrderList(),
            'pageName' => 'ORDERLIST',
        );

        $this->render('order_list');
    }

    public function service_overview() 
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );

        $product_id = $this->input->get('product_id');
        $this->mPagetitle = 'ServiceOverview';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'SingleProductInfo' => $this->adminmodel->getSingleProductInfo($product_id),
            'ProductImages' => $this->adminmodel->getProductImages($product_id),
            'pageName' => 'SERVICEOVERVIEW',
        );

        $this->render('service_overview');
    }

    public function order_overview() 
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );

        $order_id = $this->input->get('order_id');
        $this->mPagetitle = 'OrderOverview';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
      //      'SingleProductInfo' => $this->adminmodel->getSingleProductInfo($product_id),
       //     'ProductImages' => $this->adminmodel->getProductImages($product_id),
            'pageName' => 'ORDEROVERVIEW',
        );

        $this->render('order_overview');
    }



























































     // ============================== Calendar Controller ==================================

    public function getcalendardata()
    {
        $data['appointment'] = $this->adminmodel->getCalendarData();
        echo json_encode($data["appointment"]);
    }

    // get calendar data on basis of selected dogwalker from select option
    public function getvendorcalendardata() {
        $user_id = $this->input->get('user_id');
        if($user_id == 'all')
            $data['appointment'] = $this->adminmodel->getVendorCalendarData();
        else
            $data["appointment"] = $this->adminmodel->getvendorcalendardata($user_id);
        echo json_encode($data["appointment"]);
    }










    // ============================== Mail Controller ==================================

    // Delete read Notification
    public function deletereadmail()
    {
        $userInfo = $this->session->login;
        $model_data = array(
            'user_id' => $userInfo->user_id,
            'notification_id' => $this->input->get('notification_id'),
            );
        $this->adminmodel->deletereadmail($model_data);
        redirect('admin/trashNotifications', 'refresh');
    }

    // Delete Notification
    public function deleteMail()
    {
        $this->adminmodel->deleteMail();
        redirect('admin/trashNotifications', 'refresh');
    }

    // Delete Notification
    public function per_deleteMail()
    {
        $this->adminmodel->per_deleteMail();
        redirect('admin/trashNotifications', 'refresh');
    }














    // Vendor Overview
    public function vendorOverview($active = "basicinfo")
    {   
        $userInfo = $this->session->login_data;
        $model_data = array(
            'id'=> $this->input->get('user_id'),
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Vendor';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'active' => $active,
            'vendorinfo' => $this->adminmodel->getvendorinfo($model_data),
            'servicesinfolist' => $this->adminmodel->getservicesinfolist(),
            'vendorappointmentlistinfo' => $this->adminmodel->getvendorappointmentlistinfo($model_data),
            'vendorsubservicelist' => $this->adminmodel->getvendorsubservicelist($model_data),
            'employeeslist' => $this->adminmodel->getemployeeslist($model_data),
            'vendorserviceList' => $this->adminmodel->getvendorservicelist($model_data),
            'pageName' => 'VENDOR',
        );

        $this->render('vendor_overview');
    }

    // Customer Overview
    public function customerOverview($active = "basicinfo")
    {   
        $userInfo = $this->session->login_data;
         $user_id = $this->input->get('user_id');
        $model_data = array(
            'id'=> $this->input->get('user_id'),
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Customer';
        $this->mViewData['data'] = array(
            'active' => $active,
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'customerinfo' => $this->adminmodel->getcustomerinfo($model_data),
            'plan_info' => $this->adminmodel->getUserBasicPlanInfo($model_data['id']),
            'productList' => $this->adminmodel->getAllActiveProductListbyid($user_id),
            'allExpireProductList' => $this->adminmodel->getAllExpireProductListbyid($user_id),
            'pageName' => 'CUSTOMERS',
        );
        $this->render('customer_overview');
    }

    public function showreasonorreview()
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        $showresult = $this->adminmodel->showreasonorreview($model_data);
        echo json_encode($showresult);
    }

    // Appointment Page
    public function appointment($task = "all")
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Appointment';
        $this->mViewData['data'] = array(
            'task' => $task,
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'appointmentlists' => $this->adminmodel->getappointmentlist(),
            'pageName' => 'APPOINTMENT',
        );
        $this->render('appointment');
    }













    // Addvendor List Page
    public function addvendor()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Add Vendor';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'pageName' => 'VENDOR',
        );
        $this->render('addvendor');
    }

    // Add Customer
    public function addcustomer()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Add Customer';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'pageName' => 'CUSTOMERS',
        );
        $this->render('addcustomer');
    }










    // Service Request Page
    public function service_request()
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'Serivres Request';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'servicesrequestlist' => $this->adminmodel->getservicesrequestlist(),
            'pageName' => 'REQUESTFORSERVICES',
        );
        $this->render('service_request');
    }

    // Web Setting Page
    public function settings($active = "about_us")
    {
        $userInfo = $this->session->login_data;
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $this->mPagetitle = 'business';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'webAboutUs' => $this->adminmodel->getAboutUs(),
            'webTermCondtion' => $this->adminmodel->getTermCondition(),
            'webPrivacyPolicy' => $this->adminmodel->getPrivacyPolicy(),
            'webfaqs' => $this->adminmodel->getfaqsList(),
            'webfeatures' => $this->adminmodel->getFeatures(),
            'webWorking' => $this->adminmodel->getWorking(),
            'active' => $active,
            'pageName' => 'SETTINGS',
        );
        $this->render('settings');
    }

    // Update web setting
    public function updateWebSettings()
    {
        $this->load->library('upload');
        $model_data = array(
            'id' => $this->input->post('id'),
            'value_type' => $this->input->post('value_type'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
        );
        
        $this->upload->initialize($this->set_upload_options());            
        if ($this->upload->do_upload('upload')) {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data['image'] = $data1['upload_data']['file_name'];
        } else {
            $model_data['image'] = "";                    
        }


        if ($model_data['value_type'] == "about_us")
            $status = $this->adminmodel->updateWebAboutUs($model_data);
        else if ($model_data['value_type'] == "privacy_policy")
            $status = $this->adminmodel->updateWebPrivacyPolicy($model_data);
        else if ($model_data['value_type'] == "term_condition")
            $status = $this->adminmodel->updateWebTermCondition($model_data);
        else if ($model_data['value_type'] == "faqs")
            $status = $this->adminmodel->updateWebfaqs($model_data);
        else if ($model_data['value_type'] == "how_it_works")
            $status = $this->adminmodel->updateHowItWorks($model_data);
        else if ($model_data['value_type'] == "features")
            $status = $this->adminmodel->updateFeature($model_data);

        if ($status == "true") {
            $this->session->set_flashdata('success_msg', 'Info Updated Successfully...');
        } else {
            $this->session->set_flashdata('error_msg', 'Info not Updated Successfully...');
        }

        if ($model_data['value_type'] == "about_us")
            redirect('admin/settings/about_us');
        else if ($model_data['value_type'] == "privacy_policy")
            redirect('admin/settings/privacy_policy');
        else if ($model_data['value_type'] == "term_condition")
            redirect('admin/settings/term_condition');
        else if ($model_data['value_type'] == "faqs")
            redirect('admin/settings/faqs');
        else if ($model_data['value_type'] == "features")
            redirect('admin/settings/features');
        else if ($model_data['value_type'] == "how_it_works")
            redirect('admin/settings/how_it_works');
    }








//=====================faq====================

    // Faq Edit page
    public function webfaqsEdit($active = "faqs_update")
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $faq_data = array(
            'faq_id' => $this->input->get('faq_id'),
        );
        $this->mPagetitle = 'faqs';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'webAboutUs' => $this->adminmodel->getAboutUs(),
            'webTermCondtion' => $this->adminmodel->getTermCondition(),
            'webPrivacyPolicy' => $this->adminmodel->getPrivacyPolicy(),
            'webfaqs' => $this->adminmodel->getfaqsList(),
            'webfaqsedit' => $this->adminmodel->getFaqEditInfo($faq_data),
            'webfeatures' => $this->adminmodel->getFeatures(),
            'webWorking' => $this->adminmodel->getWorking(),
            'active' => $active,
            'pageName' => 'SETTINGS',
        );
        $this->render('settings');
    }
    // working Edit page
    public function webWorkingedit($active = "feature_update")
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $feature_data = array(
            'feature_id' => $this->input->get('feature_id'),
        );
        $this->mPagetitle = 'working';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'webAboutUs' => $this->adminmodel->getAboutUs(),
            'webTermCondtion' => $this->adminmodel->getTermCondition(),
            'webPrivacyPolicy' => $this->adminmodel->getPrivacyPolicy(),
            'webfaqs' => $this->adminmodel->getfaqsList(),
            'webfeatures' => $this->adminmodel->getFeatures(),
            'webWorking' => $this->adminmodel->getWorking(),
            'webWorkingedit' => $this->adminmodel->getFeatureData($feature_data),
            'active' => $active,
            'pageName' => 'SETTINGS',
        );
        $this->render('settings');
    }

    // Faq Edit page
    public function faqs_status($task = "")
    {  
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );

        $faq_data = array(
            'faq_id' => $this->input->get('faq_id'),
        );
        if ($task == "Enable")
            $this->adminmodel->updatefaqstatus($faq_data, "Enable");
        else if ($task == "Disable")
            $this->adminmodel->updatefaqstatus($faq_data, "Disable");
        else if ($task == "Delete")
            $this->adminmodel->faqDelete($faq_data);

        $this->mPagetitle = 'faqs';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'webAboutUs' => $this->adminmodel->getAboutUs(),
            'webTermCondtion' => $this->adminmodel->getTermCondition(),
            'webPrivacyPolicy' => $this->adminmodel->getPrivacyPolicy(),
            'webfaqs' => $this->adminmodel->getfaqsList(),
            'webfeatures' => $this->adminmodel->getFeatures(),
            'webWorking' => $this->adminmodel->getWorking(),
            'active' => 'faqs',
            'pageName' => 'SETTINGS',
        );

        $this->session->set_flashdata('success_msg', 'Info Updated Successfully...');
        $this->render('settings');
    }














    // ===================================== Email Notication Controller Section ===================================//


    public function sendEmail($to = null,$subject = null,$message = null)
    {        
        $this->load->library('email');
        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.mailtrap.io',
          'smtp_port' => 2525,
          'smtp_user' => 'bf1b897172c736',
          'smtp_pass' => '2b2aae143e714d',
          'crlf' => "\r\n",
          'newline' => "\r\n"
        );

$to='ashwin.choudhary@karyonsolutions.com';
$subject="Demo";
$message = "Test mail email";

        $this->email->initialize($config); 
        $this->email->from('mr.ashwin15@gmail.com', 'Appointment Booking');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);    
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }



    // mail overview
    public function readMail()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $mail_data = array(
            'mail_id' => $this->input->get('mail_id'),
            'sub' => $this->input->get('sub'),
        );
        $this->mPagetitle = 'Mail Overview';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'notificationCount' => $this->adminmodel->getNotificationcount($model_data),
            'sentNotificationCount' => $this->adminmodel->getSentNotificationcount($model_data),
            'trashNotificationCount' => $this->adminmodel->getTrashNotificationcount($model_data),
            'notificationInfo' => $this->adminmodel->getNotificationInfo($mail_data),
            'pageName' => 'NOTIFICATIONS',
            'subPageName' => $mail_data['sub'],
        );
        $this->render('notification_overview');
    }

    // mail compose
    public function composeMail()
    {
        $model_data = array(
            'user_id' => $this->userInfo->user_id,
        );
        $mail_data = array(
            'mail_id' => $this->input->get('mail_id'),
        );
        $this->mPagetitle = 'Mail Overview';
        $this->mViewData['data'] = array(
            'adminInfo' => $this->adminmodel->getUserInfo($model_data),
            'notificationCount' => $this->adminmodel->getNotificationcount($model_data),
            'sentNotificationCount' => $this->adminmodel->getSentNotificationcount($model_data),
            'trashNotificationCount' => $this->adminmodel->getTrashNotificationcount($model_data),
            'notificationInfo' => $this->adminmodel->getNotificationInfo($mail_data),
            'userList' => $this->adminmodel->getUserList(),
            'pageName' => 'NOTIFICATIONS',
            'subPageName' => 'COMPOSEMAIL',
        );
        $this->render('composeMail');
    }










    // ===================================== Add Controller Method Section ===================================//


    // add Services Info
    public function addcategory()
    {
        $fileName = $this->image_resize_model->resizeCustomImage('./images/category/',480);

        $model_data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'image' => $fileName,
        );
        $this->adminmodel->addcategory($model_data);
        $this->session->set_flashdata('success_msg', 'Category Added Successfully...');
        redirect('admin/category');
    }




    // add Services plan Info
    public function addplan()
    {

        $model_data = array(
            'plan_title' => $this->input->post('title'),
            'plan_description' => $this->input->post('description'),
            'plan_status' => $this->input->post('status'),
            'plan_price' => $this->input->post('plan_price'),
            'plan_validate' => $this->input->post('plan_validate'),  
            'num_of_service' => $this->input->post('num_of_service'),         

        );
        $this->adminmodel->addplan($model_data);
        $this->session->set_flashdata('success_msg', 'Plan Added Successfully...');
        redirect('admin/plans');
    }



    // add Services Info
    public function addsubcategory($active="")
    {

        $config['upload_path'] = './images/subcategory';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
             $model_data = array(
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
            );
            $this->adminmodel->addsubcategorywithoutimg($model_data);
            $this->session->set_flashdata('success_msg', 'Sub Category Added Successfully...');
            if(empty($active))
            {
                redirect('admin/subcategory');
            }
            else
            {
                redirect('admin/subcategorylistoverview?category_id='.$this->input->post('category_id')); 
            }
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
                'image' => $data1['upload_data']['file_name'],
            );
            $this->adminmodel->addsubcategory($model_data);
            $this->session->set_flashdata('success_msg', 'Sub Category Added Successfully...');
            if(empty($active))
            {
                redirect('admin/subcategory');
            }
            else
            {
                redirect('admin/subcategorylistoverview?category_id='.$this->input->post('category_id')); 
            }
        }
    }

    // Add Vendor Info
    public function addvendorInfo()
    {

        $config['upload_path'] = './images/vendor';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
             $model_data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip'),
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'user_type' => $this->input->post('user_type'),
                'gender' => $this->input->post('gender'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'area_code' => $this->input->post('area_code'),
                'phone_no' => $this->input->post('phone_no'),
                'state' => $this->input->post('state'),
            );

            $user_id = $this->adminmodel->addvendorwithoutimgInfo($model_data);
            $model_data['user_id'] = $user_id;
            $this->adminmodel->addvendorpassword($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor Added Successfully...');
            redirect('admin/vendor');
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip'),
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'image' => $data1['upload_data']['file_name'],
                'user_type' => $this->input->post('user_type'),
                'gender' => $this->input->post('gender'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'area_code' => $this->input->post('area_code'),
                'phone_no' => $this->input->post('phone_no'),
                'state' => $this->input->post('state'),
            );

            $user_id = $this->adminmodel->addvendorInfo($model_data);
            $model_data['user_id'] = $user_id;
            $this->adminmodel->addvendorpassword($model_data);
            $this->session->set_flashdata('success_msg', 'Vendor Added Successfully...');
            redirect('admin/vendor');
        }
    }


    // Add Vendor Service Info
    public function addvendorservice()
    {
        $model_data = array(
            'id' => $this->input->post('user_id'),
            'ups_id' => $this->input->post('ups_id'),
            'status' => $this->input->post('status'),
            'service_name' => $this->input->post('service_name'),
            'service_charge' => $this->input->post('service_charge'),
            'app_duration' => $this->input->post('app_duration'),
        );

        $this->adminmodel->addvendorservice($model_data);
        redirect('admin/vendorOverview/addvendorserivces?user_id='. $model_data['id'], 'refresh');
    }





























// img upload function
    public function set_upload_options() {   
        //upload an image options
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        return $config;
    }

    // Employee add function
    public function addemployee() {

        $this->load->library('upload');
        $model_data = array(
            'id' => $this->input->post('user_id'),
            'parent_ups_id' => $this->input->post('ups_id'),
            'status' => $this->input->post('status'),
            'employee_name' => $this->input->post('employee_name'),
            'employee_mobile' => $this->input->post('employee_mobile'),
            'service' => $this->input->post('service[]'), 
        );

        $check = $this->adminmodel->checkemployeename($model_data);
        if($check > 0) {
            $this->session->set_flashdata('error_msg', 'Employee Already Exits');
            redirect('admin/vendorOverview/addemployees?user_id='. $model_data['id'], 'refresh');
        }

        $this->upload->initialize($this->set_upload_options());    
        if ($this->upload->do_upload('employee_img')) {
            
            $data1 = array('upload_data' => $this->upload->data());
            $model_data['employee_img'] = $data1['upload_data']['file_name'];

        } else {
            $model_data['employee_img'] = "";                    
        }

        $this->adminmodel->addemployee($model_data);
        redirect('admin/vendorOverview/addemployees?user_id='. $model_data['id'], 'refresh');
    }

























    // Add Customer Service Info
    public function addcustomerInfo()
    {

        $config['upload_path'] = './images/customer';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
             $model_data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip'),
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'user_type' => $this->input->post('user_type'),
                'gender' => $this->input->post('gender'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'area_code' => $this->input->post('area_code'),
                'phone_no' => $this->input->post('phone_no'),
                'state' => $this->input->post('state'),
            );

            $user_id = $this->adminmodel->addcustomerwithoutimgInfo($model_data);
            $model_data['user_id'] = $user_id;
            $this->adminmodel->addcustomerpassword($model_data);
            $this->session->set_flashdata('success_msg', 'Customer Added Successfully...');
            redirect('admin/customers');
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $model_data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip'),
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'image' => $data1['upload_data']['file_name'],
                'user_type' => $this->input->post('user_type'),
                'gender' => $this->input->post('gender'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'area_code' => $this->input->post('area_code'),
                'phone_no' => $this->input->post('phone_no'),
                'state' => $this->input->post('state'),
            );

            $user_id = $this->adminmodel->addcustomerInfo($model_data);
            $model_data['user_id'] = $user_id;
            $this->adminmodel->addcustomerpassword($model_data);
            $this->session->set_flashdata('success_msg', 'Customer Added Successfully...');
            redirect('admin/customers');
        }
    }
































    // ===================================== Inline Update Controller Method ================================//

    // 
    public function updatevendorInfo()
    {
        $model_data = array(
            'id' => $_POST['id'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'city' => $_POST['city'],
            'zip' => $_POST['zip'],
            'address' => $_POST['address'],
            'mobile' => $_POST['mobile'],
            'state' => $_POST['state'],
            'area_code' => $_POST['area_code'],
            'phone_no' => $_POST['phone_no'],
            'gender' => $_POST['gender'],

        );   

        $status = $this->adminmodel->updatevendorInfo($model_data);
        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    
    }


    //Inline updation
    public function updateInline($task="")
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        if($task == "vendorservice")
            $status = $this->adminmodel->updatevendorserviceInfoInline($model_data);
        if($task == "vendordelete")
            $status = $this->adminmodel->updatevendordeleteInline($model_data);
        if($task == "customerdelete")
            $status = $this->adminmodel->updatecustomerdeleteInline($model_data);
        if($task == "servicestatus")
            $status = $this->adminmodel->updateservicestatusInline($model_data);
        if($task == "categorystatus")
            $status = $this->adminmodel->updatecategoryInline($model_data);
        if($task == "subcategorystatus")
            $status = $this->adminmodel->updatesubcategoryInline($model_data);
        if($task == "customerappointmentdelete")
            $status = $this->adminmodel->updatecustomerappointmentdeleteInline($model_data);   
        if($task == "employees")
            $status = $this->adminmodel->updateemployeesInline($model_data);
        if($task == "employeeservice")
            $status = $this->adminmodel->updateemployeeserviceInline($model_data);
        if($task == "planstatus")
            $status = $this->adminmodel->updatePlanInline($model_data);
       


        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    }


    public function updatecustomerInfo()
    {
        $model_data = array(
            'id' => $_POST['id'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'city' => $_POST['city'],
            'zip' => $_POST['zip'],
            'country' => $_POST['country'],
            'address' => $_POST['address'],
            'mobile' => $_POST['mobile'],
            'state' => $_POST['state'],
            'address' => $_POST['address'],
        );   
        $status = $this->adminmodel->updatecustomerInfo($model_data);
        if ($status == true) {
            $msg = array('msg' => 'success');
        } else {
            $msg = array('msg' => 'error');
        }
        echo json_encode($msg);
    } 



    // Updation of Service plan with model 
    public function updatePlanInlinemodel()
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        $planinfo = $this->adminmodel->updatePlanInfo($model_data);
        echo json_encode($planinfo);
    } 

    // Updation of Service with model 
    public function updatecategoryInlinemodel()
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        $categoryinfo = $this->adminmodel->updatecategoryInfo($model_data);
        echo json_encode($categoryinfo);
    } 

    // Updation of Service with model 
    public function updatesubcategoryInlinemodel()
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        $subcategoryinfo = $this->adminmodel->updatesubcategoryInfo($model_data);
        echo json_encode($subcategoryinfo);
    }   


    // Updation of Service with model 
    public function updatevendorservice()
    {
        $model_data = array(
            'val' => $_POST['val'],
            'index' => $_POST['index'],
            'id' => $_POST['id'],
        );

        $serviceinfo = $this->adminmodel->updateserviceInfo($model_data);
        echo json_encode($serviceinfo);
    }  






















    // ======================================= Update Controller Method =======================================//



      // add Services plan Info
    public function updateplan()
    {

        $model_data = array(
            'plan_id' => $this->input->post('id'),
            'plan_title' => $this->input->post('title'),
            'plan_description' => $this->input->post('description'),
            'plan_price' => $this->input->post('plan_price'),
            'plan_validate' => $this->input->post('plan_validate'),
            'num_of_service' => $this->input->post('num_of_service'),
            'plan_status' => $this->input->post('status'),
        );
        $this->adminmodel->updateplan($model_data);
        $this->session->set_flashdata('success_msg', 'Plan Updated Successfully...');
        redirect('admin/plans');
    }

      // add Services Info
    public function updatecategory()
    {
        $fileName = $this->image_resize_model->resizeCustomImage('./images/category/',480);

        $model_data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'image' => $fileName,
        );
        $this->adminmodel->updatecategory($model_data);
        $this->session->set_flashdata('success_msg', 'Category Updated Successfully...');
        redirect('admin/category');
    }


    // add Services Info
    public function updatesubcategory($active="")
    {
        $fileName = $this->image_resize_model->resizeCustomImage('./images/subcategory/',170);

        $model_data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'image' => $fileName,
        );
        $this->adminmodel->updatesubcategory($model_data);
        $this->session->set_flashdata('success_msg', 'Service Updated Successfully...');

        if(empty($active))
        {
            redirect('admin/subcategory');
        }
        else
        {
            redirect('admin/subcategorylistoverview?category_id='.$this->input->post('category_id')); 
        }
    }

    public function updateUserInfo()
    {
        $model_data = array(
            'id' => $this->input->post('user_id'),
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'city' => $this->input->post('city'),
            'zip' => $this->input->post('zip'),
            'country' => $this->input->post('country'),
            'address' => $this->input->post('address'),
            'user_type' => $this->input->post('user_type'),
            'state' => $this->input->post('state'),
        );

        $this->adminmodel->updateUserInfo($model_data);
        $this->session->set_flashdata('success_msg', 'Profile Info Update Successfully...');
        redirect('admin/account');
    }

     // Update User Password
    public function updateUserPasswordInfo()
    {
        $model_data = array(
            'id' => $this->input->post('user_id'),
            'curr_password' => $this->input->post('curr_password'),
            'password' => $this->input->post('password'),
        );

        $state = $this->adminmodel->checkPassword($model_data['id'],$model_data['curr_password']);
        if(!$state)
        {
            $this->session->set_flashdata('error_msg', 'Please enter a valid current password');
            redirect('admin/account/password');
        }

        $state1 = $this->adminmodel->checkPassword($model_data['id'],$model_data['password']);
        if($state1)
        {
            $this->session->set_flashdata('error_msg', 'Cuttent password and new password can not be same');
            redirect('admin/account/password');
        }

        $this->adminmodel->updateUserPasswordInfo($model_data);
        $this->session->set_flashdata('success_msg', 'Password Updated Successfully...');
        redirect('admin/account/password');
    }


    public function vendorchangepassword()
    {
        $model_data = array(
            'user_id' => $this->input->post('user_id'),
            'password' => $this->input->post('password'),
            'con_password' => $this->input->post('con_password'),
        );

        $this->adminmodel->vendorchangepassword($model_data);
        $this->session->set_flashdata('success_msg', 'Password Update Successfully...');
        redirect('admin/vendorOverview/vendorpassword?user_id=' . $model_data['user_id'], 'refresh');
    }


    // Updation of Service Request  
    public function updateservicerequeststatus($val="")
    {
        $id = $this->input->get('requested_servcie_id');

        if ($val == "confirm") {
            $email_id = $this->adminmodel->updateservicerequest($id); 
            $to_email = $email_id;
            $subject = "Requested Service Confirmation";
            $url = 'http://localhost/appointment_booking/home/register';
            $message = "Request For Service is Confrimed please Register by clicking on link<br/>".$url;
            $status = $this->sendEmail($to_email,$subject,$message);
        } else {
            $email_id = $this->adminmodel->updateservicerequestcancel($id);
            $to_email = $email_id;
            $subject = "Requested Service Confirmation";
            $url = 'http://localhost/appointment_booking/home/register';
            $message = "Request For Service is Cancelled";
            $status = $this->sendEmail($to_email,$subject,$message);   
        }

        redirect('admin/services');
    } 



















    // =================================== overview Controller ================================================





















    // ==================================== Add Controller Request ==============================================

    

















    // ============================== Update Controller Request ==================================


     
    // Update Our team info
    public function updateAdminPictureInfo() 
    {      
        $fileName = $this->image_resize_model->resizeCustomImage('./images/users/',100);

        if (!empty($fileName))
        {
            $model_data = array(
                'id' => $this->input->post('user_id'),
                'image' => $fileName,
            );
            $this->adminmodel->updateUserPictureInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Profile Image Updated Successfully...');
            redirect('admin/account/profilepicture');
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'The is error while uploading your file...');
            redirect('admin/account/profilepicture');
        }
    }

    
    // Update Our team info
    public function updateUserPictureInfo() 
    {      
        $fileName = $this->image_resize_model->resizeCustomImage('./images/users/',100);

        if (!empty($fileName))
        {
            $model_data = array(
                'id' => $this->input->post('user_id'),
                'image' => $fileName,
            );
            $this->adminmodel->updateUserPictureInfo($model_data);
            $this->session->set_flashdata('success_msg', 'Profile Image Updated Successfully...');
            redirect('admin/customerOverview/user_picture?user_id='.$this->input->post('user_id'));
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'The is error while uploading your file...');
            redirect('admin/customerOverview/user_picture?user_id='.$this->input->post('user_id'));
        }
    }















    //================================== Delete Controller Request =======================================

    














    //=========================================== Ajax Request =====================================

    

















}