<?php
// user class

require 'CommonUser.php';

class User extends CommonUser {
	private $packages = "undefined";
	private $payment;
	private $cpf;

	function __construct($name,$email,$phone,$payment,$cpf) {
		$this->name = $name;
		$this->email = $email;	
		$this->phone = $phone;
		$this->payment = $payment;
		$this->cpf = $cpf;
    }

}