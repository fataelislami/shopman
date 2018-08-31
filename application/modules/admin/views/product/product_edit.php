<?php if($this->session->flashdata('message')) {
  $flashMessage=$this->session->flashdata('message');
echo "<script>alert('$flashMessage')</script>";
 } ?>
<?php if ($getImage->num_rows()>0){ ?>
  <div class="card">
      <div class="card-body p-b-0">
          <h4 class="card-title">Kelola Foto Produk</h4>
           </div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs customtab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Kelola</span></a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Tambah</span></a> </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
          <div class="tab-pane active" id="home2" role="tabpanel">
              <div class="p-20">
                <div class="row el-element-overlay"> <!-- Diberi id untuk direload -->
                      <div class="col-md-12">
                          <h6 class="card-subtitle m-b-20 text-muted">Anda Bisa Mengedit Foto Produk Dibawah Ini</h6></div>
                          <?php foreach ($getImage->result() as $g): ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1"> <img src="<?php echo base_url() ?>xfile/products/<?php echo $g->name ?>" alt="user" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url() ?>xfile/products/<?php echo $g->name ?>"><i class="icon-magnifier"></i></a></li>
                                                    <li><a class="btn default btn-outline" href="<?php echo base_url()?>admin/product/imageDelete/<?php echo $g->id_img ?>"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <small><?php echo $g->name ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endforeach; ?>
                </div>
              </div>
          </div>
          <div class="tab-pane  p-20" id="profile2" role="tabpanel">
            <h6 class="card-subtitle m-b-20 text-muted">Tarik Foto atau Upload Disini</h6>
            <form action="<?php echo base_url()?>admin/upload/proses" class="dropzone">
            </form>
          </div>
      </div>
  </div>

<?php }else{ ?>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Tambahkan Foto Produk</h4>
                  <h6 class="card-subtitle">Tarik Gambar atau Pilih Beberapa Gambar</h6>
                  <form action="<?php echo base_url()?>admin/upload/proses" class="dropzone">
                  </form>
              </div>
          </div>
      </div>
  </div>
<?php } ?>


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
    <input type="hidden" id="filename" name="filename">

                <div class="form-group">
                  <button id="aplot" type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
