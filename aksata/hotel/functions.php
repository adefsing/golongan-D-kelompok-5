<?php

$connect    = mysqli_connect("localhost", "root", "", "aksata");

// auto increment
$query = "SELECT max(ID_HOTEL) as maxid FROM hotel";
$hasil = mysqli_query($connect, $query);
$dataa = mysqli_fetch_array($hasil);
$idhtl = $dataa['maxid'];

$noUrut = (int) substr($idhtl, 3, 3);

$noUrut++;

$char = "hl";
$idhtl = $char . sprintf("%03s", $noUrut);

function query ($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;    
    }
    return $rows;

}

function tambahhtl($data) {
    global $connect;
    global $idhtl;

    // $id_wst = htmlspecialchars($data["ID_WST"]);
    $nm_htl = htmlspecialchars($data["NM_HOTEL"]);        
    $alamat_htl = htmlspecialchars($data["ALAMAT_HOTEL"]);
    $tlp_htl = htmlspecialchars($data["TLP_HOTEL"]); 

    $query = "INSERT INTO hotel VALUES 
                ('$idhtl', '$nm_htl', '$alamat_htl', '$tlp_htl')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapushtl($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM hotel WHERE NM_HOTEL = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahhtl($data){
    global $connect;
    // global $idwst;

    $id_htl = $data["ID_HOTEL"];
    $nm_htl = htmlspecialchars($data["NM_HOTEL"]);        
    $alamat_htl = htmlspecialchars($data["ALAMAT_HOTEL"]);
    $tlp_htl = htmlspecialchars($data["TLP_HOTEL"]); 

    // var_dump($data);

    $query = "UPDATE wisata SET 
                NM_HOTEL = '$nm_htl', 
                ALAMAT_HOTEL = '$alamat_htl',
                TLP_HOTEL = '$tlp_htl' 
                WHERE ID_HOTEL = '$id_htl'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function carihtl($keyword){
    $query = "SELECT * FROM hotel
                WHERE 
                NM_HOTEL LIKE '%$keyword%' OR
                ID_HOTEL LIKE '%$keyword%' OR
                ALAMAT_HOTEL LIKE '%$keyword%' OR
                TLP_HOTEL LIKE '%$keyword%' ";

    return query($query);
}

?>