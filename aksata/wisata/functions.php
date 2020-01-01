<?php

$connect    = mysqli_connect("localhost", "root", "", "aksataa");

\


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
    

    
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]);        
    $isi_testi = htmlspecialchars($data["ISI_TESTI"]);
    $foto = htmlspecialblobs($data["FOTO"]); 

    $query = "INSERT INTO testimoni VALUES 
                ('$nm_pemesan', '$isi_testi', '$foto')";
    mysqli_query($connect, $query); 

    return mysqli_affected_rows($connect);
}

function hapustesti($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM testimoni WHERE NM_PEMESAN = '$nm'");
    return mysqli_affected_rows($connect);
}

function ubahTESTI($data){
    global $connect;
    
    $nm_pemesan = htmlspecialchars($data["NM_PEMESAN"]);        
    $isi_testi = htmlspecialchars($data["ISI_TESTI"]);
    $foto = htmlspecialblobs($data["FOTO"]); 

  

    $query = "UPDATE testimoni SET  
                ISI_TESTI = '$isi_testi',
                FOTO = '$foto' 
                WHERE NM_PEMESAN = '$nm_pemesan'
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