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

            $loggedIn = $data['loggedin'];

            switch($progress) {

                /* Step 1 : Cart overview (also default) */
                case 1:
                    $data['title'] = 'Checkout' . $progress;
                    $this->load->template('store/checkout', $data);
                    break;

                /* Prompt for login if !logged in*/
                case 2:
                    /* Libs : */
                    $this->load->library('cart');
                    $cartContent = $this->cart->contents();

                    if(empty($cartContent))
                        redirect('/store', 'refresh');//Very not cool fix but it works

                    if(!$loggedIn){
                        redirect('/account/login', 'refresh');
                    }else{
                        redirect('/store/checkout/3', 'refresh');
                    }
                    break;
                /* Step 3 : Choosing payment options */
                case 3:
                    /* Libs : */
                    $this->load->library('cart');
                    $cartContent = $this->cart->contents();

                    if(empty($cartContent))
                        redirect('/store', 'refresh');//Very not cool fix but it works

                    if(!$loggedIn)
                        redirect('/account/login', 'refresh');

                    $data['title'] = 'Checkout' . $progress;

                    $userid = 24;

                    $result = $this->Webshop_model->CreateOrder($cartContent, $userid);

                    /* Just in case your numeric orderid suddenly is false in text. */
                    if($result === false) {
                        //Break code.
                        redirect('/store/checkout/1');
                    } else {
                        redirect('/store/pay/' . $result); //Implement unreadable orderID (hash hex with userid?)
                    }
                    break;
                /* Default : Cart overview */
                default:
                    $data['title'] = 'Checkout' . $progress;
                    $this->load->template('store/checkout', $data);
            }
        }

        public function cancel($id){

            $data          = $this->data;
            $data['title'] = 'Checkout';

            $this->load->model('Payme_model');
            $transID = $this->input->get('transid', false);

            /* Cancel order */
            $transactionDetails = $this->Payme_model->GetTransactionStatus($transID);

            if(!empty($transactionDetails)){

                $status = PayMe::GetTransactionStatus($transactionDetails['transid'], $transactionDetails['hash']);

                if($status['status'] == 'fail'){
                    $this->Webshop_model->CancelTransaction($status['transid']);
                    $status = 'Cancelled payment';
                }
                else{
                    $status = 'Payment did not fail';
                }
            }else{

                $status = 'Couldn\'t find payment';
            }

            $data['status']['status'] = $status;
            $this->load->template('store/status', $data);
        }

        public function status($id){

            $data          = $this->data;
            $data['title'] = 'Checkout';

            /* View payment status */
            $this->load->model('Payme_model');
            $transID = $this->input->get('transid', false);

            /* Cancel order */
            $transactionDetails = $this->Payme_model->GetTransactionStatus($transID);

            if(!empty($transactionDetails)){

                $status = PayMe::GetTransactionStatus($transactionDetails['transid'], $transactionDetails['hash']);

                if($status['status'] == 'success'){
                    $this->Webshop_model->SetOrderStatus($status['transid'], 1);
                    $this->load->library('cart');
                    $this->cart->destroy();
                }
            }

            $data['status'] = $status;
            $this->load->template('store/status', $data);
        }

        public function pay($id) {

            $data          = $this->data;
            $data['title'] = 'Payment';

            if($this->input->server('REQUEST_METHOD') == 'POST'){
                $this->load->model('Payme_model');

                /* Start transaction */
                $amount      = $this->Webshop_model->GetOrderTotal($id);
                $bankID      = $this->input->post('bank');
                $purchaseID  = $id;
                $description = 'Uw order bij Mos OrderNo '.$id;
                $returnURL   = 'http://tmtl-06.ict-lab.nl/store/status/'.$id;
                $failURL     = 'http://tmtl-06.ict-lab.nl/store/cancel/'.$id;

                $data = PayMe::StartTransaction($amount, $bankID, $purchaseID, $description, $returnURL, $failURL);

                $this->Payme_model->SaveTransaction($data['transid'], $data['sha1']);
                if($this->Webshop_model->AddTransaction($id, $data['transid']))
                    redirect($data['fwdurl']);
                else
                    exit('Something went seriously wrong');
            }else{
                /* Display orderdetails */
                $orderDetails = $this->Webshop_model->GetOrderDetails($id);
                $total = $this->Webshop_model->GetOrderTotal($id);;

                $data['orderDetails'] = $orderDetails;
                $data['orderDetails']['total'] = $total;
                $data['payme']['banklist'] = PayMe::GetBankList();

                $this->load->template('store/payment', $data);
            }
        }

        /**
         *
         */
        public function addtocart() {
            $this->load->library('cart');

            $id  = $this->input->post('id');
            $qty = $this->input->post('qty');

            $flag = true;

            foreach($this->cart->contents() as $item) {
                if($item['id'] == $id) {
                    $qtyn = $item['qty'] + $qty;

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
                print_r($item);echo($item);
                $data = array(
                    'id'          => $id,
                    'qty'         => $qty,
                    'price'       => $item['prijs'],
                    'name'        => $item['titel'],
                    'description' => $item['beschrijving'],
                    'image'       => $item['image']
                );
                $this->cart->insert($data);
            }
        }

        /**
         *
         */
        public function removeitem() {
            $this->load->library('cart');

            $id = $this->input->post('id');

            foreach($this->cart->contents() as $item) {

                if($item['id'] == $id) {
                    $data = array(
                        'rowid' => $item['rowid'],
                        'qty'   => 0
                    );

                    $this->cart->update($data);
                    break;
                }
            }
        }

        /**
         *
         */
        public function itemamount() {
            $this->load->library('cart');

            $id  = $this->input->post('id');
            $qty = $this->input->post('qty');

            foreach($this->cart->contents() as $item) {

                if($item['id'] == $id) {
                    $data = array(
                        'rowid' => $item['rowid'],
                        'qty'   => $qty
                    );

                    $this->cart->update($data);
                    break;
                }
            }
        }

        /**
         *
         */
        public function cartcontent() {
            $this->load->library('cart');
            echo json_encode($this->cart->contents());
        }

        /**
         *
         */
        public function itemdetails() {
            $id = $this->input->post('id');

            echo json_encode($this->Webshop_model->GetProduct($id));
        }

        /**
         *
         */
        public function onsale() {
            echo json_encode($this->Webshop_model->GetSaleProducts());
        }

    }