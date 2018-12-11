<?php

include "../../includes/db.php"; 

if(isset($_POST['login'])){
    
    echo "Success!";
    echo $username = $_POST['username'];
    echo $password =  $_POST['password'];
    
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);
    
    $query = "SELECT * FROM users WHERE user_name = '{$username}' AND password = '{$password}';";
    $select_user_query = mysqli_query($connection,$query);
    
    if(!$select_user_query){
        die("QUERY FAILED". mysqli_error($connection));
    }
    
    if($select_user_query->num_rows > 0) {
        $row = $select_user_query->fetch_assoc();
        $db_user_id = $row['user_id'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];

        // if login is successful, initialize the session
        session_start();

        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;

        header("Location: ../../admin/index.php");
    } 
    
}

header("Locaton: ../../index.php ");