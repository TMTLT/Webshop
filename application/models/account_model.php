<?php

    require_once(APPPATH . "classes/crypt.php");

    /**
     * Class Account_model
     */
    class Account_model extends CI_Model {

        /**
         *
         */
        public function __construct() {
            $this->load->database();
        }

        /**
         * @return bool
         */
        public function checkMail() {
            $email = $this->input->post('email');
            $this->db->where('email', $email);
            $this->db->from('users');
            echo $this->db->count_all_results();

            return false;
        }

        /**
         * @param $username
         * @param $password
         *
         * @return bool
         */
        public function login($username, $password) {

            return false;
        }

        /**
         * @return bool
         */
        public function register() {

            return false;
        }

        /**
         * @return bool
         */
        public function activate() {

            return false;
        }

        /**
         * @return bool
         */
        public function resetpassword() {

            return false;
        }

        /**
         *
         */
        public function registerSubmit() {
            $firstname = $this->input->post('firstname');
            $affix     = $this->input->post('affix');
            $lastname  = $this->input->post('lastname');
            $zip       = $this->input->post('zip_code');
            $number    = $this->input->post('house_number');
            $email     = $this->input->post('email');
            $password  = $this->input->post('password');
            $password2 = $this->input->post('password2');
            $salt      = Crypt::GetRandomSalt();
            $pepper    = Crypt::createKey();
            $data      = array(
                'voornaam'      => Crypt::rijndaelEncrypt($firstname, $pepper) ,
                'tussenvoegsel' => Crypt::rijndaelEncrypt($affix, $pepper) ,
                'achternaam'    => Crypt::rijndaelEncrypt($lastname, $pepper) ,
                'postcode'      => Crypt::rijndaelEncrypt($zip, $pepper) ,
                'huisnummer'    => Crypt::rijndaelEncrypt($number, $pepper) ,
                'email'         => $email ,
                'wachtwoord'    => Crypt::HashPassword($password, $salt) ,
                'salt'          => $salt ,
                'pepper'        => $pepper
            );

            $str = $this->db->insert_string('users', $data);

            $res = $this->db->query($str);

            if (!$res) {
                // TODO: remove this
                if (true) {
                    $msg = $this->db->_error_message();
                    $num = $this->db->_error_number();

                    $data['msg'] = "Error(" . $num . ") " . $msg;
                    print_r($data);
                }
                // TODO: activation mail
                return false;
            }
            return true;
        }
    }