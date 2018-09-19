<?php
 $id = $_POST['id'];
 include "../libs/db/pdo.php";
 try{
  $stmt = $db->prepare('DELETE FROM datapoints WHERE testid='.$id);
  $stmt = $stmt->execute();
  if($stmt){
   echo "Done";
  }else{
   echo "failed";
  }
 }catch(PDOException $e){
   echo $e->getMessage();
 }