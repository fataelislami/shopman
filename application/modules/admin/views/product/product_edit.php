<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Product</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_product</label>
                    <input type="text" name="id_product" class="form-control" placeholder="" value="<?php echo $dataedit->id_product?>" readonly>
            </div>
	  <div class="form-group">
            <label>code_product</label>
            <input type="text" name="code_product" class="form-control" value="<?php echo $dataedit->code_product?>">
    </div>
	  <div class="form-group">
            <label>name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $dataedit->name?>">
    </div>
	  <div class="form-group">
            <label>price</label>
            <input type="text" name="price" class="form-control" value="<?php echo $dataedit->price?>">
    </div>
	  <div class="form-group">
            <label>description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $dataedit->description?>">
    </div>
	  <div class="form-group">
            <label>size</label>
            <input type="text" name="size" class="form-control" value="<?php echo $dataedit->size?>">
    </div>
	  <div class="form-group">
            <label>url_photo</label>
            <input type="text" name="url_photo" class="form-control" value="<?php echo $dataedit->url_photo?>">
    </div>
	  <div class="form-group">
            <label>discount</label>
            <input type="text" name="discount" class="form-control" value="<?php echo $dataedit->discount?>">
    </div>
	  <div class="form-group">
            <label>stock</label>
            <input type="text" name="stock" class="form-control" value="<?php echo $dataedit->stock?>">
    </div>
    <div class="form-group">
            <label>Kategori</label>
            <select class="form-control custom-select" name="id_category" required>
              <?php foreach ($category as $c):?>
                <option value="<?php echo $c->id_category ?>" <?php if($dataedit->id_category==$c->id_category){echo "selected";} ?>>
                  <?php echo $c->name ?>
                </option>
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Upload Foto Produk</h4>
                <h6 class="card-subtitle">Tarik Gambar atau Pilih Beberapa Gambar</h6>
                <form action="<?php echo base_url()?>admin/upload/proses" class="dropzone">
                </form>
                <button id="aplot" type="button" name="button">Upload</button>
            </div>
        </div>
    </div>
</div>
