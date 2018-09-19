<?php
    include '../../libs/db/pdo.php';
	include '../../libs/datetime/index.php';
	include '../../libs/secure/index.php';
	include '../../libs/url/index.php';
	$id = isset($_COOKIE['id']) ? $_COOKIE['id'] : header("Location: ../../../");
	if(isset($_POST['login'])){
	  $pass = $_POST['pass'];
	  try{
	     $query = $db->prepare("Select * from user where userid=".$id." && password='".$pass."'");
	     $query->execute();
	     $row = $query->fetchAll(PDO::FETCH_OBJ);
	     if($row){
	        session_start();
	        $_SESSION['id'] = $id;
	        $_SESSION['name'] = $row[0]->fullname;
	        $_SESSION['user'] = $row[0]->username;
	        header("Location:../home/");
	     }else{
	        $msg = "<span class='text-danger'>Wrong Password</span>";
	     }
	  }catch(PDOException $e){
	     echo $e->getMessage();
	  }
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Lockscreen</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../../assets/ad/a/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../assets/ad/a/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href=""><b>@</b>Test Analysis</a>
        <br>
       <? /*echo $msg;*/ ?>
      </div>
      <!-- User name -->
      <div class="lockscreen-name"><span style="color:red;" class="glyphicon glyphicon-fire"></span>&nbsp;<?php /*echo $ro3['fullname']; */?>&nbsp;<span style="color:red;" class="glyphicon glyphicon-fire"></span></div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
         <span class="glyphicon glyphicon-book"></span>
         <!-- <img src="../img/<?php echo "hello"; /* echo $ro2['pic'];*/ ?>" alt="user image"/>-->
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="post">
          <?php echo isset($msg) ? $msg : null; ?>
          <div class="input-group">
            <input type="password" name="pass" class="form-control" placeholder="password" required/>
            
            <div class="input-group-btn">
              <input name="login" type="submit" style="font-size:25px;" Value="🔭" class="btn"><!--<i class="fa fa-arrow-right text-muted"></i>-->
            </div>
            
          </div>
        
        </form><!-- /.lockscreen credentials -->

      </div><!-- /.lockscreen-item -->
      
      <div class="help-block text-center">
      To Register new user click here <span class="glyphicon glyphicon-hand-right"> &nbsp;</span><a href="<? urt(BASEPATH) ?>"><span style="color:red;" class="glyphicon glyphicon-scissors"></span></a><br>
        Enter your password to retrieve your session
      </div>
      <div class='text-center'>
        <a href="<?= urt(BASEPATH); ?>?delcok=1 ">Or sign in as a different user</a>
      </div>
      <div class='lockscreen-footer text-center'>
        Copyright &copy; 2017 <b><a href="http://sanheensethi.github.io" class='text-black'>Sanheen Sethi</a></b><br>
        All rights reserved
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.3 -->
    <script src="../../../assets/ad/a/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../assets/ad/a/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>