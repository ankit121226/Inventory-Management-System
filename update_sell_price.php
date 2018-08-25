<!DOCTYPE html>
<html>
<head>
<title>
update sell price
</title>

</head>
<body>

<?php


   $connection= mysql_connect("localhost","root","");
	if($connection!=false)
	{

		if(mysql_select_db("inventory",$connection))
		{
			$var=$_GET['id'];
			
						$sql1 = "select * from tbl_purchase_master where id='$var'";
						$result1 = mysql_query($sql1,$connection);
						if($result1)
							$row1 = mysql_fetch_array($result1);
						   
				
			
			$query="select * from tbl_purchase_master where id='$var'";
			$result=mysql_query($query,$connection);
			$row = mysql_fetch_array($result);
			
			echo "supplier Id:  ";           echo $row['id'];  echo "<br>";echo "<br>";
            echo "purchase Invoice Date:  ";   echo $row['purchaseInvoiceDate'];echo "<br>";echo "<br>";
			echo "invoice No:  "; 		    echo $row['invoiceNo'];echo "<br>";echo "<br>";
			echo "stock Entry Date:  "; 		echo $row['stockEntryDate'];echo "<br>";echo "<br>";
            			
			echo "Grand Total: ".$row1['grandTotal'];	
		}
	}
	
	
?>

<table>
<tr>
	<th>Product</th>&nbsp;&nbsp;&nbsp;&nbsp;
	<th>Unit Price</th>&nbsp;&nbsp;&nbsp;&nbsp;
	<th>Quantity</th>&nbsp;&nbsp;&nbsp;&nbsp;
	<th>Total</th>&nbsp;&nbsp;&nbsp;&nbsp;
</tr>
<?php
$sql = "select * from tbl_purchase_detail where purchaseMasterId='$var'";
$result = mysql_query($sql,$connection);
if($result)
while($row = mysql_fetch_array($result))
{	
?>
<tr>
	<td><?php echo $row['productId']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td><?php echo $row['unitPrice']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td><?php echo $row['quantity']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td><?php echo $row['totalAmount']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
</tr>
                    
<?php
}
?>
</table>
<br>
<form action = "purchase_detail_insert_database.php?id=<?php echo $var; ?>" method= "POST">
	

    Product Name:<select name="productName">
	  <?php
	  $query="select * from tbl_product_master";
	  $result=mysql_query($query,$connection);
	  while($row=mysql_fetch_array($result))
		  {
	  ?>
	  <option value="<?php echo $row['id'];?>"><?php echo $row['productName'];?></option>
       <?php
		  }
	   ?>
	   </select><br><br>
	   
	unit Price:<input type="text" name="unitPrice"><br><br>
	quantity:<input type="text" name="quantity"><br><br>
	Total Amount:<input type="text" name="totalAmount"><br><br>
	<input type="submit" name="submit"><br><br>

   </form>
   </body>
   </html>
