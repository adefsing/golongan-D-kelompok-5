<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Pemesan</h4>
                                </label>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $query = "Select * from pemesan where ID_PEMESAN = '$id'";
                            $sql = mysqli_query($connect, $query);
                            $data = mysqli_fetch_array($sql)
                            ?>
                            <form method="post" action="_edit_customer.php?id=<?php echo $id; ?>">

                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <label class="col-form-label">Nama Pemesan</label>
                                        <input type="text" name="nama_pemesan" value="<?php echo $data['NM_PEMESAN']; ?>" class="form-control input-default" placeholder="Nama customer">
                                        <label class="col-form-label">Jumlah Anggota</label>
                                        <input type="text" name="jml" value="<?php echo $data['JMLH_ANGGOTA']; ?>" class="form-control input-default" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Jumlah Anggota">
                                        <label class="col-form-label">NIK</label>
                                        <input type="text" name="nik" value="<?php echo $data['NIK']; ?>" class="form-control input-default" maxlength="25" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="NIK">
                                        <label class="col-form-label">Tanggal Pesan</label>
                                        <input type="date" name="tanggal" value="<?php echo $data['TGL_PSN']; ?>" class="form-control input-default" placeholder="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?page=customer" class="btn btn-secondary" style="color:white;">Kembali</a>
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