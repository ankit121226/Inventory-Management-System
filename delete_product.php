<?php
	$connection= mysql_connect("localhost","root","");
	if($connection!=false)
	{
		if(mysql_select_db("inventory",$connection))
		{
			$individual= $_GET['id'];
			$query="delete from tbl_product_master where id= '$individual'";
			$result=mysql_query($query,$connection);

			if($result)
			
				header("location:list_of_product.php");
		}	
		
	}	
?>
	