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
    <title>Item Search</title>
    <link rel="stylesheet" rev="stylesheet" href="_css/style.css"/>
    <script type="text/javascript" src="_script/jquery.js"></script>
    <script type="text/javascript" src="_script/jquery.watermarkinput.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $(".search").keyup(function () {
                var searchbox = $(this).val();
                var dataString = 'searchword=' + searchbox;

                if (searchbox == '') {
                } else {
                    $.ajax({
                        type: "POST",
                        url: "search-Suggestion.php",
                        data: dataString,
                        cache: false,
                        success: function (html) {
                            $("#display").html(html).show();
                        }
                    });
                }
                return false;
            });
        });

        jQuery(function ($) {
            $("#searchbox").Watermark("Search");
        });
    </script>
</head>

<body>
<p><a href="advancedsearch.php">Advanced Search</a></p>

<p> Search:</p>
<div id="search">

    <input type="text" class="search" id="searchbox" size="100"/>
    <br/>
    <div id="display"></div>

</div>

</body>

</html>

