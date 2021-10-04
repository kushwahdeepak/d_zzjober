<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_worker extends CI_Model
{

    /**
     * Function for check Login
     *
     * @return true OR False
     */
    public function checkLogin() 
    {
        if(!$this->session->userdata('userInfo')) 
        {
            redirect('home/index');
        }
    }
    /**
     * Function for creating a user's cart
     *
     * @param $model_data
     * @return bool
     */
    public function createUserCartInfo($model_data)
    {
        $cart_data  = array(
            'user_id' => $model_data['user_id'],
            'user_product_id' => $model_data['user_product_id'],
            'user_product_quantity' => $model_data['user_product_quantity'],
            'user_cart_created_date' => date('Y-m-d H:i:s'),
        );

        $this->db->select('*');
        $this->db->from('user_cart');
        $this->db->where('user_product_id', $cart_data['user_product_id']);
        $this->db->where('user_id', $cart_data['user_id']);
        $this->db->where('user_cart_deleted_date', '0000-00-00');
        $num_rows = $this->db->get()->num_rows();
        if($num_rows != 0)
        {
            $this->db->select('*');
            $this->db->from('user_cart');
            $this->db->where('user_product_id', $cart_data['user_product_id']);
            $this->db->where('user_id', $cart_data['user_id']);
            $this->db->where('user_cart_deleted_date', '0000-00-00');
            $user_product = $this->db->get()->row();
            $user_product_quantity = $user_product->user_product_quantity + $cart_data['user_product_quantity'];

            $data = array(
                'user_product_quantity' => $user_product_quantity,
            );

            $this->db->where('user_cart_id', $user_product->user_cart_id);

            if (!$this->db->update('user_cart', $data)) {
                show_error('Error updating data');
                die();
            } else {
                return true;
            }
        } else {
            if (!$this->db->insert('user_cart', $cart_data))
            {
                show_error('Error submitting cart form ');
                die();
            } else {
                return true;
            }
        }
    }


    /**
     * Function for updating a user's plan
     *
     * @param $model_data
     * @return bool
     */
    public function updateUserPlan($model_data, $pre_plan_id)
    {
        $data  = array(
            'user_id' => $model_data['user_id'],
            'plan_id' => $model_data['plan_id'],
            'remaining_service' => $model_data['remaining_service']-1,
            'purchase_date' => date('Y-m-d H:i:s'),
            'expire_date' => $model_data['expire_date'],
        );
        $this->db->where('user_plan_id', $pre_plan_id);
        $this->db->update('user_plans', $data);

        return true; 
    }


    /**
     * Function for creating a user's plan
     *
     * @param $model_data
     * @return bool
     */
    public function createUserPlan($model_data)
    {
        $data  = array(
            'user_id' => $model_data['user_id'],
            'plan_id' => $model_data['plan_id'],
            'remaining_service' => $model_data['remaining_service'],
            'purchase_date' => date('Y-m-d H:i:s'),
            'expire_date' => $model_data['expire_date'],
        );
        $this->db->insert('user_plans', $data);        
        return true; 
        // $count = $this->user_helper->countUserPlan($model_data['user_id']);

        // if($count > 0 && $count != 0)
        // {
        //     $CheckUserPlan = $this->user_helper->UpdateCheckUserPlan($model_data['user_id']);

        //     $this->db->where('user_id',  $model_data['user_id']);
        //     $this->db->where('deleted_date', '0000-00-00');
        //     $delete_plan = array(
        //         'deleted_date' => date('Y-m-d H:i:s'),
        //     );
        //     $this->db->update('user_plans', $delete_plan);

        //     // $delete_product = array(
        //     //     'product_deleted_date' => date('Y-m-d H:i:s'),
        //     // );
        //     // $this->db->where('user_id',  $model_data['user_id']);
        //     // $this->db->update('product', $delete_product);

        //     if (!empty($CheckUserPlan)) 
        //     {
        //         $currentdate = date('Y-m-d');
        //         $datetime1 = strtotime($CheckUserPlan->expire_date);
        //         $datetime2 = strtotime($currentdate);
                 
        //         $secs = $datetime1 - $datetime2;
        //         $days = $secs / 86400;

        //         $actualDate = date('Y-m-d', strtotime($model_data['expire_date']. ' + '.$days.' days'));

        //         $total_remaining_serive = $model_data['remaining_service'] + $CheckUserPlan->remaining_service;

        //         $data  = array (
        //             'user_id' => $model_data['user_id'],
        //             'plan_id' => $model_data['plan_id'],
        //             'remaining_service' => $total_remaining_serive,
        //             'purchase_date' => date('Y-m-d H:i:s'),
        //             'expire_date' => $actualDate,
        //         );
        //         $this->db->insert('user_plans', $data);
        //         return true;
        //     } 
        //     else 
        //     { 
        //         $data  = array (
        //             'user_id' => $model_data['user_id'],
        //             'plan_id' => $model_data['plan_id'],
        //             'remaining_service' => $model_data['remaining_service'],
        //             'purchase_date' => date('Y-m-d H:i:s'),
        //             'expire_date' => $model_data['expire_date'],
        //         );
        //         $this->db->insert('user_plans', $data);
        //         return true;
        //     }
        // } 
        // else 
        // {
        //     $this->db->where('user_id',  $model_data['user_id']);
        //     $this->db->where('deleted_date', '0000-00-00');
        //     $delete_plan = array(
        //         'deleted_date' => date('Y-m-d H:i:s'),
        //     );
        //     $this->db->update('user_plans', $delete_plan);
        //     // $delete_product = array(
        //     //     'product_deleted_date' => date('Y-m-d H:i:s'),
        //     // );
        //     // $this->db->where('user_id',  $model_data['user_id']);
        //     // $this->db->update('product', $delete_product);

        //     $data  = array(
        //         'user_id' => $model_data['user_id'],
        //         'plan_id' => $model_data['plan_id'],
        //         'remaining_service' => $model_data['remaining_service'],
        //         'purchase_date' => date('Y-m-d H:i:s'),
        //         'expire_date' => $model_data['expire_date'],
        //     );
        //     $this->db->insert('user_plans', $data);        
        //     return true; 
        // }
    }

    public function createTransactionData($data)
    {
        $model_data  = array (
            'id' => $data['id'],
            'plan_id' => $data['plan_id'],
            'previous_plan_id' => $data['previous_plan_id'],
            'cart' => $data['cart'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_id' => $data['user_id'],
            'amount' => $data['amount'],
            'address_line_1' => $data['line1'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['postal_code'],
            'country_code' => $data['country_code'],
            'currency' => $data['currency'],
            'create_time' => $data['create_time'],
            'payment_method' => $data['payment_method'],
        );
        $this->db->insert('transaction', $model_data);
        return true;
    }


    /**
     * Function for creating a product
     *
     * @param $model_data
     * @return bool
     */
    public function createProduct($model_data)
    {
        $this->load->library('session');
        $image_array = $_SESSION['image_array'];
        $length = sizeof($image_array);

        if ($length <= 2) 
        {
            return false;
        } 
        else 
        {
            $user_current_plan_id = $this->changeNumOfService($model_data['user_id']); 
            $product_data  = array(
                'user_id' => $model_data['user_id'],
                'user_plan_id' => $user_current_plan_id,
                'product_name' => $model_data['product_name'],
                'product_description' => $model_data['product_description'],
                'product_description1' => $model_data['product_description1'],
                'product_description2' => $model_data['product_description2'],
                'product_description3' => $model_data['product_description3'],
                'product_price' => $model_data['product_price'],
                'time_price_check' => $model_data['time_price_check'],
                'discount' => $model_data['discount'],
                'product_status' => $model_data['product_status'],
                'product_created_date' => date('Y-m-d H:i:s'),
                'address' => $model_data['address'],
                'state' => $model_data['state'],
                'city' => $model_data['city'],
                'facebook_link' => $model_data['facebook_link'],
                'instagram_link' => $model_data['instagram_link'],
                'payment_method' => $model_data['payment_method'],
                'contact_number' => $model_data['contact_number'],
                'budget' => $model_data['budget'],
            );
            $this->db->insert('product', $product_data);
            $product_id = $this->db->insert_id();

            $category_data = array(
                'product_id' => $product_id,
                'product_category' => $model_data['product_category'],
            );
            $this->db->insert('product_category', $category_data);

            $subcategory_data = array(
                'product_id' => $product_id,
                'product_subcategory' => $model_data['product_subcategory'],
            );
            $this->db->insert('product_sub_category', $subcategory_data);

            if(isset($product_id) and isset($image_array)) 
            {
                foreach($image_array as $image)
                {
                    $this->db->insert("product_image",array("product_image_name" => $image, "product_id" => $product_id));
                }
            }

            unset($_SESSION['image_array']);
            return $product_id;
        }
    }


    /**
     * Function for updating number of service
     *
     * @param $user_id
     * @return bool
     */
    public function changeNumOfService($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_plans');
        $this->db->where('user_id', $user_id);
        $this->db->where('deleted_date', '0000-00-00');
        $plan_data = $this->db->get()->row();

        if(isset($plan_data->remaining_service)) 
        {
            if($plan_data->remaining_service !=0)
            {
                $num_of_service = $plan_data->remaining_service - 1;
                $update_plan_data = array(
                    'remaining_service' => $num_of_service,
                    'deleted_date' => date('Y-m-d H:i:s'),
                );
                $this->db->where('user_plan_id', $plan_data->user_plan_id);
                $this->db->update('user_plans', $update_plan_data);
                return $plan_data->user_plan_id;
            } 
            // else 
            // {
            //     $this->db->where('user_id', $user_id);
            //     $this->db->where('deleted_date', '0000-00-00');
            //     $data = array(
            //             'deleted_date' => date('Y-m-d H:i:s'),
            //     );
            //     if (!$this->db->update('user_plans', $data)) {
            //         show_error('Error updating data');
            //         die();
            //     } else {
            //         return true;
            //     }
            // }
        }
        return false;
    }


    /**
     * Function for confirming a product into the cart
     *
     * @param $model_data
     * @return bool
     */
    public function createConfirmProduct($model_data)
    {
        $data  = array(
                'user_id' => $model_data['user_id'],
                'address' => $model_data['address1'],
                'city' => $model_data['city'],
                'postcode' => $model_data['postcode'],
                'country' => $model_data['country'],
                'state' => $model_data['region'],
                'order_date' => date('Y-m-d H:i:s'),
                'total_payment' => $model_data['total_price'],
        );
        $this->db->insert('invoices', $data);
        $invoice_id = $this->db->insert_id();

        $user_product_id = $model_data['user_product_id'];

        foreach ($user_product_id as $value)
        {
            $product_info = $this->user_helper->getProductDetail($value);
            $data1  = array(
                    'invoice_id' => $invoice_id,
                    'product_id' => $value,
                    'product_price' => $product_info->product_price,
            );
            $this->db->insert('product_invoice', $data1);
            $product_invoice_id = $this->db->insert_id();
            $product_id = $product_info->product_id;
            $this->deleteProductFromUserCart($product_id, $model_data['user_id']);
        }

        return true;

    }


    /**
     * Function for deleting product from user's cart
     *
     * @param $user_product_id
     * @param $user_id
     * @return bool
     */
    public function deleteProductFromUserCart($user_product_id, $user_id)
    {
        $this->db->select('user_cart_id');
        $this->db->from('user_cart');
        $this->db->where('user_product_id', $user_product_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('user_cart_deleted_date', '0000-00-00');
        $row = $this->db->get()->row();
        $this->userCartDelete($row->user_cart_id);
        return true;
    }


    /**
     * Function for updating a product
     *
     * @param $model_data
     * @return bool
     */
    public function updateProduct($model_data)
    {
        $this->load->library('session');
        if(isset($_SESSION['image_array']) && !empty($_SESSION['image_array']))
        {
            $image_array = $_SESSION['image_array'];
        }

        $data  = array(
            'product_id' => $model_data['product_id'],
            'product_name' => $model_data['product_name'],
            'product_description' => $model_data['product_description'],
            'product_description1' => $model_data['product_description1'],
            'product_description2' => $model_data['product_description2'],
            'product_description3' => $model_data['product_description3'],
            'product_price' => $model_data['product_price'],
            'time_price_check' => $model_data['time_price_check'],
            'product_status' => $model_data['product_status'],
            'discount' => $model_data['discount'],
            'address' => $model_data['address'],
            'state' => $model_data['state'],
            'city' => $model_data['city'],
            'facebook_link' => $model_data['facebook_link'],
            'instagram_link' => $model_data['instagram_link'],
            'payment_method' => $model_data['payment_method'],
            'contact_number' => $model_data['contact_number'],
            'budget' => $model_data['budget'],
        );
        // print_r($data);
        // exit();
        
        $this->updateProductVal($data);

        $category_data = array(
            'product_id' => $model_data['product_id'],
            'product_category' => $model_data['product_category'],
        );
        $this->updateProductCategoryVal($category_data);

        $subcategory_data = array(
            'product_id' => $model_data['product_id'],
            'product_subcategory' => $model_data['product_subcategory'],
        );
        $this->updateProductSubCategoryVal($subcategory_data);

        if(isset($image_array) && !empty($image_array))
        {
            foreach($image_array as $image)
            {
                $this->db->insert("product_image",array("product_image_name" => $image, "product_id" => $model_data['product_id']));
            }
        }
        
        if(isset($_SESSION['image_array']) && !empty($_SESSION['image_array']))
        {
            unset($_SESSION['image_array']);
        }
        return true;
    }


    /**
     * Function for updating a product value
     *
     * @param $model_data
     * @return bool
     */
    public function updateProductVal($model_data)
    {
        $this->db->where('product_id', $model_data['product_id']);
        
        if (!$this->db->update('product', $model_data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for updating a product's category
     *
     * @param $model_data
     * @return bool
     */
    public function updateProductCategoryVal($model_data)
    {
        $data = array(
            'product_id' => $model_data['product_id'],
            'product_category' => $model_data['product_category'],
        );
        $this->db->where('product_id', $model_data['product_id']);
      
        if (!$this->db->update('product_category', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for updating product's sub category
     *
     * @param $model_data
     * @return bool
     */
    public function updateProductSubCategoryVal($model_data)
    {
        $data = array(
            'product_id' => $model_data['product_id'],
            'product_subcategory' => $model_data['product_subcategory'],
        );
        $this->db->where('product_id', $model_data['product_id']);
      
        if (!$this->db->update('product_sub_category', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for deleting all products from user's cart
     *
     * @param $user_cart_id
     * @return bool
     */
    public function userCartDelete($user_cart_id)
    {
        $date=date("Y-m-d");

        $sql = "UPDATE `user_cart` SET `user_cart_deleted_date` = '$date' WHERE user_cart_id = $user_cart_id";
        $this->db->query($sql);

        return true;
    }


    /**
     * Function for deleting a product from user's cart
     *
     * @param $product_id
     * @return bool
     */
    public function userCartProductDelete($product_id)
    {
        $date=date("Y-m-d");

        $sql = "UPDATE `user_cart` SET `user_cart_deleted_date` = '$date' WHERE user_product_id = $product_id";
        $this->db->query($sql);

        return true;
    }


    /**
     * Function for updating a product status
     *
     * @param $product_id
     * @param $status
     * @return bool
     */
    public function updateproductstatus($product_id, $status)
    {        

        if ($status == "Enable") {
            $sql = "UPDATE `product` SET `product_status` = 'enabled' WHERE product_id = '$product_id'";
            $this->db->query($sql);
        }
        else {
            $sql = "UPDATE `product` SET `product_status` = 'disabled' WHERE product_id = '$product_id'";
            $this->db->query($sql);
        }

        return true;
    }


    /**
     * Function for counting user's cart products
     *
     * @param $user_id
     * @return mixed
     */
    public function countUserProductCart($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_cart');
        $this->db->where('user_id' , $user_id);
        $this->db->where('user_cart_deleted_date', '0000-00-00');
        $result = $this->db->get()->num_rows();
        return $result;
    }


    /**
     * Function for deleting a product
     *
     * @param $product_id
     * @return bool
     */
    public function productDelete($product_id)
    {
        $date=date("Y-m-d");

        $sql = "UPDATE `product` SET `product_deleted_date` = '$date' WHERE product_id = $product_id";
        $this->db->query($sql);

        return true;
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


    /**
     * Function for updating basic info
     *
     * @param $model_data
     * @return bool
     */
    public function updateBasicInfo($model_data)
    {
        $user_id =  $model_data['user_id'];
        $data = array(
            'first_name' => $model_data['first_name'],
            'middle_name' => $model_data['middle_name'],
            'last_name' => $model_data['last_name'],
            'username' => $model_data['username'],
            'mobile' => $model_data['mobile'],
            // 'email' => $model_data['email'],
        );

        $this->db->where('user_id', $user_id);

        if (!$this->db->update('users', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for updating user profile image
     *
     * @param $user_id
     * @param $fileName
     * @return bool
     */
    public function updateUserProfileImage($user_id, $fileName)
    {
        $data = array(
            'user_img' => $fileName,
        );
        
        $this->db->where('user_id', $user_id);

        if (!$this->db->update('users', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for updating party image
     *
     * @param $user_id
     * @param $image
     * @return bool
     */
    public function editPartyBasicInfo($user_id, $image)
    { 
        $data = array(
            'user_img' => $image,
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
        return true;
    }


    /**
     * Function for updating address information of a user
     *
     * @param $model_data
     * @return bool
     */
    public function updateAddressInfo($model_data)
    {
        $user_id =  $model_data['user_id'];
        $data = array(
            'address' => $model_data['address'],
            'city' => $model_data['city'],
            'zip' => $model_data['zip'],
            'country' => $model_data['country'],
            'state' => $model_data['state'],
        );

        $this->db->where('user_id', $user_id);

        if (!$this->db->update('users', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for updating login info
     *
     * @param $model_data
     * @return bool
     */
    public function updateLoginInfo($model_data)
    {
        $user_id =  $model_data['user_id'];
        
        $temppassword = $model_data['password'];
        $password = password_hash($temppassword, PASSWORD_BCRYPT);


        $sql = "UPDATE `user_login` SET `password` = '$password' WHERE `user_id` = '$user_id'";
        if(!$this->db->query($sql)) {
            show_error('Error updating password');
            die();
        }

        return true;
    }


    /**
     * Function to update client complete order
     *
     * @param $model_data
     * @return bool
     */
    public function updateClientStatus($model_data)
    {
        $data  = array(
            'product_invoice_id' => $model_data['product_invoice_id'],
            'client_status' => $model_data['client_status'],
        );

        $this->db->where('product_invoice_id', $model_data['product_invoice_id']);
        if (!$this->db->update('product_invoice', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }

    /**
     * Function to update client complete order
     *
     * @param $model_data
     * @return bool
     */
    public function updateServiceProviderStatus($model_data)
    {
        $data  = array(
            'product_invoice_id' => $model_data['product_invoice_id'],
            'provider_status' => $model_data['provider_status'],
        );

        $this->db->where('product_invoice_id', $model_data['product_invoice_id']);
        if (!$this->db->update('product_invoice', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function for updating product status reason
     *
     * @param $product_invoice_id
     * @param $reason
     * @return bool
     */
    public function updateProductStatusReason($product_invoice_id, $reason)
    {
        $this->db->where('product_invoice_id', $product_invoice_id);
        if (!$this->db->update('product_invoice', $reason)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     * Function to update provider complete order
     *
     * @param $model_data
     * @return bool
     */
    public function updateProviderStatus($model_data)
    {
        $data  = array(
            'product_invoice_id' => $model_data['product_invoice_id'],
            'provider_status' => $model_data['provider_status'],
        );

        //$this->updateCompletelDate($model_data['invoice_id']);

        $this->db->where('product_invoice_id', $model_data['product_invoice_id']);
        if (!$this->db->update('product_invoice', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     *  Function to update cancel order
     *
     * @param $model_data
     * @return bool
     */
    public function updateCancelOrder($model_data)
    {
        $data  = array(
            'product_invoice_id' => $model_data['product_invoice_id'],
            'reason' => $model_data['reason'],
            'client_status' => $model_data['client_status'],
        );

        $this->updateCancelDate($model_data['invoice_id']);

        $this->db->where('product_invoice_id', $model_data['product_invoice_id']);
        if (!$this->db->update('product_invoice', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }


    /**
     *  Function to create feedback
     */
    public function createFeedback($model_data)
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('client_user_id', $model_data['user_id']);
        $this->db->where('product_id', $model_data['product_id']);
        $num_rows = $this->db->get()->num_rows();

        $data1 = array(
            'client_user_id' => $model_data['user_id'],
            'product_id' => $model_data['product_id'],
        );

        $data = array(
            'client_user_id' => $model_data['user_id'],
            'product_id' => $model_data['product_id'],
            'subject' => $model_data['subject'],
            'rating' => $model_data['rating'],
            'simple_message' => $model_data['simple_message'],
            'name' => $model_data['name'],
        //    'product_invoice_id' => $model_data['product_invoice_id'],
        );

        if (!empty($num_rows)) {
            $this->db->where($data1);
            $this->db->update('feedback', $data);
            return true;
        } else {
            $this->db->insert('feedback', $data);
            return true;    
        }

        // if (!$this->db->insert('feedback', $data)) {
        //     show_error('Error submitting contact form ');
        //     die();
        // } else {
        //     $data = array(
        //         'product_invoice_id' => $model_data['product_invoice_id'],
        //         'client_status' => 'Reviewed'
        //     );

        //     $this->updateClientStatus($data);
        //     return true;
        // }
    }

    /**
     *  Function to create feedback
     */
    public function createFeedbackByServiceProvider($model_data)
    {
        $data = array(
            'provider_user_id' => $model_data['user_id'],
            'product_id' => $model_data['product_id'],
            'subject' => $model_data['subject'],
            'rating' => $model_data['rating'],
            'simple_message' => $model_data['simple_message'],
            'product_invoice_id' => $model_data['product_invoice_id'],
        );
        if (!$this->db->insert('feedback', $data)) {
            show_error('Error submitting contact form ');
            die();
        } else {
            $data = array(
                'product_invoice_id' => $model_data['product_invoice_id'],
                'provider_status' => 'Reviewed'
            );

             $this->updateServiceProviderStatus($data);
            return true;
        }
    }


    /**
     *  Function to update cancel date
     *
     * @param $invoice_id
     * @return bool
     */
    public function updateCancelDate($invoice_id)
    {
        $data  = array(
            'cancel_date' => date("Y-m-d"),
        );

        $this->db->where('invoice_id', $invoice_id);
        if (!$this->db->update('invoices', $data)) {
            show_error('Error updating data');
            die();
        } else {
            return true;
        }
    }

    public function CreateAndUpdateTestimonial($user_id,$testimonial)
    {
        $this->db->select('*');
        $this->db->from('testimonial');
        $this->db->where('user_id', $user_id);
        $num_rows = $this->db->get()->num_rows();

        $data  = array(
            'user_id' => $user_id,
            'description' => $testimonial,
        );
        if (!empty($num_rows)) {
            $this->db->where('user_id', $user_id);
            $this->db->update('testimonial', $data);
            $update = "update";
            return $update;
        } else {
            $this->db->insert('testimonial', $data);
            $add = "add";
            return $add;    
        }    
    }

    /**
     * Function for deleting all products from user's cart
     *
     * @param $user_cart_id
     * @return bool
     */
    public function deactivatedAccount($user_id)
    {
        $date=date("Y-m-d");
        $status= "Deleted";

        $sql = "UPDATE `user_login` SET `user_deleted` = '$date',`user_status` = '$status' WHERE user_id = $user_id";
        $this->db->query($sql);
        return true;
    }


    /**
     * Function for creating a user's Fav
     *
     * @param $model_data
     * @return bool
     */
    public function addfav_function($model_data)
    {
        $model_data  = array(
            'user_id' => $model_data['user_id'],
            'user_product_id' => $model_data['user_product_id'],
        );
        
        $this->db->insert('tbl_user_fav',$model_data);
    }


    

}