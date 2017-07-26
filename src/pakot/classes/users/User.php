<?php
// user class

require 'CommonUser.php';

class User extends CommonUser {
	private $packages = "null";
	private $payment;
	private $cpf;

	function __construct($name,$email,$phone) {
		$this->name = $name;
		$this->email = $email;	
		$this->phone = $phone;
		$this->payment = "null";
		$this->cpf = "null";
    }

}