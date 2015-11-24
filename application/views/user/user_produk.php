<div class="col-md-12 col-lg-12">
	<h1><i class="fa fa-book" style="color:#2B72AF;"></i>&nbspKoleksi Buku Anda</h1>
	<hr>
	<div class="alert-info alert">
		<h4><b>Anda Punya buku bekas berkualitas? Jual aja disini.. Tentukan harga suka-suka</b></h4>
	</div>
	<br>
	<a href=<?php echo base_url() ?>user/tambahproduk class="btn btn-primary btn-lg"><i class="fa-plus-circle fa"></i>&nbspMasukkan produk anda</a><br>
	<br>
	<?php if($data->result()!='') {?>
	<table class="table">
		<tr>
			<th>NO</th>
			<th>judul</th>
			<th>Isi</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>
		<?php 
		$i='1';
		foreach($data->result() as $buku){ ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><b><?php echo $buku->judul ?></b></td>
				<td><?php echo $buku->isi ?></td>
				<td><?php echo $buku->kategori ?></td>
				<td><?php echo $buku->harga ?></td>
				<td>
						<div class="col-md-6" style="margin:3px;">
							<a href=<?php echo base_url() ?>rumah/editproduk/<?php echo $buku->id_produk ?> class="btn btn-warning"><i class="fa fa-pencil-square-o"></i>&nbspEdit </a>		
							&nbsp
						</div>
						<div class="col-md-6">		
							<a href=<?php echo base_url() ?>rumah/hapusproduk/<?php echo $buku->id_produk ?> class="btn btn-danger"><i class="fa fa-trash"></i>&nbspHapus </a>			
						</div>
					
				</td>
			</tr>
		<?php 
		$i++;
		} ?>
	</table>	
	<?php } ?>
	
	
</div>