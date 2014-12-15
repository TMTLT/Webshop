<?php

    class Home extends MY_Controller {

        public function index() {
            $data          = $this->data;
            $data['title'] = 'Home';
            $data['newestproducts'] = $this->Webshop_model->GetNewestProducts();
            $data['featuredproducts'] = $this->Webshop_model->GetRandomProducts();

            $this->load->template('home/index', $data);
        }
    }