<?php

// Inialize session
session_start();

// Check if the 'username' key exists in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect the user to index.php if 'username' is not found in the session
    header('Location: index.php');
    exit();
}

?>
<html>

<head>
    <title>Secured Page</title>
</head>

<body>

<p>Session Started.</p>
<p><a href="search.php">Check Stock</a></p>
<p><a href="selectStocks.php">Select Stock</a></p>
<p><a href="logout.php">Logout</a></p>

</body>

</html>
