<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
// if (isset($_SESSION['username'])) {
//     header('Location: securedpage.php');
// }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>The Royal Light</title>
    <style type="text/css">
        body, td, th {
            font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
<p><img src="loading.jpg" width="948" height="344"/>
</p>
<p>&nbsp;</p>

<table width="400" border="0">
    <caption>
        <font size="+2" color="#003399"> The Royal Light</font>
    </caption>
    <tr>
        <td width="72">Add:</td>
        <td width="227">Shop No 42-44, Building No 3, Barwa Village, Doha, Qatar</td>
    </tr>
    <tr>
        <td>P.O.Box:</td>
        <td>82936</td>
    </tr>
    <tr>
        <td>Tel:</td>
        <td>+974 4412 3672 / +974 6653 5259</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>info@lordexlighting.com</td>
    </tr>
</table>
<form id='login' action='loginproc.php' method='post'>

    <legend>Login</legend>
    <input type='hidden' name='submitted' id='submitted' value='1'/>

    <label for='username'>UserName:</label>
    <input type='text' name='username' id='username' maxlength="50"/>

    <label for='password'>Password:</label>
    <input type='password' name='password' id='password' maxlength="50"/>

    <input type='submit' name='Submit' value='Login'/>
</form>

</body>
</html>