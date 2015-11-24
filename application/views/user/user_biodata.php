<div class="panel panel-info" style="margin-top:10px;">
              <div class="panel-heading">
              <h1 class="panel-title judul"><b>Biodata Pengguna</b></h1>
              </div>
              <div class="panel-body">
               <form method="post" action="">
                    <h3><i class="fa fa-street-view" style="color:#2B72AF;"></i>&nbspBiodata Pengguna</h3>
                    <hr>
                      <label>Nama Lengkap</label>
                      <input type="text" name="namal" value=<?php echo $user_bio->namal ?> class="form-control">
                      <label>Tanggal Lahir</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar" style="color:#2B72AF;"></i></span><input type="text"  name="birthday" id="birthday" class="form-control" value="03/18/2013" /> 
                       </div>
                      <label>Provinsi</label>
                      <input type="text" class="form-control" name="provinsi" value=<?php echo $user_bio->provinsi ?>>
                      <label>Kabupaten/ Kota</label>
                      <input type="text" class="form-control" name="kab_kota" value=<?php echo $user_bio->kab_kota ?>>
                      <label>Alamat Lengkap</label>
                      <textarea name="alamat" class="form-control"><?php echo $user_bio->alamat ?></textarea>
                      <label>No Telepon/ Handphone</label>
                      <input type="text" class="form-control" name="nohp" value=<?php echo $user_bio->nohp ?>>
                      <label>Kode Pos</label>
                      <input type="text" name="kodepos" value=<?php echo $user_bio->kodepos ?> class="form-control"><br><br>
                      <input type="submit" name="submit" class="btn-primary btn btn-lg" value="Submit">               
               </form>

               <script type="text/javascript">
               $(document).ready(function() {
                  $('#birthday').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                  });
               });
               </script>

              </div>
            </div>