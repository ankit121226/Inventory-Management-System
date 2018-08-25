<?php
$name=$_POST["productname"];
$unit=$_POST["unit"];


$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{


$query= "INSERT INTO tbl_product_master(productName, unitid)
 VALUES ('$name','$unit')";
 
 
 $result=mysql_query($query,$connection);
 
 if($result)
	 header("location:list_of_product.php");
 else
	 echo mysql_error();
	}
 }
 
 
 
 



?>