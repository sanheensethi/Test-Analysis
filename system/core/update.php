<?php
include "../libs/db/pdo.php";
include "../libs/datetime/index.php";
include "../libs/secure/index.php";

$testid=$_POST['testid'];
$id=$_POST['id'];
$testname=$_POST['testname'];
$total=$_POST['total'];
$attempt=$_POST['attempt'];
$right=$_POST['right'];
$wrong=$_POST['wrong'];
$blank=$_POST['blank'];
$date=$_POST['date'];


if($testname!="" && $total!="" && $attempt!="" && $right!="" && $wrong!="" && $blank!=""){
if($attempt <= $total && $blank <= $total && 
   $right <= $attempt && $wrong <= $attempt &&
   $total == $blank+$attempt && $attempt == $right+$wrong){

 /* attempt % */ $attper = ($attempt/($total))*100;
 /* blank % */ $blkper = ($blank/($total))*100;
 /* right % */ $rightper = ($right/($attempt))*100;
 /* wrong % */ $wrongper = ($wrong/($attempt))*100;
 $datas = [$attper,$blkper,$rightper,$wrongper];
 $per=[];
 foreach($datas as $data){
  $per[] = round($data,2);
 }
 //var_dump($per);
 try{
 // echo "UPDATE datapoints SET total_ques=".$total.",attempt=".$attempt.",blank=".$blank.",rht=".$right.",wrong=".$wrong.",testname='".$testname."',date='".$date."' WHERE testid=".$testid;
  $stmt = $db->prepare("UPDATE datapoints SET total_ques=".$total.",attempt=".$attempt.",blank=".$blank.",rht=".$right.",wrong=".$wrong.",testname='".$testname."',date='".$date."' WHERE testid=".$testid);
  $stmt2 = $db->prepare("UPDATE datapoints SET rightper=:rtp, wrongper=:wrp ,attemptper=:atp,blankper=:blp WHERE testid=:tid");
  $values1=[':tt'=>$total,
           ':at'=>$attempt,
           ':bl'=>$blank,
           ':rt'=>$right,
           ':wr'=>$wrong,
           ':tn'=>$testname,
           ':dt'=>$date,
           ':tid'=>$testid];
   $values2=[
           ':rtp'=>$per[2],
           ':wrp'=>$per[3],
           ':atp'=>$per[0],
           ':blp'=>$per[1],
           ':tid'=>$testid
   ];
  //var_dump($values1);
  //var_dump($values2);
  if($stmt->execute($values1) && $stmt2->execute($values2)){
   echo "<span class='text-success'>Datapoints Updation Done.</span>";
  }else{
   echo "<span class='text-success'>Datapoints Updation Failed.</span>";
  }
 }catch(PDOException $e){
   echo $e->getMessage();
 }
}else{
 echo "<span class='text-danger'>Data Incorrect Please Check again</span>";
}
}else{
 echo "<span class='text-danger'>Please fill full details !</span>";
}
?>