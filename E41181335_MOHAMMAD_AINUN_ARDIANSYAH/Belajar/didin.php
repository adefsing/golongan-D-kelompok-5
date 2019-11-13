<?php
if (!isset($_GET["nama"])||
    !isset($_GET["ttl"]) ||
    !isset($_GET["sekolah"])) {

        header("Location: get.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    <li><?= $_GET["nama"]; ?></li>
    <li><?= $_GET["ttl"]; ?></li>
    <li><?= $_GET["sekolah"]; ?></li>
</ul>
</body>
</html>