<link rel="stylesheet" href=<?php echo base_url() ?>asset/css/carousel.css>

<div  style="padding-left:10px;padding-right:10px;overflow:hidden;margin-bottom:20px;margin-top:60px;">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
          
          <?php 
              $i=1;
              foreach($data->result() as $slide)
              {
                if($i==1)
                {
                  $alt="First slide";
                  $class="item active";
                }
                if($i==2)
                {
                  $alt="Second slide";
                  $class="item";
                }
                if($i==3)
                {
                  $alt="Third slide";
                  $class="item";
                }
           ?>

          <div class=<?php echo $class ?>>
            <img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt=<?php echo $alt ?>>
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                              <span><?php echo $slide->judul_slide ?></span>
                            </h2>
                            <br>
                            <h3>
                              <span><?php echo $slide->isi_slide ?></span>
                            </h3>
                            <br>

                        </div>
                    </div><!-- /header-text -->
          </div>

          <?php 
            $i++;
            }
           ?>
          

      </div>
      <!-- Controls -->
      <a style="margin-left:15px;" class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a style="margin-right:15px;" class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
</div>
<div class="col-md-12 col-lg-12 keunggulan">
    <div class="container">
      <div class="col-md-12 col-lg-12" style="text-align:center">
       <div class="col-md-4 col-lg-4">
          <div class="col-md-3 col-lg-3">
            <br>
            <i class="fa fa-usd fa-5x"></i>&nbsp 
          </div>
          <div class="col-md-9 col-md-9">
            <h2><b>Gratis</b></h2>
          <h4>Gratis biaya pendaftaran</h4>  
          </div>
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="col-md-3 col-md-3">
            <br>
            <i class="fa fa-shopping-cart fa-5x"></i>&nbsp 
          </div>
          <div class="col-md-9 col-lg-9">
            <h2><b>Gratis</b></h2>
          <h4>Gratis biaya pendaftaran</h4>  
          </div>
       </div>
       <div class="col-md-4 col-lg-4">
          <div class="col-md-3 col-lg-3">
            <br>
            <i class="fa fa-truck fa-5x"></i>&nbsp 
          </div>
          <div class="col-md-9 col-lg-9">
            <h2><b>Biaya Pengiriman</b></h2>
          <h4>Gratis biaya pendaftaran</h4>  
          </div>
       </div>
      </div>
    </div>
</div>
<div class="col-md-12 col-lg-12" class="search" style="background-color:#dddddd;">
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
  <div class=" col-md-12 col-lg-12">
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
<div class="col-md-12 col-lg-12" style="margin-top:80px;">
  <div class="container">
    <div class="col-md-4 col-md-offset-4">
        <a href=<?php echo base_url() ?>home/semuaproduk class="btn-primary btn-lg btn-block" style="text-align:center;font-weight:600;font-size:14pt;">Lihat Lebih Banyak</a>
    </div>
  </div>
</div>
<div class="col-md-12 col-lg-12 testimonial">
    <div class="container">
      <center><h2 style="font-weight:600;"><b>Testimonial</b></h2>
      <h4><i>Apa yang mereka katakan tentang kami</i></h4>
      </center>
      <hr>
      <?php foreach ($testimonial->result() as $testi) { ?>
          <div class="col-md-4" style="text-align: center;">
              <img src=<?php echo base_url().$testi->foto_user ?> alt=""   width=100px height=100px style="border:2px solid #2B72AF;border-radius:100%;text-align:center;  "> <br>
              <?php echo $testi->isi_testimonial ?> <br>
              <strong>By : <?php echo $testi->username ?> </strong>
          </div>
      <?php } ?>
    </div>
</div>
