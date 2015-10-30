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
                <a class="navbar-brand" href="userblog.php">Start Blogging</a>
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
    <header class="intro-header" style="background-image: url('img/post-bg.jpg')">
        <div class="container">
		<?php
				mysql_select_db("blog",mysql_connect("localhost","root",""))or die(mysql_error());
		?>
		<?php
             $get_id=$_GET['id'];
		 ?>
		 <?php
								 $query_contents = mysql_query("select * from contents
																	where post_id= '$get_id' order by date DESC")or die(mysql_error());
								$row = mysql_fetch_array($query_contents);
								 $id = $row['post_id'];
								 ?>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo $row['heading']; ?></h1>
						
                        <h2 class="subheading"><?php echo $row['subheading']; ?></h2>
                        <span class="meta">Posted by <?php echo $row['name']; ?> on <?php echo $row['date']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p><?php echo $row['contents']; ?></p>

                </div>
            </div>
        </div>
    </article>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
