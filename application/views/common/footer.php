<style>
.iconsize{ font-size: 30px;margin-top: 10px;}.iconsize1{ font-size: 30px;  margin-top: 10px;  margin-left: 15px;}
.chat-input {
    background: #fff;
    padding-top: 0px !important;
    padding-bottom: 2px !important;
    border: 1px solid #ccc;
}
.chat-messages li:last-child {
    margin-bottom: 0px;
}
.chat-messages {
    padding-bottom: 150px !important;
}
.form-control {
    display: inline-block;
    width: 100%;
        height: 45px;
    padding: 8px 12px;
    font-size: 13px;
    color: #555;
    background-color: #FFF !important;
    border: 1px solid #D3D3D3;
    border-radius: 2px;
    -moz-transition: all 0.2s linear 0s, box-shadow 0.2s linear 0s;
    -o-transition: all 0.2s linear 0s, box-shadow 0.2s linear 0s;
    transition: all 0.2s linear 0s, box-shadow 0.2s linear 0s;
    -webkit-box-shadow: none;
    box-shadow: none;
}

@media only screen and (max-width : 540px) {
.chat-sidebar{display: none !important;}
.chat-popup{display: none !important;}
}
.chat-sidebar{width: 200px;position: fixed;height: 100%;right: 0px;top: 75px;padding-top: 10px;padding-bottom: 10px;border: 1px solid rgba(29, 49, 91, .3); background: #fff; z-index: 999;}
.sidebar-name {padding-left: 10px;padding-right: 10px;margin-bottom: 0px;font-size: 12px;}
.sidebar-name span{padding-left: 5px;}
.sidebar-name a{display: block; height: 100%; text-decoration: none; color: inherit; margin-bottom: 0px;  padding-bottom: 5px;  border-bottom: 1px solid #c2c2c2; padding-top: 5px;}
.sidebar-name:hover{background-color:#e1e2e5;}
.sidebar-name img{width: 32px;height: 32px;vertical-align:middle;     border-radius: 100px;}
.popup-box{display: none;position: fixed;bottom: 0px;right: 220px;height: 285px;background-color: rgb(237, 239, 244);width: 300px;border: 1px solid rgba(29, 49, 91, .3);}
.popup-box .popup-head{background-color: #6d84b4;padding: 5px;color: white;font-weight: bold;font-size: 14px;clear: both;}
.popup-box .popup-head .popup-head-left{float: left;}
.popup-box .popup-head .popup-head-right{float: right;opacity: 0.5;}
.popup-box .popup-head .popup-head-right a{text-decoration: none;color: inherit;}
.popup-box .popup-messages{height: 100%;overflow-y: scroll;}
 .popup-box
            {
                display: none;
                position: fixed;
                bottom: 0px;
                right: 220px;
                height: 285px;
                background-color: rgb(237, 239, 244);
                width: 300px;
                border: 1px solid rgba(29, 49, 91, .3);
                z-index: 9;
            }
            
            .popup-box .popup-head
            {
                background-color: #6d84b4;
                padding: 5px;
                color: white;
                font-weight: bold;
                font-size: 14px;
                clear: both;
            }
            
            .popup-box .popup-head .popup-head-left
            {
                float: left;
            }
            
            .popup-box .popup-head .popup-head-right
            {
                float: right;
                opacity: 0.5;
            }
            
            .popup-box .popup-head .popup-head-right a
            {
                text-decoration: none;
                color: inherit;
            }
            
            .popup-box .popup-messages
            {
                height: 100%;
                overflow-y: scroll;
                height: 200px;
            }
            .popup-box .popup-messages .loadMore{
                color: #999;
                text-align: center;
                margin: 0 auto;
                display: block;
                font-size:12px;
            }
            .popup-box .popup-footer{
                position: absolute;
                bottom: 0px;
                width: 100%;
            }
            .popup-box .popup-footer #sendmessage{
                width: 100%;
                padding: 0px;
                margin: 0px;
            }
            .sent{
                list-style: none;
                width: 50%;
                float: right;
                background: #ccc;
                padding: 5px 10px;
                border: 1px solid #ccc;
                border-radius: 10px;
                margin: 4px 0px;
                display: block;
                clear: both;
                word-wrap: break-word;
            }
            .received{
                list-style: none;
                width: 50%;
                float: left;
                padding: 5px 10px;
                border: 1px solid #ccc;
                border-radius: 10px;
                margin: 4px 0px;
                display: block;
                clear: both;
                word-wrap: break-word;
            }
            .blocked{
                width: 100%;
                display: block;
                list-style: none;
             }
#carbonads { max-width: 300px; background: #f8f8f8;}
.carbon-text {  display: block;   width: 130px; }
.carbon-poweredby {   float: right; }
.carbon-text { padding: 8px 0; }
#carbonads {  padding: 15px;border: 1px solid #ccc; }
.carbon-text { font-size: 12px; color: #333333; text-decoration: none;}
.carbon-poweredby {  font-size: 75%; text-decoration: none;}
#carbonads {   position: fixed;   top: 5px;   left: 5px;}
.sidebar-name .online{
                width: 10px; 
                height: 10px; 
                background: green; 
                display: inline-block; 
                border-radius: 10px; 
                margin-right: 10px; 
                border: 1px solid #fff;
            }
.sidebar-name .offline{
                width: 10px; 
                height: 10px; 
                background: orange; 
                display: inline-block; 
                border-radius: 10px; 
                margin-right: 10px; 
                border: 1px solid #fff;
            }
			
			
			
			

			
/*.mm-menu .mm-panel {
    position: initial;
}	*/
.chat-input {
    display: none;
    position: fixed;
    bottom: 0px;
    background-color: #c7edfc;
    width: 380px;
    padding: 10px;
    z-index: 999;
    padding: 27px !important;
    padding-bottom: 10px !important;
    right: 0px!important;
}
.emoji-picker-icon {
    right: 30px;
    top: 3px;
    color: #000;
}	
#footer-bottom .copyright-text {
    float: left;
    font-size: 14px !important;
    line-height: 18px;
    margin: 21px 0;
}
</style>

<footer id="footer">
    <div id="footer-inner" style="background-color: #efeee2;">
        <div class="container">
            
            <div class="row">
               
                <div class="col-md-4 col-sm-4 col-xs-12 widget">
                    <h4 style="margin-bottom: 15px;">Atendimento ao usuário</h4>
                    <ul class="links">
                       <!--  <li>
                            <a href="<?php echo site_url('home/about'); ?>" title="About Us">About Us</a>
                        </li> -->
                        <li>
                            <a href="<?php echo site_url('home/O_que_Oferecemos'); ?>">O que Oferecemos</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/Contato'); ?>">Contato</a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('home/FAQs'); ?>">FAQs</a>
                        </li>
                    </ul>
                </div>
               
                <div class="col-md-4 col-sm-4">
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 widget">
                    <h4 style="margin-bottom: 15px;">Regras de uso do site</h4>
                    <ul class="links">
                        <li>
                            <a href="<?php echo site_url('home/Politica_de_Privacidade'); ?>">Política de Privacidade</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/Termos_Condicoes'); ?>">Termos & Condições</a>
                        </li>
                        <!-- <li>
                                <a  href="<?php echo site_url('home/wantedList'); ?>" title="Procurar">Serviços</a>    
                                </li> -->
                    </ul>
                </div>
            </div>
        </div>
         <nav id="menu-right" style="top:75px;" class="mm-menu mm-horizontal mm-ismenu mm-right">
                <ul class="mm-list mm-panel mm-opened mm-current" id="mm-m0-p0">
                </ul>
          </nav>
    </div>
    <!--- Navigation for Right Side Nav -->
   
    <!-- Navigation for Right Side Nav -->
    <div id="footer-bottom" style="padding:5px;background-color: #efeee2;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <p class="copyright-text" style="color: #888779;">&copy; 2019 &trade; ZZjober. Todos os direitos reservados - CNPJ:33.194.056/0001-83, Rua 9 de Julho n°805 Araraquara-SP, 14.801-295 - Brasil </p>
                    <ul class="color2 clearfix float-right footer_social">
                        <li>
                             <a href="https://twitter.com/zzjober" 
                               target="_blank"><i class="fa fa-twitter iconsize"></i></a>&nbsp;&nbsp;&nbsp;
                            <a href="https://www.facebook.com/zzjober" 
                               target="_blank"><i class="fa fa-facebook iconsize"></i></a>
                            <a href="https://www.instagram.com/zzjober"  target="_blank" >
                                <i class="fa fa-instagram iconsize1"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD7jJukIxu4bjDng1a7c9hyKhKXVQy159Y"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0YGf1kS-BuYLO5Rqogh8hXcMcKJPWzJw"></script>

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
                e = [['<div class="map-info-box"><h4>Find Us now!</h4><p>R. Nove de Julho, 805, Araraquara - SP, 14801-295, Brazil</p></div>', -21.791850, -48.174960, 12]],
                t = new google.maps.Map(document.getElementById("map"), {
                    zoom: 18,
                    center: new google.maps.LatLng(-21.791850, -48.174960),
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
    
<?php if(isset($_SESSION['userInfo'])): ?>
<span id="c_user_details" data-user-id="<?=$_SESSION['userInfo']->user_id?>" data-user-name="<?=$_SESSION['userInfo']->first_name?>" data-user-type="<?=$_SESSION['userInfo']->user_type?>"></span>
<span id="base_url" data-url="<?=base_url()?>"></span>
<?php else: ?>
    <span id="c_user_details" data-user-id="0" data-user-name="0"></span>
<?php endif; ?>

<!-- End Notification toster -->
<!-- chat handling -->
<!-- <script src="https://54.183.128.178:4000/socket.io/socket.io.js">"></script> -->
<script src="<?=base_url().'/admin/assets/chat-mongoose.js';?>"></script>
<script src="<?=base_url().'/admin/assets/js/config.js';?>"></script>
<script src="<?=base_url().'/admin/assets/js/util.js';?>"></script>
<script src="<?=base_url().'/admin/assets/js/jquery.emojiarea.js'; ?>"></script>
<script src="<?=base_url().'/admin/assets/js/emoji-picker.js'; ?>"></script>
<script src="<?=base_url().'/admin/assets/js/jquery.nicescroll.js'?>"></script>
<script src="<?=base_url().'assets/js/jquery.mmenu.min.js'?>"></script>

<script type="text/javascript">
    // for contact page
   

    /* Manage the right sidebar */
    $(document).ready(function(){
        var $menu = $('nav#menu-right').mmenu({
            position: 'right',
            dragOpen: true,
            counters: false,
           });
 
        var API = $("#menu-right").data( "mmenu" );
      
        $(".chat-toggle").click(function(e) {
             var _that = $(this);
             if(_that.hasClass('menu-open'))
             {
                _that.removeClass('menu-open');
                API.close();
             }
             else
             {  _that.addClass('menu-open');
                API.open();
             }
                
          });
  });
        
   
        
        
    

    /* Remove current message when opening */
   

    /* Send messages */
 
     $(document).ready(function(){
         $('.have-message').on('click', function () {
            $(this).removeClass('have-message');
            $(this).find('.badge-danger').fadeOut();
        });
        user_id = $('#c_user_details').attr('data-user-id');
        user_name = $('#c_user_details').attr('data-user-name');
        user_type = $('#c_user_details').attr('data-user-type');
        image_url = 'http://snoopyjob.karyonsolutions.com/admin/images/users/';
        if(user_id !=''){
        chat = new Porvogue({u:user_id,v:user_name,t:user_type});
        con = chat.returnSocket();
        onlineUsers = {};
        fetch = 0;
        isPendingMessage = 1;
        con.on('userlist',function(users){
            if($('.chat_online').length>0 && users.hasOwnProperty($('.chat_online').attr('data-owner-id'))){
                   $('.chat_online').css('color','green');
            }
            $users = $('.chat-sidebar').find('.sidebar-name');
            onlineUsers = users;

            $users.each(function(i,v){
                var id = $(v).attr('data-user');
                if(users.hasOwnProperty(id))
                {
                  $('#user-'+id).find('span.user_status').removeClass('offline').addClass('online');
                }
                else
                {
                  $('#user-'+id).find('span.user_status').removeClass('online').addClass('offline'); 
                }
             });
            var $chat_popups = $('.chat-popup');
            $chat_popups.each(function(i,v){
                var uid = $(v).prop('id');
                if(onlineUsers.hasOwnProperty(uid))
                {
                   $('#'+uid).find('span').removeClass('offline').addClass('online'); 
                }
                else
                {
                    $('#'+uid).find('span').removeClass('online').addClass('offline'); 
                }

            });
        });
        $('.chat_online').click(function(){
            var _that = $(this);
            var id = _that.attr('data-owner-id');
            $('.chat-toggle').addClass('menu-open');
            $('#menu-right').addClass('mm-current').addClass('mm-opened');
            var newChat = $('#menu-right').find('#mm-m0-p'+id);
            if($('#menu-right').find('#mm-m0-p'+id).length>0)
            {   $('#menu-right').find('#mm-m0-p'+id).addClass('mm-current').addClass('mm-opened');
            	register_popup(id);
            	var chatInput = $('#mm-m0-p'+id).find('.chat-input');
	            chatInput.css('display','block');
            }
            else
            {
            	 var $subchatBar = '<ul class="chat-messages mm-list mm-panel" id="mm-m0-p'+id+'">';
	                $subchatBar += '<li class="mm-subtitle"><a class="mm-subclose" href="#mm-m0-p0">Vendor</a></li>'
	                $subchatBar += '<div id="append-img" class="row" style="background: #86d9f9;padding-left: 25px;padding-right: 25px;">';
	                $subchatBar += '</div>';
	                $subchatBar += '<li><span class="chat-input"><input type="text" class="form-control send-message" data-emojiable="true" data-emoji-input="unicode" placeholder="Type your message"></span></li>';
	                $subchatBar += '</ul>'; 
	                $('#menu-right').append($subchatBar);
	                register_popup(id);
	                var chatInput = $('#mm-m0-p'+id).find('.chat-input');
	                chatInput.css('display','block');
            }
            
           
        })
    /*Register Popup Substitude*/
    $('#menu-right').on('click','.mm-subopen',function(e){
        var _that = $(this);
        var container = _that.closest('li');
        var user_id = container.attr('data-user');
        var chat_name = container.find('.chat-name').html();
        register_popup(user_id);
        $(_that.attr('data-href')).addClass('mm-current').addClass('mm-opened');
        $(_that.attr('data-href')).find('.chat-input').css('display','block');
        
    });
    if('onhashchange' in window){
    	$(window).on('hashchange',function(e){
    		var hash = $(location).attr('hash');
    		if(hash=='#mm-m0-p0' || hash == '')
    		{
    			var ci = $('span.chat-input');
				ci.css('display','none');
    		}
    		else
    		{
    			var ci = $('span.chat-input');
				ci.css('display','block');
    		}
    	})
    }
    $('#menu-right').on('click','.mm-subclose',function(e){
    	e.preventDefault();
    	var _that = $(this);
    	_that.closest('ul').removeClass('mm-current').removeClass('mm-opened');
    	$('.chat-input').attr('style','none!important');
    })

    $('body').on('keypress','.emoji-wysiwyg-editor',function(e){
            var _that = $(this);
            var container = _that.closest('ul').attr('id');
            var id = container.replace('mm-m0-p','');
            var message = _that.html();
            var key = e.which;
            
            if(key==13)
            {
                con.emit('sendMessage',id,message,user_id,user_name);
                _that.html('');
                var messages = '';
                 messages += '<li class="img">';
                          messages +=   '<span>';
                          messages +=  '<span class="chat-detail chat-right">';
                          messages +=  '<span class="chat-bubble"><span class="bubble-inner">'+message+'</span></span>';
                          messages +=  '</span>';
                          messages +=  '</span>';
                          messages +=  '</li>';
                $('#'+container).find('li:last').before(messages);
                e.preventDefault();
                var msgArea = $('#mm-m0-p'+id);
                var newScrollPos = (msgArea.prop('scrollHeight') - msgArea.prop('clientHeight'));
                msgArea.scrollTop(newScrollPos);
            }

    });
    con.on('newmessage',function(message,sender_id,sender_name,msgId){
           var messages = '';
                 messages += '<li class="img">';
                          messages +=   '<span>';
                          messages +=  '<span class="chat-detail">';
                          messages +=  '<span class="chat-bubble"><span class="bubble-inner">'+message+'</span></span>';
                          messages +=  '</span>';
                          messages +=  '</span>';
                          messages +=  '</li>';
             $('#mm-m0-p'+sender_id).find('li:last').before(messages);
             var msgArea = $('#mm-m0-p'+sender_id);
             msgArea.scrollTop(msgArea.prop('scrollHeight') - msgArea.prop('clientHeight'));
            
        });
    con.emit('recentChat',user_id);
    con.on('recentChatlist',function(data){
       $chats = JSON.parse(data);
       createRecentChatBox($chats,user_id);
    });
    con.on('setMessage',function(id,otherid,isPendingMessageResponse,data){
                isPendingMessage = isPendingMessageResponse;
                if(isPendingMessageResponse==1)
                {
                    fetch = fetch+1;
                }
                var messages = '';
                for($i=(data.length-1);$i>=0;$i--){
                    var msgObj = data[$i];
                    if($('#mm-m0-p'+otherid).find('.messageline').find('#msg-'+msgObj.id).length==0){
                        if(id==msgObj.sender){
                            //sent
                          messages += '<li class="img">';
                          messages +=   '<span>';
                          messages +=  '<span class="chat-detail chat-right">';
                          messages +=  '<span class="chat-bubble"><span class="bubble-inner">'+msgObj.message+'</span></span>';
                          messages +=  '</span>';
                          messages +=  '</span>';
                          messages +=  '</li>';
                           
                        }
                        else
                        {  //received
                            messages += '<li class="img">';
                            messages +=   '<span>';
                            messages +=  '<span class="chat-detail">';
                            messages +=  '<span class="chat-bubble"><span class="bubble-inner">'+msgObj.message+'</span></span>';
                            messages +=  '</span>';
                            messages +=  '</span>';
                            messages +=  '</li>';
                        }
                 }
                    
                }
                
                $('#mm-m0-p'+otherid).find('li:last').before(messages);
               
                 var msgArea = $('#mm-m0-p'+otherid);
                 msgArea.scrollTop(msgArea.prop('scrollHeight') - msgArea.prop('clientHeight'));
            
        });
      }
    });  
    
    $('body').on('click','.loadMore',function(){
      

    });
   
    $(document).on('click', '#contactformsubmitbutton', function () {
        data = {};
        data['name'] = $('.contact_name').val();
        data['contact_mail'] = $('.contact_mail').val();
        data['contact_sub'] = $('.contact_sub').val();
        data['contact_msg'] = $('.contact_msg').val();
        
    });

/*Chat Handling*/
Array.remove = function(array, from, to) {
                var rest = array.slice((to || from) + 1 || array.length);
                array.length = from < 0 ? array.length + from : from;
                return array.push.apply(array, rest);
            };
        
            //this variable represents the total number of popups can be displayed according to the viewport width
            var total_popups = 0;
            
            //arrays of popups ids
            var popups = [];
        
            //this is used to close a popup
            function close_popup(id)
            {
                for(var iii = 0; iii < popups.length; iii++)
                {
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                        
                        document.getElementById(id).style.display = "none";
                        
                        calculate_popups();
                        
                        return;
                    }
                }   
            }
        
            //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
            function display_popups()
            {
                var right = 220;
                
                var iii = 0;
                for(iii; iii < total_popups; iii++)
                {
                    if(popups[iii] != undefined)
                    {
                        var element = document.getElementById(popups[iii]);
                        element.style.right = right + "px";
                        right = right + 320;
                        element.style.display = "block";
                    }
                }
                
                for(var jjj = iii; jjj < popups.length; jjj++)
                {
                    var element = document.getElementById(popups[jjj]);
                    element.style.display = "none";
                }
            }
            function fetchMessage(id,receiverid){
                con.emit('fetchMessage',id,receiverid,fetch,isPendingMessage);
            }
            //creates markup for a new popup. Adds the id to popups array.
            function register_popup(id)
            {
                
                
                var activeClass = 'offline';           
                if(onlineUsers.hasOwnProperty(id))
                {
                    activeClass = 'online';
                }
                else
                {
                    activeClass = 'offline';
                }
                // var element = '<div class="popup-box chat-popup" id="'+ id +'">';
                // element = element + '<div class="popup-head">';
                // element = element + '<div class="popup-head-left"><span class="is_online '+activeClass+'"></span>&nbsp;'+ name +'</div>';
                // element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
                // element = element + '<div style="clear: both"></div></div><div class="popup-messages"><ul class="messageline"></ul></div><div class="popup-footer"><textarea id="sendmessage" placeholder="Enter your message" data-emojiable="true" data-emoji-input="unicode"></textarea></div></div>';
                
                // document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  
                
                //popups.unshift(id);
                        
                //calculate_popups();
                 window.emojiPicker = new EmojiPicker({
                        emojiable_selector: '[data-emojiable=true]',
                        assetsPath: '<?=base_url()?>/assets/img/',
                        popupButtonClasses: 'fa fa-smile-o'
                    });
                window.emojiPicker.discover();
                var receiverid = id;
                fetchMessage(user_id,receiverid);
                
            }
            
            //calculate the total number of popups suitable and then populate the toatal_popups variable.
            function calculate_popups()
            {
                var width = window.innerWidth;
                if(width < 540)
                {
                    total_popups = 0;
                }
                else
                {
                    width = width - 200;
                    //320 is width of a single popup box
                    total_popups = parseInt(width/320);
                }
                
                display_popups();
                
            }
            function createRecentChatBox(chats,user_id){
               $chatBar = '<li class="mm-label label-big">ONLINE</li>';
               $user_ids = [];
               $chatObject = {};
               var base_url = $('#base_url').attr('data-url');
               chats.forEach(function(value,index){
                   if(value.sender==user_id){
                     $user_ids.push(value.receiver);
                     $chatObject[value.receiver] = {'message':value.message};
                   }
                   else
                   {
                    $user_ids.push(value.sender);
                    $chatObject[value.sender] = {'message':value.message};
                   }
               });
               var base_url = $('#base_url').attr('data-url');
               $.ajax({'method':'POST','url':site_url+'home/getUserImages','data':{user_id:$user_ids}}).done(function(response){
                    $data = JSON.parse(response);
                    $data.forEach(function(value,index){
                      $chatObject[value.user_id]['name']=value.first_name;
                      $chatObject[value.user_id]['img']= image_url+value.user_img;
                      $chatBar += ' <li class="img no-arrow have-message" data-user="'+value.user_id+'" id="user-'+value.user_id+'">';
                      $chatBar += '<span class="inside-chat">';
                      var $s = 'offline';
                      if(onlineUsers.hasOwnProperty(value.user_id)){
                        $s = 'online';
                      }
                      $chatBar += '<i class="'+$s+'"></i>';
                      if($chatObject[value.user_id]['img']!='' && $chatObject[value.user_id]['img']!=base_url+'admin/images/users/')
                      {
                        $chatBar +=  '<img width="35" height="35" src="'+ $chatObject[value.user_id]['img']+'">';  
                      }
                      else
                      {
                        $chatBar +=  '<img width="35" height="35" src="'+ base_url+'admin/assets/images/products/product1.jpg">';

                      }
                      $chatBar += '<a class="mm-subopen mm-fullsubopen" data-href="#mm-m0-p'+value.user_id+'"></a><span class="chat-name"> '+$chatObject[value.user_id]['name']+' </span>';
                      $chatBar += '<span>'+$chatObject[value.user_id]['message']+'</span>';
                      $chatBar += '</span>';
                      $chatBar += '</li>';
                     
                      // $chatBar +=  '<a href="javascript:register_popup(\''+$chatObject[value.user_id]['name']+'\','+value.user_id+');">';
                     
                      var $s = 'offline';
                      if(onlineUsers.hasOwnProperty(value.user_id)){
                        $s = 'online';
                      }
                    $('#menu-right').find('#mm-m0-p0').html($chatBar); 
                    var $subchatBar = '<ul class="chat-messages mm-list mm-panel" id="mm-m0-p'+value.user_id+'">';
                    $subchatBar += '<li class="mm-subtitle"><a class="mm-subclose" href="#mm-m0-p0">'+$chatObject[value.user_id]['name']+'</a></li>'
                    $subchatBar += '<div id="append-img" class="row" style="background: #86d9f9;padding-left: 25px;padding-right: 25px;">';
                    $subchatBar += '</div>';
                    $subchatBar += '<li><span class="chat-input"><input type="text" class="form-control send-message" data-emojiable="true" data-emoji-input="unicode" placeholder="Type your message"></span></li>';
                    $subchatBar += '</ul>'; 
                    $('#menu-right').append($subchatBar);
                });
             });
           }
            
            //recalculate when window is loaded and also when window is resized.
            window.addEventListener("resize", calculate_popups);
            window.addEventListener("load", calculate_popups)
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
        
    function overview(product_id) {
        data = {};
        $data = product_id;
        data['user_product_quantity'] = 1;
    
        $.ajax({ 
            type: "POST",  
            url: "<?php echo site_url(); ?>home/Servicos?product_id=<?php $product_id; ?>",  
            data: data,    
            success: function(response)  
            {
                if (response.status === true)
                {
                    toastr.success('Serviço adicionado aos favoritos com sucesso');
                }
                else
                {
                    toastr.error('Serviço já adicionado aos favoritos');
                }
            }   
        });
    }
</script>
<script>
        
    function add_fav(product_id) {
        data = {};
        data['user_product_id'] = product_id;
        data['user_product_quantity'] = 1;
    
        $.ajax({ 
            type: "POST",  
            url: "<?php echo site_url(); ?>user_controller/addfav",  
            data: data,
            dataType: "json",       
            success: function(response)  
            {
                if (response.status === true)
                {
                    toastr.success('Serviço adicionado aos favoritos com sucesso');
                }
                else
                {
                    toastr.error('Serviço já adicionado aos favoritos');
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
            url: "<?php echo site_url(); ?>user_controller/addToCart",  
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
                                    
            addToCartBodyContent += '<a title="Carrinho de compras" class="dropdown-toggle" data-toggle="dropdown">';
            addToCartBodyContent += '<span class="glyphicon glyphicon-shopping-cart"></span>';
            addToCartBodyContent += '<span class="badge">  '+response.user_cart_product_count+' </span>';
            addToCartBodyContent += '<span class="dropdown-text">Carrinho de compras</span> </a>';
            addToCartBodyContent += '<div class="dropdown-menu dropdown-menu55">';
            addToCartBodyContent += '<p class="cart-desc"> '+response.user_cart_product_count+' item(s) em seu carrinho - R $'+response.total_price+'</p>';
                                        
                for(var i = 0; i < response.user_cart_product.length; i++) {
                    addToCartBodyContent += '<div class="product clearfix">';
                    addToCartBodyContent += '<a href="javascript:void(0);" class="delete-btn" onclick="deleteCartItem('+response.user_cart_product[i].user_cart_id+')"> </a>';
                    addToCartBodyContent += '<figure class="product-image-container">';
                    addToCartBodyContent += '<a href="<?php echo site_url(); ?>home/Servicos?product_id='+response.user_cart_product[i].user_product_id+'">';

                    for(var a = 0; a < response.product_images[i].length; a++) { 
                        addToCartBodyContent += '<img src="<?php echo base_url();?>/admin/assets/images/products/'+response.product_images[i][a].product_image_name+'" class="imagesizenavbar">';
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

                    if (response.cart_product_info[i].time_price_check == 1) 
                    {
                       addToCartBodyContent += '<span class="product-price">  R$ Á combinar </span><br>';
                    }
                    else
                    {
                        addToCartBodyContent += '<span class="product-price"> R$ '+response.cart_product_info[i].product_price.replace(".", ",")+' </span><br>';
                    }
                    
                    addToCartBodyContent += '<span class="product-price" style="color: #848079;"> Quantity: '+response.user_cart_product[i].user_product_quantity+' </span> </div> </div> </div>';
                }
                                            

                addToCartBodyContent += '<div class="clearfix">';
                addToCartBodyContent += '<ul class="pull-left action-info-container">';
                addToCartBodyContent += '<li>Total: <span class="first-color"> R$ '+response.total_price+' </span> </li> </ul> <br> <br>';
                addToCartBodyContent += '<ul class="pull-right action-btn-container">';
                addToCartBodyContent += '<li> <a href="<?php echo site_url('user_controller/carrinho'); ?>" class="btn btn-custom-5">carrinho</a>';
           //     addToCartBodyContent += '<a href="<?php echo site_url('user_controller/checkout'); ?>" class="btn btn-custom">Checkout</a>';
                addToCartBodyContent += '</li> </ul> </div> </div> </div>';
        

        addToCartBody = addToCartBodyContent;
        return addToCartBody;
    }

</script>
<script>
$('.owl-carousel').owlCarousel({
    items: 20,
    nav: true,
    dots: false,
    mouseDrag: true,
    responsiveClass: true,
    responsive: {
        0:{
          items: 3
        },
        480:{
          items: 3
        },
        768:{
          items: 3
        }
    }
});

//Background image
$( '.img-wrap' ).each( function(){
    var img = $( this ).find( 'img' );
    var src = img.attr( 'src' );
    $( this ).css( 'background-image', 'url( '+ src +' )' );
});
</script>


</body>
</html>