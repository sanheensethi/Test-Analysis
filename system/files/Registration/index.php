<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../assets/ad/a/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/ad/a/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../assets/ad/a/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
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
        <?php 
        error_reporting(0);
        echo $emailError; 
        echo $msg;
        ?>
        <form  method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="n" placeholder="Full name"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="e" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
          <select style="width:20%; height:32px;width:60px; background-color:transparent;" name="d" required>
          <?php
          for($i=1;$i<=31;$i++)
          {
          echo "<option style='' value='$i' >$i</option>";
          }
          ?>
          </select>
          
          <select style="width:20%;height:32px;width:60px; background-color:transparent;" name="mt" required>
          <?php
          for($i=1;$i<=12;$i++)
          {
          if($i==1){$mn="Jan";}
          if($i==2){$mn="Feb";}
          if($i==3){$mn="Mar";}
          if($i==4){$mn="Apr";}
          if($i==5){$mn="May";}
          if($i==6){$mn="Jun";}
          if($i==7){$mn="Jul";}
          if($i==8){$mn="Aug";}
          if($i==9){$mn="Sep";}
          if($i==10){$mn="Oct";}
          if($i==11){$mn="Nov";}
          if($i==12){$mn="Dec";}
          echo "<option style='' value='$i'>$mn</option>";
          }
          ?>
          </select>
          
          <select style="width:20%;height:32px;width:60px; background-color:transparent;" name="y" required>
          <?php
          for($i=1950;$i<=date("Y");$i++)
          {
         
          echo "<option value='$i'>$i</option>";
          }
          ?>
          </select>
          
          <span class="glyphicon glyphicon-baby-formula form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
          <select style="width:100%; height:32px;width:60px; background-color:transparent;" name="g" required>
          <option value="King">KING</option>
          <option value="Queen">QUEEN</option>
          </select>
         <span class="form-control-feedback"> <span class="glyphicon glyphicon-king"></span>/<span class="glyphicon glyphicon-queen"></span></span>
          </div>
       
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="p" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="cp" placeholder="Retype password"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          
          
          <div class="row">
            
            <div class="col-xs-4">
              <input style="border-radius:3px 10px 3px 10px" type="submit" name="sub" class="btn btn-primary btn-block btn-flat" value="Register">
            </div><!-- /.col -->
          </div>
        </form>        

      <br>
        <a href="../login/" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../assets/ad/a/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../assets/ad/a/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../assets/ad/a/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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