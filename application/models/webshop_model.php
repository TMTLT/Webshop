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
}