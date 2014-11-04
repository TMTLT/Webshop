<?php

class Crypt{
	
	private function __construct(){}
	
	/*
		GetMd5Hash
		Returns MD5 hash of given input
	*/	
	public static function GetMd5Hash($input){
		
		$hash = md5($input);
		
		return $hash;
	}
	
	/*
		GetRandomSalt
		Returns random salt
	*/	
	public static function GetRandomSalt($length = 12){
	
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		
		return $randomString;
	}
	
	/*
		HashPassword
		Returns password hash when given plain text password
	*/
	public static function HashPassword($password, $salt){
	
		$combined = $password . $salt; 
		
		$hash = hash('sha256', $combined);
		
		return $hash;
	}
	/*
		ValidatePassword
		Validates password
	*/
	public static function ValidatePassword($password, $salt, $hash){
		
		return ($hash == self::HashPassword($password, $salt));
	}
	/*
		VerifyMd5Hash
	*/
	public static function VerifyMd5Hash($input, $hash){
	
		return($hash == md5($input));
	}
}

































/* LEMME SCROLL */