



<?php


 $query = "SELECT * FROM properties";
                    $select_stocks = mysqli_query($connection,$query);
                    
                    $name_array[] = array();
                    $all_all_data_points[] = array() ;

                    while($row = mysqli_fetch_assoc($select_stocks)){
                    $all_data_points[] = array() ;
                    

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

                    $Rfwd = $Pfwd / $P60 -1;


                    //$R60_6 = $P60 / $P60_6 -1;
                    //$R60 = $P60 / $P60_12 -1;
                    //    
                    //$R60_6 = round($R60_6,2); 
                    //$R60 = round($R60,2); 

                    $Rfwd_adjusted = ((($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd))<0)?0:(($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd));

                    $delta_E = $Efwd - $Ettm;


                    $PEG = (($P60/($delta_E * 100))<0)?10:$P60/($delta_E * 100);



                    $PE_fwd = ($P60/($Efwd)<0) ? 200 : $P60/$Efwd;


                    $SR_fwd = ((($Rfwd_adjusted-0.0225)/($SDfwd))<0)?0:(($Rfwd_adjusted-0.0225)/($SDfwd));

                    $SR_fwd2DD = -1 * $SR_fwd / $MaxDD; 
                    $SR_fwd2PEG = (($SR_fwd / $PEG)<0)?0: $SR_fwd2PEG = $SR_fwd / $PEG;

                    $MARF_fwd = -1 * $Rfwd_adjusted / $MaxDD;

                    //dataPoints1 -- SR / MaxDD 
                    $dataPoints1 = array("x" => $PEG, "y" => $SR_fwd);
                    array_push($all_data_points,$dataPoints1);
                    array_push($all_all_data_points,$all_data_points);
                    array_push($name_array,$symbol);   

                    }

                  
//                    $all_data_points = json_encode($all_data_points);
?>


<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1",
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
                
        <?php       

               $row_n = 0;
               $row_length = count($name_array)-1;
               while ($row_n<$row_length){
                   $symbol_n = $name_array[$row_n+1];
                     echo "{" . 
                     "type: 'scatter'" . "," .
                     "toolTipContent: '<span style=\'color:#4F81BC \'><b>{name}</b></span><br/><b> SR_fwd:</b> {x} <br/><b> PEG:</b></span> {y} '" . "," . 
                     "name: '{$symbol_n}'," . 
                     "markerType: 'circle',". 
                     "showInLegend: false," . 
                     "dataPoints: ". json_encode($all_all_data_points[$row_n]) . 
                        
                     "}," ;
                   $row_n ++;
                
               }

      
         
         ?>

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