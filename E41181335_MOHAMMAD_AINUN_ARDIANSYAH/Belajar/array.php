<!-- <?php
// membuat array
$hari = array("senin", "selasa", "rabu", "kamis");
$us = ["aku", "kamu", "kita"];
$campuran = [17, "April", 1999, true]; 

// menampilkan array

// error echo $hari;

var_dump($hari);
echo "<br>";
print_r($us);
echo $campuran[0];
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .kotak {
            height : 30px;
            width : 30px;
            text-align : center;
            background-color : #BADA55;
            line-height : 30px;
            margin : 3px;
            float : left;
            transition : 1s;

        }

        .kotak:hover{
            transform : rotate(360deg);
            border-radius : 50%;
        }

    </style>
</head>
<body>
    
    <div class="kotak"> 5 </div>

</body>
</html>