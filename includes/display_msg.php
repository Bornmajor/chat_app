<?php
include('connection.php');

$receiver_id = $_POST['receiver_id'];
// $sender_id = $_POST['sender_id'];



?>

<?php
$chat_usr_id = $_SESSION['chat_usr_id'];
$query = "SELECT * FROM msg WHERE sender_id = '$chat_usr_id' AND receiver_id = '$receiver_id' OR sender_id = '$receiver_id' AND receiver_id = '$chat_usr_id' ORDER BY STR_TO_DATE(CONCAT(msg_year, ' ', msg_month, ' ', msg_day), '%Y %M %d')";
$select_msg = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_msg)){
  $db_sender =  $row['sender_id'];
  $db_receiver =  $row['receiver_id'];
  $msg = $row['msg'];
  $msg_year = $row['msg_year'];
  $msg_month = $row['msg_month'];
  $msg_day = $row['msg_day'];
  $msg_time = $row['msg_time'];
  

    ?>
    <?php
 
    //if sender msg turn color green
    if($db_sender == $chat_usr_id){
    ?>
  <div class="sender_msg">
   <?php echo $msg ?>
   <div class='date_chat'><?php echo $msg_day." ". $msg_month.", ".$msg_year." ".$msg_time ?></div>
</div>

<?php
   }else{
    ?>
      <div class="receiver_msg">
   <?php echo $msg ?>
   <div class='date_chat'><?php echo $msg_day." ". $msg_month.", ".$msg_year." ".$msg_time ?></div>
</div>


   <?php }
   

}
 $total_rows =  mysqli_num_rows($select_msg);
    
    if($total_rows == 0){
     echo "<h3 style='margin:20px;'>Be the first to start the conversation!!</h3>";
    }
?>





<?php



?>
<script>
   document.getElementById('msg_content').scrollIntoView(false);
</script>