<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Peramalan Stok</h4>
                                </label>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $query = "Select * from paket where ID_PKT = '$id'";
                            $sql = mysqli_query($connect, $query);
                            $data = mysqli_fetch_array($sql)
                            ?>
                            <form method="post" action="_edit_paket.php?id=<?php echo $id; ?>">

                                <div class="row ">
                                    <div class="form-group col ml-auto">

                                        <label class="col-form-label">Nama Paket</label>
                                        <input type="text" name="nm_paket" class="form-control input-default" placeholder="Nama Paket" value="<?php echo $data['NM_PKT']; ?>">
                                        <label class="col-form-label">Harga</label>
                                        <input type="text" name="harga" class="form-control input-default" maxlength="13" value="<?php echo $data['HARGA']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Harga">
                                        <label class="col-form-label">Rincian</label>
                                        <textarea type="text" name="rincian" class="form-control input-default" placeholder="Rincian" style="height:125px;"><?php echo $data['RINCIAN']; ?></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="?page=paket" class="btn btn-secondary" style="color:white;">Kembali</a>
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