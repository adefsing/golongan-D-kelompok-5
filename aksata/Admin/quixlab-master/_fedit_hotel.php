<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Hotel</h4>
                                </label>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $query = "Select * from hotel where ID_HOTEL = '$id'";
                            $sql = mysqli_query($connect, $query);
                            $data = mysqli_fetch_array($sql)
                            ?>
                            <form method="post" action="_edit_hotel.php?id=<?php echo $id; ?>">

                                <div class="row ">
                                    <div class="form-group col ml-auto">
                                        <label class="col-form-label">Nama Hotel</label>
                                        <input type="text" name="nm_hotel" value="<?php echo $data['NM_HOTEL']; ?>" class="form-control input-default" placeholder="Nama hotel">
                                        <label>Pilih Paket</label>
                                        <select name="id_paket" class="form-control">
                                            <option selected="selected"><?php echo $data["ID_PKT"] ?></option>
                                            <?php
                                            $query = "Select * from paket";
                                            $sql = mysqli_query($connect, $query);
                                            while ($dataa = mysqli_fetch_array($sql)) {
                                                ?>
                                                <option><?php echo $dataa["ID_PKT"] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="col-form-label">Telepon Hotel</label>
                                        <input type="text" name="tlp" value="<?php echo $data['TLP_HOTEL']; ?>" class="form-control input-default" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Telpon Hotel">
                                        <label class="col-form-label">Alamat Hotel</label>
                                        <textarea type="text" name="alamat" class="form-control input-default" placeholder="Alamat Hotel" style="height:125px;"><?php echo $data['ALAMAT_HOTEL']; ?></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?page=hotel" class="btn btn-secondary" style="color:white;">Kembali</a>
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