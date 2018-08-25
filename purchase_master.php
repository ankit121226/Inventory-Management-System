<!DOCTYPE html>
<html>
<head>
<title>
purchase mster detail
</title>

</head>
<body>

<?php


   $connection= mysql_connect("localhost","root","");
	if($connection!=false)
	{

		if(mysql_select_db("inventory",$connection))
		{
			$query="select * from tbl_supplier_master";
			$result=mysql_query($query,$connection);
		}
	}
?>

    <form action = "purchase_master_insert_database.php" method= "POST">
	

    supplier Name:<select name="supplierName" >
	  <?php
	  while($row=mysql_fetch_array($result))
		  {
	  ?>
	  <option value="<?php echo $row['id'];?>"><?php echo $row['supplierName'];?></option>
       <?php
		  }
	   ?>
	   </select><br>
	   
	Purchase Invoive Date:<input type="date" name="purchaseInvoiceDate"><br>
	Invoice Number:<input type="text" name="invoiceNumber"><br>
	Stock Entry Date:<input type="date" name="stockEntryDate"><br>
	Submit<input type="submit" name="submit"><br>

   </form>
   </body>
   </html>
