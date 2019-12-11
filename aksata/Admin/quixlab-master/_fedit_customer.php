<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Customer</h4>
                                </label>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $query = "Select * from customer where ID_CUST = '$id'";
                            $sql = mysqli_query($connect, $query);
                            $data = mysqli_fetch_array($sql)
                            ?>
                            <form method="post" action="_edit_customer.php?id=<?php echo $id; ?>">

                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <label class="col-form-label">Nama Customer</label>
                                        <input type="text" name="nm_customer" value="<?php echo $data['NAMA_CUST']; ?>" class="form-control input-default" placeholder="Nama customer">
                                        <label class="col-form-label">Telepon Customer</label>
                                        <input type="text" name="tlp" value="<?php echo $data['TLP_CUST']; ?>" class="form-control input-default" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Telpon Customer">
                                        <label class="col-form-label">Alamat Customer</label>
                                        <textarea type="text" name="alamat" class="form-control input-default" placeholder="Alamat Customer" style="height:125px;"><?php echo $data['ALAMAT_CUST']; ?></textarea>

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