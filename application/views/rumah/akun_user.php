<div class="col-md-12">
	<h1><i class="fa-user fa"></i>&nbspAkun Pengguna</h1>
	<button class="btn-primary btn btn-lg" data-toggle="modal" data-target="#myModal">
		<i class="fa-plus-circle fa">Tambah pengguna</i>
	</button>
	<br><br>
	<table class="table">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Email</th>
			<th>Aksi</th>
		</tr>
		<?php 
		if($this->uri->segment('3')=='')
		{
			$i=1;
		}
		else{
			$i=$this->uri->segment('3')+1;
		}
		foreach ($query as $user) {?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->email ?></td>
			<td>
				<a href=<?php echo base_url() ?>rumah/del_user class="btn-danger btn">Hapus</a>
			</td>
		</tr>
		<?php
		$i++;	
		}
		 ?>
	</table>
	<?php echo $halaman ?>
</div>

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa-user fa"></i>&nbsp Tambah Pengguna</h4> 
      </div>
      <div class="modal-body">
       		<form action="" method="post" enctype="multipart/form-data">
            <div id="callout-alerts-dismiss-plugin" class="bs-callout bs-callout-info">
              
              <label for="">Username</label>
                <input type="text" name="username" class="form-control" required>
              <label for="">Email</label>
                <input type="text" name="email" class="form-control" required>
               <label for="">Password</label>
                <input type="password" name="password" class="form-control" required>
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