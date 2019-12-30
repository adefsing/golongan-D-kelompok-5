<div class="container-fluid">
    <?php

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql1 = mysqli_query($connect, "DELETE FROM wisata WHERE ID_WST ='$id';");
        if ($sql1) {
            echo "<script>alert('Data Berhasil Di Hapus');document.location.href='index.php?page=wisata'</script>";
        } else {
            echo "<script>alert('Data Gagal Di Hapus');document.location.href='index.php?page=wisata'</script>";
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
                                    <h4>Data Wisata</h4>
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label style="text-aling:right;">

                                    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>



                                </label>
                                <label style="text-align:right;">

                                    <a href="_report_wisata.php?id=<?php echo $_SESSION['username']; ?>"><button type="button" class="btn mb-1 btn-primary btn-lg">CETAK DATA PDF</button>
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
                                                <form method="post" action="_tambah_wisata.php" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="form-group col ml-auto">
                                                            <label class="col-form-label">Nama Wisata</label>
                                                            <input type="text" name="nm_wisata" class="form-control input-default" placeholder="Nama wisata">
                                                            <label class="col-form-label">Telepon Wisata</label>
                                                            <input type="text" name="tlp" class="form-control input-default" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Telepon Wisata">
                                                            <label class="col-form-label">Alamat Wisata</label>
                                                            <textarea type="text" name="alamat" class="form-control input-default" placeholder="Alamat Wisata" style="height:125px;"></textarea>
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
                                    <th>ID WISATA</th>
                                    <th>NAMA WISATA</th>
                                    <th>ALAMAT WISATA</th>
                                    <th>TLP_WISATA</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_GET['id'];
                                $query = "Select * from wisata";
                                $sql = mysqli_query($connect, $query);
                                $no = 1;
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['ID_WST']; ?></td>
                                        <td><?php echo $data['NM_WST']; ?></td>
                                        <td><?php echo $data['ALAMAT_WST']; ?></td>
                                        <td><?php echo $data['TLP_WST']; ?></td>
                                        <td>
                                            <span>
                                                <div class="btn-group mr-2 mb-2">
                                                    <a href="?page=fedit_wisata&id=<?php echo $data['ID_WST']; ?>" data-placement="top" title="" data-original-title="Edit">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button>
                                                    </a>



                                                    &nbsp;
                                                    <a href="?page=wisata&id=<?php echo $data['ID_WST']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </a>
                                                </div>

                                            </span>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>



                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>ID WISATA</th>
                                    <th>NAMA WISATA</th>
                                    <th>ALAMAT WISATA</th>
                                    <th>TLP_WISATA</th>
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