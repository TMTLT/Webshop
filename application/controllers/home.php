<?php

class Home extends MY_Controller{

	public function index()
	{	
		$data = $this->data;
		$data['title'] = 'Home';
		
		$this->load->template('home/index', $data);
	}
}