<div class="col-md-12 col-lg-12">
    <?php if($this->session->userdata('user')!=true) {?>
    <a class="btn btn-lg btn-primary" href=<?php echo base_url() ?>rumah/produk style="text-align:left;margin-top:10px;"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
    <?php } ?>
    <h1><i class="fa fa-plus-circle" style="color:#236AA7;"></i>&nbspTambah Buku </h1>
    <hr>
    <?php echo form_open_multipart('');?>
    <?php 
    	$date1=date("mdY");
        $id_produk=str_shuffle($date1);
     ?>
     <input type="hidden" name="id_produk" value=<?php echo $id_produk ?>>
    <label>Judul</label>
    <input type="text" class="form-control" name="judul">

    <label>Foto</label>
   <?php /* 
    <input type="file" name="foto1" class="form-control" style="padding:1px;">
    <input type="file" name="foto2" class="form-control" style="padding:1px;">
    <input type="file" name="foto3" class="form-control" style="padding:1px;">
    */?>
    <?php for($i=1;$i<=3;$i++): ?>
        <label for="photo<?=$i?>">File<?=$i?></label>
        <?=form_upload(array('name'=>'userfile'.$i,'size'=>'36'))?>
    <?php endfor ?>
    <label>Isi</label> <br>
    <?php echo initialize_tinymce(); ?>
    <textarea name="isi" id="" cols="30" rows="10"></textarea>
    <label>Kategori</label>
    <input type="text" name="kategori" class="form-control"> <br>
    <?php 
    	$data=array('name'=>'submit','value'=>'Kirim', 'class'=>'btn btn-primary btn-lg');
    	echo form_submit($data);
     ?>
    </form>
    <script>                   
          /*  jQuery(document).ready(function($) {

                var options = {
                    beforeSend: function(){
                        // Replace this with your loading gif image
                        $(".upload-image-messages").html('<p><img src = "<?php echo base_url() ?>images/loading.gif" class = "loader" /></p>');
                    },
                    complete: function(response){
                        // Output AJAX response to the div container
                        $(".upload-image-messages").html(response.responseText);
                        $('html, body').animate({scrollTop: $(".upload-image-messages").offset().top-100}, 150);
                       
                    }
                }; 
                // Submit the form
                $(".upload-image-form").ajaxForm(options); 

                return false;
               
            });
            </script>
</div>