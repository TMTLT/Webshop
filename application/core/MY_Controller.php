<?php

    class MY_Controller extends CI_Controller {

        public function __construct() {

            parent::__construct();

            $this->load->helper('url');
            $uri = explode('/', uri_string());

            $this->load->library('session');

            $userid = $this->session->userdata('userid');

            if(!empty($userid)) {
                $data = array(
                    'loggedin'  => true,
                    'userid'    => $this->session->userdata('id'),
                    'firstname' => $this->session->userdata('firstname'),
                    'affix'     => $this->session->userdata('affix'),
                    'lastname'  => $this->session->userdata('lastname'),
                    'email'     => $this->session->userdata('email'),
                    'admin'     => $this->session->userdata('admin')
                );
            } else {
                $data = array(
                    'loggedin' => false
                );
            }

            $this->load->database();
            $this->load->model('Webshop_model');

            $data['categories'] = $this->Webshop_model->GetCategories();

            $this->data = $data;
        }
    }