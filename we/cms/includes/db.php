<?php


$db['db_host'] = "127.0.0.1";
$db['db_user'] = "root";
$db['db_pass'] = "12345678";
$db['db_name'] = "we_cms_db";

foreach($db as $key => $value){
    define(strtoupper($key),$value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($connection){
    echo "We are connected";}

    else{
        echo "Something goes wrong, check.";
    }
    


?>