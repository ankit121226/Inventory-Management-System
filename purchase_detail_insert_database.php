<?php
	$productId=$_POST['productName'];
    $unitPrice=$_POST['unitPrice'];
	$quantity=$_POST['quantity'];
	$totalAmount=$_POST['totalAmount'];
	$id = $_GET['id'];
	

$connection= mysql_connect("localhost","root","");
if($connection!=false)
{

if(mysql_select_db("inventory",$connection))
	{
	$sql1 = "select * from tbl_purchase_master where id='$id'";
	$result1 = mysql_query($sql1,$connection);
	$row1 = mysql_fetch_array($result1);
	$grandtotal = $row1['grandTotal'] + $totalAmount;
	echo $grandtotal;
	
	
	$sql1 = "update tbl_purchase_master set
				grandTotal='$grandtotal' where id='$id'";
	$result1 = mysql_query($sql1,$connection);
	
	
	
	
	$sql= "select max(id) as id from tbl_purchase_master";
	$result = mysql_query($sql, $connection);
	$row = mysql_fetch_array($result);
	$purchasemasterid = $row['id'];

$query= "INSERT INTO tbl_purchase_detail(purchaseMasterId,productId,unitPrice,quantity,totalAmount)
VALUES ('$purchasemasterid','$productId','$unitPrice','$quantity','$totalAmount')";
 
$result=mysql_query($query,$connection);
 
if($result)
{
	$sql1 = "select id from tbl_purchase_master where id=$purchasemasterid";
	$result1 = mysql_query($sql1, $connection);
	$row1 = mysql_fetch_array($result1);
	$id = $row['id'];
	 header("location:purchase_detail.php?id=".$id);
}
 else
	 echo mysql_error();
	}
 }
 
 
?>