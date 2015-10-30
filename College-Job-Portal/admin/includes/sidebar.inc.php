<ul>
					<li>
	
						<b>Login:</b><br> <input type="text">
						<br>
						<br>
						<b>Password:</b><br><input type"text">
					</li>
					<li>
						<h2>categories </h2>
						<ul>
						
<?php
$link=mysql_connect("localhost","jobportal","123")or die("can not connect");
mysql_select_db ("jobscope",$link) or die("can not select database");
$q="select * from categories";
$res=mysql_query($q,$link) or die("can't connect");
while($row=mysql_fetch_assoc($res))
{
	echo '<li><a href="jobs_by_category.php">'.$row['cat_nm'].'</a></li>';
}
mysql_close($link);
?>
						
					
							<li><a href="jobs_by_category.php">Teaching service</a></li>
							<li><a href="jobs_by_category.php">Non-Teaching service</a></li>
							<li><a href="jobs_by_category.php">Trainee</a></li>
							<li><a href="jobs_by_category.php">Junior Research Fellow (JRF)</a></li>
							<li><a href="jobs_by_category.php">Senior Research Fellow(SRF)</a></li>
							<li><a href="jobs_by_category.php">Technical</a></li>
							<li><a href="jobs_by_category.php">Security</a></li>
						    <li><a href="jobs_by_category.php">Doctor</a></li>
					                
						
						</ul>
					</li>
					
				</ul>