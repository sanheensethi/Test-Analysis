<?php
include "../libs/db/pdo.php";
include "../libs/datetime/index.php";
include "../libs/secure/index.php";

$id=$_POST['id'];
$testname=$_POST['testname'];
$total=$_POST['total'];
$attempt=$_POST['attempt'];
$right=$_POST['right'];
$wrong=$_POST['wrong'];
$blank=$_POST['blank'];
$date=$_POST['date'];
 if($attempt <= $total && $blank <= $total && 
 $right <= $attempt && $wrong <= $attempt &&
 $total == $blank+$attempt && $attempt == $right+$wrong){
  $report = 1;
 }else{
  $report = 0;
 }
if($testname!="" && $total!="" && $attempt!="" && $right!="" && $wrong!="" && $blank!=""){
if($report){

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
  $stmt = $db->prepare("INSERT INTO datapoints VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $values=[$id,"",$total,$attempt,$blank,$right,$wrong,$testname,$date,$per[2],$per[3],$per[0],$per[1]];
  //var_dump($values);
  if($stmt->execute($values)){
   echo "<span class='text-success'>Datapoints Insertion Done.</span>";
  }else{
   echo "<span class='text-success'>Datapoints Insertion Failed.</span>";
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