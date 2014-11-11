<?php 
class Contact extends CI_Controller{

	public function index()
	{
		$data['title'] = 'Contact';
		
		$this->load->view('templates/header', $data);
		$this->load->view('contact/index');
		$this->load->view('templates/footer', $data);
	}
}