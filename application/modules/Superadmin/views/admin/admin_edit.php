<div class="row">
  <div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-body">
            <h4 class="card-title">Tambah Admin</h4>
            <form method="post" action="<?php echo base_url().$action ?>">
              	  <div class="form-group">
                          <label>ID</label>
                          <input type="text" name="id_admin" class="form-control" placeholder="" value="<?php echo $dataedit->id_admin?>" readonly>
                  </div>
              	  <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" value="<?php echo $dataedit->email?>" required>
                  </div>
              	  <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" value="<?php echo $dataedit->password?>" required>
                  </div>
              	  <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $dataedit->name?>" required>
                  </div>
              	  <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" name="address" class="form-control" value="<?php echo $dataedit->address?>" required>
                  </div>
              	  <div class="form-group">
                          <label>Nama Toko</label>
                          <input type="text" name="store_title" class="form-control" value="<?php echo $dataedit->store_title?>" required>
                  </div>
              	  <div class="form-group">
                          <label>date</label>
                          <input type="date" name="date" class="form-control" value="<?php echo $dataedit->date?>" required>
                  </div>
              	  <div class="form-group">
                          <label>regist_date</label>
                          <input type="datetime" name="regist_date" class="form-control" value="<?php echo $dataedit->regist_date?>">
                  </div>
              	  <div class="form-group">
                          <label>expire_date</label>
                          <input type="date" name="expire_date" class="form-control" value="<?php echo $dataedit->expire_date?>">
                  </div>
              	  <div class="form-group">
                          <label>Diverifikasi Oleh</label>
                          <select class="form-control custom-select" name="id_superadmin" required>
                            <?php foreach ($datasuper as $super):?>
                              <option value=" <?php echo $super->id_superadmin ?>" <?php if ($super->id_superadmin == $dataedit->id_superadmin) {echo "selected";} ?>>
                                <?php echo $super->name ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                  </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
