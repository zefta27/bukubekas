<?php
class Product_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	function get_All()
	{
		return array("Pempek Lenjer","Pempek Kulit","Pempek Telor Kecil");
	}
	function getAll()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$q = $this->db->get();
		return $q;
	}
}