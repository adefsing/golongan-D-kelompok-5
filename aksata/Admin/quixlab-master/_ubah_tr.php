<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Transaksi</h4>
                                </label>
                            </div>
                            <?php
                            require 'functions.php';

                            // ambil data di URL
                            if (isset($_GET["ID_RM"])) {
                                $idr = $_GET["ID_RM"];
                                $ubah = query("SELECT * FROM rm WHERE ID_RM = '$idr'")[0];
                                // var_dump($ubah); 

                                // cek apakah tombol submit sudah ditekan atau belum
                                if (isset($_POST["submit"])) {
                                    // cek apakah data berhasil diubah atau tidak
                                    if (ubahrm($_POST) > 0) {
                                        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
            ";
                                    } else {
                                        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php?ID_RM=" . $_POST['ID_RM'] . "';
            </script>
            ";
                                    }
                                }
                            }
                            ?>
                            <form method="post" action="_edit_admin.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col col-md-6 ">
                                        <input type="hidden" name="ID_RM" value="<?= $id ?>">
                                        <label class="col-form-label">Nama Wisata</label>
                                        <input type="text" name="nama" class="form-control input-default" placeholder="Nama Admin" value="<?= $query['nm_adm']; ?>">
                                        <label class="col-form-label">Alamat</label>
                                        <input type="text" name="NM_RM" id="NM_RM" class="form-control input-default" placeholder="Username" value="<?= $query['username']; ?>">
                                        <label class="col-form-label">Telepon</label>
                                        <input type="text" name="ALAMAT_RM" id="ALAMAT_RM" class="form-control input-default" placeholder="Password" value="<?= $query['password']; ?>">

                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-secondary" value="Reset" style="color:white;">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>