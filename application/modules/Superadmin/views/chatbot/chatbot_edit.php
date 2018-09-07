<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Chatbot</h4>
            <form class="" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id_chatbot" class="form-control" placeholder="" value="<?php echo $dataedit->id_chatbot?>" readonly>
            </div>
	  <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="<?php echo $dataedit->name?>" required>
    </div>
	  <div class="form-group">
            <label>Akses Token</label>
            <input type="text" name="access_token" class="form-control" value="<?php echo $dataedit->access_token?>"  required>
    </div>
	  <div class="form-group">
            <label>Secret Token</label>
            <input type="text" name="secret_token" class="form-control" value="<?php echo $dataedit->secret_token?>"  required>
    </div>
	  <div class="form-group">
            <label>Exppire Token</label>
            <input type="date" name="expire_token" class="form-control" value="<?php echo $dataedit->expire_token?>"  required>
    </div>
	  <div class="form-group">
            <label>Admin</label>
            <select class="form-control" name="id_admin"  required>
              <?php foreach ($dataadmin as $a): ?>
                <option value="<?php echo $a->id_admin ?>"><?php echo $a->name ?></option>
              <?php endforeach; ?>
            </select>
    </div>
	  <div class="form-group">
            <label>Superadmin</label>
            <select class="form-control" name="id_superadmin"  required>
              <?php foreach ($datasuperadmin as $b): ?>
                <option value="<?php echo $b->id_superadmin; ?>"><?php echo $b->name ?></option>
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
