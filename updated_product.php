<?php
$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
{
	
	
$productName = $_POST['productName'];
$unitId = $_POST['unitId'];
 $id=$_GET['id'];

$query= "update tbl_product_master set
			productName='$productName',unitId='$unitId' where id ='$id'";
 
 
 $result=mysql_query($query,$connection);
 if($result)
	 
	header("location:list_of_product.php");
}
}
 ?>