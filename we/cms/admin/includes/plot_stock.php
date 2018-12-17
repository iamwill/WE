<?php

$query = "SELECT * FROM properties";
$select_stocks = mysqli_query($connection,$query);

$all_data_points[] = array() ;


while($row = mysqli_fetch_assoc($select_stocks)){


    
$symbol =  $row['symbol'];
$Quantity =  $row['Quantity'];
$Price =  $row['Price'];
$Ettm =  $row['Ettm'];
$Efwd =  $row['Efwd'];
$Pfwd =  $row['Pfwd'];
$K =  $row['K'];
$MAR =  $row['MAR'];
$P60 =  $row['P60'];
$R60 =  $row['R60'];
$R60_6 =  $row['R60_6'];
$SD =  $row['SD'];
$SDfwd =  $row['SDfwd'];
$MARF =  $row['MARF'];
$MaxDD =  $row['MaxDD'];

$Rfwd = $Pfwd/$P60 -1;
    
$Rfwd_adjusted = ((($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd))<0)?0:(($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd));
        
    

    
$delta_E = $Efwd - $Ettm;

    
$PEG = (($P60/($delta_E * 100))<0)?10:$P60/($delta_E * 100);
$PEG = round($PEG,2);    

$PE_fwd = ($P60/($Efwd)<0) ? 200 : $P60/$Efwd;
$PE_fwd = round($PE_fwd,2);
    
$SR_fwd = ((($Rfwd_adjusted-0.0225)/($SDfwd))<0)?0:(($Rfwd_adjusted-0.0225)/($SDfwd));
$SR_fwd = round($SR_fwd,0);
    
$SR_fwd2DD = $SR_fwd / $MaxDD;
$SR_fwd2DD = round($SR_fwd2DD,2);   
$SR_fwd2PEG = (($SR_fwd / $PEG)<0)?0: $SR_fwd2PEG = $SR_fwd / $PEG;
$SR_fwd2PEG = round($SR_fwd2PEG,2); 

$MARF_fwd = $Rfwd_adjusted / $MaxDD;
$MARF_fwd = round($MARF_fwd,2); 

//dataPoints1 -- SR / MaxDD 
$dataPoints1 = array("x" => $PEG, "y" => $SR_fwd);
array_push($all_data_points,$dataPoints1);

}
 
?>



<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "SHARPE RATIO FWD / PEG"
	},
	axisX: {
		title:"SR_fwd"
	},
	axisY:{
		title: "PEG"
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
        
     {
		type: "scatter",
		toolTipContent: "<span style=\"color:#4F81BC \"><b>{name}</b></span><br/><b> SR_fwd:</b> {x} <br/><b> PEG:</b></span> {y} ",
		name: "Stocks",
		markerType: "square",
		showInLegend: true,
		dataPoints: <?php echo json_encode($all_data_points); ?>
	}

	]
});
 
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                       