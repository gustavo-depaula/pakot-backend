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
    private $dateCreate;
    private $dateAssigned;
    private $dateDispatched;
    private $dateArrived;

	function __construct($nickname, $description, $priority, $size ,$weight, $origin, $destination,$dateCreate,$price){
		$this->nickname = $nickname;
		$this->description = $description;
		$this->priority = $priority;
		$this->size = $size;
		$this->weight = $weight;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->dateCreate = $dateCreate;
        $this->price =$price;
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
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getdateCreate(){
        return $this->dateCreate;
    }
    public function setdateCreate($dateCreate){
        $this->dateCreate=$dateCreate;
    }
    public function getdateAssigned(){
        return $this->dateAssigned;
    }
    public function setdateAssigned($dateAssigned){
        $this->dateAssigned=$dateAssigned;
    }
    public function getdateDispatched(){
        return $this->dateDispatched;
    }
    public function setdateDispatched($dateDispatched){
        $this->dateDispatched=$dateDispatched;
    }
    public function getdateArrived(){
        return $this->dateArrived;
    }
    public function setdateArrived($dateArrived){
        $this->dateArrived=$dateArrived;
    }

    public function toJson(){
    	return json_encode(get_object_vars($this));
    }
}