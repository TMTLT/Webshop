<?php


class Account extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		redirect('/account/login');
	}

	public function login(){

		$data['title'] = 'Login';
		
		$this->load->view('templates/header', $data);
		$this->load->view('account/login');
		$this->load->view('templates/footer', $data);
	}

	public function create(){

		$data['title'] = 'Maak een account';
		
		$this->load->view('templates/header', $data);
		$this->load->view('account/create');
		$this->load->view('templates/footer', $data);
	}
}