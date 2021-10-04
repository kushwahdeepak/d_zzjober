<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller 
{

    /**
     *  Function for confirming an order
     */
    public function confirmOrder()
    {
        $sess_array = $this->session->userdata('userInfo');
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'address1' => $this->input->post('address1'),
            'city' => $this->input->post('city'),
            'postcode' => $this->input->post('postcode'),
            'country' => $this->input->post('country'),
            'region' => $this->input->post('region'),
            'total_price' => $this->input->post('total_price'),
            'user_product_id' => $this->input->post('user_product_id[]'),
        );

        $status = $this->user_worker->createConfirmProduct($model_data);
        if($status)
        {
            $this->session->set_flashdata('success_msg', 'Pedido feito com sucesso');
            redirect('home/myOrder');
        } else {
            $this->session->set_flashdata('error_msg', 'Ocorreu um erro ao fazer o pedido');
            redirect('user_controller/checkout');
        }
    }


    /**
     *  Function for getting my bookings page
     */
    public function booking()
    {
        $this->user_worker->checkLogin();
        $sess_array = $this->session->userdata('userInfo');
        $data['user_id'] = $sess_array->user_id;
        $data['pageName'] = "BOOKING";
        $data['invoice_id_list'] = $this->user_helper->getBookingList($data['user_id']);
        $this->load->view('content_handler', $data);
    }


    /**
     *  Function for updating basic info page
     */
    public function updateBasicInfo()
    {
        $sess_array = $this->session->userdata('userInfo');
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'first_name' => $this->input->post('firstname'),
            'middle_name' => $this->input->post('middlename'),
            'last_name' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'mobile' => $this->input->post('telecom'),
        );
        $status = $this->user_worker->updateBasicInfo($model_data);
        if($status == "true"){
            $this->session->set_flashdata('success_msg', 'Pedido feito com sucesso');
            redirect('user_controller/Minha_conta');
            //echo json_encode(true);
        } else {
            $this->session->set_flashdata('error_msg', 'Informações básicas não alteradas');
            redirect('user_controller/Minha_conta');
        }
    }


    /**
     * Function for getting user's cart product status
     *
     * @param string $task
     */
    public function userCartProductStatus()
    {
        $user_cart_id = $_POST['user_cart_id'];

        $this->user_worker->userCartDelete($user_cart_id);
        $sess_array = $this->session->userdata('userInfo');

        $user_id = $sess_array->user_id;
        $user_cart_product_count = $this->user_worker->countUserProductCart($user_id);
        $user_cart_product_list = $this->user_helper->getCartProductList($user_id);
        $total_price = 0;

        foreach ($user_cart_product_list as $user_cart_product) {
            $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
            $total_price = $total_price + ($cart_product_info->product_price * $user_cart_product->user_product_quantity);
        }

        $result = array();
        $i = 0;
        foreach ($user_cart_product_list as $user_cart_product) {

            $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
            $product_images = $this->user_helper->getProductFrontImages($user_cart_product->user_product_id);

            $result["user_cart_product"][$i] = $user_cart_product;
            $result["cart_product_info"][$i] = $cart_product_info;
            $result["product_images"][$i] = $product_images;

            $i++;
        }

        $result['user_id'] = $user_id;
        $result['total_price'] = $total_price;
        $result['user_cart_product_count'] = $user_cart_product_count;
        echo json_encode($result);
    }

     /**
     * Function for getting user's cart product status
     *
     * @param string $task
     */
    public function userCartDeleteProduct()
    {
        $user_cart_id = $this->input->get('user_cart_id');
        $this->user_worker->userCartDelete($user_cart_id);
        redirect('user_controller/carrinho');
    }


    /**
     * Function for getting product status
     *
     * @param string $task
     */
    public function productStatus($task = "")
    {
        $product_id = $this->input->get('product_id');
            
        if ($task == "Enable")
            $this->user_worker->updateproductstatus($product_id, "Enable");
        else if ($task == "Disable")
            $this->user_worker->updateproductstatus($product_id, "Disable");
        else if ($task == "Delete")
            $this->user_worker->productDelete($product_id);
        redirect('user_controller/Meus_servicos');
    }


    /**
     *  Function for updating address info
     */
    public function updateAddressInfo()
    {
        $sess_array = $this->session->userdata('userInfo');
        // $data['user_id'] = $sess_array->user_id;
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'address' => $this->input->post('address1'),
            'city' => $this->input->post('city'),
            'zip' => $this->input->post('postcode'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('region'),
        );
        $status = $this->user_worker->updateAddressInfo($model_data);
        if($status == "true"){
            echo json_encode(true);
        } else {
            $this->session->set_flashdata('error_msg', 'Endereço não alterado');
            redirect('user_controller/Minha_conta');
        }
    }


    /**
     *  Function for updating login information
     */
    public function updateLoginInfo()
    {
        $sess_array = $this->session->userdata('userInfo');
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'currentpassword' => $this->input->post('currentpassword'),
            'password' => $this->input->post('password'),
            'cpassword' => $this->input->post('cpassword'),
        );

        $getoldpass = $this->authentication_helper->verify_pass($model_data['user_id'], $model_data['currentpassword']);

        if($getoldpass)
        {   
            $this->user_worker->updateLoginInfo($model_data);
            $this->session->unset_userdata('userInfo');
            echo "SUCCESS";
        } else {
            echo "OLD-PASSWORD";
        }
    }


    /**
     * Function for getting a review page
     *
     */
    public function giveReview()
    {
        $model_data  = array(
            
            'product_id' => $this->input->post('hidden_product_id'),
            'name' => $this->input->post('name'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('simple_message'),
        );
        redirect('home/Servicos?product_id='.$model_data['product_id'], 'refresh');
    }


    /**
     *  Function for getting my product page
     */
    public function Meus_servicos()
    {
        $this->user_worker->checkLogin();
        $sess_array = $this->session->userdata('userInfo');
        $data['user_id'] = $sess_array->user_id;
        $data['pageName'] = "MYPRODUCTS";
        $data['product_lists'] = $this->user_helper->getUserProductList($data['user_id']);
        $this->load->view('content_handler', $data);
    }


    /**
     *  Function for getting my account page
     */
    public function Minha_conta()
    {
        $this->user_worker->checkLogin();
        $sess_array = $this->session->userdata('userInfo');
        $data['pageName'] = "MYACCOUNT";
        $data['user_id'] = $sess_array->user_id;
        $data['basic_info'] = $this->user_helper->getUserBasicInfo($data['user_id']);
        $data['plan_info'] = $this->user_helper->getUserBasicPlanInfo($data['user_id']);
        $this->load->view('content_handler', $data);
    }

    public function deactivatedAccount() 
    {
        $sess_array = $this->session->userdata('userInfo');
        $data['user_id'] = $sess_array->user_id;
        $status = $this->user_worker->deactivatedAccount($data['user_id']);
        $this->session->unset_userdata('userInfo');
        redirect('home/Entrar'); 
    }


    /**
     *  Function for getting add product page
     */
    public function addProduct()
    {
        $this->user_worker->checkLogin();
        $sess_array = $this->session->userdata('userInfo');
        $data['pageName'] = "ADDPRODUCT";
        $data['user_id'] = $sess_array->user_id;
        $data['category_list'] = $this->user_helper->getCategory();
        $data['basic_info'] = $this->user_helper->getUserBasicInfo($data['user_id']);
        $this->load->view('content_handler', $data);
    }


    /**
     *  Function for getting purchase plans if user does not have an active plan
     */
    public function purchasePlan()
    {
        $sess_array = $this->session->userdata('userInfo');   
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'plan_id' => $this->input->post('plan_id'),
            'expire_date' => $this->input->post('expire_date'),
            'remaining_service' => $this->input->post('remaining_service'),
        );

        $status = $this->user_worker->createUserPlan($model_data);
        if($status == "true")
        {
            $this->session->set_flashdata('sucess_msg', 'O plano foi adquirido com sucesso');
            redirect('user_controller/addProduct');
        } else {
            $this->session->set_flashdata('error_msg', 'O plano não foi adquirido');
            redirect('home/Planos'); 
        }
    }




    /**
     *  Function for adding a product or service to a cart
     */
    public function addToCart()
    {
        $sess_array = $this->session->userdata('userInfo');
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'user_product_id' => $this->input->post('user_product_id'),
            'user_product_quantity' => $this->input->post('user_product_quantity'),
        );
        $this->user_worker->createUserCartInfo($model_data);

        $user_id = $sess_array->user_id;
        $user_cart_product_count = $this->user_worker->countUserProductCart($user_id);
        $user_cart_product_list = $this->user_helper->getCartProductList($user_id);
        $total_price = 0;

        foreach ($user_cart_product_list as $user_cart_product) {
            $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);

        if($cart_product_info->time_price_check == 0)
            {
                $total_price = $total_price + ($cart_product_info->product_price * $user_cart_product->user_product_quantity);
            }  
         }

        $result = array();
        $i = 0;
        foreach ($user_cart_product_list as $user_cart_product) {

            $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
            $product_images = $this->user_helper->getProductFrontImages($user_cart_product->user_product_id);

            $result["user_cart_product"][$i] = $user_cart_product;
            $result["cart_product_info"][$i] = $cart_product_info;
            $result["product_images"][$i] = $product_images;

            $i++;
        }
        $total_price = str_replace(".",",", number_format($total_price, 2));
        $result['user_id'] = $user_id;
        $result['total_price'] = $total_price;
        $result['user_cart_product_count'] = $user_cart_product_count;
        echo json_encode($result);

    }

    /**
     *  Function for adding a product or service to a fav list
     */
    public function addfav()
    {
        $sess_array = $this->session->userdata('userInfo');
        $user_id = $sess_array->user_id;
        $user_product_id = $this->input->post('user_product_id');

        $this->db->select('*');
        $this->db->from('tbl_user_fav');
        $this->db->where('user_id', $user_id);
        $this->db->where('user_product_id', $user_product_id);
        $check = $this->db->get()->row();

        if(empty($check))
        {
            $model_data  = array(
                'user_id' => $user_id,
                'user_product_id' => $user_product_id,
            );
            $this->user_worker->addfav_function($model_data);
            $result['status'] = true;
        }
        else
        {
            $result['status'] = false;
        }
        
        echo json_encode($result);
    }

    /**
     *  Function for checking quantity
     */
    public function checkQuantity()
    {
        $quantity = $this->input->post('quantity');        

        if ($quantity == 0) {
           
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
    }


    /**
     * Function for editing a product page
     *
     */
    public function Editar_servicos()
    {
        $this->user_worker->checkLogin();
        $sess_array = $this->session->userdata('userInfo');
        
        $data['pageName'] = "EDITPRODUCT";
        
        $product_id = $this->input->get('product_id');

        $data['user_id'] = $sess_array->user_id;
        $data['category_list'] = $this->user_helper->getCategory();
        $data['basic_info'] = $this->user_helper->getUserBasicInfo($data['user_id']);
        $data['product_info'] = $this->user_helper->getProductDetail($product_id);
        $data['category_lists'] = $this->user_helper->getCategory();
        $data['statelist'] = $this->user_helper->getStateList();
       //  $data['citylist'] = $this->user_helper->getCityList();
        $data['product_id'] = $product_id;

        $this->load->view('content_handler', $data);
    }


    // Upload Product image
    public function uploadProductImage()
    {
        $this->load->library('session');

        if (isset($_FILES['file']['name']) and ($_FILES['file']['name']!=''))
        {
            $small_target_dir = "admin/assets/images/products/";
            $large_target_dir = "admin/assets/images/products/";

            $path_parts = pathinfo($_FILES['file']['name']);
            $fileName = $path_parts["basename"];

            $small_target_dir = $small_target_dir.$fileName;
            $large_target_dir = $large_target_dir.$fileName;


            if(move_uploaded_file($_FILES["file"]["tmp_name"], $large_target_dir))
            {
                $_SESSION['image_array'][]  = $fileName;

                //file permission
                chmod ($large_target_dir, 0777);

                // for big img
                $large_width = $this->image_resize_model->getWidth($large_target_dir);
                $large_height = $this->image_resize_model->getHeight($large_target_dir);

                $max_width = 670;
                if ($large_width > $max_width)
                {
                    $scale = $max_width/$large_width;
                    $this->image_resize_model->resizeImage($large_target_dir,$large_width,$large_height,$scale);
                } else {
                    $scale = 1;
                    $this->image_resize_model->resizeImage($large_target_dir,$large_width,$large_height,$scale);
                }
            }
        }

        return true;
    }


    /**
     *  Function for creating a product
     *
     */
    public function createProduct()
    {
        $sess_array = $this->session->userdata('userInfo');  
         $time_price_check = $this->input->post('time_price_check');
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'product_name' => $this->input->post('product_name'),
            'product_description' => $this->input->post('description'),
            'product_description1' => $this->input->post('description1'),
            'product_description2' => $this->input->post('description2'),
            'product_description3' => $this->input->post('description3'),
            'product_category' => $this->input->post('product_category'),
            'product_subcategory' => $this->input->post('product_subcategory'),
            'product_price' => $this->input->post('price'),
            'time_price_check' => $this->input->post('time_price_check'),
            'discount' => $this->input->post('discount'),
            'product_status' => $this->input->post('status'),
            'product_created_date' => date('Y-m-d H:i:s'),
            'budget' => $this->input->post('budget'),
            'contact_number' => $this->input->post('contact_number'),
            'payment_method' => $this->input->post('payment_method'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'facebook_link' => $this->input->post('facebook_link'),
            'instagram_link' => $this->input->post('instagram_link'),
            'address' => $this->input->post('address'),
        );
        if(empty($time_price_check))
            $model_data['time_price_check'] = 0;

        else
            $model_data['time_price_check'] = $time_price_check;

        
        $response = $this->user_worker->createProduct($model_data);

    
       if (isset($response) && !empty($response)) 
        {
            $this->session->set_flashdata('success_msg', 'Serviço cadastrado com sucesso!');
            redirect('user_controller/Meus_servicos');
        } else {
            $this->session->set_flashdata('error_msg', 'Ocorreu um erro, Preencha todos os campos e tente novamente');
            redirect('user_controller/Meus_servicos');
        }
    }


    // Update product
    public function updateProduct()
    {
        $sess_array = $this->session->userdata('userInfo');     

        $time_price_check = $this->input->post('time_price_check');

        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'product_id' => $this->input->post('product_id'),
            'product_name' => $this->input->post('product_name'),
            'product_description' => $this->input->post('description'),
            'product_description1' => $this->input->post('description1'),
            'product_description2' => $this->input->post('description2'),
            'product_description3' => $this->input->post('description3'),
            'product_category' => $this->input->post('product_category'),
            'product_subcategory' => $this->input->post('product_subcategory'),
            'product_price' => $this->input->post('price'),
            'discount' => $this->input->post('discount'),
            'product_status' => $this->input->post('status'),
            'product_created_date' => date('Y-m-d H:i:s'),
            'budget' => $this->input->post('budget'),
            'contact_number' => $this->input->post('contact_number'),
            'payment_method' => $this->input->post('payment_method'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'facebook_link' => $this->input->post('facebook_link'),
            'instagram_link' => $this->input->post('instagram_link'),
            'address' => $this->input->post('address'),
        );

        if(empty($time_price_check))
            $model_data['time_price_check'] = 0;

        else
            $model_data['time_price_check'] = $time_price_check;

        $status = $this->user_worker->updateProduct($model_data);

        if($status == "1")
        {
            $this->session->set_flashdata('success_msg', 'Serviço atualizado com sucesso');
            redirect('user_controller/Meus_servicos');
        } else {
            $this->session->set_flashdata('error_msg', 'Serviço não atualizado');
            redirect('user_controller/Meus_servicos');
        }
    }

   
    // Function for updating profile image of customer
    public function updateCustomerProfileImage()
    {  
        $sess_array = $this->session->userdata('userInfo');
        $user_id = $sess_array->user_id;

        if(isset($_POST["upload"]))
        {
            //get the file information
            $fileName = basename($_FILES["image"]["name"]);

            $fileTmp =  $_FILES["image"]["tmp_name"];
            $fileType = $_FILES["image"]["type"];
            $fileSize = $_FILES["image"]["size"];
            $fileExt = substr($fileName, strrpos($fileName, ".") + 1);

            //specify image upload directory
            $date = new DateTime();
            $name = $date->getTimestamp();
            $path_parts = pathinfo($_FILES['image']['name']);
            $fileName = $name . "_" . "0" . "." . $fileExt;

            $largeImageLoc = 'admin/images/users/'.$fileName;
            $thumbImageLoc = 'admin/images/users/'.$fileName;

            //check file extension
            $error = "";
            if((!empty($_FILES["image"])) && ($_FILES["image"]["error"] == 0))
            {
                if($fileExt != "jpg" && $fileExt != "jpeg" && $fileExt != "png")
                {
                    $error = "Desculpe, apenas arquivos JPG, JPEG e PNG são permitido";
                }
            } else{

                $error = "Selecione uma imagem JPG, JPEG ou PNG para carregar";
            }

            //if everything is ok, try to upload file
            if(strlen($error) == 0 && !empty($fileName))
            {
                if(move_uploaded_file($fileTmp, $largeImageLoc))
                {
                    //file permission
                    chmod ($largeImageLoc, 0777);

                    $width = $this->image_resize_model->getWidth($largeImageLoc);
                    $height = $this->image_resize_model->getHeight($largeImageLoc);
                    $max_width = 600; 

                    //Scale the image if it is greater than the width set above
                    if ($width > $max_width)
                    {
                        $scale = $max_width/$width;
                        $uploaded = $this->image_resize_model->resizeImage($largeImageLoc,$width,$height,$scale);
                    } else {
                        $scale = 1;
                        $uploaded = $this->image_resize_model->resizeImage($largeImageLoc,$width,$height,$scale);
                    }

                    //get image coords
                    $x = (int) $_POST['x'];
                    $y = (int) $_POST['y'];
                    $width = (int) $_POST['w'];
                    $height = (int) $_POST['h'];

                    //Scale the image to the thumb_width set above
                    if ($width == 0) 
                    {
                       $width = 1;
                    }
                    if ($height == 0) 
                    {
                       $height = 1;
                    }
                    $scale = $max_width/$width;
                    if($width != 1 && $height != 1)
                    {
                        $cropped = $this->image_resize_model->resizeThumbnailImage($thumbImageLoc, $largeImageLoc,$width,$height,$x,$y,$scale);
                    }

                    $result = $this->user_worker->updateUserProfileImage($user_id, $fileName);
                    if ($result)
                    {
                        $this->session->set_flashdata('success_msg', 'Imagem do perfil atualizada');
                        redirect('user_controller/Minha_conta');
                    }
                    $result = $this->authentication_worker->editPartyBasicInfo($user_id, $fileName);
                    if ($result)
                    {
                        $this->session->set_flashdata('success_msg', 'Imagem do perfil atualizada');
                        redirect('user_controller/Minha_conta');
                    }
                } else {
                    $this->session->set_flashdata('error_msg', 'Desculpe, ocorreu um erro ao fazer upload do seu arquivo');
                    redirect('user_controller/Minha_conta');
                }
            } else {
                //display error
                $this->session->set_flashdata('error_msg', $error);
                redirect('user_controller/Minha_conta');
            }
        }
    }


    /**
     * Function for deleting product image
     *
     * @param $product_image_id
     */
    public function deleteProductImage($product_image_id)
    {
        $this->db->where('product_image_id', $product_image_id);
        $this->db->delete('product_image'); 

        $msg = array('msg' => 'Success');
        echo json_encode($msg);
    }


    /**
     *  Function for getting cart page
     */
    public function carrinho()
    {
        $this->user_worker->checkLogin();
        $sess_array = $this->session->userdata('userInfo');
        $data['pageName'] = "CHECKOUTONE";
        $data['user_id'] = $sess_array->user_id;        
        $this->load->view('content_handler', $data);
    }


    /**
     *  Function for getting checkout page
     */
    public function checkout()
    {
        $this->user_worker->checkLogin();
        $data['pageName'] = "CHECKOUTTWO";
        $data['country_list'] = $this->geo_helper->getCountryList();
        $this->load->view('content_handler', $data);
    }


    // product by price filter
    public function priceFilter()
    {
        $sess_array = $this->session->userdata('userInfo');
        // $user_id = $sess_array->user_id; 
        if(!empty($sess_array))
        {
            $user_id = $sess_array->user_id; 
        }
        else
        {
            $user_id = null;
        }
        $from_price = $_POST['from_price'];
        $to_price = $_POST['to_price'];

        $product_info = $this->authentication_helper->getProductInfoByPrice($from_price, $to_price);

        // $product_infos = array();
        // $i = 0;
        // foreach ($product_info as $product_info) {
        //     # code...
        //      $product_infos[$i]['product_images'] = $this->user_helper->getProductFrontImages($product_info->product_id);
        //     $i++;
        // }

        $data = array(
            // 'product_infos' => $product_infos,
            'product_info' => $product_info,
            'user_id' => $user_id,
        );
        echo json_encode($data);
    }


    // product by subcategory filter
    public function subcategoryFilter()
    {
        $sess_array = $this->session->userdata('userInfo');
        // $user_id = $sess_array->user_id; 
        if(!empty($sess_array))
        {
            $user_id = $sess_array->user_id; 
        }
        else
        {
            $user_id = null;
        }
        $subcat_id = $_POST['subcat_id'];

        $product_info = $this->authentication_helper->getProductInfoBysubcategory($subcat_id);

        $data = array(
            'product_info' => $product_info,
            'user_id' => $user_id,
        );
        echo json_encode($data);
    }


    /**
     *  Function for removing a product asynchronously
     */
    public function ajaxProductRemove()
    {
        $unit_price = $_POST['unit_price'];
        $total_price = $_POST['total_price'];
        $product_id = $this->input->post('product_id');

        $this->user_worker->userCartProductDelete($product_id);

        $new_total_price = $total_price - $unit_price;
        
        echo json_encode($new_total_price);
    }


    /**
     *  Function to complete order
     */
    public function clientCompleteOrder()
    {
        $data  = array(
            'product_invoice_id' => $this->input->get('product_invoice_id'),
            'client_status'=> "Complete",
        );

        $this->user_worker->updateClientStatus($data);

        $this->session->set_flashdata('success_msg', 'Seu pedido foi concluido');
        //redirect('home/my_order');
        echo json_encode(true);
    }


    /**
     *  Function to complete order
     */
    public function providerCompleteOrder()
    {
        $data  = array(
            'product_invoice_id' => $this->input->get('product_invoice_id'),
            'provider_status'=> "Complete",
        );

        $this->user_worker->updateProviderStatus($data);

        $this->session->set_flashdata('success_msg', 'Seu pedido foi concluido');
        //redirect('home/my_order');
        echo json_encode(true);
    }

    /**
     *  Function to client Reviewed 
     */
    public function clientReviewed()
    {
        $feedback_id = $this->input->get('feedback_id');
        $resultData =  $this->user_helper->getclientReviewedInfo($feedback_id);
        echo json_encode($resultData);
    }



    /**
     *  Function for customer feedback
     */
    public function customerFeedback()
    {
        $data  = array(
            'user_id' => $this->input->post('feedback_user_id'),
            'product_id' => $this->input->post('feedback_product_id'),
        //    'product_invoice_id' => $this->input->post('feedback_product_invoice_id'),
            'subject' =>$this->input->post('subject') ,
            'rating' =>$this->input->post('star') ,
            'simple_message' => $this->input->post('simple_message'),
            'name' => $this->input->post('name'),
        );

        $this->user_worker->createFeedback($data);
        $this->session->set_flashdata('success_msg', 'Enviado seu seu feedback sucesso!');
        redirect('home/Servicos?product_id='.$data['product_id']);
    }

     /**
     *  Function for feedback by Service Provider
     */
    public function FeedbackByServiceProvider()
    {
        $data  = array(
            'user_id' => $this->input->post('feedback_user_id'),
            'product_id' => $this->input->post('feedback_product_id'),
            'product_invoice_id' => $this->input->post('feedback_product_invoice_id'),
            'subject' =>$this->input->post('subject') ,
            'rating' =>$this->input->post('star') ,
            'simple_message' => $this->input->post('simple_message'),
        );

        $this->user_worker->createFeedbackByServiceProvider($data);
        redirect('user_controller/booking');
    }


    /**
     *  Function to cancel order
     */
    public function cancelOrder()
    {
        $data  = array(
            'product_invoice_id' => $this->input->post('product_invoice_id'),
            'invoice_id' => $this->input->post('invoice_id'),
            'reason' => $this->input->post('reason'),
            'client_status'=> "Cancel",
        );
        $this->user_worker->updateCancelOrder($data);
        $this->session->set_flashdata('error_msg', 'Seu pedido foi cancelado');
        redirect('home/myOrder');
    }


    /**
     *  Function for rejecting service complete status
     */
    public function rejectServiceCompleteStatus()
    {
        $model_data = array(
            'product_invoice_id' => $this->input->post('product_invoice_id'),
            'client_status' => 'Incomplete'
        );

        $data = array(
            'reason' => $this->input->post('reason')
        );

        $this->user_worker->updateClientStatus($model_data);
        $this->user_worker->updateProductStatusReason($model_data['product_invoice_id'], $data);

        $this->session->set_flashdata('success_msg', 'Status atualizado com sucesso ');
        redirect('home/myOrder');
    }

    public function imageremovefromsession()
    {
        $image = $_POST['image'];
        $image_array = $_SESSION['image_array'];
        $index = array_search($image, $image_array);
        unset($image_array[$index]);

        unset($_SESSION['image_array']);
        $_SESSION['image_array']  = $image_array;
        echo json_encode(true);
    }

    public function purchasePlanTransactionData()
    {
        $sess_array = $this->session->userdata('userInfo');   
        $pre_plan_id = $this->input->post('pre_plan_id');

        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'plan_id' => $this->input->post('plan_id'),
            'expire_date' => $this->input->post('expire_date'),
            'remaining_service' => $this->input->post('remaining_service'),
        );
        $data = array(
            'user_id' => $sess_array->user_id,
            'plan_id' => $this->input->post('plan_id'),
            'previous_plan_id' => $this->input->post('pre_plan_id'),
            'id' => $this->input->post('id'),
            'cart' => $this->input->post('cart'),
            'create_time' => $this->input->post('create_time'),
            'payment_method' => $this->input->post('payment_method'),
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'country_code' => $this->input->post('country_code'),
            'line1' => $this->input->post('line1'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'postal_code' => $this->input->post('postal_code'),
            'amount' => $this->input->post('total'),
            'currency' => $this->input->post('currency'),
        );

        if(empty($pre_plan_id))
            $this->user_worker->createUserPlan($model_data);
        else
            $this->user_worker->updateUserPlan($model_data, $pre_plan_id);

        $this->user_worker->createTransactionData($data);
        echo json_encode(true);
    }
    
    public function purchaseFreePlan()
    {
        $sess_array = $this->session->userdata('userInfo');   
        $model_data  = array(
            'user_id' => $sess_array->user_id,
            'plan_id' => $this->input->post('plan_id'),
            'expire_date' => $this->input->post('expire_date'),
            'remaining_service' => $this->input->post('remaining_service'),
        );
        $this->user_worker->createUserPlan($model_data);
        echo json_encode(true);
    }

    public function CreateAndUpdateTestimonial()
    {
        $sess_array = $this->session->userdata('userInfo');   
        $user_id = $sess_array->user_id;
        $testimonial = $this->input->post('description');
        $result = array();
        $status = $this->user_worker->CreateAndUpdateTestimonial($user_id, $testimonial);
        if ($status == "add") {
            $result['success'] = "add"; 
            echo json_encode($result);
        } else{
            $result['success'] = "update"; 
            echo json_encode($result);    
        }
        
    }




}