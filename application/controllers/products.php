<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index()
	{
		$this->load->view('home');
	}
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */