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
<script type="text/javascript"> windows.onload=initAll; </Script>
<?php

$value['t1']="ItemNo";
$value['t2']="ALU";
$value['t3']="ItemName";
$value['t4']="Attribute";
$value['t5']="Size";
$value['t6']="DepartmentName";
$value['t7']="ItemDescription";
$value['t8']="Unit";
$value['t9']="QTY";

for($i=1 ; $i<=10 ; $i++)
{
	// **********  Start code from here ***********
	//$str="c".$i;

	if(!isset($_POST['c'.$i]))
	{
		$value['c'.$i] = 'off';
	}
	else
	{
		$value['c'.$i] = 'on';
		if(!isset($_POST['t'.$i]))
		{
			//header('Location: advancedsearch.php');
			echo "<script>alert('Please inset a text in ".$value['t'.$i]." or Uncheck the feeld. ')</script>";
		}
		
	}

	
}
?>
	
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
			<td>FINAL PRICE</td>
            <td width="200">DESCRIPTION</td>
			
	   </tr>

<?php

$exe = "select * from inventory where ";

for($i=1 ; $i<=10 ; $i++)
{
	if($value['c'.$i]=='on')
	{
		
		if(!isset($_POST['t'.$i]))
		{
			echo "<script>alert('Please inset a text in ".$value['t'.$i]." or Uncheck the feeld. ')</script>";
		}
		if($value['t'.$i] == 'ALU' || $value['t'.$i] == 'ItemName' || $value['t'.$i] == 'Attribute' || $value['t'.$i] == 'ItemDescription')
		{
			
			$words = explode(" ", $_POST['t'.$i]);
			$searchsize=sizeof($words);
			for($j=0; $j<$searchsize; $j++ )
			{
				$exe=$exe.$value['t'.$i]." like '%$words[$j]%' and ";
			}

			//$exe=$exe.$value['t'.$i]." like '%".$_POST['t'.$i]."%' and ";
		}
		else if ($value['t'.$i] == 'QTY')
		{
			$exe=$exe."(".$value['t9']." Between '".$_POST['t9']."' and '".$_POST['t91']."') and ";
		}
		else
		{
			$exe=$exe.$value['t'.$i]." like '".$_POST['t'.$i]."' and ";
		}
		//<input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
	}
}
$exe=trim($exe);
$exe=rtrim($exe,'and');
$exe=trim($exe);
$exe=$exe." order by ItemNo";
echo "</br>".$exe;


// $sql = mysql_query($exe);
$sql = $mysqli->query($exe);


$i = 0;
$bgcolor = "\"#FFFFFF\"";
	// while ($row = mysql_fetch_array($sql)){
	while ($row = $sql->fetch_array(MYSQLI_BOTH)){		
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
			echo '<td>'.$row['FinalPrice'].'</td>';
			echo '<td>'.$row['ItemDescription'].'</td>';
		echo '</tr>';
	}
	echo '<p>'.$i.' Record Found.</p>';
?>
</table>
<div id="imgbox"> </div>
</body>

</html>
