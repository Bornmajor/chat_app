<?php
$query = "SELECT * FROM users";
$select_usr_chat = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_usr_chat)){
   $chat_usr_id = $row['chat_usr_id'];
  $username =  $row['username'];
  

}

?>