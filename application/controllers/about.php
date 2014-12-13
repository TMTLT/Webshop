<?php

    class About extends MY_Controller {

        public function __construct() {

            parent::__construct();
        }

        public function index() {
            $data          = $this->data;
            $data['title'] = 'Over ons';

            $this->load->template('about/index', $data);
        }

        public function FAQ() {
            $data          = $this->data;
            $data['title'] = 'FAQ';

            $this->load->template('about/faq', $data);
        }

        public function blog() {
            $data          = $this->data;
            $data['title'] = 'Blog';

            $this->load->template('about/blog', $data);
        }

    }