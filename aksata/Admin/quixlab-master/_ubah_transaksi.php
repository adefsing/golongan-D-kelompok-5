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
                            if (isset($_GET["ID_TRNS"])) {
                                $idtr = $_GET["ID_TRNS"];
                                $ubah = query("SELECT transaksi.ID_TRNS, 
                        transaksi.ID_PEMESAN,
                        pemesan.ID_PEMESAN, 
                        pemesan.NM_PEMESAN, 
                        pemesan.JMLH_ANGGOTA, 
                        transaksi.ID_PKT, 
                        paket.NM_PKT, 
                        DATE_FORMAT(pemesan.TGL_PSN, '%d-%m-%Y') AS TGL_PSN,
                        transaksi.TGL_PELAKSANAAN, 
                        transaksi.TMPT_JPT, 
                        -- transaksi.ID_ARM, 
                        armada.NM_ARM, 
                        -- transaksi.ID_HOTEL, 
                        hotel.NM_HOTEL,
                        transaksi.HARGA,
                        transaksi.BAYAR,
                        transaksi.STATUS_BAYAR
                        FROM (((transaksi INNER JOIN paket ON transaksi.ID_PKT = paket.ID_PKT) 
                        INNER JOIN pemesan ON transaksi.ID_PEMESAN = pemesan.ID_PEMESAN) 
                        INNER JOIN armada ON transaksi.ID_ARM = armada.ID_ARM) 
                        INNER JOIN hotel ON transaksi.ID_HOTEL = hotel.ID_HOTEL 
                        WHERE transaksi.ID_TRNS = '$idtr'")[0];
                                // var_dump($ubah); 

                                // cek apakah tombol submit sudah ditekan atau belum
                                if (isset($_POST["submit"])) {
                                    // cek apakah data berhasil diubah atau tidak
                                    if (ubahtrns($_POST) > 0) {
                                        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php?page=transaksi';
            </script>
            ";
                                    } else {
                                        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'index.php?page=ubahtransaksi&ID_TRNS=" . $_POST['ID_TRNS'] . "';
            </script>
            ";
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <input type="hidden" name="ID_TRNS" value="<?= $ubah["ID_TRNS"]; ?>">
                                        <label class="col-form-label">Nama Pemesan</label>
                                        <select class="form-control" name="ID_PEMESAN" id="ID_PEMESAN">
                                            <?php
                                            $query = "SELECT * FROM pemesan ORDER BY ID_PEMESAN DESC";
                                            $hasil = mysqli_query($connect, $query);
                                            $jumlah = mysqli_num_rows($hasil);
                                            $urut = 0;
                                            while ($row = mysqli_fetch_array($hasil)) { ?>
                                                <option name="ID_PEMESAN" value="<?= $row["ID_PEMESAN"]; ?>">
                                                    <?= $row["NM_PEMESAN"]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="col-form-label" for="ID_PKT">Nama Paket</label>
                                        <select class="form-control" name="ID_PKT" id="ID_PKT">
                                            <?php
                                            $query = "SELECT * FROM paket ORDER BY ID_PKT DESC";
                                            $hasil = mysqli_query($connect, $query);
                                            $jumlah = mysqli_num_rows($hasil);
                                            $urut = 0;
                                            while ($row = mysqli_fetch_array($hasil)) { ?>
                                                <option name="ID_PKT" value="<?= $row["ID_PKT"]; ?>">
                                                    <?= $row["NM_PKT"]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                        <label class="col-form-label" for="ID_ARM">Nama Armada</label>
                                        <select class="form-control" name="ID_ARM" id="ID_ARM">
                                            <?php
                                            $query = "SELECT * FROM armada ORDER BY ID_ARM DESC";
                                            $hasil = mysqli_query($connect, $query);
                                            $jumlah = mysqli_num_rows($hasil);
                                            $urut = 0;
                                            while ($row = mysqli_fetch_array($hasil)) { ?>
                                                <option name="ID_ARM" value="<?= $row["ID_ARM"]; ?>">
                                                    <?= $row["NM_ARM"]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                        <label class="col-form-label" for="ID_HOTEL">Nama Pemesan</label>
                                        <select class="form-control" name="ID_HOTEL" id="ID_HOTEL">
                                            <?php
                                            $query = "SELECT * FROM hotel ORDER BY ID_HOTEL DESC";
                                            $hasil = mysqli_query($connect, $query);
                                            $jumlah = mysqli_num_rows($hasil);
                                            $urut = 0;
                                            while ($row = mysqli_fetch_array($hasil)) { ?>
                                                <option name="ID_HOTEL" value="<?= $row["ID_HOTEL"]; ?>">
                                                    <?= $row["NM_HOTEL"]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                        <label class="col-form-label" for="TGL_PELAKSANAAN">Tanggal Pelaksanaan</label>
                                        <input type="date" class="form-control input-default" value="<?= $ubah["TGL_PELAKSANAAN"]; ?>" name="TGL_PELAKSANAAN" id="TGL_PELAKSANAAN" autocomplete="off" required title="isikan tanggal awal sampai akhir keberangkatan">

                                        <label class="col-form-label" for="TMPT_JPT">Tempat Jemput</label>
                                        <input type="text" class="form-control input-default" value="<?= $ubah["TMPT_JPT"]; ?>" name="TMPT_JPT" id="TMPT_JPT" autocomplete="off" required>

                                        <label class="col-form-label" for="HARGA">Harga</label>
                                        <input type="text" class="form-control input-default" value="<?= $ubah["HARGA"]; ?>" name="HARGA" id="HARGA" autocomplete="off" required title="isikan hanya angka" onkeypress="return event.charCode >= 48 && event.charCode <=57">

                                        <label class="col-form-label" for="BAYAR">Bayar</label>
                                        <input type="text" class="form-control input-default" value="<?= $ubah["BAYAR"]; ?>" name="BAYAR" id="BAYAR" autocomplete="off" required title="isikan hanya angka" onkeypress="return event.charCode >= 48 && event.charCode <=57">


                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" style="color:white;" type="submit" name="submit">UBAH</button>
                            <a href="?page=transaksi" class="btn btn-secondary" style="color:white;">Kembali</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>