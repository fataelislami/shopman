<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Confirmation</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>confirmation_date</label>
            <input type="text" name="confirmation_date" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>photo</label>
            <input type="text" name="url_photo" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_payment</label>
            <input type="text" name="id_payment" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_admin</label>
            <input type="text" name="id_admin" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_confirmation" /> 
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
