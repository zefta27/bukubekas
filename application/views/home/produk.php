<style type="text/css">
	.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}
</style>
<?php 
	                              $harga=$produk->harga;
                              $hasilan=number_format($harga,0,',','.');
                              $hasil="Rp.".$hasilan;
 ?>
<div class="container" style="margin-top:100px;">
	<div class="col-md-12 col-lg-12">
		<div class="col-md-4" style="margin-top:20px;">	
			<img src=<?php echo base_url().$produk->foto ?>  alt="" width="100%" >
			<h4>Kategori : <?php echo $produk->kategori ?></h4>
		</div>	
		<div class="col-md-8 gradient" style="border-left:2px solid #dddddd">
		<h1><?php echo $produk->judul ?></h1>
		<hr>
			<div class="harga">
				<?php echo $hasil ?>
			</div>
			<p><?php echo $produk->isi ?></p>
			<h3>Gambar lainnya</h3>
			<?php foreach($data->result() as $all_image){ ?>
				<img src=<?php echo base_url().$all_image->foto ?> alt="" width="30%">
			<?php } ?>
			<br>
			<a href=<?php echo base_url() ?>home/pesan/<?php echo $produk->id_produk ?> class="btn btn-primary btn-block btn-lg" style="margin-top:10px;">Pesan Sekarang</a>
		</div>
	</div>
	<div class="col-md-12">
		<h2><strong>Produk Lainnya</strong></h2>
        <hr>
		<div class="container">

      
    <div class="row">
        <div class="row">
            <div class="col-md-9">

            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        
                        <?php 
                        $i=1;
                        foreach ($data1->result() as $link) {
                            
                            if($i<=3)
                            {?>

                        
                            <div class="col-sm-4">
                                <div class="col-item">
                                    <div class="photo">
                                        <a href=<?php echo base_url() ?>home/produk/<?php echo $link->id_produk ?>>
                                            <img src=<?php echo base_url().$link->foto ?> class="img-responsive" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h5>
                                                    <?php echo $link->judul ?></h5>
                                                <h5 class="price-text-color">
                                                    <?php 
                                                            $harga=$link->harga;
                                                            $hasilan=number_format($harga,0,',','.');
                                                            $hasil="Rp.".$hasilan;

                                                            echo $hasil ?>
                                                </h5>
                                            </div>
                                            
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add">
                                                <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                            <p class="btn-details">
                                                <i class="fa fa-list"></i><a href=<?php echo base_url() ?>home/produk/<?php echo $link->id_produk ?> class="hidden-sm">More details</a></p>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php
                            }
                            $i++;
                        } ?>
                        

                    </div>
                </div>





                <div class="item">
                    <div class="row">
                        <?php 
                        $i=1;
                        foreach ($data2->result() as $link) {
                            
                            if($i<=3)
                            {?>

                                <div class="col-sm-4">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src=<?php echo base_url().$link->foto ?> class="img-responsive" alt="a" />
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price col-md-6">
                                                    <h5>
                                                        <?php echo $link->judul ?></h5>
                                                    <h5 class="price-text-color">
                                                        <?php 
                                                        $harga=$link->harga;
                                                        $hasilan=number_format($harga,0,',','.');
                                                        $hasil="Rp.".$hasilan;

                                                        echo $hasil ?>
                                                    </h5>
                                                </div>
                                                <div class="rating hidden-sm col-md-6">
                                                  
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <p class="btn-add">
                                                    <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                                <p class="btn-details">
                                                    <i class="fa fa-list"></i><a href=<?php echo base_url() ?>home/produk/<?php echo $link->id_produk ?> class="hidden-sm">Lihat Detail</a></p>
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        <?php
                            }
                            $i++;
                        } ?>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

</script>

	</div>
</div>