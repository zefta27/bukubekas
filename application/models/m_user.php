<?php
class M_user extends CI_Model {

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
	function g_by_session_produk()
	{
		$id_k_user=$this->session->userdata('id_k_user');
		$this->db->where('id_k_user',$id_k_user);
		return $this->db->get('produk');
	}
	function get_user()
	{
		$username=$this->session->userdata('username');
		$this->db->where('username',$username);
		return $this->db->get('k_user')->row();
	}
	function get_transaksi()
	{
		$id_k_user=$this->session->userdata('id_k_user');
		$this->db->where('id_k_user',$id_k_user);
		return $this->db->get('transaksi')->row();
	}
	function get_user_bio()
	{
		$id_k_user=$this->session->userdata('id_k_user');
		$this->db->where('id_k_user',$id_k_user);
		return $this->db->get('bio_user')->row();
	}
	function get_produk($id_produk)
	{
		$this->db->where('id_produk',$id_produk);
		return $this->db->get('produk')->row();
	}
	function ins_testimonial(){
		$id_testimonial=(rand(00000,99999));
		$tanggal=date("Y-m-d");
		$isi_testimonial=$this->input->post('isi_testimonial');
		$id_user=$this->session->userdata('id_k_user');
		$data=array('id_testimonial'=>$id_testimonial,'tanggal'=>$tanggal,
			'isi_testimonial'=>$isi_testimonial,'id_user'=>$id_user);
		$this->db->insert('testimonial',$data);
	}
	function ins_biodata(){
		$id_k_user=$this->session->userdata('id_k_user');
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
	function upd_user(){
		$username=$this->input->post('username',true);
		$email=$this->input->post('email',true);
		$password=$this->input->post('password',true);
		$data=array('username'=>$username,'password'=>$password,'email'=>$email);
		$user_session=$this->session->userdata('username');
		$this->db->where('username',$user_session);
		$this->db->update('k_user',$data);
		$newdata = array(
	                   'username'  => $username,
	                    'masuk' => TRUE
	            );
				$this->session->set_userdata($newdata);
	}
	function i_produk()
	{
		$id_produk=$this->input->post('id_produk',TRUE);
		$judul=$this->input->post('judul',TRUE);
		$isi=$this->input->post('isi',TRUE);
		$kategori=$this->input->post('kategori',TRUE);
		$time=date("Y-m-d");
		$data=array('id_produk'=>$id_produk,'judul'=>$judul,'isi'=>$isi,'kategori'=>$kategori,'time'=>$time);
		$this->db->insert('produk',$data);
	}
	function g_produk(){
		return $this->db->get('produk');
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
	function h_produk($id_produk){
		$this->db->where('id_produk',$id_produk);
		$this->db->delete('produk');
	}
	function upd_foto_bio_user(){
				
				$id_k_user=$this->session->userdata('id_k_user');
				$username=$this->session->userdata('username');
		        $config['upload_path']   = './asset/images/upload/user';
		        $config['allowed_types'] = 'gif|jpg|png|bmp';
		        $config['max_size']      = '2000000';
		        $config['file_name']=url_title($this->input->post('foto_user'));
		        
		        $this->load->library('upload',$config);
		        $this->upload->initialize($config);         
		        if($this->upload->do_upload('foto_user'))
		        {
		            echo $this->upload->display_errors();
		        }
		        $path= $this->upload->file_name;
		        $foto="asset/images/upload/user/".$path;

		        //$this->makunuser->updfoto($foto);
		        //echo $this->upload->display_errors();
		    	
		        $data=array('foto_user'=>$foto);
				$this->db->where('id_k_user',$id_k_user);
				$this->db->update('bio_user',$data);
				$user = array(
	                   'username'  => $username,
	                   'id_k_user' => $id_k_user,
	                   'foto_user'=>$foto,
	                    'user' => TRUE
	            );
				$this->session->set_userdata($user);
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