<?php include('includes/header.php'); ?>
    <title>Document</title>
</head>
<body>
    

<?php 



$chat_usr_id = $_SESSION['chat_usr_id'];
if(!isset($chat_usr_id)){
    header("Location:index.php");
    

}


?> 


<div class='container'><!--container-->



<div class="message_area"><!--message_area-->


<div class='contact_area'><!--contact area-->
<div class="mb-3">
<a style='color:black;text-decoration:none; font-size:18px;' href="signout.php"> <i class="fas fa-sign-out-alt"></i> Sign Out</a>
</div>

<div class="mb-3">
<input type="search" name="" onkeyup="filterChats()" id="search" class='form-control' placeholder='Search contact'>
</div>

<?php
 $query = "SELECT * FROM users";
 $select_usr_chat = mysqli_query($connection,$query);

 while($row = mysqli_fetch_assoc($select_usr_chat)){
    $chat_usr_id = $row['chat_usr_id'];
   $username =  $row['username'];
   ?>
   <?php
     if($chat_usr_id !== $_SESSION['chat_usr_id']){
        ?>
        <div rel='<?php echo $chat_usr_id ?>' data-content='<?php echo $username ?>' class="card_chat"><!--card_chat-->

<div class="chat_img">
    <img src="images/avatar1.png"  alt="">
</div>

<div class="chat_username">
 
         <div><?php echo $username ?></div> 


</div>


</div><!--card_chat--> 


    <?php }
?>
  


<?php 
}

?>







</div><!--contact area--->

<div class="chat_area"><!--chat_area-->

<div class="welcome_chat">
 <h3>Welcome to Web Chat App</h3>
 <h4>Click any chat </h4>
<img src="images/logo.png" alt="" width='200px'>


</div>

</div><!--chat_area-->


</div><!--message_area-->




</div><!--container-->


<script>
     $(document).ready(function(){

    $('.card_chat').on('click',function(){
        let chat_usr_id = $(this).attr("rel");
        let chat_area = $('.chat_area');
      
        // alert(chat_usr_id);

        $.post('includes/text_msg.php',{chat_usr_id:chat_usr_id},function(data){
            // alert(chat_usr_id);
        chat_area.html(data);

        });
       
    



    });
  




     });//onready

  function filterChats(){
   var CardList = $('.card_chat');
    var text_filter =  $('#search').val().toUpperCase();
    var data_content;

    for(i = 0; i < CardList.length; i++){
       data_content = CardList[i].getAttribute("data-content");
       if (data_content .toUpperCase().indexOf(text_filter) > -1) {
        CardList[i].style.display = "";
      } else {
        CardList[i].style.display = "none";
      }



    }



     }   


</script>

</body>
<?php include('includes/footer.php') ?>