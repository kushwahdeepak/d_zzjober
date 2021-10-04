<?php
// echo $pageName;
    switch ($pageName) {
        case "HOME":
            include("home.php");
            break;
        case "ABOUT":
            include("about.php");
            break;
        // case "GALLERY":
        // include ("gallery.php");
        // break;
        case "CONTACT":
            include("contact.php");
            break;
        case "CATEGORY":
            include("category.php");
            break;
        case "REGISTRATION":
            include("registration.php");
            break;
        case "SEARCH":
            include("product_search.php");
            break;
        case "CHECKOUTONE":
            include("cart.php");
            break;
        case "CHECKOUTTWO":
            include("checkout.php");
            break;
        case "LOGIN":
            include("login.php");
            break;
        case "FORGETPASSWORD":
            include("forgetpassword.php");
            break;
        case "RESETNEWPASSWORD":
            include("reset_new_password.php");
            break;
        case "FAQS":
            include("faq.php");
            break;
        case "PRIVACY":
            include("privacy.php");
            break;
        case "TERMSCONDITIONS":
            include("terms_conditions.php");
            break;
        case "HOWITWORKS":
            include("how_it_works.php");
            break;
        case "FEATURES":
            include("features.php");
            break;
        case "MYPRODUCTS":
            include("user/my_product.php");
            break;
        case "MYACCOUNT":
            include("user/my_account.php");
            break;
        case "PAGEMISSING":
            include("errors/404error.php");
            break;
        case "PLANS":
            include("plans.php");
            break;
        case "ADDPRODUCT":
            include("user/add_product.php");
            break;
        case "ADDPRODUCTIMAGESECTION":
            include("add_product_image_section.php");
            break;
        case "EDITPRODUCT":
            include("user/edit_product.php");
            break;
        case "PRODUCTS":
            include("products.php");
            // include("newproducts.php");
            break;
        case "PRODUCTLIST":
            include("product_list_view.php");
            break;
        case "PRODUCTSOVERVIEW":
            include("product_overview.php");
            break;
        case "BOOKING":
            include("booking.php");
            break;
        case "MYORDER":
            include("my_order.php");
            break;
        case "PLANCHECKOUT":
            include("plan_checkout.php");
            break;
        case "TESTIMONIAL":
            include("user/testimonial.php");
            break;
        case "FAVOURITE":
            include("user/favourite.php");
            break;
        
    }
    

?>
