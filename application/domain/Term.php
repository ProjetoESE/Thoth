<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class to represent the Term;
*/
class Term {

	private $description;
    private $synonymus;

	/**
	 * Term constructor for data in the database.
	 * @param String $description
	 * @param array(String) $synonymus
	 */
	public function __constructDatabase($description, $synonymus){
		$this->description = $description;
		$this->synonymus = $synonymus;
	}

	/**
	 * Term constructor to new registry.
	 * @param String $description
	 */
	public function __construct($description){
		$this->description = $description;
		$this->synonymus = array();
	}

	/**
	 * Method to retrieve the term description.
	 * @return String description
	 */
	public function getDescription(){
		return $this->description;
	}

	/**
	 * Method to change the term description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description){
		if(is_null($description) || empty($description)){
			throw  new  InvalidArgumentException("Term Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the term synonymus.
	 * @return array(String) synonymus
	 */
	public function getSynonymus(){
		return $this->synonymus;
	}

	/**
	 * Method to change the term synonymus.
	 * @param array(String) $synonymus
	 * @throws InvalidArgumentException
	 */
	public function setSynonymus($synonymus){
		if(is_null($synonymus)){
			throw  new  InvalidArgumentException("Term Synonymus Invalid!");
		}
		$this->synonymus = $synonymus;
	}

}
