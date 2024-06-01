<?php
include('connection.php');
?>

<form id='register_form' action="" method="post">

 <div id='form_feedback' class="alert alert-danger" role="alert">Passwords do not match!</div>



<div class="mb-3">
    <input type="email" name="email" id="email" class='form-control' placeholder='Email address' required>
</div>
<div class="mb-3">  
     <input type="text" name="username" id="username" class='form-control' placeholder='Official Names' required>
    </div>
    <div class="mb-3">
    <input type="password" name="pwd" id="pwd" class='form-control' placeholder='Password' required>
</div>
<div class="mb-3">
    <input type="password" name="" id="pwd_repeat" class='form-control' placeholder='Repeat password' required>
</div>
<div class="mb-3">
    <input  type="submit" value="Submit" class='btn btn-success'>
</div>
<div class="mb-3">
  <label>Already have an account? <span id='login' style='color:#02df6e;font-weight:600;' onclick='window.location.href="index.php";'>Login</span> </label>
</div>



</form>

<script>
    $('#register_form').on('submit',function(event){
        event.preventDefault();

      let email = $('#email').val();
      let username = $('#username').val(); 
      let pwd =  $('#pwd').val();
      let pwd_repeat =  $('#pwd_repeat').val();
      let form_feedback = $('#form_feedback');
        //  alert(pwd);
        //  alert(pwd_repeat);
        if(pwd !== pwd_repeat){
           form_feedback.html('Passwords do not much!!');
          form_feedback.slideDown("slow");

          


        }else{
            $.post("includes/insert_user.php",{email:email,username:username,pwd:pwd,},function(data){
                $('.register_login').html(data);


            });
        }

    });

</script>

<?php ?>