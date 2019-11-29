<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

// auto increment
// $query = "SELECT max(ID_RM) as maxid FROM rm";
// $hasil = mysqli_query($connect,$query);
// $dataa = mysqli_fetch_array($hasil);
// $idrm = $dataa['maxid'];

// $noUrut = (int) substr($idrm, 3, 3);

// $noUrut++;

// $char = "rm";
// $idrm = $char . sprintf("%02s", $noUrut);

function query ($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;    
    }
    return $rows;

}

function tambahrm($data) {
    global $connect;
    global $idrm;

    // $id_wst = htmlspecialchars($data["ID_WST"]);
    $nm_rm = htmlspecialchars($data["NM_RM"]);        
    $alamat_rm = htmlspecialchars($data["ALAMAT_RM"]);
    $tlp_rm = htmlspecialchars($data["TLP_RM"]); 

    $query = "INSERT INTO rm VALUES 
                ('$idrm', '$nm_rm', '$alamat_rm', '$tlp_rm')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapusrm($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM rm WHERE NM_RM = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahrm($data){
    global $connect;
    // global $idrm;

    $id_rm = $data["ID_RM"];
    $nm_rm = htmlspecialchars($data["NM_RM"]);        
    $alamat_rm = htmlspecialchars($data["ALAMAT_RM"]);
    $tlp_rm = htmlspecialchars($data["TLP_RM"]); 

    // var_dump($data);

    $query = "UPDATE rm SET 
                NM_RM = '$nm_rm', 
                ALAMAT_RM = '$alamat_rm',
                TLP_RM = '$tlp_rm' 
                WHERE ID_RM = '$id_rm'
            ";

    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);

}

function carirm($keyword){
    $query = "SELECT * FROM rm
                WHERE 
                NM_RM LIKE '%$keyword%' OR
                ID_RM LIKE '%$keyword%' OR
                ALAMAT_RM LIKE '%$keyword%' OR
                TLP_RM LIKE '%$keyword%' ";

    return query($query);
}



?>