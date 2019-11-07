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

        .clear{
            clear : both;
        }

    </style>
</head>
<body>
    
    <?php 
    $angka = [
        [1,2,3],
        [4,5,6,7],
        [8,9,0]
];
    ?>

    <?php
    echo $angka [0][2];
    echo "<br>";
    ?>

    <?php foreach($angka as $a) :?>
        <?php foreach($a as $b) :?>
            <div class="kotak"> <?= $b;?> </div>
        <?php endforeach; ?>
        <div class="clear"></div> 
    <?php endforeach; ?>



    <?php
    // $didin = [["mohammad ainun ardiansyah","jember, 17 april 1999","tif"],
    //             ["didin","jember","polije"]
    //             ];

    // array associative
        $didin = [
            [
            "nama" => "mohammad ainun ardiansyah",
            "asal" => "jember", 
            "blabla" => "17 april 1999",
            "sekolah" => "tif",
            "nilai" => [100, 100, 100]
            ],
            [
            "nama" => "mohammad ainun ardiansyah",
            "asal" => "jember", 
            "blabla" => "17 april 1999",
            "sekolah" => "tif",
            "nilai" => [100, 90, 100]
            ]
        ];

        echo $didin [1] ["nilai"] [1];
    ?>

    <h1>data diri</h1>
    <?php
        foreach ($didin as $ansyah) : ?>

    <ul>
        <li>nama : <?= $ansyah ["nama"];?></li>
        <li>blabla : <?= $ansyah ["asal"];?></li>
        <li>sekolah : <?= $ansyah ["sekolah"];?></li>
    </ul>
    <?php endforeach;?>
</body>
</html>