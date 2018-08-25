<?php
	$productId=$_POST['productName'];
	$quantity=$_POST['quantity'];
	$id=$_GET['id'];
	
	

$connection= mysql_connect("localhost","root","");
if($connection!=false)
{

if(mysql_select_db("inventory",$connection))
	{
		$query="select sellingPrice, max(dateOfEffect) as dateOfEffect from tbl_sell_price where productId='$productId' and dateOfEffect
		IN (select max(dateOfEffect) from tbl_sell_price where dateOfEffect <= now() and productId='$productId')";
$result = mysql_query($query,$connection);
$row = mysql_fetch_array($result);
$totalAmount=$row['sellingPrice'] * $quantity;

echo $_GET['id'];


		$sql1 = "select * from tbl_sell_master where id='$id'";
	$result1 = mysql_query($sql1,$connection);
	$row1 = mysql_fetch_array($result1);
	$grandtotal = $row1['grandTotal'] + $totalAmount;
	
	$sql1 = "update tbl_sell_master set
				grandTotal='$grandtotal' where id='$id'";
	$result1 = mysql_query($sql1,$connection);
	
		
	$sql= "select max(id) as id from tbl_sell_master";
	$result = mysql_query($sql, $connection);
	$row = mysql_fetch_array($result);
	$sellid = $row['id'];

$query= "INSERT INTO tbl_sell_detail(sellId,productId,quantity,totalAmount)
VALUES ('$sellid','$productId','$quantity','$totalAmount')";
 
$result=mysql_query($query,$connection);
 
if($result)
{
	$sql2 = "select id from tbl_sell_master where id=$sellid";
	$result2 = mysql_query($sql2, $connection);
	$row1 = mysql_fetch_array($result2);
	$id = $row['id'];
	 header("location:sell_detail.php?id=".$id);
	 
}
 else
	 echo mysql_error();
	}
 }
 
 
?>