<?php

class Home extends CI_Controller{

	public function index()
	{
		$data['title'] = 'Home';
	
		$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/footer', $data);
	}
	
	public function view($page='index'){
		
		/*
		if(!file_exists(APPPATH.'/views/home/'.$page.'.php'))
			show_404();
		*/
		$data['title'] = ucfirst($page);
		
		//$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		//$this->load->view('templates/footer', $data);
	}
	
}