<?php
include('connection.php');

if(isset($_POST['msg'])){
    $msg = $_POST['msg'];
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];

   $msg =  mysqli_real_escape_string($connection,$msg);
    if(!empty($msg)){
        $msg_year = date('Y');
        $msg_month = date('F');
        $msg_day = date('j'); 
        $msg_time = date('h:i A');
        $query = "INSERT INTO msg(msg,sender_id,receiver_id,msg_year,msg_month,msg_day,msg_time)VALUES('$msg','$sender_id','$receiver_id','$msg_year','$msg_month','$msg_day','$msg_time')";
        $insert_msg = mysqli_query($connection,$query);
        
        

    }
}


?>