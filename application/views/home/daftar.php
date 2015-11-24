      <script type="text/javascript" src=<?php echo base_url() ?>asset/js/registrasilokasi.js></script>
      <div class="container">
        <div class="col-md-12 col-lg-12">
         
          <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 registrasi">  
            <div class="panel panel-primary">
              <div class="panel-heading">
              <h1 class="panel-title judul">Silahkan isi form kontak di bawah</h1>
              </div>
              <div class="panel-body">
               <form method="post" action="">
                    <h3><i class="fa fa-key" style="color:#337AB7"></i>&nbspAkun Pengguna</h3>
                    <hr>
                    <label>Username</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon"><i class="glyphicon glyphicon-user" style="color:#337AB7;"></i></span><input type="text"  name="username"class="form-control"/> 
                       </div>
                    <label>Email</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon" style="color:#337AB7;">@</span><input type="text"  name="email"class="form-control"/> 
                       </div>
                     <label>Password</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon"><i class="fa fa-lock" style="color:#337AB7"></i></span><input type="password"  name="password"class="form-control"/> 
                       </div>
                      <br><br>
                    <h3><i class="fa fa-street-view" style="color:#337AB7"></i>&nbspBiodata Pengguna</h3>
                    <hr>
                      <label>Nama Lengkap</label>
                      <input type="text" name="namal" class="form-control">
                      <label>Tanggal Lahir</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar" style="color:#337AB7;"></i></span>
                         <input type="text"  name="tgl_lahir" id="birthday" class="form-control"  /> 
                       </div>
                      <label>Provinsi</label>
                      <select name="provinsi" id="oriprovince" class="form-control" name="provinsi">
                        <option>Provinsi</option>
                      </select>
                      <label>Kabupaten/ Kota</label>
                      <select name="kab_kota" id="oricity" class="form-control">
                          <option>Kota</option>
                      </select>
                      <label>Alamat Lengkap</label>
                      <textarea name="alamat" class="form-control"></textarea>
                      <label>No Telepon/ Handphone</label>
                      <input type="text" class="form-control" name="nohp">
                      <label>Kode Pos</label>
                      <input type="text" name="kodepos" class="form-control"><br><br>
                      <input name="submit" type="submit" class="btn-primary btn btn-lg" value="Daftar">               
               </form>

                <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
              <script src="//code.jquery.com/jquery-1.10.2.js"></script>
              <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
              <link rel="stylesheet" href="/resources/demos/style.css">
              <script>
              $(function() {
                $( "#birthday" ).datepicker({
                  changeMonth: true,
                  changeYear: true
                });
              });
              </script>

              </div>
            </div>


          </div>
        </div>
      </div>
