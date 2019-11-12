<!-- <?php
$x = 11;

function tampilx(){
    global $x;
    echo $x;
}

tampilx();
echo $_SERVER ["SERVER_NAME"];
?> -->

<?php
$datadiri=[
    [
        "nama" => "didin",
        "ttl" => "jember",
        "sekolah" => "polije"
    ],
    [
        "nama" => "ainun",
        "ttl" => "tegal besar",
        "sekolah" => "tif"
    ]
    ];
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
<h1>data diri</h1>
<?php foreach ($datadiri as $dd) :?>
    <ul>
    <li>
    <a href="didin.php?nama=<?= $dd["nama"];?>"><?= $dd["nama"]; ?></a>
    </li>
    </ul>
<?php endforeach; ?>
</body>
</html>