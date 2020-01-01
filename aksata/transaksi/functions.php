<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

// auto increment
$query = "SELECT max(ID_TRNS) as maxid FROM transaksi";
$hasil3 = mysqli_query($connect,$query);
$dataa3 = mysqli_fetch_array($hasil3);
$idtrns = $dataa3['maxid'];
$idtrns++;

function query ($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;    
    }
    return $rows;

}

function tambahtrns($data) {
    global $connect;
    global $idtrns;

    $id_pkt = htmlspecialchars($data["ID_PKT"]); 
    $id_pemesan = htmlspecialchars($data["ID_PEMESAN"]);
    $id_arm = htmlspecialchars($data["ID_ARM"]);
    $id_hotel = htmlspecialchars($data["ID_HOTEL"]);
    $tgl_pelaksanaan = htmlspecialchars($data["TGL_PELAKSANAAN"]);
    $tmpt_jpt = htmlspecialchars($data["TMPT_JPT"]);
    $harga = htmlspecialchars($data["HARGA"]);
    $bayar = htmlspecialchars($data["BAYAR"]); 

    

    if ($bayar==$harga){
        $status_bayar = "LUNAS";
    } else if($bayar>$harga){
        $status_bayar = "BAYAR KELEBIHAN";
    } else {
        $status_bayar = "BELUM";
    }

    $query = " INSERT INTO transaksi
    (ID_TRNS, ID_PKT, ID_PEMESAN, ID_ARM, ID_HOTEL, TGL_PELAKSANAAN, TMPT_JPT, HARGA, BAYAR, STATUS_BAYAR)  
                VALUES ('$idtrns', '$id_pkt', '$id_pemesan', '$id_arm', '$id_hotel', '$tgl_pelaksanaan', 
                        '$tmpt_jpt', '$harga', '$bayar', '$status_bayar')";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapustrns($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM transaksi WHERE ID_TRNS = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahtrns($data){
    global $connect;

    $id_trns = $data["ID_TRNS"];
    $id_pkt = htmlspecialchars($data["ID_PKT"]);
    $id_pemesan = htmlspecialchars($data["ID_PEMESAN"]);
    $id_arm = htmlspecialchars($data["ID_ARM"]);
    $id_hotel = htmlspecialchars($data["ID_HOTEL"]);
    $tgl_pelaksanaan = htmlspecialchars($data["TGL_PELAKSANAAN"]);
    $tmpt_jpt = htmlspecialchars($data["TMPT_JPT"]);
    $harga = htmlspecialchars($data["HARGA"]);
    $bayar = htmlspecialchars($data["BAYAR"]); 

    if ($bayar==$harga){
        $status_bayar = "LUNAS";
    } else if($bayar>$harga){
        $status_bayar = "BAYAR KELEBIHAN";
    } else {
        $status_bayar = "BELUM";
    }

    $query = "UPDATE transaksi SET 
                ID_PKT = '$id_pkt',
                ID_PEMESAN = '$id_pemesan',
                ID_ARM = '$id_arm',
                ID_HOTEL = '$id_hotel',
                TGL_PELAKSANAAN = '$tgl_pelaksanaan',
                TMPT_JPT = '$tmpt_jpt',
                HARGA = '$harga',
                BAYAR = '$bayar',
                STATUS_BAYAR = '$status_bayar'
                WHERE ID_TRNS = '$id_trns'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function caritrns($keyword){
    $query = "SELECT transaksi.ID_TRNS,
                    pemesan.NM_PEMESAN, 
                    pemesan.JMLH_ANGGOTA, 
                    paket.NM_PKT, 
                    pemesan.TGL_PSN, 
                    transaksi.TGL_BRKT, 
                    transaksi.TMPT_JPT, 
                    armada.NM_ARM, 
                    hotel.NM_HOTEL,
                    transaksi.HARGA,
                    transaksi.BAYAR,
                    transaksi.STATUS_BAYAR
                FROM (((transaksi INNER JOIN paket ON transaksi.ID_PKT = paket.ID_PKT) 
                    INNER JOIN pemesan ON transaksi.ID_PEMESAN = pemesan.ID_PEMESAN) 
                    INNER JOIN armada ON transaksi.ID_ARM = armada.ID_ARM) 
                    INNER JOIN hotel ON transaksi.ID_HOTEL = hotel.ID_HOTEL 
                WHERE 
                    ID_TRNS LIKE '%$keyword%' OR
                    NM_PEMESAN LIKE '%$keyword%' OR
                    JMLH_ANGGOTA LIKE '%$keyword%' OR
                    NM_PKT LIKE '%$keyword%' OR
                    TMPT_JPT LIKE '%$keyword%' OR
                    HARGA LIKE '%$keyword%' OR
                    BAYAR LIKE '%$keyword%' OR
                    NM_ARM LIKE '%$keyword%' OR
                    NM_HOTEL LIKE '%$keyword%' ";
                     

    return query($query);
}
