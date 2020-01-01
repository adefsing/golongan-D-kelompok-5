<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
<input type="checkbox" id="vehicle" name="videoid[]" value="Bike">I have a bike
<br>
<input type="checkbox" id="vehicle" name="videoid[]" value="Cycle">I have a Cycle
<br>
<input type="checkbox" id="vehicle" name="videoid[]" value="Car">I have a car 
<br><br>
<input type="submit" value="Submit">
</form> 
</body>
</html>

<?php
    $con=mysqli_connect("localhost", "root", "", "aksataa");
    $videoCheckBox=$_POST['videoid'];  
       
    $checkedVideo = sizeof($videoCheckBox);
       
    foreach ($i=0;$i<$checkedVideo;$i++;) {
        $videoId = $videoCheckBox[$i];
        $queryVideo = mysqli_query($con,"INSERT INTO cekbok(hari) VALUES ('$videoId')");  
    }
       
    if($checkedVideo == 0) {
        echo'<script>alert("Failed To Insert")</script>';  
    } elseif($queryVideo) {
        echo'<script>alert("Inserted Successfully")</script>';
    }
?>  