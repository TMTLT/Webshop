<?php
/*
TODO : 
- Everything

*/

require_once(APPPATH . "classes/crypt.php");

class Account_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}
	
	/**
	 * [login description]
	 * @param  string $username
	 * @param  string $password
	 * @return [type]           [description]
	 */
	public function login($username, $password) {
		
		return false;
	}
	
	/**
	 * [register description]
	 * @return [type] [description]
	 */
	public function register() {
		
		return false;
	}
	
	/**
	 * [activate description]
	 * @return [type] [description]
	 */
	public function activate() {
		
		return false;
	}
	
	/**
	 * [resetpassword description]
	 * @return [type] [description]
	 */
	public function resetpassword() {
		
		return false;
	}

	/**
	 * [debug description]
	 * @return [type] [description]
	 */
	public function debug() {
		
		$salt 	 = Crypt::GetRandomSalt();
		$hashed  = Crypt::HashPassword('test', $salt);
		$values  = array(
			'salt' => $salt,
			'hashed' => $hashed,
			'validate' => Crypt::ValidatePassword('test', $hashed)
		);

		return $values;
	}
}