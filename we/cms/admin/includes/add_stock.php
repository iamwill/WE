

<?php

if(isset($_POST['add_stock'])){
    
    $symbol =  $_POST['symbol'];
    $Quantity =  $_POST['quantity'];
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
    



    
    $query = "INSERT INTO properties(symbol, Ettm, Efwd, Pfwd, K, MAR, Price, P60, R60, R60_6, SD, SDfwd, Quantity, MARF, MaxDD) ";
    
    $query .= "VALUES('{$symbol}','{$Ettm}','{$Efwd}','{$Pfwd}','{$K}','{$MAR}','{$Price}','{$P60}','{$R60}','{$R60_6}','{$SD}','{$SDfwd}','{$Quantity}','{$MARF}','{$MaxDD}' )";
    
    $add_stock_query = mysqli_query($connection,$query);
    
    confirmQuery($add_stock_query);
    
    header("Location: admin_portfolios.php");
    
}

?>
   
   
   <form action="" method="post" enctype="multipart/form-data">
    
    
    <div class="form-group">
        <label for="symbol"> Symbol </label>
        <input type="text" class="form-control" name="symbol">   
    </div>

   <div class="form-group">
        <label for="quantity"> Quantity </label>
        <input type="text" class="form-control" name="quantity">   
    </div>
    
      <div class="form-group">
        <label for="Price"> Price </label>
        <input type="text" class="form-control" name="Price">   
    </div>
    
      <div class="form-group">
        <label for="Ettm"> Ettm </label>
        <input type="text" class="form-control" name="Ettm">   
    </div>
    
      <div class="form-group">
        <label for="Efwd"> Efwd </label>
        <input type="text" class="form-control" name="Efwd">   
    </div>
    
      <div class="form-group">
        <label for="Pfwd"> Pfwd </label>
        <input type="text" class="form-control" name="Pfwd">   
    </div>
    
      <div class="form-group">
        <label for="K"> K </label>
        <input type="text" class="form-control" name="K">   
    </div>
    
      <div class="form-group">
        <label for="MAR"> MAR </label>
        <input type="text" class="form-control" name="MAR">   
    </div>
    
      <div class="form-group">
        <label for="P60"> P60 </label>
        <input type="text" class="form-control" name="P60">   
    </div>
    
      <div class="form-group">
        <label for="R60"> R60 </label>
        <input type="text" class="form-control" name="R60">   
    </div>
    
    <div class="form-group">
        <label for="R60_6"> R60_6_months_ago </label>
        <input type="text" class="form-control" name="R60_6">   
    </div>
    
    
      <div class="form-group">
        <label for="SD"> SD </label>
        <input type="text" class="form-control" name="SD">   
    </div>
    
      <div class="form-group">
        <label for="SDfwd"> SDfwd </label>
        <input type="text" class="form-control" name="SDfwd">   
    </div>
    
     <div class="form-group">
        <label for="MARF"> MARF </label>
        <input type="text" class="form-control" name="MARF">   
    </div>
    
     <div class="form-group">
        <label for="MaxDD"> MaxDD </label>
        <input type="text" class="form-control" name="MaxDD">   
    </div>
    
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="add_stock" value="Add Stock">
        
    </div>
       
</form>