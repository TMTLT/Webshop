<?php
class contact_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function set_bericht($berichtdata)
	{
		$this->load->helper('url');
		
		$str = $this->db->insert_string('contact', $berichtdata);
            $res = $this->db->query($str);
			
		return $res;
	}
}