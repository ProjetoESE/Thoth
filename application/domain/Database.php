<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class to represent the Database;
 */
class Database {

  private $name;
  private $link;

	/**
	 * Database constructor for data in the database and new registry.
	 * @param String $name
	 * @param String $link
	 */
	public function __construct($name, $link){
		$this->name = $name;
		$this->link = $link;
	}

	/**
	 * Method to retrieve the database name.
	 * @return String name
	 */
	public function getName(){
		return $this->name;
	}

	/**
	 * Method to change the database name.
	 * @param String $name
	 * @throws InvalidArgumentException
	 */
	public function setName($name){
		if(is_null($name) || empty($name)){
			throw  new  InvalidArgumentException("Database Name Invalid!");
		}
		$this->name = $name;
	}

	/**
	 * Method to retrieve the database link.
	 * @return String link
	 */
	public function getLink(){
		return $this->link;
	}

	/**
	 * Method to change the database link.
	 * @param String $link
	 * @throws InvalidArgumentException
	 */
	public function setLink($link){
		if(is_null($link) || empty($link)){
			throw  new  InvalidArgumentException("Database Link Invalid!");
		}
		$this->link = $link;
	}

}

