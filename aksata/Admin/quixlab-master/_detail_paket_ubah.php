<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <?php
                                $wst = query("SELECT * FROM wisata ORDER BY ID_WST ASC");
                                $rm  = query("SELECT * FROM rm ORDER BY ID_RM ASC");
                                $gt_pkt = $_GET["ID_PKT"];
                                $nmpkt = $_GET["NM_PKT"];

                                if (isset($_POST["submit"])) {
                                    if (ubahpilihwisata($_POST) > 0) {
                                        echo "
                                                <script>
                                                    alert('data berhasil diubah');
                                                    document.location.href = 'index.php?page=detailpaket&ID_PKT=$gt_pkt&NM_PKT=$nmpkt';
                                                </script>
                                                ";
                                    } else {
                                        echo "
                                            <script>
                                                alert('data gagal diubah');
                                                document.location.href = 'index.php?page=detailpaketubah&ID_PKT=$gt_pkt&NM_PKT=$nmpkt';
                                            </script>
                                            ";
                                    }
                                }


                                ?>
                                <label>
                                    <h4>Atur Sendiri Paket Liburanmu</h4>
                                </label>
                            </div>



                            <br>
                            <form action="" method="post">
                                <label for="NM_PKT"><?= $nmpkt; ?></label>
                                <input type="hidden" name="ID_PKT" value="<?= $gt_pkt; ?>">
                                <table border="1" cellpadding="10" cellspacing="1">
                                    <tr>
                                        <th>Pilih Wisata</th>
                                        <th>Pilih Rumah Makan</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            <?php foreach ($wst as $wstt) :
                                                $ws =  $wstt["ID_WST"];
                                                $checked_wst = query("SELECT paket.NM_PKT, wisata.ID_WST, wisata.NM_WST FROM pkt_wst, paket, wisata 
                        WHERE pkt_wst.ID_PKT = paket.ID_PKT AND pkt_wst.ID_WST = wisata.ID_WST AND pkt_wst.ID_PKT = '$gt_pkt'");
                                            ?>

                                                <input type="checkbox" name="ID_WST[]" value="<?= $wstt["ID_WST"]; ?>" <?php
                                                                                                                        foreach ($checked_wst as $checked_wstt) :

                                                                                                                            if ($ws == $checked_wstt["ID_WST"]) {
                                                                                                                                echo "checked";
                                                                                                                            }
                                                                                                                        endforeach;
                                                                                                                        ?>> <?= $wstt["NM_WST"]; ?>


                                                </input>
                                                <br>
                                                <br>
                                            <?php endforeach; ?>
                                        </td>

                                        <td>
                                            <?php foreach ($rm as $rmm) :
                                                $r =  $rmm["ID_RM"];
                                                $checked_rm = query("SELECT paket.NM_PKT, rm.ID_RM, rm.NM_RM FROM pkt_rm, paket, rm 
                        WHERE pkt_rm.ID_PKT = paket.ID_PKT AND pkt_rm.ID_RM = rm.ID_RM AND pkt_rm.ID_PKT = '$gt_pkt'");
                                            ?>

                                                <input type="checkbox" name="ID_RM[]" value="<?= $rmm["ID_RM"]; ?>" <?php
                                                                                                                    foreach ($checked_rm as $checked_rmm) :

                                                                                                                        if ($r == $checked_rmm["ID_RM"]) {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                    endforeach;
                                                                                                                    ?>> <?= $rmm["NM_RM"]; ?>


                                                </input>
                                                <br>
                                                <br>
                                            <?php endforeach; ?>
                                        </td>

                                    </tr>
                                </table>
                                <br />
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="submit"  onclick='return confirmation()'>Ubah</button>
                                    <a style="color: white;" href="index.php?page=detailpaket&ID_PKT=<?= $gt_pkt; ?>&NM_PKT=<?= $nmpkt; ?>" class="btn btn-secondary">Kembali</a>

                                </div>
                                <script type="text/javascript">
                                    function confirmation(){
                                        if (confirm("Anda yakin ingin mengubah data?")){
                                            location.href='functions.php';
                                        }
                                        else {
                                            return false;
                                        }
                                    } 
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>