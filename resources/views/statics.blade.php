@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html>
<head>
<script>

function myFunction()
{

var chartType = $('#chart').val();    

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Orders"
	},
	data: [{
		type: chartType,
		startAngle: 240,
		yValueFormatString: "##0\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}



</script>
</head>
<body>
	<div class="container">
		<div class="text-end">
			<a href="/admin/home" class="btn btn-danger">Go Back</a>
		</div>
	</div>

    <label for="chats" class="ms-3">Select Chart Style</label>
	
    <select name="chart" id="chart" onchange= "myFunction()" style="width:120px;">
        <option value="">Select Type</option>
        <option value="pie">Pie</option>
        <option value="column">Column</option>
        <option value="pyramid">Pyramid</option>
        <option value="bar">Bar</option>
    </select>
	<div class="container">
	   <div id="chartContainer" style="height: 400px; width: 100%;"></div>
	</div>

	<div class="text-center">
	<a href="export-csv" class="btn btn-info" >Export</a>
	</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
@endsection