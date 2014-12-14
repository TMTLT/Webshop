<?php

    /**
     * Class Settings_model
     */
    class Settings_model extends CI_Model {
        /**
         *
         */
        public function __construct() {
            $this->load->database();
        }

        /**
         * @return bool
         *
         */
        public function admin() {
            if ($this->session->userdata('admin')) {
                return true;
            } else {
                return false;
            }
        }

        public function addproduct() {
            $name        = $this->input->post('name');
            $price       = $this->input->post('price');
            $category    = $this->input->post('category');
            $description = $this->input->post('description');

            if(preg_match('/^([1-9][0-9]*|0)(\,[0-9]{2})?$/', $price)) {
                echo "klopt <br />";
            } else {
                echo "klopt NIET <br />";
            }

            echo($name . "<br />" . $price . "<br />" . $category . "<br />" . $description . "<br />");
        }
    }