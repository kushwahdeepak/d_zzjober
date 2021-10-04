<?php 
    $country_list = $this->geo_helper->getCountryList();            
?>

<form action="<?php echo site_url('user_controller/updateCustomerProfileImage'); ?>" enctype="multipart/form-data" method="post" >
    <!-- onsubmit="return checkCoords(); -->
    <input type="hidden" id="x" name="x" />
    <input type="hidden" id="y" name="y" />
    <input type="hidden" id="w" name="w" />
    <input type="hidden" id="h" name="h" />
    <!-- Profile image section starts -->

    <div class="cs-img-detail row">
        <div class="col-md-2" style="border-right: 1px solid #000000;">
            <?php if (isset($basic_info->user_img) && !empty($basic_info->user_img)) { ?>
                <img src="<?php echo base_url('admin/images/users/' . $basic_info->user_img); ?>" id="cs_user_img_img" style="width:150px !important; height:150px !important;">
            <?php } else { ?>
                <img src="<?php echo base_url('admin/assets/images/products/download.jpeg'); ?>" id="cs_user_img_img" style="width:150px !important; height:150px !important;">
            <?php } ?>
        </div>

        <div class="col-md-9">
            <h4>Sua foto de perfil será usada somente para representá-lo(a) na ZZjober.</h4>

            <div class="input-file-container" style="width: 194px;">  
                <input class="input-file upload" id="fileInput" name="image" type="file">
                <label tabindex="0" for="fileInput" class="input-file-trigger">Selecionar foto...</label>
              </div>
              <p class="file-return"></p>

            <!-- profile picture crop modal starts -->
            <div class="modal fade" id="profilepictureoverview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal_width" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: white;">Esta imagem aparecerá como imagem de perfil para outras pessoas apenas para representá-lo. Escolha bem!!! </h4>
                        </div>
                        <div class="modal-body">
                            <img id="filePreview" style="width:600px; display:none">
                        </div>
                        <div class="modal-footer" style="text-align:center;">
                            <span class="cs-update-btn" style=" margin-top: 0px;float: none;">
                            <input type="submit" name="upload" class="acc-submit cs-section-update cs-color csborder-color"
                                value="Salvar imagem">
                            <input id="profilepictureoverviewclose" type="button" class="acc-submit cs-section-update cs-color csborder-color"
                                value="Fechar" data-dismiss="modal">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile picture crop modal ends -->

        </div>
    </div>
</form>
<br>
<br>


<form name="basic_info_form" action="<?php echo site_url('user_controller/updateBasicInfo'); ?>" method="post">
    <input type="hidden" name="middlename" value="<?php echo($basic_info->middle_name)?>">
    <input type="hidden" name="lastname" value="<?php echo($basic_info->last_name)?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="firstname" class="form-label">Primeiro nome<span class="required">*</span></label>
                <input type="text" name="firstname" value="<?php echo($basic_info->first_name)?>"  class="form-control input-lg" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="username" class="form-label">Usuário<span class="required">*</span></label>
                <input type="text" name="username" id="username" value="<?php echo($basic_info->username)?>"  class="form-control input-lg" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="telecom" class="form-label">Telefone<span class="required">*</span></label>
                <input type="text" name="telecom" value="<?php echo($basic_info->mobile)?>"  class="form-control input-lg" required>
            </div>
        </div>
        <div class="col-md-6">                
            <label for="email" class="form-label">E-mail<span class="required">*</span></label>
            <?php $user_login_info = $this->authentication_helper->getLoginInfo($basic_info->user_id);?>
            <input type="email" name="email" value="<?php echo($user_login_info->email);?>" class="form-control input-lg" required disabled>
        </div>
        <div class="col-md-12">
            <input type="submit" class="btn btn-custom btn-lg" value="Atualizar">
        </div>
    </div>
</form>







<script>
    function updateCoords(im,obj){
      $('#x').val(obj.x1);
      $('#y').val(obj.y1);
      $('#w').val(obj.width);
      $('#h').val(obj.height);
    }
    
    function checkCoords(){
      if(parseInt($('#w').val())) return true;
      alert('Please select a crop region then press submit.');
      return false;
    }
    
    $(document).ready(function()
    {
      var p = $("#filePreview");
      $("#fileInput").change(function()
      {
        $('#profilepictureoverview').modal('show');
        p.fadeOut();
    
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileInput").files[0]);
    
        oFReader.onload = function (oFREvent) {
          p.attr('src', oFREvent.target.result).fadeIn();
        };
      });
    
      $('img#filePreview').imgAreaSelect(
      {
        onSelectEnd: updateCoords
      });
    });
    
    $(document).ready(function()
    {
      $("#profilepictureoverviewclose").click(function()
      {
        $('.imgareaselect-outer').css("display", "none");
        $('.imgareaselect-selection').css("display", "none");
        $('.imgareaselect-border4').css("display", "none");
        $('.imgareaselect-border3').css("display", "none");
        $('.imgareaselect-border2').css("display", "none");
        $('.imgareaselect-border1').css("display", "none");
      });
    });
</script>