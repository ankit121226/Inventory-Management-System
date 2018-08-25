<head>
<title>
Add New product
</title>
</head>
<?php


   $connection= mysql_connect("localhost","root","");
	if($connection!=false)
	{

		if(mysql_select_db("inventory",$connection))
		{
			$query="select * from tbl_unit_master";
			$result=mysql_query($query,$connection);
		}
	}
?>



<form action = "insert_product.php" method= "POST">
  
  Name: <input type="text" name="productname"><br>
  Unit<select name = "unit">
  <?php
	  while($row=mysql_fetch_array($result))
		  {
	  ?>
	  <option value="<?php echo $row['id'];?>"><?php echo $row['unitName'];?></option>
       <?php
		  }
	   ?>
	   </select><br>
  
  <button type="submit" value="submit">submit</button>
  </form>
  
  