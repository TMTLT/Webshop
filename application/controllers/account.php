<?php


class Account extends CI_Controller{

	public function index()
	{
		$data['title'] = 'Store';
		
		$this->load->view('templates/header', $data);
		$this->load->view('account/indexs');
		$this->load->view('templates/footer', $data);
	}

	public function login(){

		$data['title'] = 'Login';
		
		$this->load->view('templates/header', $data);
		$this->load->view('account/login');
		$this->load->view('templates/footer', $data);
	}

	public function create(){

		$data['title'] = 'Create';
		
		$this->load->view('templates/header', $data);
		$this->load->view('account/create');
		$this->load->view('templates/footer', $data);
	}
}