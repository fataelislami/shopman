<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title">Aktivasi Admin Olshop</h4>
                      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                  </div>
                  <div class="col-md-6 text-right">
                    <!--/span-->
                        <div class="form-group">
                            <label>Filter</label>
                            <select class="form-control custom-select">
                                <option>--Select your Filter Option--</option>
                                <option>ALL</option>
                                <option>Active</option>
                                <option>Non Active</option>
                            </select>
                        </div>
                    <!--/span-->
      	          </div>
              </div>


                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>Toko</th>
                              <th>Status</th>
                              <th>ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($dataadmin as $d): ?>
                            <tr>
                                <td width="5%"><?php echo $d->id_admin ?></td>
                                <td width="20%"><?php echo $d->name ?></td>
                                <td width="45%"><?php echo $d->store_title ?></td>
                                <td witdh="10%">
                                  <?php
                                    if ($d->id_superadmin == null) {
                                      echo "Nonaktif";
                                    } else {
                                      echo "Active";
                                    }
                                  ?>

                                </td>
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

                                                                  <div class="form-group">
                                                                          <label>ID</label>
                                                                          <input type="text" name="id_admin" class="form-control" placeholder="" value="<?php echo $d->id_admin?>" readonly>
                                                                  </div>
                                                                  <div class="form-group">
                                                                          <label>Email</label>
                                                                          <input type="text" name="email" class="form-control" value="<?php echo $d->email?>" readonly>
                                                                  </div>
                                                                  <div class="form-group">
                                                                          <label>Nama</label>
                                                                          <input type="text" name="name" class="form-control" value="<?php echo $d->name?>" readonly>
                                                                  </div>
                                                                  <div class="form-group">
                                                                          <label>Alamat</label>
                                                                          <input type="text" name="address" class="form-control" value="<?php echo $d->address?>" readonly>
                                                                  </div>
                                                                  <div class="form-group">
                                                                          <label>Toko</label>
                                                                          <input type="text" name="store_title" class="form-control" value="<?php echo $d->store_title?>" readonly>
                                                                  </div>
                                                                  <div class="form-group">
                                                                          <label>Tanggal Bergabung</label>
                                                                          <input type="text" name="date" class="form-control" value="<?php echo $d->date?>" readonly>
                                                                  </div>
                                                                  <div class="form-group">
                                                                          <label>Tanggal Regist</label>
                                                                          <input type="text" name="regist_date" class="form-control" value="<?php echo $d->regist_date?>" readonly>
                                                                  </div>
                                                                  <div class="form-group">
                                                                          <label>Expire Date</label>
                                                                          <input type="text" name="expire_date" class="form-control" value="<?php echo $d->expire_date?>" readonly>
                                                                  </div>
                                                          </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- /.model body -->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->

                                    <?php if ($d->id_superadmin == null): ?>

                                      <!-- Aktivasi dan deaktivasi -->
                                      <button class="btn btn-success waves-effect waves-light m-r-10" data-toggle="modal" data-target="#myActivation<?php echo $d->id_admin?>">Aktivasi</button>
                                      <!-- sample modal activation content -->
                                      <div id="myActivation<?php echo $d->id_admin?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="myModalLabel">Pesan</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <h4>Anda Yakin akan aktivasi akun dengan nama <?php echo $d->name?></h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <a href="<?php echo base_url().$module?>/activation/activation/<?php echo $d->id_admin ?>">
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

                                    <?php else: ?>

                                      <button class="btn btn-danger waves-effect waves-light m-r-10" data-toggle="modal" data-target="#myDeactivation<?php echo $d->id_admin?>">Deaktivasi</button>
                                      <!-- sample modal deakctivation content -->
                                      <div id="myDeactivation<?php echo $d->id_admin?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="myModalLabel">Pesan</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <h4>Anda Yakin akan deaktivasi akun dengan nama <?php echo $d->name?></h4>  </div>
                                                  <div class="modal-footer">
                                                    <a href="<?php echo base_url().$module?>/activation/deactivation/<?php echo $d->id_admin ?>">
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

                                    <?php endif; ?>

                                  <!-- end aktivasi dan deaktivasi -->
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
