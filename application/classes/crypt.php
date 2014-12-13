<?php
    /*
     * Copyright (C) 2014 Owain van Brakel
     *
     * Licensed under the Apache License, Version 2.0 (the "License");
     * you may not use this file except in compliance with the License.
     * You may obtain a copy of the License at
     *
     *      http://www.apache.org/licenses/LICENSE-2.0
     *
     * Unless required by applicable law or agreed to in writing, software
     * distributed under the License is distributed on an "AS IS" BASIS,
     * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     * See the License for the specific language governing permissions and
     * limitations under the License.
     */

    /**
     * Class Crypt
     */
    class Crypt {
        /**
         * @var string
         */
        private static $pbkdf2_hash_algorithm = "sha256";
        /**
         * @var int
         */
        private static $pbkdf2_iterations = 1000;
        /**
         * @var int
         */
        private static $pbkdf2_salt_byte_size = 36;
        /**
         * @var int
         */
        private static $pbkdf2_hash_byte_size = 24;
        /**
         * @var int
         */
        private static $hash_sections = 4;
        /**
         * @var int
         */
        private static $hash_algorithm_index = 0;
        /**
         * @var int
         */
        private static $hash_iteration_index = 1;
        /**
         * @var int
         */
        private static $hash_salt_index = 2;
        /**
         * @var int
         */
        private static $hash_pbkdf2_index = 3;
        /**
         *
         */
        const MCRYPT_CIPHER = MCRYPT_RIJNDAEL_256;
        /**
         *
         */
        const MCRYPT_MODE = MCRYPT_MODE_ECB;
        /**
         * [GetRandomSalt]
         */
        public static function getRandomSalt() {
            return base64_encode(mcrypt_create_iv(self::$pbkdf2_salt_byte_size, MCRYPT_DEV_URANDOM));
        }
        /**
         * [HashPassword]
         *
         * @param mixed $password
         * @param mixed $salt
         */
        public static function hashPassword($password, $salt) {
            return self::$pbkdf2_hash_algorithm . ":" . self::$pbkdf2_iterations . ":" . $salt . ":" .
                   base64_encode(self::pbkdf2(
                       self::$pbkdf2_hash_algorithm,
                       $password,
                       $salt,
                       self::$pbkdf2_iterations,
                       self::$pbkdf2_hash_byte_size,
                       true
                   ));
        }
        /**
         * [ValidatePassword]
         *
         * @param mixed $password
         * @param mixed $hash
         */
        public static function validatePassword($password, $hash) {
            $params = explode(":", $hash);
            if(count($params) < self::$hash_sections)
                return false;
            $pbkdf2 = base64_decode($params[self::$hash_pbkdf2_index]);
            return self::slowEquals(
                $pbkdf2,
                self::pbkdf2(
                    $params[self::$hash_algorithm_index],
                    $password,
                    $params[self::$hash_salt_index],
                    (int)$params[self::$hash_iteration_index],
                    strlen($pbkdf2),
                    true
                )
            );
        }
        /**
         * [slow_equals]
         *
         * @param  mixed $a
         * @param  mixed $b
         *
         * @return mixed
         */
        public static function slowEquals($a, $b) {
            $diff = strlen($a) ^ strlen($b);
            for($i = 0; $i < strlen($a) && $i < strlen($b); $i++) {
                $diff |= ord($a[$i]) ^ ord($b[$i]);
            }
            return $diff === 0;
        }
        /**
         * [pbkdf2]
         *
         * @param  mixed   $algorithm
         * @param  mixed   $password
         * @param  mixed   $salt
         * @param  mixed   $count
         * @param  mixed   $key_length
         * @param  boolean $raw_output
         *
         * @return mixed
         */
        public static function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false) {
            $algorithm = strtolower($algorithm);
            if(!in_array($algorithm, hash_algos(), true))
                trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
            if($count <= 0 || $key_length <= 0)
                trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);
            if(function_exists("hash_pbkdf2")) {
                if(!$raw_output) {
                    $key_length = $key_length * 2;
                }
                return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
            }
            $hash_length = strlen(hash($algorithm, "", true));
            $block_count = ceil($key_length / $hash_length);
            $output = "";
            for($i = 1; $i <= $block_count; $i++) {
                $last = $salt . pack("N", $i);
                $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
                for($j = 1; $j < $count; $j++) {
                    $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
                }
                $output .= $xorsum;
            }
            if($raw_output)
                return substr($output, 0, $key_length);
            return bin2hex(substr($output, 0, $key_length));
        }
        /**
         * @return string
         */
        public static function createKey() {
            $iv_size = mcrypt_get_iv_size(self::MCRYPT_CIPHER, self::MCRYPT_MODE);
            $iv      = base64_encode(mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM));
            return $iv;
        }
        /**
         * @param $string
         * @param $key
         *
         * @return string
         */
        public static function rijndaelEncrypt($string, $key) {
            if (empty($string)) return NULL;
            $key       = base64_decode($key);
            $iv        = mcrypt_create_iv(mcrypt_get_iv_size(self::MCRYPT_CIPHER, self::MCRYPT_MODE), MCRYPT_RAND);
            $passcrypt = trim(mcrypt_encrypt(self::MCRYPT_CIPHER, $key, trim($string), self::MCRYPT_MODE, $iv));
            $encode    = base64_encode($passcrypt);
            return $encode;
        }
        /**
         * @param $string
         * @param $key
         *
         * @return string
         */
        public static function rijndaelDecrypt($string, $key) {
            if (empty($string)) return NULL;
            $key       = base64_decode($key);
            $decoded   = base64_decode($string);
            $iv        = mcrypt_create_iv(mcrypt_get_iv_size(self::MCRYPT_CIPHER, self::MCRYPT_MODE), MCRYPT_RAND);
            $decrypted = trim(mcrypt_decrypt(self::MCRYPT_CIPHER, $key, trim($decoded), self::MCRYPT_MODE, $iv));
            return $decrypted;
        }
    }