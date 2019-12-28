<div class="container-fluid">
    <script src="js/jquery.min.js"></script>


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

                                    <label style="text-aling:right;">
                                        <button class="btn mb-1 btn-primary btn-lg" type="button" id="btn-delete"> HAPUS DATA </button>

                                    </label>



                                </div>
                        </div>

                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>
                                        <center>
                                            <input type="checkbox" id="check-all">
                                        </center>
                                    </th>
                                    <th>NO</th>
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

                                    echo '<tr>';
                                    echo '<td align="center"><input type="checkbox" name="id_inbox[]" class="check-item" value="' . $data['id_inbox'] . '"></td>';
                                    echo "<td><?php echo $no; ?></td>";
                                    echo "<td>" . $data['nama'] . "</td>";
                                    echo "<td>" . $data['email'] . "</td>";
                                    echo "<td>" . $data['pesan'] . "</td>";
                                    echo '<td align="center">';




                                    if ($data['status'] == 1) {
                                        echo '<span class="label gradient-1 rounded">Belum Terbaca</span>';
                                    } else {
                                        echo '<span class="label gradient-2 rounded">Sudah Terbaca</span>';
                                    }


                                    echo '</td>';
                                    echo '<td align="center">';
                                    echo '<a href="?page=pinbox&id="' . $data['id_inbox'] . '"" data-placement="top" class="btn btn-primary" title="" data-original-title="Baca">
                                                BACA PESAN
                                            </a>';
                                    echo '</td>';
                                    echo '</tr>';
                                    $no++;
                                } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>PESAN</th>
                                    <th>STATUS</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>