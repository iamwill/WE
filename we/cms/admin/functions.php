<?php



function parseFloat($ptString) { 
            if (strlen($ptString) == 0) { 
                    return false; 
            } 
            
            $pString = str_replace(" ", "", $ptString); 
            
            if (substr_count($pString, ",") > 1) 
                $pString = str_replace(",", "", $pString); 
            
            if (substr_count($pString, ".") > 1) 
                $pString = str_replace(".", "", $pString); 
            
            $pregResult = array(); 
        
            $commaset = strpos($pString,','); 
            if ($commaset === false) {$commaset = -1;} 
        
            $pointset = strpos($pString,'.'); 
            if ($pointset === false) {$pointset = -1;} 
        
            $pregResultA = array(); 
            $pregResultB = array(); 
        
            if ($pointset < $commaset) { 
                preg_match('#(([-]?[0-9]+(\.[0-9])?)+(,[0-9]+)?)#', $pString, $pregResultA); 
            } 
            preg_match('#(([-]?[0-9]+(,[0-9])?)+(\.[0-9]+)?)#', $pString, $pregResultB); 
            if ((isset($pregResultA[0]) && (!isset($pregResultB[0]) 
                    || strstr($preResultA[0],$pregResultB[0]) == 0 
                    || !$pointset))) { 
                $numberString = $pregResultA[0]; 
                $numberString = str_replace('.','',$numberString); 
                $numberString = str_replace(',','.',$numberString); 
            } 
            elseif (isset($pregResultB[0]) && (!isset($pregResultA[0]) 
                    || strstr($pregResultB[0],$preResultA[0]) == 0 
                    || !$commaset)) { 
                $numberString = $pregResultB[0]; 
                $numberString = str_replace(',','',$numberString); 
            } 
            else { 
                return false; 
            } 
            $result = (float)$numberString; 
            return $result; 
} 







function confirmQuery($result){
    
    global $connection;
    
        if(!$result){
        die("QUERY FAILED ." . mysqli_error($connection));
    }
    
}


function insert_categories(){
    
    global $connection;
    
    
     if(isset($_POST['submit'])){
                                 
                                $cat_title = $_POST['cat_title'];
                                 $cat_id = $_POST['cat_id'];
                                 
                                 if($cat_title == ""||empty($cat_title)){
                                     echo "This field should not be empty";
                                 } else{
                                     $query = "INSERT INTO categories(cat_title,cat_id) ";
                                     $query .="VALUE('{$cat_title}','{$cat_id}') ";
                                     $create_category_query = mysqli_query($connection,$query);
                                     if(!$create_category_query){
                                         die('QUERY FAILED' . mysqli_error($connection));
                                     }
                                 }
                                 
                             }                 
    
    
    
}

function findAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_categories)){
                $cat_id =  $row['cat_id'];
                $cat_title =  $row['cat_title'];
                echo"<tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</td>";
                echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</td>";
                echo"<tr>";

}
}

function delete_categories(){
    
 global $connection;   
 if(isset($_GET['delete'])){

$the_cat_id = $_GET['delete'];
$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
$delete_query = mysqli_query($connection,$query);
header("Location: categories.php");                            
}          

    
}




?>