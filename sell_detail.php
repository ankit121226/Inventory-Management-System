<!DOCTYPE html>
<html>
<head>
<title>
sell Detail
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
			
			
			    $sql1 = "select * from tbl_sell_master where id='$var'";
						$result1 = mysql_query($sql1,$connection);
						if($result1)
							$row1 = mysql_fetch_array($result1);
			
			$query="select * from tbl_sell_master where id='$var'";
			$result=mysql_query($query,$connection);
			$row = mysql_fetch_array($result);
			echo "invoiceNo:  ";            echo $row['invoiceNo'];  echo "<br>";echo "<br>";
			echo "invoice Date:  ";         echo $row['invoiceDate'];  echo "<br>";echo "<br>";
			echo "Customer Name:  ";        echo $row['customerName'];  echo "<br>";echo "<br>";
            echo "Customer Mobile:  ";      echo $row['mobile'];echo "<br>";echo "<br>";
			echo "Customer Address:  ";     echo $row['address'];echo "<br>";echo "<br>";
			
            			
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
$sql = "select * from tbl_sell_detail where sellId='$var'";
$result = mysql_query($sql,$connection);
if($result)
while($row = mysql_fetch_array($result))
{
	$productId=$row['productId'];
	$sql3="select sellingPrice, max(dateOfEffect) as dateOfEffect from tbl_sell_price where productId='$productId' and
	dateOfEffect IN (select max(dateOfEffect) from tbl_sell_price where dateOfEffect <= now() and productId='$productId')";
$result3 = mysql_query($sql3,$connection);
$row3 = mysql_fetch_array($result3);
?>
<tr>
	<td><?php echo $row['productId']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td><?php echo $row3['sellingPrice']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td><?php echo $row['quantity']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td><?php echo $row['totalAmount']; ?></td>&nbsp;&nbsp;&nbsp;&nbsp;
</tr>
                   
<?php
}
?>
</table>
<br>
<form action = "sell_detail_insert_database.php?id=<?php echo $var; ?>" method= "POST">

	

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
	   
	
	quantity:<input type="text" name="quantity"><br><br>
	
	<input type="submit" name="submit"><br><br>

   </form>
   </body>
   </html>
