<?php

require_once(APPPATH . "classes/payme.php");

class Store extends MY_Controller {
	
	public function __construct() {

		parent::__construct();
	}

	public function index() {
		$data = $this->data;
		$data['title'] = 'Store';
		
		$this->load->template('store/index', $data);
	}

	public function category() {
		$data = $this->data;
		$data['title'] = 'Catogory';
		
		$this->load->template('store/index', $data);
	}

	public function checkOut() {

		$data = $this->data;
		$data['title'] = 'Checkout';
		
		$this->load->template('store/checkout', $data);
	}
}