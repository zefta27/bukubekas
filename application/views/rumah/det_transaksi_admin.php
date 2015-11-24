<?php 
	if($transaksi->status==0)
	{
		$status="Pesanan Belum Dibayar";
		$jadikan="1";
		$value='';
	}
	if($transaksi->status==1){
		$status="Pesanan Belum Dikonfirmasi";
		$jadikan="2";
		$value='Konfirmasi';
	}
	if($transaksi->status==2){
		$status="Pesanan Sudah Dikonfirmasi";
		$jadikan="3";
		$value='Kirim Pesanan';
	}
	if($transaksi->status==3){
		$status="Pesanan Sedang Dikirim";
		$jadikan="4";
		$value="Terima Pesanan";
	}
	if($transaksi->status==4){
		$status="Pesanan Telah Diterima";
		$jadikan='';
		$value='';
	}
 ?>
<class="col-md-12">
	<h1>Detail Transaksi </h1><hr>
	<h3 style="background-color:#dddddd">Status : <?php echo $status ?></h3>
	<div class="col-md-9 col-lg-9">
		<h2>Informasi Pemesan </h2>
		<table class="table">
			<tr>
				<td>Nama Lengkap</td>
				<td>
					<?php echo $transaksi->namal ?>
				</td>
			</tr>
			<tr>
				<td>No HP</td>
				<td>
					<?php echo $transaksi->nohp ?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<?php echo $transaksi->email ?>
				</td>
			</tr>
			<tr>
				<td>Kode Pos</td>
				<td>
					<?php echo $transaksi->kodepos ?>
				</td>
			</tr>
			<tr>
			<td>Nama Lengkap</td>
				<td>
					<?php echo $transaksi->namal ?>
				</td>
			</tr>
		</table>
	</div>
	<div class="col-md-3">
		<h3>Detail Produk</h3>
		<table class="table-striped">
			<tr>
				<td colspan="2">
					<img src=<?php echo base_url().$transaksi->foto ?> width="100%" alt="">
				</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><?php echo $transaksi->judul ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><?php echo $transaksi->harga ?></td>
			</tr>
			
		</table>
	</div>
	
</div>
<div class="col-md-12 col-lg-12">
	<div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="panel-title judul">Bukti Pembayaran</h1>
        </div>
        <div class="panel-body">
				<div class="col-md-9 col-lg-9">
					
						<?php 
							if($transaksi->atas_nama=='')
							{
								echo "Belum ada Bukti Pembayaran";
							}
							else{?>

								<table class="table-striped table">
									<tr>
										<td>Atas Nama</td>
										<td><?php echo $transaksi->atas_nama ?></td>
									</tr>
									<tr>
										<td>Nominal Transfer</td>
										<td>
											<?php echo $transaksi->n_transfer ?>
										</td>
									</tr>
									<tr>
										<td>Bank Pemesan</td>
										<td>
											<?php echo $transaksi->bank_anda ?>
										</td>
									</tr>
									<tr>
										<td>No Rekening</td>
										<td><?php echo $transaksi->no_rek ?></td>
									</tr>
									<tr>
										<td>
											Bank Tujuan
										</td>
										<td><?php echo $transaksi->bank_tujuan ?></td>
									</tr>
									<tr>
										<td>Metode Transfer</td>
										<td><?php echo $transaksi->m_transfer ?></td>
									</tr>
									<tr>
										<td>Tanggal Transfer</td>
										<td><?php echo $transaksi->date ?></td>
									</tr>
								</table>
					
				</div>
				<div class="col-md-3 col-lg-3">
					<h4>Foto Bukti Transfer</h4>
					<img src=<?php echo base_url().$transaksi->b_transfer ?> alt="" width="100%">
				</div>
					<?php
							}
						 ?>	

				 <?php if($transaksi->status!=0||$transaksi->status!=4){?>
				 	<form action="" method="post">
					 	<input type="hidden" name="status" value=<?php echo $jadikan ?>>
					 	<input type="hidden" name="id_transaksi" value=<?php echo $transaksi->id_transaksi ?>>
					 	<input type="submit" name="konfirmasi" value="<?php echo $value ?>" class="btn-primary btn">
					 </form>	
				 <?php } ?>
			</div>
		</div>
</div>