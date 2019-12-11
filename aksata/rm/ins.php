<?php
if(cek_angka($_POST['angka'])){
echo "Data tidak sesuai ketentuan, masukan hanya Angka  saja";
}
else echo "Input kamu benar";

//function bisa disimpan ditempat terpisah 
function cek_angka($nilai){
if(!preg_match("/^[0-9]*$/",$nilai)){
$hasil=true;
}else{
$hasil=false;
}
return $hasil;
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
    <form action="" method="post">
    <input type="text" name="angka" id="angka" placeholder="Masukan nilai Input">
    <input type="submit" name="kirim" id="kirim" value="kirim"> 
    <input type="reset" name="reset" id="reset" value="Reset">
</form>


</body>
</html>