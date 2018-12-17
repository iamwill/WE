



		<div class="limiter">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">User_id</th>
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
$SR_fwd2DD = -1 * round($SR_fwd2DD,2);   
$SR_fwd2PEG = (($SR_fwd / $PEG)<0)?0: $SR_fwd2PEG = $SR_fwd / $PEG;
$SR_fwd2PEG = round($SR_fwd2PEG,2); 

$MARF_fwd = $Rfwd_adjusted / $MaxDD;
$MARF_fwd = -1 * round($MARF_fwd,2); 
$MaxDD =  round($MaxDD,2);
    
echo "<tr class='row100'>";
      
echo "<td class='column100 column1' data-column='column1'>{$user_id}</td>";
echo "<td class='column100 column2' data-column='column2'>{$symbol}</td>";
echo "<td class='column100 column3' data-column='column3'>{$Quantity}</td>";
echo "<td class='column100 column4' data-column='column4'>{$Price}</td>";
echo "<td class='column100 column5' data-column='column5'>{$Rfwd_adjusted}</td>";
echo "<td class='column100 column6' data-column='column6'>{$PEG}</td>";
echo "<td class='column100 column7' data-column='column7'>{$PE_fwd}</td>";
echo "<td class='column100 column8' data-column='column8'>{$SR_fwd}</td>";
echo "<td class='column100 column9' data-column='column9'>{$SR_fwd2DD}</td>";
echo "<td class='column100 column10' data-column='column10'>{$SR_fwd2PEG}</td>";

echo "<td class='column100 column11' data-column='column11'>{$SD}</td>";
echo "<td class='column100 column12' data-column='column12'>{$SDfwd}</td>";
echo "<td class='column100 column13' data-column='column13'>{$MARF_fwd}</td>";
echo "<td class='column100 column14' data-column='column14'>{$MaxDD}</td>";



    
//    
//echo "<td><a href='./admin_portfolios.php?source=edit_stock&p_id={$post_id}'>Edit</a></td>";
//    
echo "<td class='column100 column15' data-column='column15'><a href='./admin_portfolios.php?source=edit_stock&symbol={$symbol}'>Edit</a></td>";
echo "<td class='column100 column16' data-column='column16'><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='./admin_portfolios.php?delete={$symbol}'>Delete</a></td>";
echo "</tr>";
}

?>

			              </tbody>
					</table>
				</div>				
			</div>
			</div>




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