<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

// auto increment
$query = "SELECT max(ID_ARM) as maxid FROM armada";
$hasil = mysqli_query($connect,$query);
$dataa = mysqli_fetch_array($hasil);
$idarm = $dataa['maxid'];

$noUrut = (int) substr($idarm, 3, 3);

$noUrut++;

$char = "arm";
$idarm = $char . sprintf("%02s", $noUrut);

function query ($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;    
    }
    return $rows;

}

function tambaharm($data) {
    global $connect;
    global $idarm;

    
    $nm_arm = htmlspecialchars($data["NM_ARM"]);        
    $alamat_arm = htmlspecialchars($data["ALAMAT_ARM"]);
    $tlp_arm = htmlspecialchars($data["TLP_ARM"]); 

    $query = "INSERT INTO armada VALUES 
                ('$idarm', '$nm_arm', '$alamat_arm', '$tlp_arm')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapusarm($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM armada WHERE NM_ARM = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubaharm($data){
    global $connect;
    // global $idarm;

    $id_arm = $data["ID_ARM"];
    $nm_arm = htmlspecialchars($data["NM_ARM"]);        
    $alamat_arm = htmlspecialchars($data["ALAMAT_ARM"]);
    $tlp_arm = htmlspecialchars($data["TLP_ARM"]); 

    // var_dump($data);

    $query = "UPDATE armada SET 
                NM_ARM = '$nm_arm', 
                ALAMAT_ARM = '$alamat_arm',
                TLP_ARM = '$tlp_arm' 
                WHERE ID_ARM = '$id_arm'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function cariarm($keyword){
    $query = "SELECT * FROM armada
                WHERE 
                NM_ARM LIKE '%$keyword%' OR
                ID_ARM LIKE '%$keyword%' OR
                ALAMAT_ARM LIKE '%$keyword%' OR
                TLP_ARM LIKE '%$keyword%' ";

    return query($query);
}



?>