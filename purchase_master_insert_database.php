<?php
	session_start();
    $supplier=$_POST['supplierName'];
	
    $purchaseInvoiceDate=$_POST['purchaseInvoiceDate'];
	$invoiceNumber=$_POST['invoiceNumber'];
	$stockEntryDate=$_POST['stockEntryDate'];
	$userId=$_SESSION['id'];
	
	$connection= mysql_connect("localhost","root","");
if($connection!=false)
{

if(mysql_select_db("inventory",$connection))
	{
       

$query= "INSERT INTO tbl_purchase_master(supplierId, purchaseInvoiceDate,invoiceNo,stockEntryDate,grandTotal,userId)
 VALUES ('$supplier','$purchaseInvoiceDate','$invoiceNumber','$stockEntryDate','0',$userId)";
 
 
 $result=mysql_query($query,$connection);
 
 if($result)
	     {  
	$sql = "select id from tbl_purchase_master where invoiceNo='$invoiceNumber'";
	$result=mysql_query($sql,$connection);
	$row = mysql_fetch_array($result);
	$id = $row['id'];
	header("location:purchase_detail.php?id=".$row['id']);
	
	     }
	
	}
 }
 
 
?>
