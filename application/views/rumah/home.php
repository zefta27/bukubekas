<div class="col-md-12 col-lg-12">
	<div class="alert alert-success">
		<h3>Selamat datang <?php echo $this->session->userdata('username_rumah'); ?></h3>

	</div>
	<div class="panel panel-primary">
       <div class="panel-heading">
           <h1 class="panel-title judul"><i class="fa-user fa"></i>&nbsp Tentang</h1>
        </div>
            <div class="panel-body">
              
				<?php 
					if($data!=NULL)
					{
						?>

						<table class="table">
							<tr>
								<th>
									No
								</th>
								<th>Nama</th>
								<th>Tentang</th>
								<th>Foto</th>
								<th>Aksi</th>
							</tr>
					<?php
						$i=1;
						foreach ($data->result() as $tentang) {
					?>
							<tr>
								<td><?php echo $i ?></td>
								<td>
									<?php echo $tentang->nama_about ?>		
								</td>
								<td><?php echo $tentang->deskripsi ?></td>
								<td>
									<img class="img-responsive" src=<?php echo base_url().$tentang->foto ?> alt="" width="50px;">
									
								</td>
								<td>

									 <button style="margin-bottom:2px;" type="button" class="btn btn-primary btn block" data-toggle="modal" data-target=<?php echo "#myModal".$i ?>>
									  <i class="fa-edit fa"></i>&nbspEdit data
									</button>
									<a href=<?php echo base_url() ?>rumah/del_tentang/<?php echo $tentang->id_about ?> class="btn btn-danger btn-block">
									<i class="fa-close fa"></i>&nbsp
									Hapus</a>
								</td>
							</tr>			
					<?php	
						$i++;	
						}
					?>
						</table>
					<?php
					}
				 ?>
				<h2><i class="fa-plus fa"></i>&nbspTambah Pemilik</h2>
				<div class="col-md-12 col-lg-12">
					 <form action="" method="post" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td>Nama Lengkap</td>
							<td>
								<input name="nama_about" type="text" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Tentang saya</td>
							<td>
								<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>
								<input type="file" name="foto" class="form-control">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input name="submit" type="submit" value="submit" class="btn btn-lg btn-primary">	
							</td>
						</tr>
					</table>	
				</form>
				</div>
			</div>
			    <script src=<?php echo base_url() ?>asset/bower_components/jquery/dist/jquery.min.js></script>

			<script src=<?php echo base_url() ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js></script>


			<?php 
				$i=1;
				foreach ($data->result() as $about ) {
			?>
				<script type="text/javascript">
				$('#myModal<?php echo $i?>').on('shown.bs.modal', function () {
				  $('#myInput').focus()
				})
				</script>
				<div class="modal fade" id="myModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel"><i class="fa-update fa"></i>&nbspEdit Data</h4>
				      </div>
				      <div class="modal-body">
				       		<form action="" method="post" enctype="multipart/form-data">
				            <div id="callout-alerts-dismiss-plugin" class="bs-callout bs-callout-info">
				              <input type="hidden" name="id_about" value=<?php echo $about->id_about ?>>
				              <label for="">Nama Lengkap</label>
				                <input type="text" name="nama_about" class="form-control" value=<?php echo $about->nama_about ?>>
				              <label for="">Tentang saya</label>
				              	<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo $about->deskripsi ?></textarea>
				            </div>
				            <br>
				            <input type="submit" name="update" class="btn btn-primary btn-lg" value="Kirim">

				          </form>
				      </div>
				 
				    </div>
				  </div>
				</div>
			<?php	
				$i++;	
				}
			 ?>
		</div>
	</div>
	<br>
	<div style="clear:both"></div>
	<div class="panel panel-primary">
       <div class="panel-heading">
           <h1 class="panel-title judul"><i class="fa-user fa"></i>&nbsp Slide</h1>
        </div>
        <div class="panel-body">
        	<table class="table-striped table">
        		<tr>
        			<th>NO</th>
        			<th>Judul</th>
        			<th>Isi</th>
        			<th>Foto</th>
        			<th>Aksi</th>
        		</tr>
        		<?php 
        		$i=1;
        		foreach($data1->result() as $slide)
        			{
        		 ?>
        		 <tr>
        			<td><?php echo $i ?></td>
        			<td><?php echo $slide->judul_slide ?></td>
        			<td><?php echo $slide->isi_slide ?></td>
        			<td>
        				<a href=<?php echo base_url().$slide->foto_slide ?>>
        					<img src=<?php echo base_url().$slide->foto_slide ?> alt="" class="img-responsive" width="100px;">
        				</a>
        				<br>
        				<button style="margin-bottom:2px;" type="button" class="btn btn-info btn block" data-toggle="modal" data-target=<?php echo "#myModalafoto".$i ?>>
							<i class="fa-edit fa"></i>&nbspEdit Foto
						</button>		
        			</td>
        			<td>
        					 <button style="margin-bottom:2px;" type="button" class="btn btn-danger btn block" data-toggle="modal" data-target=<?php echo "#myModala".$i ?>>
								<i class="fa-edit fa"></i>&nbspEdit data
							</button>
        			</td>
        		</tr>	
        		 <?php
        		 	$i++; 
        			} 
        		?>
        	</table>
        				<?php 
				$i=1;
				foreach ($data1->result() as $slidea ) {
			?>
				<script type="text/javascript">
				$('#myModala<?php echo $i?>').on('shown.bs.modal', function () {
				  $('#myInput').focus()
				})
				</script>
				<div class="modal fade" id="myModala<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel"><i class="fa-update fa"></i>&nbspEdit Data</h4>
				      </div>
				      <div class="modal-body">
				       		<form action="" method="post" enctype="multipart/form-data">
				            <div id="callout-alerts-dismiss-plugin" class="bs-callout bs-callout-info">
				              <input type="hidden" name="id_slide" value=<?php echo $slidea->id_slide ?>>
				              <label for="">Judul Slide</label>
				                <input type="text" name="judul_slide" class="form-control" value='<?php echo $slidea->judul_slide ?>'>
				              <label for="">Isi slide</label>
				              	<textarea name="isi_slide" id="" cols="30" rows="10" class="form-control"><?php echo $slidea->isi_slide ?></textarea>
				            </div>
				            <br>
				            <input type="submit" name="update_slide" class="btn btn-primary btn-lg" value="Kirim">

				          </form>
				      </div>
				 
				    </div>
				  </div>
				</div>
				<script type="text/javascript">
				$('#myModalafoto<?php echo $i?>').on('shown.bs.modal', function () {
				  $('#myInput').focus()
				})
				</script>
				<div class="modal fade" id="myModalafoto<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel"><i class="fa-update fa"></i>&nbspGanti Foto</h4>
				      </div>
				      <div class="modal-body">
				       		<form action="" method="post" enctype="multipart/form-data">
				            <div id="callout-alerts-dismiss-plugin" class="bs-callout bs-callout-info">
				              <input type="hidden" name="id_slide" value=<?php echo $slidea->id_slide ?>>
				              <img src=<?php echo base_url().$slidea->foto_slide ?> alt="" class="img-responsive">
				              <label for="">Foto Slide</label>
				              <input type="file" name="foto" class="form-control" style="padding-bottom:10px;">
				            </div>
				            <br>
				            <input type="submit" name="update_fotoslide" class="btn btn-primary btn-lg" value="Kirim">

				          </form>
				      </div>
				 
				    </div>
				  </div>
				</div>
			<?php	
				$i++;	
				}
			 ?>
        </div>
     </div>