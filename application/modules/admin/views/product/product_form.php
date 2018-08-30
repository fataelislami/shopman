<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Upload Foto Produk</h4>
                <h6 class="card-subtitle">Tarik Gambar atau Pilih Beberapa Gambar</h6>
                <form action="<?php echo base_url()?>admin/upload/proses" class="dropzone">
                </form>
                <br>
            </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Keterangan Product</h4>
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
            <label>url_photo</label>
            <input type="text" name="url_photo" class="form-control" placeholder="">
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
            <label>Kategori</label>
            <select class="form-control custom-select" name="id_category" required>
              <?php foreach ($category as $c):?>
                <option value="<?php echo $c->id_category ?>">
                  <?php echo $c->name ?>
                </option>
              <?php endforeach; ?>
            </select>
    </div>
    <input type="hidden" id="filename" name="filename">
	    <input type="hidden" name="id_product" />

                <div class="form-group">
                  <button id="aplot" type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
