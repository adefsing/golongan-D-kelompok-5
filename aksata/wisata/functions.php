<?php
$connect    = mysqli_connect("localhost", "root", "", "aksata");

function query ($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;    
    }
    return $rows;

}

function tambahwst($data) {
    global $connect;

    $id_wst = htmlspecialchars($data["ID_WST"]);
    $nm_wst = htmlspecialchars($data["NM_WST"]);        
    $alamat_wst = htmlspecialchars($data["ALAMAT_WST"]);
    $tlp_wst = htmlspecialchars($data["TLP_WST"]); 

    $query = "INSERT INTO wisata VALUES 
                ('$id_wst', '$nm_wst', '$alamat_wst', '$tlp_wst')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapuswst($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM wisata WHERE NM_WST = '$nm'");
    return mysqli_affected_rows($connect);
}


?>