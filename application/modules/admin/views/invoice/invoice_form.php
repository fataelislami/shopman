<!-- Validation wizard -->
<div class="row" id="validation">
  <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">

                <h4 class="card-title">Form Pembuatan Invoice</h4>
                <h6 class="card-subtitle">Tolong isi data dengan benar</h6>

                <form action="#" class="validation-wizard wizard-circle">
                    <!-- Step 1 -->
                    <h6>Tujuan</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adminname"> Nama Admin : <span class="danger">*</span> </label>
                                    <input type="text" class="form-control" id="wfirstName2" name="firstName"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"> Nama Tujuan : <span class="danger">*</span> </label>
                                    <input type="text" class="form-control" id="wlastName2" name="lastName"> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tlpadmin"> Tlp Admin : <span class="danger">*</span> </label>
                                    <input type="email" class="form-control" id="wemailAddress2" name="emailAddress"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tlp">Tlp Tujuan :</label>
                                    <input type="tel" class="form-control" id="wphoneNumber2"> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailadmin"> Email Admin : <span class="danger">*</span> </label>
                                    <input type="email" class="form-control" id="wemailAddress2" name="emailAddress"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Tujuan :</label>
                                    <input type="tel" class="form-control" id="wphoneNumber2"> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamatadmin"> Alamat Admin : <span class="danger">*</span> </label>
                                    <textarea name="name" class="form-control" rows="8" cols="80"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat"> Alamat Tujuan :</label>
                                    <textarea name="name" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                            <p id="demo">
                              test
                            </p>
                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h6>Metode Pembayaran</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaBank">Nama Bank :</label>
                                    <input type="text" class="form-control" id="jobTitle2">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="namaAkun">Nama Pemilik :</label>
                                    <input type="url" class="form-control" id="webUrl3" name="webUrl3"> </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shortDescription3">Nomor Rekening :</label>
                                    <p> 1234567890 </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Pilih Barang</h6>
                    <section>
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">Data Barang</h4>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <button type="button" class="btn btn-success waves-effect waves-light m-r-10" data-toggle="modal" data-target="#tambahBarang">Tambah</button>
                                        </div>
                                    </div>


                                      <div class="table-responsive m-t-40">
                                          <table id="mydata" class="display nowrap table table-hover table-striped table-bordered" id="mydata" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr>
                                                      <th>ID</th>
                                                      <th>Nama Barang</th>
                                                      <th>Jumlah</th>
                                                      <th>Harga</th>
                                                      <th>Total</th>
                                                      <th style='text-align:center;'>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="show_data">
                                                <button type="button" value="imam" class="btn btn-info btn-xs showModalTest" name="button">Show Modal</button>
                                              </tbody>

                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- modal tambah barang -->
                      <div id="tambahBarang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-control" action="" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="namaBank">Nama Barang :</label>
                                                    <input type="text" class="form-control" id="jobTitle2">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="namaAkun">Jumlah :</label>
                                                    <input type="number" class="form-control" id="webUrl3" name="webUrl3"> </div>
                                            </div>
                                        </div>
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="">
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

                      <!-- modal update barang -->
                      <div id="updatebarang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-control" action="" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="namaBank">Nama Barang :</label>
                                                    <input type="text" class="form-control" id="" name="updateNama">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="namaAkun">Jumlah :</label>
                                                    <input type="number" class="form-control" id="updateJumlah" name="updateJumlah"> </div>
                                            </div>
                                        </div>
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="">
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

                    </section>
                </form>
                <button type="button" value="imam" class="btn btn-info btn-xs showModalTest" name="button">Show Modal</button>
                <button type="button" value="imam2" class="btn btn-info btn-xs showModalTest" name="button">Show Modal</button>


            </div>
        </div>
    </div>
</div>
<!-- vertical wizard -->
