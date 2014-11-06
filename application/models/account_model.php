<?php
/*
TODO : 
- Everything

*/

require_once(APPPATH . "application/classes/crypt.php");

class Account_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	/*
		Login
	*/
	public function login($username, $password){
		
		return false;
	}
	
	/*
		Register
	*/
	public function register(){
		
		return false;
	}
	
	/*
		Activate
		Activates user (IE after e-mail confirmation)
	*/
	public function activate(){
		
		return false;
	}
	
	/*
		ResetPassword
		Sends activation mail to user and disables account, unsets password
	*/
	public function resetpassword(){
		
		return false;
	}
}