<?php
include "../includes/db.php"; ?>



<?php
if(isset($_POST['login'])){
    header("Location: index.php");
}

?>


<?php
if(isset($_POST['signup'])){
    
    
    //    $user_id = $_POST['user_id'];
//    $user_firstname= $_POST['user_firstname'];
//    $user_lastname= $_POST['user_lastname'];
//    $user_role = $_POST['user_role'];

    
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
//    $post_date = date('d-m-y');
    
    
    if(!empty($user_name) && !empty($user_email) && !empty($user_password)){
        
        
         // To protect the information
    $user_name = mysqli_real_escape_string($connection,$user_name);
    $user_email = mysqli_real_escape_string($connection,$user_email);
    $user_password = mysqli_real_escape_string($connection,$user_password);
    
    // inset some crypt function
    $query = "SELECT randSalt From users";
    $select_randsalt_query = mysqli_query($connection, $query);
    
    if(!$select_randsalt_query){
        die("Query Faliled". mysqli_error($connection));
    }
    
$row = mysqli_fetch_array($select_randsalt_query);
        
$salt = $row['randSalt'];
        
$user_password = crypt($user_password, $salt);
    
        
//    move_uploaded_file($post_image_temp,"../images/{$post_image}");
  
    
    
    $query = "INSERT INTO users(user_name, user_email, user_password, user_role) ";
    
    $query .= "VALUES('{$user_name}','{$user_email}','{$user_password}','subscriber' )";
    
    $create_user_query = mysqli_query($connection,$query);
    
    if(!$create_user_query){
        die("Query Faliled". mysqli_error($connection). '' . mysqli_errno($connection));
    }
        
    $message = "Your Registration has been submitted! Please log in!";

    
//    header("Location: ../../login/index.php");
    }
    
    else{
        
        $message = "Field can not be empty";
    }
  
}
else{
    $message = "";
}

     
    
?>















<html lang="en">
<head>
	<title>SignUp V3</title>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		
		
<!--			Login in container starts here-->
			<div class="wrap-login100">
				
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
				         Join Us
					</span>

       
        <form role="form" action="index_signup.php" method="post" id="login-form" autocomplete="off">
    
<!--
    <div class="form-group">
        
        <label for="title"> Firstname </label>
        <input type="text" class="form-control" name="user_firstname">
        
    </div>
    
    <div class="form-group">
        <label for="post_id"> Lastname </label>
        <input type="text" class="form-control" name="user_lastname">   
    </div>
    
    
   <div class="form-group">
       
       <select name="user_role" id="">
           <option value="subscriber">Select Options</option>
          <option value="admin">Admin</option>
          <option value="subscriber">Subscriber</option>
           
                       
       </select>
       
    </div>
 
-->
    
<!--
       <div class="form-group">
        <label for="post_image"> Post Image </label>
        <input type="file" name="image">   
    </div>
-->

  
   <h6 class="text-center"><?php echo $message; ?></h6>
    
    <div class="form-group">
      <label for="post_tags"> Username </label>
        <input type="text" class="form-control" name="user_name">   
    </div>
    
    <div class="form-group">
      <label for="post_content"> Email </label>
      <input type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
      <label for="post_content"> Password </label>
      <input type="password" class="form-control" name="user_password">
    </div>
  
<div class="container-login100-form-btn">
                    
						<button class="login100-form-btn" name="signup" type="submit">
							Sign Up
						</button>
						
						 &nbsp
						 &nbsp
						

						<button class="login100-form-btn" name="login" type="submit">
							Login Now
						</button>

						
<!--						<button class="login100-form-btn" onclick="window.location.href = 'https://w3docs.com';">Click Here</button>-->
						
					</div>
					
					
	
				</form>

			
			</div>
			
			
			
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>