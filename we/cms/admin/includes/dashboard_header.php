<?php
 
$dataPoints = array( 
	array("x" => 1514485800000, "y" => array(54.15 ,54.55 ,53.65 ,53.85)),
	array("x" => 1514399400000, "y" => array(54.6 ,54.7 ,53.75 ,54.15)),
	array("x" => 1514313000000, "y" => array(55.4 ,55.5 ,54.05 ,54.85)),
	array("x" => 1513881000000, "y" => array(56 ,56.2 ,54.9 ,55.4)),
	array("x" => 1513794600000, "y" => array(54.85 ,56.15 ,54.6 ,56.05)),
	array("x" => 1513708200000, "y" => array(55.8 ,56 ,54.45 ,54.75)),
	array("x" => 1513621800000, "y" => array(56.5 ,56.5 ,55.65 ,55.75)),
	array("x" => 1513535400000, "y" => array(55.15 ,56.8 ,55.1 ,56.55)),
	array("x" => 1513276200000, "y" => array(55.35 ,55.4 ,54.75 ,55.1)),
	array("x" => 1513189800000, "y" => array(55.95 ,56.2 ,54.2 ,55.45)),
	array("x" => 1513103400000, "y" => array(53.75 ,56.5 ,53.7 ,55.9)),
	array("x" => 1513017000000, "y" => array(53.5 ,53.95 ,53 ,53.8)),
	array("x" => 1512930600000, "y" => array(53 ,53.1 ,52.15 ,52.65)),
	array("x" => 1512671400000, "y" => array(53.15 ,53.5 ,52.7 ,52.9)),
	array("x" => 1512585000000, "y" => array(52.7 ,53.45 ,52.6 ,52.85)),
	array("x" => 1512498600000, "y" => array(52.85 ,52.85 ,51.6 ,52.4)),
	array("x" => 1512412200000, "y" => array(52.45 ,53.45 ,52.1 ,53.25)),
	array("x" => 1512325800000, "y" => array(52.4 ,53.8 ,52.2 ,52.65)),
	array("x" => 1512066600000, "y" => array(52.5 ,52.95 ,51.85 ,51.95))
)
 
?>



<?php ob_start(); ?>
<?php session_start() ?>

<?php
include "../includes/db.php";?>
<?php
include "../admin/functions.php";?>


<!DOCTYPE html>
<html lang="en">  
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    <script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Stock Price - December 2018"
	},
	subtitles: [{
		text: "Holdings in North America"
	}],
	axisX: {
		valueFormatString: "DD MMM"
	},
	axisY: {
		includeZero: false,
		suffix: " kr"
	},
	data: [{
		type: "candlestick",
		xValueType: "dateTime",
		yValueFormatString: "#,##0.0 kr",
		xValueFormatString: "DD MMM",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

</head>


<body>