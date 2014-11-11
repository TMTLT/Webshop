<?php


class Account extends MY_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		redirect('/account/login');
	}

	public function login() {
		$data['title'] = 'Login';

		$this->load->model('Account_model');
		
		print_r($this->Account_model->debug());
		
		$this->load->template('account/login', $data);
	}

	public function register() {
		$data = $this->data;
		$data['title'] = 'Registreren';

		$this->load->model('Account_model');
		
		$this->load->template('account/create', $data);
	}

	public function create() {
		$data = $this->data;
		$data['title'] = 'Maak een account';
		
		$this->load->template('account/create', $data);
	}
}