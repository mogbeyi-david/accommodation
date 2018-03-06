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
     <h3>Accommodation Registration</h3>
      <form action="<?= URL?>student/register" method="post">
          <span class="alert-danger"><?= $mError; ?></span>
          <div class="form-group ">
              <input type="text" name="matric_number" class="form-control" placeholder="ABC/1234/012" id="MatricNumber" >
              <i class="fa fa-user"></i>

          </div>
          <span class="alert-danger"><?= $pError; ?></span>
          <div class="form-group log-status">
              <input type="password" name="password" class="form-control" placeholder="Password" id="Passwod" >
              <i class="fa fa-lock"></i>
          </div>
          <div class="form-group log-status">
              <span class="alert-danger"><?= $cPError; ?></span>
              <input type="password" name="cPassword" class="form-control" placeholder="Retype Password" id="Passwod" >
              <i class="fa fa-lock"></i>
          </div>
          <span class="alert alert-danger">Invalid Credentials</span>
          <span class="alert-danger"><?= $sError; ?></span>
          <div class="input-group"  id="Gender">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <select id="Gender"  class="form-control" name="sex">
                  <option> --select-- </option>
                  <option value="male"> Male </option>
                  <option value="female"> Female </option>
              </select>
          </div><br>
          <input name="token" value="" type="hidden">
          <input value="Submit" type="submit" class="log-btn">
      </form>
   </div>
  <script src="<?= URL?>apply/js/jquery-1.12.3.min.js"></script>

  <script src="<?= URL?>webo/js/index.js"></script>

</body>
</html>
