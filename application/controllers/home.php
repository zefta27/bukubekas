<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_rumah');
		$this->load->model('m_home');
		$this->key = 'df457c53b008e1a08f02b6aed633d190';

	}

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
	function process($showprovince)
	{
		if(isset($showprovince)):
			switch ($showprovince) {
				case 'showprovince':
				$province = $this->showProvince();
				echo $province;
				break;
				case 'showcity':
				$idprovince = $_GET['province'];
				$city = $this->showCity($idprovince);
				echo $city;
				break;
				case 'cost':
				$origin = $_GET['origin'];
				$destination = $_GET['destination'];
				$weight = $_GET['weight'];
				$courier = $_GET['courier'];
				$cost = $this->hitungOngkir($origin,$destination,$weight,$courier);
				//parse json
				$costarray = json_decode($cost);
				$results = $costarray->rajaongkir->results;
				if(!empty($results)):
					foreach($results as $r):
						foreach($r->costs as $rc):
							foreach($rc->cost as $rcc):
								echo "<tr><td>$r->code</td><td>$rc->service</td><td>$rc->description</td><td>$rcc->etd</td><td>".number_format($rcc->value)."</td></tr>";
							endforeach;
						endforeach;
					endforeach;
				endif;
		//end of parse json
				break;
				case 'alvincost':
				$origin = $_GET['origin'];
				$destination = $_GET['destination'];
				$weight = $_GET['weight'];
				$courier = $_GET['courier'];
				$cost = $this>hitungOngkir($origin,$destination,$weight,$courier);
				//parse json
				$costarray = json_decode($cost);
				$results = $costarray->rajaongkir->results;
				echo '<br/>';
				// print_r($results);
				if(!empty($results)){
					foreach($results as $r):
						foreach($r->costs as $rc):
							foreach($rc->cost as $rcc):
								echo '<label><input onclick="totalOngkir()" type="radio" id="pilihpaket" name="pilihpaket" value="'.$rcc->value.'">'.$r->code.'<br/>'.$rc->service.'<br/>'.$rc->description.'Rp.'.number_format($rcc->value).'</label><br/>';
							endforeach;
						endforeach;
					endforeach;
				}else{
					echo 'paket tidak tersedia';
				}
		//end of parse json
				break;
				default:
				echo 'aksi tidak tersedia';
				break;
			}
			endif;

	}
	///////////////BATAS HITUNG ONGKIR//////////////
	function header($title)
	{
		$data['title']=$title;
		if($this->session->userdata('user')==true){
			$this->load->view('home/headeruser',$data);
		}
		else{
			$this->load->view('home/headerhome',$data);	
		}
	}
	public function validasi()
    {
    	 $this->form_validation->set_message('required', '%s Harus Diisi.');
   		 $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
    	  $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
    	  $this->form_validation->set_message('numeric', '%s Maksimal %s Karakter.');
    	$this->form_validation->set_message('valid_email', '%s Harus menggunakakan email yang valid .');
    	$this->form_validation->set_message('matches', '%s tidak coock dengan [%s]');
	
    }
	function login_menu()
	{
		if($this->input->post('login'))
		{
			$link=$this->input->post('link',true);
			$username=$this->input->post('username',TRUE);
			$password=$this->input->post('password',TRUE);
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('k_user');
			if($query->num_rows()==1)
			{
				$db=$query->row();
				$id_k_user=$db->id_k_user;
				$query1=$this->m_home->g_bio_user($id_k_user);
				$user = array(
	                   'username'  => $username,
	   					'id_k_user' => $id_k_user,
	   					'foto_user'=>$query1->foto_user,
	                    'user' => TRUE
	            );
				$this->session->set_userdata($user);
				$this->session->set_flashdata('login_berhasil', '<h3>Login Berhasil, Untuk mengakses menu pengguna silahkan klik  <a href='.base_url().'toko/user> disini</a></h3>');
				redirect($link);
					
			}
			else{
				$this->session->set_flashdata('message', '<h5>Maaf, Username atau Password salah!</h5>');
				redirect($link);
			}	
		}
	}
	
	public function cari(){
			$this->login_menu();	
			$data['pencarian']=$this->input->post('cari',true);
			$title=$data['pencarian'].'- Toko buku bekas Berkualitas';
			$this->header($title);
			$data['data']=$this->m_home->cari();
			$this->load->view('home/hasilcari',$data);
			$this->load->view('home/footerhome');
			if($data['pencarian']=="")
			{
				redirect('home/semuaproduk');
			}
	}
	public function index()
	{	

		
		$data['testimonial']=$this->m_home->join_testi_biouser();
		$data['data']=$this->m_home->get_slide();
		$this->login_menu();
		$title='Toko buku Berkualitas';
		$data['data']=$this->m_rumah->g_all_produk();
		$this->header($title);
		$this->load->view('home/v_home',$data);
		$this->load->view('home/footerhome');
	}
	public function daftar()
	{
		if($this->input->post('submit'))
		{
			$data=date("Ymdmh");
        	$id_k_user=str_shuffle($data);
			$this->m_rumah->ins_bio_user($id_k_user);
			$this->m_rumah->ins_k_user($id_k_user);
			redirect('toko');
		}
		$this->login_menu();
		$title="Registrasi Pengguna";
		$this->header($title);
		$this->load->view('home/daftar');
		$this->load->view('home/footerhome');
	}
	
	public function login()
	{
		$this->login_menu();
		
		$data['title']="Login Pengguna";
		$this->load->view('home/headerhome',$data);
		$this->load->view('home/login');
		$this->load->view('home/footerhome');
		if($this->input->post('submit'))
		{
			$username=$this->input->post('username',TRUE);
			$password=$this->input->post('password',TRUE);
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('k_user');

			if($query->num_rows()==1)
			{
				$query1=$this->m_home->g_bio_user($id_k_user);
				$fotouser=$query1->foto_user;
				$db=$query->row();
				$user = array(

	                   'username'  => $username,
	                   'id_k_user' => $id_k_user,
	                   'foto_user'=>$foto_user,
	                    'user' => TRUE
	            );
				$this->session->set_userdata($user);
				redirect('user');
					
			}
			else{
				$data['notif']='Username atau Password salah';
			}
		}
	}
	public function kontak()
	{
		if($this->input->post('submit'))
		{
			$this->m_home->ins_kontak();
		}
		$this->login_menu();
		$title="kontak ";
		$this->header($title);
		$this->load->view('home/kontak');
		$this->load->view('home/footerhome');	
	}
	public function tentang()
	{
		$data['data']=$this->m_home->get_about();
		$this->login_menu();
		$title="Tentang";
		$this->header($title);
		$this->load->view('home/tentang',$data);
		$this->load->view('home/footerhome');
	}
	function produk($id_produk){
		$this->login_menu();
		$produk['produk']=$this->m_home->g_select_produk($id_produk);
		$produk['data']=$this->m_home->g_select_all_image_produk($id_produk);
		$produk['data1']=$this->m_home->linkterkait();
		$produk['data2']=$this->m_home->linkterkait1();
		$title=$produk['produk']->judul;
		$this->header($title);
		$this->load->view('home/produk',$produk);
		$this->load->view('home/footerhome');		
	}
	public function pesan($id_produk)
	{
		
			$this->login_menu();
			$produk['produk']=$this->m_home->g_sel_image_produk($id_produk);
			$produk['user']=$this->m_home->g_bio_user_pesan($id_produk);		
			$title="Pesan - Toko";
			$this->header($title);
			if($this->session->userdata('user'))
			{
				$id_k_user=$this->session->userdata('id_k_user');
				$produk['bio_user']=$this->m_home->g_bio_user($id_k_user);
				//$this->m_home->direct_ins_pesan($id_produk);
			}
			$this->load->view('home/pesan',$produk);
			$this->load->view('home/footerhome');
			if($this->input->post('submit'))
			{
				$data=date("Ymdmh");
	        	$id_k_user=str_shuffle($data);
				$this->m_home->ins_bio_user($id_k_user);
				$this->m_home->ins_k_user($id_k_user);
				$this->m_home->pesan($id_produk,$id_k_user);
			}	
			if($this->input->post('submit1'))
			{
				$id_k_user=$this->input->post('id_k_user');
				$this->m_home->upd_bio_user($id_k_user);
				$this->m_home->pesan($id_produk,$id_k_user);	
			}	
		
	}
	public function transaksi($id_transaksi)
	{	
		$this->login_menu();
		
		$produk['transaksi']=$this->m_home->g_transaksi($id_transaksi);
		$id_produk=$produk['transaksi']->id_produk;
		$id_k_user=$produk['transaksi']->id_k_user;
		$produk['produk']=$this->m_home->g_sel_image_produk($id_produk);
		$produk['bio_user']=$this->m_home->g_bio_user($id_k_user);
		$title="Transaksi -Toko buku";
		$this->header($title);
		$this->load->view('home/transaksi',$produk);
		$this->load->view('home/footerhome');
		
	}
	function coba(){
		$this->load->view('home/headerhome');
		$this->load->view('home/coba');
		$this->load->view('home/footerhome');
	}	
	function keluar()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
	public function buat_captcha()
    {
    	$vals = array(
	        'img_path'  => './captcha/',
	        'img_url'  => base_url().'captcha/',
			'img_width'  => '200',
			'img_height' => 100,
			'border' => 0, 
			'expiration' => 3600);
			 
			            // create captcha image
			$cap = create_captcha($vals);
			
			return $cap; 
			            // store image html code in a variable
				
    }
	function konfirmasi()
	{
		$this->login_menu();
		$title="Konfirmasi Pembayaran -Toko buku";
		$this->header($title);

		     $cap = $this->buat_captcha();
			 
			// create captcha image
			//$cap = create_captcha($vals);
			 
			            // store image html code in a variable
			$data['image'] = $cap['image'];
			$data['word'] = $cap['word'];
			 
			            // store the captcha word in a session
			$session=array('mycaptcha'=>$data['word']);
			$this->session->set_userdata($session);

    	$data['notif']='';
    	if($this->input->post('submit'))
    	{
 			/*if($this->input->post('captcha')!=$data['word'])
 			{
 				$data['notif']="Captcha Tidak Cocok";
 			}
 			else
 			{*/
					$config['upload_path']   = './asset/images/bukti_transfer/';
                    $config['allowed_types'] = 'gif|jpg|png|bmp';
                    $config['max_size']      = '2000000';
                    $config['file_name']=url_title($this->input->post('foto'));
                    
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);         
                    if($this->upload->do_upload('foto'))
                    {
                        echo $this->upload->display_errors();
                    }
                    $path= $this->upload->file_name;
                    $foto="asset/images/bukti_transfer/".$path;
                    echo $foto;
                   // $this->mhome->updfoto($foto);
                    echo $this->upload->display_errors();
                    //redirect('user/fotouser/'.$id_biodatauser);

		    		//$this->mhome->inskonfirmasipayment();
		    		$insert=$this->m_home->ins_konfirmasi_pembayaran($foto);
		    		if($insert==true){
		    			$this->session->set_flashdata('notif_konfir','Pengisian form Konfirmasi Pembayaran Berhasil');
		    			redirect('home/konfirmasi/',$data);
		    		}
		    		//$data['notif']=$this->mhome->inskonfirmasipayment($foto);
    		/*
    		}*/
    	}

		$this->load->view('home/konfirmasi',$data);
		$this->load->view('home/footerhome');

	}
	function semuaproduk()
	{
		$this->login_menu();
		$title="Semua Buku -Toko buku";
		$this->header($title);
		$data['data']=$this->m_rumah->g_all_produk();
		$this->load->view('home/semuabuku',$data);
		$this->load->view('home/footerhome');
	}
	function tambah()
	{
		$id=$this->input->post('id_produk');
		$this->db->where('id_produk',$id_produk);
		$query = $this->db->get('produk',1);
		if($query->num_rows > 0)
		{
			foreach ($query->result() as $row) {
				$data = array(
					'id' =>$id,
					'qty' =>'1',
					'price' => $row->harga,
					'name' => $row->judul
					);
				$this->cart->insert($data);
			}
		}
	}
	function hapus_cart()
	{
		$this->cart->destroy();
		redirect('cart');
	}
	public function select_kel($id, $sid)
	{
		$kec=$this->input->get('kec');
		$prop = $this->input->get('prop');
		if (!empty($kec) and !empty($prop)){
			if (ctype_digit($kec) and ctype_digit($prop)) {
				
				$kel = $this->input->get('kel');
				$query = $this->db->query("SELECT * FROM inf_lokasi where lokasi_propinsi=$prop and lokasi_kecamatan=$_kel and lokasi_kelurahan!=0 and lokasi_kabupatenkota=$kec order by lokasi_nama");
				echo"<option selected value=''>Pilih Kelurahan/Desa</option>";
				//while($d = mysql_fetch_array($query))
				foreach($query->result() as $d)
				{
					echo "<option value='$d->lokasi_kode'>$d->lokasi_nama</option>";
				}
			}
		}
	}
	public function select_kec($q, $sid){
		$kel=$this->input->get('kel');
		$prop=$this->input->get('prop');
		$kec=$this->input->get('kec');
		if (empty($kel)){

			if (!empty($kec) and !empty($prop)){
				if (ctype_digit($kec) and ctype_digit($prop)) {
					
					$query= $this->db->query("SELECT * FROM inf_lokasi where lokasi_propinsi=$prop and lokasi_kecamatan!=0 and lokasi_kelurahan=0 and lokasi_kabupatenkota=$kec order by lokasi_nama");
					echo"<option selected value=''>Pilih Kecamatan</option>";
					//while($d = mysql_fetch_array($query))
					foreach($query->result() as $d)
					{

						echo "<option value='$d->lokasi_kecamatan&kec=$d->lokasi_kabupatenkota&prop=$d->lokasi_propinsi''>$d->lokasi_nama</option>";
					}
				}
			}
		}
	}
	public function select_kota($q, $sid)
	{

		if (!empty($q)){
			if (ctype_digit($q)) {
				
				$query = $this->db->query("SELECT * FROM inf_lokasi where lokasi_propinsi=$q and lokasi_kecamatan=0 and lokasi_kelurahan=0 and lokasi_kabupatenkota!=0 order by lokasi_nama");
				echo"<option selected value=''>Pilih Kota/Kab</option>";
				foreach($query->result() as $kab){
					echo "<option value='$kab->lokasi_kabupatenkota&prop=$q'>$kab->lokasi_nama</option>";
				}


			}
		}
		 else {
			if (!empty($_GET['kec']) and !empty($_GET['prop'])){
				if (ctype_digit($_GET['kec']) and ctype_digit($_GET['prop'])) {
				include '../koneksi.php';
					$query = mysql_query("SELECT * FROM inf_lokasi where lokasi_propinsi=$_GET[prop] and lokasi_kecamatan=$_GET[kel] and lokasi_kelurahan!=0 and lokasi_kabupatenkota=$_GET[kec] order by lokasi_nama");
					echo"<option selected value=''>Pilih Kelurahan/Desa</option>";
					while($d = mysql_fetch_array($query)){
						echo "<option value='$d[lokasi_kode]'>$d[lokasi_nama]</option>";
					}
				}
			}
		}

	}
	
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */