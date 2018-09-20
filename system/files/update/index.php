<?php
session_start();
include "../../libs/datetime/index.php";
include "../../libs/db/pdo.php";
if(!isset($_SESSION['id'])){
  header("Location: ../login/");
}
$id = $_SESSION['id'];
$username = $_SESSION['user'];
$fullname = $_SESSION['name'];
$testid = $_GET['id'];

try{
 $stmt = $db->prepare("SELECT * FROM datapoints WHERE testid=".$testid);
 $stmt->execute();
 $results = $stmt->fetchAll(PDO::FETCH_OBJ);
 $tq = $results[0]->total_ques;
 $attempt = $results[0]->attempt;
 $blank = $results[0]->blank;
 $right = $results[0]->rht;
 $wrong = $results[0]->wrong;
 $testname = $results[0]->testname;
 $date2 = $results[0]->date;
}catch(PDOException $e){
 echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Insert Category</title>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html;" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../../assets/ad/a/bootstrap/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../assests/mainfile/style.css">
<link rel="stylesheet" href="../../../sweet/assets/swal2/sweetalert2.min.css" type="text/css" />
</head>
<body>
	<div class="jumbotron bg-danger">
		<h1 class="text-center" style="color:#000;">Insert Points</h1>
	    <center><h3><span class="text-danger">User :<?= $fullname; ?></span><br>
	    <span class="text-danger">username :<?= $username; ?></span></h3></center>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group col-lg-12 col-md-12 col-xs-12">
				<div class="text-success" id="message"></div>
				<br>
				<label>Test Name: </label>
				<input type="text" value="<?= $testname; ?>" id="testname" class="form-control" placeholder="Test Name ..." required>
			</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Total: </label>
					<input type="number" value="<?= $tq; ?>" id="total" class="form-control" placeholder="Total ..." required>
				</div>
				<input type="hidden" id="id" value="<?= $id; ?>">
				<input type="hidden" id="testid" value="<?= $testid; ?>">
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Attempt: </label>
					<input type="number" value="<?= $attempt; ?>" id="attempt" class="form-control" placeholder="Attempt ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Blank: </label>
					<input type="number" value="<?= $blank; ?>" id="blank" class="form-control" placeholder="Blank ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Right : </label>
					<input type="number" value="<?= $right; ?>" id="right" class="form-control" placeholder="Right ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Wrong : </label>
					<input type="number" value="<?= $wrong; ?>" id="wrong" class="form-control" placeholder="Wrong ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
				<label>Date : </label>
				<input type="date" value="<?= $date2; ?>" id="date" class="form-control" placeholder="" required>
				</div>
				</div>
				<div class="container">
				<div class="form-group" style="margin:10px">
					<input type="submit" id="update" class="btn btn-success" style="outline:none;" value="Update">
				</div>
				<br><br>
<script src="../../../assets/ad/a/plugins/jQuery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	   $(document).ready(function(){
	     
	     $("#update").click(function(){
	       var id = $("#id").val();
	       var testid = $("#testid").val();
	       var testname = $('#testname').val();
	       var total = $('#total').val();
	       var attempt = $('#attempt').val();
	       var right = $('#right').val();
	       var wrong = $('#wrong').val();
	       var blank = $('#blank').val();
	       var dt = $('#date').val();
	           $.ajax({
	                url:"../../core/update.php",
	                type:"POST",
	                data:{'id':id,'testid':testid,'testname':testname,'total':total,'date':dt,'attempt':attempt,'right':right,'wrong':wrong,'blank':blank},
	                success:function(data){
	                   $("#message").html(data);
	                    setInterval(function(){
	                    window.location.href='../home/';
	                    },1000);
	                  }
	                });
	               });
	               
	           $('#attempt').keyup(function(){
	           var total = $('#total').val();
	           var attempt = $('#attempt').val();
	           $('#blank').val();
	           });
	           
	           $('#right').keyup(function(){
	           var attempt = $('#attempt').val();
	           var right = $('#right').val();
	           $('#wrong').val(attempt-right);
	           });
    });
	</script>
<script type="text/javascript" src="../../../assets/ad/a/bootstarp/js/tether/tether.js"></script>
<script type="text/javascript" src="../../../assets/ad/a/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../assets/mainfile/insertCategory.js"></script>
</body>
</html>