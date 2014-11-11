<?php

define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 36);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);

class Crypt{
	
	private function __construct(){}
	
	/**
	 * [GetRandomSalt]
	 */
	public static function GetRandomSalt() {
		return base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
	}
	
	/**
	 * [HashPassword]
	 * @param mixed $password
	 * @param mixed $salt
	 */
	public static function HashPassword($password, $salt) {
    	return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" .
        base64_encode(self::pbkdf2(
            PBKDF2_HASH_ALGORITHM,
            $password,
            $salt,
            PBKDF2_ITERATIONS,
            PBKDF2_HASH_BYTE_SIZE,
            true
        ));
	}

	/**
	 * [ValidatePassword]
	 * @param mixed $password
	 * @param mixed $hash
	 */
	public static function ValidatePassword($password, $hash) {
	    $params = explode(":", $hash);
	    if(count($params) < HASH_SECTIONS)
	       return false;
	    $pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
	    return self::slow_equals(
	        $pbkdf2,
	        self::pbkdf2(
	            $params[HASH_ALGORITHM_INDEX],
	            $password,
	            $params[HASH_SALT_INDEX],
	            (int)$params[HASH_ITERATION_INDEX],
	            strlen($pbkdf2),
	            true
	        )
	    );
	}

	/**
	 * [slow_equals]
	 * @param  mixed $a
	 * @param  mixed $b
	 * @return mixed
	 */
	public static function slow_equals($a, $b) {
	    $diff = strlen($a) ^ strlen($b);
	    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
	    {
	        $diff |= ord($a[$i]) ^ ord($b[$i]);
	    }
	    return $diff === 0;
	}

	/**
	 * [pbkdf2]
	 * @param  mixed  $algorithm
	 * @param  mixed  $password
	 * @param  mixed  $salt
	 * @param  mixed  $count
	 * @param  mixed  $key_length
	 * @param  boolean $raw_output
	 * @return mixed
	 */
	public static function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false) {
	    $algorithm = strtolower($algorithm);
	    if(!in_array($algorithm, hash_algos(), true))
	        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
	    if($count <= 0 || $key_length <= 0)
	        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

	    if (function_exists("hash_pbkdf2")) {
	        if (!$raw_output) {
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
	        for ($j = 1; $j < $count; $j++) {
	            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
	        }
	        $output .= $xorsum;
	    }

	    if($raw_output)
	        return substr($output, 0, $key_length);
	    else
	        return bin2hex(substr($output, 0, $key_length));
	}
}

































/* LEMME SCROLL */