<?php

if(isset($_GET['symbol'])){
    
    $the_symbol =  $_GET['symbol'];
    
}

$query = "SELECT * FROM properties WHERE symbol='{$the_symbol}'";
$select_stocks = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_stocks)){
    

$symbol =  $row['symbol'];
$Quantity =  $row['Quantity'];
$Price =  $row['Price'];
$Ettm =  $row['Ettm'];
$Efwd =  $row['Efwd'];
$Pfwd =  $row['Pfwd'];
$K =  $row['K'];
$MAR =  $row['MAR'];
$P60 =  $row['P60'];
$R60 =  $row['R60'];
$R60_6 =  $row['R60_6'];
$SD =  $row['SD'];
$SDfwd =  $row['SDfwd'];
$MARF =  $row['MARF'];
$MaxDD =  $row['MaxDD'];

    
}

if(isset($_POST['update_stock'])){


$Quantity =  $_POST['Quantity'];
$Price =  $_POST['Price'];
$Ettm =  $_POST['Ettm'];
$Efwd =  $_POST['Efwd'];
$Pfwd =  $_POST['Pfwd'];
$K =  $_POST['K'];
$MAR =  $_POST['MAR'];
$P60 =  $_POST['P60'];
$R60 =  $_POST['R60'];
$R60_6 =  $_POST['R60_6'];
$SD =  $_POST['SD'];
$SDfwd =  $_POST['SDfwd'];
$MARF =  $_POST['MARF'];
$MaxDD =  $_POST['MaxDD'];

    
    
    
    $query = "UPDATE properties SET ";
    $query .="Quantity = {$Quantity}, ";
    $query .="Price = {$Price}, ";
    $query .="Ettm = {$Ettm}, ";
    $query .="Efwd = {$Efwd}, ";
    $query .="Pfwd = {$Pfwd}, ";
    $query .="K = {$K}, ";
    $query .="MAR = {$MAR}, ";
    $query .="P60 = {$P60}, ";
    $query .="R60 = {$R60}, ";
    $query .="R60_6 = {$R60_6}, ";
    $query .="SD = {$SD}, ";
    $query .="SDfwd = {$SDfwd}, ";
    $query .="MARF = {$MARF}, ";
    $query .="MaxDD = {$MaxDD} ";
 

    
    $query .="WHERE symbol = '{$the_symbol}' ";
    
    
    $update_stock = mysqli_query($connection,$query);
    confirmQuery($update_stock);
    header("Location: admin_portfolios.php");
    
}
?>
  
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group"> 
        <label for="title"> Symbol </label>
        <input value="<?php echo $the_symbol; ?> " type="text" class="form-control" name="symbol">
    </div>
    
    <div class="form-group">
        <label for="Quantity"> Quantity </label>
        <input value="<?php echo $Quantity; ?> " type="text" class="form-control" name="Quantity">   
    </div>
    
    
    <div class="form-group">
        <label for="Price"> Price </label>
        <input value="<?php echo $Price; ?> " type="text" class="form-control" name="Price">   
    </div>

   <div class="form-group">
        <label for="Ettm"> Ettm </label>
        <input value="<?php echo $Ettm; ?> " type="text" class="form-control" name="Ettm">   
    </div>
    
       <div class="form-group">
        <label for="Efwd"> Efwd </label>
        <input value="<?php echo $Efwd; ?> " type="text" class="form-control" name="Efwd">   
    </div>
    
       <div class="form-group">
        <label for="Pfwd"> Pfwd </label>
        <input value="<?php echo $Pfwd; ?> " type="text" class="form-control" name="Pfwd">   
    </div>
    
       <div class="form-group">
        <label for="K"> K </label>
        <input value="<?php echo $K; ?> " type="text" class="form-control" name="K">   
    </div>
    
       <div class="form-group">
        <label for="MAR"> MAR </label>
        <input value="<?php echo $MAR; ?> " type="text" class="form-control" name="MAR">   
    </div>
    
       <div class="form-group">
        <label for="P60"> P60 </label>
        <input value="<?php echo $P60; ?> " type="text" class="form-control" name="P60">   
    </div>
    
       <div class="form-group">
        <label for="R60"> R60 </label>
        <input value="<?php echo $R60; ?> " type="text" class="form-control" name="R60">   
    </div>
    
       <div class="form-group">
        <label for="R60_6"> R60_6 </label>
        <input value="<?php echo $R60_6; ?> " type="text" class="form-control" name="R60_6">   
    </div>
    
    <div class="form-group">
        <label for="SD"> SD </label>
        <input value="<?php echo $SD; ?> " type="text" class="form-control" name="SD">   
    </div>
    
    <div class="form-group">
        <label for="SDfwd"> SDfwd </label>
        <input value="<?php echo $SDfwd; ?> " type="text" class="form-control" name="SDfwd">   
    </div>
    
    <div class="form-group">
        <label for="MARF"> MARF </label>
        <input value="<?php echo $MARF; ?> " type="text" class="form-control" name="MARF">   
    </div>
    
    <div class="form-group">
        <label for="MaxDD"> MaxDD </label>
        <input value="<?php echo $MaxDD; ?> " type="text" class="form-control" name="MaxDD">   
    </div>
    
     
    
    
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="update_stock" value="Update Stock">
    </div>
    
       
</form>
    