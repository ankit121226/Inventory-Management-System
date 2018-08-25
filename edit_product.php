<!DOCTYPE html>
<html>
<head>
<title>
edit datail
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
			$query="select * from tbl_product_master where id='$individual'";
			$result=mysql_query($query,$connection);

			$col =mysql_fetch_array($result);
			$productName = $col["productName"];
			$unitId = $col["unitId"];
		
			
			?>
			
			
			
<?php
		}
	}
	?>
	
<form action = "updated_product.php?id=<?php echo $individual; ?>" method= "POST" >
  
      productname:<input type="text" name="productName" value="<?php echo $productName;?>"><br>
	  
      unit:<input type = "text" name= "unitId" value="<?php echo $unitId;?>"><br>
	 
	  
	 
	  <input type="submit" value="update"><br>
	   
	   
	   

</form>


</body>
</html>
