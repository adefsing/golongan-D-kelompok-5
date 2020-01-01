<div class="container-fluid">
    <script src="js/jquery.min.js"></script>

    <?php

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql1 = mysqli_query($connect, "DELETE FROM inbox WHERE id_inbox ='$id';");
        if ($sql1) {
            echo "<script>alert('Data Berhasil Di Hapus');document.location.href='index.php?page=inbox'</script>";
        } else {
            echo "<script>alert('Data Gagal Di Hapus');document.location.href='index.php?page=inbox'</script>";
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
                                    <h4>Data Inbox</h4>
                                </label>
                            </div>


                            <form method="post" action="_delete_inbox.php" id="form-delete">
                                <div class="col-sm-12 col-md-6">

                                    <!-- <label style="text-aling:right;">
                                        <button class="btn mb-1 btn-primary btn-lg" type="button" id="btn-delete"> HAPUS DATA YANG DI TANDAI </button>

                                    </label> -->
                                    <label style="text-align:right;">

                                        <a href="_report_inbox.php?id=<?php echo $_SESSION['username']; ?>"><button type="button" class="btn mb-1 btn-primary btn-lg">CETAK DATA PDF</button>
                                        </a>


                                    </label>



                                </div>
                        </div>

                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <center>
                                            <input type="checkbox" id="check-all">
                                        </center>
                                    </th> -->

                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>PESAN</th>
                                    <th>STATUS</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "Select * from inbox";
                                $sql = mysqli_query($connect, $query);
                                $no = 1;
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <!-- <td align="center"><input type="checkbox" name="pilih[]" class="check-item" value="<?php echo $data['id_inbox']; ?>"></td> -->
                                        <td align="center"><?php echo $no; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td>
                                            <div style="width: 200px;"><?php echo $data['pesan']; ?></div>
                                        </td>
                                        <td align="center">

                                            <?php


                                            if ($data['status'] == 1) {
                                                echo '<span class="label gradient-1 rounded">Belum Terbaca</span>';
                                            } else {
                                                echo '<span class="label gradient-2 rounded">Sudah Terbaca</span>';
                                            }

                                            ?>

                                        </td>
                                        <td align="center">
                                            <a href="?page=pinbox&id=<?php echo $data['id_inbox']; ?>" data-placement="top" class="btn btn-primary" title="" data-original-title="Baca">
                                                BACA PESAN
                                            </a>
                                            &nbsp;
                                            <a href="?page=inbox&id=<?php echo $data['id_inbox']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-close color-danger"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <!-- <th></th> -->

                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>PESAN</th>
                                    <th>STATUS</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>

                        <script>
                            $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
                                $("#check-all").click(function() { // Ketika user men-cek checkbox all
                                    if ($(this).is(":checked")) // Jika checkbox all diceklis
                                        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
                                    else // Jika checkbox all tidak diceklis
                                        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
                                });

                                $("#btn-delete").click(function() { // Ketika user mengklik tombol delete
                                    var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi

                                    if (confirm) // Jika user mengklik tombol "Ok"
                                        $("#form-delete").submit(); // Submit form
                                });
                            });
                        </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>