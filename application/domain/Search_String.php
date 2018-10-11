<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class to represent the Search String;
*/
class Search_String {

  private $description;
  private $database;
  private $updated_at;

	/**
	 * Search_String constructor for data in the database and new registry.
	 * @param String $description
	 * @param Database $database
	 * @param DateTime $updated_at
	 */
	public function __construct($description, $database, $updated_at){
		$this->description = $description;
		$this->database = $database;
		$this->updated_at = $updated_at;
	}

	/**
	 * Method to retrieve the search string description.
	 * @return String description
	 */
	public function getDescription(){
		return $this->description;
	}

	/**
	 * Method to change the search string description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description){
		if(is_null($description) || empty($description)){
			throw  new  InvalidArgumentException("Search String Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the search string database.
	 * @return Database database
	 */
	public function getDatabase(){
		return $this->database;
	}

	/**
	 * Method to change the search string database.
	 * @param String $database
	 * @throws InvalidArgumentException
	 */
	public function setDatabase($database){
		if(is_null($database)){
			throw  new  InvalidArgumentException("Search String Database Invalid!");
		}
		$this->database = $database;
	}

	/**
	 * Method to retrieve the search string update at.
	 * @return DateTime updated_at
	 */
	public function getUpdatedAt(){
		return $this->updated_at;
	}

	/**
	 * Method to change the search string update at.
	 * @param DateTime $updated_at
	 * @throws InvalidArgumentException
	 */
	public function setUpdatedAt($updated_at){
		if(is_null($updated_at)){
			throw  new  InvalidArgumentException("Search String Update at Invalid!");
		}
		$this->updated_at = $updated_at;
	}


}
