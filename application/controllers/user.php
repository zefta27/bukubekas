<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_rumah');
		$this->load->model('m_home');
	}
 function index()
	{
		if($this->session->userdata('user'))
		{
			$this->gantifoto();
			if($this->input->post('submit_kontak'))
			{
				$this->m_home->ins_kontak();
			}
			if($this->input->post('submit_testimonial'))
			{
				$this->m_user->ins_testimonial();
			}
			$data['user']=$this->m_user->get_user();
			$data['user_bio']=$this->m_user->get_user_bio();
			$this->load->view('template/user_header');
			$this->load->view('template/user_sidebar');
			$this->load->view('user/user_home',$data);
			$this->load->view('template/user_footer');
		}
		else{
			redirect('home/login');
		}	
	}
	function gantifoto()
	{	
		$foto_user=$this->session->userdata('foto_user');
		if($this->input->post('submit_foto'))
		{
			$this->m_user->upd_foto_bio_user();
		}
	}
	function cekuser()
	{
		if($this->session->userdata('user')==true)
		{
			return true;
		}
		else{
			redirect('home/login');
		}
	}
	
	function akun($username)
	{		
			$this->cekuser();
			$data['user']=$this->m_user->get_user();
			$this->load->view('template/user_header');
			$this->load->view('template/user_sidebar');
			$this->load->view('user/user_akun',$data);
			$this->load->view('template/user_footer');
			if($this->input->post('submit'))
			{
				$this->m_user->upd_user();
			}
	}
	function biodata($username)
	{
			$this->cekuser();
			if($this->input->post('submit'))
			{
				$this->m_user->ins_biodata();
			}
			$data['user_bio']=$this->m_user->get_user_bio();
			$this->load->view('template/user_header');
			$this->load->view('template/user_sidebar');
			$this->load->view('user/user_biodata',$data);
			$this->load->view('template/user_footer');
	}
	function produk()
	{
			if($this->input->post('submit'))
			{
				$this->m_rumah->i_produk();
	//			$this->do_upload();
				$this->m_rumah->upl_buku();				
				
			}
			$this->cekuser();
			$data['data']=$this->m_user->g_by_session_produk();
			$this->load->view('template/user_header');
			$this->load->view('template/user_sidebar');
			$this->load->view('user/user_produk',$data);
			$this->load->view('template/user_footer');
	}
	function transaksi()
	{
			$this->cekuser();
			$data['transaksi']=$this->m_user->get_transaksi();
			$data['user_bio']=$this->m_user->get_user_bio();
			
			if($data['transaksi']!=NULL){
				$id_produk=$data['transaksi']->id_produk;
				$data['produk']=$this->m_user->get_produk($id_produk);	
			}
			$this->load->view('template/user_header');
			$this->load->view('template/user_sidebar');
			$this->load->view('user/user_transaksi',$data);
			$this->load->view('template/user_footer');
	}
	function konfirmasi_pembayaran()
	{
		$this->cekuser();
		$data['data']=$this->m_user->g_produk();
		$this->load->view('template/user_header');
		$this->load->view('template/user_sidebar');
		$this->load->view('user/user_produk',$data);
		$this->load->view('template/user_footer');	
	}
	function tambahproduk()
	{

		$this->cekuser();
		if($this->input->post('submit'))
		{
				$this->m_rumah->i_produk();
	//			$this->do_upload();
				$this->m_rumah->upl_buku();
		}
		$this->load->view('template/user_header');
		$this->load->view('template/user_sidebar');
		$this->load->view('user/user_tambahproduk');
		$this->load->view('template/user_footer');		
	}
	function keluar()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */