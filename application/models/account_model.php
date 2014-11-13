<?php
/*
TODO : 
- Everything

*/

require_once(APPPATH . "classes/crypt.php");

class Account_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
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

	public function registerSubmit()
	{
		$firstname = $this->input->post('firstname');
		$affix = $this->input->post('affix');
		$lastname = $this->input->post('lastname');
		$zip = $this->input->post('zip_code');
		$number = $this->input->post('house_number');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$salt = Crypt::GetRandomSalt();
		echo "Voornaam: " . $firstname . "<br />";
		echo "Tussenvoegsel: " . $affix . "<br />";
		echo "Achternaam: " . $lastname . "<br />";
		echo "Postcode: " . $zip . "<br />";
		echo "Huisnummer: " . $number . "<br />";
		echo "Email: " . $email . "<br />";
		echo "Wachtwoord: " . $password . "<br />";
		echo "Wachtwoord2: " . $password2 . "<br />";
		echo $salt . "<br />";
		Crypt::HashPassword($password, $salt);
	}
}