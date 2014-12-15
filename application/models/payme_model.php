<?php

    class Payme_model extends CI_Model {

        public function __construct() {

            parent::__construct();
        }

        public function SaveTransaction($transID, $hash) {

            $data = array(
                'transid' => $transID,
                'hash'    => $hash
            );

            $result = $this->db->insert('transactions', $data);

            return $result;
        }

        public function GetActiveTransactions() {

            $this->db->select('id, transid, hash');
            $this->db->from('transactions');
            $this->db->where('status', '0');

            $query = $this->db->get();
            $rows  = $query->result_array();

            return $rows;
        }

        public function GetTransactionStatus($transid) {

            $this->db->select('id, transid, hash, status');
            $this->db->from('transactions');
            $this->db->where('transid', $transid);

            $query = $this->db->get();
            $rows  = $query->result_array();

            return $rows[0];
        }
    }