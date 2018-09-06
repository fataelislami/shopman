<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Chatbot</h4>
            <form class="" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>Akses Token</label>
            <input type="text" name="access_token" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>Secret Token</label>
            <input type="text" name="secret_token" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>Expire Token</label>
            <input type="text" name="expire_token" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>Admin</label>
            <select class="form-control" name="id_admin">
              <?php foreach ($dataadmin as $a): ?>
                <option value="<?php echo $a->id_admin; ?>"><?php echo $a->name; ?></option>
              <?php endforeach; ?>

            </select>
    </div>
	    <input type="hidden" name="id_chatbot" />

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
