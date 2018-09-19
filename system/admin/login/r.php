<?php
include("../function/f.php");
$conn=makeconnection();
if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		$sql="SELECT u_id,email,pass FROM u_login WHERE email='$email'";
		
		$res=mysqli_query($conn,$sql);
		
		$row=mysqli_fetch_array($res);
		
		$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
	
		if( $count == 1 && $row['pass']==$pass) {
		session_start();
		$_SESSION['u'] = $row['u_id'];
		
	echo "<script>window.location='../home/'</script>";
		} else {
		echo "Incorrect Credentials, Try again...";
		}
		}
		
		?>
<form method="post">

            	<input type="email" name="email" class="form-control" placeholder="Your Email" maxlength="40" />
                
            
            
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                
            
            
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
           
            
            <div class="form-group">
            	<a href="regis.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>