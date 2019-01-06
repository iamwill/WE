<?php

$option = isset($_POST['bulk_options']) ? $_POST['bulk_options'] : false;

if ($option) {   
        $select1 = $_POST['bulk_options'];   
    }            
    
    else {
     echo "task option is required";
     exit; 
   }

?>








