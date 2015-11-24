<?php
class M_rumah extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	function getAll()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$q = $this->db->get();
		return $q;
	}
	function login()
	{
		$username=$this->input->post('username',TRUE);
			$password=$this->input->post('password',TRUE);
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('k_rumah');
			if($query->num_rows()==1)
			{
				$newdata = array(
	                   'username'  => $username,
	                    'masuk' => TRUE
	            );
				$this->session->set_userdata($newdata);
				return true;
				redirect('rumah/home');
					
			}
			else{
				echo "Login Gagal";
			}
	}
	function get_id_user_to_ins_produk()
	{
		if($this->session->userdata('user')==true)
		{
			$id_user=$this->session->userdata('id_k_user');
		}
		if($this->session->userdata('admin')==true)
		{
			$id_user=$this->session->usedata('id_k_admin');
		}
		return $id_user;
	}
	function get_testi()
	{
		return $this->db->get('testimonial');
	}
	function get_testi_join_user()
	{
		$this->db->join('k_user','testimonial.id_user = k_user.id_k_user');
		return $this->db->get('testimonial');
	}
	function upd_testimonial()
	{
		$id_testimonial=$this->input->post('id_testimonial',true);
		$tampil=$this->input->post('tampil',true);
		$data=array('tampil'=>$tampil);
		$this->db->where('id_testimonial',$id_testimonial);
		$this->db->update('testimonial',$data);
	}
	function upd_akun_admin()
	{
		$user_sess=$this->session->userdata('username');
		$username=$this->input->post('username',true);
		$password=$this->input->post('password',true);
		$email=$this->input->post('email',true);
		$data=array('username'=>$username,'password'=>$password,'email'=>$email);
		$this->db->where('username',$user_sess);
		$this->db->update('k_rumah',$data);
		$newdata = array(
	                   'username'  => $username,
	                    'masuk' => TRUE
	          	);
				$this->session->set_userdata($newdata);
				redirect('rumah/akun/'.$username);
	}
	function join_transaksi()
	{
		$this->db->join('produk','transaksi.id_produk = produk.id_produk');
		$this->db->join('k_user','transaksi.id_k_user = k_user.id_k_user');
		$this->db->join('bio_user','transaksi.id_k_user = bio_user.id_k_user');
		return $this->db->get('transaksi');
	}
	function get_all_user()
	{
		return $this->db->get('k_user');
	}
	function sel_join_transaksi($id_transaksi,$id_k_user)
	{

		$this->db->join('produk','transaksi.id_produk = produk.id_produk');
		$this->db->join('k_user','transaksi.id_k_user = k_user.id_k_user');
		$this->db->join('bio_user','transaksi.id_k_user = bio_user.id_k_user');
		$this->db->join('f_produk','transaksi.id_produk = f_produk.id_produk');
		$this->db->join('konf_pembayaran','transaksi.id_transaksi = konf_pembayaran.id_transaksi','left');
		$this->db->where('transaksi.id_transaksi',$id_transaksi);
		return $this->db->get('transaksi')->row();	
	}
	function i_produk()
	{

		$id_user=$this->get_id_user_to_ins_produk();
		$harga=$this->input->post('harga',true);
		$id_produk=$this->input->post('id_produk',TRUE);
		$judul=$this->input->post('judul',TRUE);
		$isi=$this->input->post('isi',TRUE);
		$kategori=$this->input->post('kategori',TRUE);
		$time=date("Y-m-d");
		$data=array('harga'=>$harga,'id_k_user'=>$id_user,'id_produk'=>$id_produk,'judul'=>$judul,'isi'=>$isi,'kategori'=>$kategori,'time'=>$time);
		$this->db->insert('produk',$data);
	}
	function get_akun_admin($username){
		$this->db->where('username',$username);
		return $this->db->get('k_rumah')->row();
	}
	function join(){
		/*$this->db->where('id_payment',$id_payment);
		$this->db->join('product', 'product.id_product = payment.id_product');
		return $this->db->get('payment')->row();*/
	}
	function g_all_produk(){
		$this->db->group_by('produk.id_produk');	
		$this->db->join('f_produk', 'produk.id_produk = f_produk.id_produk','left');
		return $this->db->get('produk');
	}
	function select_all_produk()
	{
		
		$this->db->where('produk.id_produk','f_produk.id_produk');
		return $this->db->query('select * from produk, f_produk');
		//return $this->db->get('produk','f_produk');
	}
		function ins_k_user($id_k_user)
	{
		$username=$this->input->post('username',true);
		$email=$this->input->post('email',true);
		$password=$this->input->post('password',true);
		$data=array('username'=>$username,'email'=>$email,'password'=>$password,'id_k_user'=>$id_k_user);
		$this->db->insert('k_user',$data);
		$user = array(
	                   'username'  => $username,
	                    'user' => TRUE
	    );
		$this->session->set_userdata($user);

	}
	function ins_biouser($id_k_user){
		$data=array('id_k_user'=>$id_k_user);
		$this->db->insert('bio_user',$data);
	}

	function select_produk($id_produk){
		$this->db->where('id_produk',$id_produk);
		return $this->db->get('produk')->row();	
	}
	function e_produk()
	{
		$judul=$this->input->post('judul',TRUE);
		$isi=$this->input->post('isi',TRUE);
		$kategori=$this->input->post('kategori',TRUE);
		$id_produk=$this->input->post('id_produk',TRUE);
		$time=date("Y-m-d");
		$data=array('judul'=>$judul,'isi'=>$isi,'kategori'=>$kategori,'time'=>$time);
		$this->db->where('id_produk',$id_produk);
		$this->db->update('produk',$data);
	}
	function h_fotoproduk($id_produk)
	{
		$this->db->where('id_produk',$id_produk);
		$query=$this->db->get('f_produk');
		foreach($query->result() as $row)
		{
			unlink($row->foto);
		}
		$this->db->where('id_produk',$id_produk);
		$this->db->delete('f_produk');

	}
	function h_produk($id_produk){		
		
		$this->db->where('id_produk',$id_produk);
		$this->db->delete('produk');
	}
	
	function upl_produk()
	{
		for($i='1';$i<='3';$i++)
		{
			if($this->input->post('foto'.$i))
			{
				$id_produk=$this->input->post('id_produk',TRUE);
		        $config['upload_path']   = './asset/images/upload/';
		        $config['allowed_types'] = 'gif|jpg|png|bmp';
		        $config['max_size']      = '2000000';
		        $config['file_name']=url_title($this->input->post('foto'.$i));
		        
		        $this->load->library('upload',$config);
		        $this->upload->initialize($config);         
		        if($this->upload->do_upload('foto'.$i))
		        {
		            echo $this->upload->display_errors();
		        }
		        $path= $this->upload->file_name;
		        $foto.$i="asset/images/upload/".$path;

		        //$this->makunuser->updfoto($foto);
		        //echo $this->upload->display_errors();
		        $data=array('id_produk'=>$id_produk,'foto'=>$foto.$i);
				$this->db->insert('f_produk',$data);
			}
		}
	}
	public function page_user($num, $offset)
 	{
		 $this->db->order_by('username', 'ASC');
		$data = $this->db->get('k_user', $num, $offset);
		return $data->result();
	 }
	function upl_buku(){


		/////////////FUNCTION   UPLOAD BUKU  INI YANG BENAR    
        for($i=1;$i<=3;$i++){
        

		        $config['upload_path']   = './asset/images/upload/';
		        $config['allowed_types'] = 'gif|jpg|png|bmp';
		        $config['max_size']      = '2000000';
		        
		        $this->load->library('upload',$config);
		        $this->upload->initialize($config);
		        
        	if(!empty($_FILES['userfile'.$i]['name'])){
        		$this->upload->do_upload('userfile'.$i);
    			//$path=url_title($this->input->post('userfile'.$i));
    			$path = $this->upload->file_name;
    			$foto="asset/images/upload/".$path;
    			$id_produk=$this->input->post('id_produk',TRUE);
    			$data=array('id_produk'=>$id_produk,'foto'=>$foto);
    			$this->db->insert('f_produk',$data);
   
        	}
        }
	}
	function ubah_status($id_transaksi){
		$status=$this->input->post('status',true);
		$data=array('status'=>$status);
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->update('transaksi',$data);
		redirect('rumah/transaksi');
	}
	function hapus_transaksi($id_transaksi)
	{
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->delete('transaksi');
		redirect('rumah/transaksi');
	}
	function get_tentang()
	{
		return $this->db->get('about');
	}
	function del_tentang($id_about)
	{
		$this->db->where('id_about',$id_about);
		$row=$this->db->get('about')->row();
		unlink($row->foto);
		$this->db->where('id_about',$id_about);
		$this->db->delete('about');

	}
	function edit_tentang()
	{
		$id_about=$this->input->post('id_about');
		$nama_about=$this->input->post('nama_about');
		$deskripsi=$this->input->post('deskripsi');
		$data=array('nama_about'=>$nama_about,'deskripsi'=>$deskripsi);
		$this->db->where('id_about',$id_about);
		$this->db->update('about',$data);
	}
	function ins_tentang($foto)
	{
		$nama_about=$this->input->post('nama_about');
		$deskripsi=$this->input->post('deskripsi');
		$data=array('nama_about'=>$nama_about,'deskripsi'=>$deskripsi,'foto'=>$foto);
		$this->db->insert('about',$data);
	}
	function get_slide()
	{
		return $this->db->get('slide');
	}
	function edit_slide()
	{
		$id_slide=$this->input->post('id_slide');
		$judul_slide=$this->input->post('judul_slide');
		$isi_slide=$this->input->post('isi_slide');
		$data=array('judul_slide'=>$judul_slide,'isi_slide'=>$isi_slide);
		$this->db->where('id_slide',$id_slide);
		$this->db->update('slide',$data);
	}
	function upd_fotoslide($foto)
	{
		$id_slide=$this->input->post('id_slide');
		$data=array('foto_slide'=>$foto);
		$this->db->where('id_slide',$id_slide);
		$this->db->update('slide',$data);
	}
	function ins_bio_user($id_k_user)
	{
		$namal= $this->input->post('namal');
		$provinsi= $this->input->post('provinsi');
		$kab_kota= $this->input->post('kab_kota');
		$alamat= $this->input->post('alamat');
		$nohp= $this->input->post('nohp');
		$array1=explode("/",$this->input->post('tgl_lahir'));
		$bulan=$array1[0];
		$tanggal=$array1[1];
		$tahun=$array1[2];
		$tgl_lahir=$tahun."/".$bulan."/".$tanggal;
		$kodepos= $this->input->post('kodepos');
		$data=array('id_k_user'=>$id_k_user,'namal'=>$namal,'provinsi'=>$provinsi,'kab_kota'=>$kab_kota,'alamat'=>$alamat,'nohp'=>$nohp,'tgl_lahir'=>$tgl_lahir,
			'kodepos'=>$kodepos);
		$this->db->insert('bio_user',$data);
	}
	/*function upl_produk()
	{
		$id_produk=$this->input->post('id_produk',TRUE);
		if($this->input->post('foto'))
		{
			$config['upload_path']   = './asset/images/upload/';
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['max_size']           = '2000000';
			$config['file_name']=url_title($this->input->post('foto'));
				
			$this->upload->initialize($config);			
			if($this->upload->do_upload('foto'))
			{
				echo $this->upload->display_errors();
			}
			else{
				$this->upload->do_upload();
				$this->upload->data();
				$path= $this->upload->file_name;
				$foto=base_url()."asset/images/upload/".$path;
				$data=array('id_produk'=>$id_produk,'foto'=>$foto);
				$this->db->insert('f_produk',$data);
				redirect('rumah/produk');
			}
		}
	}*/

}