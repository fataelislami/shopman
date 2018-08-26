<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Admin</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>email</label>
            <input type="text" name="email" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>password</label>
            <input type="text" name="password" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>name</label>
            <input type="text" name="name" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>address</label>
            <input type="text" name="address" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>store_title</label>
            <input type="text" name="store_title" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>date</label>
            <input type="text" name="date" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>regist_date</label>
            <input type="text" name="regist_date" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>expire_date</label>
            <input type="text" name="expire_date" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_superadmin</label>
            <input type="text" name="id_superadmin" class="form-control" placeholder="">
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
