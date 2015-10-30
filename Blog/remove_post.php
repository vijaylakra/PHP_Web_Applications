<?php
mysql_select_db("blog",mysql_connect("localhost","root",""))or die(mysql_error());
?>
<?php
$id=$_GET['id'];
mysql_query("delete from contents where post_id = '$id'")or die(mysql_error());
header("location:dashboard.php");
?>

