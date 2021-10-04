
            <section id="content" role="main">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="breadcrumb">
                           <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
                           <li class="active">FAQs</li>
                        </ul>
                        <div class="lg-margin"></div>
                        <div class="row">
                           <div class="col-sm-12">
                              <h2 style="color: #004fb1;">FAQs</h2>
                              <div class="accordion" id="accordion">


                <?php 
                $collapseOne = 1;
                $show = "in";
                foreach ($webfaqs as $faqs) { ?>
                <!-- <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h5 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $collapseOne; ?>" aria-expanded="true" aria-controls="<?php echo $collapseOne; ?>" style="color: #57378C;">
                        <?php if (!empty($faqs->question)) echo $faqs->question; ?>
                      </a>
                    </h5>
                  </div>
                  <div id="<?php echo $collapseOne; ?>" class="panel-collapse collapse <?php echo $show; ?>" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <h5 style="color: #000;"><?php if (!empty($faqs->answer)) echo $faqs->answer; ?></h5>
                    </div>
                  </div>
                </div> -->
                 <div class="accordion-group panel">
                                    <div class="accordion-title" style="color: #004fb1;">
                                       <span><?php if (!empty($faqs->question)) echo $faqs->question; ?></span> 
                                       <a class="accordion-btn" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $collapseOne; ?>"></a>
                                    </div>
                                    <?php if($collapseOne == 1) { ?>
                                         <div class="accordion-body collapse in" id="<?php echo $collapseOne; ?>">
                                       <div class="accordion-body-wrapper">
                                          <p><?php if (!empty($faqs->answer)) echo $faqs->answer; ?></p>
                                       </div>
                                    </div>
                                    <?php } else { ?>
                                         <div class="accordion-body collapse" id="<?php echo $collapseOne; ?>">
                                       <div class="accordion-body-wrapper">
                                          <p><?php if (!empty($faqs->answer)) echo $faqs->answer; ?></p>
                                       </div>
                                    </div>
                                    <?php }?>
                                   
                                    
                                 </div>

                <?php $show = "";$collapseOne++; }?>
                                




<!-- 
                                 <div class="accordion-group panel">
                                    <div class="accordion-title"><span>3. Delivery Details</span> <a class="accordion-btn" data-toggle="collapse" data-parent="#accordion" href="#accordion-three"></a></div>
                                    <div class="accordion-body collapse" id="accordion-three">
                                       <div class="accordion-body-wrapper">
                                          <p>Pellentesque malesuada sollicitudin fermentum. Nullam ultricesposuere congue. Sed convallis purus a sem tincidunt et tempor turpis rhoncus. Nullam pretium eleifend neque, eget congue purus tincidunt id. Duis quam vitae condimentum.</p>
                                          <p>Sed pretium, elit eget fermentum mattis, tortor eros aliquam purus, a nisl a nulla. Proin eu orci orci, ac venenatis tortor. Donec laoreet, nu fringilla mollis, lacus mauris pellentesque odio, ut rhoncus erat risus sed.</p>
                                       </div>
                                    </div>
                                 </div> -->
                              </div>
                           </div>
                           <div class="lg-margin visible-xs clearfix"></div>
                        </div>
                       
                  </div>
               </div>
            </section>