<?php 
if(isset($_GET['delcok'])){
  if(isset($_COOKIE['id'])){
      setcookie("id","",time()-86400,"/");
  }
}
if(isset($_COOKIE['id'])){
  header("Location: system/files/login_lock/");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="assets/ad/a/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/ad/a/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/ad/a/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b><span class="glyphicon glyphicon-book"></span></b>Test Analysis</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <div id="show"></div>
        <form  method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="firstname" name="fn" placeholder="Full name" required/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="user" name="user" placeholder="Username" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
        
          
       
          <div class="form-group has-feedback">
            <input type="password" id="pass" class="form-control" name="pass" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="cpass" class="form-control" name="cpass" placeholder="Retype password" required/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          
          
          <div class="row">
            
            <div class="col-xs-4">
              <input style="border-radius:3px 10px 3px 10px" type="submit" id="sub" name="sub" class="btn btn-primary btn-block btn-flat" value="Register">
            </div><!-- /.col -->
          </div>
        </form>        

      <br>
        <a href="system/files/login/" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="assets/ad/a/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/ad/a/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="assets/ad/a/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#sub").on('click',function(e){
    e.preventDefault();
      var firstname = $("#firstname").val();
      var user = $("#user").val();
      var pass = $("#pass").val();
      var cpass = $("#cpass").val();
      $.ajax({
         url:"system/core/register.php",
         type:"POST",
         data:{'fn':firstname,'user':user,'pass':pass,'cpass':cpass},
    success:function(data){
    $('#show').html(data);
    }
    });
    });
    });
    </script>
  </body>
</html>