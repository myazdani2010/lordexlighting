<?php
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: index.php');
}

// Include database connection settings

 include('config.inc');

?>
<html>

<head>
<title>Inventory Search</title>
<link rel="stylesheet" rev="stylesheet" href="script.css" />
<script src="imageView.js" type="text/javascript"></script>
</head>

<body>
	
	<table border="0">
	   <tr bgcolor="#999999" align="center">
			<td>ID</td>
			<td>ITEM#</td>
            <td>PICTURE</td>
			<td>ALU</td>
			<td>ITEM NAME</td>
			<td>COLOR</td>
			<td>SIZE</td>
			<td>DEP</TD>
            <td>VENDOR</TD>
			<td>UNIT</td>
			<td>QTY</td>
            <td>PRICE CODE</td>
            <td width="200">DESCRIPTION</td>
			
	   </tr>
<?php

	$searchIn = $_GET["searchin"];
	$searchFor = $_GET["searchitem"];
	
	
	//$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
	$words = explode(" ", $searchFor);

	/*foreach ($words as $value)
	{
		echo $value; 
	} */

	$searchsize=sizeof($words);
	
// Retrieve username and password from database according to user's input
if($searchIn != "All")
{
	if($searchIn == 'ALU' || $searchIn == 'ItemName' || $searchIn == 'Attribute' || $searchIn == 'ItemDescription' || $searchIn == 'Location')
	{
		$exe = "select * from inventory where $searchIn like ";

		for($i=0; $i<$searchsize-1; $i++ )
		{
			$exe=$exe." '%$words[$i]%' and $searchIn like";
		}

		$exe=$exe." '%$words[$i]%' order by ItemNo";

	}
	else
	{
		//$exe = "select * from inventory where $searchIn like '$searchFor'";
		$exe = "select * from inventory where $searchIn like '$searchFor' order by ItemNo";
	}

	echo "<h2>Search Result of  <u>$searchFor</u>  In  <u>$searchIn</u> .</h2> <br/>";
}
else
{
	$exe = "select * from inventory order by ItemNo";
	echo "<h2>All Items.<br/>";
}

$sql = mysql_query($exe);
//$sql = mysql_query("select * from inventory where CONTAINS('$searchFor')> 0");


$i = 0;
$bgcolor = "\"#FFFFFF\"";
	while ($row = mysql_fetch_array($sql)){
		$i= $i + 1;
		if(($i % 2) == 0)
		{
			$bgcolor = "\"#EEEEEE\"";
		}
		else
		{
			$bgcolor = "\"#CEE7FF\"";
		}
		echo'<tr bgcolor='.$bgcolor.'>';
			echo '<td bgcolor="#999999">'.($i).'</td>';
			echo '<td><a href="images/items/'.$row['ItemNo'].'.jpg" >'.$row['ItemNo'].'</a></td>';
            echo '<td><img src="images/items/small/'.$row['ItemNo'].'_small.JPG"/> </td>';
			echo '<td>'.$row['ALU'].'</td>';
			echo '<td>'.$row['ItemName'].'</td>';
			echo '<td>'.$row['Attribute'].'</td>';
			echo '<td>'.$row['Size'].'</td>';
			echo '<td>'.$row['DepartmentName'].'</td>';
			echo '<td>'.$row['Vendor'].'</td>';
			echo '<td>'.$row['Unit'].'</td>';
			echo '<td>'.$row['QTY'].'</td>';
			echo '<td>'.$row['PriceCode'].'</td>';
			echo '<td>'.$row['ItemDescription'].'</td>';
		echo '</tr>';
	}
	echo '<p>'.$i.' Record Found.</p>';
?>
</table>
<div id="imgbox"> </div>
</body>

</html>