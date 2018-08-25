<!DOCTYPE html>
<html>
<head>
<title>
stock till date
</title>


<body>
<table>
  <tr>
  <th>serial no</th>
  <th>product name</th>
 <th>stock till date</th>

 
 </tr>

<?php

$endingdate=$_POST['endingdate'];

$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{
$query="select * from tbl_product_master";

$result=mysql_query($query,$connection);
if($result!=false)
	{
	$sql="select * from tbl_product_master";
	$result=mysql_query($sql,$connection);
	$i=0;
		while($col =mysql_fetch_array($result))
			{
				$i++;
				$id=$col["id"];
				$sql1="SELECT SUM(quantity) as totalpurchase from tbl_purchase_detail INNER JOIN tbl_purchase_master ON
 tbl_purchase_master.id= tbl_purchase_detail.productId WHERE tbl_purchase_master.stockEntryDate<'$endingdate' AND tbl_purchase_detail.productId='$id'";
				$result1=mysql_query($sql1,$connection);
				$col1 =mysql_fetch_array($result1);
				
				$sql2=" SELECT SUM(quantity) as totalsell from tbl_sell_detail INNER JOIN tbl_sell_master ON tbl_sell_master.id=
				tbl_sell_detail.sellId WHERE
                tbl_sell_master.invoiceDate<'$endingdate' AND tbl_sell_detail.productId='$id'";
				$result2=mysql_query($sql2,$connection);
				$col2 =mysql_fetch_array($result2);
				$stock=$col1["totalpurchase"]-$col2["totalsell"];
			
				?>
				
			<tr>
			
			<td><?php echo $i;  ?></td>
			<td><?php echo $col["productName"];?></td>
			<td><?php echo $stock;?></td>
			
			
			
			
            </tr>
			
<?php				
				
		    }
			?>
			</table>
			<?php
    }
	else 
		echo "not executed";
	
	}
	else 
		echo "not executed";
	}
?>
