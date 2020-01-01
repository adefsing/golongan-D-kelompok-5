<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Paket</h4>
                                </label>
                            </div>
                            <?php
                            if (isset($_GET["ID_PKT"])) {
                                $idp = $_GET["ID_PKT"];
                                $ubah = query("SELECT * FROM paket WHERE ID_PKT = '$idp'")[0];
                                // var_dump($ubah);

                                // cek apakah tombol submit sudah ditekan atau belum
                                if (isset($_POST["submit"])) {
                                    // cek apakah data berhasil diubah atau tidak
                                    if (ubahpkt($_POST) > 0) {
                                        echo "
                            <script>
                                alert('data berhasil diubah');
                                document.location.href = 'index.php?page=paket';
                            </script>
                            ";
                                    } else {
                                        echo "
                            <script>
                                alert('data gagal diubah');
                                document.location.href = 'index.php?page=feditpaket&ID_PKT=" . $_POST['
                                ID_PKT '] . "';
                            </script>
                            ";
                                    }
                                }
                            }
                            ?>
                            <form method="post" action="">
                                <input type="hidden" name="ID_PKT" value="<?= $ubah["ID_PKT"]; ?>">
                                <div class="row ">
                                    <div class="form-group col ml-auto">

                                        <label class="col-form-label">Nama Paket</label>
                                        <input type="text" name="NM_PKT" id="NM_PKT" class="form-control input-default" placeholder="Nama Paket" value="<?php echo $ubah['NM_PKT']; ?>">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="?page=paket" class="btn btn-secondary" style="color:white;">Kembali</a>
                            <button onclick='return confirmation()' type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                        <script type="text/javascript">
                            function confirmation() {
                                if (confirm("Anda yakin ingin mengubah data?")) {
                                    location.href = 'functions.php';
                                } else {
                                    return false;
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>