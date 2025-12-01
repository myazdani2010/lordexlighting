<?php

// Inialize session
session_start();

// Include database connection settings
include('config.inc');

// Retrieve username and password from database according to user's input
// $login = mysqli_query("SELECT * FROM user WHERE (username = '" . mysqli_real_escape_string($_POST['username']) . "') and (password = '" . mysqli_real_escape_string(md5($_POST['password'])) . "')");

// Check username and password match
// if (mysqli_stmt_num_rows($login) == 1) {
//         // Set username session variable
//         $_SESSION['username'] = $_POST['username'];
//         // Jump to secured page
//         header('Location: securedpage.php');
// }
// else {
//         // Jump to login page
//         header('Location: index.php');
// }


if ($result = $mysqli->query("SELECT * FROM user WHERE (username = '" . $mysqli->real_escape_string($_POST['username']) . "') and (password = '" . $mysqli->real_escape_string(md5($_POST['password'])) . "')")) {

    if ($result->num_rows >= 1) {
        // Set username session variable
        $_SESSION['username'] = $_POST['username'];
        // Jump to secured page
        header('Location: securedpage.php');
    } else {
        // Jump to login page
        header('Location: index.php');
    }

}

?>
