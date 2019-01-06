        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
               <li><a href="index.php">HOME SITE</a></li> 
                &nbsp         
                 <li><a href="../index.php">VIEW NEWS</a></li>   
            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     
                    <i class="fa fa-user"></i> <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?> <b class="caret"></b>
                    
                    </a>
                    <ul class="dropdown-menu">
                        
                       
                        <li class="divider"></li>
                        
                        <form action="includes/login.php" method="post">
                        <li>
                            <a href="../../index.php"  name="login" type="submit"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        </form>
                        
                    </ul>
                </li>
            </ul>
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   
                      
                        <li>
                       <a href="javascript:;" data-toggle="collapse" data-target="#portfolio_dropdown"><i class="fa fa-fw fa-dashboard"></i> Portfolio <i class="fa fa-fw fa-caret-down"></i></a>
                    
                              <ul id="portfolio_dropdown" class="collapse">
                            <li>
                                <a href="./admin_portfolios.php?source=">View all stocks</a>
                            </li>
                            
                            <li>
                                <a href="./admin_uport.php?source=">View your holdings</a>
                            </li>
                            
                             <li>
                                <a href="./admin_portfolios.php?source=upload_stock">Upload stocks</a>
                            </li>
                            
                            <li>
                                <a href="./admin_portfolios.php?source=add_stock">Add stocks</a>
                            </li>
                            
                             <li>
                                <a href="./admin_portfolios.php?source=plot_stock">Stock Charts</a>
                            </li>
                        </ul>
                        
                        
       
                    </li>
<!--
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
-->
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./admin_post.php?source=">View all posts</a>
                            </li>
                            <li>
                                <a href="./admin_post.php?source=add_post">Add posts</a>
                            </li>
                        </ul>
                    </li> 
                                            
                       
<!--
                       <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="#">View all posts</a>
                            </li>
                            <li>
                                <a href="#">Add posts</a>
                            </li>
                        </ul>
                    </li>
                    
-->
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories </a>
                    </li>
                    

                    
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./admin_users.php?source=add_user">Add Users</a>
                            </li>
                            <li>
                                <a href="./admin_users.php">View all users</a>
                            </li>
                        </ul>
                    </li>
                    
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                    
                </ul>
            </div>
            
            
            
            <!-- /.navbar-collapse -->
        </nav>