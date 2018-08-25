<!DOCTYPE html>
<html>
<head>
<title>
List of Prduct
</title>
<style>
table, td,th{
    border: 1px solid black;
	 padding: 15px;
}
</style>
</head>
<body>
    <form action = "add_new_product.php" method= "POST" >

    <button type="submit" value="add_new_product">Add New Product</button>

   </form>

<table>
  <tr>
  <th>serial no</th>
  <th>name</th>
 <th>unit</th>
 
 
 <th>edit</th>
 <th>view</th>
 <th>delete</th>
 
 </tr>

<?php


$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{
$query="select p.id as id1, p.productName,u.id as id2, u.unitName from tbl_product_master as p inner join tbl_unit_master as u on p.unitid=u.id";




$result=mysql_query($query,$connection);
if($result!=false)
	{
		$i=0;
		while($col =mysql_fetch_array($result))
			{
				$i++;
				?>
			<tr>
			<td><?php echo $i;  ?></td>
			<td><?php echo $col["productName"];?></td>
			<td><?php echo $col["unitName"];?></td>
			
			
			<td><a href="edit_product.php?id=<?php echo $col['id1']; ?>"><?php echo "edit" ?></a></td>
		
			<td><a href="view_product.php?id=<?php echo $col['id1']; ?>"><?php echo "view" ?></a></td>
			
			<td><a href="delete_product.php?id=<?php echo $col['id1']; ?>"><?php echo "delete" ?></a></td>
			
            </tr>			
<?php				
				
		    }
			
    }
	else 
		echo "not executed";
	
	}
	else 
		echo "not executed";
	}
?>
