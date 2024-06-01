<?php include('includes/header.php') ?>
    <title>Document</title>
</head>
<body>
<?php

if(isset($_COOKIE['chat_usr_id'])){
    $_SESSION['chat_usr_id'] = $_COOKIE['chat_usr_id'];

}

if(isset($_SESSION['chat_usr_id'])){

    header("Location:messages.php");
    

}


?> 

   <div class="container"><!--container-->

   <div class="illust_verify"><!--illustrator_verify--->



    <div class="illustrator_img"><!--illustrator-->
    <img src="images/userchat.png" alt="">
    </div><!--illustrator-->

    <div class='verify_div'><!--verify_div-->

    <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="100px" >
        </a>

        <h3>Welcome to <span style='color:#02df6e;font-size:'>W</span>eb  <span style='color:#02df6e;'>C</span>hat <span style='color:#02df6e;'>A</span>pp</h3>
         <h4>Let's get started with <span style='color:#02df6e;'>WCA</span> </h4>
        <div class="register_login"><!--register_login-->

       


            <div class='register'>
             <span> Create Account</span>  
            </div>

            <div class="login">
             <span>Login</span>   
            </div>

        </div><!--register_login-->

    </div><!--verify_div-->

   </div><!--illustrator_verify--->



   </div><!--container-->
   <script>
    $('.register').on('click' ,function(data){
        $.post("includes/register.php",{},function(data){
              $('.register_login').html(data);

        });
      
        

    });
    $('.login').on('click' ,function(data){
        $.post("includes/login.php",{},function(data){
              $('.register_login').html(data);

        });
      
        

    });

   </script>
    
</body>
<?php include('includes/footer.php') ?>