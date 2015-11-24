<div class="col-md-12 col-lg-12">
	<h1><i class="fa-user fa"></i>&nbsp Akun Admin</h1>
	<hr>
	<form action="" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td>Username :</td>
				 <td>
				 	<input type="text" class="form-control" name="username" value=<?php echo $akun->username ?>>
				 </td>
			</tr>
			<tr>
				<td>Email :</td>
				<td>
					<input type="text" class="form-control" name="email" value=<?php echo $akun->email ?>>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password" class="form-control">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="" class="btn btn-primary btn-lg" name="submit"></td>
			</tr>

		</table>
	</form>
</div>
