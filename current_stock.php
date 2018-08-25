<html>
<head>
<title>
current Stock
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
    <th>sr no</th>
	<th>prduct Name</th>
	<th>Current Stock</th>
  </tr>

<?php


$connection= mysql_connect("localhost","root","");
if($connection!=false)
      

if(mysql_select_db("inventory",$connection))
	{
$query1=" SELECT * from purchasemasterdetail LEFT JOIN sellmasterdetail ON purchasemasterdetail.id=sellmasterdetail.id";
$result1=mysql_query($query1,$connection);
$i=0;
while($col =mysql_fetch_array($result1))
	{
		 $current_stock=$col["sumpurchasequantity"]-$col["sumsellquantity"];
	 
    
         $i++;
				?>
			<tr>
					<td><?php echo $i;  ?></td>
					<td><?php echo $col["productName"];?></td>
					<td><?php echo $current_stock;?></td>
					
			
			</tr>
			
<?php				
				
	}	   
	}
?>
</body>
</html>
