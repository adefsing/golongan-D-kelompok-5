<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Wisata</h4>
                                </label>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $query = "Select * from wisata where ID_WST = '$id'";
                            $sql = mysqli_query($connect, $query);
                            $data = mysqli_fetch_array($sql)
                            ?>
                            <form method="post" action="_edit_wisata.php?id=<?= $id; ?>">

                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <label class="col-form-label">Nama Wisata</label>
                                        <input type="text" name="nm_wisata" value="<?= $data['NM_WST']; ?>" class="form-control input-default" placeholder="Nama wisata">
                                        <label class="col-form-label">Telepon</label>
                                        <input type="text" name="tlp" value="<?= $data['TLP_WST']; ?>" class="form-control input-default" title="isikan hanya angka" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Telepon">
                                        <label class="col-form-label">Alamat</label>
                                        <textarea type="text" name="alamat" value="<?= $data['ALAMAT_WST']; ?>" class="form-control input-default" placeholder="Alamat" style="height:125px;"></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?page=wisata" class="btn btn-secondary" style="color:white;">Kembali</a>
                                    <button type="submit" name="Esubmit" class="btn btn-primary" onclick='return confirmation()'>Simpan</button>
                                </div>

                                <script type="text/javascript">
                                    function confirmation(){
                                        if (confirm("Anda yakin ingin mengubah data?")){
                                            location.href='_edit_wisata.php';
                                        }
                                        else {
                                            return false;
                                        }
                                    } 
                                </script>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>