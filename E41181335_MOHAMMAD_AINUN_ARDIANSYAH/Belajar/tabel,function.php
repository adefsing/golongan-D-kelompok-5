<!DOCTYPE html>
<html lang="en">

<?php

    function salam ($waktu, $nama = "didin"){
        return "Selamat $waktu, $nama!!";
    }

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>

<body>
    <h1><?= "halo "; 
    echo salam("siang", "ardiansyah");?></h1>

    <table border="1" cellpadding="10" cellspacing="1">
        <?php
            for ( $i=1; $i <= 10; $i++) {
                echo "<tr>";
                for ($j=1; $j<=10; $j++){
                    echo "<td> $i, $j </td>";
                } 
                echo "</tr>";

            }
                
        ?>

    </table>
    <br>
    <?php echo date ("l", mktime (0,0,0,7,13,2000));
    ?>
    <br>
    <table border="1" cellpadding="10" cellspacing="1">
        <?php for ( $a=1; $a <=10; $a++ ) { ?>
        <tr>
        <?php for ($b=1; $b <=10; $b++) { ?>
        <td> <?php echo "$a, $b"; ?> </td>
        <?php } ?>
        </tr>
        <?php } ?>
    </table>
</body>

</html>