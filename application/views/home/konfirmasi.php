<?php 
$thn=date("Y");
$bln=date("m");
$tgl=date("d");
 ?>
<?php if($this->session->userdata('user')==true){ ?>
<div class="col-lg-12 col-md-12" style="text-align:center;margin-top:100px;">
    <ul id="progressbar">
      <li class="active">Pesan buku</li>
      <li class="active process">Total Transaksi</li>
      <li class="active process">Konfirm. Pembayaran</li>
    </ul>
</div>
<?php } ?>
<div class="container">
  <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2" style="margin-top:100px;">
    <h1><i class="fa-credit-card fa" style="color:#337AB7;"></i>&nbspKonfirmasi Pembayaran</h1>
    <hr>
  <?php if($this->session->flashdata('notif_konfirmasi')!=''||$notif!=''){ ?>
    <div class="alert alert-info"><?php $this->session->flashdata('notif_konfirmasi') ?></div>
  <?php } ?>
   <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="panel-title judul">Silahkan isi form konfirmasi pembayaran di bawah</h1>
        </div>
        <div class="panel-body">
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
                <input type="text"  name="t_transfer" id="t_transfer" class="form-control" value=<?php echo $bln.'/'.$tgl.'/'.$thn ?>p /> 
            
                <label for="">Bukti Transfer</label>
                <input type="file" name="foto" class="form-control"> <br>
                <?php echo $image; ?><br>
               <label>Captcha</label><br>
                 <?php  
                $data=array('name'=>'captcha','class'=>'form-control');
                echo form_input($data);
               ?><br>
            </div>
            <br>
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim">

          </form>
           <script type="text/javascript">
               $(document).ready(function() {
                  $('#t_transfer').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                  });
               });
               </script>

        </div>
      </div>


   
  </div>
</div>
