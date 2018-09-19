<?php
session_start();
include "../../libs/datetime/index.php";
if(!isset($_SESSION['id'])){
  header("Location: ../login/");
}
$id = $_SESSION['id'];
$username = $_SESSION['user'];
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
		<h1 class="text-center" style="color:#000;">Students Data</h1>
	    <center><h4>Admin Pannel</h4></center>
	</div>
	<div class="container">
	 <h4><a href="../logout/">LOGOUT</a></h4>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group col-lg-12 col-md-12 col-xs-12">
				<div class="text-success" id="message"></div>
				<br>

			<div class="row">
				<div class="col-md-10 col-lg-10 col-xs-10 col-sm-10" style="padding-right:20px">
					<div id="search">
					   <label>Search :</label>
					   <input type="search" id="sch" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div>
			<div id="schdata" class="table-responsive"> </div>
			</div>
			<br>
			</div>
			<h2>Students Data: </h2>
			<div id="data" class="table-responsive"> </div>
		</div>
	</div>
<script src="../../../assets/ad/a/plugins/jQuery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	   $(document).ready(function(){
	    setInterval(function(){
	    $.ajax({
	       url:"../../core/studentData.php",
	       type:"GET",
	       success:function(data){
	         $("#data").html(data);
	       }
	     })},200);
	     
	     $('#sch').keyup(function(){
	       var name = $("#sch").val();
	       search(name);
	     });
	     
	     $("#sch").blur(function(){
	       $.ajax({
	       url:"../../core/edit.php",
	       type:"POST",
	       success:function(data){
	        $("#schdata").html(data);
	       }
	       });
	     });
	     
	     function search(name){
	      $.ajax({
	       url:"../../core/search3.php",
	       type:"POST",
	       data:{'name':name},
	       success:function(data){
	       $("#schdata").html(data);
	      }
	     });
	     }
});
	</script>
<script type="text/javascript" src="../../../assets/ad/a/bootstarp/js/tether/tether.js"></script>
<script type="text/javascript" src="../../../assets/ad/a/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../assets/mainfile/insertCategory.js"></script>
</body>
</html>