<?php 
	$username=$this->session->userdata('username');
 ?>
<div id="col-md-12">
	<h1 class="total">Selamat Datang <?php echo $this->session->userdata('username') ?> :)</h1>
	<div class="alert-info alert">
		<h4>
			<b>Anda punya buku bekas berkualitas? Jual aja Disini , Tentukan harga suka-suka</b>	
			<br><br>
			<a class="btn-lg btn-primary btn" href=<?php echo base_url() ?>user/prouduk >Klik Disini</a>
		</h4>
	</div>
</div>
<div class="col-md-12 col-lg-12">
	<div class="col-md-4 col-lg-4">
		<a href=<?php echo base_url() ?>user/transaksi>
			<div class="panel panel-primary">
				  <div class="panel-heading">
	              	<h1 class="panel-title"></h1>
	              </div>
	              <div class="panel-body">
	              		<div class="col-md-4">
	              			<i class="fa-user fa fa-5x"></i>
	              		</div>
				  		<div class="col-md-8">
				  			<h3><b>Transaksi</b></h3>
				  		</div>
				  </div>
			</div>
		</a>
	</div>
	<div class="col-md-4 col-lg-4">
		<a href=<?php echo base_url() ?>user/produk>
			<div class="panel panel-yellow">
				  <div class="panel-heading">
	              	<h1 class="panel-title"></h1>
	              </div>
	              <div class="panel-body" style="color:#F0AD4E">
	              		<div class="col-md-4">
	              			<i class="fa-user fa fa-5x"></i>
	              		</div>
				  		<div class="col-md-8">
				  			<h3><b>Produk</b></h3>
				  		</div>
				  </div>
			</div>
		</a>
	</div>
	<div class="col-md-4 col-lg-4">
		<a href=<?php echo base_url() ?>user/akun/<?php echo $username ?>>
			<div class="panel panel-green">
				  <div class="panel-heading">
	              	<h1 class="panel-title"></h1>
	              </div>
	              <div class="panel-body" style="color:#5CB85C">
	              		<div class="col-md-4">
	              			<i class="fa-user fa fa-5x"></i>
	              		</div>
				  		<div class="col-md-8">
				  			<h3><b>Akun</b></h3>
				  		</div>
				  </div>
			</div>
		</a>
	</div>
</div>
<div class="col-lg-12">
	<h1><b><i class="fa-user fa"></i>&nbsp Kontak</b></h1>
	<hr>
	<div class="alert alert-warning">
		<h4><b>Ada Pertanyaan? Silahkan tanyakan kesini</b></h4>
	</div>
	<form action="" method="post">
		<table class="table table-striped">
			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" name="namal" value=<?php echo $user_bio->namal ?> class="form-control"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value=<?php echo $user->email ?> class="form-control"></td>
			</tr>
			<tr>
				<td>Subjek</td>
				<td>
					<input type="text" name="subjek"  class="form-control">
				</td>
			</tr>
			<tr>
				<td>Isi</td>
				<td>
					<input type="text" name="isi" class="form-control">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit_kontak" class="btn btn-primary btn-lg" value="Submit"></td>
			</tr>
		</table>
	</form>
	<h1><b><i class="fa-user fa"></i>&nbsp Testimonial</b></h1>
	<hr>
	<div class="alert alert-success">
		<h4><b>Silahkan berikan Testimonial anda mengenai pelayanan kami</b></h4>
	</div>
	<form action="" method="post">
		<textarea name="isi_testimonial" id="" cols="30" rows="10"  placeholder="Testimonial" class="form-control"></textarea>
		<br>
		<input type="submit" name="submit_testimonial" value="Submit" class="btn btn-primary btn-lg">
	</form>
</div>