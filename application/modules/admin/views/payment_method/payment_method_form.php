<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Payment_method</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>bank_name</label>
            <input type="text" name="bank_name" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>account_number</label>
            <input type="text" name="account_number" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>account_name</label>
            <input type="text" name="account_name" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_admin</label>
            <input type="text" name="id_admin" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_payment_method" /> 
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
