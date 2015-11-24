<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rumah extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_rumah');
	}

	function ceklogin()
	{
		if($this->session->userdata('masuk'))
		{
			return true;
		}
		else{
			redirect('rumah/login');
		}
	}
	public function index()
	{
			$data['data']=$this->m_rumah->get_tentang();
			$data['data1']=$this->m_rumah->get_slide();
			$this->ceklogin();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('rumah/home',$data);
			if($this->input->post('update'))
			{
				$this->m_rumah->edit_tentang();
				redirect('rumah');
			}
			if($this->input->post('update_slide'))
			{
				$this->m_rumah->edit_slide();
				redirect('rumah');
			}
			if($this->input->post('update_fotoslide'))
			{
					$config['upload_path']   = './asset/images/slide/';
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
                    $foto="asset/images/slide/".$path;
                    echo $foto;
                   // $this->mhome->updfoto($foto);
                    echo $this->upload->display_errors();
                    //redirect('user/fotouser/'.$id_biodatauser);

		    		//$this->mhome->inskonfirmasipayment();
		    		$insert=$this->m_rumah->upd_fotoslide($foto);
					redirect('rumah');	
			}
			if($this->input->post('submit'))
			{
					$config['upload_path']   = './asset/images/tentang/';
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
                    $foto="asset/images/tentang/".$path;
                    echo $foto;
                   // $this->mhome->updfoto($foto);
                    echo $this->upload->display_errors();
                    //redirect('user/fotouser/'.$id_biodatauser);

		    		//$this->mhome->inskonfirmasipayment();
		    		$insert=$this->m_rumah->ins_tentang($foto);
					redirect('rumah');
	
			}
	}
	function login()
	{
		$data['notif']='';
		if($this->input->post('submit'))
		{
			$username=$this->input->post('username',TRUE);
			$password=$this->input->post('password',TRUE);
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('k_rumah');
			if($query->num_rows()==1)
			{
				$newdata = array(
	                   'username_rumah'  => $username,
	                    'masuk' => TRUE
	            );
				$this->session->set_userdata($newdata);
				redirect('rumah');
					
			}
			else{
				$data['notif']='Username atau Password salah';
			}			
		}	
		$this->load->view('rumah/login',$data);		
	}
	function transaksi()
	{
		$this->ceklogin();
		$data['data']=$this->m_rumah->join_transaksi();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rumah/transaksi_admin',$data);
		$this->load->view('template/footer');
	}
	function detail_transaksi($id_transaksi,$id_k_user)
	{
		$this->ceklogin();
		$data['transaksi']=$this->m_rumah->sel_join_transaksi($id_transaksi,$id_k_user);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rumah/det_transaksi_admin',$data);
		$this->load->view('template/footer');	
		if($this->input->post('konfirmasi'))
		{
			$id_transaksi=$this->input->post('id_transaksi');
			$this->m_rumah->ubah_status($id_transaksi);
		}
	}
	function testimonial()
	{
		$this->ceklogin();
		$data['data']=$this->m_rumah->get_testi_join_user();
		if($this->input->post('submit'))
		{
			$this->m_rumah->upd_testimonial();
			redirect('rumah/testimonial');
		}
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rumah/testi_admin',$data);
		$this->load->view('template/footer');
	}
	function produk()
	{
		$this->ceklogin();
		if(!isset($notif)){
			$data['notif']='';
		}
		else{
			$data['notif']=$notif;
		}
		$data['data']=$this->m_rumah->g_all_produk();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rumah/produk',$data);
		$this->load->view('template/footer');
	}
	function tambahproduk()
	{
		$this->ceklogin();
		if($this->input->post('submit'))
		{
			$this->m_rumah->i_produk();
//			$this->do_upload();
			$this->m_rumah->upl_buku();				
			
		}
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rumah/tambahproduk');
		$this->load->view('template/footer');
	}
	function editproduk($id_produk)
	{
		$this->ceklogin();
		if($this->input->post('edit'))
		{
			$this->m_rumah->e_produk();
		}
		$data['buku']=$this->m_rumah->select_produk($id_produk);	
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rumah/e_produk',$data);
		$this->load->view('template/footer');
	}
	function hapusproduk($id_produk)
	{
		$this->m_rumah->h_fotoproduk($id_produk);
		$this->m_rumah->h_produk($id_produk);
		$data['notif']="Produk Berhasil Dihapus";
		//redirect('rumah/produk',$data);
	}
	function del_tentang($id_about)
	{
		$this->m_rumah->del_tentang($id_about);
		redirect('rumah');
	}
	function hapus_transaksi($id_transaksi)
	{
		$this->m_rumah->hapus_transaksi($id_transaksi);
	}
	function akun($username)
	{
		$this->ceklogin();
		if($username=='')
		{
			redirect('rumah');
		}
		else
		{
			if($this->input->post('submit'))
			{
				$this->m_rumah->upd_akun_admin();
			}
			$data['akun']=$this->m_rumah->get_akun_admin($username);
			$data['user']=$this->m_rumah->get_all_user();	
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('rumah/akun_admin',$data);
			$this->load->view('template/footer');	
		}
			
	}
	function buat_page()
	{
		
	}
	function akunuser($id=NULL)
	{
		$this->ceklogin();
		if($this->input->post('submit'))
		{
			$data=date("Ymdmh");
        	$id_k_user=str_shuffle($data);
        	$this->m_rumah->ins_k_user($id_k_user);
        	$this->m_rumah->ins_biouser($id_k_user);
        	redirect('rumah/akunuser');
		}

		$jml = $this->db->get('k_user');

		//pengaturan pagination
		 $config['base_url'] = base_url().'rumah/akunuser';
		 $config['total_rows'] = $jml->num_rows();
		 $config['per_page'] = '4';
		 $config['first_page'] = 'Awal';
		 $config['last_page'] = 'Akhir';
		 $config['next_page'] = '&laquo;';
		 $config['prev_page'] = '&raquo;';

		//inisialisasi config

		
	   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
	   $config['full_tag_close'] ="</ul>";
	   $config['num_tag_open'] = '<li>';
	   $config['num_tag_close'] = '</li>';
	   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	   $config['next_tag_open'] = "<li>";
	   $config['next_tagl_close'] = "</li>";
	   $config['prev_tag_open'] = "<li>";
	   $config['prev_tagl_close'] = "</li>";
	   $config['first_tag_open'] = "<li>";
	   $config['first_tagl_close'] = "</li>";
	   $config['last_tag_open'] = "<li>";
	   $config['last_tagl_close'] = "</li>";

		 $this->pagination->initialize($config);

		//buat pagination
		 $data['halaman'] = $this->pagination->create_links();

		//tamplikan data
		 $data['query'] = $this->m_rumah->page_user($config['per_page'], $id);

		$data['data']=$this->m_rumah->get_all_user();	
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rumah/akun_user',$data);
		$this->load->view('template/footer');	
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('rumah/login');
	}
	 

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */