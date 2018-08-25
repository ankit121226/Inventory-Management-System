<?php
$name=$_POST["supplierName"];
$mobile=$_POST["supplierMobile"];


$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{


$query= "INSERT INTO tbl_supplier_master(supplierName, supplierMobile)
 VALUES ('$name','$mobile')";
 
 
 $result=mysql_query($query,$connection);
 
 if($result)
	 header("location:list_of_supplier.php");
 else
	 echo mysql_error();
	}
 }
 
 
 
 



?>