<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Superadmin</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_superadmin</label>
                    <input type="text" name="id_superadmin" class="form-control" placeholder="" value="<?php echo $dataedit->id_superadmin?>" readonly>
            </div>
	  <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $dataedit->username?>">
    </div>
	  <div class="form-group">
            <label>password</label>
            <input type="text" name="password" class="form-control" value="" placeholder="Masukan password Baru">
    </div>
	  <div class="form-group">
            <label>email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $dataedit->email?>">
    </div>
	  <div class="form-group">
            <label>name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $dataedit->name?>">
    </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
