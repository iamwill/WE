
<?php session_start() ?>

<?php

if(isset($_POST['logout'])){


//$_SESSION['username'] = null;
//$_SESSION['firstname'] = null;
//$_SESSION['lastname'] = null;
//$_SESSION['user_role'] = null;
unset($_SESSION['loggedin']);     // unset $_SESSION variable for the run-time 
$_SESSION['loggedin'] = "false";
 header("Location: ../index.php");
    
}



//if (isset($_SESSION['loggedin']) && (time() - $_SESSION['loggedin'] > 1800)) {
//// last request was more than 30 minutes ago
//unset($_SESSION['loggedin']);     // unset $_SESSION variable for the run-time 
//$_SESSION['loggedin'] = "false";
//} 

?>
