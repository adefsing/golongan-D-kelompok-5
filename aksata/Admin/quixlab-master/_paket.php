<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            
                                
                                <div class="table-responsive">
                                <div class="col-sm-12">
                                        <div class="col-sm-12 col-md-6">
                                          <label>
                                                <h4>Data Paket</h4>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label style="text-aling:right;">
                                                <a href="">
                                                    <button type="button" class="btn mb-1 btn-primary btn-lg">TAMBAH DATA</button>
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID PAKET</th>
                                                <th>NAMA PAKET</th>
                                                <th>HARGA</th>
                                                <th>RINCIAN</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = "Select * from paket";
                                        $sql = mysqli_query($connect, $query);
                                        while($data = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td><?php echo $data['ID_PKT']; ?></td>
                                                <td><?php echo $data['NM_PKT']; ?></td>
                                                <td><?php echo $data['HARGA']; ?></td>
                                                <td><?php echo $data['RINCIAN']; ?></td>
                                                <td>
                                                    <span>
                                                        <div class="btn-group mr-2 mb-2">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </button> 
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button> 
                                                        </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID PAKET</th>
                                                <th>NAMA PAKET</th>
                                                <th>HARGA</th>
                                                <th>RINCIAN</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>