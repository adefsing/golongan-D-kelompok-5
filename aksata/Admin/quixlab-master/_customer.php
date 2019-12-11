<div class="container-fluid">
    <?php

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql1 = mysqli_query($connect, "DELETE FROM pemesan WHERE ID_PEMESAN ='$id';");
        if ($sql1) {
            echo "<script>alert('Data Berhasil Di Hapus');document.location.href='index.php?page=customer'</script>";
        } else {
            echo "<script>alert('Data Gagal Di Hapus');document.location.href='index.php?page=customer'</script>";
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
                                    <h4>Data Pemesan</h4>
                                </label>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label style="text-aling:right;">

                                    <button type="button" class="btn mb-1 btn-primary btn-lg" data-toggle="modal" data-target="#tambahmodal" data-whatever="@getbootstrap">TAMBAH DATA</button>



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
                                                            <input type="text" name="nm_customer" class="form-control input-default" placeholder="Nama customer">
                                                            <label class="col-form-label">Jumlah Anggota</label>
                                                            <input type="text" name="tlp" class="form-control input-default" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Jumlah Anggota">
                                                            <label class="col-form-label">NIK</label>
                                                            <input type="text" name="alamat" class="form-control input-default" maxlength="25" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="NIK">
                                                            <label class="col-form-label">Tanggal Pesan</label>
                                                            <input type="date" name="tanggal" class="form-control input-default" placeholder="">
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
                                    th>ID PEMESAN</th>
                                    <th>NAMA PEMESAN</th>
                                    <th>JUMLAH ANGGOTA</th>
                                    <th>NIK</th>
                                    <th>TANGGAL PESAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_GET['id'];
                                $query = "Select * from customer";
                                $sql = mysqli_query($connect, $query);
                                while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['ID_PEMESAN']; ?></td>
                                        <td><?php echo $data['NAMA_PEMESAN']; ?></td>
                                        <td><?php echo $data['JUMLAH_ANGGOTA']; ?></td>
                                        <td><?php echo $data['NIK']; ?></td>
                                        <td><?php echo $data['TGL_PSN']; ?></td>
                                        <td>
                                            <span>
                                                <div class="btn-group mr-2 mb-2">
                                                    <a href="?page=fedit_customer&id=<?php echo $data['ID_PEMESAN']; ?>" data-placement="top" title="">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button>
                                                    </a>



                                                    &nbsp;
                                                    <a href="?page=customer&id=<?php echo $data['ID_PEMESAN']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </a>
                                                </div>

                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID PEMESAN</th>
                                    <th>NAMA PEMESAN</th>
                                    <th>JUMLAH ANGGOTA</th>
                                    <th>NIK</th>
                                    <th>TANGGAL PESAN</th>
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