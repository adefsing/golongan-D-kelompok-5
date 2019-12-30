<div class="container-fluid">
    <?php
    require 'functions.php';
    $trns = query("SELECT transaksi.ID_TRNS, 
                    -- transaksi.ID_PEMESAN,
                    pemesan.ID_PEMESAN, 
                    pemesan.NM_PEMESAN, 
                    pemesan.JMLH_ANGGOTA, 
                    transaksi.ID_PKT, 
                    paket.NM_PKT, 
                    paket.status,
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

    // tombol search
    if (isset($_POST["cari"])) {
        $trns = caritrns($_POST["keyword"]);
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

                                    <a href="_report_rumahmakan.php?id=<?php echo $_SESSION['username']; ?>"><button type="button" class="btn mb-1 btn-primary btn-lg">CETAK DATA PDF</button>
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
                                                <form method="post" action="_tambah_rm.php" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col ml-auto">
                                                            <label class="col-form-label">Nama Rumah Makan</label>
                                                            <input type="text" name="nm_rm" class="form-control input-default" placeholder="Nama rm">
                                                            <label class="col-form-label">Telepon Rumah Makan</label>
                                                            <input type="text" name="tlp" class="form-control input-default" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Telepon Rumah Makan">
                                                            <label class="col-form-label">Alamat Rumah Makan</label>
                                                            <textarea type="text" name="alamat" class="form-control input-default" placeholder="Alamat Rumah Makan" style="height:125px;"></textarea>
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
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($trns as $trans) : ?>


                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td> <?= $trans["NM_PEMESAN"]; ?> </td>
                                        <td> <?= $trans["JMLH_ANGGOTA"]; ?> <a href="../pemesan/detailpemesan.php?JMLH_ANGGOTA=<?= $trans["JMLH_ANGGOTA"]; ?>&ID_PEMESAN=<?= $trans["ID_PEMESAN"]; ?>">detail</a></td>
                                        <td> <?= $trans["NM_PKT"]; ?> <a href="../pilihwisata/index.php?ID_PEMESAN=<?= $trans["ID_PEMESAN"]; ?>&ID_TRNS=<?= $trans["ID_TRNS"]; ?>&ID_PKT=<?= $trans["ID_PKT"]; ?>&status=<?= $trans["status"]; ?>">detail</a></td>
                                        <td> <?= $trans["TGL_PSN"]; ?> </td>
                                        <td> <?= $trans["TGL_PELAKSANAAN"]; ?> </td>
                                        <td> <?= $trans["TMPT_JPT"]; ?> </td>
                                        <td> <?= $trans["NM_ARM"]; ?> </td>
                                        <td> <?= $trans["NM_HOTEL"]; ?> </td>
                                        <td> <?= $trans["HARGA"]; ?></td>
                                        <td> <?= $trans["BAYAR"]; ?> </td>
                                        <td>
                                            <span>
                                                <div class="btn-group mr-2 mb-2">
                                                    <a href="?page=fedit_rm&id=<?= $trans["ID_RM"]; ?>" data-placement="top" title="">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button>
                                                    </a>



                                                    &nbsp;
                                                    <a href="?page=rm&id=<?= $trans["ID_TRNS"]; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </a>
                                                </div>

                                            </span>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
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
                                    <th>Status</th>
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