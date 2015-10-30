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
			<header class="intro-header" style="background-image: url('img/write.jpg')">
			<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
				<center><h1><b>Write Here!</b></h1></center>

			   <p> <center>This is a platform where you are free to write anything that comes in your mind. Please do write and share your thoughts. 
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
					      <div><label for='title'>Heading :  </label><br>
                                <textarea name="heading"></textarea></div>
								
						<div> <label for='title'>Subheading : </label><br/>
                                <textarea name="subheading"></textarea></div>
							<input type="hidden" name="id">
							<label for='title'>Contents : </label><br/>	<textarea name="content" id="editor"></textarea>
								<br/>
								<center><button name="post" class="btn btn-info"><i class="icon-check icon-large"></i> Post</button></center>
						</form>
						
		             <?php
									if (isset($_POST['post']) ){
									$content = $_POST['content'];
									$heading = $_POST['heading'];
									$subheading = $_POST['subheading'];
									
									mysql_query("insert into contents (user_id,name,contents,date,heading,subheading) values('$session_id','$name','$content',NOW(),'$heading','$subheading')")or die(mysql_error());
						         
								 
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

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php
								 $query_content = mysql_query("select * from contents
																	where user_id = '$session_id'   order by date DESC
																	")or die(mysql_error());
								 while($row = mysql_fetch_array($query_content)){
								 $id = $row['post_id'];
			 ?>
<form method="post">               
			   <div class="post-preview">
                    <a href="post.php<?php echo '?id='.$id; ?>">
                        <h2 class="post-title">
                            <?php echo $row['heading']; ?>
                        </h2>
                        <h3 class="post-subtitle">
                           <?php echo $row['subheading']; ?>
                        </h3>
                    </a>
					<p class="post-meta">Posted by me on <?php echo $row['date']; ?>
					 <a  href="edit_post.php<?php echo '?id='.$id; ?>" ><i class="icon-pencil"></i> </a>
				     <a class="btn btn-link" href="remove_post.php<?php echo '?id='.$id; ?>" ><i class="icon-remove"></i> </a>
					 	</p>
		        						
						</div>
						</form>
								<?php } ?>
           
            </div>
        </div>

    </div>
	<?php include('script.php'); ?>
<script>
	initSample();
</script>


 <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>

</body>
</html>
