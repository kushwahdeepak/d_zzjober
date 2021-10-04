<section id="content" role="main">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <ul class="breadcrumb">
               <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
               <li><a class="active">Recursos</a></li>
            </ul>
            <div class="lg-margin"></div>
            <h2>Recursos e condições</h2>
            <hr>


            
            <?php if(isset($webfeatures) && !empty($webfeatures)) { foreach($webfeatures as $webfeature) {?>
               <h2>
                  <small>
                     <?php echo $webfeature->title; ?> :                  
                  </small>
               </h2>
               <!-- <img src="<?php echo base_url('images'); ?>/<?php echo $webfeature->image ; ?>" alt=""> -->
               <p><?php echo $webfeature->description; ?></p>
            <?php } }?>  
            
            <div class="lg-margin2x"></div>
         </div>
      </div>
   </div>
</section>