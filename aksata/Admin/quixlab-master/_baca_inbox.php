<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <?php
                                $id  = $_GET['id'];
                                $sql = mysqli_query($connect, "SELECT * FROM inbox WHERE id_inbox='" . $id . "'");
                                $update = mysqli_query($connect, "UPDATE `inbox` SET `status`='0' WHERE `id_inbox`='" . $id . "'");
                                $query = mysqli_fetch_assoc($sql);
                                ?>
                                <label>
                                    <h4>Pesan Dari <b><?= $query['nama']; ?></b> </h4>
                                </label>
                            </div>

                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col ">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <label class="col-form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control input-default" placeholder="Nama Admin" value="<?= $query['nama']; ?>" readonly>
                                        <label class="col-form-label">Email</label>
                                        <input type="text" name="username" class="form-control input-default" placeholder="Username" value="<?= $query['email']; ?>" readonly>
                                        <label class="col-form-label">Pesan</label>
                                        <textarea class="form-control h-150px" rows="6" readonly><?= $query['pesan']; ?></textarea>

                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="?page=inbox">Kembali</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>