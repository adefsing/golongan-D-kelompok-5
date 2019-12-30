<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Armada</h4>
                                </label>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $query = "Select * from armada where ID_ARM = '$id'";
                            $sql = mysqli_query($connect, $query);
                            $data = mysqli_fetch_array($sql)
                            ?>
                            <form method="post" action="_edit_armada.php?id=<?php echo $id; ?>">

                                <div class=" row ">
                                    <div class=" form-group col ml-auto">
                                        <label class="col-form-label">Nama Armada</label>
                                        <input type="text" name="nm_armada" value="<?php echo $data['NM_ARM']; ?>" class="form-control input-default" placeholder="Nama armada">
                                        <label class="col-form-label">Telepon</label>
                                        <input type="text" name="tlp" value="<?php echo $data['TLP_ARM']; ?>" class="form-control input-default" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Telpon Armada">
                                        <label class="col-form-label">Alamat</label>
                                        <textarea type="text" name="alamat" class="form-control input-default" placeholder="Alamat Armada" style="height:125px;"><?php echo $data['ALAMAT_ARM']; ?></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?page=armada" class="btn btn-secondary" style="color:white;">Kembali</a>
                                    <button type="submit" name="Esubmit" class="btn btn-primary" onclick='return confirmation()'>Simpan</button>
                                </div>
                                
                                <script type="text/javascript">
                                    function confirmation(){
                                        if (confirm("Anda yakin ingin mengubah data?")){
                                            location.href='_edit_armada.php';
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