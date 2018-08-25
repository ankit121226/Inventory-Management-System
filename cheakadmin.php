<?php
session_start();

	$connection= mysql_connect("localhost","root","");
	$username=$_POST['username'];
	$password=$_POST['password'];
if($connection)
	{
		if(mysql_select_db("inventory",$connection))	
		{	
			$query="select * from tbl_user_master where userPassword='$password'";
			$result=mysql_query($query,$connection);
            $row=mysql_fetch_array($result);
			
            if($password===$row["userPassword"])	
			{
				$_SESSION['id'] = $row['id'];
				header("location:index.php");
			}	
			else 
			     echo "invalid username or password";	 
		}
		
		
	
	}
	
	?>	
	
	