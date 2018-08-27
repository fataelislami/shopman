<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title">Data Superadmin</h4>
                      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                  </div>
                  <div class="col-md-6 text-right">
                      <?php echo anchor(site_url($module.'/akun/create'), '+ Tambah Data', 'class="btn btn-primary"'); ?>
      	    </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($dataakun as $d): ?>
                            <tr>
                              <td><?php echo $d->id_superadmin ?></td>
                              <td><?php echo $d->name ?></td>
                              <td><?php echo $d->username ?></td>
                              <td><?php echo $d->email ?></td>
                                <td>
                                <a href="<?php echo base_url().$module?>/akun/edit/<?php echo $d->id_superadmin ?>">
                                        <button class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-danger waves-effect waves-light m-r-10" data-toggle="modal" data-target="#myDelete<?php echo $d->id_superadmin?>">Delete</button>
                                    <!-- sample modal activation content -->
                                    <div id="myDelete<?php echo $d->id_superadmin?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                  <a href="<?php echo base_url().$module?>/akun/delete/<?php echo $d->id_superadmin ?>">
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
