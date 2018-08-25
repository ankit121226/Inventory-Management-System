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
		  <th>name</th>
		 <th>unit</th>
		 
	 </tr>
	 <a href="list_of_product.php" class="button">back </a>

	<?php


	$connection= mysql_connect("localhost","root","");
	if($connection!=false)
	{
		if(mysql_select_db("inventory",$connection))
		{
			$individual= $_GET['id'];
			
			$query="select p.id as id1 , p.productName, u.unitName from tbl_product_master as p inner join tbl_unit_master as u on p.unitid=u.id 
			where p.id=$individual";
			
			$result=mysql_query($query,$connection);

			$col =mysql_fetch_array($result)
			?>
			<tr>
			
				<td><?php echo $col["productName"];?></td>
				<td><?php echo $col["unitName"];?></td>
				
				
				
			 </tr>		
	<?php
		}
	}
	?>
	</table>
</body>
</html>

