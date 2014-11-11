<?php

class MY_Controller extends CI_Controller {
    
    public function __construct() {
    	
    	parent::__construct();

    	$this->load->helper('url');
    	$uri = explode('/', uri_string());

    	$data = array(
    		"breadcrumbs"	=> array(	"controller"=>$uri[0], 
    									"page"		=>$uri[1]),
    		"loggedIn"		=> false,
    		"currentUser"	=> Null
    	);

    	$this->data = $data;
    }
}