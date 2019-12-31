<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Ubah Data Nama Anggota</h4>
                                </label>
                            </div>
                            <?php


                            // ambil data di URL
                            if (isset($_GET["DTL_PEMESAN"])) {
                                $id = $_GET["ID_PEMESAN"];
                                $dtlpsn = $_GET["DTL_PEMESAN"];
                                $ubah = query("SELECT * FROM dtl_pemesan WHERE DTL_PEMESAN = '$dtlpsn'")[0];
                                $uubah = query("SELECT JMLH_ANGGOTA FROM pemesan WHERE ID_PEMESAN = '$id'");

                                foreach ($uubah as $uubh) :
                                    $ang = $uubh["JMLH_ANGGOTA"];
                                endforeach;
                                // var_dump($ubah); 

                                // cek apakah tombol submit sudah ditekan atau belum
                                if (isset($_POST["submit"])) {
                                    // cek apakah data berhasil diubah atau tidak
                                    if (ubahdtlpsn($_POST) > 0) {
                                        echo "
            <script>
                document.location.href = '?page=detailpemesan&JMLH_ANGGOTA=$ang&ID_PEMESAN=$id';
            </script>
            ";
                                    } else {
                                        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = '?page=ubahdetail&DTL_PEMESAN=" . $_POST['DTL_PEMESAN'] . "';
            </script>
            ";
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <input type="hidden" name="ID_PEMESAN" value="<?= $ubah["ID_PEMESAN"]; ?>">
                                <input type="hidden" name="DTL_PEMESAN" value="<?= $ubah["DTL_PEMESAN"]; ?>">
                                <ul>
                                    <li>
                                        <label for="NM_ANGGOTA">Nama anggota</label>
                                        <input class="form-control input-default" type="text" name="NM_ANGGOTA" id="NM_ANGGOTA" required value="<?= $ubah["NM_ANGGOTA"]; ?>">
                                    </li>
                                    <li>
                                        <br />
                                        <button class="btn btn-primary" style="color:white;" type="submit" name="submit">UBAH</button>
                                        <a href="?page=detailpemesan&JMLH_ANGGOTA=<?= $ang ?>&ID_PEMESAN=<?= $id ?>" class="btn btn-secondary" style="color:white;">Kembali</a>
                                    </li>
                                </ul>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>