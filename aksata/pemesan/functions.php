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
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]);        
    $jmlh_anggota = htmlspecialchars($data["JMLH_ANGGOTA"]);
    $nik = htmlspecialchars($data["NIK"]);
    $tgl_psn = date('Y-m-d');

    $query = "INSERT INTO pemesan VALUES 
                ('$idpsn', '$nm_pemesan', '$jmlh_anggota', '$nik', '$tgl_psn')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapuspsn($nm) {
    global $connect;
    $nik = htmlspecialchars($nm);
    mysqli_query($connect, "DELETE FROM pemesan WHERE NIK = '$nik'");
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

$query2 = "SELECT max(DTL_PEMESAN) as maxid FROM dtl_pemesan";
$hasil2 = mysqli_query($connect,$query2);
$dataa2 = mysqli_fetch_array($hasil2);
$idpsn2 = $dataa2['maxid'];

$noUrut2 = (int) substr($idpsn2, 3, 3);

$noUrut2++;

$char2 = "dps";
$idpsn2 = $char2 . sprintf("%02s", $noUrut2);

function tambahdtlpsn($data) {
    global $connect;
    global $idpsn2;
    $nm_anggota = htmlspecialchars($data["NM_ANGGOTA"]);        
    $idps = htmlspecialchars($data["ID_PEMESAN"]);

    $query = "INSERT INTO dtl_pemesan VALUES 
                ('$idpsn2', '$idps', '$nm_anggota')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function ubahdtlpsn($data){
    global $connect;

    $nm_anggota = htmlspecialchars($data["NM_ANGGOTA"]);
    // $idps = htmlspecialchars($data["ID_PEMESAN"]); 
    $iddps = htmlspecialchars($data["DTL_PEMESAN"]);

    $query = "UPDATE dtl_pemesan SET 
                NM_ANGGOTA = '$nm_anggota'
                WHERE DTL_PEMESAN = '$iddps'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function hapusdtlpsn($nm) {
    global $connect;
    $dtl_pemesan = htmlspecialchars($nm);
    mysqli_query($connect, "DELETE FROM dtl_pemesan WHERE DTL_PEMESAN = '$dtl_pemesan'");
    return mysqli_affected_rows($connect);
}

?>