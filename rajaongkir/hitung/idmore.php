<?php
/*
* Rajaongkir cek harga
* Code by @xyussanx :: idmore
*/
class IdmoreRO{
	private $key;
	public function __construct()
	{
		//masukan api key disini
		$this->key = 'df457c53b008e1a08f02b6aed633d190';	
	}
	//menampilkan data provinsi
	public function showProvince()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->key"
				),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}
	//menampilkan data kabupaten/kota berdasarkan id provinsi
	public function showCity($province)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->key"
				),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}
	//hitung ongkir
	public function hitungOngkir($origin,$destination,$weight,$courier)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
			CURLOPT_HTTPHEADER => array(
				"key: $this->key"
				),
			));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} else {
			return $response;
		}
	}
}
