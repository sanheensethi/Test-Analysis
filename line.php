<?php
  $dataPoints1 = array(
  array("label"=> "Date Hello",	"y"=> 17),
  array("label"=> date("d/M/Y",mktime(0,0,0,12,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,1,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,1,2017)),	"y"=> 19)
  );
  $dataPoints2 = array(
  array("label"=> "Date Hello ",	"y"=> 12),
  array("label"=> date("d/M/Y",mktime(0,0,0,11,1,2017)),	"y"=>25),
  array("label"=> date("d/M/Y",mktime(0,0,0,25,1,2017)), "y"=> 20),
  array("label"=> date("d/M/Y",mktime(0,0,0,2,1,2017)),	"y"=> 19)
  );
  $dataPoints3 = array(
  array("label"=> "Date Hello 26/4/2017",	"y"=> 16),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  array("label"=> date("d/M/Y",mktime(0,0,0,15,9,2017)), "y"=> 15),
  array("label"=> date("d/M/Y",mktime(0,0,0,18,13,2017)),	"y"=> 29),
  array("label"=> date("d/M/Y",mktime(0,0,0,1,1,2017)),	"y"=>18),
  );
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
	title:{
		text: "Monthly Test Analysis"
	},
	axisY:[{
		title: "Wrong",
		lineColor: "#C24642",
		tickColor: "#C24642",
		labelFontColor: "#C24642",
		titleFontColor: "#C24642",
		suffix: "%"
	},
	{
		title: "Right",
		lineColor: "#369EAD",
		tickColor: "#369EAD",
		labelFontColor: "#369EAD",
		titleFontColor: "#369EAD",
		suffix: "%"
	}],
	axisY2: {
		title: "Attempt",
		lineColor: "#7F6084",
		tickColor: "#7F6084",
		labelFontColor: "#7F6084",
		titleFontColor: "#7F6084",
		prefix: "",
		suffix: "%"
	},
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
	}]
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
</head>
<body>
<div id="chartContainer" style="height: 370px; width: auto; margin: 0px auto;"></div>
<script src="assets/Graph/canvasjs.min.js"></script>
</body>
</html>