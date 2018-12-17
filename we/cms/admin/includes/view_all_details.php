
<table class="table tabletable-bordered table-hover" border="1">
<thead>
<tr>
    <th>User_id</th>
    <th>Symbol</th>
     <th>Quantity</th>
     <th>Price</th>
     
     <th>Rfwd</th> 
   <th>Rfwd-Adjusted</th>
      
    <th>PEG</th>
    <th>PE_fwd</th>
    <th>SR_fwd</th>
    <th>SR_fwd/DD</th>
    <th>SR_fwd/PEG</th>
    <th>MARF_fwd = RF/DD</th>     
     
    <th>Ettm</th>
    <th>Efwd</th>     
      <th>Pfwd</th>
        <th>K</th>  
      <th>MAR</th>       
    <th>P60</th>
    <th>P60_12</th>
    <th>P60_6</th>
    
    <th>R60</th>
    <th>R60_6</th>
    
    
    
    <th>SD</th>
    <th>SDfwd</th>
    <th>MARF</th>
       <th>MaxDD</th>

</tr>             

 
</thead>


<tbody>


<?php

    
    

$query = "SELECT * FROM properties";
$select_stocks = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_stocks)){
    
$user_id =  $_SESSION['user_id'];
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
//$Rfwd_adjusted =  $row['Rfwd_adjusted'];
//    
//Do some calculations here

$Rfwd = $Pfwd / $P60 -1;
$Rfwd = round($Rfwd,2);     
    
//$R60_6 = $P60 / $P60_6 -1;
//$R60 = $P60 / $P60_12 -1;
//    
//$R60_6 = round($R60_6,2); 
//$R60 = round($R60,2); 
    
$Rfwd_adjusted = ((($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd))<0)?0:(($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd));
    
$delta_E = $Efwd - $Ettm;


$PEG = (($P60/($delta_E * 100))<0)?10:$P60/($delta_E * 100);
$PEG = round($PEG,2);    


$PE_fwd = ($P60/($Efwd)<0) ? 200 : $P60/$Efwd;
$PE_fwd = round($PE_fwd,2);
    
$SR_fwd = ((($Rfwd_adjusted-0.0225)/($SDfwd))<0)?0:(($Rfwd_adjusted-0.0225)/($SDfwd));
$SR_fwd = round($SR_fwd,2);
    
$SR_fwd2DD = $SR_fwd / $MaxDD;
$SR_fwd2DD = round($SR_fwd2DD,2);   
$SR_fwd2PEG = (($SR_fwd / $PEG)<0)?0: $SR_fwd2PEG = $SR_fwd / $PEG;
$SR_fwd2PEG = round($SR_fwd2PEG,2); 

$MARF_fwd = $Rfwd_adjusted / $MaxDD;
$MARF_fwd = round($MARF_fwd,2); 
    
echo "<tr>";
      
echo "<td>{$user_id}</td>";
echo "<td>{$symbol}</td>";
echo "<td>{$Quantity}</td>";
echo "<td>{$Price}</td>";
echo "<td>{$Rfwd}</td>";
echo "<td>{$Rfwd_adjusted}</td>";
echo "<td>{$PEG}</td>";
echo "<td>{$PE_fwd}</td>";
echo "<td>{$SR_fwd}</td>";
echo "<td>{$SR_fwd2DD}</td>";
echo "<td>{$SR_fwd2PEG}</td>";
echo "<td>{$MARF_fwd}</td>";
echo "<td>{$Ettm}</td>";    
echo "<td>{$Efwd}</td>";
echo "<td>{$Pfwd}</td>";
echo "<td>{$K}</td>";
echo "<td>{$MAR}</td>";
echo "<td>{$P60}</td>";
echo "<td>{$R60}</td>";
echo "<td>{$R60_6}</td>";
echo "<td>{$SD}</td>";
echo "<td>{$SDfwd}</td>";
echo "<td>{$MARF}</td>";
echo "<td>{$MaxDD}</td>";



    
//    
//echo "<td><a href='./admin_portfolios.php?source=edit_stock&p_id={$post_id}'>Edit</a></td>";
//    
echo "<td><a href='./admin_portfolios.php?source=edit_stock&symbol={$symbol}'>Edit</a></td>";
echo "<td><a href='./admin_portfolios.php?delete={$symbol}'>Delete</a></td>";
echo "</tr>";
}

?>



</tbody>

</table>




<?php
if(isset($_GET['delete'])){
    $the_symbol = $_GET['delete'];
    $query = "DELETE FROM properties WHERE symbol = '{$the_symbol}'' ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: admin_portfolios.php");
    
}


?>