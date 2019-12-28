 <?php


    $id_inbox = $_POST['id_inbox'];
    var_dump($_POST);
    $row = count($id_inbox);

    for ($i = 0; $i <= $row; $i++) {
        $inbox = $id_inbox[$i];
        echo $inbox;
    }

    ?>