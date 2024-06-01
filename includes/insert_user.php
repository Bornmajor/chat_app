<?php
include('connection.php');

if(isset($_POST['email'])){
  $email =  $_POST['email'];
  $username =  $_POST['username'];
   $pwd = $_POST['pwd'];

  $email = mysqli_real_escape_string($connection,$email);
  $username = mysqli_real_escape_string($connection,$username);
  $pwd = mysqli_real_escape_string($connection,$pwd);

  $company_id = 'WCA';
  $new_usr_id = $company_id.uniqid();

  $query = "SELECT * FROM users WHERE email = '$email'";
  $check_email_exist = mysqli_query($connection,$query);
  if($check_email_exist){
    while($row = mysqli_fetch_assoc($check_email_exist)){
       $chat_usr_id =  $row['chat_usr_id'];
       $db_email = $row['email'];
      
       
    }
    if(isset($db_email)){
        if($email == $db_email ){

            echo '<div class="alert alert-danger" role="alert">
           Email user already exist Try other options!
          </div>';

                //redirect main page
                echo "
                <script type='text/javascript'>
                window.setTimeout(function() {
                    window.location = 'index.php';
                }, 3000);
                </script>
                ";

        }
    }
    else{
           

            //password encrypt
            $pwd = password_hash($pwd,PASSWORD_BCRYPT,array('cost' => 12));
            //lower case email
             $email = strtolower($email);


             //check if usr_id exist
             if(isset($chat_usr_id)){
                  if($new_usr_id == $chat_usr_id){
                $new_usr_id = $company_id.uniqid();
              } 
             }
           

            $query = "INSERT INTO users(chat_usr_id,email,username,pwd)VALUES('$new_usr_id','$email','$username','$pwd')";
            $insert_user = mysqli_query($connection,$query);
            if($insert_user){

                //get user login session and redirect
                $_SESSION['chat_usr_id'] = $new_usr_id;

                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Account created successfully!Redirecting..</strong>
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



            } 
        }
   

    
  }

}


?>