<?php 
class Contact extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
	}
	
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$data = $this->data;
		$data['title'] = 'Contact';
		
		$this->load->template('contact/index', $data);
			
	}
	
	public function create()
	{
		$data = $this->data;
		$data['title'] = 'Contact';
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('naam', 'Naam', 'required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|');
		$this->form_validation->set_rules('bericht', 'Bericht',  'required|min_length[5]');
		
		$bericht_data = array(
			'naam' => $this->input->post('naam'),
			'email' => $this->input->post('email'),
			'bericht' => $this->input->post('bericht')
		);
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->template('contact/index', $data);
		}
		else
		{
			$this->load->model('contact_model');
			if($this->contact_model->set_bericht($bericht_data))
				$this->load->template('contact/formsucces', $data);
			else
				$this->load->template('contact/index', $data);
		}
	}
}
