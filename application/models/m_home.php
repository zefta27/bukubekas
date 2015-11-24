<?php
class M_home extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	function g_select_produk($id_produk){
		$this->db->where('produk.id_produk',$id_produk);	
		$this->db->join('f_produk', 'produk.id_produk = f_produk.id_produk','left');
		return $this->db->get('produk')->row();	
	}	
	function g_select_all_image_produk($id_produk){
		$this->db->where('produk.id_produk',$id_produk);	
		$this->db->join('f_produk', 'produk.id_produk = f_produk.id_produk','left');
		return $this->db->get('produk');	
	}
	function get_testimonial()
	{
		$this->db->where('tampil','1');
		$this->db->join('k_user','testimonial.id_user = k_user.id_k_user');
		return $this->db->get('testimonial');
	}
	function join_testi_biouser()
	{
		$this->db->where('tampil','1');
		$this->db->join('bio_user','testimonial.id_user = bio_user.id_k_user');
		$this->db->join('k_user','testimonial.id_user = k_user.id_k_user');
		return $this->db->get('testimonial');
	}
	function ins_kontak()
	{
		$date_kontak=date("Y-m-d");
		$email=$this->input->post('email',true);
		$namal=$this->input->post('namal',true);
		$subjek=$this->input->pot('subjek',true);
		$isi=$this->input->post('isi',true);
		$data=array('email'=>$email,'namal'=>$namal,'subjek'=>$subjek,'date_kontak'=>$date_kontak);
		$this->db->insert('kontak',$data);

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
	function upd_bio_user($id_k_user)
	{
		$namal=$this->input->post('namal',true);
		$provinsi=$this->input->post('provinsi',true);
		$kab_kota=$this->input->post('kab_kota',true);	
		$alamat=$this->input->post('alamat',true);
		$nohp=$this->input->post('nohp',true);
		$kodepos=$this->input->post('kodepos',true);
		$data=array(
			'namal'=>$namal,
			'provinsi'=>$provinsi,
			'kab_kota'=>$kab_kota,
			'alamat'=>$alamat,
			'nohp'=>$nohp,
			'kodepos'=>$kodepos,
			'id_k_user'=>$id_k_user);
		$this->db->where('id_k_user',$id_k_user);
		$this->db->update('bio_user',$data);

	}
	function ins_bio_user($id_k_user)
	{
		
		$namal=$this->input->post('namal',true);
		$provinsi=$this->input->post('provinsi',true);
		$kab_kota=$this->input->post('kab_kota',true);	
		$alamat=$this->input->post('alamat',true);
		$nohp=$this->input->post('nohp',true);
		$kodepos=$this->input->post('kodepos',true);
		$data=array(
			'namal'=>$namal,
			'provinsi'=>$provinsi,
			'kab_kota'=>$kab_kota,
			'alamat'=>$alamat,
			'nohp'=>$nohp,
			'kodepos'=>$kodepos,
			'id_k_user'=>$id_k_user);
		$this->db->insert('bio_user',$data);
	}
	function direct_ins_pesan($id_produk){
		$date1=date("YmdmY");
        $id_transaksi=str_shuffle($date1);
        $date_transaksi=date("Y-m-d");
		$id_k_user=$this->session->userdata('id_k_user');
		$data=array(
			'id_transaksi'=>$id_transaksi,
			'id_k_user'=>$id_k_user,
			'id_produk'=>$id_produk,
			'date_transaksi'=>$date_transaksi
			);
		$this->db->insert('transaksi',$data);
		redirect('home/transaksi/'.$id_produk);
	}
	function pesan($id_produk,$id_k_user)
	{
		$date1=date("YmdmY");
        $id_transaksi=str_shuffle($date1);
        $date_transaksi=date("Y-m-d");
		
		$data=array(
			'id_transaksi'=>$id_transaksi,
			'id_k_user'=>$id_k_user,
			'id_produk'=>$id_produk,
			'date_transaksi'=>$date_transaksi);
		$this->db->insert('transaksi',$data);
		redirect('home/transaksi/'.$id_transaksi);
	}
	function g_sel_image_produk($id_produk){
		$this->db->group_by('produk.id_produk');	
		$this->db->where('produk.id_produk',$id_produk);
		$this->db->join('f_produk', 'produk.id_produk = f_produk.id_produk','left');
		return $this->db->get('produk')->row();
	}
	function g_bio_user_pesan($id_produk)
	{
		$this->db->join('k_user','produk.id_k_user = id_k_user.produk.id_k_user','left');
		return $this->db->get('produk')->row();
	}
	function g_transaksi($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		return $this->db->get('transaksi')->row();
	
	}
	function g_bio_user($id_k_user)
	{
		$this->db->where('id_k_user',$id_k_user);
		return $this->db->get('bio_user')->row();
	}
	function explode_tanggal($waktu)
	{
		$array=explode("/",$waktu);
		$bulan=$array[0];
		$tanggal=$array[1];
		$tahun=$array[2];
		$hasil = $tahun."/".$bulan."/".$tanggal;
		return $hasil;
	}
	function upd_transaksi_status($no_transaksi)
	{
		$data=array('status'=>'1');
		$this->db->where('id_transaksi',$no_transaksi);
		$this->db->update('transaksi',$data);
	}
	function ins_konfirmasi_pembayaran($foto)
	{
		$waktu=$this->input->post('t_transfer',true);	
		$t_transfer=$this->explode_tanggal($waktu);
		$no_transaksi=$this->input->post('no_transaksi',true);
		$bank_tujuan=$this->input->post('bank_tujuan',true);	
		$bank_anda=$this->input->post('bank_anda',true);
		$no_rek=$this->input->post('no_rek',true);
		$atas_nama=$this->input->post('atas_nama',true);
		$m_transfer=$this->input->post('m_transfer',true);
		$n_transfer=$this->input->post('n_transfer',true);
		$date=date("Y-m-d");
		$data=array(
			'id_transaksi'=>$no_transaksi,
			'bank_tujuan'=>$bank_tujuan,
			'bank_anda'=>$bank_anda,
			'no_rek'=>$no_rek,
			'atas_nama'=>$atas_nama,
			'b_transfer'=>$foto,
			'm_transfer'=>$m_transfer,
			'n_transfer'=>$n_transfer,
			't_transfer'=>$t_transfer,
			'date'=>$date
			);
		$insert=$this->db->insert('konf_pembayaran',$data);
		$this->upd_transaksi_status($no_transaksi);
		if($insert)
		{
			return true;
		}	
	}
	function cari()
	{
		$cari=$this->input->post('cari');
		$this->db->or_like('judul',$cari);
		$this->db->group_by('produk.id_produk');	
		$this->db->join('f_produk', 'produk.id_produk = f_produk.id_produk','left');
		return $this->db->get('produk');		
	}
	function linkterkait(){
		$this->db->order_by('RAND()');
		$this->db->limit(10);
		$this->db->group_by('produk.id_produk');	
		$this->db->join('f_produk', 'produk.id_produk = f_produk.id_produk','left');
		return $this->db->get('produk');
	}
	function linkterkait1(){
		$this->db->order_by('RAND()');
		$this->db->limit(9);
		$this->db->group_by('produk.id_produk');	
		$this->db->join('f_produk', 'produk.id_produk = f_produk.id_produk','left');
		return $this->db->get('produk');
	}
	function get_slide(){
		return $this->db->get('slide');
	}
	function get_about()
	{
		return $this->db->get('about');
	}
	function g_lokasi()
	{
		return $this->db->get('inf_lokasi');
		//return $this->db->query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
	}
	function get_kota($q)
	{
		return $this->db->query("SELECT * FROM inf_lokasi where lokasi_propinsi=$q and lokasi_kecamatan=0 and lokasi_kelurahan=0 and lokasi_kabupatenkota!=0 order by lokasi_nama");
	}
}
