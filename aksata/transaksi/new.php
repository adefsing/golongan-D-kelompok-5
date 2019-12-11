<?php
$connect    = mysqli_connect("localhost", "root", "", "aksataa");

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
    <table>
        <tr>
            <td>
                <select>
                    <?php
                    $query = "SELECT NM_PEMESAN FROM pemesan ORDER BY TGL_PSN DESC";
                    $hasil = mysqli_query($connect, $query);
                    while ($tabel = mysqli_fetch_assoc($hasil)){
                        // echo '<option value="'.$tabel['NM_PEMESAN'].'">'.$tabel['NM_PEMESAN'].'</option>';
                        echo '<option>'.$tabel["NM_PEMESAN"].'</option>';
                    }

                    ?>
                </select>
            </td>
        </tr>
    </table>
</body>
</html>

<!-- <select>
<?php
$con = mysqli_connect("localhost","root","","sample");

//display values in combobox/dropdown
$result = mysqli_query($con,"SELECT * FROM category ORDER BY category_name");
  while($row = mysqli_fetch_assoc($result))
   {
     echo "<option>$row[category_name]</option>";
    } 
?>
</select> -->