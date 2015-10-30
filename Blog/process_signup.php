<?php

		$link=mysql_connect("localhost","root","")or die("can not connect");
		mysql_select_db("blog",$link) or die("can not select database");
	   if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['city']) && isset($_POST['country']) && 
	    isset($_POST['username']) && isset($_POST['password']) && isset($_POST['rpassword'])){
		
        $nm=$_POST['fullname'];
		$city=$_POST['city'];
		$country=$_POST['country'];
		
		$uname=$_POST['username'];
		$pwd=$_POST['password'];
   
       $cpassword = $_POST['rpassword'];
	

  if($pwd!= $cpassword){
      echo 'wrongpass'; 
    }
	
 else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_POST['email']))
  {
   //if it has the correct format whether the email has already exist
   $email= $_POST['email'];
   $sql1 = "SELECT * FROM user WHERE email = '$email'";
   $result1 = mysql_query($sql1) or die(mysql_error());
   if (mysql_num_rows($result1) > 0)
            {
            echo 'emailalreadyexist'; 
           }
    else{$q="insert into user(fullname,email,city,country,username,password)
	    values ('$nm','$email','$city','$country','$uname','$pwd')";
		   
		mysql_query($q,$link)or die("wrong query");
		mysql_close($link);
		echo 'true';}	   
  }
  else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_POST['email']))
  {
   echo 'emailnotvalid'; 
  }
 }
 else echo 'false';
	
	
?>