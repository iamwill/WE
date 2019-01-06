<?php 
$r_score =  $_COOKIE["risk_score_t"];
$r_score_a =  $_COOKIE["risk_score_a"];
$name =  $_COOKIE["client_name"];

if ($r_score_a<=19.33){
    $risk_level = 1;
} else if($r_score_a<=40){
     $risk_level = 2;
} else if($r_score_a<=50){
     $risk_level = 3;
} else if($r_score_a<=58){
     $risk_level = 4;
} else{
     $risk_level = 5;
}

?>



<?php
 
$dataPoints = array( 
	array("label"=>"Your Adjusted Risk Score", "symbol" => "score_adjusted","y"=>$r_score_a),
	array("label"=>"Your Risk Score", "symbol" => "score","y"=>$r_score),
	array("label"=>"O", "symbol" => "O","y"=>100 - $r_score-$r_score_a),
	 
)
 
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Survey Result</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->



<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Your Risk Profile"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 




<style>
  #backButton {
	border-radius: 4px;
	padding: 8px;
	border: none;
	font-size: 16px;
	background-color: #2eacd1;
	color: white;
	position: absolute;
	top: 10px;
	right: 10px;
	cursor: pointer;
  }
  .invisible {
    display: none;
  }
    
    #c_con {
        margin-top: 100px;
        font-size: 50px;
        text-align: center;
        font-family:cursive;
    }
    
    #emp {

        font-size: 70px;
        color:  coral;
       
    }
    
    
    
</style>


</head>



<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
		
		
		
		
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
		
 <div id="c_con"> Your are in Risk Level <span id="emp"><?php echo $risk_level?></span>! </div>
		
	</div>

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>
