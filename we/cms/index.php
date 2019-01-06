

<?php
include "includes/db.php";
?>


<?php
include "includes/header.php";
?>

    <!-- Navigation -->
    <?php
include "includes/navigation.php";
?>
    
    <?php session_start(); ?>
    
    
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
                
                $query = "SELECT * FROM posts";
                    
                $select_all_posts_query = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        
                       $post_id =  $row['post_id'];
                       $post_title =  $row['post_title'];
                         $post_author =  $row['post_author']; 
                        $post_date =  $row['post_date'];
                         $post_image =  $row['post_image'];
                         $post_content =  substr($row['post_content'],0,100);
                        
                        ?>
                                
                         <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                                
                <?php
                        
                        
                    }
                
                ?>
                                 
                        
                    
        
               

                <!-- Second Blog Post -->
<!--
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
-->

                <!-- Third Blog Post -->
<!--
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
-->

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
           
           <div class="col-md-4">
           
                   <!-- login in -->
        <div class="well">
           
           <?php  
           
             if ((isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] == true)){
           
             echo "<form action='includes/logout.php' method='post'>";
                 
             echo "<div class='jumbotron'>";
             echo "  <h2>Welcome, ". $_SESSION['firstname'] . '</h2>' ;
             echo " <p>Your A.I. portfolio manager</p>";
             echo " <p><a class='btn btn-primary btn-lg' href='admin/index.php' role='button'>Go to Admin</a></p>";
         
            echo "<button class='btn btn-lg' name='logout' type='submit'> Log Out
                    </button>
                    ";
            echo "</form>";
            echo "</div>";


                
            }
            
            else{
                
            echo "<h4>Login</h4>";
            echo "<form action='includes/login.php' method='post'>";
            echo " <div class='form-group'>";
            echo "<input name='username' type='text' class='form-control' placeholder='Enter Username'>";
            echo "</div>";
            echo " <div class='input-group'>";
            echo "<input name='password' type='password' class='form-control' placeholder='Enter Password'>";
            echo "<span class='input-group-btn'>";
            echo "<button class='btn btn-primary' name='login' type='submit'> Submit
                    </button>
                    ";
            echo "</span>";
            echo "</div>";
            echo "</form>";
                
            }
  
               
               ?>
               
                
        </div>
          
          <?php
include "includes/sidebar.php";
?>
           
            </div>
            
            
            
            
            
            
            

        </div>
        <!-- /.row -->

        <hr>

 <?php

include "includes/footer.php";
?>
