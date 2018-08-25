<?php
$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
{
	
	
$supplierName = $_POST['supplierName'];
$supplierMobile = $_POST['supplierMobile'];
 $id=$_GET['id'];

$query= "update tbl_supplier_master set
			supplierName='$supplierName',supplierMobile='$supplierMobile' where id ='$id'";
 
 
 $result=mysql_query($query,$connection);
 if($result)
	 
	header("location:list_of_supplier.php");
}
}
 ?>