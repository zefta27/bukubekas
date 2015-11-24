<div class="col-md-12">

		<h1>Riwayat Transaksi</h1>
    <?php if($transaksi!=NULL) {?>
	<div class="col-md-9">
			<table class="table">
				<tr>
					<th>Id transaksi</th>
					<th>Tanggal Transaksi</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>ALamat</th>
					<th>Status</th>
				</tr>
				<tr>
					<td>
						<?php echo $transaksi->id_transaksi ?>
					</td>
					<td>
						<?php echo $transaksi->date_transaksi ?>
					</td>
					<td>
						<?php echo $produk->judul ?>
					</td>
					<td>
						<?php echo $produk->harga ?>
					</td>
					<td>
						<?php echo $user_bio->alamat." ".$user_bio->kab_kota." Provinsi ".$user_bio->provinsi." Kode Pos: ".$user_bio->kodepos ?>
					</td>
					<td>
						<?php if($transaksi->status==1){
							echo "<div class='btn-primary status'>telah Terkonfirmasi, sedang diproses</div>";
						}else{
							echo "<div class='btn-warning status'>Belum Terkonfirmasi</div>";
						} ?>
					</td>
				</tr>

			</table>		
	</div>
	<div class="col-md-3">
    <?php 
	 if($transaksi->status==0){
  	 ?>
    <button type="button" class="btn btn-primary btn-lg btn block" data-toggle="modal" data-target="#myModal">
		  Konfirmasi
		</button>
    <?php } ?>
	</div>
  <?php }else{ ?>	
      <div class="alert-info alert"><h3><b>Riwayat Transaksi Kosong</b></h3></div>
  <?php } ?>
</div>
<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
      </div>
      <div class="modal-body">
       		<form action="" method="post" enctype="multipart/form-data">
            <div id="callout-alerts-dismiss-plugin" class="bs-callout bs-callout-info">
              
              <label for="">No Transaksi</label>
                <input type="text" name="no_transaksi" class="form-control" >
              <label for="">Bank Tujuan</label>
              <select name="bank_tujuan" id="" class="form-control">
                <option value="BNI">BNI</option>
                <option value="MANDIRI">Mandiri</option>
              </select>
              <label for="">Bank Anda </label>
                <input type="text" name="bank_anda" class="form-control">
                <label for="">No Rekening</label>
                <input type="text" name="no_rek" class="form-control">
                <label for="">Atas Nama</label>
                <input type="text" name="atas_nama" class="form-control">
                <label for="">Metode Transfer</label>
                <select name="m_transfer" id="" class="form-control">
                  <option value="ATM">ATM</option>
                  <option value="transfer">Transfer</option>
                </select>
                <label for="">Nominal Transfer</label>
                <input type="text" name="n_transfer" class="form-control">
                <label for="">Tanggal Transfer</label>
                <input type="text"  name="t_transfer" id="t_transfer" class="form-control" value="03/18/2013" /> 
            
                <label for="">Bukti Transfer</label>
                <input type="file" name="foto" class="form-control"> <br>
                
            </div>
            <br>
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim">

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>