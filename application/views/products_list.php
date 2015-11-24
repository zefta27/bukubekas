<h1> Daftar Produk </h1>
<hr/>
<table border='1'>
<tr>
<td>Id</td>
<td>Nama Produk</td>
<td>Harga</td>
</tr>
<?php foreach($products->result_array() as $row) {?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['nama']?></td>
<td><?php echo $row['harga']?></td>
</tr>
<?php
}
?>
</table>
<hr/>
<table border='1'>
<?php 
$cal = 3;
$idx = 0;
foreach($products->result_array() as $row) {?>
<?php 
//cek apakah element pertama pada baris
if($idx % 3 == 0){
?>
<tr>
<?php } ?>
	<td>Kolom
	</td>
<?php 
//cek apakah element terakhir pada baris
if($idx % 3 == 2){
?>
</tr>
<?php
}
$idx++;
}
?>
<?php 
//cek apakah element terakhir pada array dan bukan
//berkelipatan tiga
if($idx % $cal != 0){
?>
</tr>
<?php
}
?>
</table>

