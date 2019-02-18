<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Search String;
*/

class Search_String
{

	private $description;
	private $database;

	/**
	 * Search_String constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Method to retrieve the search string description.
	 * @return String description
	 */
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * Method to change the search string description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function set_description($description)
	{
		if (is_null($description) || empty($description)) {
			throw  new  InvalidArgumentException("Search String Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the search string database.
	 * @return String database
	 */
	public function get_database()
	{
		return $this->database;
	}

	/**
	 * Method to change the search string database.
	 * @param String $database
	 * @throws InvalidArgumentException
	 */
	public function set_database($database)
	{
		if (is_null($database)) {
			throw  new  InvalidArgumentException("Search String Database Invalid!");
		}
		$this->database = $database;
	}

}
