<?php $userInfo = $this->session->userInfo; ?>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
                        <li><a href="<?php echo site_url('home/Planos'); ?>" >Planos</a></li>
                        <li class="active">Confirmar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="xs-margin"></div>

   <!--  <form  action="<?php// echo site_url('user_controller/purchasePlan');?>" method="post"> -->
        <div class="accordion" id="collapse">

            <div class="accordion-group panel">
                <div class="container">
                    <h2 class="accordion-title">
                        <span>1. Confirmar pedido</span>
                    </h2>
                    <div class="accordion-body collapse in" id="collapse-five">
                        <div class="row accordion-body-wrapper">
                            <div class="col-md-12">
                                <table class="table checkout-table" id="example001">
                                    <thead>
                                        <tr>
                                            <th class="table-title"> NOME DO PLANS </th>
                                            <th class="table-title"> PREÇO </th>
                                            <th class="table-title"> NÚMERO DE SERVIÇOS </th>
                                            <th class="table-title"> VALIDADE DO PLANO </th>
                                            <th class="table-title"> DESCRIÇÃO </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   

                                            <tr id="" data="">
                                                
                                                <input type="hidden" id="plans_id" value="<?php echo $planinfo->plan_id; ?>">
                                                <input type="hidden" id="pre_plans_id" value="<?php echo $pre_plan_id; ?>">
                                                <?php $i = $planinfo->plan_validate; ?>
                                                <input type="hidden" id="expire_date" value="<?php echo date('Y-m-d', strtotime("+$i days"));?>">
                                                <input type="hidden" id="remaining_service" value="<?php echo $planinfo->num_of_service; ?>">
                                                <input type="hidden" id="total_amount" value="<?php echo $planinfo->plan_price; ?>">

                                                <td class="product-name-col1">
                                                    <h2 class="product-name"> <?php echo $planinfo->plan_title ?> </h2>
                                                </td>
                                                <td class="product-price-col">
                                                    <span class="product-price-special"> R$<?php echo $planinfo->plan_price; ?>  </span>
                                                </td>
                                                <td>
                                                    <span class="product-price-special"> <?php echo $planinfo->num_of_service; ?>   </span> 
                                                </td>
                                                <td class="product-total-col">
                                                    <span class="product-price-special"> <?php echo $planinfo->plan_validate; ?> Dias  </span>
                                                </td>
                                                <td>
                                                    <?php echo $planinfo->plan_description; ?>
                                                </td>
                                            </tr>

                                            
                                        <tr class="merged">
                                            <td class="checkout-table-title" colspan="4"><span>Subtotal:</span></td>
                                            <td class="checkout-table-price" colspan="2"> <div style="display: inline"> R$ </div>
                                                <div class="total_price" style="display: inline"> <?php echo $planinfo->plan_price; ?> </div> </td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td class="checkout-total-title" colspan="4"><span>TOTAL:</span></td>
                                            <td class="checkout-total-price cart-total" colspan="2">
                                                <div style="display: inline"> R$ </div>
                                                <div class="total_price" style="display: inline"> <?php echo $planinfo->plan_price; ?> </div>
                                            </td>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="md-margin half"></div>
                                <?php  if($planinfo->plan_price != 0) { ?>
                                    <div class="text-right">
                                        <div id="paypal-button-container"></div>
                                    </div>      
                                <?php }  else { ?>
                                    <a class="btn btn-custom-6 min-width-md pull-right" onclick="checkoutFreePlan()"> Confirmar </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
   
    <div class="xlg-margin"></div>
</section>




<script>
        paypal.Button.render({

            env: 'production', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            //sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R'
            client: {
                production: 'AWFT4RMGAmCHcF9vB-K6yL2OYVj7ECEWxHa9meVyQIPJLM9ooXo3mB7G1vdCt6_j9doobmdnWTmzfY2t'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {
                var famount = $("#total_amount").val();

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: famount, currency: 'BRL' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function(data) {
                    console.log(data);

                    var plan_id = $("#plans_id").val();
                    var pre_plan_id = $("#pre_plans_id").val();
                    var expire_date = $("#expire_date").val();
                    var remaining_service = $("#remaining_service").val();
                    var id = data.id;
                    var cart = data.cart;
                    var create_time = data.create_time;
                    var payment_method = data.payer.payment_method;
                    var email = data.payer.payer_info.email;
                    var first_name = data.payer.payer_info.first_name;
                    var middle_name = data.payer.payer_info.middle_name;
                    var last_name = data.payer.payer_info.last_name;
                    var country_code = data.payer.payer_info.country_code;
                    var line1 = data.payer.payer_info.shipping_address.line1;
                    var city = data.payer.payer_info.shipping_address.city;
                    var state = data.payer.payer_info.shipping_address.state;
                    var postal_code = data.payer.payer_info.shipping_address.postal_code;
                    var total = data.transactions[0].amount.total;
                    var currency = data.transactions[0].amount.currency;

                    var urlpage = "<?php echo base_url(); ?>index.php/user_controller/addProduct";


                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>index.php/user_controller/purchasePlanTransactionData',
                        data: {
                            'plan_id': plan_id,
                            'pre_plan_id': pre_plan_id,
                            'expire_date': expire_date,
                            'remaining_service': remaining_service,
                            'id': id,
                            'cart': cart,
                            'create_time': create_time,
                            'payment_method': payment_method,
                            'email': email,
                            'first_name': first_name,
                            'middle_name': middle_name,
                            'last_name': last_name,
                            'country_code': country_code,
                            'line1': line1,
                            'city': city,
                            'state': state,
                            'postal_code': postal_code, 


                            'country_code': country_code,
                            'total': total,
                            'currency': currency,
                        },
                        success: function (data) {
                            toastr.success('Pagamento concluído com sucesso!');
                           // window.location.href = urlpage;
                        }
                    });
                });
            }

        }, '#paypal-button-container');

</script>


<script type="text/javascript">
    function checkoutFreePlan()
    {
        var plan_id = $("#plans_id").val();
        var expire_date = $("#expire_date").val();
        var remaining_service = $("#remaining_service").val(); 

        var urlpage = "<?php echo base_url(); ?>index.php/user_controller/addProduct";  

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/user_controller/purchaseFreePlan',
            data: {
                'plan_id': plan_id,
                'expire_date': expire_date,
                'remaining_service': remaining_service,
            },
            success: function (data) {
                toastr.success('Pagamento concluído com sucesso!');
                window.location.href = urlpage;

            }
        });
    }
</script>

    