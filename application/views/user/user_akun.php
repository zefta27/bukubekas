<div id="col-md-12">
	
	<div class="panel panel-danger" style="margin-top:10px;">
              <div class="panel-heading">
              <h1 class="panel-title judul"><strong>Akun Pengguna</strong></h1>
              </div>
              <div class="panel-body">
               <form method="post" action="">
                    <h3><i class="fa fa-key" style="color:#F92D71"></i>&nbspAkun Pengguna</h3>
                    <hr>
                    <label>Username</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon"><i class="glyphicon glyphicon-user" style="color:#F92D71;"></i></span><input type="text" value=<?php echo $user->username ?> name="username"class="form-control"/> 
                       </div>
                    <label>Email</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon" style="color:#F92D71;">@</span><input type="text"  name="email"class="form-control" value=<?php echo $user->email ?>> 
                       </div>
                     <label>Password</label>
                       <div class="input-prepend input-group">
                         <span class="add-on input-group-addon"><i class="fa fa-lock" style="color:#F92D71"></i></span><input type="password"  name="password" class="form-control"/> 
                       </div>
                      <br><br>
                      <input type="submit" name="submit" class="btn-danger btn btn-lg" value="Submit">               
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
</div>