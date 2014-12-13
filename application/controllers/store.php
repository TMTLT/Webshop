<?php

    require_once(APPPATH . "classes/payme.php");

    class Store extends MY_Controller {

        public function __construct() {

            parent::__construct();
        }

        public function index() {
            $data = $this->data;

            $data['title']    = 'Store';
            $data['products'] = $this->Webshop_model->GetProducts();

            $this->load->template('store/index', $data);
        }

        public function category($category) {
            $data = $this->data;

            $data['title']    = 'Category - ' . urldecode($category);
            $data['products'] = $this->Webshop_model->GetProducts($category);

            $this->load->template('store/index', $data);
        }

        /* Checkout's default progress is 1, cart overview. Set to prevent PHP warnings.*/
        public function checkOut($progress = 1) {

            $data          = $this->data;
            $data['title'] = 'Checkout';

            switch($progress){
                /* Step 1 : Cart overview (also default) */
                case 1:
                    $data['title'] = 'Checkout' . $progress;
                    $this->load->template('store/checkout', $data);
                    break;
                /* Step 2 : Choosing payment options */
                case 2:
                    $data['title'] = 'Checkout' . $progress;
                    $this->load->template('store/checkout', $data);
                    break;
                /* Default : Cart overview */
                default:
                    $data['title'] = 'Checkout' . $progress;
                    $this->load->template('store/checkout', $data);
            }
        }

        /**
         *
         */
        public function addtocart() {
            $this->load->library('cart');

            $id = $this->input->post('id');

            $flag = true;

            foreach($this->cart->contents() as $item) {

                if($item['id'] == $id) {
                    $qtyn = $item['qty'] + 1;

                    $data = array(
                        'rowid' => $item['rowid'],
                        'qty'   => $qtyn
                    );

                    $this->cart->update($data);
                    $flag = false;
                    break;
                }
            }

            if($flag) {
                $item = $this->Webshop_model->GetProduct($id);

                $data = array(
                    'id'    => $id,
                    'qty'   => 1,
                    'price' => $item['prijs'],
                    'name'  => $item['titel'],
                    'description' => $item['beschrijving']
                );
                $this->cart->insert($data);

            }
        }

        /**
         *
         */
        public function cartcontent() {
            $this->load->library('cart');
            echo json_encode($this->cart->contents());
        }
    }