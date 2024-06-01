<?php
include 'connection.php';
$sender_id = $_SESSION['chat_usr_id'];
$receiver_id = $_POST['chat_usr_id'];
?>

<div class="chat_msg_area"><!--chat_msg_area-->

<div class="chat_area_profile"><!--chat_area_profile-->
<?php
$query = "SELECT * FROM users WHERE chat_usr_id = '$receiver_id'";
$select_users = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_users)){
    $username = $row['username'];
}

?>
<div class='chat_img '>
    <img src="images/avatar4.png" alt="">

</div>

<div class="area_username">
   <?php echo $username ?>
</div>

</div><!--chat_area_profile-->

<div id='msg_area'><!--msgarea-->
<!--content message-->



</div><!--msgarea-->




</div><!--chat_msg_area-->

<div class='msg_typing_area'>
<textarea name="" id="msg_content" cols="30" rows=""></textarea>
<a id='send_msg' style='border-radius:50%;' class='btn btn-success disabled'><i class="fas fa-paper-plane"></i></a>

</div>

<script>
    $(document).ready(function(){
     
       

   $('#msg_content').keyup(function(){
    //  alert();
        let msg = $('#msg_content').val();

        
        if(msg.replace(/\s/g, '').length){
      $('#send_msg').removeClass('disabled');

    }

     
    });


    $('#send_msg').on('click',function(){
     let sender_id = '<?php echo $sender_id;  ?>';
     let receiver_id = '<?php echo $receiver_id;  ?>';


    let msg = $('#msg_content').val();

    // var str = "    ";

    if(msg.replace(/\s/g, '').length){
    //  alert(msg);
    // $('#send_msg').removeClass('disabled');
     $.post("includes/send_msg.php",{sender_id:sender_id,receiver_id:receiver_id,msg:msg},function(data){

        $('#msg_content').val('');
        

 updateMsg();
     });
    
   
    }else{
      alert('Empty');//dont send
    }

   

    });

    $('#msg_content').keyup(function(){
        updateMsg();
    });

    $('#msg_area','#msg_content').click(function(){
        updateMsg();
    });
   
   
    // setInterval(function(){
    //     updateMsg();

    //     },3000);
        updateMsg();
    function updateMsg(){
        let sender_id = '<?php echo $sender_id;  ?>';
     let receiver_id = '<?php echo $receiver_id;  ?>';

     $.post("includes/display_msg.php",{receiver_id:receiver_id,sender_id:sender_id},function(data){
        $('#msg_area').html(data);


    });
  

        //  $.ajax({
        //     url : "display_msg.php",
        //     type: "POST";,
        //     data: {receiver_id:receiver_id,sender_id:sender_id},
        //     success:function(data){
        //         if(!data.error){
        //             $('#msg_area').html(data);
        //         }
        //     }

        //  });
    }
   


    });//onready



</script>

<?php ?>