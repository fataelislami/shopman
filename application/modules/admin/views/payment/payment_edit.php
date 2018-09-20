<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Payment</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_payment</label>
                    <input type="text" name="id_payment" class="form-control" placeholder="" value="<?php echo $dataedit->id_payment?>" readonly>
            </div>
	  <div class="form-group">
            <label>payment_date</label>
            <input type="text" name="payment_date" class="form-control" value="<?php echo $dataedit->payment_date?>">
    </div>
	  <div class="form-group">
            <label>confirmation_date</label>
            <input type="text" name="confirmation_date" class="form-control" value="<?php echo $dataedit->confirmation_date?>">
    </div>
	  <div class="form-group">
            <label>status</label>
            <input type="text" name="status" class="form-control" value="<?php echo $dataedit->status?>">
    </div>
	  <div class="form-group">
            <label>address_destination</label>
            <input type="text" name="address_destination" class="form-control" value="<?php echo $dataedit->address_destination?>">
    </div>
	  <div class="form-group">
            <label>id_adders</label>
            <input type="text" name="id_adders" class="form-control" value="<?php echo $dataedit->id_adders?>">
    </div>
	  <div class="form-group">
            <label>id_payment_method</label>
            <input type="text" name="id_payment_method" class="form-control" value="<?php echo $dataedit->id_payment_method?>">
    </div>
	  <div class="form-group">
            <label>id_cart</label>
            <input type="text" name="id_cart" class="form-control" value="<?php echo $dataedit->id_cart?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
