<?php

require_once(APPPATH . "classes/payme.php");

class Store extends MY_Controller{

	public function index()
	{
		$data = $this->data;
		$data['title'] = 'Store';
		
		$this->load->template('store/index', $data);
	}

	public function checkOut(){
		$data = $this->data;
		$data['title'] = 'Checkout';
		
		$this->load->template('store/checkout', $data);
	}
}