<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login form </title>
  
  
  <link rel='stylesheet prefetch' href="'<?= URL?>apply/assets/font-awesome-4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="<?= URL?>webo/css/style.css">

  
</head>

<body>
  <div class="login-form">
     <h1>Webo</h1>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="MatricNumber " id="MatricNumber">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" id="Passwod">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a style="color:green;" class="link" href="../../../../Public/index.php">Lost your password?</a>
     <button type="button" class="log-btn" >Log in</button>
    
     <p> <a style="color:green;" class="link" href="http://www.eportal.oauife.edu.ng"> Eportal </a> 

         <a style="color:green;" class="link" href="http://www.oauife.edu.ng"> OAU Website &ensp;</a> 
     </p>

     
    
   </div>
  <script src="<?= URL?>apply/js/jquery-1.12.3.min.js"></script>

    <script src="<?= URL?>webo/js/index.js"></script>

</body>
</html>
