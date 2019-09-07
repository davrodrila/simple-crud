<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>
    <?php
    include('views/base/styles.php');
    ?>
</head>
<body>
    <?php
        include('views/base/navbar_guest.php');
    ?>
    <?php
        echo "Invalid URL.";
    ?>
    <?php
    include('views/base/scripts.php');
    ?>
</body>
</html>


