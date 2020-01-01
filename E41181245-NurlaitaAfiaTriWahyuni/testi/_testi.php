<div class="container-fluid">
    <?php
    require 'function.php';

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql1 = mysqli_query($connect, "DELETE FROM testimoni WHERE ID_TESTI ='$id';");
        if ($sql1) {
            echo "<script>alert('Data berhasil dihapus');document.location.href='index.php?page=testimoni'</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');document.location.href='index.php?page=testimoni'</script>";
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
                                    <h4>Testimoni</h4>
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label style="text-aling:right;">

                                    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH TESTIMONI</button>



                                <!-- </label>
                                <label style="text-align:right;">

                                    <a href="_report_armada.php?id=<?php echo $_SESSION['username']; ?>"><button type="button" class="btn mb-1 btn-primary btn-lg">CETAK DATA PDF</button>
                                    </a>


                                </label> -->
                                <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH TESTIMONI</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="_tambah_testi.php" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col ml-auto">
                                                            <label class="col-form-label">Nama Pelanggan</label>
                                                            <input type="text" name="nm_pemesan" class="form-control input-default" placeholder="Nama Pelanggan">
                                                            <label class="col-form-label">Testimoni</label>
                                                            <textarea type="text" name="testi" class="form-control input-default" placeholder="Testimoni" style="height:125px;"></textarea>
                                                            <label class="col-form-label">Foto</label>
                                                            <input type="file" name="foto" accept="image/*" class="form-control input-default" placeholder="Foto">
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
                                    <th>NAMA PELANGGAN</th>
                                    <th>TESTIMONI</th>
                                    <th>FOTO</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_GET['id'];
                                $query = "SELECT * FROM testimoni";
                                $sql = mysqli_query($connect, $query);
                                $no = 1;
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <!-- <td><?= $data['ID_TESTI']; ?></td> -->
                                        <td><?= $data['NM_PEMESAN']; ?></td>
                                        <td><?= $data['ISI_TESTI']; ?></td>
                                        <td><?= $data['FOTO']; ?></td>
                                        <td>

                                            <div class="btn-group mr-2 mb-2">
                                                <a href="?page=_fedit_testimoni&id=<?= $data['ID_TESTI']; ?>" data-placement="top" title="ubah" data-original-title="Edit">
                                                    <button type="button" class="btn btn-primary">
                                                        <i class="fa fa-pencil color-muted m-r-5"></i>
                                                    </button>
                                                </a>
 


                                                &nbsp;
                                                <a href="?page=testimoni&id=<?= $data['ID_TESTI']; ?>" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fa fa-close color-danger"></i>
                                                    </button>
                                                </a>

                                            </div>

                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>



                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO.</th>
                                    <!-- <th>ID ARMADA</th> -->
                                    <th>NAMA PELANGGAN</th>
                                    <th>TESTIMONI</th>
                                    <th>FOTO</th>
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