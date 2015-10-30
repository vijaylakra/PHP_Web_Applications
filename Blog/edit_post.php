<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/js/sample.js"></script>
	<link rel="stylesheet" href="ckeditor/css/samples.css">
	<link rel="stylesheet" href="ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">		
			<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
	
</head>
<?php
mysql_select_db("blog",mysql_connect("localhost","root",""))or die(mysql_error());
?>
<?php  include('session.php'); ?>
<?php
mysql_select_db("blog",mysql_connect("localhost","root",""))or die(mysql_error());
?>
<?php $get_id = $_GET['id']; ?>
<body>
 
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
						<?php $name=$row['fullname'];
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
			
				<header class="intro-header" style="background-image: url('img/pawn.jpg')">
			<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
				<center><h1><b>Write Here!</b></h1></center>

			   <p> <center><h4>This is a platform where you are free to write anything that comes in your mind. Please do write and share your thoughts. <h4>
				</center></p>
		</div>
		</div>
		</div>
		</div>
	</header>

<header class="header-a">
	<div class="grid-container">
			<div class="grid-width-100">
				
					<form method="post">
					
					 <?php
								 $query_contents = mysql_query("select * from contents
																	where post_id= '$get_id' order by date DESC
																	")or die(mysql_error());
								$row = mysql_fetch_array($query_contents);
								 $id = $row['post_id'];
								 ?>
					
					      <div><label for='title'>Heading :  </label><br>
                                <textarea name="heading"><?php echo $row['heading']; ?></textarea></div>
								
						<div> <label for='title'>Subheading: </label><br/>
                                <textarea name="subheading">  <?php echo $row['subheading']; ?></textarea></div>
							  
								
								<input type="hidden" name="id" value="<?php echo $id; ?>">
							<div><label for='title'>Contents </label><br/>	<textarea name="contents" id="editor"><?php echo $row['contents'];?></textarea>
						
							</div>
								
								<center><button name="post" class="btn btn-info"><i class="icon-check icon-large"></i> Post</button></center>
						</form>
						
		             <?php
									if (isset($_POST['post']) ){
									$contents = $_POST['contents'];
									$heading = $_POST['heading'];
									$subheading = $_POST['subheading'];
									$id=$_POST['id'];
									mysql_query("update contents set heading = '$heading' where post_id='$id' ")or die(mysql_error());	
									mysql_query("update contents set subheading = '$subheading' where post_id='$id' ")or die(mysql_error());
									mysql_query("update contents set contents = '$contents' where post_id='$id' ")or die(mysql_error());	  
								 
					?>				
								<script>
									window.location = 'dashboard.php';
									</script>
									<?php
									}
									?>		
			</div>
		</div>
		
</header>

	<?php include('script.php'); ?>
<script>
	initSample();
</script>


 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>

</body>
</html>
