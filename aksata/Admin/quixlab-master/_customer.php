<div class="container-fluid">
    <?php

    $ps = query("SELECT ID_PEMESAN, 
                    NM_PEMESAN, 
                    JMLH_ANGGOTA,
                    NIK,
                    DATE_FORMAT(TGL_PSN, '%d-%m-%Y') AS TGL_PSN  FROM pemesan ORDER BY TGL_PSN DESC");
    ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Data Pemesan</h4>
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label style="text-aling:right;">

                                    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>



                                </label>
                                <label style="text-align:right;">

                                    <a href="_report_customer.php?id=<?php echo $_SESSION['username']; ?>"><button type="button" class="btn mb-1 btn-primary btn-lg">CETAK DATA PDF</button>
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
                                                <form method="post" action="_tambah_customer.php" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col ml-auto">
                                                            <label class="col-form-label">Nama Pemesan</label>
                                                            <input type="text" name="nama_pemesan" class="form-control input-default" placeholder="Nama customer">
                                                            <label class="col-form-label">Jumlah Anggota</label>
                                                            <input type="text" name="jml" class="form-control input-default" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Jumlah Anggota">
                                                            <label class="col-form-label">NIK</label>
                                                            <input type="text" name="nik" class="form-control input-default" maxlength="25" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="NIK">
                                                            <label class="col-form-label">Tanggal Pesan</label>
                                                            <input type="date" name="tanggal" class="form-control input-default" value="<?= date('d-m-Y'); ?>" placeholder="">
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
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Anggota</th>
                                    <th>Tanggal Pesan</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php $a = "psn"; ?> -->
                                <?php $i = 1; ?>
                                <?php foreach ($ps as $rmm) : ?>
                                    <tr>
                                        <td> <?= $i; ?> </td>
                                        <!-- <td> <?= $rmm["ID_PEMESAN"]; ?> </td> -->
                                        <td> <?= $rmm["NM_PEMESAN"]; ?> </td>
                                        <td> <?= $rmm["NIK"]; ?> </td>
                                        <td> <?= $rmm["JMLH_ANGGOTA"]; ?>
                                            &nbsp; &nbsp; <a style="color: white;" class="btn btn-success" href="index.php?page=detailpemesan&JMLH_ANGGOTA=<?= $rmm["JMLH_ANGGOTA"]; ?>&ID_PEMESAN=<?= $rmm["ID_PEMESAN"]; ?>">Detail</a>
                                        </td>
                                        <td> <?= $rmm["TGL_PSN"]; ?> </td>
                                        <td>
                                            <span>
                                                <div class="btn-group mr-2 mb-2">
                                                    <a href="?page=fedit_customer&ID_PEMESAN=<?= $rmm["ID_PEMESAN"]; ?>" data-placement="top" title="">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button>
                                                    </a>



                                                    &nbsp;
                                                    <a href="hapus.php?NIK=<?= $rmm["NIK"]; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
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
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Anggota</th>
                                    <th>Tanggal Pesan</th>
                                    <th>ACTION</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>