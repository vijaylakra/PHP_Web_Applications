<?php 
session_start();
$link=mysql_connect("localhost","jobportal","123")or die("can not connect");
mysql_select_db("jobscope",$link) or die("can not select database");

$q="select * from jobs where j_active=1 order by j_id desc ";
$res=mysql_query($q,$link);
if(!$res)
{ 
    die ('can not select database'. mysql_error());
}
mysql_close($link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    
<title>Jobs at NITT | National Institute of Technology Tiruchirappalli</title>

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
		
		<!-- end #search -->
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
					
					<h2 class="title"><center><b>WELCOME TO JOB PORTAL</b></center></h2>
					<p class="meta"></p>
					<div class="entry">
						
					</div>
				</div>
				
			</div>
			<!-- end #content -->
			<div id="sidebar">
			<?php
		include("includes/sidebar.inc.php");
		?>	
			</div>
			<!-- end #sidebar -->
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
