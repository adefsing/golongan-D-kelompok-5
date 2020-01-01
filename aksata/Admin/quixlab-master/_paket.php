<div class="container-fluid">
    <?php

    $pkt = query("SELECT * FROM paket ORDER BY ID_PKT DESC");
    ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Data Paket</h4>
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label style="text-aling:right;">

                                    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>



                                </label>
                                <label style="text-align:right;">

                                    <a href="_report_paket.php?id=<?php echo $_SESSION['username']; ?>"><button type="button" class="btn mb-1 btn-primary btn-lg">CETAK DATA PDF</button>
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
                                                <form method="post" action="_tambah_paket.php" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col ml-auto">
                                                            <input type="hidden" name="ID_PKT" id="ID_PKT" value="<?= $idpkt; ?>">
                                                            <label class="col-form-label">Nama Paket</label>
                                                            <input type="text" name="NM_PKT" id="NM_PKT" class="form-control input-default" autocomplete="off" placeholder="Nama Paket">
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
                                    <th>NO.</th>
                                    <th>Paket</th>
                                    <th>Detail</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1; ?>
                                <?php foreach ($pkt as $pktt) : ?>
                                    <tr>
                                        <td> <?= $i; ?> </td>

                                        <td> <?= $pktt["NM_PKT"]; ?> </td>
                                        <td>
                                            &nbsp; &nbsp; <a style="color: white;" title="detail nama paket" class="btn btn-success" href="pilihwisata.php?ID_PKT=<?= $pktt["ID_PKT"]; ?>&NM_PKT=<?= $pktt["NM_PKT"]; ?>">Detail</a>
                                        </td>
                                        <td>
                                            <span>
                                                <div class="btn-group mr-2 mb-2">
                                                    <a href="ubah.php?ID_PKT=<?= $pktt["ID_PKT"]; ?>" data-placement="top" title="ubah">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button>
                                                    </a>



                                                    &nbsp;
                                                    <a href="hapus.php?ID_PKT=<?= $pktt["ID_PKT"]; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="hapus" data-original-title="Hapus">
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
                                    <th>NO.</th>
                                    <th>Paket</th>
                                    <th>Detail</th>
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