<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Admin</h4>
            <form class="" method="post" action="<?php echo base_url().$action ?>">
              <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" required>
              </div>
        	  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="" required>
            </div>
            <div class="row p-t-20">
                <div class="col-md-6">
                  <div class="form-group">
                          <label>Password</label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="" required>
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                          <label>Retype Password</label>
                          <input type="password" class="form-control" data-validation-matches-match="email" data-validation-matches-message="Must match email address entered above"  required>
                  </div>
                </div>
                <!--/span-->
            </div>
        	  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="address" class="form-control" placeholder="" required>
            </div>
        	  <div class="form-group">
                    <label>Nama Toko</label>
                    <input type="text" name="store_title" class="form-control" placeholder="" required>
            </div>
	          <input type="hidden" name="id_admin" />

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
