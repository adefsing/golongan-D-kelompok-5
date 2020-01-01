<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <div class="col-sm-12 col-md-6">
                                <label>
                                    <h4>Edit Testimoni</h4>
                                </label>
                            </div>
                            <?php
                            $id = $_GET['id'];
                            $query = "SELECT * FROM testimoni WHERE ID_TESTI = '$id'";
                            $sql = mysqli_query($connect, $query);
                            $data = mysqli_fetch_array($sql)
                            ?>
                            <form method="post" action="_edit_testi.php?id=<?php echo $id; ?>">

                                <div class=" row ">
                                    <div class=" form-group col ml-auto">
                                        <label class="col-form-label">Nama Pelanggan</label>
                                        <input type="text" name="nm_pemesan" value="<?php echo $data['NM_PEMESAN']; ?>" class="form-control input-default" placeholder="Nama Pelanggan">
                                        <label class="col-form-label">Testimoni</label>
                                        <input type="text" name="tlp" value="<?php echo $data['ISI_TESTI']; ?>" class="form-control input-default" placeholder="Testimoni">
                                        <label class="col-form-label">Foto</label>
                                        <textarea type="text" name="foto" class="form-control input-default" placeholder="foto" value="<?php echo $data['FOTO']; ?>" style="height:125px;"><?php echo $data['FOTO']; ?></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?page=testi" class="btn btn-secondary" style="color:white;">Kembali</a>
                                    <button type="submit" name="Esubmit" class="btn btn-primary" onclick='return confirmation()'>Simpan</button>
                                </div>
                                
                                <script type="text/javascript">
                                    function confirmation(){
                                        if (confirm("Anda yakin ingin mengubah data?")){
                                            location.href='_edit_rm.php';
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