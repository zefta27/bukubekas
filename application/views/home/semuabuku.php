<div class="col-md-12 col-lg-12" class="search" style="background-color:#dddddd;margin-top:50px;">
  <div class="container">
      <form action=<?php echo base_url() ?>home/cari method="post">
        <div class="col-md-9" style="margin-top:20px;margin-bottom:20px;">
          <input type="text" name="cari"  style="padding-top:25px;padding-bottom:25px;" class="form-control"  placeholder="Tulis buku yang ingin Dicari">
        </div>
        <div class="col-md-3">
          <button class="btn-primary btn btn-lg btn-block" type="submit" name="caribuku" style="margin-top:20px;margin-bottom:20px;">
            <i class="fa-search fa"></i>&nbsp
            Cari</button>
        </div>
      </form>
  </div>
</div>
<div class="container">
    <div class="col-md-12 col-lg-12" style="margin-bottom:100px;">
      <?php foreach($data->result() as $produk) 
      {?>
        
            
                    <div class="col-lg-3 col-md-3" style="margin-top:60px;">
                  <div class="produk">
                    <a class="white" href=<?php echo base_url() ?>home/produk/<?php echo $produk->id_produk ?>>
                    <img src=<?php echo base_url().$produk->foto ?> alt="" width="100%" height="100%">               
                      <div class="desc_produk">
                          <center>
                            <h4><b><?php echo $produk->judul ?></b></h4>
                            <?php 
                                if($produk->harga!=null)
                                {
                                $harga=$produk->harga;
                                $hasilan=number_format($harga,0,',','.');
                                $hasil="Rp.".$hasilan;
                                }
                                else{
                                  $hasil='';
                                }
                             ?>
                            <p><?php echo $hasil ?></p>
                          </center>
                      </div>
                    </a>
                  </div>  
              </div>    
        <?php 
           } 
      ?>
  </div>  
</div>
