

<?php



function escape($string){
    
    global $connection;
    return mysqli_real_esacpe_string($connection,trim(strip_tags($string)));



}





?>