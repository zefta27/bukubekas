
<script type="text/javascript" src=<?php echo base_url() ?>asset/js/jquery.js></script>
<script type="text/javascript" src=<?php echo base_url() ?>asset/js/script.js></script>

<div class="col-lg-12 col-md-12" style="text-align:center;margin-top:100px;">
    <ul id="progressbar">
      <li class="active">Pesan buku</li>
      <li>Total Transaksi</li>
      <li>Konfirm. Pembayaran</li>
    </ul>
</div>
 <div class="container">         
          <div class="col-md-12  col-lg-12 registrasi">
            <div class="alert-info alert">
              <h4>
                <strong>
                  Info: <br>
                   - Untuk melakukan pesanan, silahkan mengisi kolom formulir pendaftaran dan formulir informasi data diri <br>
                   - Untuk yang sudah memiliki akun silahkan langsung melakukan login pada menu diatas <br>
                </strong>
              </h4>
            </div>
            <div class="col-md-8 col-lg-8">
                <?php if($this->session->userdata('user')!=TRUE){ ?>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                  <h1 class="panel-title judul">Silahkan daftar Terlebih dahulu</h1>
                  </div>
                  <div class="panel-body">
                   <form method="post" action="">
                          <hr>
                          <label>Username</label>
                          <input type="text" name="username" class="form-control">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control">
                          <label for="">Password</label>
                          <input type="password" name="password" class="form-control">              

                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                  <h1 class="panel-title judul">Silahkan isi form kontak di bawah</h1>
                  </div>
                  <div class="panel-body">
                    <form action="" method="post">
                          <hr>
                          <label>Nama Lengkap</label>
                          <input type="text" name="namal" class="form-control" >
                          <label>Jenis kelamin</label>
                          <select name="jekel" id="" class="form-control">
                              <option value="lk">Laki-laki</option>
                              <option value="pr">Perempuan</option>
                          </select>
                           <label>Provinsi</label>
                              <select id="province" class="form-control">
                                <option>Provinsi</option>
                              </select>
                              
                          <label>Kabupaten/ Kota</label>
                          <select name="kota"class="form-control" id="kota" onchange="ajaxkec(this.value)">
                              <option value="">Pilih Kota</option>
                          </select>
                          <label>Kecamatan</label>
                          <select class="form-control" name="kec" id="kec" onchange="ajaxkel(this.value)">
                            <option value="">Pilih Kecamatan</option>
                          </select>

                          <label>Alamat Lengkap</label>
                          <textarea name="alamat" class="form-control"></textarea>
                          <label>No Telepon/ Handphone</label>
                          <input type="text" class="form-control" name="nohp">
                          <label>Kode Pos</label>
                          <input type="text" name="kodepos" class="form-control"><br><br>
                          <input type="submit" name="submit" class="btn-primary btn btn-lg" value="Submit">               
                   </form>

                  </div>
                </div>
                <?php } ?>
                <?php if($this->session->userdata('user')==TRUE){ ?>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                  <h1 class="panel-title judul">Silahkan isi form kontak di bawah</h1>
                  </div>
                  <div class="panel-body">
                    <form action="" method="post"> 
                        <input type="hidden" name="id_k_user" value=<?php echo $bio_user->id_k_user ?>>
                          <hr>
                          <label>Nama Lengkap</label>
                          <input type="text" name="namal" class="form-control" value=<?php echo $bio_user->namal ?>>
                          <label>Jenis kelamin</label>
                          <select name="jekel" id="" class="form-control">
                              <option value="lk">Laki-laki</option>
                              <option value="pr">Perempuan</option>
                          </select>
                           <label>Provinsi</label>
                          <input type="text" class="form-control" name="provinsi" value=<?php echo $bio_user->provinsi ?>>
                          <label>Kabupaten/ Kota</label>
                          <input type="text" class="form-control" name="kab_kota" value=<?php echo $bio_user->kab_kota ?>>  
                          
                          <label>Alamat Lengkap</label>
                          <textarea name="alamat" class="form-control"><?php echo $bio_user->alamat ?></textarea>
                          <label>No Telepon/ Handphone</label>
                          <input type="text" class="form-control" name="nohp" value=<?php echo $bio_user->nohp ?>>
                          <label>Kode Pos</label>
                          <input type="text" name="kodepos" class="form-control" value=<?php echo $bio_user->kodepos ?>><br><br>
                          <input type="submit" name="submit1" class="btn-primary btn btn-lg" value="Submit">               
                   </form>

                  </div>
                </div>
                  
                <?php } ?>
            </div> 
            <div class="col-md-4 col-lg-4">
                  <div class="panel panel-primary">
                  <div class="panel-heading">
                  <h2 class="panel-title judul"><?php echo $produk->judul ?></h2>
                  </div>
                  <div class="panel-body">
                      <div class="col-md-12 col-lg-12">
                        <div class="col-md-6 col-lg-6">
                            <img src=<?php echo base_url().$produk->foto ?> width="100%">
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <strong>Harga : <?php echo $produk->harga ?></strong>
                      
                        </div>  
                      </div>
                      <div class="col-md-12 col-lg-12">
                        <form action="" method="GET">
                            Asal<br/>
                            <select id="oriprovince">
                              <option>Provinsi</option>
                            </select>
                            <br/>
                            <select name="oricity" id="oricity">
                              <option>Kota</option>
                            </select>
                            Tujuan<br/>
                            <select id="desprovince">
                              <option>Provinsi</option>
                            </select>
                            <br/>
                            <select name="descity" id="descity">
                              <option>Kota</option>
                            </select>
                            Layanan<br/>
                            <select name="service" id="service">
                              <option value="all">semua</option>
                              <option value="jne">JNE</option>
                              <option value="pos">POS</option>
                              <option value="tiki">TIKI</option>
                            </select> 
                            <br/>
                            Berat (gram)<br/>
                            <input name="weight"  style="width:100px" id="berat" type="number"/>
                            <button type="button" onclick="cekHarga()">Cek Harga</button> <br>

                            <table class="twelve columns">
                            <thead>
                            <tr>
                              <th>Kurir</th>
                              <th>Servis</th>
                              <th>Deskripsi Servis</th>
                              <th>Lama Kirim (hari)</th>
                              <th>Total Biaya (Rp)</th>
                            </tr>
                            </thead>
                            <tbody id="resultsbox"></tbody>
                          </table>
                        </form>
                      </div>
                  </div>
                </div> 
                


          </div>
        </div>
  </div>