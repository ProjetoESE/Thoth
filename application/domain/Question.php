<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class to represent the Question;
*/
abstract class Question{

  private $id;
  private $description;

	/**
	 * Question constructor for data in the database and new registry.
	 * @param $id
	 * @param $description
	 */
	public function __construct($id, $description){
		$this->id = $id;
		$this->description = $description;
	}

	/**
	 * Method to retrieve the question id.
	 * @return String id
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * Method to change the question id.
	 * @param String $id
	 * @throws InvalidArgumentException
	 */
	public function setId($id){
		if(is_null($id) || empty($id)){
			throw  new  InvalidArgumentException("Question Id Invalid!");
		}
		$this->id = $id;
	}

	/**
	 * Method to retrieve the question description.
	 * @return String description
	 */
	public function getDescription(){
		return $this->description;
	}

	/**
	 * Method to change the question description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description){
		if(is_null($description) || empty($description)){
			throw  new  InvalidArgumentException("Question Description Invalid!");
		}
		$this->description = $description;
	}
}
