<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

// auto increment
$query = "SELECT max(ID_TESTI) as maxid FROM testimoni";
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

function tambahtesti($data) {
    global $connect;
    global $idhtl;

    // $id_wst = htmlspecialchars($data["ID_WST"]);
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]);        
    $isi_testi = htmlspecialchars($data["ISI_TESTI"]);
    $foto = htmlspecialblobs($data["FOTO"]); 

    $query = "INSERT INTO testimoni VALUES 
                ('$id_testi', '$nm_pemesan', '$isi_testi', '$foto')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapustesti($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM testimoni WHERE NM_PEMESAN = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahtesti($data){
    global $connect;
    // global $idwst;

    $id_testi = $data["ID_TESTI"];
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]);        
    $isi_testi = htmlspecialchars($data["ISI_TESTI"]);
    $foto = htmlspecialblobs($data["FOTO"]); 

    // var_dump($data);

    $query = "UPDATE testimoni SET 
                NM_PEMESAN = '$nm_pemesan', 
                ISI_TESTI = '$isi_testi',
                FOTO = '$foto' 
                WHERE ID_TESTI = '$id_testi'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function caritesti($keyword){
    $query = "SELECT * FROM testimoni
                WHERE 
                NM_PEMESAN LIKE '%$keyword%' OR
                ISI_TESTI LIKE '%$keyword%' OR
                FOTO LIKE '%$keyword%'";
    return query($query);
}

?>