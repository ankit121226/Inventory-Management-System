<!DOCTYPE html>
<html>
<head>
<title>
List of suppliers
</title>
<style>
table, td,th{
    border: 1px solid black;
	 padding: 15px;
}
</style>
</head>
<body>
    <form action = "add_new_supplier.php" method= "POST" >

    <button type="submit" value="add_new_supplier">Add New supplier</button>

   </form>

<table>
  <tr>
  <th>serial no</th>
  <th>Supplier Name</th>
 <th>Supplier Mobile</th>
 
 
 <th>edit</th>
 <th>view</th>
 <th>delete</th>
 
 </tr>

<?php


$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{
$query="select * from tbl_supplier_master";




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
			<td><?php echo $col[1];?></td>
			<td><?php echo $col[2];?></td>
			
			
			<td><a href="edit_supplier.php?id=<?php echo $col['id']; ?>"><?php echo "edit" ?></a></td>
		
			<td><a href="view_supplier.php?id=<?php echo $col['id']; ?>"><?php echo "view" ?></a></td>
			
			<td><a href="delete_supplier.php?id=<?php echo $col['id']; ?>"><?php echo "delete" ?></a></td>
			
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
