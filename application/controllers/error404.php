<?php

class Error404 extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    {
    	$this->output->set_status_header('404');
        
        $data['title'] = '404';
        $data['heading'] = "Pagina niet gevonden";
        $data['message'] = "De opgevraagde pagina kon niet worden gevonden. Excuses voor het ongemak.<br/>U kunt het later opnieuw proberen of een andere pagina bezoeken";
		$this->load->view('templates/header', $data);
		$this->load->view('404');
		$this->load->view('templates/footer', $data);
    } 
}