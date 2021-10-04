<?php
    $user_invoice_list = array();
    if (isset($invoice_id_list) && !empty($invoice_id_list)) {
        foreach ($invoice_id_list as $invoice_id) {
            $this->load->model('user/user_helper');
            $user_invoice_list[] = $this->user_helper->getInvoice($invoice_id);
        }
    }
?>
<style type="text/css">
.cart-table .product-name-col figure {
    max-width: 170px;
    float: left;
    margin-right: 0px !important;
    border: none !important;
}
.accordion-panel-body ul {
    padding-left: 0px !important;
}

.xs-margin11 {
    margin-bottom: 29px;
}
</style>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div id="change_value_id">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="" >Home</a></li>
                            <li class="active"><a href="">My Booking</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="xs-margin"></div>

    <div class="accordion" id="collapse">
        <div class="accordion-group panel" id="accordion-panel">
            <div class="container holder accordion-panel-group panel">

                <?php if (!empty($user_invoice_list)) {
                    foreach ($user_invoice_list as $invoice) {
                        $invoice_product_list = $this->user_helper->getAllocatedUserInvoiceProducts($invoice->invoice_id, $user_id);

                        $user_cart_product_list = $this->user_helper->getCartProductList($invoice->invoice_id);

                        $total_price = 0;
                        foreach ($user_cart_product_list as $user_cart_product) {
                            $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
                            $total_price = $total_price + ($cart_product_info->product_price * $user_cart_product->user_product_quantity);
                        }
                        ?>

                        <h4>
                            <a class="accordion-panel-title" data-toggle="collapse" data-parent="#accordion-panel"
                               href="#collapse<?php echo $invoice->invoice_id ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h5 style="color: black"><b>Order Id:</b> #00<?php echo $invoice->invoice_id; ?>
                                        </h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 style="color: black"><b>Date:</b>
                                            <?php $Date = date('d M, Y', strtotime($invoice->order_date)); ?>
                                            <?php $Time = date('h:i A', strtotime($invoice->order_date)); ?>
                                            <?php echo $Date; ?><br>
                                            &emsp;&emsp;&emsp;&emsp;<?php echo $Time; ?></h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 style="color: black"><b>Address:&nbsp;</b><?php echo $invoice->address; ?>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </h4>


                        <div class="accordion-panel-body collapse collapse"
                             id="collapse<?php echo $invoice->invoice_id ?>">

                            <table id="example01" class="table cart-table">
                                <thead>
                                <tr>
                                    <th class="table-title">Service Description</th>
                                    <th class="table-title">Order Date</th>
                                    <th class="table-title">Order Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php if (!empty($invoice_product_list)) {
                                    foreach ($invoice_product_list as $invoice_product) {
                                        $product_invoice_id = $this->user_helper->getUserProductStatus($invoice_product->product_invoice_id);
                                        $product_info = $this->user_helper->getProductDetail($invoice_product->product_id); 
                                        $customer_feedback_info = $this->user_helper->getCustomerFeedbackDetail($invoice_product->product_invoice_id); ?>

                                        <tr id="completeOrder<?php echo $invoice_product->product_invoice_id; ?>">

                                            <td class="product-name-col">
                                                <figure class="col-md-5">
                                                    <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($invoice_product->product_id); ?>">

                                                        <?php $product_images = $this->user_helper->getProductFrontImages($invoice_product->product_id); ?>

                                                        <?php if (isset($product_images) && !empty($product_images)) { ?>

                                                            <?php foreach ($product_images as $image) { ?>

                                                                <img src="<?php echo base_url(); ?>/admin/assets/images/products/<?php echo $image->product_image_name; ?>">

                                                                <?php break;
                                                            } ?>

                                                        <?php } else { ?>

                                                            <img src="<?php echo base_url(); ?>/admin/assets/images/products/product1.jpg">

                                                        <?php } ?>
                                                    </a>
                                                </figure>
                                                <div class="col-md-7">
                                                    <h2 class="product-name" style="color: #21c5bf">
                                                        <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($invoice_product->product_id); ?>">
                                                            <b><?php echo $product_info->product_name; ?></b>
                                                        </a>
                                                    </h2>
                                                    <ul>
                                                        <li><b>Quantity : </b><?php echo $invoice_product->quantity; ?></li>
                                                        <li><b>Amount: </b>$<?php echo $product_info->product_price; ?></li>
                                                        <li><b>Status: </b><?php echo $product_invoice_id->client_status; ?>
                                                        </li>
                                                        <!--  <li><b>Address:</b><?php echo $invoice->address; ?></li> -->
                                                        <li style="line-height: 20px;"><b>Description:</b>
                                                            <?php
                                                                if (strlen($product_info->product_description) < 60)
                                                                    echo $product_info->product_description;
                                                                else
                                                                    echo substr($product_info->product_description, 0, 200);
                                                            ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td class="product-price-col">
                                                <?php $Date = date('d M, Y', strtotime($invoice->order_date)); ?>
                                                <?php $Time = date('h:i A', strtotime($invoice->order_date)); ?>
                                                <?php echo $Date; ?><br><br>
                                                <?php echo $Time; ?>
                                            </td>

                                            <td class="product-price-col">
                                                <?php
                                                    if ($product_invoice_id->client_status == 'Cancel') {
                                                        echo '<div class="cancel_color status_size" style="line-height: 20px;">';
                                                        echo "order cancelled";
                                                        echo "<br/>";

                                                        echo '<div class="reason_color reason_size">';
                                                        echo " Reason:";
                                                        echo $invoice_product->reason;
                                                        echo "<br/>";

                                                        echo " Cancel Date:";
                                                        echo $invoice->cancel_date;
                                                        echo '</div>';
                                                        echo '</div>';
                                                    } else if($product_invoice_id->provider_status == 'Pending' && $product_invoice_id->client_status == 'Pending') { ?>
                                                        <a class="product-add-btn product-add-btn-custom"
                                                           onclick="providercompleteOrder(<?php echo $invoice_product->product_invoice_id; ?>)"
                                                           href="javascript:void(0);" >Complete</a>

                                                    <?php } else if(($product_invoice_id->provider_status == 'Complete') && ($product_invoice_id->client_status == 'Pending')) {
                                                        echo '<div class="complete_color status_size">';
                                                        echo "Marked complete by provider";
                                                        echo '</div>';

                                                    } else if(($product_invoice_id->provider_status == 'Complete') && ($product_invoice_id->client_status == 'Incomplete')) {
                                                        echo '<div class="complete_color status_size" style="line-height: 20px;">';
                                                        echo "Marked incomplete by client";
                                                        echo '</div>';
                                                        echo '<div class="reason_color reason_size">';
                                                        echo " Reason:";
                                                        echo $invoice_product->reason;
                                                        echo '</div>';

                                                    } else if(($product_invoice_id->provider_status == 'Complete') && ($product_invoice_id->client_status == 'Complete')) {
                                                        echo '<div class="complete_color status_size" style="line-height: 20px;">';
                                                        echo "Order Completed";
                                                        echo "<br/>";

                                                        echo '<div class="reason_color reason_size">';
                                                        echo " Order Date:";
                                                        echo $invoice->order_date;
                                                        echo '</div>';
                                                        echo '</div><br>';

                                                        echo '<a class="product-add-btn product-add-btn-custom check feedback_button_provider" href="javascript:void(0)"  
                                                                data-product-id="'.$invoice_product->product_id.'" data-product-invoice-id="'.$invoice_product->product_invoice_id.'">';
                                                        echo 'Write Review';
                                                        echo '</a>';

                                                    } else if($product_invoice_id->client_status == 'Reviewed') {
                                                        echo '<a class="product-add-btn product-add-btn-custom check" href="javascript:void(0)"  onclick="ViewReviewedProvideByClient('.$customer_feedback_info->feedback_id.')">';
                                                        echo 'View Review';
                                                        echo '</a>';

                                                    }  ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="xlg-margin"></div>

</section>


<div class="modal fade" id="feedback_modal_provider" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title" style="color:white">FEEDBACK</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo site_url('user_controller/FeedbackByServiceProvider'); ?>" name="review_form" method="post">
                    <input type="hidden" name="feedback_user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="feedback_product_id" value="">
                    <input type="hidden" name="feedback_product_invoice_id" value="">

                    <div class="form-group">
                        <input name="subject" type="text" class="form-control input-lg" placeholder="Summary of your review *" required>
                    </div>

                    <div class="form-group">
                        <textarea name="simple_message" class="form-control input-lg min-height" cols="30" rows="6" placeholder="Write your review *" required></textarea>
                    </div>

                    <div class="form-group" style=" float: right; ">
                        <input type="submit" class="btn btn-custom-5 btn-lg min-width" value="Submit Review">
                    </div>
                    
                    <div class="form-group">
                        <input class="star star-5" id="star-5" name="star" value="5" type="radio">
                        <label class="star star-5" for="star-5"></label>

                        <input class="star star-4" id="star-4" name="star" value="4" type="radio">
                        <label class="star star-4" for="star-4"></label>

                        <input class="star star-3" id="star-3" name="star" value="3" type="radio">
                        <label class="star star-3" for="star-3"></label>

                         <input class="star star-2" id="star-2" name="star" value="2" type="radio">
                        <label class="star star-2" for="star-2"></label>

                        <input class="star star-1" id="star-1" name="star" value="1" type="radio">
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    
                    <div class="xs-margin11"></div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="feedback_modal_provider11" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title" style="color:white"> Feedback By Service Provider </h4>
            </div>

            <div class="modal-body">
                    <div class="form-group">
                        <input name="subject" id="feedback_sub" type="text" class="form-control input-lg" disabled>
                    </div>

                    <div class="form-group">
                        <textarea name="simple_message" id="feedback_message" class="form-control input-lg min-height" cols="30" rows="6" disabled></textarea>
                    </div>

                    <!-- <div class="form-group" style=" float: right; ">
                        <input type="submit" class="btn btn-custom-5 btn-lg min-width" value="Submit Review">
                    </div> -->
                    
                    <div class="form-group">
                        <input class="star star11-5 star-5" id="star-5" name="star" value="5" type="radio">
                        <label class="star star-5" for="star-5"></label>

                        <input class="star star11-4 star-4" id="star-4" name="star" value="4" type="radio">
                        <label class="star star-4" for="star-4"></label>

                        <input class="star star11-3 star-3" id="star-3" name="star" value="3" type="radio">
                        <label class="star star-3" for="star-3"></label>

                         <input class="star star11-2 star-2" id="star-2" name="star" value="2" type="radio">
                        <label class="star star-2" for="star-2"></label>

                        <input class="star star11-1 star-1" id="star-1" name="star" value="1" type="radio">
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    
                    <div class="xs-margin11"></div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function providercompleteOrder(product_invoice_id) {
        $.ajax({
            url: "<?php echo site_url();?>/user_controller/providerCompleteOrder?product_invoice_id=" + product_invoice_id,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                location.reload();
                toastr.success('Service marked completed from your end');
            }
        });
    }
</script>

<script>
    $(function() {
       $('.feedback_button_provider').click(function() {
           var product_id = $(this).attr('data-product-id');
           var product_invoice_id = $(this).attr('data-product-invoice-id');

           $('input[name="feedback_product_id"]').val(product_id);
           $('input[name="feedback_product_invoice_id"]').val(product_invoice_id);

           $('#feedback_modal_provider').modal('show');
       });
    });
</script>

<script>
    function ViewReviewedProvideByClient(feedback_id)
    {
        $.ajax({
            url: "<?php echo site_url();?>/user_controller/clientReviewed?feedback_id=" + feedback_id,
            type: "POST",
            dataType: "JSON",
            success: function (response) {
                
                $('#feedback_sub').html("");
                $('#feedback_message').html("");
                $('#feedback_sub').val(response.subject);
                $('#feedback_message').append(response.simple_message);
                 $('.star11-'+response.rating).prop('checked', true);

                $("#feedback_modal_provider11").modal('show');
            }
        });

    }
</script>
