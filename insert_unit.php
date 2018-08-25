<?php
$name=$_POST["unitName"];



$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{


$query= "INSERT INTO tbl_unit_master(unitName)
 VALUES ('$name')";
 
 
 $result=mysql_query($query,$connection);
 
 if($result)
	 header("location:list_of_unit.php");
 else
	 echo mysql_error();
	}
 }
 
 
 
 



?>