<?php

class Webshop_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
	}

	public function GetCategories($parent = 0) {

		$this->db->select('id, titel, beschrijving');
        $this->db->from('categories');
        $this->db->where('parent', $parent);
        
        $query	 = $this->db->get();
        $rows	 = $query->result();

		return $rows;
	}

	public function GetProducts($category = '*') {

		$this->db->select('id, titel, beschrijving, prijs, categorie, aantal');
        $this->db->from('products');
        //$this->db->where('categorie', $category);
        
        $query	 = $this->db->get();
        $rows	 = $query->result_array();

		return $rows;
	}
}