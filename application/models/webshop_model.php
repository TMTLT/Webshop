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

	public function GetProducts($category = 'all') {
		
		if('all' != $category){
			
			$this->db->select('id, titel, parent, beschrijving');
			$this->db->from('categories');

			$this->db->where('titel', urldecode($category));
		
			$query	 = $this->db->get();
			$rows	 = $query->result_array();

			if(count($rows) > 0)
				$result  = $rows[0];
		}

		$this->db->select('id, titel, beschrijving, prijs, categorie, aantal');
        $this->db->from('products');

        /* By default Codeigniter selects all. If we have a category set we set the where condition. */
        if('all' != $category && isset($result['id']))
        	$this->db->where('categorie', $result['id']);
        
        $query	 = $this->db->get();
        $rows	 = $query->result_array();

		return $rows;
	}
}