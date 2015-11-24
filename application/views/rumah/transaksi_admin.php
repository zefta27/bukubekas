<div class="col-md-12">
	<h1>Transaksi Pemesan</h1>
	<hr>
	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Id Transaksi</th>
			<th>Tanggal transaksi</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Pemesan</th>
			<th>status</th>
			<th>Aksi</th>
		</tr>
		<?php 
		$i=1;
		foreach($data->result() as $transaksi){ ?>
			<?php 
			if($transaksi->status==0||$transaksi->status==NULL)
			{
				$status="Belum Dikonfirmasi";
			}if($transaksi->status==1)
			{
				$status="Sudah Dikonfirmasi pengirim, Belum Di cek";
			}if($transaksi->status==2)
			{
				$status="Belum dikirim";
			}if($transaksi->status==3)
			{
				$status="Sudah dikirim";
			}if($transaksi->status==4)
			{
				$status="Pesananan Sudah diterima";
			} ?>

			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $transaksi->id_transaksi ?></td>
				<td><?php echo $transaksi->date_transaksi ?></td>
				<td><?php echo $transaksi->judul ?></td>
				<td><?php echo $transaksi->harga ?></td>
				<td><?php echo $transaksi->namal ?></td>
				<td><?php echo $status ?></td>
				<td>
					<a href=<?php echo base_url() ?>rumah/detail_transaksi/<?php echo $transaksi->id_transaksi ?>/<?php echo $transaksi->id_k_user ?> class="btn btn-success">Detail Transaksi</a>
					<a href=<?php echo base_url() ?>rumah/hapus_transaksi/<?php echo $transaksi->id_transaksi ?> class="btn btn-danger">Hapus</a>
				</td>
			</tr>
		<?php 
		$i++;
		} ?>
	</table>
</div>