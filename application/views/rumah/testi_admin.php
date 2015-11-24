<div class="col-lg-12 col-md-12">
	<h1>Testimonial</h1><hr>
	<table class="table">
		<tr>
			<th>
				No
			</th>
			<th>Testimonial</th>
			<th>Oleh</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<?php 
		$i=1;
		foreach($data->result() as $testi){ ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $testi->isi_testimonial ?></td>
			<td><?php echo $testi->username ?></td>
			<td><?php echo $testi->tanggal ?></td>
			<td>
				<?php 
					if($testi->tampil==1)
				 	{?>
				 		<div>Tampil</div>
				 	<?php	
					}
					else{?>
						<div>Tidak tampil</div>
				<?php
					}
				 ?>
			</td>
			<td>
				 <form action="" method="post">
				<?php 
					if($testi->tampil==1)
				 	{?>
				 		<input type="hidden" name="tampil" value=0>
				 		<input type="hidden" name="id_testimonial" value="<?php echo $testi->id_testimonial ?>">
						<input type="submit" name="submit" value="Hapus Tampilan" class="btn btn-warning">
				 	<?php	
					}
					else{?>
						<input type="hidden" name="tampil" value=1>
						<input type="hidden" name="id_testimonial" value="<?php echo $testi->id_testimonial ?>">
						<input type="submit" name="submit" value="Tampilkan" class="btn btn-primary">
					<?php
					}
				 ?>
					
				</form>
			</td>
		</tr>
		<?php 
		$i++;
		} ?>
	</table>
</div>