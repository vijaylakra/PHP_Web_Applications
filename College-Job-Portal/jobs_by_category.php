<?php session_start();


	$link=mysql_connect("localhost","jobportal","123") or die("cant connect");
	mysql_select_db("jobscope",$link) or die("can't select db");

		
	$q = "select * from jobs where j_category ='".$_GET['cat']."' and j_active=1";
	
	$res = mysql_query($q,$link) or die("Wrong Query");
	

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
include("includes/head.inc.php");
?>
</head>
<body>
<div id="header-wrapper">
	<div id="header">
	<div id="menu">
		<?php
		include("includes/menu.inc.php");
		?>
		</div>
		<!-- end #menu -->
		
	</div>
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
	<?php
	include("includes/logo.inc.php");
	?>
	</div>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<hr />
			<!-- end #logo -->
			<div id="content">
				<div class="post">
					
					<h2 class="title"><?php echo $_GET['cat']; ?></h2>
					<p class="meta"></p>
					<div class="entry">
					<ul>		
					<?php
						while($row = mysql_fetch_assoc($res))
						{
						
							echo '
										<li>
										<a href="job_details.php?id='.$row['j_id'].'">'.$row['j_title'].'</a>
								';
						}
						
					?>
					</ul>
					</div>
				</div>
				
			</div>
			<!-- end #content -->
			<div id="sidebar">
			<?php
		include("includes/sidebar.inc.php");
		?>	
			</div>
			<!-- end #side bar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
	</div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
	<div id="footer">
		<?php
		include("includes/footer.inc.php");
		?>	
	</div>
</div>
<!-- end #footer -->
</body>
</html>
