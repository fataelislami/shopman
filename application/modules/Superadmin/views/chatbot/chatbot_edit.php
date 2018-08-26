<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Chatbot</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_chatbot</label>
                    <input type="text" name="id_chatbot" class="form-control" placeholder="" value="<?php echo $dataedit->id_chatbot?>" readonly>
            </div>
	  <div class="form-group">
            <label>name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $dataedit->name?>">
    </div>
	  <div class="form-group">
            <label>access_token</label>
            <input type="text" name="access_token" class="form-control" value="<?php echo $dataedit->access_token?>">
    </div>
	  <div class="form-group">
            <label>secret_token</label>
            <input type="text" name="secret_token" class="form-control" value="<?php echo $dataedit->secret_token?>">
    </div>
	  <div class="form-group">
            <label>expire_token</label>
            <input type="text" name="expire_token" class="form-control" value="<?php echo $dataedit->expire_token?>">
    </div>
	  <div class="form-group">
            <label>id_admin</label>
            <input type="text" name="id_admin" class="form-control" value="<?php echo $dataedit->id_admin?>">
    </div>
	  <div class="form-group">
            <label>id_superadmin</label>
            <input type="text" name="id_superadmin" class="form-control" value="<?php echo $dataedit->id_superadmin?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
