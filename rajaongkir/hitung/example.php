*<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/skeleton.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<title>Penggunana API RajaOngkir | IDMore</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<br/>
			<div class="twelve columns"><h1>Hitung Ongkos Kirim</h1></div>
		</div>
		<div class="row">
			<div class="twelve columns"><h5>Masukan Data</h5></div>
		</div>
		<div class="row">
			<!-- <form method="POST" action="gettotal.php"> -->
			<div class="four columns">
				Asal<br/>
				<select id="oriprovince">
					<option>Provinsi</option>
				</select>
				<br/>
				<select name="oricity" id="oricity">
					<option>Kota</option>
				</select>			
			</div>
			<div class="four columns">
				Tujuan<br/>
				<select id="desprovince">
					<option>Provinsi</option>
				</select>
				<br/>
				<select name="descity" id="descity">
					<option>Kota</option>
				</select> 
			</div>
			<div class="two columns">
				Layanan<br/>
				<select name="service" id="service">
					<option value="all">semua</option>
					<option value="jne">JNE</option>
					<option value="pos">POS</option>
					<option value="tiki">TIKI</option>
				</select> 
				<br/>
				Berat (gram)<br/>
				<input name="weight"  style="width:100px" id="berat" type="number">
			</div>
			<div class="two columns">
				<br/>
				<button type="button" onclick="cekHarga()">Cek Harga</button> 
			</div>
			<!-- </form> -->
		</div>
		<div class="row">
			<div class="twelve columns"><h5>Harga</h5></div>
			
			<hr/>
			<table class="twelve columns">
				<thead>
				<tr>
					<th>Kurir</th>
					<th>Servis</th>
					<th>Deskripsi Servis</th>
					<th>Lama Kirim (hari)</th>
					<th>Total Biaya (Rp)</th>
				</tr>
				</thead>
				<tbody id="resultsbox"></tbody>
			</table>
		</div>
	</div>
</body>
</html>