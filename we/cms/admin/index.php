
    
    <?php include "includes/dashboard_header.php";?>

    <div id="wrapper">
    

<!--Navigation-->
       <?php include "includes/admin_navigation.php";?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                           <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
                        
                       
                        
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
                
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        $query = "SELECT * FROM properties";
                        $select_all_stocks = mysqli_query($connection,$query);
                        $stock_counts = mysqli_num_rows($select_all_stocks);
                        
                        echo "<div class='huge'>{$stock_counts}</div>"
                        
                        ?>                  
                        <div>Symbols</div>
                        
                    </div>
                </div>
            </div>
            <a href="admin_portfolios.php">
                <div class="panel-footer">
                    <span class="pull-left">View Your Portfolios</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM posts";
                        $select_all_posts = mysqli_query($connection,$query);
                        $posts_counts = mysqli_num_rows($select_all_posts);
                        
                        echo "<div class='huge'>{$posts_counts}</div>"
                        
                        ?>   
                    
                      <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="admin_post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Your Posts</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM users";
                        $select_all_users = mysqli_query($connection,$query);
                        $users_counts = mysqli_num_rows($select_all_users);
                        
                        echo "<div class='huge'>{$users_counts}</div>"
                        
                        ?>  
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="admin_users.php">
                <div class="panel-footer">
                    <span class="pull-left">View All Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>13</div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
               
               
               
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                
                   

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php include "includes/admin_footer.php";?>