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
        }

        /**
         *
         */
        public function admin() {
            $data          = $this->data;
            $data['title'] = 'Admin paneel';

            $this->load->helper('form');
            $this->load->model('Settings_model');

            if(!$this->Settings_model->admin() == true) {
                redirect('/home/index');
            }

            $this->load->template('settings/admin', $data);
        }

        /**
         *
         */
        public function addproduct() {
            $this->load->model('Settings_model');

            return $this->Settings_model->addproduct();
        }

    }