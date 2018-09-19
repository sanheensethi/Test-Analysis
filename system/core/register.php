<?php
	include '../../system/libs/db/pdo.php';
	include '../../system/libs/datetime/index.php';
	include '../../system/libs/secure/index.php';
	  $fullname=$_POST['fn'];
	  $user=$_POST['user'];
	  $pass=$_POST['pass'];
	  $cpass=$_POST['cpass'];
	  $batch=$_POST['batch'];
		if($pass==$cpass){
		try{
		   $s = $db->prepare("SELECT count(*) FROM user Where username='".$user."'");
		   $s->execute();
		   $result = $s->setFetchMode(PDO::FETCH_OBJ); 
		   $error = intval($s->fetchColumn());
		   if($error >=1 ){
		     echo "<span class='text-danger'>Username Already Exists.</span>";
		   }else{
		      try{
		      $s = $db->prepare("INSERT INTO user VALUES (?,?,?,?,?)");
		      $values = ["",$fullname,$user,$pass,$batch];
		      //var_dump($values);
		      $s->execute($values);
		      echo "<span class='text-success'>Registerd Successfully</span>";
		      //$result = $s->setFetchMode(PDO::FETCH_OBJ); 
		      //var_dump($result);
		      }catch(PDOException $e){
		      echo "Error :-".$e->getMessage();
		      }
		   }
		}catch(PDOException $e){
		  echo $e->getMessage();
		}
	}else{
	  echo "</span class='text-danger'>Confirm Password Incorrect</span>";
	}