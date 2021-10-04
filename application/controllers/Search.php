<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller 
{

    // array inflate post function
    public function inflatePost($fields) {
        $result = array();
        foreach ($fields as $field) {
            if (isset($_POST[$field]))                
                $result[$field] = $_POST[$field];
            else $result[$field] = array();
        }
        return $result;
    }


    // Service List
    public function getAjaxProductList()
    {
        $this->db->select('product_id as rid');
        $this->db->from('product');
        $this->db->where('product_status', 'enabled');
        $this->db->where('product_deleted_date', '0000-00-00');
        return  $this->db->get()->result(); 
    }


    // get array format 
    public function generateProductArray($products) 
    {
        $rstProduct = "";
        foreach ($products as $product) 
        {
            $rstProduct .= '<div class="col-md-3 col-sm-4 col-xs-6 md-margin2x">';
            $rstProduct .= '<div class="product">';
            $rstProduct .= '<div class="product-top">';
            $rstProduct .= '<figure class="product-image-container product_banner_size">';
            $rstProduct .= '<a href="'.site_url().'home/Servicos?product_id='.$product->product_id.'">';

            $product_images = $this->user_helper->getProductFrontImages($product->product_id);
            if(isset($product_images) && !empty($product_images)) 
            { 
                $i=0;
                foreach ($product_images as $image) 
                {
                    if($i==0)
                    {
                        $rstProduct .= '<img src="'.base_url('admin/assets/images/products/').$image->product_image_name.'" alt="Product image" class="product-image product_banner_img">';
                    }
                    else
                    {
                        $rstProduct .= '<img src="'.base_url('admin/assets/images/products/').$image->product_image_name.'" alt="Product image" class="product-image-hover product_banner_img">';
                    }
                    $i++;
                }
            } else {
                $rstProduct .= '<img src="'.base_url().'admin/assets/images/products/product2.jpg" alt="Product image" class="product-image product_banner_img"><img src="'.base_url().'admin/assets/images/products/product2.jpg" alt="Product image" class="product-image-hover product_banner_img">';
            }

            $rstProduct .= '</a>';
            $rstProduct .= '</figure>';
            $rstProduct .= '</div>';
            $rstProduct .= '<div class="product-meta">';
            $rstProduct .= '<div class="product-meta-top clearfix">';
            $rstProduct .= '<div class="product-price-container text-left">';
            $rstProduct .= '<span class="product-price"></span>';

            if ($product->time_price_check == 1)
            {
                $product_price = 'Á combinar';
            $rstProduct .= '<span class="product-price price"> R$ ' .$product_price.'</span>';
            }
            else 
            {
            $product_price = str_replace(".",",", number_format($product->product_price, 2));
           
            $rstProduct .= '<span class="product-price price">R$ '  .$product_price.'</span>';
             }
            $rstProduct .= '</div>';
            $rstProduct .= '<h5 class="product-name product-name-custom text-left">';
            $rstProduct .= '<a href="'.site_url().'home/Servicos?product_id='.$product->product_id.'">'.$product->product_name.'</a>';
            $rstProduct .= '</h5>';
            $rstProduct .= '</div>';

            $rstProduct .= '<div class="review-comment product-meta-top clearfix ratings-container marginalign" >';
                                              
            $product_ratting=$this->user_helper->getProductRatting($product->product_id);

            if ($product_ratting->rat >= 1) {
                $rstProduct .= '<span class="fa fa-star checked"></span> ';
            } else {
                $rstProduct .= '<span class="fa fa-star-o"></span> ';
            }

            if ($product_ratting->rat >= 2) {
                $rstProduct .= '<span class="fa fa-star checked"></span> ';
            } else {
                $rstProduct .= '<span class="fa fa-star-o"></span> ';
            }
            if ($product_ratting->rat >= 3) {
                $rstProduct .= '<span class="fa fa-star checked"></span> ';
            } else {
                $rstProduct .= '<span class="fa fa-star-o"></span> ';
            }
            if ($product_ratting->rat >= 4) {
                $rstProduct .= '<span class="fa fa-star checked"></span> ';
            } else {
                $rstProduct .= '<span class="fa fa-star-o"></span> ';
            }
            if ($product_ratting->rat >= 5) {
                $rstProduct .= '<span class="fa fa-star checked"></span> ';
            } else {
                $rstProduct .= '<span class="fa fa-star-o"></span> ';
            }

            $rstProduct .= '<span class="ratings-amount"> '.$product_ratting->cnt.' Avaliações</span>';
            $rstProduct .= '</div>';

            
            $rstProduct .= '<div class="product-absolute-action-container clearfix">';


            if(!empty($this->session->userdata('userInfo')))
            {
                $rstProduct .= '<a href="'.site_url().'home/Servicos?product_id='.$product->product_id.'"  class="product-add-btn product-add-btn-custom">Contratar
                </a>
                <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom add-fav" onclick="add_fav('.$product->product_id.');">
                    <i class="fa fa-heart"></i>
                </a>
                <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom" onclick="add_quick_cart('.$product->product_id.');">
                    <i class="fa fa-shopping-cart"></i>
                </a>
                ';
            } 
            else 
            {
                $rstProduct .= '<a href="'.site_url().'home/Servicos?product_id='.$product->product_id.'"  class="product-add-btn product-add-btn-custom">Contratar
                </a>
                <a href="'.site_url().'home/Entrar" title="Favoritos" class="product-add-btn product-add-btn-custom add-fav">
                    <i class="fa fa-heart"></i>
                </a>
                <a href="'.site_url().'home/Entrar" title="Carrinho" class="product-add-btn product-add-btn-custom">
                    <i class="fa fa-shopping-cart"></i>
                </a>';
            }
            $rstProduct .= '</div></div></div></div>';
        
        }
        return $rstProduct;
    }


     //ajax search for service name
    public function ajaxSearchFilterByMutipleValue()
    {
        $categoryValue = $_POST['categoryValue'];
        $subcategoryValue = $_POST['subcategoryValue'];
        $stateValue = $_POST['stateValue'];
        $cityValue = $_POST['cityValue'];
        $sess_array = $this->session->userdata('userInfo');

        $sql = "";
        $currentdate = date('Y-m-d');
        $this->db->select('product.product_id as rid');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_plan_id=product.user_plan_id', 'left');
        $this->db->join('product_category','product_category.product_id=product.product_id', 'left');
        $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id');
        $this->db->join('user_login','user_login.user_id=product.user_id', 'left');

        
        if(!empty($categoryValue)) {
            $this->db->where('product_category.product_category =', $categoryValue);
        }
        if(!empty($subcategoryValue)) {
            $this->db->where('product_sub_category.product_subcategory =', $subcategoryValue);
        }
        if(!empty($stateValue)) {
            $this->db->where('product.state', $stateValue);
        }
        if(!empty($cityValue)) {
            $this->db->where('product.city', $cityValue);
        }


        $this->db->where('product_status', 'enabled');
        $this->db->where('user_plans.expire_date >=', $currentdate);
        // $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('product_deleted_date', '0000-00-00');
        $this->db->where('user_login.user_deleted', "0000-00-00");
        $this->db->group_by('product.product_id');
        $rids = $this->db->get()->result();
       
        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['new_products'] = array();
            $result['most_wanted_products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        $sql1 = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC";
        $products1 = $this->db->query($sql1)->result(); 


        $sql2 = "select * from product where product_id in (".$sqlIn.") ORDER BY no_of_click DESC";
        $products2 = $this->db->query($sql2)->result(); 


        $result = array();
        $result['new_products'] = $this->generateProductArray($products1);
        $result['most_wanted_products'] = $this->generateProductArray($products2);
        $result['result'] = 200;
        echo json_encode($result);
    }



    //ajax search for product
    public function ajaxSearchBySubcategory()
    {
        $subcategory_id = $_POST['subcategory_id'];
        $sess_array = $this->session->userdata('userInfo');
        $currentdate = date('Y-m-d');

        $sql = "";
        if ($subcategory_id == '') {
            $rids = $this->getAjaxProductList();
        } else {            
            $this->db->select('product.product_id as rid');
            $this->db->from('product');
            $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');
            $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id');

            if(!empty($sess_array)) {
                $user_id = $sess_array->user_id;
                $this->db->where('product.user_id !=', $user_id);
            }
            $this->db->where('user_plans.expire_date >=', $currentdate);
            $this->db->where('user_plans.deleted_date', "0000-00-00");  
            $this->db->where('product_subcategory', $subcategory_id);
            $this->db->where('product_status', 'enabled');
            $this->db->where('product_deleted_date', '0000-00-00');
            $rids = $this->db->get()->result();
        }        

        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC";
        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }


    //ajax search for product
    public function ajaxSearchByPriceFilter()
    {
        $pricerange_low = $_POST['price-range-low'];
        $pricerange_high = $_POST['price-range-high'];
        $sess_array = $this->session->userdata('userInfo');
        $currentdate = date('Y-m-d');

        $sql = "";
        $this->db->select('product_id as rid');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');

        if(!empty($sess_array)) {
            $user_id = $sess_array->user_id;
            $this->db->where('product.user_id !=', $user_id);
        }
        $this->db->where('user_plans.expire_date >=', $currentdate);
        $this->db->where('user_plans.deleted_date', "0000-00-00");  
        $this->db->where('product_price >=', $pricerange_low);
        $this->db->where('product_price <=', $pricerange_high);
        $this->db->where('product_status', 'enabled');
        $this->db->where('product_deleted_date', '0000-00-00');
        $rids = $this->db->get()->result();
       
        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC";
        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }


    //ajax search for service name
    public function ajaxSearchByServiceName()
    {
        $service_name = $_POST['service_name'];
        $sess_array = $this->session->userdata('userInfo');

        $sql = "";
        $currentdate = date('Y-m-d');
        $this->db->select('product_id as rid');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');
        if(!empty($sess_array)) {
            $user_id = $sess_array->user_id;
            $this->db->where('product.user_id !=', $user_id);
        }
        $this->db->like('product_name', $service_name, 'both');
        $this->db->where('product_status', 'enabled');
        $this->db->where('user_plans.expire_date >=', $currentdate);
        $this->db->where('user_plans.deleted_date', "0000-00-00");
        $this->db->where('product_deleted_date', '0000-00-00');
        $rids = $this->db->get()->result();
       
        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC";
        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }


    //ajax search for service name
    public function ajaxSearchBySorting()
    {
        $sort_filter = $_POST['sort_filter'];

        $sql = "";
        $this->db->select('product_id as rid');
        $this->db->from('product');
        $this->db->where('product_status', 'enabled');
        $this->db->where('product_deleted_date', '0000-00-00');
        $rids = $this->db->get()->result();
       
        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        if($sort_filter == 'Sort By: Price')
        {
           $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_price DESC"; 
        }
        else if($sort_filter == 'Sort By: Rating')
        {
           $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_avg_rating DESC";         
        }
        else
        {
           $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC"; 
        }


        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }


    // get array format 
    public function generateProductListArray($products) 
    {
        $rstProduct = "";
        foreach ($products as $product) 
        {
            $product_images = $this->user_helper->getProductFrontImages($product->product_id);
            $rstProduct .= '<div class="row product">';
            $rstProduct .= '<div class="col-sm-9 clearfix">';
            $rstProduct .= '<div class="product-top">';
            $rstProduct .= '<figure class="product-image-container">';
            $rstProduct .= '<a href="'.site_url().'home/Servicos?product_id='.$product->product_id.'" title="White linen sheer dress">';

            if(isset($product_images) && !empty($product_images)) 
            { 
                $i=0;
                foreach ($product_images as $image) 
                {
                    if($i==0)
                    {
                        $rstProduct .= '<img src="'.base_url().'admin/assets/images/products/'.$image->product_image_name.'" alt="Product image" class="product-image" style="min-height: 333.4px">';
                    }
                    else
                    {
                        $rstProduct .= '<img src="'.base_url().'admin/assets/images/products/'.$image->product_image_name.'" alt="Product image" class="product-image-hover" style="min-height: 333.4px">';
                    }
                    $i++;
                }
            }
            else
            {
                $rstProduct .= '<img src="'.base_url().'admin/assets/images/products/product2.jpg" alt="Product image" class="product-image"><img src="'.base_url().'admin/assets/images/products/product2.jpg" alt="Product image" class="product-image-hover">';
            }

            $rstProduct .= '</a>';
            $rstProduct .= '</figure>';
            $rstProduct .= '</div>';
            $rstProduct .= '<div class="product-list-content">';
            $rstProduct .= '<h3 class="product-name">';
            $rstProduct .= '<a href="'.site_url().'home/Servicos?product_id='.$product->product_id.'" title="White linen sheer dress">';

            $rstProduct .= $product->product_name;
            $rstProduct .= '</a>';
            $rstProduct .= '</h3>';
            $rstProduct .= '<p>';

                                                
            if (strlen($product->product_description) < 60)
            {
                $rstProduct .= '$product->product_description';
            }
            else
            {
                $rstProduct .= substr($product->product_description, 0, 350);
            }

            $rstProduct .= '...</p>';

            $rstProduct .= '</div>';
            $rstProduct .= '</div>';
            $rstProduct .= '<div class="col-sm-3 product-list-meta">';
            $rstProduct .= '<div class="product-price-container">';
            $rstProduct .= '<span class="product-price">$';
            $rstProduct .= $product->product_price;
            $rstProduct .= '</span>';
            $rstProduct .= '</div>';
            $rstProduct .= '<div class="ratings-container">';
            $rstProduct .= '<div class="ratings">';

            if($product->product_avg_rating == 0)
                $rating = 0;
            if($product->product_avg_rating == 1)
                $rating = 20;
            if($product->product_avg_rating == 2)
                $rating = 40;
            if($product->product_avg_rating == 3)
                $rating = 60;
            if($product->product_avg_rating == 4)
                $rating = 80;
            if($product->product_avg_rating == 5)
                $rating = 100;

            $rstProduct .= '<div class="ratings-result" data-result="'.$rating.'"></div>';
            $rstProduct .= '</div>';
            $rstProduct .= '</div>';
            $rstProduct .= '<div class="product-action-container">';

            if(!empty($userInfo)) 
            {
                $rstProduct .= '<a href="javascript:void(0);" title="Add to Cart" class="product-add-btn pull-right" onclick="add_quick_cart('.$product->product_id.'">Add to Cart </a>';
            } 
            else 
            {
                $rstProduct .= '<a href="'.site_url("home/Entrar").'" title="Add to Cart" class="product-add-btn  pull-right">Add to Cart </a>';
            }

            $rstProduct .= '</div>';
            $rstProduct .= '</div>';
            $rstProduct .= '</div>';
        }
        return $rstProduct;
    }
    

    //ajax search for product
    public function ajaxSearchBySubcategoryList()
    {
        $subcategory_id = $_POST['subcategory_id'];

        $sql = "";
        if ($subcategory_id == '') {
            $rids = $this->getAjaxProductList();
        } else {            
            $this->db->select('product.product_id as rid');
            $this->db->from('product');
            $this->db->join('product_sub_category','product_sub_category.product_id=product.product_id');
            $this->db->where('product_subcategory', $subcategory_id);
            $this->db->where('product_status', 'enabled');
            $this->db->where('product_deleted_date', '0000-00-00');
            $rids = $this->db->get()->result();
        }        

        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC";
        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductListArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }


    //ajax search for product
    public function ajaxSearchByPriceFilterList()
    {
        $pricerange_low = $_POST['price-range-low'];
        $pricerange_high = $_POST['price-range-high'];
        $sess_array = $this->session->userdata('userInfo');
        $currentdate = date('Y-m-d');
        

        $sql = "";
        $this->db->select('product_id as rid');
        $this->db->from('product');
        $this->db->join('user_plans','user_plans.user_id=product.user_id', 'left');

        if(!empty($sess_array)) {
            $user_id = $sess_array->user_id;
            $this->db->where('product.user_id !=', $user_id);
        }
        $this->db->where('user_plans.expire_date >=', $currentdate);
        $this->db->where('user_plans.deleted_date', "0000-00-00");  
        $this->db->where('product_price >=', $pricerange_low);
        $this->db->where('product_price <=', $pricerange_high);
        $this->db->where('product_status', 'enabled');
        $this->db->where('product_deleted_date', '0000-00-00');
        $rids = $this->db->get()->result();
       
        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC";
        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductListArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }


    //ajax search for service name
    public function ajaxSearchByServiceNameList()
    {
        $service_name = $_POST['service_name'];

        $sql = "";
        $this->db->select('product_id as rid');
        $this->db->from('product');
        $this->db->like('product_name', $service_name, 'both');
        $this->db->where('product_status', 'enabled');
        $this->db->where('product_deleted_date', '0000-00-00');
        $rids = $this->db->get()->result();
       
        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC";
        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductListArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }


    //ajax search for service name
    public function ajaxSearchBySortingList()
    {
        $sort_filter = $_POST['sort_filter'];

        $sql = "";
        $this->db->select('product_id as rid');
        $this->db->from('product');
        $this->db->where('product_status', 'enabled');
        $this->db->where('product_deleted_date', '0000-00-00');
        $rids = $this->db->get()->result();
       
        $array1 = array();

        foreach ($rids as $rid) 
            $array1[] = $rid->rid;   

        $ridArray = $array1;        
        if (count($ridArray) == 0)
        {
            $result = array();
            $result['products'] = array();
            $result['result'] = 200;
            echo json_encode($result);
            return;
        } 
        $sqlIn = "";
        foreach ($ridArray as $rid) {
            $sqlIn = $sqlIn . $rid . ",";
        }
        $sqlIn = substr($sqlIn, 0, strlen($sqlIn) - 1);


        if($sort_filter == 'Sort By: Price')
        {
           $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_price DESC"; 
        }
        else if($sort_filter == 'Sort By: Rating')
        {
           $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_avg_rating DESC";         
        }
        else
        {
           $sql = "select * from product where product_id in (".$sqlIn.") ORDER BY product_created_date DESC"; 
        }


        $products = $this->db->query($sql)->result();                     
        $result = array();
        $result['products'] = $this->generateProductListArray($products);
        $result['result'] = 200;
        echo json_encode($result);
    }






}
