<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Profil</h4>
                                </label>
                            </div>
                            <?php
                            $id  = $_GET['id'];
                            $sql = mysqli_query($connect, "SELECT nm_adm,username,password,foto_adm FROM admin WHERE id_adm='" . $id . "'");
                            $query = mysqli_fetch_assoc($sql);
                            ?>
                            <form method="post" action="_edit_admin.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col col-md-6 ">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <label class="col-form-label">Nama Admin</label>
                                        <input type="text" name="nama" class="form-control input-default" placeholder="Nama Admin" value="<?= $query['nm_adm']; ?>">
                                        <label class="col-form-label">Username</label>
                                        <input type="text" name="username" class="form-control input-default" placeholder="Username" value="<?= $query['username']; ?>">
                                        <label class="col-form-label">Password</label>
                                        <input type="text" name="password" class="form-control input-default" placeholder="Password" value="<?= $query['password']; ?>">
                                        <label class="col-form-label">Foto Profil</label>
                                        <input type="file" name="foto" class="form-control input-default">
                                        <label for=""></label>
                                        <div class="form-check mb-3">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="ubah" class="form-check-input" value="">&nbsp; Ceklis jika ingin mengubah foto</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-secondary" value="Reset" style="color:white;">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>