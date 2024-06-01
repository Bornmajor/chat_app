<?php
include('connection.php');

if(isset($_POST['email'])){
    $email = $_POST['email'];
   $pwd = $_POST['pwd'];

   $email = mysqli_real_escape_string($connection,$email);
   $pwd = mysqli_real_escape_string($connection,$pwd);

   $query = "SELECT * FROM users WHERE email = '$email'";
   $select_users = mysqli_query($connection,$query);
   if($select_users){
    while($row = mysqli_fetch_assoc($select_users)){
        $db_email = $row['email'];
        $chat_usr_id = $row['chat_usr_id'];
       $db_pwd = $row['pwd'];

    }
    if(!isset($chat_usr_id)){

        echo '<div class="alert alert-danger" role="alert">
        Email user does not exist! Try again
       </div>';

    }else{
        if(password_verify($pwd,$db_pwd)){
        
          
             //get user login session and redirect
             $_SESSION['chat_usr_id'] = $chat_usr_id;

               //cookie store
            $cookie_name = 'chat_usr_id';
            $cookie_value =   $_SESSION['chat_usr_id'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

           

             echo '
             <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Login successfullly!Redirecting..</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';


             //redirect main page
             echo "
             <script type='text/javascript'>
             window.setTimeout(function() {
                 window.location = 'messages.php';
             }, 2000);
             </script>
             ";



        }else{
            //pwd incorrect
            echo '<div class="alert alert-danger" role="alert">
            Password is incorrect! Try again
           </div>';
        }
    }

   }



}

?>