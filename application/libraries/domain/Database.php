<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class to represent the Database;
 */
class Database
{

	private $name;
	private $link;

	/**
	 * Database constructor.
	 */
	public function __construct()
	{
	}


	/**
	 * Method to retrieve the database name.
	 * @return String name
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * Method to change the database name.
	 * @param String $name
	 * @throws InvalidArgumentException
	 */
	public function set_name($name)
	{
		if (is_null($name) || empty($name)) {
			throw  new  InvalidArgumentException("Database Name Invalid!");
		}
		$this->name = $name;
	}

	/**
	 * Method to retrieve the database link.
	 * @return String link
	 */
	public function get_link()
	{
		return $this->link;
	}

	/**
	 * Method to change the database link.
	 * @param String $link
	 * @throws InvalidArgumentException
	 */
	public function set_link($link)
	{
		if (is_null($link) || empty($link)) {
			throw  new  InvalidArgumentException("Database Link Invalid!");
		}
		$this->link = $link;
	}

}

