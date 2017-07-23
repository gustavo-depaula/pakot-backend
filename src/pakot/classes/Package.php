<?php
// package class

class Package {
	private $id;

	private $nickname;
	private $description;
	private $priority;

	private $size;
	private $weight;

	private $sender;
	private $deliveryman;

	private $price;
	private $payment;

    private $origin;
    private $destination;

	private $assigned;
	private $dispatched;
	private $arrived;
	private $experienceRating;


	function __construct($nickname, $description, $priority, $size ,$weight, $origin, $destination){
		$this->nickname = $nickname;
		$this->description = $description;
		$this->priority = $priority;
		$this->size = $size;
		$this->weight = $weight;
        $this->origin = $origin;
        $this->destination = $destination;
    }
    public function getNickname(){
    	return $this->nickname;
    }
    public function getDescription(){
    	return $this->description;
    }
    public function getPriority(){
    	return $this->priority;
    }
    public function getSize(){
    	return $this->size;
    }
    public function getWeight(){
    	return $this->weight;
    }
    public function setId($id){
    	$this->id=$id;
    }

    public function toJson(){
    	return json_encode(get_object_vars($this));
    }
}