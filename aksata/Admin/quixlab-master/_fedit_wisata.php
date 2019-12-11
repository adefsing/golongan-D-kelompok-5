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
                            <form method="post" action="_edit_wisata.php?id=<?php echo $id; ?>">

                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <label class="col-form-label">Nama Wisata</label>
                                        <input type="text" name="nm_wisata" value="<?php echo $data['NM_WST']; ?>" class="form-control input-default" placeholder="Nama wisata">
                                        <label class="col-form-label">Telepon Wisata</label>
                                        <input type="text" name="tlp" value="<?php echo $data['TLP_WST']; ?>" class="form-control input-default" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Telpon Wisata">
                                        <label class="col-form-label">Alamat Wisata</label>
                                        <textarea type="text" name="alamat" value="<?php echo $data['ALAMAT_WST']; ?>" class="form-control input-default" placeholder="Alamat Wisata" style="height:125px;"></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?page=wisata" class="btn btn-secondary" style="color:white;">Kembali</a>
                                    <button type="submit" name="Esubmit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>