<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller 

{



    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }


    /**
     *  Function for getting home page
     */
    public function index()
	{
        $sess_array = $this->session->userdata('userInfo');
        $data['pageName'] = "HOME";
        $data['webabout'] = $this->authentication_helper->getAboutUs(); 
     //   $data['productall_review'] = $this->user_helper->getHomeAllReview();
        $data['TestimonialInfoList'] = $this->authentication_helper->getAllTestimonialInfo();
        $data['new_product_lists'] = $this->authentication_helper->getUserProductList();
        $data['wanted_services'] = $this->authentication_helper->wanted_service();
        if(!empty($sess_array))
        {
            $user_id = $sess_array->user_id;
            $data['new_product_list'] = $this->authentication_helper->getAllNewProductList($user_id);
            $data['history_product_list'] = $this->authentication_helper->getAllNewHistoryProductList($user_id);
            $data['bestseller_list'] = $this->authentication_helper->getBestSellerProductList($user_id);
        } 
        else
        {
            $data['new_product_list'] = $this->authentication_helper->getAllNewProductList($user_id="");
            $data['history_product_list'] = $this->authentication_helper->getAllNewHistoryProductList($user_id="");
            $data['bestseller_list'] = $this->authentication_helper->getBestSellerProductList($user_id="");
        }  
        $this->load->view('content_handler', $data);
	}

      /**
     *  Function for getting my product page
     */
    public function myProducts()
    {
       
        $data['pageName'] = "HOME";
         $this->load->model('authentication_helper');
        $data['new_product_lists'] = $this->authentication_helper->getUserProductList();
           echo  "<pre>";
          print_r($data['new_product_lists']);
      exit;
        $this->load->view('content_handler', $data);
    }



    /**

     * Function for getting contact us page

     */

    public function Contato()

    {

        $data['pageName'] = "CONTACT";

        $this->load->view('content_handler', $data);

    }





    /**

     *  Function for getting category page

     */

    public function category()

    {

        $data['pageName'] = "CATEGORY";

        $this->load->view('content_handler', $data);

    }





    /**

     *  Function for getting registration page

     */

    public function Registrar_Conta()

    {

        $data = array(

            'pageName' => 'REGISTRATION',

            'country_list' => $this->geo_helper->getCountryList(),

        );

        $this->load->view('content_handler', $data);

    }





    /**

     *  Function for getting login page

     */

    public function Entrar()

    {

        $data['pageName'] = "LOGIN";

        $this->load->view('content_handler', $data);

    }





    /**

     *  Function for getting forget password page

     */

    public function Esqueceu_a_senha()

    {

        $data['pageName'] = "FORGETPASSWORD";

        $this->load->view('content_handler', $data);

    }





    /**

     *  Function for getting about us page

     */

    public function about()

	{

        $data['pageName'] = "ABOUT";

        $data['webabout'] = $this->authentication_helper->getAboutUs(); 

        $this->load->view('content_handler', $data);

	}





	/**

     *  Function for getting testimonial page

     */

	public function testimonial()
	{
        $this->user_worker->checkLogin();

        $sess_array = $this->session->userdata('userInfo');

        $user_id = $sess_array->user_id;

        $data['TestimonialInfo'] = $this->authentication_helper->getTestimonialInfo($user_id);

        $data['pageName'] = "TESTIMONIAL";

        $this->load->view('content_handler', $data);

	}





	/**

     *  Function for getting faq's page

     */

	public function FAQs()

	{

        $data['pageName'] = "FAQS";

        $data['webfaqs'] = $this->authentication_helper->getfaqsList();    

        $this->load->view('content_handler', $data);

	}





	/**

     *  Function for getting privacy page

     */

	public function Politica_de_Privacidade()
	{

        $data['pageName'] = "PRIVACY";

        $data['webPrivacyPolicy'] = $this->authentication_helper->getPrivacyPolicy();   

        $this->load->view('content_handler', $data);

	}





	/**

     *  Function for getting terms and conditions page

     */

	public function Termos_Condicoes()

	{

        $data['pageName'] = "TERMSCONDITIONS";

        $data['webterm'] = $this->authentication_helper->getTermCondition();  

        $this->load->view('content_handler', $data);

	}





	/**

     *  Function for getting how it works page

     */

	public function O_que_Oferecemos()

	{

        $data['pageName'] = "HOWITWORKS";

        $data['webhowitworks'] = $this->authentication_helper->getWorking(); 

        $this->load->view('content_handler', $data);

	}





    /**

     *  Function for getting features page

     */

	public function features()

    {

        $data['pageName'] = "FEATURES";

        $data['webfeatures'] = $this->authentication_helper->getFeatures();          

        $this->load->view('content_handler', $data);

    }



    /**
     *  Function for getting my orders page
    */
    public function myOrder() 
    {
        $this->user_worker->checkLogin();
        $data['pageName'] = "MYORDER";
        $this->load->view('content_handler', $data);
    }


    /**
     *  Function for getting products page
    */
    public function Lista_de_servicos($services_type="")
    {
        // $data['product_list'] = $this->authentication_helper->getProductList($user_id);
        $data['wanted_product_list'] = $this->authentication_helper->wanted_allservice();
        $data['new_product_list'] = $this->authentication_helper->new_servicesList();
        $data['categoryList'] = $this->user_helper->getCategory();
        $data['statelist'] = $this->user_helper->getStateList();
        $data['services_type'] = $services_type;
        $data['pageName'] = "PRODUCTS"; 
        $this->load->view('content_handler', $data);
    }





    /**
     *  Function for getting product list page
     */
    public function productList()
    {
        $sess_array = $this->session->userdata('userInfo');
        if(!empty($sess_array))
        {
            $user_id = $sess_array->user_id;
            $data['product_list'] = $this->authentication_helper->getProductList($user_id);
        } else {
            $data['product_list'] = $this->authentication_helper->getAllProductList();
        }
        $data['pageName'] = "PRODUCTLIST";
        $this->load->view('content_handler', $data);
    }



    /**
     *  Function for getting plans page
     */
    public function Planos($plan_id="")
    {
        $data['pageName'] = "PLANS";  
        $data['pre_plan_id'] = $plan_id;  
        $data['planinfolist'] = $this->user_helper->getPlanInfo();  
        $this->load->view('content_handler', $data);
    }



    /**

     *  Function for getting plans page

     */

    public function planos_confirmar($plan_id="", $pre_plan_id="")
    {
        $this->user_worker->checkLogin();
        $data['pageName'] = "PLANCHECKOUT";  
        $data['pre_plan_id'] = $pre_plan_id;  
        $data['planinfo'] = $this->user_helper->getSinglePlanInfo($plan_id);  
        $this->load->view('content_handler', $data);
    }





    /**
     *  Function for getting product overview page
     */
    public function Servicos()
    {
        $sess_array = $this->session->userdata('userInfo');
        $product_id = $this->input->get('product_id');
        $product_data = $this->user_helper->getProductDetailForFrontEnd($product_id);
                
        if(!empty($product_data))
        {
            $data['pageName'] = "PRODUCTSOVERVIEW";
            $data['product_ratting'] = $this->user_helper->getProductRatting($product_id);
            $data['productall_review'] = $this->user_helper->getProductAllReview($product_id);
            $data['product_info'] = $product_data;

            if (!empty($sess_array)) 
            {
                $user_id = $sess_array->user_id;
                $data['wanted_services'] = $this->user_helper->getProductListByCategory($data['product_info']->product_category,$user_id, $data['product_info']->product_id);
            } else{
                $data['wanted_services'] = $this->user_helper->getProductListByCategory($data['product_info']->product_category,$user_id="", $data['product_info']->product_id); 
            }

            $this->load->view('content_handler', $data);
        }
        else
        {
            redirect('home/index');
        }
    }





	/**

     * Function for getting states of a country

     *

     * @return string

     */

    public function getCountryStates()

    {

        $country_id = $this->input->get('country_id');

        $states = $this->geo_helper->getCountryStates($country_id);



        $states_string = '';



        $states_string .= "<option value=''> Selecione a região </option>";

        foreach ($states as $state) {

            $states_string .= "<option value='" . $state->geo_id . "'>" . $state->geo_name . "</option>";

        }



        echo $states_string;

    }





    /**

     * Function for getting subcategory of category

     *

     * @return string

     */

    public function getSubcategoryOfCategory()
    {
        $category_id = $this->input->get('category_id');
        $subcategories = $this->user_helper->getSubCategory($category_id);
        $sub_cat_string = '';
        if(!empty($subcategories))
        {
            $sub_cat_string .= "<option value=''> Selecionar subcategoria </option>";
            foreach ($subcategories as $subcategory) {
                $sub_cat_string .= "<option value='" . $subcategory->subcategory_id . "'>" . $subcategory->subcategory_title . "</option>";
            }
        }
        else
        {
            $sub_cat_string .= "<option value=''>Não tem nenhuma subcategoria</option>";
        }
        echo $sub_cat_string;
    }



    /**

     * Function for getting City of State

     *

     * @return string

     */

    public function getCityOfState()

    {

        $state_id = $this->input->get('state_id');

        $CityList = $this->user_helper->getStateOfCityList($state_id);

        

        $CityList_string = '';



        if(!empty($CityList))

        {

            $CityList_string .= "<option value=''> Selecione a cidade </option>";

            foreach ($CityList as $City) {

                $CityList_string .= "<option value='" . $City->city_id . "'>" . $City->city_name . "</option>";

            }

        }

        else

        {

            $CityList_string .= "<option value=''>Não tem nenhuma cidade</option>";

        }



        echo $CityList_string;

    }

    public function getUserImages(){
        $user_ids = $this->input->post('user_id');
        if(count($user_ids)>0){
            $id_list = implode(',', $user_ids);
            $query = 'select user_id,first_name,user_img from users where user_id IN ('.$id_list.')';
            $result = $this->Mod_Common->custom_query($query);
            if(count($result)>0)
            {
                echo json_encode($result);    
            }
            else
            {
                 $id_list = false;
                 echo $id_list;
                return false;  
            }
        }
        else
        {
            // $id_list = false;
            // echo $id_list;
            // return false;
        }


    }


    /**

     *  Function for getting favourite page

     */

    public function Favoritos()
    {
        $sess_array = $this->session->userdata('userInfo');
        if(!empty($sess_array))
        {
            $user_id = $sess_array->user_id;
            $data['product_list'] = $this->authentication_helper->getfavouriteProductList($user_id);
        } 
	
	
        $data['pageName'] = "FAVOURITE";
        $this->load->view('content_handler', $data);
    }

      /**

     *  Function for get record of history product

     */

    public function history_product()
	{

           // $data = $this->input->post();
           $product_id = $this->input->post('product_id');
           $users_id = $this->input->post('users_id');
           $data = array('product_id'=>$product_id,'user_id'=>$users_id);
            // echo "<pre>";print_r($data);exit;
           $this->load->model('authentication_helper');
         $result = $this->authentication_helper->insert_history($data);
        //redirect('home/Servicos/'.$product_id );
	}

    public function clear_all_history()
    {

        $sess_array = $this->session->userdata('userInfo');

        $user_id = $sess_array->user_id;

           // $data = $this->input->post();
           $this->load->model('authentication_helper');
         $result = $this->authentication_helper->clear_all_history($user_id);
        redirect('home/index');
    }

    public function clear_favroite($product_id)
    {

        $sess_array = $this->session->userdata('userInfo');

        $user_id = $sess_array->user_id;

           // $data = $this->input->post();
           $this->load->model('authentication_helper');
         $result = $this->authentication_helper->clear_favorite($user_id, $product_id);
        redirect('home/Favoritos');
    }

  public function count_services()

  {
         $product_id = $this->input->post('product_id');
          //echo "<pre>"; print_r($product_id ); 
           $this->load->model('authentication_helper');
         $result = $this->authentication_helper->counting_services($product_id);
         $p_id = $result['product_id'];
         $click = $result['no_of_click']+1;
        return $results = $this->authentication_helper->counting_add($p_id,$click);
  }

   /**
     *  Function for getting want list page
     */
    public function wantedList()
    {
        $sess_array = $this->session->userdata('userInfo');
        $data['pageName'] = "SEARCH";
        $data['webabout'] = $this->authentication_helper->getAboutUs(); 
     //   $data['productall_review'] = $this->user_helper->getHomeAllReview();
        $data['TestimonialInfoList'] = $this->authentication_helper->getAllTestimonialInfo();
        $data['new_product_lists'] = $this->authentication_helper->getUserProductList();
        $data['wanted_services'] = $this->authentication_helper->wanted_allservice();
        $data['all_productList'] = $this->authentication_helper->AllProductList();
      
        $this->load->view('content_handler', $data);
    }

    
    /**
     *  Function for getting SEARCH RECORD 
     */
    public function searchData()
    {
        $sess_array = $this->session->userdata('userInfo');
        $data['pageName'] = "SEARCH";
        $record = $this->input->post('name');
        $records = $this->input->post('names');

        if(($record =="All") || ($records == "All"))
        {
            $data['all_productList'] = $this->authentication_helper->AllProductList();
            $data['wanted_services'] = $this->authentication_helper->wanted_allservice();
        }
        else if($records == "New")
        {
            $data['all_productList'] = $this->authentication_helper->AllProductList();
            $data['new_services'] = $this->authentication_helper->new_servicesList();
        }
        else
        {
            $data['all_productList'] = $this->authentication_helper->AllProductList();
            $data['single_service'] = $this->authentication_helper->getServiceRecord($record); 
        
      }
      $this->load->view('content_handler', $data);
    }





   public function checkService()
   {
        $sess_array = $this->session->userdata('userInfo');
        $data['pageName'] = "SEARCH";
        $ser = $this->uri->segment(3);

        if($ser=="new")
        {
            $data['all_productList'] = $this->authentication_helper->AllProductList();
            $data['new_services'] = $this->authentication_helper->new_servicesList();
        }
        else if($ser =="want")
        {
            $data['all_productList'] = $this->authentication_helper->AllProductList();
            $data['wanted_services'] = $this->authentication_helper->wanted_allservice();
        }
        $this->load->view('content_handler', $data);
    }


}

