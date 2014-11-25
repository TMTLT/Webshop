<?php

class MY_Controller extends CI_Controller {

	public function __construct() {

		parent::__construct();
		
		$this->load->helper('url');
		$uri = explode('/', uri_string());

		$data = array(
			"loggedIn"      => true,
			"currentUser"   => Null
		);

		$this->load->database();
		$this->load->model('Webshop_model');

		$data['categories'] = $this->Webshop_model->GetCategories();

		$this->data = $data;
	}
}