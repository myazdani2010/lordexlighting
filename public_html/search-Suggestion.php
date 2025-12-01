<?php
include('config.inc');
if($_POST)
{

$q=$_POST['searchword'];

//Start new code 

/*trim() is removes spaces from the begining and end or strin.
preg_replace() is replacing the extra white space with single space*/
$q = preg_replace( '/\s+/', ' ', trim($q));

$str_array = explode(" ", $q); //creats arrrays of words
$array_count = count($str_array);
$i=0;
//End new code

$whereCondition = " WHERE ";

foreach($str_array as $word)
{
	//here we are keeping the condition to check a puticular word in different fields
	$whereCondition = $whereCondition."(ItemNo LIKE '".$word."%' OR ALU LIKE '%".$word."%' OR ItemName LIKE '%".$word."%' OR Attribute LIKE '%".$word."%' OR Size LIKE '%".$word."%' OR ItemDescription LIKE '%".$word."%' OR Vendor LIKE '%".$word."%') AND " ;
	
}

$whereCondition = rtrim($whereCondition, " AND ");

// $sql_res = mysql_query("SELECT * FROM inventory".$whereCondition."LIMIT 7");
// while($row = mysql_fetch_array($sql_res))
$sql_res = $mysqli->query("SELECT * FROM inventory".$whereCondition."LIMIT 7");
while($row = $sql_res->fetch_array(MYSQLI_ASSOC))
{
$itemNo=$row['ItemNo'];
$itemName=$row['ItemName'];
$attribute=$row['Attribute'];
$size=$row['Size'];
$img=$row['ItemNo']."_small.JPG";
$qty=$row['QTY'];

$re_itemNo='<b>'.$q.'</b>';
$re_itemName='<b>'.$q.'</b>';
$re_attribute='<b>'.$q.'</b>';
$re_size='<b>'.$q.'</b>';

$final_itemNo = str_ireplace($q, $re_itemNo, $itemNo);

$final_itemName = str_ireplace($q, $re_itemName, $itemName);

$final_attribute = str_ireplace($q, $re_attribute, $attribute);

$final_size = str_ireplace($q, $re_size, $size);

?>
<div id="display_box">
    <img src="images/items/small/<?php echo $img; ?>" />
    <b>#<?php echo $final_itemNo; ?>&nbsp;&nbsp;&nbsp;&nbsp;</b>
	<?php echo $final_itemName; ?>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo $final_attribute; ?>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $final_size; ?><br/>
    <span>
		<b><?php echo $qty; ?></b>
    </span>
</div>

<?php
}

}
else
{

}


?>
