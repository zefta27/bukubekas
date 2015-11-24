<div class="col-md-12 col-lg-12">
	<h1><i class="fa fa-book" style="color:#236AA7;"></i>&nbspProduk</h1>
	<hr>
	<?php if($notif!=''){?>
        <div  class="alert alert-danger" role="alert"><h5><?php echo $notif ?></h5></div>
     <?php  } ?>

	<table class="table">
		<tr>
			<th>NO</th>
			<th>judul</th>
			<th>Isi</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
		<?php 
		$i='1';
		foreach($data->result() as $buku){ ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $buku->judul ?></td>
				<td><?php echo $buku->isi ?></td>
				<td><?php echo $buku->kategori ?></td>
				<td>
					<a href=<?php echo base_url() ?>rumah/editproduk/<?php echo $buku->id_produk ?> class="btn btn-warning"><i class="fa fa-pencil-square-o"></i>&nbspEdit Produk</a> &nbsp
					<a href=<?php echo base_url() ?>rumah/hapusproduk/<?php echo $buku->id_produk ?> class="btn btn-danger"><i class="fa fa-trash"></i>&nbspHapus Produk</a>
				</td>
			</tr>
		<?php 
		$i++;
		} ?>
	</table>	
	<h3><a href=<?php echo base_url() ?>rumah/tambahproduk class="btn btn-primary btn-lg"><i class="fa fa-plus-circle"></i>&nbspTambah Produk</a></h3>
</div>