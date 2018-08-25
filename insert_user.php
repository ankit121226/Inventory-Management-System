<?php
$userName=$_POST["userName"];
$userPassword=$_POST["userPassword"];



$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{


$query= "INSERT INTO tbl_user_master(userName,userPassword)
 VALUES ('$userName',$userPassword)";
 
 
 $result=mysql_query($query,$connection);
 
 if($result)
	 header("location:userMaster.php");
 else
	 echo mysql_error();
	}
 }
 
 
 
 



?>