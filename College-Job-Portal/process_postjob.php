<?php session_start();

        
	if(empty($_POST))
	{
		exit;
	}
	$msg=array();
	if(empty($_POST['title'])|| empty($_POST['cat'])||empty($_POST['hours'])||
	empty($_POST['salary'])|| empty($_POST['experience'])|| empty($_POST['disc'])|| empty($_POST['city']))
	{
		$msg[]="one of your field is empty";
	}
	
	if(!is_numeric($_POST['hours']))
	{
		$msg[]="only numeric valueis valid";
	}
        if($_FILES['document']['error']>0)
	{
		$msg[] = "error uploading file";
	}
	
	if(file_exists("jobs/".$_FILES['document']['name']))
	{
		$msg[] = "this file is already uploaded.";
	}
	
     if((strtoupper(substr($_FILES['document']['name'],-4))=='.pdf'))
	{
		$msg[] = "wrong file type";
	}
	
        
	if(!empty($msg))
	{
		echo "<b> errors:</b><br>";
		foreach($msg as $k)
		{
			echo "<li>".$k;
		}
	}
	else
	{
		$link=mysql_connect("localhost","jobportal","123")or die("can not connect");
		mysql_select_db("jobscope",$link) or die("can not select database");
		
		$title=$_POST['title'];
		$cat=$_POST['cat'];
		$hours=$_POST['hours'];
		$salary=$_POST['salary'];
		$experience=$_POST['experience'];
		$disc=$_POST['disc'];
		$city=$_POST['city'];
		move_uploaded_file($_FILES['document']['tmp_name'],"jobs/".$_FILES['document']['name']);
		$path = "jobs/".$_FILES['document']['name'];
                
		$q="insert into jobs(j_title,j_owner_name,j_category,j_hours,j_salary,j_experience,j_discription,j_city,j_document)
		   values ('$title','".$_SESSION['unm']."','$cat','$hours','$salary','$experience','$disc','$city','$path')";
		   
		mysql_query($q,$link)or die(mysql_error());
		mysql_close($link);
		header("location:postjob.php");
	}
	
?>