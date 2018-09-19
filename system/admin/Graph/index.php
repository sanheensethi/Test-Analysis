<?php
include "../../libs/db/pdo.php";
session_start();
$id = $_GET['id'];
try{
 $stmt = $db->prepare("SELECT testname,date,attemptper,blankper,rightper,wrongper from datapoints WHERE userid=".$id." ORDER BY date ASC");
 $stmt->execute();
 $result=$stmt->fetchAll(PDO::FETCH_OBJ);
 $rper=[];
 $wper=[];
 $aper=[];
 $bper=[];
 for($i=0;$i<count($result);$i++){
   $rper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->rightper];
   $wper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->wrongper];
   $aper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->attemptper];
   $bper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->blankper];
 }
 //var_dump($rper);
}catch(PDOException $e){
 echo $e->getMessage();
}

  if(!isset($_POST['plot'])){
  $dataPoints1 = $rper;
  $dataPoints2 = $wper;
  $dataPoints3 = $aper;
  $dataPoints4 = $bper;
  }else{
  $fdate = $_POST['fdate'];
  $tdate = $_POST['tdate'];
  try{
  $stmt = $db->prepare("SELECT testname,date,attemptper,blankper,rightper,wrongper from datapoints WHERE userid=".$id." AND ( date BETWEEN '".$fdate."' AND '".$tdate."') ORDER BY date ASC");
  $stmt->execute();
  $result=$stmt->fetchAll(PDO::FETCH_OBJ);
  $rper=[];
  $wper=[];
  $aper=[];
  $bper=[];
  for($i=0;$i<count($result);$i++){
  $rper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->rightper];
  $wper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->wrongper];
  $aper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->attemptper];
  $bper[$i]=["label"=>date("d/M/Y",strtotime($result[$i]->date))." ".$result[$i]->testname,'y'=>$result[$i]->blankper];
  }
  //var_dump($rper);
  $dataPoints1 = $rper;
  $dataPoints2 = $wper;
  $dataPoints3 = $aper;
  $dataPoints4 = $bper;
  }catch(PDOException $e){
  echo $e->getMessage();
  }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
   <!-- <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../../assets/ad/a/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../assets/ad/a/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../../assets/ad/a/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="jumbotron bg-success" style="background-color:#de5b5b;color:#fff">
   <center><h1><b><u>Graph :</u></b></h1></center>
  </div>
  <div id="chartContainer" style="height: 370px; width: auto; margin: 0px auto;"></div>

<br><br>
<div class="container">
<h3><a href="../home/">HOME</a> &nbsp;&nbsp; <a href="../logout/">LOGOUT</a></h3>
</div>
<div class="container">
<form method="post">
<div class="form-group col-lg-3 col-md-3 col-xs-3">
<label style="font-size:30px;">From : </label>
<input type="date" id="date" name="fdate" class="form-control" placeholder="" required>
</div>
<div class="form-group col-lg-3 col-md-3 col-xs-3">
<label style="font-size:30px;">To : </label>
<input type="date" id="date" name="tdate" class="form-control" placeholder="" required>
<br><input type="submit" id="submit" name="plot" class="btn btn-danger" placeholder="" value="PLOT">
</div>
</form>
<input type="hidden" id="id" value="<?= $id; ?>">
<div class="row">
	<div class="col-md-10 col-lg-10 col-xs-10 col-sm-10" style="padding-right:20px">
		<div id="search">
		   <h3>Search Tests :</h3>
		   <input type="search" id="sch" class="form-control">
		</div>
	</div>
</div>
<br>
<div>
<div id="schdata" class="table-responsive"> </div>
</div>
<h2>Tests : </h2>
<div id="data" class="table-responsive"> </div>
</div>
<script src="../../../assets/ad/a/plugins/jQuery/jquery.min.js"></script>
<script>
  $(document).ready(function(){
  var id = $("#id").val();
  
  setInterval(function(){
  $.ajax({
  url:"../../core/data2.php",
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
  url:"../../core/search2.php",
  type:"POST",
  data:{'id':id,'testname':testname},
  success:function(data){
  $("#schdata").html(data);
  }
  });
  }
  
  
 });
</script>
<script>
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
	zoomEnabled:true,
	animationEnabled:true,
	animationDuration:5000,
	exportEnabled:true,
	title:{
		text: "Test Analysis Graph"
	},
	axisY:[{
		title: "Wrong",
		lineColor: "#C24642",
		tickColor: "#C24642",
		maximum:100,
		minimum:0,
		interval:20,
		labelFontColor: "#C24642",
		titleFontColor: "#C24642",
		suffix: "%"
	},
	{
		title: "Right",
		lineColor: "#369EAD",
		tickColor: "#369EAD",
		maximum:100,
		minimum:0,
		interval:20,
		labelFontColor: "#369EAD",
		titleFontColor: "#369EAD",
		suffix: "%"
	}],
	axisY2:[{
		title: "Attempt",
		lineColor: "#7F6084",
		tickColor: "#7F6084",
		labelFontColor: "#7F6084",
		maximum:100,
		minimum:0,
		interval:20,
		titleFontColor: "#7F6084",
		prefix: "",
		suffix: "%"
	},
	{
	   title: "Blank",
	   lineColor: "#000",
	   tickColor: "#000",
	   maximum:100,
	   minimum:0,
	   interval:20,
	   labelFontColor: "#000",
	   titleFontColor: "#000",
	   prefix: "",
	   suffix: "%"
	}
	],
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "line",
		name: "Right",
		color: "#369EAD",
		showInLegend: true,
		axisYIndex: 1,
		dataPoints: <?php echo json_encode($dataPoints1,JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Wrong",
		color: "#C24642",
		axisYIndex: 0,
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2,JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Attempt",
		color: "#7F6084",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3,JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Blank",
		color: "#000",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints4,JSON_NUMERIC_CHECK); ?>
	},
	]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
<script src="../../../assets/Graph/canvasjs.min.js"></script>
</body>
</html>