  <?php include "includes/form_header.php";?>
  <?php include "../includes/db.php";?>
  
  
  
  <?php
  
  if(isset($_POST['submit_survey'])){
    
     $score_1 = $_POST['q1'];
     $score_2 = $_POST['q2'];
     $score_3 = $_POST['q3'];
     $score_4 = $_POST['q4'];
     $score_5 = $_POST['q5'];
     $score_6 = $_POST['q6'];
     $score_7 = $_POST['q7'];
     $score_8 = $_POST['q8'];
     $score_9 = $_POST['q9'];
     $score_10 = $_POST['q10'];
     $score_11 = $_POST['q11'];
     $score_12 = $_POST['q12'];
     $score_13 = $_POST['q13'];
     $score_14 = $_POST['q14'];
     $score_15 = $_POST['q15'];
     $score_16 = $_POST['q16'];
     $score_17 = $_POST['q17'];
     $score_18 = $_POST['q18'];
     $score_19 = $_POST['q19'];
     $score_20 = $_POST['q20'];
  
      
      $score_t = $score_1 + $score_2 + $score_3 + $score_4 +  $score_5 + $score_6 + $score_7 + $score_8 +  $score_9 + $score_10 + $score_11 + $score_12 + $score_13 + $score_14 + $score_15 + $score_16
          +  $score_17 + $score_18 + $score_19 + $score_20;
      
      $name = $_POST['name'];
      $email = $_POST['email'];
      
//      $score_a = ($score_t<30) ? $score_t * 2/3 : (($score_t<44)?20*($score_t-30)/14+20 : (($score_t<=56)?20*($score_t-44)/12+40):($score_t==57)?53:(($score_t==58)?55:(($score_t==59)?58:(($score_t<=100)?$score_t:0))));
      
      if($score_t <= 30){
          $score_a = $score_t * 2/3;
      } else if($score_t<=44){
          $score_a = 20*($score_t-30)/14+20;
      } else if($score_t <=56){
          $score_a = 10*($score_t-44)/12+40;
      } else if($score_t == 57){
          $score_a = 53;
      } else if($score_t == 58){
          $score_a = 55;
      } else if($score_t == 59){
          $score_a = 58;
      } else if($score_t <=100){
          $score_a = $score_t;
      }
      
      $score_a = round($score_a,2);
      
      setcookie("risk_score_t", $score_t, time()+(86400 * 30));
      setcookie("risk_score_a", $score_a, time()+(86400 * 30));
      setcookie("client_name", $name, time()+(86400 * 30));
      
      
            
 $query = "INSERT INTO risk_profile(full_name, email, r_score, r_score_a) ";
    
    $query .= "VALUES('{$name}','{$email}','{$score_t}','{$score_a}' )";
    
    $create_profile = mysqli_query($connection,$query);
    
      
      header("Location: risk_score.php");
}

?>



<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
		
		
		
			<form class="contact100-form validate-form" method="post" enctype="multipart/form-data">
			
				<span class="contact100-form-title">
					Financial Risk Tolerance Assessment
				</span>
				
				
					

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">FULL NAME *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Phone</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
				</div>

				<div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 1. In general, how would your best friend describe you as a risk taker? </span>
				<span class="input100" style="text-align:right">  * Required </span>
					
					<div>
					
				
					
					
						<select class="js-select2" name="q1">
							<option>Please chooses</option>
							<option value="4">a. A real gambler </option>
							<option value="3">b. Willing to take risks after completing adequate research</option>
							<option value="2">c. Cautious </option>
							<option value="1">d. A real risk avoider </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
	
            	<div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 2. You are on a TV game show and can choose one of the following. Which would you take?  </span>
				<span class="input100" style="text-align:right">  * Required </span>
				
		
                
                        
              

					
					<div>
					
					
						<select class="js-select2" name="q2">
							<option>Please chooses</option>
							<option value="1">a. $1,000 in cash  </option>
							<option value="2">b. A 50% chance at winning $5,000 </option>
							<option value="3">c. A 25% chance at winning $10,000  </option>
							<option value="4">d. A 5% chance at winning $100,000 </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				
           <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 3. You have just ﬁnished saving for a “once-in-a-lifetime” vacation. Three weeks before you plan to leave, you lose your job. You would: </span>
				<span class="input100" style="text-align:right">  * Required </span>
					
					<div>
						<select class="js-select2" name="q3">
							<option>Please chooses</option>
							<option value="1">a. Cancel the vacation  </option>
							<option value="2">b. Take a much more modest vacation </option>
							<option value="3">c. Go as scheduled, reasoning that you need the time to prepare for a job search  </option>
							<option value="4">d. Extend your vacation, because this might be your last chance to go ﬁrst-class </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 4. How would you respond to the following statement? “It’s hard for me to pass up a bargain.”</span>
				<span class="input100" style="text-align:right">  * Required </span>
					
					<div>
						<select class="js-select2" name="q4">
							<option>Please chooses</option>
							<option value="1">a. Very true  </option>
							<option value="2">b. Sometimes true  </option>
							<option value="3">c. Not at all true  </option>				
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 5. If you unexpectedly received $20,000 to invest, what would you do?</span>
				<span class="input100" style="text-align:right">  * Required </span>
					
					<div>
						<select class="js-select2" name="q5">
							<option>Please chooses</option>
							<option value="1">a. Deposit it in a bank account, money market account, or an insured CD  </option>
							<option value="2">b. Invest it in safe high quality bonds or bond mutual funds </option>
							<option value="3">c. Invest it in stocks or stock mutual funds  </option>			
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 6. In terms of experience, how comfortable are you investing in stocks or stock mutual funds?  </span>
				<span class="input100" style="text-align:right">  * Required </span>
					
					<div>
						<select class="js-select2" name="q6">
							<option>Please chooses</option>
							<option value="1">a. Not at all comfortable   </option>
							<option value="2">b. Somewhat comfortable  </option>
							<option value="3">c. Very comfortable   </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 7. Which situation would make you the happiest?  </span>
				<span class="input100" style="text-align:right">  * Required </span>
					
					<div>
						<select class="js-select2" name="q7">
							<option>Please chooses</option>
							<option value="2">a. You win $50,000 in a publisher’s contest  </option>
							<option value="1">b. You inherit $50,000 from a rich relative </option>
							<option value="3">c. You earn $50,000 by risking $1,000 in the options market  </option>
							<option value="1">d. Any of the above—after all, you’re happy with the $50,000  </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 8. When you think of the word “risk” which of the following words comes to mind ﬁrst?
 </span>
				<span class="input100" style="text-align:right">  * Required </span>
                
					<div>
						<select class="js-select2" name="q8">
							<option>Please chooses</option>
							<option value="1">a. Loss   </option>
							<option value="2">b. Uncertainty  </option>
							<option value="3">c. Opportunity   </option>
							<option value="4">d. Thrill  </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 9. You inherit a mortgage-free house worth $80,000. The house is in a nice neighborhood, and you believe that it should increase in value faster than inﬂation. Unfortunately, the house needs repairs. If rented today, the house would bring in $600 monthly, but if updates and repairs were made, the house would rent for $800 per month. To ﬁnance the repairs you’ll need to take out a mortgage on the property. You would:
 </span>
				<span class="input100" style="text-align:right">  * Required </span>
                
					<div>
						<select class="js-select2" name="q9">
							<option>Please chooses</option>
							<option value="1">a. Sell the house   </option>
							<option value="2">b. Rent the house as is </option>
							<option value="3">c. Remodel and update the house, and then rent it   </option>					
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 10. In your opinion, is it more important to be protected from rising consumer prices (inﬂation) or to maintain the safety of your money from loss or theft?
 </span>
				<span class="input100" style="text-align:right">  * Required </span>
                
					<div>
						<select class="js-select2" name="q10">
							<option>Please chooses</option>
							<option value="1">a. Much more important to secure the safety of my money   </option>
							<option value="3">b. Much more important to be protected from rising prices (inﬂation) </option>					
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 11. You’ve just taken a job at a small fast growing company. After your ﬁrst year you are offered the following bonus choices. Which one would you choose? 
 </span>
				<span class="input100" style="text-align:right">  * Required </span>
                
					<div>
						<select class="js-select2" name="q11">
							<option>Please chooses</option>
							<option value="1">a. A ﬁve year employment contract   </option>
							<option value="2">b. A $25,000 bonus  </option>
							<option value="3">c. Stock in the company currently worth $25,000 with the hope of selling out later at a large proﬁt   </option>					
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 12. Some experts are predicting prices of assets such as gold, jewels, collectibles, and real estate (hard assets) to increase in value; bond prices may fall, however, experts tend to agree that government bonds are relatively safe. Most of your investment assets are now in high interest government bonds. What would you do?
 </span>
				<span class="input100" style="text-align:right">  * Required </span>
                
					<div>
						<select class="js-select2" name="q12">
							<option>Please chooses</option>
							<option value="1">a. Hold the bonds  </option>
							<option value="2">b. Sell the bonds, put half the proceeds into money market accounts, and the other half into hard assets  </option>
							<option value="3">c. Sell the bonds and put the total proceeds into hard assets   </option>
							<option value="4">d. Sell the bonds, put all the money into hard assets, and borrow additional money to buy more  </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 13. Assume you are going to buy a home in the next few weeks. Your strategy would probably be: 
 </span>
				<span class="input100" style="text-align:right">  * Required </span>
                
					<div>
						<select class="js-select2" name="q13">
							<option>Please chooses</option>
							<option value="1">a. To buy an affordable house where you can make monthly payments comfortably   </option>
							<option value="2">b. To stretch a bit ﬁnancially to buy the house you really want </option>
							<option value="3">c. To buy the most expensive house you can qualify for  </option>
							<option value="4">d. To borrow money from friends and relatives so you can qualify for a bigger mortgage 
 </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				<span class="input100" style="text-align:right">  * Required </span>
				
				<span class="label-input100"> 14. Given the best and worst case returns of the four investment choices below, which would you prefer?  </span>
					<div>
						<select class="js-select2" name="q14">
							<option>Please chooses</option>
							<option value="1">a. $200 gain best case; $0 gain/loss worst case   </option>
							<option value="2">b. $800 gain best case; $200 loss worst case  </option>
							<option value="3">c. $2,600 gain best case; $800 loss worst case  </option>
							<option value="4">d. $4,800 gain best case; $2,400 loss worst case 
 </option>						
						</select>
						
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				
			
             <span class="label-input100"> 15. Assume that you are applying for a mortgage. Interest rates have been coming down over the past few months. There’s the possibility that this trend will continue. But some economists are predicting rates to increase. You have the option of locking in your mortgage interest rate or letting it ﬂoat. If you lock in, you will get the current rate, even if interest rates go up. If the rates go down, you’ll have to settle for the higher locked in rate. You plan to live in the house for at least three years. What would you do?  </span>
					<span class="input100" style="text-align:right">  * Required </span>
					<div>
						<select class="js-select2" name="q15">
							<option>Please chooses</option>
							<option value="1">a. Deﬁnitely lock in the interest rate </option>
							<option value="2">b. Probably lock in the interest rate </option>
							<option value="2">c. Probably let the interest rate ﬂoat   </option>
							<option value="3">d. Deﬁnitely let the interest rate ﬂoat  </option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 16. In addition to whatever you own, you have been given $1,000. You are now asked to choose between: </span>
				<span class="input100" style="text-align:right">  * Required </span>
					
					<div>
						<select class="js-select2" name="q16">
							<option>Please chooses</option>
							<option value="1">a. A sure gain of $500  </option>
							<option value="3">b. A 50% chance to gain $1,000 and a 50% chance to gain nothing </option>					
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 17. In addition to whatever you own, you have been given $2,000. You are now asked to choose between: </span>
					<span class="input100" style="text-align:right">  * Required </span>
					<div>
						<select class="js-select2" name="q17">
							<option>Please chooses</option>
							<option value="1">a. A sure loss of $500   </option>
							<option value="3">b. A 50% chance to lose $1,000 and a 50% chance to lose nothing </option>					
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 18. Suppose a relative left you an inheritance of $100,000, stipulating in the will that you invest ALL the money in ONE of the following choices. Which one would you select?  </span>
					<span class="input100" style="text-align:right">  * Required </span>
					<div>
						<select class="js-select2" name="q18">
							<option>Please chooses</option>
							<option value="1">a. A savings account or money market mutual fund   </option>
							<option value="2">b. A mutual fund that owns stocks and bonds  </option>
							<option value="3">c. A portfolio of 15 common stocks  </option>
                            <option value="4">d. Commodities like gold, silver, and oil  </option>					
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100">19. If you had to invest $20,000, which of the following investment choices would you ﬁnd most appealing?
</span>
					<span class="input100" style="text-align:right">  * Required </span>
					<div>
						<select class="js-select2" name="q19">
							<option>Please chooses</option>
							<option value="1">a. 60% in low-risk investments 30% in medium-risk investments 10% in high-risk investments  </option>
							<option value="2">b. 30% in low-risk investments 40% in medium-risk investments 30% in high-risk investments  </option>
							<option value="3">c. 10% in low-risk investments 40% in medium-risk investments 50% in high-risk investments  </option>					
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
         <div class="wrap-input100 input100-select bg1">			
				<span class="label-input100"> 20. Your trusted friend and neighbor, an experienced geologist, is putting together a group of investors to fund an exploratory gold mining venture. The venture could pay back 50 to 100 times the investment if successful. If the mine is a bust, the entire investment is worthless. Your friend estimates the chance of success is only 20%. If you had the money, how much would you invest? 
</span>
					<span class="input100" style="text-align:right">  * Required </span>
					<div>
						<select class="js-select2" name="q20">
							<option>Please chooses</option>
							<option value="1">a. Nothing  </option>
							<option value="2">b. One month’s salary  </option>
							<option value="3">c. Three month’s salary  </option>
							<option value="4">d. Six month’s salary</option>						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
        
<!--
				<div class="w-full dis-none js-show-service">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">What type of products do you sell?</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="type-product" value="physical" checked="checked">
							<label class="label-radio100" for="radio1">
								Phycical Products
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio2" type="radio" name="type-product" value="digital">
							<label class="label-radio100" for="radio2">
								Digital Products
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio3" type="radio" name="type-product" value="service">
							<label class="label-radio100" for="radio3">
								Services Consulting
							</label>
						</div>
					</div>

					<div class="wrap-contact100-form-range">
						<span class="label-input100">Budget *</span>

						<div class="contact100-form-range-value">
							$<span id="value-lower">610</span> - $<span id="value-upper">980</span>
							<input type="text" name="from-value">
							<input type="text" name="to-value">
						</div>

						<div class="contact100-form-range-bar">
							<div id="filter-bar"></div>
						</div>
					</div>
				</div>
-->
<!--

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Leave a Message Here</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div>
-->

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" name="submit_survey">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				
				
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>