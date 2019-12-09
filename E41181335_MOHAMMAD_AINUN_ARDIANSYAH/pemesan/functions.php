<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

// auto increment
$query = "SELECT max(ID_PEMESAN) as maxid FROM pemesan";
$hasil = mysqli_query($connect,$query);
$dataa = mysqli_fetch_array($hasil);
$idpsn = $dataa['maxid'];

$noUrut = (int) substr($idpsn, 3, 3);

$noUrut++;

$char = "psn";
$idpsn = $char . sprintf("%02s", $noUrut);

function query ($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;    
    }
    return $rows;

}

function tambahpsn($data) {
    global $connect;
    global $idpsn;
    // $id_wst = htmlspecialchars($data["ID_WST"]);
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]);        
    $jmlh_anggota = htmlspecialchars($data["JMLH_ANGGOTA"]);
    $nik = htmlspecialchars($data["NIK"]);
    $tgl_psn = htmlspecialchars($data["TGL_PSN"]);

    $query = "INSERT INTO pemesan VALUES 
                ('$idpsn', '$nm_pemesan', '$jmlh_anggota', '$nik', '$tgl_psn')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapuspsn($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM pemesan WHERE NIK = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahpsn($data){
    global $connect;
    // global $idrm;

    $id_pemesan = $data["ID_PEMESAN"];
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]); 
    $nik = htmlspecialchars($data["NIK"]);       
    $jmlh_anggota = htmlspecialchars($data["JMLH_ANGGOTA"]);
    $tgl_psn = htmlspecialchars($data["TGL_PSN"]);

    // var_dump($data);

    $query = "UPDATE pemesan SET 
                NM_PEMESAN = '$nm_pemesan', 
                NIK = '$nik',
                JMLH_ANGGOTA = '$jmlh_anggota',
                TGL_PSN = '$tgl_psn'
                WHERE ID_PEMESAN = '$id_pemesan'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function caripsn($keyword){
    $query = "SELECT * FROM pemesan
                WHERE 
                NM_PEMESAN LIKE '%$keyword%' OR
                JMLH_ANGGOTA LIKE '%$keyword%' ";

    return query($query);
}



?>