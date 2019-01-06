
<?php include "includes/admin_header.php";?>
<?php include "includes/table_header.php";?>


<body style ="background-color:lightgrey">

    <div id="wrapper">

<!--Navigation-->
       <?php include "includes/admin_navigation.php";?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      
                         <h1 class="page-header">
                            Stocks Pool
             <small> all database</small>
                        </h1>
                                                        
              </div>
                </div>
                <!-- /.row -->


                                                
<?php
 
    if(isset($_GET['source'])){
        $source = $_GET['source'];
    } else{
        $source = '';
    }
                        
    switch($source){
            case 'add_stock';
            include "./includes/add_stock.php";
            break;
            
            case 'edit_stock';
            include "./includes/edit_stock.php";
            break;
            
            case 'plot_stock';
            include "./includes/plot_stock.php";
            break;
            
            case 'upload_stock';
            include "./includes/upload_stock.php";
            break;
            
    
                        default:
                        
                        include "./includes/view_all_stocks.php";
                        
                        break;

    }

?>
   </div>
   </div>
    
              
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php include "includes/admin_footer.php";?>