<?php
session_start();
include "../../libs/datetime/index.php";
/*if(!isset($_SESSION['id'])){
  header("Location: ../login/");
}*/
$id = $_SESSION['id'];
$username = $_SESSION['user'];
$fullname = $_SESSION['name'];
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
	 <h3><a href="../logout/">LOGOUT</a></h3>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group col-lg-12 col-md-12 col-xs-12">
				<div class="text-success" id="message"></div>
				<br>
				<label>Test Name: </label>
				<input type="text" id="testname" class="form-control" placeholder="Test Name ..." required>
			</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Total: </label>
					<input type="number" id="total" class="form-control" placeholder="Total ..." required>
				</div>
				<input type="hidden" id="id" value="<?= $id; ?>">
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Attempt: </label>
					<input type="number" id="attempt" class="form-control" placeholder="Attempt ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Blank: </label>
					<input type="number" id="blank" class="form-control" placeholder="Blank ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Right : </label>
					<input type="number" id="right" class="form-control" placeholder="Right ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
					<label>Wrong : </label>
					<input type="number" id="wrong" class="form-control" placeholder="Wrong ..." required>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-xs-4">
				<label>Date : </label>
				<input type="date" id="date" class="form-control" placeholder="" required>
				</div>
				</div>
				<div class="container">
				<div class="form-group" style="margin:10px">
					<input type="submit" id="insert" class="btn btn-success" style="outline:none;" value="Insert">
					<a href="../Graph"><input type="submit" id="graph" class="btn btn-danger" style="outline:none;" value="Build Graph"></a>
				</div>
				
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
			<h2>DataPoints : </h2>
			<div id="data" class="table-responsive"> </div>
		</div>
	</div>

<script src="../../../assets/ad/a/plugins/jQuery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	   $(document).ready(function(){
	     var id = $("#id").val();
	    
	    setInterval(function(){
	    $.ajax({
	       url:"../../core/data.php",
	       type:"POST",
	       data:{'id':id},
	       success:function(data){
	         $("#data").html(data);
	       }
	     })},200);
	     
	     $('#sch').keyup(function(){
	        var id = $("#id").val();
	        var testname = $("#sch").val();
	        search(id,testname);
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
	     
	     function search(id,testname){
	      $.ajax({
	       url:"../../core/search.php",
	       type:"POST",
	       data:{'id':id,'testname':testname},
	       success:function(data){
	       $("#schdata").html(data);
	      }
	     });
	     }
	    
	     
	     $("#insert").click(function(){
	       var id = $("#id").val();
	       var testname = $('#testname').val();
	       var total = $('#total').val();
	       var attempt = $('#attempt').val();
	       var right = $('#right').val();
	       var wrong = $('#wrong').val();
	       var blank = $('#blank').val();
	       var dt = $('#date').val();
	           $.ajax({
	                url:"../../core/insert.php",
	                type:"POST",
	                data:{'id':id,'testname':testname,'total':total,'date':dt,'attempt':attempt,'right':right,'wrong':wrong,'blank':blank},
	                success:function(data){
	                $("#message").html(data);}
	                });
	               });
	               
 $(document).on('click', '#tsh', function(e){
 
 var id = $(this).data('id');
 del(id);
 e.preventDefault();
 });
   
    function del(id){
      swal({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
       aj(id);
      swal("Poof! DataPoint Deleted", {
      icon: "success",
      });
      } else {
      swal("It's Safe!");
      }
      });
    }
 
 function aj(id){
  $.ajax({
   url: "../../core/deleteData.php",
   type:"POST",
   data:{'id':id},
   success:function(e){
    $("#message").html(e);
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