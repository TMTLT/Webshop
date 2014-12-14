<?php

    class Webshop_model extends CI_Model {

        public function __construct() {

            parent::__construct();
        }

        public function GetOrderDetails($id){

            /* Get order */
            $this->db->select('orderid, userid, transid');
            $this->db->from('orders');
            $this->db->where('orderid', $id);
            $this->db->limit('1');

            $query = $this->db->get();
            $rows  = $query->result_array();

            $relevant = $rows[0];

            /* Get products related to order*/
            $this->db->select('orderid, productid, quantity, products.titel, products.beschrijving');
            $this->db->from('orderedproducts');
            $this->db->join('products', 'orderedproducts.productid = products.id', 'left outer');
            $this->db->where('orderid', $id);

            $query = $this->db->get();
            $products  = $query->result_array();

            print($this->db->last_query());
            
            $relevant['products'] = $products;

            return $relevant;
        }

        public function CreateOrder($products, $userid){

            /* Just create a near empty record. */
            $orderData = array(
                'userid'=>$userid
            );
            /* Create orderID*/
            $result      = $this->db->insert('orders', $orderData);
            $orderid     = $this->db->insert_id();

            /* Break in case of failed order creation*/
            if(!$result)

                //Break
                return false;
            else{

                /* Add products to order */
                foreach($products as $product){

                    $data[] = array(
                        'orderid'   =>$orderid,
                        'productid' =>$product['id'],
                        'quantity'  =>$product['qty'],
                        'price'     =>$product['price']
                    );
                }

                $batchResult = $this->db->insert_batch('orderedproducts', $data);

                if($batchResult){

                    /* Everything worked!*/
                    return $orderid;
                }else{
                    /* Something failed, remove order, return false */
                    $this->db->where('userid', $userid);
                    $this->db->delete('orders');

                    return false;
                }
            }
        }

        public function GetCategories($parent = 0) {

            $this->db->select('id, titel, beschrijving');
            $this->db->from('categories');
            $this->db->where('parent', $parent);

            $query = $this->db->get();
            $rows  = $query->result();

            return $rows;
        }

        public function GetProducts($category = 'all') {

            if('all' != $category) {

                $this->db->select('id, titel, parent, beschrijving');
                $this->db->from('categories');

                $this->db->where('titel', urldecode($category));

                $query = $this->db->get();
                $rows  = $query->result_array();

                if(count($rows) > 0)
                    $result = $rows[0];
            }

            $this->db->select('id, titel, beschrijving, prijs, categorie, aantal');
            $this->db->from('products');

            /* By default Codeigniter selects all. If we have a category set we set the where condition. */
            if('all' != $category && isset($result['id']))
                $this->db->where('categorie', $result['id']);

            $query = $this->db->get();
            $rows  = $query->result_array();

            return $rows;
        }

        public function GetProduct($id) {
            $this->db->select('id, titel, beschrijving, prijs, aantal');
            $this->db->from('products');
            $this->db->where('id', $id);

            $query = $this->db->get();
            $rows  = $query->row_array();

            return $rows;
        }
    }