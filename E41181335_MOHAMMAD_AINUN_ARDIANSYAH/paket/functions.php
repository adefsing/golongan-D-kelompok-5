<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

// auto increment
$query = "SELECT max(ID_PKT) as maxid FROM paket";
$hasil = mysqli_query($connect,$query);
$dataa = mysqli_fetch_array($hasil);
$idpkt = $dataa['maxid'];

$noUrut = (int) substr($idpkt, 3, 2);

$noUrut++;

$char = "pkt";
$idpkt = $char . sprintf("%02s", $noUrut);

function query ($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;    
    }
    return $rows;

}

function tambahpkt($data) {
    global $connect;
    global $idpkt;
    $nm_pkt = htmlspecialchars($data["NM_PKT"]);   

    $query = "INSERT INTO paket (ID_PKT, NM_PKT) VALUES 
                ('$idpkt', '$nm_pkt')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapuspkt($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM paket WHERE NM_PKT = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahpkt($data){
    global $connect;

    $id_pkt = $data["ID_PKT"];
    $nm_pkt = htmlspecialchars($data["NM_PKT"]);  

    $query = "UPDATE paket SET 
                NM_PKT = '$nm_pkt' 
                WHERE ID_PKT = '$id_pkt'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function caripkt($keyword){
    $query = "SELECT * FROM paket
                WHERE 
                NM_PKT LIKE '%$keyword%' ";

    return query($query);
}



?>