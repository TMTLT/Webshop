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
            $data['categories']   = $this->Webshop_model->GetCategories(-1);

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

        /**
         *
         */
        public function addcategory() {
            $data          = $this->data;
            $data['title'] = 'Admin paneel';
            $data['categories']   = $this->Webshop_model->GetCategories();

            $this->load->helper('form');
            $this->load->model('Settings_model');

            $this->load->template('settings/addcategory', $data);
        }

        /**
         *
         */
        public function addcategorypost() {
            $this->load->model('Settings_model');

            return $this->Settings_model->addcategory();
        }

        /**
         *
         */
        public function addsale() {
            $data          = $this->data;
            $data['title'] = 'Admin paneel';
            $data['products']   = $this->Webshop_model->GetProducts();

            $this->load->helper('form');
            $this->load->model('Settings_model');

            $this->load->template('settings/addsale', $data);
        }

        /**
         *
         */
        public function addsalepost() {
            $this->load->model('Settings_model');

            return $this->Settings_model->addsale();
        }

    }