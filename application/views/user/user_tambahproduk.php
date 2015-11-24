<div class="col-md-12 col-lg-12">
    <h1><i class="fa fa-book" style="color:#2B72AF;"></i>&nbspProduk</h1>
        <a class="btn btn-lg btn-primary" href=<?php echo base_url() ?>user/produk style="text-align:left;margin-top:10px;"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
    <hr>
        <?php echo form_open_multipart('');?>
    <?php 
        $date1=date("mdY");
        $id_produk=str_shuffle($date1);
     ?>
        <table class="table" style="font-weight:600">
            <tr>
                <td>Judul Buku</td>
                <td><input type="text"  name="judul" class="form-control"></td>
            </tr>
            <tr>
                <td>Isi</td>
                <td>
                    <?php echo initialize_tinymce(); ?>
                    <textarea name="isi" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <i class="alert-danger  ">angka diisi tanpa tanda titik</i>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" name="harga" aria-describedby="basic-addon1">
                    </div>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                     <?php for($i=1;$i<=3;$i++): ?>
                        <label for="photo<?=$i?>">File<?=$i?></label>
                        <?=form_upload(array('name'=>'userfile'.$i,'size'=>'36'))?>
                    <?php endfor ?>
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori" id="" class="form-control">
                        <option value="agama">Agama</option>
                        <option value="anak">Anak-anak</option>
                        <option value="bahasa">Bahasa dan Kamus</option>
                        <option value="busana">Busana dan kecantikan</option>
                        <option value="cd">CD pembelajaran interaktif</option>
                        <option value="ekonomi">Ekonomi dan Manajemen</option>
                        <option value="hobi">Hobi dan Usaha</option>
                        <option value="hukum">Hukum dan Undang-undang</option>
                        <option value="humor">Humor</option>
                        <option value="inspirasi">Inspirasi dan Spiritual</option>
                        <option value="kesehatan">Kesehatan dan Lingkungan</option>
                        <option value="komik">Komik</option>
                        <option value="komputer">Komputer dan Internet</option>
                        <option value="majalah">Majalah</option>
                        <option value="masakan">Masakan dan Makanan</option>
                        <option value="orangtua">Orangtua dan Keluarga</option>
                        <option value="hotel">Perhotelan dan Pariwisata</option>
                        <option value="psikologi">Psikologi dan Pengembangan diri</option>
                        <option value="referensi">Referensi</option>
                        <option value="remaja">Remaja</option>
                        <option value="sains">Sains dan Teknologi</option>
                        <option value="sastra">Sastra dan Filsafat</option>
                        <option value="teknik">Teknik</option>
                    </select>
                </td>
            </tr>
                <input type="hidden" name="id_produk" value=<?php echo $id_produk ?>>
            <tr>
                <td></td>
                <td><input type="submit" value="submit" name="submit" class="btn btn-lg btn-primary"></td>
            </tr>
        </table>
    </form>
</div>