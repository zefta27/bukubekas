<div class="container">
	<div class="col-md-12 col-lg-12" style="margin-top:50px;">
		<div class="col-md-8 col-md-offset-2">
			<h1>Tentang Kami</h1>
			<?php 
			foreach ($data->result() as $about) {
			?>

		
				<div class="col-md-12 col-lg-12" style="margin-bottom:5px;margin-top:5px;">
					<div class="col-md-4 col-lg-4">
						<img src=<?php echo base_url().$about->foto ?> alt="" class="img-responsive  img-circle" style="width:100px;height:100px;" >
					</div>
					<div class="col-md-8 col-lg-8">
						<h2><?php echo $about->nama_about ?></h2>
						<p>
							<?php echo $about->deskripsi ?>
						</p>
					</div>
				</div>
				<br>	
			
			<?php	
			}
			 ?>
		</div>		
	</div>
</div>