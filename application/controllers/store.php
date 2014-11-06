<?php

require_once(APPPATH . "classes/payme.php");

class Store extends CI_Controller{

	public function index()
	{
		$data['title'] = 'Store';
		
		$this->load->view('templates/header', $data);
		$this->load->view('store/index');
		$this->load->view('templates/footer', $data);
	}

	public function checkOut(){

		$data['title'] = 'Checkout';
		
		$this->load->view('templates/header', $data);
		$this->load->view('store/checkout');
		$this->load->view('templates/footer', $data);
	}
}