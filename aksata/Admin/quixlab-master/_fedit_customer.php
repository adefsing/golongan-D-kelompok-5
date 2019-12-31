<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Pemesan</h4>
                                </label>
                            </div>
                            <?php

                            // ambil data di URL
                            if (isset($_GET["ID_PEMESAN"])) {
                                $idr = $_GET["ID_PEMESAN"];
                                $ubah = query("SELECT ID_PEMESAN, 
                        NM_PEMESAN, 
                        JMLH_ANGGOTA,
                        NIK,
                        DATE_FORMAT(TGL_PSN, '%d-%m-%Y') AS TGL_PSN  
                        FROM pemesan WHERE ID_PEMESAN = '$idr'")[0];
                                // var_dump($ubah); 

                                // cek apakah tombol submit sudah ditekan atau belum
                                if (isset($_POST["submit"])) {
                                    // cek apakah data berhasil diubah atau tidak
                                    if (ubahpsn($_POST) > 0) {
                                        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = '?page=customer';
            </script>
            ";
                                    } else {
                                        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = '?page=fedit_customer&ID_PEMESAN=" . $_POST['ID_PEMESAN'] . "';
            </script>
            ";
                                    }
                                }
                            }
                            ?>
                            <form method="post" action="">

                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <input type="hidden" name="ID_PEMESAN" value="<?= $ubah["ID_PEMESAN"]; ?>">
                                        <label class="col-form-label">Nama Pemesan</label>
                                        <input type="text" name="NM_PEMESAN" value="<?php echo $ubah['NM_PEMESAN']; ?>" class="form-control input-default" placeholder="Nama customer">
                                        <label class="col-form-label">Jumlah Anggota</label>
                                        <input type="text" name="JMLH_ANGGOTA" value="<?php echo $ubah['JMLH_ANGGOTA']; ?>" class="form-control input-default" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Jumlah Anggota">
                                        <label class="col-form-label">NIK</label>
                                        <input type="text" name="NIK" value="<?php echo $ubah['NIK']; ?>" class="form-control input-default" maxlength="25" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="NIK">
                                        <label class="col-form-label">Tanggal Pesan</label>
                                        <input type="date" name="TGL_PSN" value="<?php echo $ubah['TGL_PSN']; ?>" class="form-control input-default" placeholder="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?page=customer" class="btn btn-secondary" style="color:white;">Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>