



<?php
if(isset($_POST['checkBoxArray'])){
    
    
    foreach($_POST['checkBoxArray'] as $postValueId){
        
       $bulk_options =  $_POST['bulk_options'];
        
        switch($bulk_options){
                
            case 'view_all_stocks':
                
                header("Location: admin_portfolios.php");            
                break;
                   
                case 'delete':              
                $query = "DELETE FROM properties WHERE symbol = '{$postValueId}' "; 
                $update_to_delete_status = mysqli_query($connection,$query);              
                confirmQuery($update_to_delete_status);              
                break;              
        }
        
    }
    
}

?>



   
   
   <form action="" method="post" enctype="multipart/form-data">
   
   <div class="form-group">
        <label for="stock_file"> Step 1: add from file </label>
        <input type="file" name="file">   
        
        
    </div>
   
   <div class="form-group">
       <input class="btn btn-primary" type="submit" name="upload_stock" value="Upload from File">
    </div>
    
    <br>
    

     <div class="form-group">
        <label for="stock_file"> Step 2: Select the stocks you want </label>   
    </div>
   
 <div id="bulkOptionsContainer" class="col-xs-4">
    
    <select class="form-control" name="bulk_options" id="">   
        <option value="">Select Options</option>
        <option value="view_all_stocks">View current holdings</option>
        <option value="delete">Delete</option>  
    </select>
    
</div>





<div class="col-xs-4">
    
    
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="./admin_portfolios.php?source="> View All Stocks</a>
</div>


<br>

        

		<div class="limiter" style="padding-top: 30px">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
							<th class="column100 column2" data-column="column2"><input id="selectAllBoxes" type="checkbox"></th>
								<th class="column100 column2" data-column="column2">Symbol</th>
								<th class="column100 column3" data-column="column3">Quantity</th>
								<th class="column100 column4" data-column="column4">Price</th>
								<th class="column100 column5" data-column="column5">Rfwd-Adjusted</th>
								<th class="column100 column6" data-column="column6">PEG</th>
								<th class="column100 column7" data-column="column7">PE_fwd</th>
								<th class="column100 column8" data-column="column8">SR_fwd</th>
								<th class="column100 column9" data-column="column9">SR_fwd/DD</th>
								<th class="column100 column10" data-column="column10">SR_fwd/PEG</th>
								<th class="column100 column11" data-column="column11">SD</th>
								<th class="column100 column12" data-column="column12">SDfwd</th>
								<th class="column100 column13" data-column="column13">MARF_fwd</th>
								<th class="column100 column14" data-column="column14">MaxDD</th>
								<th class="column100 column15" data-column="column15"> </th>
								<th class="column100 column16" data-column="column16"> </th>
							</tr>
						</thead>
						
						<tbody>


<?php
                            

if(isset($_POST['upload_stock'])){
    
$fh = fopen($_FILES['file']['tmp_name'], 'r+');
 
$row = 1;


if ($fh !== FALSE) {
    
    $message = "Upload Succeed!";
echo "<script type='text/javascript'>alert('$message');</script>";

    
//$query = "DELETE FROM properties_temp";
//$delete_query = mysqli_query($connection,$query);     
    
    while (($data = fgetcsv($fh, 1000, ",")) !== FALSE) {
        $num = count($data);
        
        if($row>2){         
//       echo "<p> $num fields in line $row: <br /></p>\n";      
    $symbol =  $data[0];
    $Quantity = ($data[17]=='-') ? -1 * parseFloat($data[17]) : parseFloat($data[17] ) ;
    $Price =  floatval($data[8]);
    $Ettm =  ($data[1]=='-') ? -1 * parseFloat($data[1]) : parseFloat($data[1] ) ;
    $Efwd =  floatval($data[2]); 
    $Pfwd = floatval( $data[5]);
    $K =  floatval($data[6]);
    $MAR =  floatval($data[7]);
    $P60 =  floatval($data[9]);
    $R60 =  floatval($data[11]);
    $R60_6 =  floatval($data[13]);
    $SD = floatval($data[14]);
    $SDfwd =  floatval($data[15]);
    $MARF = floatval($data[18]);
    $MaxDD =  floatval($data[20]);
            
            
//Do some calculations here

$Rfwd = $Pfwd / $P60 -1;  
    
//$R60_6 = $P60 / $P60_6 -1;
//$R60 = $P60 / $P60_12 -1;
//    
//$R60_6 = round($R60_6,2); 
//$R60 = round($R60,2); 
    
$Rfwd_adjusted = ((($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd))<0)?0:(($Rfwd<0.5*$R60)?$R60_6:(($Rfwd>1.3*$R60)?((1.3*$R60>0.7*$Rfwd)?1.3*$R60:0.7*$Rfwd):$Rfwd));
    
$delta_E = $Efwd - $Ettm;
            
$PEG = (($P60/($delta_E * 100))<0)?10:$P60/($delta_E * 100);

$PE_fwd = ($P60/($Efwd)<0) ? 200 : $P60/$Efwd;
    
$SR_fwd = ((($Rfwd_adjusted-0.0225)/($SDfwd))<0)?0:(($Rfwd_adjusted-0.0225)/($SDfwd));           

$SR_fwd2DD = -1 * $SR_fwd / $MaxDD;
$SR_fwd2PEG = (($SR_fwd / $PEG)<0)?0: $SR_fwd2PEG = $SR_fwd / $PEG;

$MARF_fwd = -1 * $Rfwd_adjusted / $MaxDD;


//round up the numbers
$Price_p = round($Price,2);
$Rfwd_adjusted_p = round($Rfwd_adjusted,2);
$PEG_p = round($PEG,2);
$PE_fwd_p = round($PE_fwd,2);
$SR_fwd_p = round($SR_fwd,2);
$SR_fwd2DD_p = round($SR_fwd2DD,2);
$SR_fwd2PEG_p = round($SR_fwd2PEG,2);
$SD_p = round($SD,2);
$SDfwd_p = round($SDfwd,2);
$MARF_fwd_p = round($MARF_fwd,2);
$MaxDD_p = round($MaxDD,2);
    
    
// UPDATE Customers
//SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
        


$date =  date('M_Y');  
            
$query = "INSERT INTO {$date}(symbol, Ettm, Efwd, Pfwd, K, MAR, Price, P60, R60, R60_6, SD, SDfwd, Quantity, MARF, MaxDD) ";
$query .= "VALUES('{$symbol}','{$Ettm}','{$Efwd}','{$Pfwd}','{$K}','{$MAR}','{$Price}','{$P60}','{$R60}','{$R60_6}','{$SD}','{$SDfwd}','{$Quantity}','{$MARF}','{$MaxDD}' )";
$query .= "ON DUPLICATE KEY UPDATE symbol = '{$symbol}', Ettm = {$Ettm}, Efwd={$Efwd}, Pfwd={$Pfwd}, K={$K}, MAR={$MAR}, Price={$Price}, P60={$P60}, R60={$R60}, R60_6={$R60_6}, SD={$SD},  SDfwd={$SDfwd}, Quantity={$Quantity}, MARF={$MARF}, MaxDD={$MaxDD} ";
            
            
    $add_stock_query = mysqli_query($connection,$query);
    
    confirmQuery($add_stock_query);
    
 
            
            
//$query .= "VALUES('{$symbol}','{$Ettm}','{$Efwd}','{$Pfwd}','{$K}','{$MAR}','{$Price}','{$P60}','{$R60}','{$R60_6}','{$SD}','{$SDfwd}','{$Quantity}','{$MARF}','{$MaxDD}' )";

$add_stock_query = mysqli_query($connection,$query);

confirmQuery($add_stock_query);
            
  
echo "<tr class='row100'>";     
echo "<td class='column100 column2' data-column='column2'><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $symbol; ?>'></td> ";
echo "<td class='column100 column2' data-column='column2'>{$symbol}</td>";
echo "<td class='column100 column3' data-column='column3'>{$Quantity}</td>";
echo "<td class='column100 column4' data-column='column4'>{$Price_p}</td>";
            
echo "<td class='column100 column5' data-column='column5'>{$Rfwd_adjusted_p}</td>";
echo "<td class='column100 column6' data-column='column6'>{$PEG_p}</td>";
echo "<td class='column100 column7' data-column='column7'>{$PE_fwd_p}</td>";
echo "<td class='column100 column8' data-column='column8'>{$SR_fwd_p}</td>";
echo "<td class='column100 column9' data-column='column9'>{$SR_fwd2DD_p}</td>";
echo "<td class='column100 column10' data-column='column10'>{$SR_fwd2PEG_p}</td>";

echo "<td class='column100 column11' data-column='column11'>{$SD_p}</td>";
echo "<td class='column100 column12' data-column='column12'>{$SDfwd_p}</td>";
echo "<td class='column100 column13' data-column='column13'>{$MARF_fwd_p}</td>";
echo "<td class='column100 column14' data-column='column14'>{$MaxDD_p}</td>";



//    
//echo "<td><a href='./admin_portfolios.php?source=edit_stock&p_id={$post_id}'>Edit</a></td>";
//    
echo "<td class='column100 column15' data-column='column15'><a href='./admin_portfolios.php?source=edit_stock&symbol={$symbol}'>Edit</a></td>";
//echo "<td class='column100 column16' data-column='column16'><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='./includes/upload_stock.php?delete={$symbol}'>Delete</a></td>";
echo "</tr>";
            
}
           $row++;
      
        }            
    }
     fclose($fh);   
}

?>

  </tbody>
					</table>
				</div>				
			</div>
			</div>
			
</tbody>
</table>
</form>





