<?php
    include '../../libs/db/pdo.php';
	include '../../libs/datetime/index.php';
	include '../../libs/secure/index.php';
	include '../../libs/url/index.php';
	if(isset($_COOKIE['id'])){
	  echo $_COOKIE['id'];
	}
if ( isset($_POST['sub']) ) 
{
  $user=$_POST['user'];
  $pass=$_POST['pass'];
	if(1){
	try{
	   //echo "SELECT count(*) FROM user Where username=".$user;
	   $s = $db->prepare("SELECT * FROM user Where username='".$user ."' && password='".$pass."'");
	   $s->execute();
	   $result = $s->setFetchMode(PDO::FETCH_OBJ); 
	   $row = $s->fetchAll(PDO::FETCH_OBJ);
	   if($row){
	     ob_start();
	     session_start();
	     $_SESSION['id'] = $row[0]->userid;
	     $_SESSION['user'] = $row[0]->username;
	     $_SESSION['name'] = $row[0]->fullname;
	     setcookie("id",$row[0]->userid, time()+(86000*30),"/");
	     ob_start();
	     header("Location:../home/");
	   }else{
	     $msg="Username or Password Wrong";
	     
}
}catch(PODException $e){
 echo $e->getMessage();
}
}
		}
		?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../../assets/ad/a/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../assets/ad/a/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../../assets/ad/a/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
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
        <a href=""><b><span class="glyphicon glyphicon-sunglasses"></span></b>Test Analysis</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Login Form</p>
        <?php 
        error_reporting(0);
        echo $emailError; 
        echo $msg;
        ?>
        <form  method="post">
          
          
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="user" placeholder="Username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
          
          
       
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="pass" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          
          
          <div class="row">
            
            <div class="col-xs-4">
              <input style="border-radius:3px 10px 3px 10px" type="submit" name="sub" class="btn btn-primary btn-block btn-flat" value="Login">
            </div><!-- /.col -->
          </div>
        </form>        

      <br>
        <a href="<?=urt(BASEPATH)?>?delcok=del" class="text-center">I want to Register..</a> ( Please clear COOKIES before Click on Registration Link )
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../../../assets/assets/ad/a/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../assets/ad/a/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../../assets/ad/a/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>