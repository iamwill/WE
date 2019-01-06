



<?php 

$r_score =  $_COOKIE["risk_score_t"];
$r_score_a =  $_COOKIE["risk_score_a"];
$name =  $_COOKIE["client_name"];

if ($r_score_a<=19.33){
    $risk_level = "I";
} else if($r_score_a<=40){
     $risk_level = "II";
} else if($r_score_a<=50){
     $risk_level = "III";
} else if($r_score_a<=58){
     $risk_level = "IV";
} else{
     $risk_level = "V";
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
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="Colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Typo</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
		
		<link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
		
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
        font-size: 40px;
        text-align: center;
        font-family: 'Titan One', cursive;;
        font-color:white;
    }
    
    #emp {

        font-size: 50px;
        color:  coral;
       
    }
    
    h3{
        font-family: 'Exo', sans-serif;
    }
    
    
    
</style>


		
		
		
	</head>
	<body>
		<div class="main-wrapper-first">
			<div class="hero-area relative">
				<header>
					<div class="container">
						<div class="header-wrap">
							<div class="header-top d-flex justify-content-between align-items-center">
								<div class="logo">
									<a href="../../../index.php">WealthEnigne</a>
								</div>
								<div class="main-menubar d-flex align-items-center">
									<nav class="hide">
										<a href="../../../index.php">Home</a>
									
									</nav>
									<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
								</div>
							</div>
						</div>
					</div>
				</header>
				
				<div class="banner-area">
					<div class="overlay hero-overlay-bg"></div>
					<div class="container">
					
						<div class="row height align-items-center justify-content-center">
							<div class="col-lg-7">
								<div class="banner-content text-center">
								
								
									<div id="c_con"> Your are in Risk Level <span id="emp"><?php echo $risk_level?></span>! </div>
									
									
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="main-wrapper">
		
		
			<!-- Start Feature Area -->
			<section class="feature-area pt-90 pb-90">
				<div class="container">
					<div class="row h-100 justify-content-end align-items-center">
						<div class="col-lg-8 col-md-8 single-feature">
							<h2>Thank you for taking our survey!</h2>
							<p>
								

This risk tolerance survey is just one measure of an investor’s or entrepreneur’s willingness to engage in behavior where the outcomes are both uncertain and potentially negative. We use  your risk score to tailor Boot Camp to match your risk appetite. The risk score drives decisions and optimization for the Wealth Engine portfolio analyzer to fit your tolerance.

							</p>
							
						</div>
						
						<div class="col-lg-4 col-md-4 single-feature">
							<img class="img-fluid" src="assets/welogo.png" alt="">
						</div>
					</div>
				</div>
			</section>
			<!-- End Feature Area -->
			
				<!-- Start About Bottom Area -->
			<section class="about-bottom-area">
				<div class="container-fluid">
					<div class="row h-100 justify-content-start align-items-center" style="margin-bottom:50px">
						<div class="col-lg-6 about-left pt-30 pb-30">
							<div class="single-desc">
								<span class="icon lnr lnr-rocket"></span>
								<h2>Risk Survey Description</h2>
								<p>
									The average score is 50, with a standard deviation of 6.40.The maximum score is 100.We divide the scores into five quintiles(I,II,III,IV or V):

								</p>
								
							</div>
						</div>	
						<div class="col-lg-6 about-right pt-30 pb-30">
							<div class="single-desc">
								
								<button class="primary-btn hover d-inline-flex align-items-right"><span class="mr-10">Learn More</span><span class="lnr lnr-arrow-right"></span></button>
							</div>
						</div>
						
					</div>
				</div>
			</section>
		
		
			<!-- Start About Top Area -->
			<section class="about-top-area">
				<div class="container-fluid">
					<div class="row h-100 justify-content-start align-items-center">
						<div class="col-lg-12 about-left">
							<div class="overlay overlay-bg"></div>
							
							
						
							<div id="chartContainer" style="height: 370px; width: 100%;"></div>
							
<!--							<img class="img-fluid" src="img/about.jpg" alt="">-->
							
					
							
						</div>
						
<!--
						<div class="col-lg-6 about-right pt-30 pb-30">
							<div class="single-desc">
								<span class="icon lnr lnr-rocket"></span>
								<h2>I -Score of 20 or less, <span style="font-color:bold">low risk tolerances </span>                                                                 maximize (1/SD)
</h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
							</div>
							<div class="single-desc">
								<span class="icon lnr lnr-sun"></span>
								<h2>Becoming A Dvd Repair Expert Online</h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
							</div>
						</div>
-->
					</div>
				</div>
			</section>
			<!-- End About Top Area -->
		
		
		
			<!-- End About Bottom Area -->
			<!-- Start Precess Area -->
			<section class="process-area pt-90 pb-90">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 single-process">
							
							<h3>Risk Level I -- Low risk tolerances</h3>
							<h2> Score of 20 or less</h2>
							<p>
								Risk Adverse , desire to preserve capital.
							</p>
							
						</div>
						<div class="col-lg-4 single-process">
						<br>
							<br>
							<h2>maximize (1/SD)</h2>			
				        </div>
				        
						<div class="col-lg-8 single-process">
				
							<h3>Risk Level II -- Moderate-low risk tolerances</h3>
							<h2>Score between 20 and 40</h2>
							<p>
								Somewhat Risk Adverse, desires good returns, but needs to limit loss(drawdowns) during market corrections or recessions.
							</p>
							
						</div>
						<div class="col-lg-4 single-process">
						<br>
							<br>
							<h2>maximize(SR/DD)</h2>			
				        </div>
								
						<div class="col-lg-8 single-process">
							
							<h3>Risk Level III -- Moderate risk tolerances</h3>
							<h2>Score between 40 and 60</h2>
							<p>
								Expects good returns, but wants growth at a reasonable cost/value trade off.

						
						</div>
						<div class="col-lg-4 single-process">
						<br>
							<br>
							<h2>maximize(R)</h2>			
				        </div>
				        
				        
				        <div class="col-lg-8 single-process">
					
							<h3>Risk Level IV -- Moderate-high risk tolerance</h3>
							<h2>Score between 60 and 80</h2>
							<p>
								Demands best possible returns for the amount of risk Involved. Expects optimum risk-adjusted returns. 
						</div>
						<div class="col-lg-4 single-process">
						<br>
							<br>
							<h2>maximize(SR)</h2>			
				        </div>
				        
				          <div class="col-lg-8 single-process">
						
							<h3>Risk Level V -- High risk tolerance</h3>
							<h2>Score above 80</h2>
							<p>
								Eager for fantastic returns; not too concerned about risk. Willing to sell short ,trade options or pursue “land-grab” business growth opportunities.
. 
						</div>
						<div class="col-lg-4 single-process">
						<br>
							<br>
							<h2>maximize(R)</h2>			
				        </div>
						
						
						
						
				
					</div>
				</div>
			</section>
			
			
	
			<!-- End Precess Area -->
			<!-- Start Newsletter Section -->
			<section class="newsletter-area pt-60 pb-60">
				<div class="container">
					<div class="row justify-content-center align-items-center">
						<div class="text-center">
							
							<p>Many successful entrepreneurs have moderate to high risk tolerances. Investors or entrepreneurs with lower scores tend to be cautious and are generally less aggressive in risky situations than those who have higher risk scores. Often, entrepreneurs are tolerant to risk,  scoring 50 or higher. However, many cautious investors and  entrepreneurs with lower scores have been very successful. 
</p>
<!--
							<div class="subcribe-form" id="mc_embed_signup">
								<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
										<input name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" type="email">
										<div style="position: absolute; left: -5000px;">
											<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
										</div>
										<button class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></button>
										<div class="info"></div>
								</form>
							</div>
							
-->
                    <br>
                    <p>No matter what your score is, please do not hesitate to contact us (by answering this email) about your company or investment strategy. We will help you FUND YOUR DREAM!
</p>
						</div>
					</div>
				</div>
			</section>
			
			
			
		
			
			
			
			<!-- Start Newsletter Section -->
			<footer class="section-gap footer-area">
				<div class="container">
<!--
					<div class="row pt-60 pb-60">
						<div class="col-lg-3 col-sm-6">
							<div class="single-footer-widget">
								<h6 class="text-uppercase mb-20">Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="single-footer-widget">
								<h6 class="text-uppercase mb-20">Navigation</h6>
								<ul class="footer-nav">
									<li><a href="#">Home</a></li>
									<li><a href="#">Main Features</a></li>
									<li><a href="#">Offered Services</a></li>
									<li><a href="#">Latest Portfolio</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="single-footer-widget">
								<h6 class="text-uppercase mb-20">Compare</h6>
								<ul class="footer-nav">
									<li><a href="#">Works &amp; Builders</a></li>
									<li><a href="#">Works &amp; Wordpress</a></li>
									<li><a href="#">Works &amp; Templates</a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="single-footer-widget">
								<h6 class="text-uppercase mb-20">About</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nam iusto ipsum error, ad expedita eveniet libero non magni, odit magnam. Fuga reiciendis iure neque, earum similique cum eligendi deleniti?
								</p>
							</div>
						</div>
					</div>
-->
				</div>
				<div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
						<p class="footer-text m-0">Copyright © 2019 All rights reserved   |   This site is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://wealth-engine.com">WealthEngine</a></p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
				</div>
			</footer>
		</div>
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/main.js"></script>
		<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</body>
	
	
</html>
