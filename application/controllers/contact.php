<?php 
class Contact extends MY_Controller{

	public function index()
	{
		$data = $this->data;
		$data['title'] = 'Contact';
		
		$this->load->template('contact/index', $data);
	}
}