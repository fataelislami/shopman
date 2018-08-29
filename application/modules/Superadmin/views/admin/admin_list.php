<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title">Data Admin</h4>
                      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                  </div>
                  <div class="col-md-6 text-right">
                      <?php echo anchor(site_url($module.'/admin/create'), '+ Tambah Data', 'class="btn btn-primary"'); ?>
      	    </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>Toko</th>
                              <th>ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($dataadmin as $d): ?>
                            <tr>
                                <td width="5%"><?php echo $d->id_admin ?></td>
                                <td width="20%"><?php echo $d->name ?></td>
                                <td width="55%"><?php echo $d->store_title ?></td>
                                <td width="20%">
                                    <!-- modal -->
                                    <button type="button" class="btn btn-primary waves-effect waves-light m-r-10" data-toggle="modal" data-target="#exampleModal<?php echo $d->id_admin ?>" data-whatever="@mdo">Detail</button>
                                    <div class="modal fade bs-example-modal-lg" id="exampleModal<?php echo $d->id_admin ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Detail Admin</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">

                                                  <!-- Modal Body -->
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <div class="card">
                                                          <div class="card-body">
                                                            <table width="100%">
                                                              <tr>
                                                                <td width="30%">ID</td>
                                                                <td><?php echo $d->id_admin?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Email</td><td><?php echo $d->email?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Nama</td><td><?php echo $d->name?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Alamat</td><td><?php echo $d->address?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Nama Toko</td><td><?php echo $d->store_title?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tgl Bergabung</td><td><?php echo $d->date?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tgl Registrasi</td><td><?php echo $d->regist_date?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tgl Expire</td><td><?php echo $d->expire_date?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Nama SuperAdmin</td><td><?php echo $d->name2?></td>
                                                              </tr>
                                                            </table>
                                                          </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- /.model body -->

                                                </div>
                                                <div class="modal-footer">
                                                  <a href="<?php echo base_url().$module?>/admin/edit/<?php echo $d->id_admin ?>">
                                                      <button class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                                  </a>
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                    <a href="<?php echo base_url().$module?>/admin/edit/<?php echo $d->id_admin ?>">
                                        <button class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-danger waves-effect waves-light m-r-10" data-toggle="modal" data-target="#myDelete<?php echo $d->id_admin?>">Delete</button>
                                    <!-- sample modal activation content -->
                                    <div id="myDelete<?php echo $d->id_admin?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Pesan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Anda Yakin akan menghapus akun dengan nama <?php echo $d->name?></h4>
                                                </div>
                                                <div class="modal-footer">
                                                  <a href="<?php echo base_url().$module?>/admin/delete/<?php echo $d->id_admin ?>">
                                                    <button type="button" class="btn btn-info waves-effect">OK</button>
                                                  </a>
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <!-- end tombol hapus -->

                                </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
