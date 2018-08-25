<!DOCTYPE html>
<html>
<head>
<title>
edit supplier detail
</title>
<style>
table, td,th{
            border: 1px solid black;
	        padding: 15px;
            }
</style>
</head>
<body>
<?php


	$connection= mysql_connect("localhost","root","");
	if($connection!=false)
	{
		if(mysql_select_db("inventory",$connection))
		{
			$individual= $_GET['id'];
			$query="select * from tbl_supplier_master where id='$individual'";
			$result=mysql_query($query,$connection);

			$col =mysql_fetch_array($result);
			$supplierName = $col["supplierName"];
			$supplierMobile = $col["supplierMobile"];
		
			
			?>
			
			
			
<?php
		}
	}
	?>
	
<form action = "updated_supplier.php?id=<?php echo $individual; ?>" method= "POST" >
  
      Supplier Name:<input type="text" name="supplierName" value="<?php echo $supplierName;?>"><br>
	  
      Supplier Mobile:<input type = "text" name= "supplierMobile" value="<?php echo $supplierMobile;?>"><br>
	 
	  
	 
	  <input type="submit" value="update"><br>
	   
	   
	   

</form>


</body>
</html>
