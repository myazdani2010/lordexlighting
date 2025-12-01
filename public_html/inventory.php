<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: index.php');
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory</title>

<style type="text/css">
<!--
body,td,th {
	font-size: 16px;
	font-family: Verdana, Geneva, sans-serif;
}

#left{
	float:left;

}
#right{
	float:left;
	margin-left:10px;
}
table tr td.head {
	background-color: #D7EBFF;
}
body {
	background-color: #ECF5FF;
}
	
-->
</style></head>
<body>

<form action="" method="get">
  <div id="left">
  <table width="200" border="0" >
  <tr>
    <td width="80" class="head">ID:</td>
    <td width="104"><input type="text" name="id" id="id" tabindex="1" size="5" maxlength="5"/></td>
  </tr>
  <tr>
    <td class="head">Name:</td>
    <td><input type="text" name="itemName" id="itemName" tabindex="2" maxlength="31" size="38"/></td>
  </tr>
  <tr>
    <td class="head">ALU:</td>
    <td><input type="text" name="alu" id="alu" tabindex="3" maxlength="20" size="25"/></td>
  </tr>
  <tr>
    <td class="head">Attribute:</td>
    <td><input type="text" name="attribute" id="attribute" tabindex="4" maxlength="12" size="18"/></td>
  </tr>
  <tr>
    <td class="head">Size:</td>
    <td><input type="text" name="size" id="size" tabindex="5" maxlength="12" size="18"/></td>
  </tr>
  <tr>
    <td class="head">Unit:</td>
    <td><input type="text" name="unit" id="unit" tabindex="6" maxlength="6" size="12"/></td>
  </tr>
  <tr>
    <td class="head">Dep:</td>
    <td><select name="depatment" id="depatment" tabindex="7"/>
    </td>
  </tr>
  <tr>
    <td class="head">QTY:</td>
    <td><input type="text" name="qty" id="qty" tabindex="8" maxlength="7" size="12"/></td>
  </tr>
  <tr>
    <td class="head">Location:</td>
    <td><input type="text" name="location" id="location" tabindex="9" maxlength="5" size="8"/></td>
  </tr>
</table>
<input name="lastId" type="button" value="Last ID" />
</div>
<div id="right">
<table width="200" border="0">
  <tr>
    <td class="head">Description:</td>
  </tr>
  <tr>
    <td><textarea name="description" id="description" tabindex="10" rows="4" cols="50"></textarea></td>
  </tr>
</table>
</div>
</form>

</body>
</html>
