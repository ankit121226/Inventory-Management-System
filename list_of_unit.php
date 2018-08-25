<!DOCTYPE html>
<html>
<head>
<title>
List of unit
</title>
<style>
table, td,th{
    border: 1px solid black;
	 padding: 15px;
}
</style>
</head>
<body>
<form action = "add_unit.php" method= "POST" >

    <button type="submit" value="add_unit.php">Add New Unit</button>

   </form>
   

<table>
  <tr>
	<th>serial no</th>
	<th>unit</th>
  </tr>

<?php


$connection= mysql_connect("localhost","root","");
if($connection!=false){

if(mysql_select_db("inventory",$connection))
	{
$query="select * from tbl_unit_master";




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
					<td><?php echo $col["unitName"];?></td>
			
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
