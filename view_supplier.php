<DOCTYPE html>
<html>
<head>
<title>
view product
</title>
<style>
table, td,th{
    border: 1px solid black;
	 padding: 15px;
}
</style>
</head>
<body>
	<br>
	<table>
	<tr>
		  <th>Supplier Name</th>
		 <th>Supplier Mobile</th>
		 
	 </tr>
	 <a href="list_of_supplier.php" class="button">back </a>

	<?php


	$connection= mysql_connect("localhost","root","");
	if($connection!=false)
	{
		if(mysql_select_db("inventory",$connection))
		{
			$individual= $_GET['id'];
			
			$query="select * from tbl_supplier_master where id=$individual";
			
			$result=mysql_query($query,$connection);

			$col =mysql_fetch_array($result)
			?>
			<tr>
			
				<td><?php echo $col["1"];?></td>
				<td><?php echo $col["2"];?></td>
				
				
				
			 </tr>		
	<?php
		}
	}
	?>
	</table>
</body>
</html>

