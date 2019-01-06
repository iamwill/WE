
<?php


 $query = "SELECT * FROM properties";
                    $select_stocks = mysqli_query($connection,$query);
                    
                    $name_array[] = array();
                    $all_data_points_risk1[] = array() ;
                    $all_data_points_risk2[] = array() ;
                    $all_data_points_risk3[] = array() ;
                    $all_data_points_risk4[] = array() ;
                    $all_data_points_index1[] = array() ;
                    $all_data_points_index2[] = array() ;

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
                        
                        
                    // get the index first
                    if($symbol === "SPY"){
                    $dataPoints_index1 = array("x" => $PEG, "y" => $SR_fwd);
                    $dataPoints_index12 = array("x" => 0, "y" => 0);
                    array_push($all_data_points_index1,$dataPoints_index1);
                    array_push($all_data_points_index1,$dataPoints_index12);
                    }
                        
                    if(strpos($symbol, 'IWD') !== false){
                    $dataPoints_index2 = array("x" => $PEG, "y" => $SR_fwd);
                    $dataPoints_index22 = array("x" => 0, "y" => 0);
                    array_push($all_data_points_index2,$dataPoints_index2);
                    array_push($all_data_points_index2,$dataPoints_index22);
                    }

                    //dataPoints1 -- SR / MaxDD 
                    if($PEG < 3){
                    $dataPoints1 = array("name"=>$symbol,"x" => $PEG, "y" => $SR_fwd, "z" => $SR_fwd/$PEG);
                    array_push($all_data_points_risk1,$dataPoints1);
                    }
                    
                    if(-1 * $MaxDD < 0.4){
                    $dataPoints2 = array("name"=>$symbol,"x" => -1 * $MaxDD, "y" => $SR_fwd, "z" => $SR_fwd2DD);
                    array_push($all_data_points_risk2,$dataPoints2);
                    
                    }
                        
                    $dataPoints3 = array("name"=>$symbol,"x" => $SDfwd, "y" => $Rfwd_adjusted, "z" => $SR_fwd);
                    array_push($all_data_points_risk3,$dataPoints3);  
                        
                     $dataPoints4 = array("name"=>$symbol,"x" => -1 * $MaxDD, "y" => $Rfwd_adjusted, "z" => $MARF_fwd);
                    array_push($all_data_points_risk4,$dataPoints4);  
                    
                        
                    }

                  
//                    $all_data_points = json_encode($all_data_points);
?>


<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title:{
		text: "SHARPE RATIO FWD / PEG"
	},
	axisX: {
		title:"PEG"
	},
	axisY:{
		title: "SR_fwd"
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
                
        <?php       

              
                     echo "{" . 
                     "type: 'bubble'" . "," .
                     " toolTipContent: '<b>{name}</b><br><b>PEG: </b> {x}<br><b>SR_fwd: </b>{y}<br><b>SR_fwd/PEG :</b>{z} '," . 
//                     "markerType: 'square',". 
                     "markerSize: 20," . 
                     "dataPoints: ". json_encode($all_data_points_risk1) . 
                        
                     "}," ;
         
         ?>

	]
});
 
    
    
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title:{
		text: "SHARPE RATIO FWD / MAX_DD"
	},
	axisX: {
		title:"MAX_DD"
	},
	axisY:{
		title: "SR_fwd"
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
                
        <?php                
                     echo "{" . 
                     "type: 'bubble'" . "," .
                     " toolTipContent: '<b>{name}</b><br><b>MAX_DD: </b> {x}<br><b>SR_fwd: </b>{y}<br><b>SR_fwd/PEG :</b>{z} '," . 
//                     "markerType: 'square',". 
                     "markerSize: 20," . 
                     "dataPoints: ". json_encode($all_data_points_risk2) . 
                        
                     "}," ;       
         ?>
        
//         <?php                
//                     echo "{" . 
//                     "type: 'line'" . "," .
//                     "dataPoints: ". json_encode($all_data_points_index1) . 
//                        
//                     "}," ;       
//         ?>
//        
//               <?php                
//                     echo "{" . 
//                     "type: 'line'" . "," .
//                     "dataPoints: ". json_encode($all_data_points_index2) . 
//                        
//                     "}," ;       
//         ?>

	]
});  

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	title:{
		text: "R_fwd / SD_fwd "
	},
	axisX: {
		title:"SD_fwd"
	},
	axisY:{
		title: "R_fwd"
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
                
        <?php       

              
                     echo "{" . 
                     "type: 'bubble'" . "," .
                     " toolTipContent: '<b>{name}</b><br><b>SD_fwd: </b> {x}<br><b>R_fwd: </b>{y}<br><b>SR_fwd :</b>{z} '," . 
//                     "markerType: 'square',". 
                     "markerSize: 20," . 
                     "dataPoints: ". json_encode($all_data_points_risk3) . 
                        
                     "}," ;
         
         ?>

	]
});   
    
    
var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	title:{
		text: "MARF_f= Rfwd / DD "
	},
	axisX: {
		title:"MAX_DD"
	},
	axisY:{
		title: "R_fwd"
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
                
        <?php       

              
                     echo "{" . 
                     "type: 'bubble'" . "," .
                     " toolTipContent: '<b>{name}</b><br><b>MAX_DD: </b> {x}<br><b>R_fwd: </b>{y}<br><b>MARF_f :</b>{z} '," . 
//                     "markerType: 'square',". 
                     "markerSize: 20," . 
                     "dataPoints: ". json_encode($all_data_points_risk4) . 
                        
                     "}," ;
         
         ?>

	]
});   
    

    
chart.render();
chart2.render();
chart4.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
    chart2.render();
    chart3.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<div id="chartContainer4" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                       