<?php
include "../../includes/db.php"; ?>


<?php
if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password =  $_POST['password'];
    
    
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    
    $query = "SELECT * FROM users WHERE user_name = '{$username}';";
    
    $select_user_query = mysqli_query($connection,$query);
    
    if(!$select_user_query){
        die("QUERY FAILED". mysqli_error($connection));
    }
    
    if($select_user_query->num_rows > 0) {
        $row = $select_user_query->fetch_assoc();
        $db_user_id = $row['user_id'];
        $db_user_name = $row['user_name'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
        $db_user_password = $row['user_password'];
        
        
        if ($db_user_password == crypt($password, $db_user_password)){
             // if login is successful, initialize the session
        session_start();
        
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_user_name;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        header("Location: ../../admin/index.php");
        }
    
}
header("Locaton: ../../login/index.php");

echo "Login not succeed! Try again!";}

?>