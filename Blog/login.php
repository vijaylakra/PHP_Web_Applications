<?php

       mysql_select_db("blog",mysql_connect("localhost","root",""))or die(mysql_error());
	   session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
        
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);
		    $id = $row['user_id'];
		if( $num_row > 0 ) { 
		   $_SESSION['id']=$row['user_id'];
		   echo 'true';	
		}
		else 
		 {echo 'false';	}
				
		?>