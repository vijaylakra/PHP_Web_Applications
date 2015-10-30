<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">		
	<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
			
	   
</head>
<?php  include('session.php'); ?>
<?php
mysql_select_db("blog",mysql_connect("localhost","root",""))or die(mysql_error());
?>
<body>

    <!-- Navigation -->
   
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="user.php">Start Blogging</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
				<?php $query= mysql_query("select * from user where user_id = '$session_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
						?>
                    <li>
                        <a href="userblog.php">Home</a>
                    </li>
                    <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $row['fullname'];  ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="dashboard.php">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
                                    </li>
                                </ul>
                            </li>
                    <li>
                        
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Blogging</h1>
                        <hr class="small">
                        <span class="subheading">Where writing is not a passion,it's addiction</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
				<?php
				
                   $pid=$_GET['pid'];
		           $ppid=$pid+2;
				   
								$query= mysql_query("select * from contents order by date DESC LIMIT 1" )or die(mysql_error());
								$fetchrow=mysql_fetch_array($query);
								$last=$fetchrow['post_id'];
									
								 $query_content = mysql_query("select * from contents where post_id<'$ppid' order by date DESC")or die(mysql_error());
								 $count=0;
								  while($row = mysql_fetch_array($query_content)){	
								     $count++;
									 if($count >8) break;
									 $id = $row['post_id'];
										
			 ?>
			        <div class="post-preview">
                    <a href="post.php<?php echo '?id='.$id; ?>">
                        <h2 class="post-title">
                            <?php echo $row['heading']; ?>
                        </h2>
                        <h3 class="post-subtitle">
                          <?php echo $row['subheading']; ?>
                        </h3>
                    </a>
                   	<p class="post-meta">Posted by  <?php echo $row['name']; ?>  on <?php echo $row['date']; ?>
                </div>
                <hr>
				
				<!-- Pager -->
				
               <?php } ?>
                
			<?php 
			
                 		if($count >8 && $id!=$last-1)
						     { 							          
			?>
			<ul class="pager">
					<li class="next">
                        <a href="oldgenpost.php<?php echo '?pid=' .$id; ?>">Older Posts &rarr;</a>
                    </li>
					<li class="next">
                        <a href="prevgenpost.php<?php echo '?pid=' .$ppid; ?>">&larr; Previous Posts</a>
                    </li>
                </ul>
			<?php }
			else {
			?>
			<ul class="pager">
					<li class="next">
                        <a href="oldgenpost.php<?php echo '?pid=' .$id; ?>">Older Posts &rarr;</a>
                    </li>
                </ul>
				<?php } ?>
			
        </div>
		</div>
    </div>
	<hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <p class="copyright text-muted">Copyright &copy; ironthrone</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
