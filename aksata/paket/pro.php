<?php
$checkbox1 = $_POST['vehicle'];
    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1.",";  
       }  

$conn = mysqli_connect("localhost", "root", "", "aksataa");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO cekbok(hari) VALUES( '$chk' )";

if(mysqli_query($conn,$sql)) {

    echo 'Data added sucessfully';
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>