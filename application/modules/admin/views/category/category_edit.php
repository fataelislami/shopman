<?php if($this->session->flashdata('message')) {
  $flashMessage=$this->session->flashdata('message');
echo "<script>alert('$flashMessage')</script>";
 } ?>
<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Category</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>Id</label>
                    <input type="text" name="id_category" class="form-control" placeholder="" value="<?php echo $dataedit->id_category?>" readonly>
            </div>
	  <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="<?php echo $dataedit->name?>">
    </div>


                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
