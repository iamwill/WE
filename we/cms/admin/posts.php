
<?php include "includes/admin_header.php";?>


<body>

    <div id="wrapper">

<!--Navigation-->
       <?php include "includes/admin_navigation.php";?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Awesome Sophia
                            <small>Subheading</small>
                        </h1>
                        
                         <div class="col-xs-6">
                         
                         <?php
                            insert_categories();
                             ?>
                         
                         
                        <form action="" method="post">
                        <div class="form-group">
                           <label for="cat-title">Add Category and cat_id </label>
                            <input type="text" class="form-control" name="cat_title">
                            <input type="text" class="form-control" name="cat_id">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>   
                        </form>  
                        
                        
                        <?php // UPDATE AND INCLUDE QUERY
                             if(isset($_GET['edit'])){
                                 $cat_id = $_GET['edit'];
                                 include "includes/update_categories.php";        
                             }                             
                             ?> 
        
                        </div><!--Add Category Form-->
                        
                        <div class="col-xs-6">
                        
                           
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                <?php //Find all categores query

                findAllCategories();
                  
                                    
                ?>
                                  
                   <?php
                                    delete_categories();

                                    ?>
                                   
                                </tbody>
                            </table>
                            
                        </div>
                        
                        
                        
                        
<!--
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> After Dashboard
                            </li>
                        </ol>
-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php include "includes/admin_footer.php";?>