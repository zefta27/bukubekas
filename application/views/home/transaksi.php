<div class="col-lg-12 col-md-12" style="text-align:center;margin-top:100px;">
    <ul id="progressbar">
      <li class="active">Pesan buku</li>
      <li class="active process">Total Transaksi</li>
      <li>Konfirm. Pembayaran</li>
    </ul>
</div>
 <div class="container" >         
     <div class="col-md-12  col-lg-12">
     	<div class="col-md-8 col-lg-8">
     		<div class="informasi">
				<h2 style="font-weight:600;"><b>Informasi Pemesan</b></h2>
				<table class="table">
					<tr>
						<td><b>Nama Pemesan</b></td>
						<td><?php echo $bio_user->namal ?></td>
					</tr>
					<tr>
						<td>
							<b>Alamat</b>
						</td>
						<td>
							<?php 
								echo $bio_user->alamat." ".$bio_user->kab_kota." provinsi ".
								$bio_user->provinsi
							?>
						</td>
					</tr>
					<tr>
						<td><b>No HP</b></td>
						<td>
							<?php echo $bio_user->nohp ?>
						</td>
					</tr>
					<tr>
						<td><b>Kode Pos</b></td>
						<td>
							<?php echo $bio_user->kodepos ?>
						</td>
					</tr>
					
				</table>
			</div>	
     	</div>
		<div class="col-md-4" style="border:2px solid #dddddd;padding-bottom:5px;margin-bottom:5px;">
			<h3 style="font-weight:600;text-align:center">Nama Produk </h3>
			<img src=<?php echo base_url().$produk->foto ?> alt="" width="100%" />
		</div>
		<div style="clear:both;"></div>
		<div class="total" style="padding-top: 10px;">
			<?php 
				$kode=$transaksi->id_transaksi;
				$substr=substr($kode,-3);
				$total= $produk->harga + $substr;
				$hasil=number_format($total,0,',','.');

			 ?>		
			 <h2><center><i><strong>Total Harga yang mesti dibayar : Rp.<?php echo $hasil ?></strong></i><br>
			 </h2><h3>No Transaksi anda adalah : <?php echo $transaksi->id_transaksi ?> (Harap diingat baik-baik)</h3>
			 </center></h2>
		</div>
		<h5 style="font-weight:600">Silahkan menyelesaikan pembayaran dengan memilih bank yang telah disediakan</h5>
		<div class="col-md-6">
			<img src=<?php echo base_url() ?>asset/images/bni.jpg alt="" width="100%">
			<strong>
				Bank Negara Indonersia <br>
				Atas Nama : Zefta Adetya
				No Rekening : -
			</strong>		
		</div>
		<div class="col-md-6">
			<img src=<?php echo base_url() ?>asset/images/mandiri.jpg alt="" width="100%">
			<strong>
				Bank Mandiri <br>
				Atas Nama : Zefta Adetya
				No Rekening : -
			</strong>
		</div>
		<div class="col-md-12">
			<a href=<?php echo base_url() ?>home/konfirmasi class="btn-block btn btn-lg btn-primary" style="font-weight:600">Konfirmasi Pembayaran</a>
		</div>
	</div>

</div>
