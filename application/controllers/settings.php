<?php

    /**
     * Class Settings
     */
    class Settings extends MY_Controller {

        /**
         *
         */
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');

            if(!$this->session->userdata('admin')) {
                redirect('/home/index');
            }
        }

        /**
         *
         */
        public function addproduct() {
            $data          = $this->data;
            $data['title'] = 'Admin paneel';

            $this->load->helper('form');
            $this->load->model('Settings_model');

            $this->load->template('settings/addproduct', $data);
        }

        /**
         *
         */
        public function addproductpost() {
            $this->load->model('Settings_model');

            return $this->Settings_model->addproduct();
        }

    }