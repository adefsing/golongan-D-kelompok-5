<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Tambah Nama Pemesan</h4>
                                </label>
                            </div>
                            <?php


                            if (isset($_GET["ID_PEMESAN"])) {
                                $idps = $_GET["ID_PEMESAN"];
                                $ang = $_GET["JMLH_ANGGOTA"];

                                $dtl = query("SELECT * FROM dtl_pemesan WHERE ID_PEMESAN = '$idps'");
                                $baru = query("SELECT COUNT(*) AS bauk FROM dtl_pemesan WHERE ID_PEMESAN = '$idps'");
                                foreach ($baru as $barupss) :
                                    $jumlah = $barupss["bauk"];
                                endforeach;
                            }

                            if (isset($_POST["submit"])) {
                                if (tambahdtlpsn($_POST) > 0) {
                                    echo "
            <script>
                document.location.href = '?page=detailpemesan&JMLH_ANGGOTA=$ang&ID_PEMESAN=$idps';
            </script>
            ";
                                } else {
                                    echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = '?page=detailpemesan&JMLH_ANGGOTA=$ang&ID_PEMESAN=$idps';
            </script>
            ";
                                }
                            }

                            ?>

                            <form action="" method="post">

                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <label class="col-form-label" for="NM_ANGGOTA">Nama Pemesan</label>
                                        <input type="hidden" class="form-control input-default" name="ID_PEMESAN" value="<?= $idps; ?>">
                                        <input type="text" class="form-control input-default" name="NM_ANGGOTA" id="NM_ANGGOTA" autocomplete="off" autofocus pattern="^[A-Za-z -]+$" title="masukkan hanya huruf">
                                        <br />
                                        <button type="submit" class="btn btn-primary" name="submit" <?php if ($jumlah >= $ang) {
                                                                                                        echo "disabled";
                                                                                                    } ?>>TAMBAH</button>
                                        <a href="?page=customer" class="btn btn-secondary" style="color:white;">Kembali</a>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Tanggal Pesan</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dtl as $idpss) : ?>
                                        <tr>
                                            <td> <?= $i; ?> </td>
                                            <td> <?= $idpss["NM_ANGGOTA"]; ?> </td>
                                            <td>
                                                <span>
                                                    <div class="btn-group mr-2 mb-2">
                                                        <a href="index.php?page=ubahdetail&DTL_PEMESAN=<?= $idpss["DTL_PEMESAN"]; ?>&ID_PEMESAN=<?= $idps; ?>" data-placement="top" title="">
                                                            <button type="button" class="btn btn-primary">
                                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                                            </button>
                                                        </a>



                                                        &nbsp;
                                                        <a href="index.php?page=hapusdetail&DTL_PEMESAN=<?= $idpss["DTL_PEMESAN"]; ?>&ID_PEMESAN=<?= $idps; ?>&JMLH_ANGGOTA=<?= $ang; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
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
</div>