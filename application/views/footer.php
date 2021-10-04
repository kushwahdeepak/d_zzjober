<footer id="footer">
   
    <div id="footer-inner" style="background-color: #efeee2;">
        <div class="container">
            
            <div class="row">
               
                <div class="col-md-6 col-sm-6 col-xs-12 widget" style="margin-bottom: 0;">
                    <h4 style="margin-bottom: 15px;">Customer Service</h4>
                    <ul class="links">
                       <!--  <li>
                            <a href="<?php echo site_url('home/about'); ?>" >About Us</a>
                        </li> -->
                        <li>
                            <a href="<?php echo site_url('home/features'); ?>" >Features</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/O_que_Oferecemos'); ?>" >How it Works?</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/FAQs'); ?>" >FAQs</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 widget" style="margin-bottom: 0;">
                    <h4 style="margin-bottom: 15px;">Site Information</h4>
                    <ul class="links">
                        <li>
                            <a href="<?php echo site_url('home/Politica_de_Privacidade'); ?>" >Privacy Policy</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/Termos_Condicoes'); ?>" >Terms &
                                Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="footer-bottom" style="padding:5px;background-color: #efeee2;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <p class="copyright-text" style="color: #888779;">&copy; 2018 &trade; Snoopy Job. All Rights Reserved.</p>
                    <ul class="social-links color2 clearfix">
                        <li>
                            <a href="http://www.facebook.com" class="social-icon icon-facebook" 
                               target="_blank"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<!-- select -->
<!-- <script src="<?php echo base_url(); ?>assets/select2/select2.full.min.js"></script> -->

<!-- crop image -->
<script src="<?php echo base_url('assets/crop_img/jquery.imgareaselect.js'); ?>"></script>

<!-- browse btn design -->
<script src="<?php echo base_url('assets/select_file/select_file.js'); ?>"></script>

<!-- data table -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


<!-- !data table -->
<script src="<?php echo base_url('assets/js/smoothscroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/waypoints.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/waypoints-sticky.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.debouncedresize.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/retina.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.placeholder.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.hoverIntent.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>


<script src="<?php echo base_url('assets/js/jquery.themepunch.tools.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.themepunch.revolution.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.stellar.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/maplabel.js'); ?>"></script>

<!--<script src="--><?php //echo base_url('assets/js/jflickrfeed.min.js'); ?><!--"></script>-->
<script src="<?php echo base_url('assets/js/wow.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.selectbox.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.nouislider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.bxslider.min.js'); ?>"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/twitter/jquery.tweet.min.js"></script> -->
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/toastr.js'); ?>"></script>
<!-- Image JAVASCRIPTS -->
<script src="<?php echo base_url('assets/js/fileinput.js'); ?>"></script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<script src="<?php echo base_url('assets/js/form-validation.js'); ?>"></script>

<script>$(function () {
        "use strict";
        jQuery("#revslider").revolution({
            delay: 8e3,
            startwidth: 1170,
            startheight: 600,
            fullWidth: "on",
            fullScreen: "off",
            hideTimerBar: "on",
            spinner: "spinner3"
        })
    });

    $(document).ready(function(){  
        $("#WYSIHTML").wysihtml5();
    });
</script>

<script>!function () {
        "use strict";
        if (document.getElementById("map")) {
            var n, o,
                e = [['<div class="map-info-box"><h4>Find Us now!</h4><p>Schuhzly, 200 Oxford St, London W1D <br>  1NUZYW, United Kingdom</p></div>', 51.518055, -.1445, 9]],
                t = new google.maps.Map(document.getElementById("map"), {
                    zoom: 16,
                    center: new google.maps.LatLng(51.518055, -.1445),
                    scrollwheel: !1,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }), a = new google.maps.InfoWindow;
            for (o = 0; o < e.length; o++) n = new google.maps.Marker({
                position: new google.maps.LatLng(e[o][1], e[o][2]),
                map: t,
                animation: google.maps.Animation.DROP,
                icon: "<?php echo base_url(); ?>assets/images/pin.png"
            }), google.maps.event.addListener(n, "click", function (n, o) {
                return function () {
                    a.setContent(e[o][0]), a.open(t, n)
                }
            }(n, o))
        }
    }();
</script>


<!-- Start notification toster -->
<?php if ($this->session->flashdata('info_msg') != "") { ?>
    <script>
        toastr.info('<?php echo $this->session->flashdata('info_msg');?>');
    </script>
<?php }
    if ($this->session->flashdata('error_msg') != "") { ?>
        <script>
            toastr.error('<?php echo $this->session->flashdata('error_msg');?>');
        </script>
    <?php }
    if ($this->session->flashdata('success_msg') != "") { ?>
        <script>
            toastr.success('<?php echo $this->session->flashdata('success_msg');?>');
        </script>
    <?php }
    if ($this->session->flashdata('warning_msg') != "") { ?>
        <script>
            toastr.warning('<?php echo $this->session->flashdata('warning_msg');?>');
        </script>
    <?php } ?>
<!-- End Notification toster -->


<script type="text/javascript">
    // for contact page
    $(document).on('click', '#contactformsubmitbutton', function () {
        data = {};
        data['name'] = $('.contact_name').val();
        data['contact_mail'] = $('.contact_mail').val();
        data['contact_sub'] = $('.contact_sub').val();
        data['contact_msg'] = $('.contact_msg').val();
        alert("hello");
    });
</script>


<script>
    $(document).ready(function () {

        $("#user_product_table").DataTable({
            "order": [[3, "asc"]],
            "bStateSave": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('offersDataTables', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('offersDataTables'));
            },
            "columnDefs": [{
                "targets": 0,
                "orderable": false
            }, {
                "targets": 1,
                "orderable": false
            }, {
                "targets": 6,
                "orderable": false
            }]
        });

    });
</script>

<script>
    function add_fav(product_id) {
        data = {};
        data['product_id'] = product_id;
    
        $.ajax({ 
            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/user_controller/addfav",  
            data: data,
            dataType: "json",       
            success: function(response)  
            {
                if (response)
                {
                    toastr.success('Serviço adicionado aos favoritos com sucesso');
                }
                else
                {
                    toastr.error('SServiço já adicionado aos favoritos');
                }
            }   
        });
    }
</script>


<script>

    function add_quick_cart(product_id) {
        data = {};
        data['user_product_id'] = product_id;
        data['user_product_quantity'] = 1;
    
        $.ajax({ 
            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/user_controller/addToCart",  
            data: data,
            dataType: "json",       
            success: function(response)  
            {
                $("#sticky-header .cart-dropdown").html("");
                $("#header .cart-dropdown").html("");
                var row = appendAddtoCart(response);
                $("#sticky-header .cart-dropdown").append(row);
                $("#header .cart-dropdown").append(row);
                toastr.success('Serviço adicionado ao carrinho com sucesso');
            //    $("#header").load(location.href + "#header");
            }   
        });
    }


    function  appendAddtoCart(response)
    {
        addToCartBody = "";
        var addToCartBodyContent = "";

            addToCartBodyContent += '<div id="appendAddToCart">';
                                    
            addToCartBodyContent += '<a  class="dropdown-toggle" data-toggle="dropdown">';
            addToCartBodyContent += '<span class="glyphicon glyphicon-shopping-cart"></span>';
            addToCartBodyContent += '<span class="badge">  '+response.user_cart_product_count+' </span>';
            addToCartBodyContent += '<span class="dropdown-text">Carrinho de compras</span> </a>';
            addToCartBodyContent += '<div class="dropdown-menu">';
            addToCartBodyContent += '<p class="cart-desc"> '+response.user_cart_product_count+' item(s) em seu carrinho - R $'+response.total_price+'</p>';
                                        
                for(var i = 0; i < response.user_cart_product.length; i++) {
                    addToCartBodyContent += '<div class="product clearfix">';
                    addToCartBodyContent += '<a href="javascript:void(0);" class="delete-btn" onclick="deleteCartItem('+response.user_cart_product[i].user_cart_id+')"> </a>';
                    addToCartBodyContent += '<figure class="product-image-container">';
                    addToCartBodyContent += '<a href="<?php echo site_url(); ?>home/Servicos?product_id='+response.user_cart_product[i].user_product_id+'">';

                    for(var a = 0; a < response.product_images[i].length; a++) { 
                        addToCartBodyContent += '<img src="<?php echo base_url();?>/admin/assets/images/products/'+response.product_images[i][a].product_image_name+'" class="product-image">';
                        if (a === 0) {
                            break;    
                        }
                    } 
                        
                    addToCartBodyContent += '</a>';
                    addToCartBodyContent += '</figure>';
                    addToCartBodyContent += '<div class="product-content">';
                    addToCartBodyContent += '<h3 class="product-name">';
                    addToCartBodyContent += '<a href="<?php echo site_url(); ?>home/Servicos?product_id='+response.user_cart_product[i].user_product_id+'"> '+response.cart_product_info[i].product_name+' </a> </h3>';
                    addToCartBodyContent += '<div class="product-price-container">';
                    addToCartBodyContent += '<span class="product-price"> $ '+response.cart_product_info[i].product_price+' </span><br>';
                    addToCartBodyContent += '<span class="product-price" style="color: #848079;"> Quantity: '+response.user_cart_product[i].user_product_quantity+' </span> </div> </div> </div>';
                }
                                            

                addToCartBodyContent += '<div class="clearfix">';
                addToCartBodyContent += '<ul class="pull-left action-info-container">';
                addToCartBodyContent += '<li>Total: <span class="first-color"> $ '+response.total_price+' </span> </li> </ul> <br> <br>';
                addToCartBodyContent += '<ul class="pull-right action-btn-container">';
                addToCartBodyContent += '<li> <a href="<?php echo site_url('user_controller/carrinho'); ?>" class="btn btn-custom-5">Cart</a>';
           //     addToCartBodyContent += '<a href="<?php echo site_url('user_controller/checkout'); ?>" class="btn btn-custom">Checkout</a>';
                addToCartBodyContent += '</li> </ul> </div> </div> </div>';
        

        addToCartBody = addToCartBodyContent;
        return addToCartBody;
    }

</script>



</body>
</html>