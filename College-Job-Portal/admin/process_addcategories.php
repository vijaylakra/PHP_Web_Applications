<?php session_start();
if(!(isset($_SESSION['status']) && $_SESSION['unm']=='admin'))
{
	header("location:../index.php");
}
if(empty($_POST))
{
	exit;
}
$msg=array();

if(empty($_POST['nm']))
{
	$msg[]="One of the field is empty";
}

if(!empty($msg))
{
	echo "<b>Errors:</b><br>";
	foreach($msg as $k)
	{
		echo "<li>".$k;
	}
}
else
{
	$link=mysql_connect("localhost","jobportal","123") or die("can't connect");
	mysql_select_db("jobscope",$link) or die("cant select db");
	$nm=$_POST['nm'];
	$q="insert into categories(cat_nm)values('$nm')";
	mysql_query($q, $link) or die("wrong query");
	mysql_close($link);
	header("location:category.php");
}