<?php

 $user_id = $_SESSION['user_id'];

if(isset($_POST['add_user_stock'])){
    
  
    
    $symbol =  $_POST['select_symbol'];
    $qty =  $_POST['qty'];

    
    $query = "INSERT INTO Portfolio(user_id, symbol, qty) ";
    
    $query .= "VALUES('{$user_id}','{$symbol}','{$qty}' )";
    
    $add_stock_query = mysqli_query($connection,$query);
    
    confirmQuery($add_stock_query);
    
    header("Location: admin_uport.php");
    
}

?>
   
   
   <form action="" method="post" enctype="multipart/form-data">
   

       <div class="form-group">
        <label for="user_id"> User_id </label>
        
        <input value="<?php echo $user_id; ?>" type="text" class="form-control" name="user_id" >   
     
    </div>
       
     
       
       
       <div class="form-group">
        <label for="symbol"> Symbol </label>
         <select name="select_symbol" id="">
           
           <?php 
           
                $query = "SELECT symbol FROM properties";
                $select_symbols = mysqli_query($connection,$query);
           
                confirmQuery($select_symbols);

                while($row = mysqli_fetch_assoc($select_symbols)){
                $symbol =  $row['symbol'];
              
                    
                echo "<option value='{$symbol}'>{$symbol}</option>";} 
                     
           ?>
                                 
       </select>
       
    </div>

   <div class="form-group">
        <label for="qty"> Quantity </label>
        <input type="text" class="form-control" name="qty">   
    </div>
    
    
    <div class="form-group">
      
       <input class="btn btn-primary" type="submit" name="add_user_stock" value="Add Stock">
        
    </div>
       
</form>