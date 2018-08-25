<?php
session_start();
$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
{
	
	
$customerName = $_POST['customerName'];
$customerMobile = $_POST['customerMobile'];
$customerAddress = $_POST['customerAddress'];
$userId=$_SESSION['id'];
$sql2 = "SELECT invoiceNo FROM tbl_sell_master ORDER BY id DESC LIMIT 1";
			$result2 = mysql_query($sql2,$connection);
			$row2 = mysql_fetch_array($result2);
			$invoiceno = $row2['invoiceNo'] + 1;



$query= "INSERT INTO tbl_sell_master(customerName,mobile,address,invoiceNo,invoiceDate,userId)
 VALUES ('$customerName','$customerMobile','$customerAddress','$invoiceno',now(),$userId)";
 
 
 $result=mysql_query($query,$connection);
 if($result)
	 $sql = "select id from tbl_sell_master where invoiceNo='$invoiceno'";
	$result=mysql_query($sql,$connection);
	$row = mysql_fetch_array($result);
	
	header("location:sell_detail.php?id=".$row['id']);
	 
	
}
}
 ?>