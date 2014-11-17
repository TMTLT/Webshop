<?php

    /**
     * Class Account
     */
    class Account extends MY_Controller {

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
        public function index() {
            redirect('/account/login');
        }

        /**
         *
         */
        public function login() {
            $data          = $this->data;
            $data['title'] = 'Login';

            $this->load->model('Account_model');

            print_r($this->Account_model->debug());

            $this->load->template('account/login', $data);
        }

        /**
         *
         */
        public function register() {
            $data          = $this->data;
            $data['title'] = 'Registreren';

            $this->load->model('Account_model');

            $this->load->template('account/create', $data);
        }

        /**
         *
         */
        public function create() {
            $data          = $this->data;
            $data['title'] = 'Maak een account';

            $this->load->helper('form');
            $this->load->template('account/create', $data);
        }

        /**
         *
         */
        public function createSubmit() {
            $data          = $this->data;
            $data['title'] = 'Maak een account';

            $this->load->model('Account_model');
            if ($this->Account_model->registerSubmit())
                // TODO: make the success page
                $this->load->template('account/created', $data);
            // TODO: error page/message
            redirect('/account/create');
        }

        /**
         *
         */
        public function checkMail() {
            $this->load->model('Account_model');
            return $this->Account_model->checkMail();
        }
    }