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
                <a class="navbar-brand" href="index.html">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a href="../index.php">HOME SITE</a></li>          
                
            
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
            
            
            
            
            <!-- /.navbar-collapse -->
        </nav>