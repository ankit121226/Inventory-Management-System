<!DOCTYPE html>
<html>
<head>
<title>
purchase Detail
</title>
<style>
table, td,th{
    border: 1px solid black;
	 padding: 15px;
}
</style>
</head>
<body>


<table>
  <tr>
  <th>serial no</th>
  <th>Product Name</th>
 <th>Sell Till <?php echo  $date=$_POST['date'];?></th>
 
 
 </tr>

<?php


$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{
		 $date=$_POST['date'];
$query="SELECT SUM(quantity) as totalsellquantity,productId FROM tbl_sell_detail INNER JOIN tbl_sell_master
 ON tbl_sell_master.id=tbl_sell_detail.sellId
 WHERE invoiceDate<='$date' GROUP by(productId)";



$result=mysql_query($query,$connection);
if($result!=false)
	{
		$i=0;
		while($col =mysql_fetch_array($result))
			{
				$i++;
				?>
			<tr>
			<td><?php echo $i;  ?></td>
			<td><?php echo $col["productId"];?></td>
			<td><?php echo $col["totalsellquantity"];?></td>
		
			
            </tr>			
<?php				
				
		    }
			
    }
	else 
		echo "not executed";
	
	}
	else 
		echo "not executed";
	}
?>

