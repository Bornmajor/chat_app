<?php
include('connection.php');
?>

<form id='register_form' action="" method="post">

 <div id='form_feedback'></div>



<div class="mb-3">
    <input type="email" name="email" id="email" class='form-control' placeholder='Email address' required>
</div>

    <div class="mb-3">
    <input type="password" name="pwd" id="pwd" class='form-control' placeholder='Password' required>
</div>

<div class="mb-3">
    <input  type="submit" value="Login" class='btn btn-success'>
</div>
<div class="mb-3">
  <label>Need an account? <span id='register' style='color:#02df6e;font-weight:600;' onclick='window.location.href="index.php";' >Create now</span> </label>
</div>



</form>

<script>
    $('#register_form').on('submit',function(event){
        event.preventDefault();

      let email = $('#email').val(); 
      let pwd =  $('#pwd').val();
      let form_feedback = $('#form_feedback');
        //  alert(pwd);
        //  alert(pwd_repeat);
     
            $.post("includes/login_user.php",{email:email,pwd:pwd},function(data){
                 form_feedback.html(data);
                form_feedback.slideDown("slow");
               

            });
        

    });

</script>

<?php ?>