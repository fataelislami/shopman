<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Product</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>code_product</label>
            <input type="text" name="code_product" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>name</label>
            <input type="text" name="name" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>price</label>
            <input type="text" name="price" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>description</label>
            <input type="text" name="description" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>size</label>
            <input type="text" name="size" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>photo</label>
            <br><input type="file" name="files[]" multiple/>
    </div>
	  <div class="form-group">
            <label>discount</label>
            <input type="text" name="discount" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>stock</label>
            <input type="text" name="stock" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_category</label>
            <input type="text" name="id_category" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_product" />

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
