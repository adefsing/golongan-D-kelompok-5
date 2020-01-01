<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

// auto increment
$query = "SELECT max(ID_PEMESAN) as maxid FROM pemesan";
$hasil = mysqli_query($connect, $query);
$dataa = mysqli_fetch_array($hasil);
$idpsn = $dataa['maxid'];

$noUrut = (int) substr($idpsn, 3, 3);

$noUrut++;

$char = "psn";
$idpsn = $char . sprintf("%02s", $noUrut);

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahpsn($data)
{
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

function hapuspsn($nm)
{
    global $connect;
    $nik = htmlspecialchars($nm);
    mysqli_query($connect, "DELETE FROM pemesan WHERE NIK = '$nik'");
    return mysqli_affected_rows($connect);
}

function ubahpsn($data)
{
    global $connect;

    $id_pemesan = $data["ID_PEMESAN"];
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]);
    $nik = htmlspecialchars($data["NIK"]);
    $jmlh_anggota = htmlspecialchars($data["JMLH_ANGGOTA"]);

    $query = "UPDATE pemesan SET 
                NM_PEMESAN = '$nm_pemesan', 
                NIK = '$nik',
                JMLH_ANGGOTA = '$jmlh_anggota'
                WHERE ID_PEMESAN = '$id_pemesan'
            ";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function caripsn($keyword)
{
    $query = "SELECT * FROM pemesan
                WHERE 
                NM_PEMESAN LIKE '%$keyword%' OR
                JMLH_ANGGOTA LIKE '%$keyword%' ";

    return query($query);
}

$query2 = "SELECT max(DTL_PEMESAN) as maxid FROM dtl_pemesan";
$hasil2 = mysqli_query($connect, $query2);
$dataa2 = mysqli_fetch_array($hasil2);
$idpsn2 = $dataa2['maxid'];

$noUrut2 = (int) substr($idpsn2, 3, 3);

$noUrut2++;

$char2 = "dps";
$idpsn2 = $char2 . sprintf("%02s", $noUrut2);

function tambahdtlpsn($data)
{
    global $connect;
    global $idpsn2;
    $nm_anggota = htmlspecialchars($data["NM_ANGGOTA"]);
    $idps = htmlspecialchars($data["ID_PEMESAN"]);

    $query = "INSERT INTO dtl_pemesan VALUES 
                ('$idpsn2', '$idps', '$nm_anggota')";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function ubahdtlpsn($data)
{
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

function hapusdtlpsn($nm)
{
    global $connect;
    $dtl_pemesan = htmlspecialchars($nm);
    mysqli_query($connect, "DELETE FROM dtl_pemesan WHERE DTL_PEMESAN = '$dtl_pemesan'");
    return mysqli_affected_rows($connect);
}

$query = "SELECT max(ID_PKT) as maxid FROM paket";
$hasil = mysqli_query($connect, $query);
$dataa = mysqli_fetch_array($hasil);
$idpkt = $dataa['maxid'];

$noUrut = (int) substr($idpkt, 3, 2);

$noUrut++;

$char = "pkt";
$idpkt = $char . sprintf("%02s", $noUrut);


function tambahpkt($data)
{
    global $connect;
    global $idpkt;
    $nm_pkt = htmlspecialchars($data["NM_PKT"]);

    $query = "INSERT INTO paket (ID_PKT, NM_PKT) VALUES 
                ('$idpkt', '$nm_pkt')";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function hapuspkt($nm)
{
    global $connect;

    mysqli_query($connect, "DELETE FROM pkt_wst WHERE ID_PKT = '$nm'");
    mysqli_query($connect, "DELETE FROM pkt_rm WHERE ID_PKT = '$nm'");
    mysqli_query($connect, "DELETE FROM paket WHERE ID_PKT = '$nm'");
    return mysqli_affected_rows($connect);
}

function tambahpilihwst($data)
{
    global $connect;
    $pkt = $data["ID_PKT"];
    foreach ($_POST['ID_WST'] as $wst) {
        $query = "INSERT INTO pkt_wst VALUES('$pkt','$wst')";
        mysqli_query($connect, $query);
    }
    foreach ($_POST['ID_RM'] as $rm) {
        $query = "INSERT INTO pkt_rm VALUES('$pkt','$rm')";
        mysqli_query($connect, $query);
    }
    return mysqli_affected_rows($connect);
}

function ubahpkt($data)
{
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

function ubahpilihwisata($data)
{
    global $connect;

    $pkt = $data["ID_PKT"];
    $query = "DELETE FROM pkt_wst WHERE ID_PKT = '$pkt'";
    mysqli_query($connect, $query);

    $querya = "DELETE FROM pkt_rm WHERE ID_PKT = '$pkt'";
    mysqli_query($connect, $querya);

    foreach ($_POST['ID_WST'] as $wst) {
        $query1 = "INSERT INTO pkt_wst VALUES('$pkt','$wst')";
        mysqli_query($connect, $query1);
    }

    foreach ($_POST['ID_RM'] as $rm) {
        $query1a = "INSERT INTO pkt_rm VALUES('$pkt','$rm')";
        mysqli_query($connect, $query1a);
    }
    return mysqli_affected_rows($connect);
}

function caripkt($keyword)
{
    $query = "SELECT * FROM paket
                WHERE 
                NM_PKT LIKE '%$keyword%' ";

    return query($query);
}
