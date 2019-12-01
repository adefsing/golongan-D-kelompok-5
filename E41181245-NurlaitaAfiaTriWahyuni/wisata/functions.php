<?php

$connect    = mysqli_connect("localhost", "root", "", "aksata");

// auto increment
$query = "SELECT max(ID_WST) as maxid FROM wisata";
$hasil = mysqli_query($connect,$query);
$dataa = mysqli_fetch_array($hasil);
$idwst = $dataa['maxid'];

$noUrut = (int) substr($idwst, 3, 3);

$noUrut++;

$char = "wst";
$idwst = $char . sprintf("%02s", $noUrut);

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
    global $idwst;

    // $id_wst = htmlspecialchars($data["ID_WST"]);
    $nm_wst = htmlspecialchars($data["NM_WST"]);        
    $alamat_wst = htmlspecialchars($data["ALAMAT_WST"]);
    $tlp_wst = htmlspecialchars($data["TLP_WST"]); 

    $query = "INSERT INTO wisata VALUES 
                ('$idwst', '$nm_wst', '$alamat_wst', '$tlp_wst')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapuswst($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM wisata WHERE NM_WST = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahwst($data){
    global $connect;
    // global $idwst;

    $id_wst = $data["ID_WST"];
    $nm_wst = htmlspecialchars($data["NM_WST"]);        
    $alamat_wst = htmlspecialchars($data["ALAMAT_WST"]);
    $tlp_wst = htmlspecialchars($data["TLP_WST"]); 

    // var_dump($data);

    $query = "UPDATE wisata SET 
                NM_WST = '$nm_wst', 
                ALAMAT_WST = '$alamat_wst',
                TLP_WST = '$tlp_wst' 
                WHERE ID_WST = '$id_wst'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function cariwst($keyword){
    $query = "SELECT * FROM wisata
                WHERE 
                NM_WST LIKE '%$keyword%' OR
                ID_WST LIKE '%$keyword%' OR
                ALAMAT_WST LIKE '%$keyword%' OR
                TLP_WST LIKE '%$keyword%' ";

    return query($query);
}

?>