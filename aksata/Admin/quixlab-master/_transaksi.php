<div class="container-fluid">
    <?php
    $trns = query("SELECT transaksi.ID_TRNS, 
                    -- transaksi.ID_PEMESAN,
                    pemesan.ID_PEMESAN, 
                    pemesan.NM_PEMESAN, 
                    pemesan.JMLH_ANGGOTA, 
                    transaksi.ID_PKT, 
                    paket.ID_PKT,
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
                    ORDER BY transaksi.ID_TRNS DESC");

    if (isset($_POST["submit"])) {
        if (tambahtrns($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php?page=transaksi';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php?page=transaksi';
            </script>
            ";
        }
    }


    ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Data Transaksi</h4>
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label style="text-aling:right;">

                                    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>



                                </label>
                                <label style="text-align:right;">

                                    <a href="_report_transaksi.php?id=<?php echo $_SESSION['username']; ?>"><button type="button" class="btn mb-1 btn-primary btn-lg">CETAK DATA PDF</button>
                                    </a>


                                </label>
                                <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col ml-auto">
                                                            <form action="" method="post">

                                                                <label class="col-form-label" for="ID_PEMESAN">Nama Pemesan</label>
                                                                <select class="form-control" name="ID_PEMESAN" id="ID_PEMESAN">
                                                                    <?php
                                                                    $query = "SELECT * FROM pemesan ORDER BY TGL_PSN DESC";
                                                                    $hasil = mysqli_query($connect, $query);
                                                                    $jumlah = mysqli_num_rows($hasil);
                                                                    $urut = 0;
                                                                    while ($row = mysqli_fetch_array($hasil)) { ?>
                                                                        <option name="ID_PEMESAN" value="<?= $row["ID_PEMESAN"]; ?>">
                                                                            <?= $row["NM_PEMESAN"]; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>

                                                                <label class="col-form-label" for="ID_PKT">Paket</label>
                                                                <select class="form-control" name="ID_PKT" id="ID_PKT">
                                                                    <?php
                                                                    $query = "SELECT * FROM paket ORDER BY ID_PKT ASC";
                                                                    $hasil = mysqli_query($connect, $query);
                                                                    $jumlah = mysqli_num_rows($hasil);
                                                                    $urut = 0;
                                                                    while ($row = mysqli_fetch_array($hasil)) { ?>
                                                                        <option name="ID_PKT" value="<?= $row["ID_PKT"]; ?>">
                                                                            <?= $row["NM_PKT"]; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>

                                                                <label class="col-form-label" for="ID_ARM">Armada</label>
                                                                <select class="form-control" name="ID_ARM" id="ID_ARM">
                                                                    <?php
                                                                    $query = "SELECT * FROM armada";
                                                                    $hasil = mysqli_query($connect, $query);
                                                                    $jumlah = mysqli_num_rows($hasil);
                                                                    $urut = 0;
                                                                    while ($row = mysqli_fetch_array($hasil)) { ?>
                                                                        <option name="ID_ARM" value="<?= $row["ID_ARM"]; ?>">
                                                                            <?= $row["NM_ARM"]; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>

                                                                <label class="col-form-label" for="ID_HOTEL">Hotel</label>
                                                                <select class="form-control" name="ID_HOTEL" id="ID_HOTEL">
                                                                    <?php
                                                                    $query = "SELECT * FROM hotel";
                                                                    $hasil = mysqli_query($connect, $query);
                                                                    $jumlah = mysqli_num_rows($hasil);
                                                                    $urut = 0;
                                                                    while ($row = mysqli_fetch_assoc($hasil)) { ?>
                                                                        <option name="ID_HOTEL" value="<?= $row["ID_HOTEL"]; ?>">
                                                                            <?= $row["NM_HOTEL"]; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>

                                                                <label class="col-form-label" for="TGL_PELAKSANAAN">Tanggal Pelaksanaan</label>
                                                                <input type="text" class="form-control input-default" name="TGL_PELAKSANAAN" id="TGL_PELAKSANAAN" autocomplete="off" required title="isikan tanggal awal sampai akhir keberangkatan">

                                                                <label class="col-form-label" for="TMPT_JPT">Tempat Jemput</label>
                                                                <input type="text" class="form-control input-default" name="TMPT_JPT" id="TMPT_JPT" autocomplete="off" required>

                                                                <label class="col-form-label" for="HARGA">Harga</label>
                                                                <input type="text" class="form-control input-default" name="HARGA" id="HARGA" autocomplete="off" required title="isikan hanya angka" onkeypress="return event.charCode >= 48 && event.charCode <=57">

                                                                <label class="col-form-label" for="BAYAR">Bayar</label>
                                                                <input type="text" class="form-control input-default" name="BAYAR" id="BAYAR" autocomplete="off" required title="isikan hanya angka" onkeypress="return event.charCode >= 48 && event.charCode <=57">


                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="reset" class="btn btn-secondary" value="Reset" style="color:white;">
                                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Pemesan</th>
                                    <th>Anggota</th>
                                    <th>Paket</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Pelaksanaan</th>
                                    <th>Tempat</th>
                                    <th>Armada</th>
                                    <th>Hotel</th>
                                    <th>Harga</th>
                                    <th>Bayar</th>
                                    <th>Invoice</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($trns as $trans) : ?>


                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td> <?= $trans["NM_PEMESAN"]; ?> </td>
                                        <td> <?= $trans["JMLH_ANGGOTA"]; ?> <a tyle="color: white;" class="btn btn-success" href="index.php?page=detailpemesan&JMLH_ANGGOTA=<?= $trans["JMLH_ANGGOTA"]; ?>&ID_PEMESAN=<?= $trans["ID_PEMESAN"]; ?>">detail</a></td>
                                        <td> <?= $trans["NM_PKT"]; ?> <a tyle="color: white;" class="btn btn-success" href="index.php?page=detailpaket&ID_PEMESAN=<?= $trans["ID_PEMESAN"]; ?>&ID_TRNS=<?= $trans["ID_TRNS"]; ?>&ID_PKT=<?= $trans["ID_PKT"]; ?>&status=<?= $trans["status"]; ?>">detail</a></td>
                                        <td> <?= $trans["TGL_PSN"]; ?> </td>
                                        <td> <?= $trans["TGL_PELAKSANAAN"]; ?> </td>
                                        <td> <?= $trans["TMPT_JPT"]; ?> </td>
                                        <td> <?= $trans["NM_ARM"]; ?> </td>
                                        <td> <?= $trans["NM_HOTEL"]; ?> </td>
                                        <td> <?= $trans["HARGA"]; ?></td>
                                        <td> <?= $trans["BAYAR"]; ?> </td>
                                        <td><a style="color: white;" class="btn btn-success" href="_invoice.php?id=<?php echo $_SESSION['username']; ?>&JMLH_ANGGOTA=<?= $trans["JMLH_ANGGOTA"]; ?>&ID_PEMESAN=<?= $trans["ID_PEMESAN"]; ?>&TGL_PELAKSANAAN=<?= $trans["TGL_PELAKSANAAN"]; ?>&NM_PKT=<?= $trans["NM_PKT"]; ?>&ID_TRANS=<?= $trans["ID_TRANS"]; ?>&HARGA=<?= $trans["HARGA"]; ?>&NM_PEMESAN=<?= $trans["NM_PEMESAN"]; ?>">Cetak Invoice PDF</a></td>
                                        <td>
                                            <span>
                                                <div class="btn-group mr-2 mb-2">
                                                    <a href="index.php?page=ubahtransaksi&ID_TRNS=<?= $trans["ID_TRNS"]; ?>" data-placement="top" title="">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button>
                                                    </a>



                                                    &nbsp;
                                                    <a href="_hapus_transaksi.php?ID_TRNS=<?= $trans["ID_TRNS"]; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </a>
                                                </div>

                                            </span>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Pemesan</th>
                                    <th>Anggota</th>
                                    <th>Paket</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Pelaksanaan</th>
                                    <th>Tempat</th>
                                    <th>Armada</th>
                                    <th>Hotel</th>
                                    <th>Harga</th>
                                    <th>Bayar</th>
                                    <th>Invoice</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>