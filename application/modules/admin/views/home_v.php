<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title">Selamat Datang di Admin Area</h4>
                      <h6 class="card-subtitle">Isi Deskripsi Disini</h6>
                  </div>
                  <div class="col-md-6 text-right">Kostlab
                  </div>
              </div>
              <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-info">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo "$countCategory"; ?></h1>
                                                <h6 class="text-white">Jumlah Kategori</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-primary card-inverse">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white"><?php echo "$countProduct"; ?></h1>
                                                <h6 class="text-white">Jumlah Produk</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-success">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white">
                                                <?php
                                                  if ($countproductsold->jumlah != '') {
                                                    echo "$countproductsold->jumlah";
                                                  } else {
                                                    echo "0";
                                                  }
                                                ?>
                                               </h1>
                                                <h6 class="text-white">Produk terjual</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-dark">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white">
                                                  <?php
                                                    if ($countIncome->jumlah != '') {
                                                      echo "$countIncome->jumlah";
                                                    } else {
                                                      echo "0";
                                                    }
                                                  ?>
                                                </h1>
                                                <h6 class="text-white">Pendapatan</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>

                                <div class="row">
                                <!-- column -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Laporan Pendapatan perbulan</h4>
                                            <div id="chart" style="width:100%; height:400px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- column -->
            </div>
        </div>
    </div>
</div>
