<?php
	$productId=$_POST['productName'];
    $unitPrice=$_POST['unitPrice'];
	$quantity=$_POST['quantity'];
	$totalAmount=$_POST['totalAmount'];
	

$connection= mysql_connect("localhost","root","");
if($connection!=false)
{

if(mysql_select_db("inventory",$connection))
	{
		
	$sql= "select max(id) as id from tbl_sell_master";
	$result = mysql_query($sql, $connection);
	$row = mysql_fetch_array($result);
	$sellid = $row['id'];

$query= "INSERT INTO tbl_sell_detail(sellId,productId,unitPrice,quantity,totalAmount)
VALUES ('$sellid','$productId','$unitPrice','$quantity','$totalAmount')";
 
$result=mysql_query($query,$connection);
 
if($result)
{
	$sql1 = "select id from tbl_sell_master where id=$sellid";
	$result1 = mysql_query($sql1, $connection);
	$row1 = mysql_fetch_array($result1);
	$id = $row['id'];
	 header("location:sell_detail.php?id=".$id);
	 
}
 else
	 echo mysql_error();
	}
 }
 
 
?>