<!-- this footer will not be shown on login page -->

<?php if ($inner_view != 'common/login') { ?>

  <!-- <footer class="main-footer">

    <div class="pull-right hidden-xs">

      Designed and Developed by <a href="http://www.karyonsolutions.com"><strong>Karyon Solutions</strong></a>

    </div>

    <strong>&copy; <?php echo date('Y'); ?></strong> All rights reserved by <strong>Karyon Solutions</strong>

</footer> -->

<?php } ?>

</div>

</body>

<!-- getting this scripts from karyon_config.php file which is under application > config folder -->

<?php

foreach ($scripts['foot'] as $file) {

    echo "<script src='$file'></script>";

}

?>

<script>

    $(document).ready(function(){  

        $("#WYSIHTML").wysihtml5();

        $("#WYSIHTML1").wysihtml5();

        $("#WYSIHTML2").wysihtml5();

        $("#WYSIHTML3").wysihtml5();

        $("#WYSIHTML4").wysihtml5();

        $("#WYSIHTML5").wysihtml5();

        $("#WYSIHTML6").wysihtml5();

        $("#WYSIHTML7").wysihtml5();

        $("#WYSIHTML8").wysihtml5();

    });



    //Date range picker

    $('.datepicker').daterangepicker();

</script>

<?php if(isset($_SESSION['login_data'])): ?>
<span id="c_user_details" data-user-id="<?=$_SESSION['login_data']->user_id?>" data-user-name="<?=$_SESSION['login_data']->first_name?>" data-user-type="<?=$_SESSION['login_data']->user_type?>"></span>
<?php else: ?>
    <span id="c_user_details" data-user-id="0" data-user-name="0"></span>
<?php endif; ?>

<!-- <script src="https://snoopychat.tk/socket.io/socket.io.js">"></script> -->
<script src="<?=base_url().'/assets/chat-mongoose.js';?>"></script>
<script src="<?=base_url().'/assets/js/config.js';?>"></script>
<script src="<?=base_url().'/assets/js/util.js';?>"></script>
<script src="<?=base_url().'/assets/js/jquery.emojiarea.js'; ?>"></script>
<script src="<?=base_url().'/assets/js/emoji-picker.js'; ?>"></script>
<script src="<?=base_url().'/assets/js/jquery.nicescroll.js'?>"></script>
<script type="text/javascript">
  
  function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true; 
  }

  $(document).ready(function(){
    user_id = $('#c_user_details').attr('data-user-id');
    user_name = $('#c_user_details').attr('data-user-name');
    user_type = $('#c_user_details').attr('data-user-type');
    chat = new Porvogue({u:user_id,v:user_name,t:user_type});
    con = chat.returnSocket();
    onlineUsers = {};
    isPendingMessage = 1;
    con.on('userlist',function(users){
        $users = $('.chat');
        onlineUsers = users;
        $users.each(function(i,v){
            if(users.hasOwnProperty($(v).attr('data-id')))
            {
                $(v).find('span').removeClass('offline').addClass('online');

            }
            else
            {
                $(v).find('span').removeClass('online').addClass('offline');   
            }


        })
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
    con.on('newmessage',function(message,sender_id,sender_name,msgId){
        if($('#'+sender_id).find('.messageline').find('#msg-'+msgId).length==0){
            if($('#'+sender_id).length>0)
            {
               $('#'+sender_id).css('display','block');
               $('#'+sender_id).find('.messageline').append('<li class="received">'+message+'</li>');
            }
            else
            {
               register_popup(sender_name,sender_id);
               $('#'+sender_id).find('.messageline').append('<li class="received">'+message+'</li>');
            }
            var container = $('#'+sender_id).find('.messageline');
            var msgArea = $('#'+sender_id).find('.popup-messages');
            msgArea.scrollTop(msgArea.prop('scrollHeight') - msgArea.prop('clientHeight'));
        }
    });
    con.on('blockchat',function(targetid,requesterid){
         if(!confirm("Are you sure you want to block this user"))
         {
            return false;
         }
         $('#'+targetid).find('.messageline').append('<li class="blocked">You blocked this user</li>');
         $('#'+targetid).find('.emoji-wysiwyg-editor').css('display','none');
         var msgArea = $('#'+id).find('.popup-messages');
             msgArea.scrollTop(msgArea.prop('scrollHeight') - msgArea.prop('clientHeight'));
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
                    if($('#'+otherid).find('.messageline').find('#msg-'+msgObj.id).length==0){
                        if(id==msgObj.sender){
                            messages += '<li class="sent">'+msgObj.message+'</li>';
                        }
                        else
                        {
                            messages += '<li class="received">'+msgObj.message+'</li>';
                        }
                 }
                    
                }
                if($('#'+otherid).find('.messageline').find('li').length>0)
                {
                    $('#'+otherid).find('.messageline li:eq(0)').before(messages);
                }
                else
                {
                   $('#'+otherid).find('.messageline').html(messages);
                }
                var msgArea = $('#'+otherid).find('.popup-messages');
                msgArea.scrollTop(msgArea.prop('scrollHeight') - msgArea.prop('clientHeight'));
                
            
    });
    $('body').on('keypress','.emoji-wysiwyg-editor',function(e){
            var _that = $(this);
            var id = _that.closest('.chat-popup').attr('id');
            var message = _that.html();
            var key = e.which;
            var container = _that.closest('.chat-popup').find('.messageline');
            if(key==13)
            {
                con.emit('sendMessage',id,message,user_id,user_name);
                _that.html('');
                container.append('<li class="sent">'+message+'</li>');
                var msgArea = $('#'+id).find('.popup-messages');
                msgArea.scrollTop(msgArea.prop('scrollHeight') - msgArea.prop('clientHeight'));
                e.preventDefault();
            }
    });
    
});
      function block_user(targetid){
        var _that = $(this);
        var requester_id = user_id;
        con.emit('blockuser',requester_id,targetid);
      }
 //this function can remove a array element.
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
            function register_popup(name,id,)
            {
                
                for(var iii = 0; iii < popups.length; iii++)
                {   
                    //already registered. Bring it to front.
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                    
                        popups.unshift(id);
                        
                        calculate_popups();
                        
                        
                        return;
                    }
                }    
                var activeClass = 'offline';           
                if(onlineUsers.hasOwnProperty(id))
                {
                    activeClass = 'online';
                }
                else
                {
                    activeClass = 'offline';
                }
                var element = '<div class="popup-box chat-popup" id="'+ id +'">';
                element = element + '<div class="popup-head">';
                element = element + '<div class="popup-head-left"><span class="is_online '+activeClass+'"></span>&nbsp;'+ name +'</div>';
                element = element + '<div class="popup-head-right"><a class="pull-right" href="javascript:close_popup(\''+ id +'\');">&#10005;</a><a class="pull-right" style="margin-right:10px" href="javascript:block_user(\''+ id +'\')"><i class="fa fa-ban"></i></a></div>';
                element = element + '<div style="clear: both"></div></div><div class="popup-messages"><ul class="messageline"></ul></div><div class="popup-footer"><textarea id="sendmessage" placeholder="Enter your message" data-emojiable="true" data-emoji-input="unicode"></textarea></div></div>';
                
                document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  
                
                popups.unshift(id);
                        
                calculate_popups();
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
            
            //recalculate when window is loaded and also when window is resized.
            window.addEventListener("resize", calculate_popups);
            window.addEventListener("load", calculate_popups)

    $(document).ready(function() {

        var site_url = '<?php echo site_url(); ?>';

        // $('img').error(function() {
        //      $(this).attr('src', '<?php echo base_url('assets/images/no-image-found.jpg'); ?>');
        //  });

        //Date for the calendar events (dummy data)

        $('#calendar_admin').fullCalendar({

            events: '<?php echo site_url('admin/getcalendardata'); ?>',

            utc: true,

            eventRender: function(event, element) {

                if(event.status == 1 ) {

                    element.css('background-color', 'rgb(255, 255, 0)');

                    element.css('border-color', '#dad716');

                    element.css('color', 'black');

                } else if(event.status == 2 || event.status == 3) {

                    element.css('background-color', 'rgb(254, 81, 81)');

                    element.css('border-color', '#ff2929');

                } else if(event.status == 7 ) {

                    element.css('background-color', 'rgb(71, 71, 228)');

                    element.css('border-color', '#5757e1');

                } else if(event.status == 8 ) {

                    element.css('background-color', 'green');

                    element.css('border-color', 'green');

                }

            },

            header: {

                left: 'prev,next today',

                center: 'title',

                right: 'month,agendaWeek,agendaDay'

            },

            defaultView: 'month',

            editable: false,

            timeFormat: 'hh:mm a',

            buttonText: {

                today: 'today',

                month: 'month',

                week: 'week',

                day: 'day'

            },

            // Event Mouseover

            eventMouseover: function (calEvent, jsEvent, view) {

                var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';

                $("body").append(tooltip);



                $(this).mouseover(function (e) {

                    $(this).css('z-index', 10000);

                    $('.event-tooltip').fadeIn('500');

                    $('.event-tooltip').fadeTo('10', 1.9);

                }).mousemove(function (e) {

                    $('.event-tooltip').css('top', e.pageY + 10);

                    $('.event-tooltip').css('left', e.pageX + 20);

                });

            },

            eventMouseout: function(calEvent, jsEvent) {

                $(this).css('z-index', 8);

                $('.event-tooltip').remove();

            },

        });

    });

</script>



<script>

    $(document).on("change", "#employee_select_for_calendar", function(){

        var user_id = $(this).val();



        var site_url = '<?php echo site_url(); ?>';

        var url = site_url+"/admin/getvendorcalendardata?user_id=";



        $('#calendar_admin').fullCalendar('removeEventSources');

        //Date for the calendar events (dummy data)

        $('#calendar_admin').fullCalendar('addEventSource', url + user_id);

        $('#calendar_admin').fullCalendar({            

            // Event Mouseover

            eventMouseover: function (calEvent, jsEvent, view) {

                var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';

                $("body").append(tooltip);



                $(this).mouseover(function (e) {

                    $(this).css('z-index', 10000);

                    $('.event-tooltip').fadeIn('500');

                    $('.event-tooltip').fadeTo('10', 1.9);

                }).mousemove(function (e) {

                    $('.event-tooltip').css('top', e.pageY + 10);

                    $('.event-tooltip').css('left', e.pageX + 20);

                });

            },

            eventMouseout: function(calEvent, jsEvent) {

                $(this).css('z-index', 8);

                $('.event-tooltip').remove();

            }

        });

    });

</script>



<script>

    $(document).ready(function(){  

        //Initialize Select2 Elements

        $(".select2").select2();

    });

    $(document).ready(function(){  

        $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});

        //Money Euro

        $("[data-mask]").inputmask();



        //Date picker

        $('#datepicker').datepicker({

            autoclose: true

        });

        

    });

    $(document).ready(function(){  

        //Timepicker

        $(".timepicker").timepicker({

            showInputs: false,

            showMeridian: false

        });

    });

</script>





<script>

    $(document).ready(function(){  

        $("#example1").DataTable({            

            "ordering": false,

        });

        $('#example2').DataTable({

            "paging": true,

            "lengthChange": false,

            "searching": false,

            "ordering": false,

            "info": true,

            "autoWidth": false,

        });

        $('#example3').DataTable({

            "paging": true,

            "lengthChange": true,

            "searching": true,

            "ordering": false,

            "info": true,

            "autoWidth": false,

        });

        $('#example22').DataTable({

            "ordering": false,

            "lengthChange": false,

            "autoWidth": false,

        });

        $('#example23').DataTable({

            "lengthChange": false,

            "autoWidth": false,

        });

        $('#example24').DataTable({

            "lengthChange": false,

            "autoWidth": false,

        });

        $('#example25').DataTable({

            "lengthChange": false,

            "autoWidth": false,

        });

        $("#example4").DataTable();

        $("#example5").DataTable();

        $("#example6").DataTable();

    });

</script>





<script>

    function deleteMail() {

      $('#deleteMail').submit();

  }

</script>



<script>

   $(".success-alert").fadeTo(2000, 500).slideUp(500, function()

   {

     $(".success-alert").slideUp(500);

 });   

</script>





<script>

   $(".alert-danger").fadeTo(2000, 500).slideUp(500, function()

   {

     $(".alert-danger").slideUp(500);

 });   

</script>





<!-- Start notification toster -->

<?php if ($this->session->flashdata('message') != ""){ ?>

<script>

    toastr.info('<?php echo $this->session->flashdata('message');?>');

</script>

<?php } ?> 

<!-- End Notification toster -->



<!-- Start notification toster -->

<?php if ($this->session->flashdata('success_msg') != ""){ ?>

<script>

    toastr.success('<?php echo $this->session->flashdata('success_msg');?>');

</script>

<?php } ?> 

<!-- End Notification toster -->



<!-- Start notification toster -->

<?php if ($this->session->flashdata('error_msg') != ""){ ?>

<script>

    toastr.error('<?php echo $this->session->flashdata('error_msg');?>');

</script>

<?php } ?> 

<!-- End Notification toster -->



</html>

