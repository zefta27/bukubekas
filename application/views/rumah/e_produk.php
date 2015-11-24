<div class="col-md-12 col-lg-12" >
	
	<?php echo form_open('') ?>
	<label>Judul</label>
	<?php 
		$data=array('name'=>'judul','value'=>$buku->judul);
		echo form_input($data);
	 ?>
	<br>
	<label>Isi</label>
	<?php echo initialize_tinymce(); ?>
	<textarea name="isi" id=""  cols="30" rows="10"><?php echo $buku->isi ?></textarea>
	<label>Kategori</label>
	<?php 
		$data=array('name'=>'kategori','value'=>$buku->kategori);
		echo form_input($data);
	 ?>
	<br>
	<input type="hidden" name="id_produk" value=<?php echo $buku->id_produk ?>>
	<?php 
		$data=array('name'=>'edit','value'=>'Kirim','class'=>'btn btn-primary btn-lg');
		echo form_submit($data);
	 ?>
	<?php echo form_close() ?>
</div>